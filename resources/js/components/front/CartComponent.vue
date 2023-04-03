<template>
    <bread-crumb-component :data="data"></bread-crumb-component>
    <div class="page-content woocommerce">
        <div class="container clear-fix">
            <!-- Shop -->
            <div class="title clear-fix">
                <h2 class="title-main">Корзина</h2>
                <router-link to="/shop" class="button-back">Вернуться к покупкам<i class="fa fa-angle-double-right"></i></router-link>
            </div>
            <div id="content" role="main">
                <div class="row">
                    <div class="col-md-12 cart_table_head">
                        <div class="row">
                            <div class="col-md-1" style="padding:10px;border: 1px solid rgb(24, 187, 124)">#</div>
                            <div class="col-md-8" style="padding:10px;border: 1px solid rgb(24, 187, 124)">Название</div>
                            <div class="col-md-2" style="padding:10px;border: 1px solid rgb(24, 187, 124)">Цена</div>
                            <div class="col-md-1" style="padding:10px;border: 1px solid rgb(24, 187, 124)"></div>
                        </div>
                    </div>
                    <div class="col-md-12" >
                        <div class="row" id="cart_products">

                        </div>
                    </div>
                    <div class="col-md-12" >
                        <div class="row" id="cart_price">

                        </div>
                    </div>
                </div>
            </div>
            <!--Shop -->
        </div>
    </div>
</template>
<script>
    export default {
        name: "CartComponent",
        props: ['data'],
        data(){
            return{
                breadcrumb:{

                }
            }
        },
        mounted() {

        },
        created() {

        },
        methods:{

        },
    }
</script>
