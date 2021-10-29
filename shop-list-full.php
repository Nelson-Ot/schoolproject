<?php
include 'includes/header.php';


?>
<!--====== End - Main Header ======-->


<!--====== App Content ======-->
<div class="app-content">

    <!--====== Section 1 ======-->
    <div class="u-s-p-y-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop-p">
                        <div class="shop-p__toolbar u-s-m-b-30">
                            
                            <div class="shop-p__tool-style">
                                <div class="tool-style__group u-s-m-b-8">

                                    <span class="js-shop-filter-target" data-side="#side-filter">Filters</span>

                                    <span class="js-shop-grid-target">Grid</span>

                                    <span class="js-shop-list-target is-active">List</span>
                                </div>
                                <form>
                                    <div class="tool-style__form-wrap">
                                        <div class="u-s-m-b-8"><select class="select-box select-box--transparent-b-2">
                                                <option>Show: 8</option>
                                                <option selected>Show: 12</option>
                                                <option>Show: 16</option>
                                                <option>Show: 28</option>
                                            </select></div>
                                        <div class="u-s-m-b-8"><select class="select-box select-box--transparent-b-2">
                                                <option selected>Sort By: Newest Items</option>
                                                <option>Sort By: Latest Items</option>
                                                <option>Sort By: Best Selling</option>
                                                <option>Sort By: Best Rating</option>
                                                <option>Sort By: Lowest Price</option>
                                                <option>Sort By: Highest Price</option>
                                            </select></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="shop-p__collection">
                            <div class="row is-list-active">
                                <?php
                                $products = mysqli_query($conn, "select * from products");



                                while ($row = mysqli_fetch_array($products)) {




                                ?>
                                    <div class="col-lg-3 col-md-4 col-sm-6">
                                        <div class="product-m">
                                            <div class="product-m__thumb">

                                                <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail-affiliate.php?prd=<?php echo $row['id']; ?>">

                                                    <img class="aspect__img" src="dashboard/admin/<?php echo $row['pimg']; ?>" alt=""></a>
                                                
                                                <div class="product-m__add-cart">

                                                    <a class="btn--e-brand" data-modal="modal" data-modal-id="#add-to-cart" href="add_cart.php?id=<?php echo $row['id']; ?>">Add to Cart</a>
                                                </div>
                                            </div>
                                            <div class="product-m__content">
                                                <div class="product-m__category">

                                                    <a href="shop-side-version-2.php">
                                                        <?php $cat = $conn->query("select * from product_category where cat_id=" . $row['catnameid'] . "")->fetch_assoc();
                                                        echo $cat['cat_name']; ?>
                                                    </a>
                                                </div>
                                                <div class="product-m__name">

                                                    <a href="product-detail-affiliate.php?prod=<?php echo $row['id'] ?>"><?php echo $row['pname']; ?></a>
                                                </div>
                                                <div class="product-m__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i><i class="far fa-star"></i><i class="far fa-star"></i>

                                                    <span class="product-m__review">(23)</span>
                                                </div>
                                                <div class="product-m__price">Ksh <?php echo $row['pprice']; ?></div>
                                                <div class="product-m__hover">
                                                    <div class="product-m__preview-description">

                                                        <span><?php echo $row['pdesc']; ?></span>
                                                    </div>
                                                    <div class="product-m__wishlist">

                                                        <a class="far fa-heart" href="#" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="u-s-p-y-60">

                            <!--====== Pagination ======-->
                            <ul class="shop-p__pagination">
                                <li class="is-active">

                                    <a href="shop-list-full.html">1</a>
                                </li>
                                <li>

                                    <a href="shop-list-full.html">2</a>
                                </li>
                                <li>

                                    <a href="shop-list-full.html">3</a>
                                </li>
                                <li>

                                    <a href="shop-list-full.html">4</a>
                                </li>
                                <li>

                                    <a class="fas fa-angle-right" href="shop-list-full.html"></a>
                                </li>
                            </ul>
                            <!--====== End - Pagination ======-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section 1 ======-->
</div>
<!--====== End - App Content ======-->


<!--====== Main Footer ======-->
<?php include 'includes/footer.php'; ?>

<!--====== Side Filters ======-->
<div class="shop-a" id="side-filter">
    <div class="shop-a__wrap">
        <div class="shop-a__inner gl-scroll">
            <div class="shop-w-master">
                <h1 class="shop-w-master__heading u-s-m-b-30"><i class="fas fa-filter u-s-m-r-8"></i>

                    <span>FILTERS</span>
                </h1>
                <div class="shop-w-master__sidebar">
                    
                    <div class="u-s-m-b-30">
                        <div class="shop-w shop-w--style">
                            <div class="shop-w__intro-wrap">
                                <h1 class="shop-w__h">CATEGORY</h1>

                                <span class="fas fa-minus shop-w__toggle" data-target="#s-category" data-toggle="collapse"></span>
                            </div>
                            <div class="shop-w__wrap collapse show" id="s-category">
                                <ul class="shop-w__category-list gl-scroll">
                                    <?php
                                    $categories = mysqli_query($conn, "select * from product_category");



                                    while ($row = mysqli_fetch_array($categories)) {




                                    ?>

                                        <li class="has-list">

                                            <a href="#"><?php echo $row['cat_name']; ?></a>

                                            <!-- <span class="category-list__text u-s-m-l-6">(23)</span> -->

                                            <span class="js-shop-category-span is-expanded fas fa-plus u-s-m-l-6"></span>
                                            <ul style="display:block">
                                                <?php
                                                $scat = mysqli_query($conn, "select * from sub_cat where cat_id=" . $row['cat_id'] . "  ");
                                                while ($srow = mysqli_fetch_array($scat)) {


                                                ?>
                                                    <li class="has-list">

                                                        <a href="#"><?php echo $srow['sub_cat_name']; ?></a>

                                                        <span class="js-shop-category-span fas fa-plus u-s-m-l-6"></span>
                                                        <ul>
                                                            <?php
                                                            $prod = mysqli_query($conn, "select * from products where subcatname=" . $srow['subcatid'] . "  ");
                                                            while ($prow = mysqli_fetch_array($prod)) {


                                                            ?>
                                                                <li>

                                                                    <a href="#"><?php echo $prow['pname']; ?></a>
                                                                </li>
                                                            <?php } ?>

                                                        </ul>
                                                    </li>
                                                <?php } ?>



                                            </ul>
                                        </li>
                                    <?php } ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="u-s-m-b-30">
                        <div class="shop-w">
                            <div class="shop-w__intro-wrap">
                                <h1 class="shop-w__h">RATING</h1>

                                <span class="fas fa-minus shop-w__toggle" data-target="#s-rating" data-toggle="collapse"></span>
                            </div>
                            <div class="shop-w__wrap collapse show" id="s-rating">
                                <ul class="shop-w__list gl-scroll">
                                    <li>
                                        <div class="rating__check">

                                            <input type="checkbox">
                                            <div class="rating__check-star-wrap"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></div>
                                        </div>

                                        <span class="shop-w__total-text">(2)</span>
                                    </li>
                                    <li>
                                        <div class="rating__check">

                                            <input type="checkbox">
                                            <div class="rating__check-star-wrap"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i>

                                                <span>& Up</span>
                                            </div>
                                        </div>

                                        <span class="shop-w__total-text">(8)</span>
                                    </li>
                                    <li>
                                        <div class="rating__check">

                                            <input type="checkbox">
                                            <div class="rating__check-star-wrap"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>

                                                <span>& Up</span>
                                            </div>
                                        </div>

                                        <span class="shop-w__total-text">(10)</span>
                                    </li>
                                    <li>
                                        <div class="rating__check">

                                            <input type="checkbox">
                                            <div class="rating__check-star-wrap"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>

                                                <span>& Up</span>
                                            </div>
                                        </div>

                                        <span class="shop-w__total-text">(12)</span>
                                    </li>
                                    <li>
                                        <div class="rating__check">

                                            <input type="checkbox">
                                            <div class="rating__check-star-wrap"><i class="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>

                                                <span>& Up</span>
                                            </div>
                                        </div>

                                        <span class="shop-w__total-text">(1)</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
<!--====== End - Side Filters ======-->


<!--====== Modal Section ======-->








<!--====== End - Add to Cart Modal ======-->
<!--====== End - Modal Section ======-->
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