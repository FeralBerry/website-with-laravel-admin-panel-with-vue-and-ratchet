<template>
    <div class="banner">
        <div class="slider" :style="{'margin-left':'-'+(100*currentSlideIndex)+'%'}">
            <SlideItemComponent
            v-for="item in this.data.data"
            :key="item.id"
            :item_data="item"
            :currentSlideIndex="this.currentSlideIndex"
            ></SlideItemComponent>
        </div>
        <button class="slider_link" style="position:absolute;top:50%;left:10px" @click="prevSlide"><i class="fa fa-angle-double-left"></i></button>
        <button class="slider_link" style="position:absolute;top:50%;right:10px" @click="nextSlide"><i class="fa fa-angle-double-right"></i></button>
    </div>

    <hr class="divider-color">
</template>
<script>
    import SlideItemComponent from "./SlideItemComponent";
    export default {
        name: "SliderComponent",
        components: {SlideItemComponent},
        props:['data'],
        data(){
            return{
                currentSlideIndex:0,
                interval:5000
            }
        },
        created() {

        },
        methods:{
            nextSlide(){
                if(this.currentSlideIndex+1 == this.data.data.length){
                    this.currentSlideIndex = 0
                } else {
                    this.currentSlideIndex++
                }
            },
            prevSlide(){
                if(this.currentSlideIndex > 0){
                    this.currentSlideIndex--
                } else {
                    this.currentSlideIndex = this.data.data.length - 1
                }
            }
        },
        mounted() {
            if(this.interval > 0){
                let wm = this;
                setInterval(function(){
                    wm.nextSlide()
                },wm.interval);
            }
        }
    }
</script>
<style>
    .banner{
        min-height: 800px;
        overflow: hidden;
        min-width: 100%;
    }
    .slider{
        width: 100%;
        display: flex;
        transition: all ease .5s;
    }
    .slider_link{
        color:#000;
        background: rgba(255, 255, 255, 0.60);
        font-size: 60px;
        height:80px;
        width: 80px;
        border-radius: 10px;
    }
    .slider_link:hover{
        color:#444;
        background: rgba(255, 255, 255);
    }
</style>
