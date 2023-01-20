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
                            <!--<div class="form-group">
                                <input type="text" class="login-input" placeholder="Username">
                                <span class="input-icon">
								<i class="fa fa-user"></i>
							</span>
                            </div>-->
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
                            <!--<div class="form-group">
                                <input type="text" class="login-input" placeholder="Confirm pasword">
                                <span class="input-icon">
								<i class="fa fa-lock"></i>
							</span>
                            </div>-->
                            <button class="button-fullwidth cws-button bt-color-3 border-radius">CREATE AN ACCOUNT</button>
                        </form>
                    </div>
                </div>
            </section>
        </main>
    </div>
    <!-- page content -->
    <!--<div class="page-content woocommerce">
        &lt;!&ndash; contact form section &ndash;&gt;
        <div class="grid-row clear-fix">
            <div class="grid-col-row">
                <div class="grid-col grid-col-8">
                    <section>
                        <h2>Contact us</h2>
                        <div class="widget-contact-form">
                            &lt;!&ndash; contact-form &ndash;&gt;
                            <div class="info-boxes error-message alert-boxes error-alert" id="feedback-form-errors">
                                <strong>Attention!</strong>
                                <div class="message"></div>
                            </div>
                            <div class="email_server_responce"></div>
                            <form action="php/contacts-process.php" method="post" class="contact-form alt clear-fix">
                                <input type="text" name="name" value="" size="40" placeholder="Your Name" aria-invalid="false" aria-required="true">
                                <input type="text" name="email" value="" size="40" placeholder="Your Email" aria-required="true">
                                <input type="text" name="subject" value="" size="40" placeholder="Subject" aria-invalid="false" aria-required="true">
                                <textarea name="message"  cols="40" rows="3" placeholder="Your Message" aria-invalid="false" aria-required="true"></textarea>
                                <input type="submit" value="Send" class="cws-button border-radius alt">
                            </form>
                            &lt;!&ndash;/contact-form &ndash;&gt;
                        </div>
                    </section>
                </div>
                <div class="grid-col grid-col-4 widget-address">
                    <section>
                        <h2>Our Offices</h2>
                        <address>
                            <p>Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis justo at suscipit. Etiam id faucibus augue, sit amet ultricies nisi.</p>
                            <p><strong class="fs-18">Address:</strong><br/>250 Biscayne Blvd. (North) 11st Floor<br/>New World Tower Miami, Florida 33148</p>
                            <p><strong class="fs-18">Phone number:</strong><br/>
                                <a href="tel:305-333552">(305)333-5522</a><br/>
                                <a href="tel:305-333552">(305)333-5522</a>
                            </p>
                            <p><strong class="fs-18">E-mail:</strong><br/>
                                <a href="mailto:uni@domain.com">uni@domain.com</a><br/>
                                <a href="mailto:uni@domain.com">sales@your-site.com</a>
                            </p>
                        </address>
                    </section>
                </div>
            </div>
        </div>
        &lt;!&ndash; / contact form section &ndash;&gt;
    </div>-->
    <!-- / page content -->
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
