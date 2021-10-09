<!doctype html>
<html lang="en">

<head>
    <title>Soko mlangoni</title>
    <!--== META TAGS ==-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="theme-color" content="#76cef1" />
    <meta property="og:image" content="images/home/logo-b.png" />
    <meta name="description" content="">
    <meta name="keyword" content="">
    <!--== FAV ICON(BROWSER TAB ICON) ==-->
    <link rel="shortcut icon" href="images/fav.ico" type="image/x-icon">
    <!--== GOOGLE FONTS ==-->
    <link href="https://fonts.googleapis.com/css?family=Oswald:700|Source+Sans+Pro:300,400,600,700&display=swap" rel="stylesheet">
    <!--== WEB ICON FONTS ==-->
    <link rel="preload" as="font" href="css/icon.woff2" type="font/woff2" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--== CSS FILES ==-->
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/fonts.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
    <!-- START -->
    <section>
        <div class="str">
            <div>
                <div class="hom-top">
                    <div class="container">
                        <div class="row">
                            <div class="hom-nav  db-open ">
                                <!--MOBILE MENU-->
                                <!--<div class="menu">
                                <i class="material-icons mopen">menu</i>
                            </div>-->
                                <a href="index.php" class="top-log">
                                    <!-- <img src="images/home/logo-b.png" alt="" class="ic-logo"> -->
                                </a>
                                <div class="menu">
                                    <h4>All Category</h4>
                                </div>
                                <div class="pop-menu">
                                    <div class="container">
                                        <div class="row"> <i class="material-icons clopme">close</i>
                                            
                                            <div class="pmenu-cat">
                                                <h4>All Categories</h4>
                                                <input type="text" id="pg-sear" placeholder="Search category">
                                                <ul id="pg-resu">
                                                    <?php
                                                    $categories = mysqli_query($conn, "select * from product_category");



                                                    while ($row = mysqli_fetch_array($categories)) {




                                                    ?>
                                                        <li><a href="../shop-side-version-2.php?main=<?php echo $row['cat_id']; ?>"><?php echo $row['cat_name']; ?><span></span></a>
                                                        </li>
                                                    <?php } ?>

                                                </ul>
                                            </div>
                                            <div class="dir-home-nav-bot">
                                                <ul>
                                                    <li>A few reasons you’ll love Online Business Directory <span>Call us on: +01 6214 6548</span>
                                                    </li>
                                                    <li><a href="post-your-ads.html.html" class="waves-effect waves-light btn-large"><i class="material-icons">font_download</i> Advertise with us</a>
                                                    </li>
                                                    <li>
                                                        <a href="pricing-details.html.html" class="waves-effect waves-light btn-large"> <i class="material-icons">store</i> Add your business</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--END MOBILE MENU-->
                                
                                <div class="al">
                                    <div class="head-pro">
                                        <img src=" <?php
                                    $ret = mysqli_query($conn, "select * from users where user_id='" . $_SESSION['id'] . "' ")->fetch_assoc();
                                    
                                    echo $ret['profpic'];
                                    ?>" alt=""> <b>Profile by</b>
                                        <br>
                                        <h4><?php echo $_SESSION['login']; ?></h4>
                                        <a href="dashboard.php" class="fclick"></a>
                                    </div>
                                    <div class="db-menu">
                                        <ul>

                                            <li>
                                                <a href="add-new-product.php" class="tz-lma">
                                                    <img src="images/icon/dbl3.png" alt="" />Add New Product</a>
                                            </li>
                                            <li>
                                                <a href="db-enquiry.html">
                                                    <img src="images/icon/dbl14.png" alt="" />Lead enquiry</a>
                                            </li>

                                            <li>
                                                <a href="db-review.html">
                                                    <img src="images/icon/dbl13.png" alt="" />Reviews</a>
                                            </li>
                                            <li>
                                                <a href="db-my-profile.php">
                                                    <img src="images/icon/dbl6.png" alt="" />My Profile</a>
                                            </li>
                                            <li>
                                                <a href="logout.php">
                                                    <img src="images/icon/dbl12.png" alt="" />Log Out</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!--MOBILE MENU-->
                                <div class="mob-menu">
                                    <div class="mob-me-ic"><i class="material-icons">menu</i>
                                    </div>
                                    <div class="mob-me-all">
                                        <div class="mob-me-clo"><i class="material-icons">close</i>
                                        </div>
                                        <div class="mv-pro ud-lhs-s1">
                                            <img src="images/user/62736rn53themes.png" alt="">
                                            <h4>Rn53 Themes</h4>
                                            <b>Join on 26, Mar 2021</b>
                                        </div>
                                        <div class="mv-pro-menu ud-lhs-s2">
                                            <ul>
                                                <li>
                                                    <a href="dashboard.html" class="db-lact">
                                                        <img src="images/icon/dbl1.png" alt="" />My Dashboard</a>
                                                </li>

                                                <li>
                                                    <a href="db-enquiry.html" class="">
                                                        <img src="images/icon/tick.png" alt="" />Lead enquiry</a>
                                                </li>
                                                <li>
                                                    <a href="db-products.html" class="">
                                                        <img src="images/icon/cart.png" alt="" />All Products</a>
                                                </li>

                                                <li>
                                                    <a href="db-message.html" class="">
                                                        <img src="images/icon/dbl14.png" alt="" />Messages</a>
                                                </li>
                                                <li>
                                                    <a href="db-my-profile.html" class="">
                                                        <img src="images/icon/dbl6.png" alt="" />My Profile</a>
                                                </li>

                                                <li>
                                                    <a href="db-notifications.html" class="">
                                                        <img src="images/icon/dbl19.png" alt="" />Notifications</a>
                                                </li>
                                                <li>
                                                    <a href="how-to.html" class="" target="_blank">
                                                        <img src="images/icon/dbl17.png" alt="" />How to's</a>
                                                </li>
                                                <li>
                                                    <a href="db-setting.html" class="">
                                                        <img src="images/icon/dbl210.png" alt="" />Setting</a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <img src="images/icon/dbl12.png" alt="" />Log Out</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="mv-cate">
                                            <h4>All Categories</h4>
                                            <ul>
                                                <li> <a href="all-listing.html">Wedding halls</a>
                                                </li>
                                                <li> <a href="all-listing.html">Hotel & Food</a>
                                                </li>
                                                <li> <a href="all-listing.html">Pet shop</a>
                                                </li>
                                                <li> <a href="all-listing.html">Digital Products</a>
                                                </li>
                                                <li> <a href="all-listing.html">Spa and Facial</a>
                                                </li>
                                                <li> <a href="all-listing.html">Real Estate</a>
                                                </li>
                                                <li> <a href="all-listing.html">Sports</a>
                                                </li>
                                                <li> <a href="all-listing.html">Education</a>
                                                </li>
                                                <li> <a href="all-listing.html">Electricals</a>
                                                </li>
                                                <li> <a href="all-listing.html">Automobiles</a>
                                                </li>
                                                <li> <a href="all-listing.html">Transportation</a>
                                                </li>
                                                <li> <a href="all-listing.html">Hospitals</a>
                                                </li>
                                                <li> <a href="all-listing.html">Hotels And Resorts</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!--END MOBILE MENU-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>