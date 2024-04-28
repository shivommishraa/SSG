<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="SSG Hyper Mart">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SSG Hyper Mart</title>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>ssgassests/img/ssglogo.png" type="image/x-icon" />
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>ssgassests/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>ssgassests/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>ssgassests/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>ssgassests/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>ssgassests/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>ssgassests/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>ssgassests/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>ssgassests/css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>ssgassests/img/ssglogo.png" alt=""></a>
        </div>
        <!-- <div class="humberger__menu__cart">
            <ul>
                <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
            </ul>
            <div class="header__cart__price">item: <span>$150.00</span></div>
        </div> -->
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="<?php echo base_url(); ?>ssgassests/img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Hindi</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <a href="#"><i class="fa fa-user"></i> Login</a>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <!-- <li class="active"><a href="./index.html">Home</a></li>
                <li><a href="./shop-grid.html">Shop</a></li>
                <li><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="./shop-details.html">Shop Details</a></li>
                        <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                        <li><a href="./checkout.html">Check Out</a></li>
                        <li><a href="./blog-details.html">Blog Details</a></li>
                    </ul>
                </li>
                <li><a href="./blog.html">Blog</a></li>
                <li><a href="./contact.html">Contact</a></li> -->
                <li  class="<?php if(!empty($page_active)){ if($page_active=='index_active'){ ?> active <?php } } ?>"><a href="<?php echo base_url(); ?>">Home</a></li>
                <li class="<?php if(!empty($page_active)){ if($page_active=='order'){ ?> active <?php } } ?>"><a href="<?php echo base_url(); ?>/Website/Website_controller/ordernow">Order</a></li>
                <!-- <li class="<?php if(!empty($page_active)){ if($page_active=='shop'){ ?> active <?php } } ?>"><a href="#">Shop</a></li> -->
                <li class="<?php if(!empty($page_active)){ if($page_active=='pages'){ ?> active <?php } } ?>"><a href="#">Pages</a>
                    <ul class="header__menu__dropdown">
                        <li><a href="#">Shop Details</a></li>
                       <!--  <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                        <li><a href="./checkout.html">Check Out</a></li> -->
                        <li><a href="#">Blog Details</a></li>
                    </ul>
                </li>
                <li class="<?php if(!empty($page_active)){ if($page_active=='blog'){ ?> active <?php } } ?>"><a href="$">Blog</a></li>
                <li class="<?php if(!empty($page_active)){ if($page_active=='contactus'){ ?> active <?php } } ?>"><a href="<?php echo base_url(); ?>/Website/Website_controller/contactus">Contact</a></li>
                <li><a href="<?php echo base_url(); ?>Website/Website_controller/newoffers"><img src="<?php echo base_url(); ?>ssgassests/img/banner/new-gif-image.gif" height="50px" width="50px" alt=""></a></li>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a target="_blank" href="https://www.youtube.com/@SSGHYPERMART"><i class="fa fa-youtube"></i></a>
            <a target="_blank" href="https://www.instagram.com/ssghypermart/"><i class="fa fa-instagram"></i></a>
            <!--<a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>-->
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> ssgmart9@gmail.com</li>
                <li>For Orders Please Contact Us.</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> ssgmart9@gmail.com</li>
                                <li>For Orders Please Contact Us.</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                  <a target="_blank" href="https://www.youtube.com/@SSGHYPERMART"><i class="fa fa-youtube"></i></a>
                                  <a target="_blank" href="https://www.instagram.com/ssghypermart/"><i class="fa fa-instagram"></i></a>
                                <!--<a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>-->
                            </div>
                            <div class="header__top__right__language">
                                <img src="<?php echo base_url(); ?>ssgassests/img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Hindi</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth">
                                <a href="#"><i class="fa fa-user"></i> Login</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>ssgassests/img/ssglogo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-9">
                    <nav class="header__menu">
                        <ul>
                            <li class="<?php if(!empty($page_active)){ if($page_active=='index_active'){ ?> active <?php } } ?>"><a href="<?php echo base_url(); ?>">Home</a></li>
                            <li class="<?php if(!empty($page_active)){ if($page_active=='order'){ ?> active <?php } } ?>"><a href="<?php echo base_url(); ?>/Website/Website_controller/ordernow">Order</a></li>
                            <!-- <li class="<?php if(!empty($page_active)){ if($page_active=='shop'){ ?> active <?php } } ?>"><a href="#">Shop</a></li> -->
                            <li class="<?php if(!empty($page_active)){ if($page_active=='pages'){ ?> active <?php } } ?>"><a href="#">Pages</a>
                                <ul class="header__menu__dropdown">
                                    <li><a href="#">Shop Details</a></li>
                                    <!-- <li><a href="#">Shoping Cart</a></li> -->
                                   <!--  <li><a href="#">Check Out</a></li>
                                    <li><a href="#">Blog Details</a></li> -->
                                </ul>
                            </li>
                            <li class="<?php if(!empty($page_active)){ if($page_active=='blog'){ ?> active <?php } } ?>"><a href="#">Blog</a></li>
                            <li class="<?php if(!empty($page_active)){ if($page_active=='contactus'){ ?> active <?php } } ?>"><a href="<?php echo base_url(); ?>/Website/Website_controller/contactus">Contact</a></li>
                            <li><a href="<?php echo base_url(); ?>Website/Website_controller/newoffers"><img src="<?php echo base_url(); ?>ssgassests/img/banner/new-gif-image.gif" height="35px" width="60px" alt=""></a></li>
                        </ul>
                    </nav>
                </div>
               <!--  <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                            <li><a href="#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span>$150.00</span></div>
                    </div>
                </div> -->
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
