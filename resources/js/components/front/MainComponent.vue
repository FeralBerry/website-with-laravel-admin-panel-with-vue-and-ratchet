<template>
    <slider-component :data="{'data':data.slider}">

    </slider-component>
    <section class="fullwidth-background padding-section">
        <div class="grid-row clear-fix">
            <div class="grid-col-row">
                <div class="grid-col grid-col-6 service-icon-menu">
                    <a id="icon-wrench" onclick="service_menu(1)" class="service-icon active"><i class="fa fa-wrench"></i></a>
                    <a id="icon-tachometer" onclick="service_menu(2)" class="service-icon"><i class="fa fa-tachometer"></i></a>
                    <a id="icon-website" onclick="service_menu(3)" class="service-icon"><i class="flaticon-website"></i></a>
                    <a id="icon-programming" onclick="service_menu(4)" class="service-icon"><i class="flaticon-web-programming"></i></a>
                    <a id="icon-camera" onclick="service_menu(5)" class="service-icon"><i class="flaticon-camera"></i></a>
                    <a id="icon-speech" onclick="service_menu(6)" class="service-icon"><i class="flaticon-speech"></i></a>
                    <a id="icon-sitemap" onclick="service_menu(7)" class="service-icon"><i class="fa fa-sitemap"></i></a>
                    <a id="icon-terminal" onclick="service_menu(8)" class="service-icon"><i class="fa fa-terminal"></i></a>
                </div>
                <div class="grid-col grid-col-6 clear-fix" id="about">
                    <h2>О сервисе</h2>
                    <p>Сервис предназначен для обучения программирования, есть как платные, так и бесплатные курсы.
                        Во время обучения вы сможите изучить интересующий Вас курс, создать набор скриптов и создать
                        первый свой сайт с применением современных технологий.</p>
                    <a class="cws-button bt-color-3 border-radius alt icon-right float-right">
                        Зарегистрироваться<i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>
    </section>
    <div class="parallaxed">
        <div class="parallax-image" data-parallax-left="0.5" data-parallax-top="0.3" data-parallax-scroll-speed="0.5" style="transform: translateY(0px); left: -23px;">
            <img src="/front/img/parallax.png" alt="" style="height: auto; width: 796.875px;">
        </div>
        <div class="them-mask bg-color-1"></div>
        <div class="grid-row">
            <div class="grid-col-row clear-fix">
                <div class="grid-col grid-col-3 alt">
                    <div class="counter-block">
                        <i class="flaticon-book1"></i>
                        <div class="counter" :data-count="data.count_all_courses">{{ data.count_all_courses }}</div>
                        <div class="counter-name">Уроков</div>
                    </div>
                </div>
                <div class="grid-col grid-col-3 alt">
                    <div class="counter-block">
                        <i class="flaticon-multiple"></i>
                        <div class="counter" :data-count="data.count_users">{{ data.count_users }}</div>
                        <div class="counter-name">Пользователей</div>
                    </div>
                </div>
                <div class="grid-col grid-col-3 alt">
                    <div class="counter-block">
                        <i class="flaticon-pencil"></i>
                        <div class="counter" :data-count="data.count_task_all_courses">{{ data.count_task_all_courses }}</div>
                        <div class="counter-name">Практических заданий</div>
                    </div>
                </div>
                <div class="grid-col grid-col-3 alt">
                    <div class="counter-block last">
                        <i class="fa fa-video-camera"></i>
                        <div class="counter" :data-count="data.count_video_all_courses">{{ data.count_video_all_courses }}</div>
                        <div class="counter-name">Видео уроков</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr class="divider-color">
    <section class="fullwidth-background padding-section">
        <div class="grid-row">
            <h2 class="center-text">Как всё работает?</h2>
            <!-- time line -->
            <div class="time-line">
                <div class="line-element">
                    <div class="action">
                        <div class="action-block">
                            <span><i class="flaticon-magnifier"></i></span>
                            <div class="text">
                                <h3>Регистрируетесь на сайте</h3>
                                <p>Получаете доступ к бесплатным курсам по обучению. К нескольким бесплатным скриптам и бесплатным шаблонам сайта с которыми потом сможете работать.</p>
                            </div>
                        </div>
                    </div>
                    <div class="level">
                        <div class="level-block">Этап 1</div>
                    </div>
                </div>
                <div class="line-element color-2">
                    <div class="level">
                        <div class="level-block">Этап 2</div>
                    </div>
                    <div class="action">
                        <div class="action-block">
                            <span><i class="flaticon-computer"></i></span>
                            <div class="text">
                                <h3>Выбираете понравившееся направление</h3>
                                <p>После изучения бесплатного материала и попробовав изучение на сайте,
                                    выбираете направление в ИТ разработке или дизайне. Оплачиваете и получаете доступ к определенному курсу и материалам.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="line-element color-3">
                    <div class="action">
                        <div class="action-block">
                            <span><i class="flaticon-shopping"></i></span>
                            <div class="text">
                                <h3>Получение сертификата</h3>
                                <p>После изучения платного курса вы получаете сертификат и доступ ко всем изученым материалам.</p>
                            </div>
                        </div>
                    </div>
                    <div class="level">
                        <div class="level-block">Этап 3</div>
                    </div>
                </div>
            </div>
            <!-- / time line -->
        </div>
    </section>
    <div class="parallaxed">
        <div class="parallax-image" data-parallax-left="0.5" data-parallax-top="0.3" data-parallax-scroll-speed="0.5" style="transform: translateY(-24px) translateZ(0px); left: 0px;">
            <img src="/front/img/parallax.png" alt="" style="height: auto; width: 917px;">
        </div>
        <div class="them-mask bg-color-2"></div>
        <div class="grid-row center-text">
            <div class="font-style-1 margin-none">Оставить заявку для связи</div>
            <div class="divider-mini"></div>
            <p class="parallax-text">Оставьте свой контакт для связи. По сотрудничеству или по вопросам связанным с курсами.</p>
            <form class="subscribe">
                <input type="text" name="email" value="" size="40" placeholder="Enter your email or phone" aria-required="true"><input type="submit" value="Отправить">
            </form>
        </div>
    </div>
    <section class="padding-section">
        <div class="grid-row clear-fix">
            <h2 class="center-text">Часто задаваемые вопросы</h2>
            <div class="grid-col-row">
                <div class="grid-col grid-col-6">
                    <h3>Почему лучше выбрать сервис</h3>
                    <p>Сервис сделан на новейших технология как программирования так и обучения.</p>
                    <!-- accordions -->
                    <div class="accordions" style="font-size:20px">
                        <!-- content-title -->
                        <div id="content_title_1" class="content-title">Большое количество бесплатным материалов</div>
                        <!--/content-title -->
                        <!-- accordions content -->
                        <div id="accordion_content_1" class="content" style="display: none;">После регистрации уже сразу доступны бесплатные материалы для обучения с возможностями самопроверки.</div>
                        <!--/accordions content -->
                        <!-- content-title -->
                        <div id="content_title_2" class="content-title">Интерактивные задания</div>
                        <!--/content-title -->
                        <!-- accordions content -->
                        <div id="accordion_content_2" class="content" style="display: none;">В процессе обучения доступны интерактивные задания, при выполнении которых можно сразу видеть результат.</div>
                        <!--/accordions content -->
                        <!-- content-title -->
                        <div id="content_title_3" class="content-title">Видео инструкции</div>
                        <!--/content-title -->
                        <!-- accordions content -->
                        <div id="accordion_content_3" class="content" style="display: none;">Большая часть заданий сопровождается видео инструкциями, по которым можно разобраться с проблемами, которые не получилось решить самостоятельно.</div>
                        <!--/accordions content -->
                        <!-- content-title -->
                        <div id="content_title_4" class="content-title">Написание скриптов</div>
                        <!--/content-title -->
                        <!-- accordions content -->
                        <div id="accordion_content_4" class="content" style="display: none;">В процессе обучения пишутся и разбираются, как работают, скрипты, которые могут понадобится для дальнейшей работе.</div>
                        <!--/accordions content -->
                    </div>
                    <!--/accordions -->
                    <router-link to="/register" class="cws-button bt-color-3 border-radius alt icon-right">Зарегистрироваться<i class="fa fa-angle-right"></i></router-link>
                </div>
                <slider-faq-component :data="{'data':data.faq_slider}">

                </slider-faq-component>
            </div>
        </div>
    </section>
</template>
<script>
    export default {
        name: "MainComponent",
        props: ['data'],
        data(){
            return{

            }
        },
        mounted() {
            $('body').on('click','#content_title_1', function (){
                this.classList.add('active');
                document.getElementById('content_title_2').classList.remove('active')
                document.getElementById('content_title_3').classList.remove('active')
                document.getElementById('content_title_4').classList.remove('active')
                document.getElementById('accordion_content_1').style.display = 'block';
                document.getElementById('accordion_content_2').style.display = 'none';
                document.getElementById('accordion_content_3').style.display = 'none';
                document.getElementById('accordion_content_4').style.display = 'none';
            });
            $('body').on('click','#content_title_2', function (){
                this.classList.add('active');
                document.getElementById('content_title_1').classList.remove('active')
                document.getElementById('content_title_3').classList.remove('active')
                document.getElementById('content_title_4').classList.remove('active')
                document.getElementById('accordion_content_1').style.display = 'none';
                document.getElementById('accordion_content_2').style.display = 'block';
                document.getElementById('accordion_content_3').style.display = 'none';
                document.getElementById('accordion_content_4').style.display = 'none';
            });
            $('body').on('click','#content_title_3', function (){
                this.classList.add('active');
                document.getElementById('content_title_1').classList.remove('active')
                document.getElementById('content_title_2').classList.remove('active')
                document.getElementById('content_title_4').classList.remove('active')
                document.getElementById('accordion_content_1').style.display = 'none';
                document.getElementById('accordion_content_2').style.display = 'none';
                document.getElementById('accordion_content_3').style.display = 'block';
                document.getElementById('accordion_content_4').style.display = 'none';
            });
            $('body').on('click','#content_title_4', function (){
                this.classList.add('active');
                document.getElementById('content_title_1').classList.remove('active')
                document.getElementById('content_title_2').classList.remove('active')
                document.getElementById('content_title_3').classList.remove('active')
                document.getElementById('accordion_content_1').style.display = 'none';
                document.getElementById('accordion_content_2').style.display = 'none';
                document.getElementById('accordion_content_3').style.display = 'none';
                document.getElementById('accordion_content_4').style.display = 'block';
            });
        },
        created() {
            let data = this.data.seo;
            data.map( (item) => {
                if(window.location.origin + '/' === window.location.href && item.url === '/'){
                    document.querySelector('meta[name="description"]').setAttribute("content", ""+item.description+"");
                    document.querySelector('head title').textContent = item.title;
                }
            });


        },
    }
</script>
<style>
    .faq {
        display: none;
    }
    .faq-show {
        display: block;
        animation: showBlock 1s linear forwards;
    }
    @keyframes showBlock {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }
</style>
