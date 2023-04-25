<template>
    <div class="slider-content" :style="
    'background-image:url(/front/img/slider/'+this.item_data.img+');' +
    'background-size: cover;'+
    'width:100%'">
                <span :class="'slider-title ' +this.item_data.title_animate">{{ this.item_data.title }}</span>
                <p :class="'slider-p '+this.item_data.description_animate">{{ this.item_data.description }}</p>
                <template v-if="this.item_data.isbutton === 1">
                    <div :class="this.item_data.button_animate">
                        <router-link :to="this.item_data.button_href" class="slider-btn">{{ this.item_data.button_name }} <i class="fa fa-angle-double-right"></i></router-link>
                    </div>
                </template>
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
        width:100%;
        padding-top:200px;
        min-height:800px;
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
    @media (max-device-width : 375px){
        .slider-title{
            font-size: 3em;
            line-height: 2;
            padding:10px;
        }
        .slider-content{
            padding-top:100px;
            min-height:600px!important;
        }
    }
    @media (min-device-width : 376px) and (max-device-width : 393px){
        .slider-title{
            font-size: 3em;
            line-height: 2;
            padding:10px;
        }
        .slider-content{
            padding-top:100px;
            min-height:700px!important;
        }
    }
    @media (min-device-width : 394px) and (max-device-width : 414px){
        .slider-title{
            font-size: 3em;
            line-height: 2;
            padding:10px;
        }
        .slider-content{
            padding-top:100px;
            min-height:700px!important;
        }
    }
    @media (min-device-width : 414px) and (max-device-width : 820px){
        .slider-title{
            font-size: 3em;
            line-height: 2;
            padding:10px;
        }
        .slider-content{
            padding-top:100px;
            min-height:700px!important;
        }
    }
</style>
