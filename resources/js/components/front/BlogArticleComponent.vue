<template>
    <div>
        <bread-crumb-component :data="data"></bread-crumb-component>
        Блог
    </div>
</template>
<script>
    export default {
        name: "BlogArticleComponent",
        props: ['data'],
        mounted() {

        },
        created() {
            let data = this.data.seo;
            data.map( (item) => {
                if('/public'+item.url === window.location.pathname){
                    document.querySelector('meta[name="description"]').setAttribute("content", ""+item.description+"");
                    document.querySelector('head title').textContent = item.title;
                }
            });
        }
    }
</script>
