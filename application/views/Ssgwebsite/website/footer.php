
    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>ssgassests/img/ssglogo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: CH.CHIRANJI SQUARE<br/>Aimnabad,Behind ACE CITY<br/>Sector-1 Greater Noida West-201306</li>
                            <li>Phone: +91 9310523943</li>
                            <li>Email: ssgmart9@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>Website/Website_controller/aboutus">About Us</a></li>
                            <li><a href="<?php echo base_url(); ?>Website/Website_controller/aboutus#ssgmessage">About Our Shop</a></li>
                            <li><a href="<?php echo base_url(); ?>Website/Website_controller/aboutus#tab3">Delivery infomation</a></li>
                            <li><a href="<?php echo base_url(); ?>Website/Website_controller/aboutus#tab1">Privacy Policy</a></li>
                        </ul>
                        <ul>
                            <li><a href="<?php echo base_url(); ?>Website/Website_controller/ordernow">Order Now</a></li>
                            <li><a href="<?php echo base_url(); ?>Website/Website_controller/aboutus#whychooseus">Our Services</a></li>
                            <li><a href="<?php echo base_url(); ?>Website/Website_controller/contactus">Contact</a></li>
                            <li><a href="<?php echo base_url(); ?>Website/Website_controller/aboutus#ourcustomerfeedback">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest product and special offers.</p>
                        <form action="#">
                            <input type="text" id="newslatteremail" name="newslatteremail" placeholder="Enter your email">
                            <button id="btnnewlattersubmit" type="button" class="site-btn">Subscribe</button>
                        </form>
                        <span id="errormessagenewlatter"></span>
                            <div style="display: none;" class="form-group" id="successmessagenewslatter">
                                <span style="color: blue;">Subscribed successfully.</span>
                            </div>
                        <div class="footer__widget__social">
                            <!--<a target="_blank" href="#"><i class="fa fa-facebook"></i></a>-->
                            <a target="_blank" href="https://www.instagram.com/ssghypermart/"><i class="fa fa-instagram"></i></a>
                            <!--<a target="_blank"href="#"><i class="fa fa-twitter"></i></a>-->
                            <a target="_blank" href="https://www.youtube.com/@SSGHYPERMART"><i class="fa fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p>
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved <i class="fa fa-heart" aria-hidden="true"></i> <a href="<?php echo base_url(); ?>" target="_blank">SSG GROUP</a></p></div>
                       <!--  <div class="footer__copyright__payment"><img src="<?php echo base_url(); ?>ssgassests/img/payment-item.png" alt=""></div> -->
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="<?php echo base_url(); ?>ssgassests/js/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url(); ?>ssgassests/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>ssgassests/js/jquery.nice-select.min.js"></script>
    <script src="<?php echo base_url(); ?>ssgassests/js/jquery-ui.min.js"></script>
    <script src="<?php echo base_url(); ?>ssgassests/js/jquery.slicknav.js"></script>
    <script src="<?php echo base_url(); ?>ssgassests/js/mixitup.min.js"></script>
    <script src="<?php echo base_url(); ?>ssgassests/js/owl.carousel.min.js"></script>
    <script src="<?php echo base_url(); ?>ssgassests/js/main.js"></script>



</body>

</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" language="javascript" >  
$(document).ready(function() {
    $("#btnnewlattersubmit").click(function() { //alert('hello');
        var newslatteremail = $('#newslatteremail').val();
        var status = '0';
        if (newslatteremail == '') {
            document.getElementById("errormessagenewlatter").innerHTML = "Enter Valid Email.";
            document.getElementById("errormessagenewlatter").style.color = "red";
            document.getElementById("newslatteremail").style.border = "1px solid red";
            status++;
        } else {
            document.getElementById("errormessagenewlatter").innerHTML = "";
            document.getElementById("errormessagenewlatter").style.color = "green";
            document.getElementById("newslatteremail").style.border = "1px solid green";
        }
        
        if (status == '0') {
            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url() . 'Website/Website_controller/savenewslatteremail'?>",
                dataType: 'html',
                data: {
                    newslatteremail: newslatteremail
                },
                success: function(res) {
                    if (res == 1) {
                        $('#newslatteremail').val('');
                        $('#successmessagenewslatter').show();
                        document.getElementById("errormessagenewlatter").innerHTML = "";
                        document.getElementById("errormessagenewlatter").style.color = "";
                        document.getElementById("newslatteremail").style.border = "1px solid";
                        var myVar = setInterval(myTimer, 4000);

                    } else {
                        document.getElementById("errormessagenewlatter").innerHTML = "Already subscribed with this email or something went wrong. Please try again.";
                        document.getElementById("errormessagenewlatter").style.color = "red";
                        document.getElementById("newslatteremail").style.border = "1px solid red";
                    }

                },
                error: function() {
                    document.getElementById("errormessagenewlatter").innerHTML = "Something went wrong. Please try again.";
                        document.getElementById("errormessagenewlatter").style.color = "red";
                        document.getElementById("newslatteremail").style.border = "1px solid red";
                }
            });
        }

    });
});

function myTimer() {
    document.getElementById("successmessagenewslatter").style.display = "none";
}
 </script>  
