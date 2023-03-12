<template>
    <div>
        <bread-crumb-component :data="data"></bread-crumb-component>
        <div class="page-content">
            <div class="container">
                <!-- main content -->
                <main>
                    <section>
                        <div class="clear-fix">
                            <div class="grid-col-row" v-html="this.blog_items">

                            </div>
                            <div class="page-pagination clear-fix margin-none" v-html="this.paginate_item"></div>
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
                blog_items:'',
                paginate_item:''
            }
        },
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
            let blog = this.data.blog;
            blog.data.map((item) => {
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
                this.blog_items += '<div class="grid-col grid-col-4" style="margin-bottom: 10px">' +
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
            blog.links.map((items) => {
                let link = items.label;
                let active = '';
                let url = items.url;
                if(items.active){
                    active = 'class="active"';
                }
                if(url === null){
                    url = 'blog';
                }
                if(items.label === '« Previous'){
                    link =  '<i class="fa fa-angle-double-left"></i>'
                }
                if(items.label === 'Next »'){
                    link =  '<i class="fa fa-angle-double-right"></i>'
                }
                this.paginate_item += '<a href="'+url+'" '+active+'>'+link+'</a>'
            });
        }
    }
</script>
