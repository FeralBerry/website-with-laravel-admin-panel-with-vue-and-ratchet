<template>
    <div class="header-top-panel">
        <div id="top_social_links_wrapper">
            <div class="share-toggle-button"><i class="share-icon fa fa-share-alt"></i></div>
            <div class="cws_social_links">
                <HeaderSocialLinkComponent v-for="item in this.data" :key="item.id" :item_data="item">

                </HeaderSocialLinkComponent>
            </div>
        </div>
    </div>
</template>
<script>
    import HeaderSocialLinkComponent from "./HeaderSocialLinkComponent";
    export default {
        name: "HeaderSocialLinksComponentComponent",
        props: ['data'],
        components: {HeaderSocialLinkComponent},
        data(){
            return {

            }
        },

        mounted() {

        },
        created() {

        },
    }
</script>
