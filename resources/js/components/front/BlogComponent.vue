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
            let connection = new WebSocket("ws://127.0.0.1:4710");
            connection.onopen = function(event){
                connection.send('{"command":"front_blog","url":"'+window.location.pathname+'"}')
            }
            connection.onmessage = function(event){
                let data = JSON.parse(event.data);
                data.seo.map((item) => {
                    document.querySelector('meta[name="description"]').setAttribute("content", ""+item.description+"");
                    document.querySelector('head title').textContent = item.title;
                });
                let blog_items = document.getElementById('blog_items');
                data.blog.data.map((item) => {
                    let date = new Date(item.created_at);
                    let hour = date.getHours();
                    let minute = date.getMinutes();
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
                    let brief = '';
                    let div = document.createElement('div');
                    if(item.description != null){
                        div.innerText = item.description;
                        brief = div.innerText.replace( /(<([^>]+)>)/ig, '');
                        brief = brief.substr(0,100);
                    }
                    blog_items.innerHTML += '<div class="grid-col grid-col-4" style="margin-bottom: 10px">' +
                        '<div class="course-item">' +
                        '<div class="course-hover">' +
                        '<img src="'+item.img+'" alt>' +
                        '<div class="hover-bg bg-color-1"></div>' +
                        '<a href="/' + item.id + '">Читать подробнее</a>' +
                        '</div>' +
                        '<div class="course-name clear-fix">' +
                        '<h3><a href="/' + item.id + '">'+item.title+'</a></h3>' +
                        '</div>' +
                        '<div class="course-date bg-color-1 clear-fix">' +
                        '<div class="day"><i class="fa fa-calendar"></i>'+day+' '+mounth+'</div><div class="time"><i class="fa fa-clock-o"></i>В '+hour+':'+minute+'</div>' +
                        '<div class="divider"></div>' +
                        '<div class="description">'+brief+'...</div>' +
                        '</div>' +
                        '</div>' +
                        '</div>';
                });
                let paginate_item = document.getElementById('paginate_item');
                data.blog.path = window.location.protocol +'//'+window.location.hostname;
                data.blog.first_page_url = window.location.protocol +'//'+window.location.hostname+'/blog?page=1';
                data.blog.last_page_url = window.location.protocol +'//'+window.location.hostname+'/blog?page='+data.blog.last_page;
                data.blog.next_page_url = window.location.protocol +'//'+window.location.hostname+'/blog?page='+(data.blog.from+1);
                if(data.blog.links.length >3){
                    data.blog.links.map((items) => {
                        let link = items.label;
                        let active = '';
                        let url = items.url;
                        if(items.active){
                            active = 'class="active"';
                        }
                        if(url === null){
                            url = '/blog';
                        } else {
                            if(items.label === 'Next &raquo;'){
                                url = data.blog.last_page_url;
                            } else {
                                url = window.location.protocol +'//'+window.location.hostname+'/blog?page='+items.label;
                            }
                        }
                        if(items.label === '&laquo; Previous'){
                            link = '<i class="fa fa-angle-double-left"></i>'
                        }
                        if(items.label === 'Next &raquo;'){
                            link = '<i class="fa fa-angle-double-right"></i>'
                        }
                        paginate_item.innerHTML += '<a href="'+url+'" '+active+'>'+link+'</a>'
                    });
                }
            }
        }
    }
</script>
