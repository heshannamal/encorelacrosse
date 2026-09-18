<section class="encore-instagram-section" id="encoreInstagramSection">
    <div class="encore-instagram-profile">
        <div class="encore-instagram-profile-inner">
            <a
                class="encore-instagram-avatar-link"
                href="https://www.instagram.com/encorelacrosse/"
                target="_blank"
                rel="noopener noreferrer"
                aria-label="Open Encore Lacrosse on Instagram"
            >
                <img
                    id="encoreInstagramProfileImage"
                    class="encore-instagram-avatar"
                    src="{{ asset('images/Encore_Logo.png') }}"
                    alt="Encore Lacrosse Instagram profile"
                >
            </a>

            <div class="encore-instagram-profile-main">
                <div class="encore-instagram-title-row">
                    <div>
                        <h2 id="encoreInstagramUsername">encorelacrosse</h2>
                        <div id="encoreInstagramName" class="encore-instagram-name">ENCORE LACROSSE</div>
                    </div>

                    <a
                        id="encoreInstagramFollowButton"
                        class="encore-instagram-follow"
                        href="https://www.instagram.com/encorelacrosse/"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        <i class="fa-brands fa-instagram"></i>
                        <span>Follow</span>
                    </a>
                </div>

                <div class="encore-instagram-stats" aria-label="Instagram account statistics">
                    <div><strong id="encoreInstagramPosts">--</strong><span>posts</span></div>
                    <div><strong id="encoreInstagramFollowers">--</strong><span>followers</span></div>
                    <div><strong id="encoreInstagramFollowing">--</strong><span>following</span></div>
                </div>

                <div class="encore-instagram-meta">
                    <div class="encore-instagram-category">Clothing (Brand)</div>
                    <p id="encoreInstagramBiography">A Lacrosse Lifestyle Company | San Francisco, CA</p>
                    <a
                        id="encoreInstagramWebsite"
                        href="https://encorelacrosse.com/"
                        target="_blank"
                        rel="noopener noreferrer"
                    >
                        <i class="fa-solid fa-link"></i>
                        <span>encorelacrosse.com</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="encore-instagram-grid" id="encoreInstagramGrid" aria-live="polite">
        @for($i = 0; $i < 8; $i++)
            <div class="encore-instagram-skeleton" aria-hidden="true"></div>
        @endfor
    </div>

    <div class="encore-instagram-state d-none" id="encoreInstagramState"></div>
</section>

<style>
.encore-instagram-section{
    width:100%;
    overflow:hidden;
    background:#0d1117;
    color:#fff;
    font-family:'Open Sans',Arial,sans-serif;
}
.encore-instagram-profile{
    padding:34px 20px 30px;
    background:#0d1117;
    border-top:1px solid #1f252d;
    border-bottom:1px solid #252b33;
}
.encore-instagram-profile-inner{
    width:min(900px,100%);
    margin:0 auto;
    display:grid;
    grid-template-columns:150px minmax(0,1fr);
    gap:28px;
    align-items:start;
}
.encore-instagram-avatar-link{
    display:flex;
    align-items:center;
    justify-content:center;
    width:142px;
    height:142px;
    border-radius:50%;
    overflow:hidden;
    background:#fff;
    border:2px solid #eee;
    text-decoration:none;
}
.encore-instagram-avatar{
    width:100%;
    height:100%;
    object-fit:cover;
    background:#fff;
}
.encore-instagram-profile-main{
    min-width:0;
}
.encore-instagram-title-row{
    display:flex;
    align-items:flex-start;
    justify-content:space-between;
    gap:20px;
}
.encore-instagram-title-row h2{
    margin:0;
    color:#fff;
    font-family:'Open Sans',Arial,sans-serif;
    font-size:23px;
    font-weight:700;
    line-height:1.15;
    text-transform:none;
}
.encore-instagram-name{
    margin-top:8px;
    color:#fff;
    font-size:12px;
    letter-spacing:.03em;
}
.encore-instagram-follow{
    min-height:38px;
    display:inline-flex;
    align-items:center;
    justify-content:center;
    gap:7px;
    padding:0 16px;
    border-radius:8px;
    background:#1877f2;
    color:#fff;
    font-size:12px;
    font-weight:700;
    text-decoration:none;
    transition:.2s ease;
}
.encore-instagram-follow:hover{
    background:#0f67dd;
    color:#fff;
    transform:translateY(-1px);
}
.encore-instagram-stats{
    display:flex;
    gap:28px;
    margin-top:16px;
}
.encore-instagram-stats>div{
    display:flex;
    align-items:baseline;
    gap:5px;
}
.encore-instagram-stats strong{
    color:#fff;
    font-size:14px;
    font-weight:700;
}
.encore-instagram-stats span{
    color:#fff;
    font-size:13px;
}
.encore-instagram-meta{
    margin-top:17px;
    max-width:650px;
    font-size:12px;
    line-height:1.55;
}
.encore-instagram-category{
    color:#a8b0bb;
}
.encore-instagram-meta p{
    margin:3px 0 5px;
    color:#fff;
    white-space:pre-line;
}
.encore-instagram-meta a{
    display:inline-flex;
    align-items:center;
    gap:6px;
    color:#dfe9f7;
    font-weight:600;
    text-decoration:none;
    overflow-wrap:anywhere;
}
.encore-instagram-meta a:hover{
    text-decoration:underline;
}
.encore-instagram-grid{
    display:grid;
    grid-template-columns:repeat(4,minmax(0,1fr));
    gap:1px;
    background:#11161d;
}
.encore-instagram-post,
.encore-instagram-skeleton{
    position:relative;
    display:block;
    width:100%;
    aspect-ratio:1/1;
    overflow:hidden;
    background:#20262d;
}
.encore-instagram-post{
    color:#fff;
    text-decoration:none;
}
.encore-instagram-post img{
    display:block;
    width:100%;
    height:100%;
    object-fit:cover;
    transition:transform .35s ease;
}
.encore-instagram-post:hover img,
.encore-instagram-post:focus img{
    transform:scale(1.045);
}
.encore-instagram-media-badge{
    position:absolute;
    top:11px;
    right:11px;
    z-index:3;
    width:26px;
    height:26px;
    display:flex;
    align-items:center;
    justify-content:center;
    color:#fff;
    font-size:15px;
    filter:drop-shadow(0 1px 2px rgba(0,0,0,.75));
}
.encore-instagram-overlay{
    position:absolute;
    inset:0;
    z-index:2;
    display:flex;
    align-items:center;
    justify-content:center;
    padding:18px;
    background:rgba(0,0,0,.63);
    opacity:0;
    transition:opacity .24s ease;
}
.encore-instagram-post:hover .encore-instagram-overlay,
.encore-instagram-post:focus .encore-instagram-overlay{
    opacity:1;
}
.encore-instagram-post-meta{
    display:flex;
    align-items:center;
    justify-content:center;
    gap:20px;
    font-size:16px;
    font-weight:700;
}
.encore-instagram-post-meta>span{
    display:inline-flex;
    align-items:center;
    gap:7px;
}
.encore-instagram-skeleton{
    background:linear-gradient(90deg,#1c2229 25%,#29313a 50%,#1c2229 75%);
    background-size:200% 100%;
    animation:encoreInstagramSkeleton 1.25s linear infinite;
}
@keyframes encoreInstagramSkeleton{
    from{background-position:200% 0}
    to{background-position:-200% 0}
}
.encore-instagram-state{
    padding:28px 20px;
    color:#b9c1cb;
    background:#0d1117;
    text-align:center;
    font-size:13px;
}
.encore-instagram-state a{
    color:#5ba7ff;
    font-weight:700;
    text-decoration:none;
}
@media(max-width:800px){
    .encore-instagram-profile-inner{
        grid-template-columns:105px minmax(0,1fr);
        gap:20px;
    }
    .encore-instagram-avatar-link{
        width:100px;
        height:100px;
    }
    .encore-instagram-grid{
        grid-template-columns:repeat(3,minmax(0,1fr));
    }
}
@media(max-width:600px){
    .encore-instagram-profile{
        padding:24px 15px 22px;
    }
    .encore-instagram-profile-inner{
        grid-template-columns:72px minmax(0,1fr);
        gap:14px;
    }
    .encore-instagram-avatar-link{
        width:70px;
        height:70px;
    }
    .encore-instagram-title-row{
        align-items:center;
    }
    .encore-instagram-title-row h2{
        font-size:18px;
    }
    .encore-instagram-name{
        font-size:10px;
    }
    .encore-instagram-follow{
        min-height:32px;
        padding:0 11px;
        font-size:10px;
    }
    .encore-instagram-stats{
        gap:13px;
        margin-top:13px;
        flex-wrap:wrap;
    }
    .encore-instagram-stats strong,
    .encore-instagram-stats span{
        font-size:11px;
    }
    .encore-instagram-meta{
        grid-column:1/-1;
        margin-top:12px;
        font-size:11px;
    }
    .encore-instagram-grid{
        grid-template-columns:repeat(2,minmax(0,1fr));
    }
}
</style>

<script>
(function(){
    const expectedUsername='encorelacrosse';
    const profileUrl='https://www.instagram.com/encorelacrosse/';
    const feedUrl=@json(route('instagram.feed'));

    const grid=document.getElementById('encoreInstagramGrid');
    const state=document.getElementById('encoreInstagramState');
    const profileImage=document.getElementById('encoreInstagramProfileImage');
    const profileName=document.getElementById('encoreInstagramName');
    const username=document.getElementById('encoreInstagramUsername');
    const posts=document.getElementById('encoreInstagramPosts');
    const followers=document.getElementById('encoreInstagramFollowers');
    const following=document.getElementById('encoreInstagramFollowing');
    const biography=document.getElementById('encoreInstagramBiography');
    const website=document.getElementById('encoreInstagramWebsite');
    const followButton=document.getElementById('encoreInstagramFollowButton');

    if(!grid||!state)return;

    function formatNumber(value){
        const n=Number(value);
        return Number.isFinite(n)?new Intl.NumberFormat().format(n):'0';
    }

    function enforceBrand(){
        if(username)username.textContent=expectedUsername;
        if(profileName)profileName.textContent='ENCORE LACROSSE';
        if(followButton)followButton.href=profileUrl;
    }

    function renderProfile(profile){
        profile=profile||{};
        enforceBrand();

        if(posts)posts.textContent=formatNumber(profile.posts);
        if(followers)followers.textContent=formatNumber(profile.followers);
        if(following)following.textContent=formatNumber(profile.following);

        const received=String(profile.username||'').toLowerCase().replace(/^@/,'');
        if(received===expectedUsername&&profile.profile_image&&profileImage){
            profileImage.src=profile.profile_image;
        }

        if(biography&&profile.biography){
            biography.textContent=profile.biography;
        }

        if(website&&profile.website){
            website.href=profile.website;
            const label=website.querySelector('span');
            if(label){
                try{
                    label.textContent=new URL(profile.website).hostname.replace(/^www\./,'');
                }catch(error){
                    label.textContent=profile.website;
                }
            }
        }
    }

    function renderPosts(items){
        grid.innerHTML='';

        if(!Array.isArray(items)||!items.length){
            state.textContent='No Encore Lacrosse Instagram posts are available right now.';
            state.classList.remove('d-none');
            return;
        }

        state.classList.add('d-none');

        items.slice(0,8).forEach(function(item){
            if(!item||!item.image_url||!item.permalink)return;

            const link=document.createElement('a');
            link.className='encore-instagram-post';
            link.href=item.permalink;
            link.target='_blank';
            link.rel='noopener noreferrer';
            link.setAttribute('aria-label',item.caption||'View Encore Lacrosse Instagram post');

            const image=document.createElement('img');
            image.src=item.image_url;
            image.alt=item.caption||'Encore Lacrosse Instagram post';
            image.loading='lazy';
            image.decoding='async';
            image.addEventListener('error',function(){link.remove()});
            link.appendChild(image);

            const mediaType=String(item.media_type||'').toUpperCase();
            const productType=String(item.media_product_type||'').toUpperCase();

            if(mediaType==='VIDEO'||productType==='REELS'){
                const badge=document.createElement('span');
                badge.className='encore-instagram-media-badge';
                badge.innerHTML='<i class="fa-solid fa-play"></i>';
                link.appendChild(badge);
            }else if(mediaType==='CAROUSEL_ALBUM'){
                const badge=document.createElement('span');
                badge.className='encore-instagram-media-badge';
                badge.innerHTML='<i class="fa-solid fa-clone"></i>';
                link.appendChild(badge);
            }

            const overlay=document.createElement('span');
            overlay.className='encore-instagram-overlay';

            const meta=document.createElement('span');
            meta.className='encore-instagram-post-meta';

            if(item.like_count!==null&&item.like_count!==undefined){
                const likes=document.createElement('span');
                likes.innerHTML='<i class="fa-solid fa-heart"></i><span>'+formatNumber(item.like_count)+'</span>';
                meta.appendChild(likes);
            }

            if(item.comments_count!==null&&item.comments_count!==undefined){
                const comments=document.createElement('span');
                comments.innerHTML='<i class="fa-solid fa-comment"></i><span>'+formatNumber(item.comments_count)+'</span>';
                meta.appendChild(comments);
            }

            overlay.appendChild(meta);
            link.appendChild(overlay);
            grid.appendChild(link);
        });

        if(!grid.children.length){
            state.textContent='No Encore Lacrosse Instagram posts are available right now.';
            state.classList.remove('d-none');
        }
    }

    function showFailure(){
        enforceBrand();
        grid.innerHTML='';
        state.innerHTML='Instagram is temporarily unavailable. <a href="'+profileUrl+'" target="_blank" rel="noopener noreferrer">Visit @encorelacrosse directly</a>.';
        state.classList.remove('d-none');
    }

    enforceBrand();

    fetch(feedUrl,{
        headers:{'Accept':'application/json'},
        cache:'no-store'
    })
        .then(function(response){
            return response.json().then(function(data){
                if(!response.ok||!data.success){
                    throw new Error(data.message||'Instagram feed unavailable');
                }

                const received=String(data.profile?.username||'').toLowerCase().replace(/^@/,'');
                if(received!==expectedUsername){
                    throw new Error('Unexpected Instagram account.');
                }

                return data;
            });
        })
        .then(function(data){
            renderProfile(data.profile||{});
            renderPosts(data.items||[]);
        })
        .catch(function(error){
            console.error('Encore Instagram feed failed:',error);
            showFailure();
        });
})();
</script>
