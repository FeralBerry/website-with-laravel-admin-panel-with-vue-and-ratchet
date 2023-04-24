<template>
    <span v-if="this.item_data.whatsapp">
        <a :href="'https://wa.me/'+this.item_data.whatsapp" class="fa fa-whatsapp"></a>
    </span>
    <span v-if="this.item_data.telegram">
        <a :href="'https://t.me/'+this.item_data.telegram" class="fa fa-telegram"></a>
    </span>
    <span v-if="this.item_data.vk">
        <a :href="this.item_data.vk" class="fa fa-vk"></a>
    </span>
    <span v-if="this.item_data.git">
        <a :href="this.item_data.git" class="fa fa-github"></a>
    </span>
    <span v-if="this.item_data.fb">
        <a :href="this.item_data.fb" class="fa fa-facebook"></a>
    </span>
    <span v-if="this.item_data.instagram">
        <a :href="this.item_data.instagram" class="fa fa-instagram"></a>
    </span>
    <span v-if="this.item_data.twitter">
        <a :href="this.item_data.twitter" class="fa fa-twitter"></a>
    </span>
    <span v-if="this.item_data.youtube">
        <a :href="this.item_data.youtube" class="fa fa-youtube"></a>
    </span>
</template>
<script>
    export default {
        name: "ContactLinksComponent",
        props: ['item_data'],
        data(){
            return{

            }
        },
        mounted() {

        },
        created() {

        }
    }
</script>
