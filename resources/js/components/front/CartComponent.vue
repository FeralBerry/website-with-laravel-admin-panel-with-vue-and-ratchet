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
                    <div class="col-md-12" id="cart_products">
                        <div class="row">
                            <div class="col-md-1 cart_table_item">#</div>
                            <div class="col-md-8 cart_table_item" style="float: left">
                                <div class="row">
                                    <div class="col-md-3">
                                        <a href="shop-single-item.html">
                                            <img src="http://placehold.it/65x65" data-at2x="http://placehold.it/65x65" class="attachment-shop_thumbnail wp-post-image" alt="">
                                        </a>
                                    </div>
                                    <div class="col-md-9">
                                        <a href="shop-single-item.html">Donec ut velit varius Fusce nec nisl vulputate </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 cart_table_item"><span class="amount">14500<sup>$</sup></span></div>
                            <div class="col-md-1 cart_table_item"><a href="#"><i class="fa fa-times" aria-hidden="true"></i></a></div>
                        </div>
                    </div>



                    <div class="col-md-9">Стоимоть:</div>
                    <div class="col-md-3">111</div>
                </div>




                        <tr>
                            <td colspan="6" class="actions">
                                <div class="coupon">
                                    <label for="coupon_code">Coupon:</label>
                                    <input type="text" name="coupon_code" class="input-text corner-radius-top" id="coupon_code" value="" placeholder="Coupon code">
                                    <input type="submit" class="cws-button corner-radius-bottom" name="apply_coupon" value="Apply Coupon">
                                </div>
                                <input type="submit" class="cws-button bt-color-5" name="update_cart" value="Update Cart">
                                <input type="submit" class="cws-button bt-color-3" name="proceed" value="Proceed to Checkout">
                            </td>
                        </tr>

                <hr class="divider-color" />
                <div class="cart-collaterals">
                    <form class="shipping_calculator" action="#" method="post">
                        <h3>Calculate shipping</h3>
                        <div class="shipping-calculator-form">
                            <p class="form-row form-row-wide">
                                <select name="calc_shipping_country" id="calc_shipping_country" class="country_to_state" rel="calc_shipping_state">
                                    <option value="">Select a country...</option>
                                    <option value="AF">Afghanistan</option>
                                    <option value="AL">Albania</option>
                                    <option value="DZ">Algeria</option>
                                    <option value="AD">Andorra</option>
                                    <option value="AO">Angola</option>
                                    <option value="AI">Anguilla</option>
                                    <option value="AQ">Antarctica</option>
                                    <option value="AG">Antigua and Barbuda</option>
                                    <option value="AR">Argentina</option>
                                    <option value="AM">Armenia</option>
                                    <option value="AW">Aruba</option>
                                    <option value="AU">Australia</option>
                                    <option value="AT">Austria</option>
                                    <option value="AZ">Azerbaijan</option>
                                    <option value="BS">Bahamas</option>
                                    <option value="BH">Bahrain</option>
                                    <option value="BD">Bangladesh</option>
                                    <option value="BB">Barbados</option>
                                    <option value="BY">Belarus</option>
                                    <option value="PW">Belau</option>
                                    <option value="BE">Belgium</option>
                                    <option value="BZ">Belize</option>
                                    <option value="BJ">Benin</option>
                                    <option value="BM">Bermuda</option>
                                    <option value="BT">Bhutan</option>
                                    <option value="BO">Bolivia</option>
                                    <option value="BQ">Bonaire, Saint Eustatius and Saba</option>
                                    <option value="BA">Bosnia and Herzegovina</option>
                                    <option value="BW">Botswana</option>
                                    <option value="BV">Bouvet Island</option>
                                    <option value="BR">Brazil</option>
                                    <option value="IO">British Indian Ocean Territory</option>
                                    <option value="VG">British Virgin Islands</option>
                                    <option value="BN">Brunei</option>
                                    <option value="BG">Bulgaria</option>
                                    <option value="BF">Burkina Faso</option>
                                    <option value="BI">Burundi</option>
                                    <option value="KH">Cambodia</option>
                                    <option value="CM">Cameroon</option>
                                    <option value="CA">Canada</option>
                                    <option value="CV">Cape Verde</option>
                                    <option value="KY">Cayman Islands</option>
                                    <option value="CF">Central African Republic</option>
                                    <option value="TD">Chad</option>
                                    <option value="CL">Chile</option>
                                    <option value="CN">China</option>
                                    <option value="CX">Christmas Island</option>
                                    <option value="CC">Cocos (Keeling) Islands</option>
                                    <option value="CO">Colombia</option>
                                    <option value="KM">Comoros</option>
                                    <option value="CG">Congo (Brazzaville)</option>
                                    <option value="CD">Congo (Kinshasa)</option>
                                    <option value="CK">Cook Islands</option>
                                    <option value="CR">Costa Rica</option>
                                    <option value="HR">Croatia</option>
                                    <option value="CU">Cuba</option>
                                    <option value="CW">CuraÇao</option>
                                    <option value="CY">Cyprus</option>
                                    <option value="CZ">Czech Republic</option>
                                </select>
                            </p>
                            <p class="form-row form-row-wide">
                                <input type="text" class="input-text" value="" placeholder="State / county" name="calc_shipping_state" id="calc_shipping_state">
                            </p>
                            <p class="form-row form-row-wide">
                                <input type="text" class="input-text" value="" placeholder="Postcode / Zip" name="calc_shipping_postcode" id="calc_shipping_postcode">
                            </p>
                            <p>
                                <button type="submit" name="calc_shipping" value="1" class="cws-button border-radius alt">Update Totals</button>
                            </p>
                        </div>
                    </form>
                    <div class="cart_totals ">
                        <h3>Cart Totals</h3>
                        <table>
                            <tbody>
                            <tr class="cart-subtotal">
                                <th>Cart Subtotal</th>
                                <td><span class="amount">$12</span></td>
                            </tr>
                            <tr class="shipping">
                                <th>Shipping</th>
                                <td>
                                    Free Shipping
                                </td>
                            </tr>
                            <tr class="order-total">
                                <th>Order Total</th>
                                <td><span class="amount">$12</span></td>
                            </tr>
                            </tbody>
                        </table>
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
