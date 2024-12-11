    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="<?php echo base_url(); ?>ssgassests/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Contact Us</h2>
                        <div class="breadcrumb__option">
                            <a href="<?php echo base_url(); ?>">Home</a>
                            <span>Contact Us</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_phone"></span>
                        <h4>Phone</h4>
                        <p>+91 9310523943</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_pin_alt"></span>
                        <h4>Address</h4>
                        <p>CH.CHIRANJI SQUARE,Aimnabad,Behind ACE CITY Greater Noida West-201306 (India)</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_clock_alt"></span>
                        <h4>Open time</h4>
                        <p>09:00 am to 22:00 pm</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_mail_alt"></span>
                        <h4>Email</h4>
                        <p>ssgmart9@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Map Begin -->
    <div class="map">

        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3504.25957339261!2d77.44729767417866!3d28.561967133603524!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cef2ced5c14fd%3A0xeacea5907a386ece!2sSSG%20HYPER%20Mart!5e0!3m2!1sen!2sin!4v1688294825028!5m2!1sen!2sin"
            height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        <div class="map-inside">
            <i class="icon_pin"></i>
            <div class="inside-widget">
                <h4>SSG MART</h4>
                <ul>
                    <li>Mobile: +91 81785843409</li>
                    <li>Add:CH.CHIRANJI SQUARE,Aimnabad,Behind ACE CITY Greater Noida West-201306 (India)</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Map End -->

    <!-- Contact Form Begin -->
    <div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>Leave Message</h2>
                    </div>
                </div>
            </div>
            <form id="contact-form" action="" method="POST">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <input type="text" id="name" name="name" placeholder="Your name">
                        <span id="nwoc"></span>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="email" id="email" name="email" placeholder="Your Email">
                        <span id="ewoc" ></span>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="number" id="mobile" name="mobile" placeholder="Your Mobile Number" required>
                        <span id="mnwoc" ></span>
                    </div>
                    <div class="col-lg-12 text-center">
                        <textarea id="message" name="message" placeholder="Your message" required></textarea>
                        <span id="mwoc"></span>
                        <button type="button" id="btnsubmit" class="site-btn">SEND MESSAGE</button>
                        <div style="display: none;" class="form-group" id="woc">
                        <span style="color: blue;">Your message has been sent successfully.....!!</span>
                    </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Contact Form End -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" language="javascript" >  
$(document).ready(function() {
    $("#btnsubmit").click(function() { //alert('hello');
        var name = $('#name').val();
        var mobile = $('#mobile').val();
        var email = $('#email').val();
        var message = $('#message').val();
        var status = '0';
        if (name == '') {
            document.getElementById("nwoc").innerHTML = "";
            document.getElementById("nwoc").style.color = "red";
            document.getElementById("name").style.border = "1px solid red";
            status++;
        } else {
            document.getElementById("nwoc").innerHTML = "";
            document.getElementById("nwoc").style.color = "green";
            document.getElementById("name").style.border = "1px solid green";
        }
        if (email == '') {
            document.getElementById("ewoc").innerHTML = "";
            document.getElementById("ewoc").style.color = "none";
            document.getElementById("email").style.border = "1px solid";
        } else {
            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
                document.getElementById("ewoc").innerHTML = "";
                document.getElementById("ewoc").style.color = "green";
                document.getElementById("email").style.border = "1px solid green";
                //return (true)
            } else {

                document.getElementById("ewoc").innerHTML = "You have entered an invalid email address!";
                document.getElementById("ewoc").style.color = "red";
                document.getElementById("email").style.border = "1px solid red";
                status++;
                //return (false)
            }
        }
        var numbers = mobile.toString().length;;
        if (mobile == '') {
            document.getElementById("mnwoc").innerHTML = "";
            document.getElementById("mnwoc").style.color = "red";
            document.getElementById("mobile").style.border = "1px solid red";
            status++;
        } else {
            if (numbers == '10') {

                document.getElementById("mnwoc").innerHTML = "";
                document.getElementById("mnwoc").style.color = "green";
                document.getElementById("mobile").style.border = "1px solid green";
            } else { 
                document.getElementById("mnwoc").innerHTML = "Enter valid mobile number .(No need +91 or 91, Enter 10 digit only.)";
                document.getElementById("mnwoc").style.color = "red";
                document.getElementById("mobile").style.border = "1px solid red";
                status++;
            }

        }
        if (message == '') {
            document.getElementById("mwoc").innerHTML = "";
            document.getElementById("mwoc").style.color = "red";
            document.getElementById("message").style.border = "1px solid red";
            status++;
        } else {

            document.getElementById("mwoc").innerHTML = "";
            document.getElementById("mwoc").style.color = "green";
            document.getElementById("message").style.border = "1px solid green";
        }
        if (status == '0') {
            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url() . 'Website/Website_controller/savedata'?>",
                dataType: 'html',
                data: {
                    name: name,
                    mobile: mobile,
                    email: email,
                    message: message
                },
                success: function(res) {
                    if (res == 1) {
                        $('#name').val('');
                        $('#mobile').val('');
                        $('#email').val('');
                        $('#message').val('');
                        $('#woc').show();
                        document.getElementById("nwoc").innerHTML = "";
                        document.getElementById("nwoc").style.color = "";
                        document.getElementById("name").style.border = "1px solid";
                        document.getElementById("ewoc").innerHTML = "";
                        document.getElementById("ewoc").style.color = "";
                        document.getElementById("email").style.border = "1px solid";
                        document.getElementById("mwoc").innerHTML = "";
                        document.getElementById("mwoc").style.color = "";
                        document.getElementById("message").style.border = "1px solid";
                        document.getElementById("mnwoc").innerHTML = "";
                        document.getElementById("mnwoc").style.color = "";
                        document.getElementById("mobile").style.border = "1px solid";
                        var myVar = setInterval(myTimer, 4000);

                    } else {
                        alert('Data not saved');
                    }

                },
                error: function() {
                    alert('data not saved');
                }
            });
        }

    });
});

function myTimer() {
    document.getElementById("woc").style.display = "none";
}
 </script>  
