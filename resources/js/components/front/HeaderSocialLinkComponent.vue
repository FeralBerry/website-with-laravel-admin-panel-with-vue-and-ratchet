<template>
        <span v-if="item_data.second_email">
            <a :href="'mailto:'+item_data.second_email" class="cws_social_link" title="Google +">
                <i class="share-icon fa fa-google-plus" style="transform: matrix(0, 0, 0, 0, 0, 0);"></i>
            </a>
        </span>
        <span v-if="item_data.twitter">
            <a :href="item_data.twitter" class="cws_social_link" title="Twitter">
                <i class="share-icon fa fa-twitter"></i>
            </a>
        </span>
        <span v-if="item_data.fb">
            <a :href="item_data.fb" class="cws_social_link" title="Facebook">
                <i class="share-icon fa fa-facebook"></i>
            </a>
        </span>
        <span v-if="item_data.instagram">
            <a :href="item_data.instagram" class="cws_social_link" title="Instagram">
                <i class="share-icon fa fa-instagram"></i>
            </a>
        </span>
        <span v-if="item_data.youtube">
            <a :href="item_data.youtube" class="cws_social_link" title="Youtube">
                <i class="share-icon fa fa-youtube"></i>
            </a>
        </span>
        <span v-if="item_data.whatsapp">
            <a :href="item_data.whatsapp" class="cws_social_link" title="WhatsApp">
                <i class="share-icon fa fa-whatsapp"></i>
            </a>
        </span>
        <span v-if="item_data.telegram">
            <a :href="item_data.telegram" class="cws_social_link" title="Telegram">
                <i class="share-icon fa fa-telegram"></i>
            </a>
        </span>
</template>
<script>

    export default {
        name: "HeaderSocialLinkComponentComponent",
        props:['item_data'],
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
