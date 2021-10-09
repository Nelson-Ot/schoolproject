<?php
include 'connect.php';


session_start();
//initialize cart if not set or is unset
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

//unset qunatity
unset($_SESSION['qty_array']);
?>
<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="images/logo/sokologo.jpg" rel="shortcut icon">
    <title>Soko Mlangoni</title>

    <!--====== Google Font ======-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">

    <!--====== Vendor Css ======-->
    <link rel="stylesheet" href="css/vendor.css">

    <!--====== Utility-Spacing ======-->
    <link rel="stylesheet" href="css/utility.css">

    <!--====== App ======-->
    <link rel="stylesheet" href="css/app.css">

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>

<body class="config">
    <div class="preloader is-active">
        <div class="preloader__wrap">

            <img class="preloader__img" src="images/preloader.png" alt="">
        </div>
    </div>

    <!--====== Main App ======-->
    <div id="app">

        <!--====== Main Header ======-->
        <header class="header--style-1 header--box-shadow">

            <!--====== Nav 1 ======-->
            <nav class="primary-nav primary-nav-wrapper--border">
                <div class="container">

                    <!--====== Primary Nav ======-->
                    <div class="primary-nav">

                        <!--====== Main Logo ======-->

                        <a class="main-logo" href="index.php">

                            <img src="images/logo/sokologo.jpg" alt=""></a>
                        <!--====== End - Main Logo ======-->


                        <!--====== Search Form ======-->
                        <form class="main-form" method="GET" action="shop-grid-full.php">

                            <label for="main-search"></label>

                            <input class="input-text input-text--border-radius input-text--style-1" type="text" id="main-search" placeholder="Search" name="search">

                            <button class="btn btn--icon fas fa-search main-search-button" type="submit"></button>
                        </form>
                        <!--====== End - Search Form ======-->


                        <!--====== Dropdown Main plugin ======-->
                        <div class="menu-init" id="navigation">

                            <button class="btn btn--icon toggle-button fas fa-cogs" type="button"></button>

                            <!--====== Menu ======-->
                            <div class="ah-lg-mode">

                                <span class="ah-close">✕ Close</span>

                                <!--====== List ======-->
                                <ul class="ah-list ah-list--design1 ah-list--link-color-secondary">
                                    <li class="has-dropdown" data-tooltip="tooltip" data-placement="left" title="Account">

                                        <a><i class="far fa-user-circle"></i></a>

                                        <!--====== Dropdown ======-->

                                        <span class="js-menu-toggle"></span>
                                        <ul style="width:120px">
                                            <li>

                                                <a href="dashboard.html"><i class="fas fa-user-circle u-s-m-r-6"></i>

                                                    <span>Account</span></a>
                                            </li>
                                            <li>

                                                <a href="signup.php"><i class="fas fa-user-plus u-s-m-r-6"></i>

                                                    <span>Signup</span></a>
                                            </li>
                                            <li>

                                                <a href="signin.php"><i class="fas fa-lock u-s-m-r-6"></i>

                                                    <span>Signin</span></a>
                                            </li>
                                            <li>

                                                <a href="signup.php"><i class="fas fa-lock-open u-s-m-r-6"></i>

                                                    <span>Signout</span></a>
                                            </li>
                                        </ul>
                                        <!--====== End - Dropdown ======-->
                                    </li>

                                    <li data-tooltip="tooltip" data-placement="left" title="Contact">

                                        <a href="tel:+0900901904"><i class="fas fa-phone-volume"></i></a>
                                    </li>
                                    <li data-tooltip="tooltip" data-placement="left" title="Mail">

                                        <a href="mailto:contact@domain.com"><i class="far fa-envelope"></i></a>
                                    </li>
                                </ul>
                                <!--====== End - List ======-->
                            </div>
                            <!--====== End - Menu ======-->
                        </div>
                        <!--====== End - Dropdown Main plugin ======-->
                    </div>
                    <!--====== End - Primary Nav ======-->
                </div>
            </nav>
            <!--====== End - Nav 1 ======-->


            <!--====== Nav 2 ======-->
            <nav class="secondary-nav-wrapper">
                <div class="container">

                    <!--====== Secondary Nav ======-->
                    <div class="secondary-nav">

                        <!--====== Dropdown Main plugin ======-->
                        <div class="menu-init" id="navigation1">

                            <button class="btn btn--icon toggle-mega-text toggle-button" type="button">Menu</button>

                            <!--====== Menu ======-->
                            <div class="ah-lg-mode">

                                <span class="ah-close">✕ Close</span>

                                <!--====== List ======-->
                                <ul class="ah-list">
                                    <li class="has-dropdown">

                                        <span class="mega-text">Menu</span>

                                        <!--====== Mega Menu ======-->

                                        <span class="js-menu-toggle"></span>

                                        <div class="mega-menu">
                                            <div class="mega-menu-wrap">
                                                <div class="mega-menu-list">
                                                    <ul>
                                                        <?php
                                                        $categories = mysqli_query($conn, "select * from product_category");



                                                        while ($row = mysqli_fetch_array($categories)) {




                                                        ?>
                                                            <li>

                                                                <a href="shop-side-version-2.php?main=<?php echo $row['cat_id']; ?>">

                                                                    <span>
                                                                        <?php echo $row['cat_name']; ?>
                                                                    </span></a>

                                                                <span class="js-menu-toggle js-toggle-mark"></span>
                                                            </li>
                                                        <?php } ?>
                                                    </ul>
                                                </div>

                                                <!--====== Electronics ======-->
                                                <div class="mega-menu-content js-active">

                                                    <!--====== Mega Menu Row ======-->
                                                    <div class="row">
                                                        <?php
                                                        $scat = mysqli_query($conn, "select * from sub_cat");



                                                        while ($row = mysqli_fetch_array($scat)) {




                                                        ?>
                                                            <div class="col-lg-3">
                                                                <ul>
                                                                    <li class="mega-list-title">

                                                                        <a href="shop-side-version-2.html"><?php echo $row['sub_cat_name']; ?></a>
                                                                    </li>
                                                                    <li>

                                                                        <a href="">
                                                                            <?php $p = mysqli_query($conn, "select * from products where subcatname=" . $row['subcatid'] . "")->fetch_assoc();
                                                                            echo $p['pname']; ?>
                                                                        </a>
                                                                    </li>

                                                                </ul>
                                                            </div>
                                                        <?php } ?>

                                                    </div>
                                                    <!--====== End - Mega Menu Row ======-->
                                                    <br>

                                                    <!--====== End - Mega Menu Row ======-->
                                                </div>


                                            </div>
                                        </div>

                                        <!--====== End - Mega Menu ======-->
                                    </li>
                                </ul>
                                <!--====== End - List ======-->
                            </div>
                            <!--====== End - Menu ======-->
                        </div>
                        <!--====== End - Dropdown Main plugin ======-->


                        <!--====== Dropdown Main plugin ======-->
                        <div class="menu-init" id="navigation2">

                            <button class="btn btn--icon toggle-button fas fa-cog" type="button"></button>

                            <!--====== Menu ======-->
                            <div class="ah-lg-mode">

                                <span class="ah-close">✕ Close</span>

                                <!--====== List ======-->
                                <ul class="ah-list ah-list--design2 ah-list--link-color-secondary">
                                    <?php
                                    $categories = mysqli_query($conn, "select * from product_category");



                                    while ($row = mysqli_fetch_array($categories)) {




                                    ?>
                                        <li>

                                            <a href="shop-side-version-2.php?main=<?php echo $row['cat_id']; ?>"><?php echo $row['cat_name']; ?></a>
                                        </li>
                                    <?php } ?>

                                </ul>
                                <!--====== End - List ======-->
                            </div>
                            <!--====== End - Menu ======-->
                        </div>
                        <!--====== End - Dropdown Main plugin ======-->


                        <!--====== Dropdown Main plugin ======-->
                        <div class="menu-init" id="navigation3">

                            <button class="btn btn--icon toggle-button fas fa-shopping-bag toggle-button-shop" type="button"></button>

                            <span class="total-item-round"><?php echo count($_SESSION['cart']); ?></span>

                            <!--====== Menu ======-->
                            <div class="ah-lg-mode">

                                <span class="ah-close">✕ Close</span>

                                <!--====== List ======-->
                                <ul class="ah-list ah-list--design1 ah-list--link-color-secondary">
                                    <li>

                                        <a href="index.php"><i class="fas fa-home"></i></a>
                                    </li>
                                    <li>

                                        <a href="wishlist.html"><i class="far fa-heart"></i></a>
                                    </li>
                                    <li class="has-dropdown">

                                        <a class="mini-cart-shop-link"><i class="fas fa-shopping-bag"></i>

                                            <span class="total-item-round"><?php echo count($_SESSION['cart']); ?></span></a>

                                        <!--====== Dropdown ======-->

                                        <span class="js-menu-toggle"></span>
                                        <div class="mini-cart">

                                            <!--====== Mini Product Container ======-->
                                            <div class="mini-product-container gl-scroll u-s-m-b-15">
                                                <?php
                                                //initialize total
                                                $total = 0;
                                                if (!empty($_SESSION['cart'])) {
                                                    //connection
                                                    
                                                    //create array of initail qty which is 1
                                                    $index = 0;
                                                    if (!isset($_SESSION['qty_array'])) {
                                                        $_SESSION['qty_array'] = array_fill(0, count($_SESSION['cart']), 1);
                                                    }
                                                    $sql = "SELECT * FROM products WHERE id IN (" . implode(',', $_SESSION['cart']) . ")";
                                                    $query = $conn->query($sql);
                                                    while ($row = $query->fetch_assoc()) {
                                                ?>

                                                        <!--====== Card for mini cart ======-->
                                                        <div class="card-mini-product">
                                                            <div class="mini-product">
                                                                <div class="mini-product__image-wrapper">

                                                                    <a class="mini-product__link" href="product-detail.html">

                                                                        <img class="u-img-fluid" src="dashboard/admin/<?php echo $row['pimg'];?>" alt=""></a>
                                                                </div>
                                                                <div class="mini-product__info-wrapper">

                                                                    <span class="mini-product__category">

                                                                        <a href="#">
                                                                        <?php $usr = $conn->query("select * from users where user_id=" . $row['ucode'] . "")->fetch_assoc();
                                                            echo $usr['uname']; ?>
                                                                        
                                                                        </a></span>

                                                                    <span class="mini-product__name">

                                                                        <a href="product-detail-affiliate.php?prod=<?php echo $row['id'];?>"><?php echo $row['pname'];?></a></span>

                                                                    <span class="mini-product__quantity">1 x</span>

                                                                    <span class="mini-product__price">Ksh <?php echo $row['pprice'];?></span>
                                                                </div>
                                                            </div>

                                                            <a class="mini-product__delete-link far fa-trash-alt" href="delete_item.php?id=<?php echo $row['id']; ?>&index=<?php echo $index; ?>"></a>
                                                        </div>
                                                <?php
                                                        $index++;
                                                    }
                                                } ?>
                                                <!--====== End - Card for mini cart ======-->



                                            </div>
                                            <!--====== End - Mini Product Container ======-->


                                            <!--====== Mini Product Statistics ======-->
                                            <div class="mini-product-stat">
                                                <div class="mini-total">

                                                    <span class="subtotal-text">SUBTOTAL</span>

                                                    <span class="subtotal-value">$16</span>
                                                </div>
                                                <div class="mini-action">

                                                    <a class="mini-link btn--e-brand-b-2" href="checkout.html">PROCEED TO CHECKOUT</a>

                                                    <a class="mini-link btn--e-transparent-secondary-b-2" href="cart.php">VIEW CART</a>
                                                </div>
                                            </div>
                                            <!--====== End - Mini Product Statistics ======-->
                                        </div>






                                        <!--====== End - Dropdown ======-->
                                    </li>
                                </ul>
                                <!--====== End - List ======-->
                            </div>
                            <!--====== End - Menu ======-->
                        </div>
                        <!--====== End - Dropdown Main plugin ======-->
                    </div>
                    <!--====== End - Secondary Nav ======-->
                </div>
            </nav>
            <!--====== End - Nav 2 ======-->
        </header>
        <?php
        //info message
        if (isset($_SESSION['message'])) {
        ?>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-6">
                    <div class="alert alert-info text-center">
                        <?php echo $_SESSION['message']; ?>
                    </div>
                </div>
            </div>
        <?php
            unset($_SESSION['message']);
        }
        ?>