<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="SSG MART">
    <meta name="keywords" content="SsgMart, SSGMART, ssgmart, ssg_mart,bestmart,noidabestmart">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SSG MART</title>
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
            
                <?php if(!empty($loggedinCusomter[0]->id)){ ?>
                    <div class="header__top__right__language">
                        <i class="fa fa-user"></i>
                        <span class="arrow_carrot-down"></span>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>Website/Website_controller/customeraccount">Account</a></li>
                            <li><a href="<?php echo base_url(); ?>Website/Website_controller/customerlogout">Logout</a></li>
                        </ul>
                    </div>
                <?php }else{ ?>
                    <div class="header__top__right__auth">
                        <a href="<?php echo base_url(); ?>Website/Website_controller/customerlogin"><i class="fa fa-user"></i> Login</a>
                    </div>
                <?php } ?>
           
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

                <li class="<?php if(!empty($page_active)){ if($page_active=='aboutus'){ ?> active <?php } } ?>"><a href="<?php echo base_url(); ?>Website/Website_controller/aboutus">About Us</a></li>

                <li class="<?php if(!empty($page_active)){ if($page_active=='order'){ ?> active <?php } } ?>"><a href="<?php echo base_url(); ?>Website/Website_controller/ordernow">Order</a></li>
                <li class="<?php if(!empty($page_active)){ if($page_active=='newoffers'){ ?> active <?php } } ?>"><a href="<?php echo base_url(); ?>Website/Website_controller/newoffers">Offers</a></li>
                
               <!--  <li class="<?php //if(!empty($page_active)){ if($page_active=='pages'){ ?> active <?php //} } ?>"><a href="#">Pages</a>
                    <ul class="header__menu__dropdown"> -->
                       <!--  <li><a href="#">Shop Details</a></li> -->
                       <!--  <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                        <li><a href="./checkout.html">Check Out</a></li> -->
                        <!-- <li><a href="#">Blog Details</a></li> -->
                   <!--  </ul>
                </li> -->
                
                <li class="<?php if(!empty($page_active)){ if($page_active=='contactus'){ ?> active <?php } } ?>"><a href="<?php echo base_url(); ?>Website/Website_controller/contactus">Contact</a></li>
                <li>
                    <!-- <a href="<?php echo base_url(); ?>Website/Website_controller/newoffers"> -->
                        <a href="<?php echo base_url(); ?>Website/QrScanner/scan">
                        <img src="<?php echo base_url(); ?>ssgassests/img/banner/new-gif-image.gif" height="50px" width="50px" alt=""></a></li>
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
        <?php 
            $topheadingmsg="For Orders Please Contact Us.";
            if($homepageInfo[0]->topheadingmsg){ 
                $topheadingmsg=$homepageInfo[0]->topheadingmsg;
            }else{
                $topheadingmsg="For Orders Please Contact Us.";
            }
        ?>
        <div class="humberger__menu__contact">
            <ul>
                <!-- <li>
                    <button id="hmgAudioButton">
                    <img id="hmgAudioIcon" src="<?php //echo base_url(); ?>ssgassests/img/play.png" alt="Play Icon">
                    <span id="hmgAudioText">Play</span>
                </button>
                <audio id="hmgAudioPlayer" src="<?php //echo base_url(); ?>ssgassests/audiofiles/ssgmart_3_new.mp3"></audio>
                </li> -->
                <li><div behavior="scroll" direction="left" style="font-weight: bold;color: blue; animation: blinkssg 1s infinite;"><?php echo $topheadingmsg; ?></div></li>
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
                                <!-- <li><i class="fa fa-envelope"></i> ssgmart9@gmail.com</li> -->
                                <li>
                                   <!--  <div>
                                        <button id="audioButton">
                                            <img id="audioIcon" src="<?php //echo base_url(); ?>ssgassests/img/play.png" alt="Play Icon">
                                            <span id="audioText">Play</span>
                                        </button>
                                        <audio id="audioPlayer" src="<?php //echo base_url(); ?>ssgassests/audiofiles/ssgmart_3_new.mp3"></audio>
                                    </div> -->
                                </li>
                                <li>
                                    <div behavior="scroll" direction="left" style="font-weight: bold;  color: blue; animation: blinkssg 1s infinite;"><?php echo $topheadingmsg; ?></div>
                                   
                                </li>
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
                                <?php if(!empty($loggedinCusomter[0]->id)){ ?>
                                    <div class="header__top__right__language">
                                        <i class="fa fa-user"></i>
                                        <span class="arrow_carrot-down"></span>
                                        <ul>
                                            <li><a href="<?php echo base_url(); ?>Website/Website_controller/customeraccount">Account</a></li>
                                            <li><a href="<?php echo base_url(); ?>Website/Website_controller/customerlogout">Logout</a></li>
                                        </ul>
                                    </div>
                                    
                                <?php }else{ ?>
                                    <div class="header__top__right__auth">
                                        <a href="<?php echo base_url(); ?>Website/Website_controller/customerlogin"><i class="fa fa-user"></i> Login</a>
                                    </div>
                                <?php } ?>
                            
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
                            <li class="<?php if(!empty($page_active)){ if($page_active=='aboutus'){ ?> active <?php } } ?>"><a href="<?php echo base_url(); ?>Website/Website_controller/aboutus">About Us</a></li>
                            <li class="<?php if(!empty($page_active)){ if($page_active=='order'){ ?> active <?php } } ?>"><a href="<?php echo base_url(); ?>Website/Website_controller/ordernow">Order</a></li>
                            <li class="<?php if(!empty($page_active)){ if($page_active=='newoffers'){ ?> active <?php } } ?>"><a href="<?php echo base_url(); ?>Website/Website_controller/newoffers">Offers</a></li>
                            <!-- <li class="<?php //if(!empty($page_active)){ if($page_active=='pages'){ ?> active <?php //} } ?>"><a href="#">Pages</a> -->
                                <!-- <ul class="header__menu__dropdown">
                                    <li><a href="#">Shop Details</a></li> -->
                                    <!-- <li><a href="#">Shoping Cart</a></li> -->
                                   <!--  <li><a href="#">Check Out</a></li>
                                    <li><a href="#">Blog Details</a></li> -->
                               <!--  </ul>
                            </li> -->
                           
                            <li class="<?php if(!empty($page_active)){ if($page_active=='contactus'){ ?> active <?php } } ?>"><a href="<?php echo base_url(); ?>Website/Website_controller/contactus">Contact</a></li>
                            <li>
                                <!-- <a href="<?php //echo base_url(); ?>Website/Website_controller/newoffers"> -->
                                <a href="<?php echo base_url(); ?>Website/QrScanner/scan">
                                    <img src="<?php echo base_url(); ?>ssgassests/img/banner/new-gif-image.gif" height="35px" width="60px" alt=""></a></li>
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
<style>
  @keyframes blinkssg {
    0% { color: blue; }
    25% { color: red; }
    50% { color: darkgreen; }
    75% { color: yellow; }
    100% { color: blue; }
  }
</style>
<script>
        const audioPlayer = document.getElementById('audioPlayer');
        const audioButton = document.getElementById('audioButton');
        const audioIcon = document.getElementById('audioIcon');
        const audioText = document.getElementById('audioText');

        // Handle button click
        audioButton.addEventListener('click', () => {
            if (audioPlayer.paused) {
                audioPlayer.play();
                audioIcon.src = '<?php echo base_url(); ?>ssgassests/img/mute.png'; // Change to pause icon
                audioText.textContent = 'Pause';
            } else {
                audioPlayer.pause();
                audioPlayer.currentTime = 0; // Reset to start
                audioIcon.src = '<?php echo base_url(); ?>ssgassests/img/play.png'; // Change to play icon
                audioText.textContent = 'Play';
            }
        });

        // Reset button text and icon when audio ends
        audioPlayer.addEventListener('ended', () => {
            audioIcon.src = '<?php echo base_url(); ?>ssgassests/img/play.png'; // Change back to play icon
            audioText.textContent = 'Play';
        });



        const hmgaudioPlayer = document.getElementById('hmgAudioPlayer');
        const hmgaudioButton = document.getElementById('hmgAudioButton');
        const hmgaudioIcon = document.getElementById('hmgAudioIcon');
        const hmgaudioText = document.getElementById('hmgAudioText');

        // Handle button click
        hmgaudioButton.addEventListener('click', () => {
            if (hmgaudioPlayer.paused) {
                hmgaudioPlayer.play();
                hmgaudioIcon.src = '<?php echo base_url(); ?>ssgassests/img/mute.png'; // Change to pause icon
                hmgaudioText.textContent = 'Pause';
            } else {
                hmgaudioPlayer.pause();
                hmgaudioPlayer.currentTime = 0; // Reset to start
                hmgaudioIcon.src = '<?php echo base_url(); ?>ssgassests/img/play.png'; // Change to play icon
                hmgaudioText.textContent = 'Play';
            }
        });

        // Reset button text and icon when audio ends
        hmgaudioPlayer.addEventListener('ended', () => {
            audioIcon.src = '<?php echo base_url(); ?>ssgassests/img/play.png'; // Change back to play icon
            audioText.textContent = 'Play';
        });
    </script>
    <style>
        #audioButton {
            font-size: 14px;
            cursor: pointer;
            background-color: #7fad39;
            color: white;
            border: none;
            border-radius: 5px;
            animation: blinkColors 2s infinite; /* Apply color blink animation */
        }

        #audioButton img {
            width: 20px;
            margin-right: 10px;
        }



        /*======mobile========*/
      

        @keyframes blinkColors {
            0% { background-color: red; }
            33% { background-color: green; }
            66% { background-color: blue; }
            100% { background-color: red; }
        }

        #hmgAudioButton {
            font-size: 14px;
            cursor: pointer;
            color: white;
            border: none;
            border-radius: 5px;
            animation: blinkColors 2s infinite; /* Apply color blink animation */
        }

        #hmgAudioButton img {
            width: 20px;
            margin-right: 10px;
        }
    </style>