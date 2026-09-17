@if(session('success'))
    <div class="ec-shop-message ec-shop-message-success"><span>{{ session('success') }}</span></div>
@endif
@if(session('warning'))
    <div class="ec-shop-message ec-shop-message-warning"><span>{{ session('warning') }}</span></div>
@endif
@if(session('error'))
    <div class="ec-shop-message ec-shop-message-error"><span>{{ session('error') }}</span></div>
@endif
@if($errors->any())
    <div class="ec-shop-message ec-shop-message-error"><div>@foreach($errors->all() as $error)<div>{{ $error }}</div>@endforeach</div></div>
@endif
