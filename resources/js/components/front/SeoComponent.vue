<template>
    <div>
    </div>
</template>
<script>
    export default {
        name: "SeoComponent",
        props: ['data'],
        mounted() {

        },
        created() {
            let data = this.data.seo;
            data.map( (item) => {
                if(item.url === window.location.pathname){
                    document.querySelector('meta[name="description"]').setAttribute("content", ""+item.description+"");
                    document.querySelector('head title').textContent = item.title;
                }
            });
        }
    }
</script>
