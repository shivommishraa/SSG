    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                    <div class="featured__controls">
                        <?php if(!empty($featuredcategory) && !empty($enabledProductsForFeatured)) { ?>
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <?php $i=1; foreach($featuredcategory as $fcategory) { ?>
                            <li data-filter=".cname_<?php echo $fcategory->category_id; ?>"><?php echo $fcategory->category_name; ?></li>
                            <?php  $i++; } ?>
                        </ul>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                 <?php if(!empty($enabledProductsForFeatured) && !empty($featuredcategory)) { ?>
                    <?php $i=1; foreach($enabledProductsForFeatured as $fproducts) { ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix <?php echo "cname_".$fproducts->enable_featured_product; ?> fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="<?php echo base_url(); ?>/ssgassests/productupload/<?php echo $fproducts->thumble_image; ?>">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="<?php echo base_url(); ?>Website/Website_controller/ordernow" target="_blank"><?php echo $fproducts->product_name; ?></a></h6>
                            <!-- <h5>₹30.00</h5> -->
                        </div>
                    </div>
                </div>
                <?php  $i++; } ?>
                <?php } ?>
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="<?php echo base_url(); ?>ssgassests/img/banner/banner-1.PNG" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="<?php echo base_url(); ?>ssgassests/img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <?php if(!empty($latestProduct)) { ?>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                 <?php $i=1; foreach($latestProduct as $ltproducts) { ?>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="<?php echo base_url(); ?>/ssgassests/productupload/<?php echo $ltproducts->thumble_image; ?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?php echo $ltproducts->product_name; ?></h6>
                                        <!-- <span>$30.00</span> -->
                                    </div>
                                </a>
                                <?php  $i++; } ?>
                                <!-- <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="<?php echo base_url(); ?>ssgassests/img/latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="<?php echo base_url(); ?>ssgassests/img/latest-product/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a> -->
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <?php $i=1; foreach($latestProduct as $ltproducts) { ?>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="<?php echo base_url(); ?>/ssgassests/productupload/<?php echo $ltproducts->thumble_image; ?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?php echo $ltproducts->product_name; ?></h6>
                                        <!-- <span>$30.00</span> -->
                                    </div>
                                </a>
                                <?php  $i++; } ?>
                                <!-- <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="<?php echo base_url(); ?>ssgassests/img/latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="<?php echo base_url(); ?>ssgassests/img/latest-product/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a> -->
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php if(!empty($topRatedProduct)) { ?>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Rated</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <?php $i=1; foreach($topRatedProduct as $trproducts) { ?>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="<?php echo base_url(); ?>/ssgassests/productupload/<?php echo $trproducts->thumble_image; ?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?php echo $trproducts->product_name; ?></h6>
                                        <!-- <span>$30.00</span> -->
                                    </div>
                                </a>
                                <?php  $i++; } ?>
                               <!--  <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="<?php echo base_url(); ?>ssgassests/img/latest-product/lp-2.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="<?php echo base_url(); ?>ssgassests/img/latest-product/lp-3.jpg" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>Crab Pool Security</h6>
                                        <span>$30.00</span>
                                    </div>
                                </a> -->
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <?php $i=1; foreach($topRatedProduct as $trproducts) { ?>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="<?php echo base_url(); ?>/ssgassests/productupload/<?php echo $trproducts->thumble_image; ?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?php echo $trproducts->product_name; ?></h6>
                                        <!-- <span>$30.00</span> -->
                                    </div>
                                </a>
                                <?php  $i++; } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php if(!empty($mostViewedProduct)) { ?>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Most Viewed</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                <?php $i=1; foreach($mostViewedProduct as $mvproducts) { ?>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="<?php echo base_url(); ?>/ssgassests/productupload/<?php echo $mvproducts->thumble_image; ?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?php echo $mvproducts->product_name; ?></h6>
                                        <!-- <span>$30.00</span> -->
                                    </div>
                                </a>
                                <?php  $i++; } ?>
                            </div>
                            <div class="latest-prdouct__slider__item">
                                <?php $i=1; foreach($mostViewedProduct as $mvproducts) { ?>
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="<?php echo base_url(); ?>/ssgassests/productupload/<?php echo $mvproducts->thumble_image; ?>" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6><?php echo $mvproducts->product_name; ?></h6>
                                        <!-- <span>$30.00</span> -->
                                    </div>
                                </a>
                                <?php  $i++; } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </section>
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    <!-- <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="<?php echo base_url(); ?>ssgassests/img/blog/blog-1.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Cooking tips make cooking simple</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="<?php echo base_url(); ?>ssgassests/img/blog/blog-2.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="<?php echo base_url(); ?>ssgassests/img/blog/blog-3.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Visit the clean farm in the US</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Blog Section End -->

<!-- -------------- Start Code for POPUP ------------------ -->
<!-- <head>    
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

    <style>
        
        .w3-modal-content {
            background-color: #282c34;
            color: white;
            border-radius: 10px;
        }
        .w3-container img {
            width: 100%;
            border-radius: 10px;
        }
        .w3-button {
            transition: background-color 0.3s;
        }
        .w3-button:hover {
            background-color: #ff7f50;
        }
           .custom-button {
        background-color: #282c34; /* Set button background color */
        color: white; /* Text color */
        border: none; /* Remove border */
        border-radius: 15px; /* Round corners */
        padding: 10px 20px; /* Add some padding */
        text-align: center; /* Center text */
        text-decoration: none; /* Remove underline */
        display: inline-block; /* Make it inline */
        font-size: 16px; /* Font size */
        transition: background-color 0.3s; /* Transition for hover effect */
    }

    .custom-button:hover {
        background-color: #1f2125; /* Darken color on hover */
    }

    .footer-custom {
        background-color: #282c34; /* Footer background color */
        color: white; /* Footer text color */
    }
    </style>
    <script>
        window.onload = function() {
            document.getElementById('id01').style.display = 'block';
        };
    </script> -->
<!-- 
<div class="w3-container">
    <div id="id01" class="w3-modal">
        <div class="w3-modal-content w3-animate-top w3-card-4">
            <header class="w3-container w3-teal"> 
                <span onclick="document.getElementById('id01').style.display='none'" class="w3-button w3-display-topright">&times;</span>
              
            </header>
            <div class="w3-container">
                <img src="<?php //echo base_url(); ?>ssgassests/img/diwalibanner.jpg" alt="Image">
            </div>
            <footer class="w3-container w3-teal footer-custom" style="background-color: #282c34;">
                <div style="text-align: center;">
                    <a href="<?php //echo base_url(); ?>Website/Website_controller/ordernow" class="custom-button">Order Now</a>
                </div>
            </footer>
        </div>
    </div>
</div> -->
<!-- -------------- End Code for POPUP ------------------ -->