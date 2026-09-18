<style>
:root{
    --ep-red:#d71920;
    --ep-red-dark:#b9141b;
    --ep-ink:#202735;
    --ep-text:#354052;
    --ep-muted:#7e8b9f;
    --ep-soft:#f6f8fb;
    --ep-line:#e5e9ef;
    --ep-card:#fff;
    --ep-green:#198f63;
    --ep-blue:#5d7897;
    --ep-shadow:0 10px 28px rgba(28,40,58,.06);
}

.encore-profile-page,
.encore-profile-page *{box-sizing:border-box}

.encore-profile-page{
    min-height:calc(100vh - 90px);
    background:#f7f9fc;
    color:var(--ep-text);
    font-family:'Karla',Arial,sans-serif;
}

.encore-profile-layout{
    display:grid;
    grid-template-columns:270px minmax(0,1fr);
    min-height:calc(100vh - 90px);
}

.encore-profile-sidebar{
    background:#fff;
    border-right:1px solid var(--ep-line);
    padding:36px 20px 32px;
}

.encore-profile-sidebar-inner{
    position:sticky;
    top:112px;
}

.encore-profile-user{
    padding:4px 8px 28px;
    text-align:center;
}

.encore-profile-avatar{
    width:104px;
    height:104px;
    margin:0 auto 17px;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius:50%;
    background:linear-gradient(145deg,#303030,#7d7d7d);
    border:4px solid #fff;
    box-shadow:0 8px 20px rgba(0,0,0,.12);
    color:#fff;
    font-size:30px;
    font-weight:800;
    letter-spacing:.04em;
}

.encore-profile-user h2{
    margin:0;
    color:var(--ep-ink);
    font-size:18px;
    font-weight:800;
    text-transform:none;
}

.encore-profile-user p{
    margin:6px 0 0;
    color:var(--ep-muted);
    font-size:12px;
    overflow-wrap:anywhere;
}

.encore-profile-nav{
    display:grid;
    gap:8px;
}

.encore-profile-nav a,
.encore-profile-nav button{
    width:100%;
    min-height:45px;
    display:flex;
    align-items:center;
    gap:11px;
    padding:0 14px;
    border:0;
    border-radius:8px;
    background:#fff;
    color:#4b5b70;
    font:700 13px 'Karla',Arial,sans-serif;
    text-align:left;
    text-decoration:none;
    transition:.18s ease;
}

.encore-profile-nav a i,
.encore-profile-nav button i{
    width:18px;
    text-align:center;
}

.encore-profile-nav a:hover,
.encore-profile-nav button:hover{
    background:#f6f7f9;
    color:var(--ep-red);
}

.encore-profile-nav .active{
    background:#fff0f1;
    color:var(--ep-red);
}

.encore-profile-main{
    min-width:0;
    padding:32px 34px 56px;
}

.encore-profile-main-inner{
    width:100%;
    max-width:1050px;
    margin:0 auto;
}

.encore-profile-head{
    display:flex;
    align-items:flex-start;
    justify-content:space-between;
    gap:22px;
    margin-bottom:27px;
}

.encore-profile-head h1{
    margin:0;
    color:var(--ep-ink);
    font-size:31px;
    font-weight:500;
    line-height:1.05;
}

.encore-profile-head p{
    margin:8px 0 0;
    color:var(--ep-muted);
    font-size:13px;
}

.encore-profile-btn{
    min-height:40px;
    display:inline-flex;
    align-items:center;
    justify-content:center;
    gap:8px;
    padding:0 16px;
    border:1px solid transparent;
    border-radius:7px;
    background:var(--ep-red);
    color:#fff;
    font:700 12px 'Karla',Arial,sans-serif;
    text-decoration:none;
    cursor:pointer;
    transition:.18s ease;
}

.encore-profile-btn:hover{
    background:var(--ep-red-dark);
    color:#fff;
    transform:translateY(-1px);
}

.encore-profile-card{
    background:#fff;
    border:1px solid var(--ep-line);
    border-radius:10px;
    box-shadow:var(--ep-shadow);
}

.encore-profile-alert{
    margin-bottom:18px;
    padding:13px 15px;
    border:1px solid #f0c9ca;
    border-left:4px solid var(--ep-red);
    background:#fff7f7;
    color:#8e2226;
    font-size:12px;
}

.encore-profile-stats{
    display:grid;
    grid-template-columns:repeat(4,minmax(0,1fr));
    gap:16px;
    margin-bottom:24px;
}

.encore-profile-stat{
    min-height:104px;
    display:flex;
    align-items:center;
    gap:14px;
    padding:18px;
}

.encore-profile-stat-icon{
    flex:0 0 43px;
    width:43px;
    height:43px;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius:9px;
    background:#f4f5f7;
    color:#5e6c80;
    font-size:17px;
}

.encore-profile-stat:nth-child(1) .encore-profile-stat-icon{
    background:#fff0f1;
    color:var(--ep-red);
}

.encore-profile-stat:nth-child(2) .encore-profile-stat-icon{
    background:#fff7e6;
    color:#a16b00;
}

.encore-profile-stat:nth-child(3) .encore-profile-stat-icon{
    background:#ebf9f3;
    color:var(--ep-green);
}

.encore-profile-stat strong{
    display:block;
    color:var(--ep-ink);
    font-size:23px;
    line-height:1;
}

.encore-profile-stat span{
    display:block;
    margin-top:5px;
    color:var(--ep-muted);
    font-size:9px;
    font-weight:800;
    letter-spacing:.06em;
    text-transform:uppercase;
}

.encore-profile-section{
    padding:25px 27px;
    border-bottom:1px solid var(--ep-line);
}

.encore-profile-section:last-child{
    border-bottom:0;
}

.encore-profile-section h2{
    margin:0 0 18px;
    color:var(--ep-ink);
    font-size:16px;
    font-weight:500;
    text-transform:none;
}

.encore-profile-fields{
    display:grid;
    grid-template-columns:repeat(2,minmax(0,1fr));
    gap:18px 22px;
}

.encore-profile-field.full{
    grid-column:1/-1;
}

.encore-profile-label{
    display:block;
    margin-bottom:7px;
    color:var(--ep-muted);
    font-size:9px;
    font-weight:800;
    letter-spacing:.07em;
    text-transform:uppercase;
}

.encore-profile-value{
    min-height:46px;
    display:flex;
    align-items:center;
    padding:0 13px;
    border:1px solid #dde3eb;
    border-radius:7px;
    background:#fff;
    color:#263447;
    font-size:12px;
    font-weight:700;
    overflow-wrap:anywhere;
}

.encore-profile-actions{
    display:flex;
    flex-wrap:wrap;
    gap:10px;
    margin-top:22px;
}

.encore-profile-action-link{
    min-height:40px;
    display:inline-flex;
    align-items:center;
    gap:8px;
    padding:0 15px;
    border:1px solid #dce2e9;
    border-radius:7px;
    background:#fff;
    color:#33445a;
    font-size:12px;
    font-weight:700;
    text-decoration:none;
}

.encore-profile-action-link:hover{
    color:var(--ep-red);
    border-color:#cfd6df;
}

@media(max-width:991.98px){
    .encore-profile-layout{grid-template-columns:1fr}
    .encore-profile-sidebar{border-right:0;border-bottom:1px solid var(--ep-line);padding:24px 18px}
    .encore-profile-sidebar-inner{position:static}
    .encore-profile-user{display:flex;align-items:center;gap:15px;text-align:left;padding:0 0 20px}
    .encore-profile-avatar{width:68px;height:68px;margin:0;font-size:21px}
    .encore-profile-nav{grid-template-columns:repeat(2,minmax(0,1fr))}
    .encore-profile-main{padding:26px 18px 45px}
}

@media(max-width:767.98px){
    .encore-profile-head{flex-direction:column}
    .encore-profile-stats{grid-template-columns:repeat(2,minmax(0,1fr))}
    .encore-profile-fields{grid-template-columns:1fr}
    .encore-profile-field.full{grid-column:auto}
}

@media(max-width:480px){
    .encore-profile-nav{grid-template-columns:1fr}
    .encore-profile-stats{grid-template-columns:1fr}
    .encore-profile-section{padding:21px 17px}
}
</style>