<style>
.ec-color-native-hidden{position:absolute!important;width:1px!important;height:1px!important;padding:0!important;margin:-1px!important;overflow:hidden!important;clip:rect(0,0,0,0)!important;white-space:nowrap!important;border:0!important}.ec-color-picker{position:relative;width:100%}.ec-color-picker-button{position:relative;width:100%;min-height:47px;padding:0 42px 0 13px;display:flex;align-items:center;gap:10px;border:1px solid #d7d7d7;background:#fff;color:#222;text-align:left;font:inherit}.ec-color-picker-button:disabled{background:#f6f6f6;color:#999}.ec-color-picker-button:after{content:'';position:absolute;right:16px;top:50%;width:8px;height:8px;border-right:1px solid currentColor;border-bottom:1px solid currentColor;transform:translateY(-70%) rotate(45deg)}.ec-color-picker-menu{position:absolute;z-index:70;top:calc(100% + 4px);left:0;right:0;max-height:230px;overflow:auto;padding:5px;display:none;border:1px solid #d7d7d7;background:#fff;box-shadow:0 12px 28px rgba(0,0,0,.13)}.ec-color-picker.open .ec-color-picker-menu{display:block}.ec-color-picker-option{width:100%;min-height:42px;padding:8px 10px;display:flex;align-items:center;gap:10px;border:0;background:#fff;color:#222;text-align:left;font:inherit}.ec-color-picker-option:hover,.ec-color-picker-option.selected{background:#f3f3f3}.ec-color-dot{flex:0 0 16px;width:16px;height:16px;border:1px solid rgba(0,0,0,.28);border-radius:50%;background:#fff}
</style>

<script>
(function(){
    function syncEncoreCartCount(){
        fetch(@json(route('cart.count')),{headers:{'Accept':'application/json'},credentials:'same-origin'})
            .then(r=>r.json())
            .then(data=>{
                const count=Number(data.count||0);
                document.querySelectorAll('[data-encore-cart-count]').forEach(badge=>{
                    badge.textContent=count>99?'99+':String(count);
                    badge.style.display=count>0?'inline-flex':'none';
                });
            }).catch(()=>{});
    }

    function initializeColorPicker(){
        const sizeSelect=document.getElementById('ecSize');
        const colorSelect=document.getElementById('ecColor');
        if(!sizeSelect||!colorSelect||colorSelect.tagName!=='SELECT')return;

        const allColors=@json(isset($options) && is_array($options) ? collect($options['colors'] ?? [])->values() : collect());
        const combinations=@json(isset($options) && is_array($options) ? collect($options['combinations'] ?? [])->values() : collect());
        colorSelect.classList.add('ec-color-native-hidden');
        colorSelect.tabIndex=-1;

        const picker=document.createElement('div');picker.className='ec-color-picker';
        const button=document.createElement('button');button.type='button';button.className='ec-color-picker-button';
        const dot=document.createElement('span');dot.className='ec-color-dot';dot.hidden=true;
        const label=document.createElement('span');label.textContent='Select Size First';
        const menu=document.createElement('div');menu.className='ec-color-picker-menu';
        button.append(dot,label);picker.append(button,menu);colorSelect.insertAdjacentElement('afterend',picker);
        let available=[];

        function colorLabel(item){return String(item.pantone_code||item.color_name||item.name||item.hex||item.color_hex||('Color '+item.id))}
        function colorHex(item){let v=String(item.hex||item.color_hex||item.hex_code||'').trim();if(/^[0-9a-f]{3,8}$/i.test(v))v='#'+v;return /^#[0-9a-f]{3,8}$/i.test(v)?v:'#fff'}
        function close(){picker.classList.remove('open')}
        function renderButton(){const selected=available.find(item=>String(item.id)===String(colorSelect.value||''));if(selected){dot.hidden=false;dot.style.backgroundColor=colorHex(selected);label.textContent=colorLabel(selected)}else{dot.hidden=true;label.textContent=!sizeSelect.value?'Select Size First':(available.length?'Select Color':'No Colors Available')}}
        function renderMenu(){menu.innerHTML='';available.forEach(item=>{const option=document.createElement('button');option.type='button';option.className='ec-color-picker-option';option.dataset.colorId=String(item.id);const swatch=document.createElement('span');swatch.className='ec-color-dot';swatch.style.backgroundColor=colorHex(item);const text=document.createElement('span');text.textContent=colorLabel(item);option.append(swatch,text);option.addEventListener('click',()=>{colorSelect.value=String(item.id);colorSelect.dispatchEvent(new Event('change',{bubbles:true}));renderButton();close()});menu.appendChild(option)})}
        function refresh(){const sizeId=Number(sizeSelect.value||0);const previous=String(colorSelect.value||'');const ids=new Set();combinations.forEach(c=>{if(Number(c.size_id||0)===sizeId&&Number(c.color_id||0)>0&&Number(c.stock_qty||0)>0)ids.add(String(c.color_id))});available=allColors.filter(c=>ids.has(String(c.id)));colorSelect.innerHTML='<option value="">'+(!sizeId?'Select Size First':(available.length?'Select Color':'No Colors Available'))+'</option>';available.forEach(c=>{const o=document.createElement('option');o.value=String(c.id);o.textContent=colorLabel(c);colorSelect.appendChild(o)});colorSelect.disabled=!sizeId||!available.length;button.disabled=colorSelect.disabled;colorSelect.value=ids.has(previous)?previous:'';renderMenu();renderButton();colorSelect.dispatchEvent(new Event('change',{bubbles:true}));close()}
        button.addEventListener('click',()=>{if(!button.disabled)picker.classList.toggle('open')});
        sizeSelect.addEventListener('change',refresh);colorSelect.addEventListener('change',renderButton);document.addEventListener('click',e=>{if(!picker.contains(e.target))close()});refresh();
    }

    if(document.readyState==='loading')document.addEventListener('DOMContentLoaded',()=>{syncEncoreCartCount();initializeColorPicker()});else{syncEncoreCartCount();initializeColorPicker()}
    window.syncEncoreCartCount=syncEncoreCartCount;
})();
</script>
