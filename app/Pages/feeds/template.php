<div id="feeds" 
    x-data="$heroic({
        title: `<?= $page_title ?>`,
        url: `/feeds/data`,
        meta: {empty: true}
    })">

    <div class="appHeader bg-brand">
        <div class="left ps-2">
        </div>
        <div class="pageTitle text-white">Kabar Pesantren</div>
        <div class="right">
        </div>
    </div>

    <!-- App Capsule -->
    <div id="appCapsule">

        <div class="bg-success-2 rounded-bottom-4 pb-5" style="height: 150px; margin-bottom: 100px">

            <div class="section mt-0 p-2" style="max-width:470px;margin:auto">
                <template x-for="(article,articleIndex) in data.posts">
                    <div class="card border-top mb-3 shadow-lg">
                        <div class="card-header p-1">
                            <img :src="article.avatar ? article.avatar : `${base_url}mobilekit/assets/img/walisantri/avatar/user.png`" alt="image" class="imaged w32 rounded me-1">
                            <span x-text="article.author_name"></span>
                        </div>
                        <a :href="`/feeds/${article.id}`">
                            <img :src="article.medias[0].url" class="w-100" alt="image">
                        </a>
                        <div class="card-body px-3 pt-2 pb-2">
                            <small class="text-muted" x-text="$heroicHelper.formatDate(article.published_at)"></small>
                            <a :href="`/feeds/${article.id}`">
                                <h5 class="card-title fs-5" x-text="article.title"></h5>
                            </a>
                        </div>
                    </div>
                </template>

                <div class="text-center">
                    <button type="button" class="btn btn-outline-secondary my-3" x-show="!meta.empty" x-on:click="loadMore">Muat lainnya</button>
                    <p class="my-3 py-3" x-show="meta.empty">Tidak ada post lain.</p>
                </div>

            </div>
            <hr class="pb-5">
        </div>

    </div>
    <!-- * App Capsule -->
</div>