    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Our Products</span>
                        </div>
                        <ul>
                            <li><a href="#">Biscuits</a></li>
                            <li><a href="#">Namkeen</a></li>
                            <li><a href="#">Ice Cream</a></li>
                            <li><a href="#">Maggi & Macaroni</a></li>
                            <li><a href="#">Cold Drinks</a></li>
                            <li><a href="#">Rice</a></li>
                            <li><a href="#">Flour</a></li>
                            <li><a href="#">Pickles</a></li>
                            <li><a href="#">Sago</a></li>
                            <li><a href="#">Toys & Gifts</a></li>
                            <li><a href="#">Stationery</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+91 8178584340</h5>
                                <span>Support 9 AM To 10 PM</span>
                            </div>
                        </div>
                    </div>
                    <div class="hero__item set-bg" data-setbg="<?php echo base_url(); ?>ssgassests/img/hero/ssgbanner.PNG">
                        <div class="hero__text">
                            <span>FRESH PRODUCTS</span>
                            <h2>SSG MART</h2>
                            <p>*Free Delivery Available</p>
                            <a href="<?php echo base_url(); ?>Website/Website_controller/ordernow" class="primary-btn">ORDER NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                     <?php 
                        if(!empty($sliderProduct)) { 
                            $i=1; foreach($sliderProduct as $row) {

                    ?>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="<?php echo base_url(); ?>/ssgassests/productupload/<?php echo $row->thumble_image; ?>">
                            <h5><a href="#"><?php echo $row->product_name; ?></a></h5>
                        </div>
                    </div>
                    <?php $i++; } } ?>
                   <!--  <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="<?php echo base_url(); ?>ssgassests/img/categories/cat-2.jpg">
                            <h5><a href="#">Parle G Biscuit</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="<?php echo base_url(); ?>ssgassests/img/categories/cat-3.jpg">
                            <h5><a href="#">Hair Product</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="<?php echo base_url(); ?>ssgassests/img/categories/cat-4.jpg">
                            <h5><a href="#">Drink Fruits</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="<?php echo base_url(); ?>ssgassests/img/categories/cat-5.jpg">
                            <h5><a href="#">Dove Shampoo</a></h5>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->
