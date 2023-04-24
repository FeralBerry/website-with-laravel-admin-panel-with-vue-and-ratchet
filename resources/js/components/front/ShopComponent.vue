<template>
    <div>
        <bread-crumb-component :data="data"></bread-crumb-component>
        <div class="page-content woocommerce">
            <div class="container clear-fix">
                <div class="row">
                    <div class="col-md-9">
                        <!-- Shop -->
                        <div id="page-meta" class="group">
                            <div id="list-or-grid">
                                <div class="grid-view active" title="Switch to grid view">
                                    <i class="fa fa-th-large"></i>
                                </div>
                                <div class="list-view" title="Switch to list view">
                                    <i class="fa fa-th-list"></i>
                                </div>
                            </div>
                            <!--<form class="woocommerce-ordering" method="get">
                                <select name="orderby" class="orderby">
                                    <option value="menu_order">Default sorting</option>
                                    <option value="popularity">Sort by popularity</option>
                                    <option value="rating">Sort by average rating</option>
                                    <option value="date">Sort by newness</option>
                                    <option value="price">Sort by price: low to high</option>
                                    <option value="price-desc">Sort by price: high to low</option>
                                </select>
                            </form>-->
                        </div>
                        <ul class="products" id="products">
                            <!-- product -->

                            <!-- product -->
                        </ul>
                        <!--Shop -->

                        <!-- pagination -->
                        <div class="page-pagination clear-fix" id="paginate_item">

                        </div>
                        <!--/ pagination -->
                    </div>
                    <div class="col-md-3">
                        <!-- widget search -->
                        <!-- widget search -->
                        <aside class="widget-search">
                            <form id="shop_search">
                                <input type="hidden" :value="csrf" name="_token">
                                <label>
                                    <span class="screen-reader-text">Поиск:</span>
                                    <input type="search" class="search-field" placeholder="Поиск" value="" id="shop_search_input" name="shop_search_input" title="Поиск:">
                                </label>
                                <input type="submit" class="search-submit" value="GO">
                            </form>
                        </aside>
                        <!-- / widget search -->
                        <!-- widget categories -->
                        <aside class="widget-categories">
                            <h2>Категории</h2>
                            <hr class="divider-big" />
                            <ShopCatLinkComponent :data="data.navigate"></ShopCatLinkComponent>
                        </aside>
                        <!-- widget categories -->
                        <!--/ widget shop filter -->
                        <!--<aside class="widget-filter">
                            <h2>Фильт по цене</h2>
                            <form>
                                <div class="price_slider_wrapper">
                                    <div class="price_slider price_slider_amount ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" aria-disabled="false">
                                        <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                        <a class="ui-slider-handle ui-state-default ui-corner-all" href="#">
                                            <div class="price_label" style=""><span class="from"></span></div>
                                        </a>
                                        <a class="ui-slider-handle ui-state-default ui-corner-all" href="#">
                                            <div class="price_label" style=""><span class="to"></span></div>
                                        </a>
                                    </div>
                                    <div class="price_slider_amount">
                                        <input type="text" id="min_price" name="min_price" value="" data-min="0" placeholder="Min price">
                                        <input type="text" id="max_price" name="max_price" value="" data-max="5000" placeholder="Max price">
                                        <input type="hidden" name="post_type" value="product">
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </form>
                        </aside>-->
                        <aside class="widget-subscribe">
                            <h2>Связаться:</h2>
                            <hr class="divider-big margin-bottom" />
                            <ContactLinksComponent
                                v-for="item in this.data.contacts"
                                :key="item.id"
                                :item_data="item">
                            </ContactLinksComponent>
                        </aside>
                        <!-- / widget follow -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import ShopCatLinkComponent from "./ShopCatLinkComponent";
    import ContactLinksComponent from "./ContactLinksComponent";
    export default {
        name: "ShopComponent",
        components: {ShopCatLinkComponent,ContactLinksComponent},
        props: ['data'],
        data(){
            return{
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            }
        },
        mounted() {

        },
        created() {

        }
    }
</script>
