<template>
    <div id="bread_crumb">
        <bread-crumb-component :data="data" :key="componentKey"></bread-crumb-component>
    </div>
    <div>
        <main>
            <section class="fullwidth-background bg-2">
                <div class="grid-row">
                    <div class="login-block">
                        <div class="logo">
                            <img src="img/logo@2x.png" data-at2x="img/logo@2x.png" alt="" width="82" height="72">
                            <h2>uniLearn</h2>
                        </div>
                        <form class="login-form" method="POST" action="/login" >
                            <input name="_token" type="hidden" :value="csrf">
                            <div class="form-group">
                                <input type="text" name="email" class="login-input" placeholder="Email">
                                <span class="input-icon">
								<i class="fa fa-envelope-o"></i>
							</span>
                            </div>
                            <div class="form-group">
                                <input type="password" class="login-input" name="password" placeholder="Pasword">
                                <span class="input-icon">
								<i class="fa fa-lock"></i>
							</span>
                            </div>
                            <button class="button-fullwidth cws-button bt-color-3 border-radius">LOGIN</button>
                        </form>
                    </div>
                </div>
            </section>
        </main>
    </div>
</template>
<script>
    import BreadCrumbComponent from "./BreadCrumbComponent";
    export default {
        name: "ContactComponent",
        components: {BreadCrumbComponent},
        props: {
            data:'data',
        },
        data(){
            return {
                componentKey:0,
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        },
        mounted() {

        },
        watch: {
            '$route' (to, from) {
                this.componentKey += 1;
                let data = this.data.seo;
                data.map( (item) => {
                    if('/public'+item.url === window.location.pathname){
                        document.querySelector('meta[name="description"]').setAttribute("content", ""+item.description+"");
                        document.querySelector('head title').textContent = item.title;
                    }
                });
            }
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
