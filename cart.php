<?php



include 'includes/header.php';




?>
<!--====== End - Main Header ======-->


<!--====== App Content ======-->
<div class="app-content">

    <!--====== Section 1 ======-->
    <div class="u-s-p-y-60">

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="breadcrumb">
                    <div class="breadcrumb__wrap">
                        <ul class="breadcrumb__list">
                            <li class="has-separator">

                                <a href="index.php">Home</a>
                            </li>
                            <li class="is-marked">

                                <a href="cart.php">Cart</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section 1 ======-->


    <!--====== Section 2 ======-->
    <div class="u-s-p-b-60">

        <!--====== Section Intro ======-->
        <div class="section__intro u-s-m-b-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__text-wrap">
                            <h1 class="section__heading u-c-secondary">SHOPPING CART</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Intro ======-->


        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="row">
                    <form method="POST" action="save_cart.php">

                        <?php
                        //initialize total
                        $total = 0;
                        if (!empty($_SESSION['cart'])) {
                        ?>
                            <div class="col-lg-12 col-md-12 col-sm-12 u-s-m-b-30">

                                <div class="table-responsive">
                                    <table class="table-p">
                                        <tbody>
                                            <?php

                                            //create array of initail qty which is 1
                                            $index = 0;
                                            if (!isset($_SESSION['qty_array'])) {
                                                $_SESSION['qty_array'] = array_fill(0, count($_SESSION['cart']), 1);
                                            }
                                            $sql = "SELECT * FROM products WHERE id IN (" . implode(',', $_SESSION['cart']) . ")";
                                            $query = $conn->query($sql);
                                            while ($row = $query->fetch_assoc()) {
                                            ?>

                                                <!--====== Row ======-->
                                                <tr>
                                                    <td>
                                                        <div class="table-p__box">
                                                            <div class="table-p__img-wrap">

                                                                <img class="u-img-fluid" src="dashboard/admin/<?php echo $row['pimg']; ?>" alt="">
                                                            </div>
                                                            <div class="table-p__info">

                                                                <span class="table-p__name">

                                                                    <a href="product-detail-affiliate.php?prod=<?php echo $row['id']; ?>"><?php echo $row['pname']; ?></a></span>

                                                                <span class="table-p__category">

                                                                    <a href="#"><?php $usr = $conn->query("select * from users where user_id=" . $row['ucode'] . "")->fetch_assoc();
                                                                                echo $usr['uname']; ?></a></span>

                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>

                                                        <span class="table-p__price">Ksh <?php echo $row['pprice']; ?></span>
                                                    </td>
                                                    <td>
                                                        <input type="hidden" name="indexes[]" value="<?php echo $index; ?>">
                                                        <div class="table-p__input-counter-wrap">

                                                            <!--====== Input Counter ======-->
                                                            <div class="input-counter">

                                                                <span class="input-counter__minus fas fa-minus"></span>

                                                                <input class="input-counter__text input-counter--text-primary-style" type="text" data-min="1" data-max="1000" value="<?php echo $_SESSION['qty_array'][$index]; ?>" name="qty_<?php echo $index; ?>">

                                                                <span class="input-counter__plus fas fa-plus"></span>
                                                            </div>
                                                            <!--====== End - Input Counter ======-->
                                                        </div>
                                                        <?php $total += $_SESSION['qty_array'][$index]*$row['pprice']; ?>
                                                    </td>
                                                    <td>
                                                        <div class="table-p__del-wrap">
                                                            


                                                                <a class="far fa-trash-alt table-p__delete-link" href="delete_item.php?id=<?php echo $row['id']; ?>&index=<?php echo $index; ?>"></a>
                                                        </div>
                                                    </td>
                                                </tr>


                                                <!--====== End - Row ======-->

                                            <?php
                                                $index++;
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="route-box">
                                    <div class="route-box__g1">

                                        <a class="route-box__link" href="index.php"><i class="fas fa-long-arrow-alt-left"></i>

                                            <span>CONTINUE SHOPPING</span></a>
                                    </div>
                                    <div class="route-box__g2">
                                        <a class="route-box__link" href="#">

                                            <span>Total</span></a>

                                        <a class="route-box__link" href="#">

                                            <span>Ksh <?php echo number_format($total, 2); ?></span></a>

                                        <a class="route-box__link" href="clear_cat.php"><i class="fas fa-trash"></i>

                                            <span>CLEAR CART</span></a>

                                        <button class="route-box__link" type="submit" name="save"><i class="fas fa-sync"></i>

                                            <span>UPDATE CART</span></button>
                                    </div>
                                </div>
                            </div>
                        <?php } else {

                        ?>
                            <div class="empty">
                                <div class="empty__wrap">

                                    <span class="empty__big-text">EMPTY</span>

                                    <span class="empty__text-1">No items found on your cart.</span>

                                    <a class="empty__redirect-link btn--e-brand" href="shop-side-version-2.html">CONTINUE SHOPPING</a>
                                </div>
                            </div>
                        <?php } ?>
                    </form>

                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 2 ======-->


    <!--====== Section 3 ======-->
    <div class="u-s-p-b-60">

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 u-s-m-b-30">
                        <form class="f-cart">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 u-s-m-b-30">
                                    <div class="f-cart__pad-box">
                                        <h1 class="gl-h1">ESTIMATE SHIPPING AND TAXES</h1>

                                        <span class="gl-text u-s-m-b-30">Enter your destination to get a shipping estimate.</span>
                                        <div class="u-s-m-b-30">

                                            <!--====== Select Box ======-->

                                            <label class="gl-label" for="shipping-country">COUNTRY *</label><select class="select-box select-box--primary-style" id="shipping-country">
                                                <option selected value="">Choose Country</option>
                                                <option value="uae">United Arab Emirate (UAE)</option>
                                                <option value="uk">United Kingdom (UK)</option>
                                                <option value="us">United States (US)</option>
                                            </select>
                                            <!--====== End - Select Box ======-->
                                        </div>
                                        <div class="u-s-m-b-30">

                                            <!--====== Select Box ======-->

                                            <label class="gl-label" for="shipping-state">STATE/PROVINCE *</label><select class="select-box select-box--primary-style" id="shipping-state">
                                                <option selected value="">Choose State/Province</option>
                                                <option value="al">Alabama</option>
                                                <option value="al">Alaska</option>
                                                <option value="ny">New York</option>
                                            </select>
                                            <!--====== End - Select Box ======-->
                                        </div>
                                        <div class="u-s-m-b-30">

                                            <label class="gl-label" for="shipping-zip">ZIP/POSTAL CODE *</label>

                                            <input class="input-text input-text--primary-style" type="text" id="shipping-zip" placeholder="Zip/Postal Code">
                                        </div>
                                        <div class="u-s-m-b-30">

                                            <a class="f-cart__ship-link btn--e-transparent-brand-b-2" href="cart.html">CALCULATE SHIPPING</a>
                                        </div>

                                        <span class="gl-text">Note: There are some countries where free shipping is available otherwise our flat rate charges or country delivery charges will be apply.</span>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 u-s-m-b-30">
                                    <div class="f-cart__pad-box">
                                        <h1 class="gl-h1">NOTE</h1>

                                        <span class="gl-text u-s-m-b-30">Add Special Note About Your Product</span>
                                        <div>

                                            <label for="f-cart-note"></label><textarea class="text-area text-area--primary-style" id="f-cart-note"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 u-s-m-b-30">
                                    <div class="f-cart__pad-box">
                                        <div class="u-s-m-b-30">
                                            <table class="f-cart__table">
                                                <tbody>
                                                    <tr>
                                                        <td>SHIPPING</td>
                                                        <td>$4.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td>TAX</td>
                                                        <td>$0.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td>SUBTOTAL</td>
                                                        <td>$379.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td>GRAND TOTAL</td>
                                                        <td>$379.00</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div>

                                            <button class="btn btn--e-brand-b-2" type="submit"> PROCEED TO CHECKOUT</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 3 ======-->
</div>
<!--====== End - App Content ======-->


<!--====== Main Footer ======-->
<footer>
    <div class="outer-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="outer-footer__content u-s-m-b-40">

                        <span class="outer-footer__content-title">Contact Us</span>
                        <div class="outer-footer__text-wrap"><i class="fas fa-home"></i>

                            <span>4247 Ashford Drive Virginia VA-20006 USA</span>
                        </div>
                        <div class="outer-footer__text-wrap"><i class="fas fa-phone-volume"></i>

                            <span>(+0) 900 901 904</span>
                        </div>
                        <div class="outer-footer__text-wrap"><i class="far fa-envelope"></i>

                            <span>contact@domain.com</span>
                        </div>
                        <div class="outer-footer__social">
                            <ul>
                                <li>

                                    <a class="s-fb--color-hover" href="#"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li>

                                    <a class="s-tw--color-hover" href="#"><i class="fab fa-twitter"></i></a>
                                </li>
                                <li>

                                    <a class="s-youtube--color-hover" href="#"><i class="fab fa-youtube"></i></a>
                                </li>
                                <li>

                                    <a class="s-insta--color-hover" href="#"><i class="fab fa-instagram"></i></a>
                                </li>
                                <li>

                                    <a class="s-gplus--color-hover" href="#"><i class="fab fa-google-plus-g"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="outer-footer__content u-s-m-b-40">

                                <span class="outer-footer__content-title">Information</span>
                                <div class="outer-footer__list-wrap">
                                    <ul>
                                        <li>

                                            <a href="cart.html">Cart</a>
                                        </li>
                                        <li>

                                            <a href="dashboard.html">Account</a>
                                        </li>
                                        <li>

                                            <a href="shop-side-version-2.html">Manufacturer</a>
                                        </li>
                                        <li>

                                            <a href="dash-payment-option.html">Finance</a>
                                        </li>
                                        <li>

                                            <a href="shop-side-version-2.html">Shop</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="outer-footer__content u-s-m-b-40">
                                <div class="outer-footer__list-wrap">

                                    <span class="outer-footer__content-title">Our Company</span>
                                    <ul>
                                        <li>

                                            <a href="about.html">About us</a>
                                        </li>
                                        <li>

                                            <a href="contact.html">Contact Us</a>
                                        </li>
                                        <li>

                                            <a href="index.html">Sitemap</a>
                                        </li>
                                        <li>

                                            <a href="dash-my-order.html">Delivery</a>
                                        </li>
                                        <li>

                                            <a href="shop-side-version-2.html">Store</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="outer-footer__content">

                        <span class="outer-footer__content-title">Join our Newsletter</span>
                        <form class="newsletter">
                            <div class="u-s-m-b-15">
                                <div class="radio-box newsletter__radio">

                                    <input type="radio" id="male" name="gender">
                                    <div class="radio-box__state radio-box__state--primary">

                                        <label class="radio-box__label" for="male">Male</label>
                                    </div>
                                </div>
                                <div class="radio-box newsletter__radio">

                                    <input type="radio" id="female" name="gender">
                                    <div class="radio-box__state radio-box__state--primary">

                                        <label class="radio-box__label" for="female">Female</label>
                                    </div>
                                </div>
                            </div>
                            <div class="newsletter__group">

                                <label for="newsletter"></label>

                                <input class="input-text input-text--only-white" type="text" id="newsletter" placeholder="Enter your Email">

                                <button class="btn btn--e-brand newsletter__btn" type="submit">SUBSCRIBE</button>
                            </div>

                            <span class="newsletter__text">Subscribe to the mailing list to receive updates on promotions, new arrivals, discount and coupons.</span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="lower-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="lower-footer__content">
                        <div class="lower-footer__copyright">

                            <span>Copyright © 2018</span>

                            <a href="index.html">Reshop</a>

                            <span>All Right Reserved</span>
                        </div>
                        <div class="lower-footer__payment">
                            <ul>
                                <li><i class="fab fa-cc-stripe"></i></li>
                                <li><i class="fab fa-cc-paypal"></i></li>
                                <li><i class="fab fa-cc-mastercard"></i></li>
                                <li><i class="fab fa-cc-visa"></i></li>
                                <li><i class="fab fa-cc-discover"></i></li>
                                <li><i class="fab fa-cc-amex"></i></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
<!--====== End - Main App ======-->


<!--====== Google Analytics: change UA-XXXXX-Y to be your site's ID ======-->
<script>
    window.ga = function() {
        ga.q.push(arguments)
    };
    ga.q = [];
    ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto');
    ga('send', 'pageview')
</script>
<script src="https://www.google-analytics.com/analytics.js" async defer></script>

<!--====== Vendor Js ======-->
<script src="js/vendor.js"></script>

<!--====== jQuery Shopnav plugin ======-->
<script src="js/jquery.shopnav.js"></script>

<!--====== App ======-->
<script src="js/app.js"></script>

<!--====== Noscript ======-->
<noscript>
    <div class="app-setting">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="app-setting__wrap">
                        <h1 class="app-setting__h1">JavaScript is disabled in your browser.</h1>

                        <span class="app-setting__text">Please enable JavaScript in your browser or upgrade to a JavaScript-capable browser.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</noscript>
</body>

</html>