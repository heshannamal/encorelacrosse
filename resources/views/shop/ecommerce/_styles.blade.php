<style>
:root{
    --ec-red:#d71920;
    --ec-black:#171717;
    --ec-text:#303030;
    --ec-muted:#7b7b7b;
    --ec-line:#e5e5e5;
    --ec-soft:#f6f6f6;
    --ec-card:#fff;
    --ec-mint:#48ceb0;
}
.ec-shop,.ec-shop *{box-sizing:border-box}
.ec-shop{min-height:65vh;background:#fff;color:var(--ec-text);font-family:'Open Sans',Arial,sans-serif}
.ec-shop-shell{width:min(1220px,calc(100% - 36px));margin:0 auto;padding:32px 0 64px}
.ec-shop-full{width:100%;padding:22px 32px 58px}
.ec-shop-title{margin:0;color:#222;font-family:'Oswald',sans-serif;font-size:clamp(32px,4vw,50px);font-weight:400;line-height:1;text-transform:uppercase}
.ec-shop-kicker{margin-bottom:7px;color:var(--ec-red);font-family:'Oswald',sans-serif;font-size:13px;font-weight:400;letter-spacing:.08em;text-transform:uppercase}
.ec-shop-subtitle{margin:8px 0 0;color:#777;font-size:13px}
.ec-shop-message{width:min(1220px,calc(100% - 36px));margin:18px auto;padding:13px 15px;border:1px solid;font-size:13px}
.ec-shop-message-success{border-color:#bcebd6;background:#f1fff9;color:#176b4c}
.ec-shop-message-error{border-color:#f1b8b8;background:#fff3f3;color:#9d2020}
.ec-shop-message-warning{border-color:#ead696;background:#fff9e9;color:#77551d}
.ec-btn{min-height:44px;padding:0 19px;display:inline-flex;align-items:center;justify-content:center;gap:8px;border:1px solid transparent;border-radius:0;text-decoration:none;font-family:'Oswald',sans-serif;font-size:15px;font-weight:400;text-transform:uppercase;cursor:pointer;transition:.2s ease}
.ec-btn-dark{background:#222;color:#fff}.ec-btn-dark:hover{background:var(--ec-red);color:#fff}
.ec-btn-red{background:var(--ec-red);color:#fff}.ec-btn-red:hover{background:#b91218;color:#fff}
.ec-btn-light{border-color:#d1d1d1;background:#fff;color:#333}.ec-btn-light:hover{border-color:#555;color:#111}
.ec-btn-full{width:100%}
.ec-input,.ec-select{width:100%;height:47px;padding:0 13px;border:1px solid #d7d7d7;border-radius:0;background:#fff;color:#222;font:inherit;outline:0}
.ec-input:focus,.ec-select:focus{border-color:#555;box-shadow:0 0 0 1px #555}
.ec-label{display:block;margin-bottom:6px;color:#777;font-size:10px;font-weight:700;letter-spacing:.08em;text-transform:uppercase}

/* Listing toolbar */
.ec-shop-toolbar{position:sticky;top:90px;z-index:800;background:rgba(255,255,255,.97);backdrop-filter:blur(10px);border-top:1px solid var(--ec-line);border-bottom:1px solid var(--ec-line)}
.ec-shop-toolbar-inner{padding:13px 32px;display:grid;grid-template-columns:1.1fr 1.5fr 1fr 1fr minmax(180px,1.3fr);gap:14px;align-items:end}
.ec-filter label{display:block;margin-bottom:4px;color:#999;font-size:9px;font-weight:700;letter-spacing:.08em;text-transform:uppercase}
.ec-filter select,.ec-filter input{width:100%;height:37px;border:0;border-bottom:1px solid #ddd;border-radius:0;background:#fff;color:#333;font:inherit;font-size:13px;outline:0}
.ec-filter-search{position:relative}.ec-filter-search input{padding:0 34px 0 4px}.ec-filter-search button{position:absolute;right:0;bottom:0;width:34px;height:37px;border:0;background:transparent;color:#444}
.ec-active-filters{padding:18px 32px 0;display:flex;gap:7px;flex-wrap:wrap}
.ec-chip{padding:6px 9px;display:inline-flex;align-items:center;gap:6px;border:1px solid #ddd;background:#fff;color:#555;text-decoration:none;font-size:11px}.ec-chip-clear{background:#444;color:#fff;border-color:#444}

/* Product grid */
.ec-product-grid{display:grid;grid-template-columns:repeat(4,minmax(0,1fr));gap:18px}
.ec-product-card{position:relative;display:flex;flex-direction:column;min-width:0;background:#fff;cursor:pointer;transition:box-shadow .2s ease,transform .2s ease}
.ec-product-card:hover{box-shadow:0 8px 24px rgba(0,0,0,.09);transform:translateY(-1px)}
.ec-product-image-wrap{position:relative;width:100%;overflow:hidden;background:#f4f4f4;touch-action:pan-y;user-select:none}
.ec-product-image-link{display:block;line-height:0}
.ec-product-image{display:block;width:100%;height:auto;aspect-ratio:1/1.12;object-fit:cover;user-select:none;pointer-events:none}
.ec-product-info{padding:14px 10px 16px;display:flex;flex:1;flex-direction:column;align-items:center;text-align:center}
.ec-product-name{min-height:42px;margin:0 0 5px;font-family:'Open Sans',sans-serif;font-size:14px;font-weight:500;line-height:1.4;text-transform:none}.ec-product-name a{color:#333;text-decoration:none}
.ec-product-price{color:#777;font-size:20px;font-weight:300}
.ec-view-more{margin-top:13px;padding:8px 18px;background:var(--ec-mint);color:#fff;text-decoration:none;font-size:12px;font-weight:700}.ec-view-more:hover{background:#35b99c;color:#fff}
.ec-empty{padding:70px 20px;text-align:center;color:#777}.ec-empty i{display:block;margin-bottom:12px;font-size:34px;color:#bbb}.ec-empty h3{font-family:'Oswald',sans-serif;text-transform:uppercase}

/* Product detail */
.ec-product-layout{display:grid;grid-template-columns:minmax(0,1.08fr) minmax(350px,.92fr);gap:48px;align-items:start}
.ec-main-image{overflow:hidden;border:1px solid #eee;background:#f5f5f5}.ec-main-image img{display:block;width:100%;height:auto}
.ec-thumbs{display:flex;gap:9px;overflow:auto;margin-top:10px}.ec-thumb{flex:0 0 76px;width:76px;padding:2px;border:1px solid #ddd;background:#fff;cursor:pointer}.ec-thumb.active{border-color:#333}.ec-thumb img{display:block;width:100%;height:auto}
.ec-product-detail-title{margin:0;color:#222;font-family:'Oswald',sans-serif;font-size:clamp(30px,3.8vw,48px);font-weight:400;line-height:1.05;text-transform:uppercase}
.ec-product-detail-price{margin:15px 0 20px;color:var(--ec-red);font-size:27px;font-weight:600}
.ec-description{margin-bottom:24px;color:#666;line-height:1.75;font-size:14px}.ec-stock-note{margin-top:8px;color:#777;font-size:12px}.ec-actions{display:grid;grid-template-columns:1fr 1fr;gap:10px;margin-top:18px}

/* Cart */
.ec-page-heading{display:flex;align-items:flex-end;justify-content:space-between;gap:20px;margin-bottom:24px;padding-bottom:18px;border-bottom:1px solid var(--ec-line)}
.ec-cart-layout{display:grid;grid-template-columns:minmax(0,1fr) 340px;gap:28px;align-items:start}
.ec-cart-list{overflow:hidden;border:1px solid var(--ec-line);background:#fff}
.ec-cart-row{position:relative;display:grid;grid-template-columns:116px minmax(0,1fr) auto;gap:18px;align-items:center;padding:18px;border-bottom:1px solid var(--ec-line)}.ec-cart-row:last-child{border-bottom:0}
.ec-cart-img{display:block;width:116px;height:130px;object-fit:cover;background:#f5f5f5}.ec-cart-name{color:#222;text-decoration:none;font-family:'Oswald',sans-serif;font-size:16px;text-transform:uppercase}.ec-cart-meta{margin-top:5px;color:#858585;font-size:11px}
.ec-cart-controls{display:grid;grid-template-columns:auto auto auto;gap:12px;align-items:center}.ec-qty{display:flex;border:1px solid #ddd}.ec-qty button{width:36px;height:40px;border:0;background:#fff;font-size:17px}.ec-qty input{width:40px;height:40px;border:0;text-align:center}.ec-line-price{min-width:75px;text-align:right;font-weight:700}.ec-remove{width:36px;height:36px;border:0;background:#fff1f1;color:var(--ec-red)}
.ec-summary{position:sticky;top:116px;padding:22px;border:1px solid var(--ec-line);background:#fff}.ec-summary h2{margin:0 0 14px;font-family:'Oswald',sans-serif;font-size:21px;text-transform:uppercase}.ec-summary-line{display:flex;justify-content:space-between;padding:11px 0;border-bottom:1px solid #eee;color:#666;font-size:12px}.ec-summary-total{font-size:18px;font-weight:700;color:#111}.ec-summary-note{margin:13px 0 0;color:#8a8a8a;font-size:10px;line-height:1.55}

/* Cards / auth / checkout */
.ec-card{border:1px solid var(--ec-line);background:#fff}.ec-card-head{min-height:64px;padding:0 21px;display:flex;align-items:center;justify-content:space-between;border-bottom:1px solid var(--ec-line)}.ec-card-body{padding:22px}.ec-card-title{margin:0;font-family:'Oswald',sans-serif;font-size:20px;text-transform:uppercase}
.ec-auth-wrap{width:min(620px,calc(100% - 30px));margin:0 auto;padding:45px 0 64px}.ec-auth-icon{width:64px;height:64px;margin:0 auto 16px;display:flex;align-items:center;justify-content:center;background:#222;color:#fff;font-size:26px}.ec-auth-head{text-align:center;margin-bottom:21px}.ec-auth-link{text-align:center;margin:17px 0 0;color:#777;font-size:12px}.ec-auth-link a{color:#222;font-weight:700}
.ec-grid-2{display:grid;grid-template-columns:repeat(2,minmax(0,1fr));gap:15px}.ec-check-line{display:flex;align-items:center;gap:8px;margin-top:16px;font-size:12px}.ec-check-line input{accent-color:var(--ec-red)}
.ec-two-col{display:grid;grid-template-columns:minmax(0,1fr) 360px;gap:28px;align-items:start}.ec-check-section+.ec-check-section{margin-top:22px;padding-top:22px;border-top:1px solid var(--ec-line)}.ec-check-title{margin:0 0 15px;font-family:'Oswald',sans-serif;font-size:18px;text-transform:uppercase}
.ec-payment-pending{padding:18px;border:1px solid #ead696;background:#fff9e9;color:#6c531d;font-size:13px;line-height:1.6}

/* Loader/toasts */
.ec-row-loading:after{content:'';position:absolute;inset:0;background:rgba(255,255,255,.72);z-index:3}.ec-mini-ring{width:28px;height:28px;border:3px solid #ddd;border-top-color:var(--ec-red);border-radius:50%;animation:ecSpin .7s linear infinite}@keyframes ecSpin{to{transform:rotate(360deg)}}

@media(max-width:1199.98px){.ec-product-grid{grid-template-columns:repeat(3,minmax(0,1fr))}.ec-shop-toolbar-inner{grid-template-columns:repeat(2,minmax(0,1fr))}}
@media(max-width:991.98px){.ec-shop-toolbar{top:64px}.ec-product-grid{grid-template-columns:repeat(2,minmax(0,1fr))}.ec-product-layout,.ec-cart-layout,.ec-two-col{grid-template-columns:1fr}.ec-summary{position:static}.ec-cart-row{grid-template-columns:100px minmax(0,1fr)}.ec-cart-img{width:100px;height:112px}.ec-cart-controls{grid-column:2}}
@media(max-width:767.98px){.ec-shop-shell{width:calc(100% - 24px);padding:24px 0 48px}.ec-shop-full{padding:18px 14px 45px}.ec-product-grid{grid-template-columns:1fr;gap:16px}.ec-shop-toolbar-inner{grid-template-columns:1fr 1fr;padding:10px 12px}.ec-page-heading{align-items:flex-start;flex-direction:column}.ec-grid-2{grid-template-columns:1fr}.ec-actions{grid-template-columns:1fr}.ec-cart-row{grid-template-columns:88px minmax(0,1fr);padding:14px}.ec-cart-img{width:88px;height:100px}.ec-cart-controls{grid-template-columns:auto 1fr auto}.ec-line-price{text-align:left}}
@media(max-width:480px){.ec-shop-toolbar-inner{grid-template-columns:1fr}.ec-product-info{padding:12px 8px}.ec-product-price{font-size:19px}.ec-cart-controls{grid-template-columns:1fr}.ec-qty{width:max-content}}
</style>
