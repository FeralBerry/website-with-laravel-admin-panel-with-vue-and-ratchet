<template>
    <div class="col-md-12" :style="
    'background-image:url(/front/img/slider/'+this.item_data.img+');' +
    'width:100%;' +
    'min-height:800px;' +
    'background-size: cover;'">
        <div class="row slider-content" >
            <div class="col-md-3">

            </div>
            <div class="col-md-6">
                <div class="slider-title">{{ this.item_data.title }}</div>
                <p class="slider-p">{{ this.item_data.description }}</p>
                <template v-if="this.item_data.isbutton === 1">
                    <router-link :to="this.item_data.button_href" class="slider-btn">{{ this.item_data.button_name }} <i class="fa fa-angle-double-right"></i></router-link>
                </template>
            </div>
            <div class="col-md-3">

            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: "SlideItemComponent",
        props:['item_data','currentSlideIndex'],
        created() {

        },

    }
</script>

<style scoped>
    .slider-title{
        margin-top: 200px;
        color: #f27c66;
        font-size: 4em;
        line-height: 1;
        padding: 0.24em 0.87em;
        background: rgba(255,255,255,0.8);
        margin-bottom: 0.2em;
        border-radius: 10px 0 10px 0;
    }
    .slider-p{
        color: #fff;
        font-size: 20px;
        margin-top: 25px;
        margin-bottom: 25px;
    }
    .slider-content{
        text-align: center;
    }
    .slider-btn{
        padding: 0.56em 1.94em;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        border: 2px solid #f27c66;
        background-color: #f27c66;
        line-height: 1.2;
        font-size: 20px;
        color: #ffffff;
        font-weight: 300;
        text-transform: uppercase;
        min-width: 0;
        border-radius:10px;
    }
    .slider-btn:hover{
        padding: 0.56em 1.94em;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        border: 2px solid #ffffff;
        background-color: #ffffff;
        line-height: 1.2;
        color: #f27c66;
        font-weight: 300;
        text-transform: uppercase;
        min-width: 0;
        font-size: 20px;
    }
</style>
