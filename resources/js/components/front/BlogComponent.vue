<template>
    <div>
        <bread-crumb-component :data="data"></bread-crumb-component>
        <div class="page-content">
            <div class="container">
                <!-- main content -->
                <main>
                    <section>
                        <div class="clear-fix">
                            <div class="grid-col-row" id="blog_items">

                            </div>
                            <div class="page-pagination clear-fix margin-none" id="paginate_item"></div>
                        </div>
                    </section>
                </main>
                <!-- / main content -->
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: "BlogComponent",
        props: ['data'],
        data(){
            return{
                paginate_item:'',
            }
        },
        mounted() {

        },
        created() {

        }
    }
</script>
