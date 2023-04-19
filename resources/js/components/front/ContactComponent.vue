<template>
    <div>
        <bread-crumb-component :data="data"></bread-crumb-component>
        <div class="grid-row clear-fix">
            <div class="grid-col-row">
                <div class="grid-col grid-col-8">
                    <section>
                        <h2>Оставить сообщение</h2>
                        <div class="widget-contact-form">
                            <!-- contact-form -->
                            <div class="info-boxes error-message alert-boxes error-alert" id="feedback-form-errors">
                                <strong>Attention!</strong>
                                <div class="message"></div>
                            </div>
                            <div class="email_server_responce"></div>
                            <form method="post" class="contact-form alt clear-fix" novalidate="novalidate">
                                <input type="text" name="name" value="" size="40" placeholder="Как к Вам обращаться" aria-invalid="false" aria-required="true">
                                <input type="text" name="email" value="" size="40" placeholder="Email" aria-required="true">
                                <input type="text" name="subject" value="" size="40" placeholder="Тема обращения" aria-invalid="false" aria-required="true">
                                <textarea name="message" cols="40" rows="3" placeholder="Сообщение" aria-invalid="false" aria-required="true"></textarea>
                                <input type="submit" value="Отправить" class="cws-button border-radius alt">
                            </form>
                            <!--/contact-form -->
                        </div>
                    </section>
                </div>
                <div class="grid-col grid-col-4 widget-address">
                    <section>
                        <h2>Контакты</h2>
                        <address>
                            <div v-for="item in data.quotes_footer">
                                <h3>{{ item.author }}</h3>
                                <p>{{ item.quotes }}</p>
                            </div>
                            <div v-for="item in data.contacts">
                                <div v-if="item.phone || item.whatsapp || item.telegram">
                                    <p><strong class="fs-18">Телефон:</strong><br>
                                        <span v-if="item.phone">
                                            <a :href="'tel:'+item.phone"><i class="fa fa-phone" aria-hidden="true"></i> Позвонить</a><br>
                                        </span>
                                        <span v-if="item.whatsapp">
                                            <a :href="'https://wa.me/'+item.whatsapp"><i class="fa fa-whatsapp" aria-hidden="true"></i> Написать </a><br>
                                        </span>
                                        <span v-if="item.telegram">
                                            <a :href="'https://t.me/'+item.telegram"><i class="fa fa-telegram" aria-hidden="true"></i> Написать </a>
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <div v-for="item in data.contacts">
                                <div v-if="item.email || item.second_email">
                                    <p><strong class="fs-18">E-mail:</strong><br>
                                        <span v-if="item.email">
                                            <a :href="'mailto:'+item.email">{{ item.email }}</a><br>
                                        </span>
                                        <span v-if="item.second_email">
                                            <a :href="'mailto:'+item.second_email">{{ item.second_email }}</a>
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <aside class="widget-subscribe" v-for="item in data.contacts">
                                <div v-if="item.vk || item.git || item.fb || item.instagram || item.twitter || item.youtube">
                                    <span v-if="item.vk">
                                        <a :href="item.vk" class="fa fa-vk"></a>
                                    </span>
                                    <span v-if="item.git">
                                        <a :href="item.git" class="fa fa-github"></a>
                                    </span>
                                    <span v-if="item.fb">
                                        <a :href="item.fb" class="fa fa-facebook"></a>
                                    </span>
                                    <span v-if="item.instagram">
                                        <a :href="item.instagram" class="fa fa-instagram"></a>
                                    </span>
                                    <span v-if="item.twitter">
                                        <a :href="item.twitter" class="fa fa-twitter"></a>
                                    </span>
                                    <span v-if="item.youtube">
                                        <a :href="item.youtube" class="fa fa-youtube"></a>
                                    </span>
                                </div>
                            </aside>
                        </address>
                    </section>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: "ContactComponent",
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
