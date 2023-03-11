<template>
    <footer>
        <div class="grid-row">
            <div class="grid-col-row clear-fix">
                <section class="grid-col grid-col-4 footer-about">
                    <h2 class="corner-radius">Контакты</h2>
                    <div v-for="item in data.quotes_footer">
                        <h3>{{ item.author }}</h3>
                        <p>{{ item.quotes }}</p>
                    </div>
                    <address>
                        <p></p>
                        <a href="tel:+79687106270" class="phone-number">+79687106270</a>
                        <br />
                        <a href="mailto:uni@domain.com" class="email">uni@domain.com</a>
                        <br />
                        <a href="www.sample.com" class="site">www.sample.com</a>
                    </address>
                    <div class="footer-social">
                        <a href="https://wa.me/79687106270" class="fa fa-phone"></a>
                        <a href="https://github.com/FeralBerry" class="fa fa-github"></a>
                        <a href="mailto:pusiket90@yandex.ru" class="fa fa-envelope-o"></a>
                        <a href="" class="fa fa-youtube"></a>
                    </div>
                </section>
                <section class="grid-col grid-col-4 footer-latest">
                    <h2 class="corner-radius">Последние новости</h2>
                    <div v-html="this.footer_blog"></div>

                </section>
                <section class="grid-col grid-col-4 footer-contact-form">
                    <h2 class="corner-radius">Написать предложение</h2>
                    <div class="email_server_responce"></div>
                        <p><span class="your-name"><input type="text" name="name" id="footer_name" value="" size="40" placeholder="Name" aria-invalid="false" required></span>
                        </p>
                        <span style="display: none;color: red" id="footer_name_error">Имя не может быть меньше 3 и не больше 255 символов.</span>
                        <p><span class="your-email"><input type="text" name="phone" id="footer_phone" value="" size="40" placeholder="Phone" aria-invalid="false" required></span> </p>
                    <span style="display: none;color: red" id="footer_phone_error">Телефон или Email не должны превышать 50 символов</span>
                    <p><span class="your-message"><textarea name="message" id="footer_message" placeholder="Comments" cols="40" rows="5" aria-invalid="false" required></textarea></span> </p>
                    <span style="display: none;color: red" id="footer_message_error">Сообщение должно быть не менее 3 символов</span>
                    <span style="display: none;color: greenyellow" id="footer_success">Сообщение успешно отправленно</span>
                    <a @click="send_footer_contact()" class="cws-button bt-color-3 border-radius alt icon-right" style="color:#fff">Отправить <i class="fa fa-angle-right"></i></a>
                </section>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="grid-row clear-fix">
                <div class="copyright">uniLearn<span></span> 2015 . All Rights Reserved</div>
                <nav class="footer-nav">
                    <ul class="clear-fix">
                        <li>
                            <router-link to="/">Главная</router-link>
                        </li>
                        <li>
                            <router-link to="/blog">Блог</router-link>
                        </li>
                        <!--<li>
                            <a href="content-elements.html">Plans</a>
                        </li>
                        <li>
                            <a href="blog-default.html">News</a>
                        </li>
                        <li>
                            <a href="page-about-us.html">Pages</a>
                        </li>-->
                        <li>
                            <router-link to="/contact">Контакты</router-link>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </footer>
</template>
<script>
    export default {
        name: "FooterComponent",
        props: ['data'],
        data(){
            return {
                footer_blog:'',
                connection:new WebSocket("ws://127.0.0.1:4710"),
            }
        },
        mounted() {

        },
        created() {
            this.data.footer_blog.map((item) => {
                let brief = '';
                let div = document.createElement('div');
                if(item.description != null){
                    div.innerText = item.description;
                    brief = div.innerText.replace( /(<([^>]+)>)/ig, '');
                    brief = brief.substr(0,100);
                }
                let date = new Date(item.created_at);
                let hour = date.getHours();
                let minute = date.getMinutes();
                let year = date.getFullYear();
                let mounth = date.getMonth();
                if(mounth === 1){mounth = 'Января'}
                if(mounth === 2){mounth = 'Февраля'}
                if(mounth === 3){mounth = 'Марта'}
                if(mounth === 4){mounth = 'Апреля'}
                if(mounth === 5){mounth = 'Мая'}
                if(mounth === 6){mounth = 'Июнь'}
                if(mounth === 7){mounth = 'Июля'}
                if(mounth === 8){mounth = 'Августа'}
                if(mounth === 9){mounth = 'Сентября'}
                if(mounth === 10){mounth = 'Октября'}
                if(mounth === 11){mounth = 'Ноября'}
                if(mounth === 12){mounth = 'Декабря'}
                let day = date.getDate();
                this.footer_blog += '<article><h3><a class="footer_blog" href="/blog/'+item.id+'">'+item.title+'</a></h3>' +
                    '<div class="course-date">' +
                    '   <div>'+hour+'<sup>'+minute+'</sup></div>' +
                    '   <div>'+day+' '+mounth+' '+year+'</div>' +
                    '</div>' +
                    '<p>'+brief+'...</p>' +
                    '</article>';
            });
            this.connection.onmessage = function(event){
                let data = JSON.parse(event.data);
                if(data.message === 'footer_name_error'){
                    let footer_name_error = document.getElementById('footer_name_error');
                    footer_name_error.style.display = 'block';
                    setTimeout(function() {
                        $('#footer_name_error').fadeOut('fast');
                    }, 3000);
                } else if(data.message === 'footer_phone_error'){
                    let footer_phone_error = document.getElementById('footer_phone_error');
                    footer_phone_error.style.display = 'block';
                    setTimeout(function() {
                        $('#footer_phone_error').fadeOut('fast');
                    }, 3000);
                } else if(data.message === 'footer_message_error'){
                    let footer_message_error = document.getElementById('footer_message_error');
                    footer_message_error.style.display = 'block';
                    setTimeout(function() {
                        $('#footer_message_error').fadeOut('fast');
                    }, 3000);
                } else if(data.message === 'footer_success'){
                    let footer_success = document.getElementById('footer_success');
                    footer_success.style.display = 'block';
                    setTimeout(function() {
                        $('#footer_success').fadeOut('fast');
                    }, 5000);
                }
            };
        },
        methods:{
            send_footer_contact(){
                let footer_name = document.getElementById('footer_name').value;
                let footer_phone = document.getElementById('footer_phone').value;
                let footer_message = document.getElementById('footer_message').value;
                this.connection.send('{"command":"front_footer_message","footer_name":"'+footer_name+'","footer_phone":"'+footer_phone+'","footer_message":"'+footer_message+'"}');
            }
        },
    }
</script>
