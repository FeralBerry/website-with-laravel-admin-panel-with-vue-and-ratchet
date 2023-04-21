<template>
    <ul id="shop_category_link" v-for="item in data">
        <template v-if="item.submenu === 4">
            <li class="cat-item cat-item-1 current-cat"><router-link :to="item.href">{{item.title}}<span></span></router-link></li>
        </template>
    </ul>
</template>
<script>
    export default {
        name: "ShopCatLinkComponent",
        props: ['data'],
        mounted() {

        },
        created() {

        }
    }
</script>
