<template>
    <div id="bread_crumb">
        <bread-crumb-component :data="data" :key="componentKey"></bread-crumb-component>
    </div>
    <main>
        <section class="fullwidth-background bg-2">
            <div class="grid-row">
                <div class="login-block">
                    <div class="logo">
                        <img src="/logo.png" data-at2x="/logo.png" alt="" width="82" height="72">
                        <h2>Easy-Script</h2>
                    </div>
                    <form class="login-form" action="/register" method="post">
                        <input type="hidden" :value="csrf" name="_token">
                        <div class="form-group">
                            <input type="text" name="name" id="name" class="login-input" placeholder="Username">
                            <span class="input-icon">
								<i class="fa fa-user"></i>
							</span>
                        </div>
                        <div class="form-group">
                            <input type="text" class="login-input" id="email" name="email" placeholder="Email">
                            <span class="input-icon">
								<i class="fa fa-envelope-o"></i>
							</span>
                        </div>
                        <div class="form-group">
                            <input type="text" name="password" id="password" class="login-input" placeholder="Pasword">
                            <span class="input-icon">
								<i class="fa fa-lock"></i>
							</span>
                        </div>
                        <div class="form-group">
                            <input type="text" class="login-input" name="password_confirmation" placeholder="Confirm pasword">
                            <span class="input-icon">
								<i class="fa fa-lock"></i>
							</span>
                        </div>
                        <button class="button-fullwidth cws-button bt-color-3 border-radius">CREATE AN ACCOUNT</button>
                    </form>
                </div>
            </div>
        </section>
    </main>
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
