<template>
    <slider-component></slider-component>
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
    <!--<div id="home" class="page-content padding-none">
        &lt;!&ndash; section &ndash;&gt;
        <section class="padding-section">
            <div class="grid-row clear-fix">
                <h2 class="center-text">Latest Courses</h2>
                <div class="grid-col-row">
                    <div class="grid-col grid-col-4">
                        &lt;!&ndash; course item &ndash;&gt;
                        <div class="course-item">
                            <div class="course-hover">
                                <div class="hover-bg bg-color-1"></div>
                                <a href="">Learn More</a>
                            </div>
                            <div class="course-name clear-fix">
                                <span class="price">$75</span>
                                <h3><a href="#">Science In The New Era</a></h3>
                            </div>
                            <div class="course-date bg-color-1 clear-fix">
                                <div class="day"><i class="fa fa-calendar"></i>11 January</div><div class="time"><i class="fa fa-clock-o"></i>At 3:00 pm</div>
                                <div class="divider"></div>
                                <div class="description">Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis</div>
                            </div>
                        </div>
                        &lt;!&ndash; / course item &ndash;&gt;
                    </div>
                    <div class="grid-col grid-col-4">
                        &lt;!&ndash; course item &ndash;&gt;
                        <div class="course-item">
                            <div class="course-hover">
                                <div class="hover-bg bg-color-2"></div>
                                <a href="">Learn More</a>
                            </div>
                            <div class="course-name clear-fix">
                                <span class="price">Free</span>
                                <h3><a href="#">Campus Party</a></h3>
                            </div>
                            <div class="course-date bg-color-2 clear-fix">
                                <div class="day"><i class="fa fa-calendar"></i>12 January</div><div class="time"><i class="fa fa-clock-o"></i>At 4:00 pm</div>
                                <div class="divider"></div>
                                <div class="description">Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis</div>
                            </div>
                        </div>
                        &lt;!&ndash; / course item &ndash;&gt;
                    </div>
                    <div class="grid-col grid-col-4">
                        &lt;!&ndash; course item &ndash;&gt;
                        <div class="course-item">
                            <div class="course-hover">
                                <div class="hover-bg bg-color-3"></div>
                                <a href="">Learn More</a>
                            </div>
                            <div class="course-name clear-fix">
                                <span class="price">$45</span>
                                <h3><a href="#">Design Practice</a></h3>
                            </div>
                            <div class="course-date bg-color-3 clear-fix">
                                <div class="day"><i class="fa fa-calendar"></i>22 January</div><div class="time"><i class="fa fa-clock-o"></i>At 6:30 pm</div>
                                <div class="divider"></div>
                                <div class="description">Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis</div>
                            </div>
                        </div>
                        &lt;!&ndash; course item &ndash;&gt;
                    </div>
                </div>
            </div>
        </section>
        &lt;!&ndash; / section &ndash;&gt;
        <hr class="divider-color" />
        &lt;!&ndash; section &ndash;&gt;
        <section class="fullwidth-background padding-section">
            <div class="grid-row clear-fix">
                <div class="grid-col-row">
                    <div class="grid-col grid-col-6">
                        <a href="" class="service-icon"><i class="flaticon-pie"></i></a>
                        <a href="" class="service-icon"><i class="flaticon-medical"></i></a>
                        <a href="" class="service-icon"><i class="flaticon-restaurant"></i></a>
                        <a href="" class="service-icon"><i class="flaticon-website"></i></a>
                        <a href="" class="service-icon"><i class="flaticon-hotel"></i></a>
                        <a href="" class="service-icon"><i class="flaticon-web-programming"></i></a>
                        <a href="" class="service-icon"><i class="flaticon-camera"></i></a>
                        <a href="" class="service-icon"><i class="flaticon-speech"></i></a>
                    </div>
                    <div class="grid-col grid-col-6 clear-fix">
                        <h2>Our Services</h2>
                        <p>Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis justo at susp. Vivamus orci urna, ornare vitae tellus in, condimentum imperdiet eros. Maecea accumsan, massa nec vulputate congue. Maecenas nec odio et ante tincidunt creptus alarimus tempus.</p>
                        <a href="" class="cws-button bt-color-3 border-radius alt icon-right float-right">Learn More<i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </section>
        &lt;!&ndash; / section &ndash;&gt;
        &lt;!&ndash; paralax section &ndash;&gt;
        <div class="parallaxed">
            <div class="parallax-image" data-parallax-left="0.5" data-parallax-top="0.3" data-parallax-scroll-speed="0.5">
                <img src="" alt="">
            </div>
            <div class="them-mask bg-color-1"></div>
            <div class="grid-row">
                <div class="grid-col-row clear-fix">
                    <div class="grid-col grid-col-3 alt">
                        <div class="counter-block">
                            <i class="flaticon-book1"></i>
                            <div class="counter" data-count="356">0</div>
                            <div class="counter-name">Courses</div>
                        </div>
                    </div>
                    <div class="grid-col grid-col-3 alt">
                        <div class="counter-block">
                            <i class="flaticon-multiple"></i>
                            <div class="counter" data-count="4781">0</div>
                            <div class="counter-name">Students</div>
                        </div>
                    </div>
                    <div class="grid-col grid-col-3 alt">
                        <div class="counter-block">
                            <i class="flaticon-pencil"></i>
                            <div class="counter" data-count="41">0</div>
                            <div class="counter-name">Lections</div>
                        </div>
                    </div>
                    <div class="grid-col grid-col-3 alt">
                        <div class="counter-block last">
                            <i class="flaticon-calendar"></i>
                            <div class="counter" data-count="120">0</div>
                            <div class="counter-name">Events</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        &lt;!&ndash; / paralax section &ndash;&gt;
        &lt;!&ndash; section &ndash;&gt;
        <section class="fullwidth-background padding-section">
            <div class="grid-row">
                <h2 class="center-text">How We Work</h2>
                &lt;!&ndash; time line &ndash;&gt;
                <div class="time-line">
                    <div class="line-element">
                        <div class="action">
                            <div class="action-block">
                                <span><i class="flaticon-magnifier"></i></span>
                                <div class="text">
                                    <h3>Search your course</h3>
                                    <p>Lorem ipsum  dolor sit amet, consectetuer adipisc ing elit. Aenean commodo ligula.</p>
                                </div>
                            </div>
                        </div>
                        <div class="level">
                            <div class="level-block">Step 1</div>
                        </div>
                    </div>
                    <div class="line-element color-2">
                        <div class="level">
                            <div class="level-block">Step 2</div>
                        </div>
                        <div class="action">
                            <div class="action-block">
                                <span><i class="flaticon-computer"></i></span>
                                <div class="text">
                                    <h3>Take A Sample Lesson</h3>
                                    <p>Aenean massa. Cum sociis nato que penatibus et magnis dis par turient montes.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="line-element color-3">
                        <div class="action">
                            <div class="action-block">
                                <span><i class="flaticon-shopping"></i></span>
                                <div class="text">
                                    <h3>Purchase the Course</h3>
                                    <p>Donec quam felis, ultricies nec, pellent esque eu, pretium quis, sem. Nulla conse massa.</p>
                                </div>
                            </div>
                        </div>
                        <div class="level">
                            <div class="level-block">Step 3</div>
                        </div>
                    </div>
                </div>
                &lt;!&ndash; / time line &ndash;&gt;
            </div>
        </section>
        &lt;!&ndash; / paralax section &ndash;&gt;
        <hr class="divider-color" />
        &lt;!&ndash; paralax section &ndash;&gt;
        <section class="padding-section">
            <div class="grid-row clear-fix">
                <div class="grid-col-row">
                    <div class="grid-col grid-col-6">
                        <div class="boxs-tab">
                            <div class="animated fadeIn active" data-box="1">

                            </div>
                            <div class="animated fadeIn" data-box="2">

                            </div>
                            <div class="animated fadeIn" data-box="3">

                            </div>
                        </div>
                    </div>
                    <div class="grid-col grid-col-6">
                        <h2>We Offer</h2>
                        <p>Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis justo at suscipit. Vivamus orci urna, ornare vitae tellus in, condimentum imperdiet eros. Maecenas accumsan, massa nec vulputate congue.<br/><br/>Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum.</p>
                        <div class="tabs-box">
                            <a href="#vd" data-boxs-tab="1" class="active">Education</a>
                            <a href="#dvd" data-boxs-tab="2">Knoweledge</a>
                            <a href="#cddv" data-boxs-tab="3">Employment</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        &lt;!&ndash; / paralax section &ndash;&gt;
        <hr class="divider-color"/>
        &lt;!&ndash; paralax section &ndash;&gt;
        <section class="fullwidth-background padding-section">
            <div class="grid-row clear-fix">
                <h2 class="center-text">About Us</h2>
                <div class="grid-col-row">
                    <div class="grid-col grid-col-6">
                        <h3>Why We Are Better</h3>
                        <p>Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis justo at suscipit. Vivamus orci urna, ornare vitae tellus in.</p>
                        &lt;!&ndash; accordions &ndash;&gt;
                        <div class="accordions">
                            &lt;!&ndash; content-title &ndash;&gt;
                            <div class="content-title active">Donec sollicitudin lacus in felis luctus blandit?</div>
                            &lt;!&ndash;/content-title &ndash;&gt;
                            &lt;!&ndash; accordions content &ndash;&gt;
                            <div class="content">Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue.</div>
                            &lt;!&ndash;/accordions content &ndash;&gt;
                            &lt;!&ndash; content-title &ndash;&gt;
                            <div class="content-title">Lorem ipsum dolor sit amet, consectetuer adipiscing elit?</div>
                            &lt;!&ndash;/content-title &ndash;&gt;
                            &lt;!&ndash; accordions content &ndash;&gt;
                            <div class="content">Nullam elementum tristique risus nec pellentesque. Pellentesque bibendum nunc eget nunc hendrerit auctor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur gravida urna nisl</div>
                            &lt;!&ndash;/accordions content &ndash;&gt;
                            &lt;!&ndash; content-title &ndash;&gt;
                            <div class="content-title">Aenean commodo ligula eget dolor. Aenean massa?</div>
                            &lt;!&ndash;/content-title &ndash;&gt;
                            &lt;!&ndash; accordions content &ndash;&gt;
                            <div class="content">Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue.</div>
                            &lt;!&ndash;/accordions content &ndash;&gt;
                            &lt;!&ndash; content-title &ndash;&gt;
                            <div class="content-title">Moreno gotro ja pisit amet, consectetuer adipiscing elit?</div>
                            &lt;!&ndash;/content-title &ndash;&gt;
                            &lt;!&ndash; accordions content &ndash;&gt;
                            <div class="content">Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue.</div>
                            &lt;!&ndash;/accordions content &ndash;&gt;
                        </div>
                        &lt;!&ndash;/accordions &ndash;&gt;
                        <a href="" class="cws-button bt-color-3 border-radius alt icon-right">View Detail<i class="fa fa-angle-right"></i></a>
                    </div>
                    <div class="grid-col grid-col-6">
                        <div class="owl-carousel full-width-slider">
                            <div class="gallery-item picture">

                            </div>
                            <div class="gallery-item picture">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        &lt;!&ndash; paralax section &ndash;&gt;
        &lt;!&ndash; parallax section &ndash;&gt;
        <div class="parallaxed">
            <div class="parallax-image" data-parallax-left="0.5" data-parallax-top="0.3" data-parallax-scroll-speed="0.5">
                <img src="" alt="">
            </div>
            <div class="them-mask bg-color-2"></div>
            <div class="grid-row center-text">
                <div class="font-style-1 margin-none">Get In Touch With Us</div>
                <div class="divider-mini"></div>
                <p class="parallax-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                <form class="subscribe">
                    <input type="text" name="email" value="" size="40" placeholder="Enter your email" aria-required="true"><input type="submit" value="Subscribe">
                </form>
            </div>
        </div>
        &lt;!&ndash; parallax section &ndash;&gt;
        &lt;!&ndash; section &ndash;&gt;
        <section class="grid-row clear-fix padding-section">
            <h2 class="center-text">Our Teachers</h2>
            <div class="grid-col-row">
                <div class="grid-col grid-col-6">
                    <div class="item-instructor bg-color-1">
                        <a href="page-profile.html" class="instructor-avatar">

                        </a>
                        <div class="info-box">
                            <h3>Jenny Doe</h3>
                            <span class="instructor-profession">Professor of Methematic</span>
                            <div class="divider"></div>
                            <p>Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis.</p>
                            <div class="social-link">&lt;!&ndash;
								 &ndash;&gt;<a href="#" class="fa fa-facebook"></a>&lt;!&ndash;
								 &ndash;&gt;<a href="#" class="fa fa-google-plus"></a>&lt;!&ndash;
								 &ndash;&gt;<a href="#" class="fa fa-twitter"></a>
                            </div>
                        </div>
                    </div>
                    <div class="item-instructor bg-color-3">
                        <a href="page-profile.html" class="instructor-avatar">

                        </a>
                        <div class="info-box">
                            <h3>John Doe</h3>
                            <span class="instructor-profession">Lecturer of Design</span>
                            <div class="divider"></div>
                            <p>Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis.</p>
                            <div class="social-link">&lt;!&ndash;
								 &ndash;&gt;<a href="#" class="fa fa-facebook"></a>&lt;!&ndash;
								 &ndash;&gt;<a href="#" class="fa fa-google-plus"></a>&lt;!&ndash;
								 &ndash;&gt;<a href="#" class="fa fa-twitter"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid-col grid-col-6">
                    <div class="item-instructor bg-color-2">
                        <a href="page-profile.html" class="instructor-avatar">

                        </a>
                        <div class="info-box">
                            <h3>James Doe</h3>
                            <span class="instructor-profession">Professor of Economics</span>
                            <div class="divider"></div>
                            <p>Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis.</p>
                            <div class="social-link">&lt;!&ndash;
								 &ndash;&gt;<a href="#" class="fa fa-facebook"></a>&lt;!&ndash;
								 &ndash;&gt;<a href="#" class="fa fa-google-plus"></a>&lt;!&ndash;
								 &ndash;&gt;<a href="#" class="fa fa-twitter"></a>
                            </div>
                        </div>
                    </div>
                    <div class="item-instructor bg-color-6">
                        <a href="page-profile.html" class="instructor-avatar">

                        </a>
                        <div class="info-box">
                            <h3>Jade Doe</h3>
                            <span class="instructor-profession">Assistant</span>
                            <div class="divider"></div>
                            <p>Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis.</p>
                            <div class="social-link">&lt;!&ndash;
								 &ndash;&gt;<a href="#" class="fa fa-facebook"></a>&lt;!&ndash;
								 &ndash;&gt;<a href="#" class="fa fa-google-plus"></a>&lt;!&ndash;
								 &ndash;&gt;<a href="#" class="fa fa-twitter"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        &lt;!&ndash; / section &ndash;&gt;
        <hr class="divider-color" />
        &lt;!&ndash; section &ndash;&gt;
        <section class="padding-section">
            <div class="grid-row clear-fix">
                <div class="grid-col-row">
                    <div class="grid-col grid-col-6">
                        <div class="video-player">
                            <iframe src="https://www.youtube.com/embed/rZsH88zNxRw"></iframe>
                        </div>
                    </div>
                    <div class="grid-col grid-col-6 clear-fix">
                        <h2>Learn More About Us From Video</h2>
                        <p>Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis justo at susp. Vivamus orci urna, ornare vitae tellus in, condimentum imperdiet eros. Maecea accumsan, massa nec vulputate congue.</p>
                        <p>Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum.</p>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <a href="page-about-us.html" class="cws-button bt-color-3 border-radius alt icon-right float-right">Watch More<i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </section>
        &lt;!&ndash; / section &ndash;&gt;
        &lt;!&ndash; parallax section
        <div class="parallaxed">
            <div class="parallax-image" data-parallax-left="0.5" data-parallax-top="0.3" data-parallax-scroll-speed="0.5">
                <img src="" alt="">
            </div>
            <div class="them-mask bg-color-3"></div>
            <div class="grid-row center-text">
                 twitter
                <div class="twitter-1"></div>
                 / twitter
            </div>
        </div>
         parallax section &ndash;&gt;
        &lt;!&ndash; section &ndash;&gt;
        <section class="padding-section">
            <div class="grid-row clear-fix">
                <h2 class="center-text">Community Life</h2>
                <div class="grid-col-row">
                    <div class="grid-col grid-col-4">
                        <div class="community color-1">
                            <h3>Events</h3>
                            <div class="community-logo">
                                <i class="flaticon-calendar"></i>
                            </div>
                            <div class="info-block">
                                <p>Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis. Aliquam lorem ante, dapibus in.</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid-col grid-col-4">
                        <div class="community">
                            <h3>Blog</h3>
                            <div class="community-logo">
                                <i class="flaticon-pencil"></i>
                            </div>
                            <div class="info-block">
                                <p>Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis. Aliquam lorem ante, dapibus in.</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid-col grid-col-4">
                        <div class="community color-2">
                            <h3>Publishers</h3>
                            <div class="community-logo">
                                <i class="flaticon-book1"></i>
                            </div>
                            <div class="info-block">
                                <p>Donec sollicitudin lacus in felis luctus blandit. Ut hendrerit mattis. Aliquam lorem ante, dapibus in.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        &lt;!&ndash; / section &ndash;&gt;
        <hr class="divider-color" />
        &lt;!&ndash; section &ndash;&gt;
        <section class="fullwidth-background testimonial padding-section">
            <div class="grid-row">
                <h2 class="center-text">Testimonials</h2>
                <div class="owl-carousel testimonials-carousel">
                    <div class="gallery-item">
                        <div class="quote-avatar-author clear-fix"><div class="author-info">Karl Doe<br><span>Writer</span></div></div>
                        <p>Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. </p>
                    </div>
                    <div class="gallery-item">
                        <div class="quote-avatar-author clear-fix"><div class="author-info">Karl Doe<br><span>Writer</span></div></div>
                        <p>Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. </p>
                    </div>
                    <div class="gallery-item">
                        <div class="quote-avatar-author clear-fix"><div class="author-info">Karl Doe<br><span>Writer</span></div></div>
                        <p>Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. </p>
                    </div>
                </div>
            </div>
        </section>
        &lt;!&ndash; / section &ndash;&gt;
    </div>-->
</template>
<script>
    import SliderComponent from "./SliderComponent";
    export default {
        name: "MainComponent",
        components: {SliderComponent},
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
