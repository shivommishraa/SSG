<?php /*=============== Start Code for Main Page ===================*/ ?>
<div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="<?php echo base_url(); ?>Web_assests/img/hero.jpg">
      <span class="d-flex tm-search-form" style="text-align: center; font-size: 16px; font-family: serif; color: blue; font-weight: bold;">If you have any query then contact us when you feel free.</span>
</div>

    <div class="container-fluid tm-mt-60">
        <div class="row tm-mb-50">
            <div class="col-lg-1 col-12 " ></div>
            <div class="col-lg-5 col-12  extra-style" >
                <h2 class="tm-text-primary mb-5 text-center" style="padding-top: 8px"><u>Any Query</u></h2>
              
                <form id="contact-form" action="" method="POST" class="tm-contact-form mx-auto">
                    <div class="form-group">
                        <input type="text" id="name" name="name" class="form-control rounded-0" placeholder="Name" required />
                        <span id="nwoc"></span>
                    </div>
                    <div class="form-group">
                        <input type="email" id="email" name="email" class="form-control rounded-0" placeholder="Email"  />
                       <span id="ewoc" ></span>
                    </div>
                    <div class="form-group">
                        <input type="number" id="mobile" name="mobile" class="form-control rounded-0" placeholder="Mobile Number" required />
                        <span id="mnwoc"></span>
                    </div>
                    <div class="form-group">
                        <textarea rows="8" id="message" name="message" class="form-control rounded-0" placeholder="Message" required=></textarea>
                        <span id="mwoc"></span>
                    </div>
                    <div style="display: none;" class="form-group" id="woc">
                        <span style="color: blue;">Your message has been sent successfully.....!!</span>
                    </div>
                    <div class="form-group tm-text-right">
                        <button type="button" id="btnsubmit" class="btn btn-primary">Send</button>
                    </div>
                </form>                
            </div>
            <div class="col-lg-5 col-12  extra-style">
                <div class="tm-address-col">
                    <h2 class="tm-text-primary mb-5 text-center"style="padding-top: 8px"><u>Contact - MStatus</u></h2>
                    <ul class="tm-contacts" style="margin-left: 20px">
                        <li>
                            <a href="mailto:mahakmishraa@gmail.com" class="tm-text-gray">
                                <i class="fas fa-envelope" target="_blank"></i>
                                  mahakmishraa@gmail.com
                            </a>
                        </li>
                        <li>
                            <a href="tel://+917897283039" class="tm-text-gray">
                                <i class="fas fa-phone"></i>
                                  789-7283-039
                            </a>
                        </li>
                        <li>
                            <a href="http://mstatus.in/" target="_blank" class="tm-text-gray">
                                <i class="fas fa-globe"></i>
                                  www.mstatus.in
                            </a>
                        </li>
                    </ul>
                </div>                
            </div>
           
        </div>
       <!--  <div class="row tm-mb-74 tm-people-row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-5">
                <img src="img/people-1.jpg" alt="Image" class="mb-4 img-fluid">
                <h2 class="tm-text-primary mb-4">Ryan White</h2>
                <h3 class="tm-text-secondary h5 mb-4">Chief Executive Officer</h3>
                <p class="mb-4">
                    Mauris ante tellus, feugiat nec metus non, bibendum semper velit. Praesent laoreet urna id tristique fermentum. Morbi venenatis dui quis diam mollis pellentesque.
                </p>
                <ul class="tm-social pl-0 mb-0">
                    <li><a href="https://facebook.com"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="https://twitter.com"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="https://linkedin.com"><i class="fab fa-linkedin"></i></a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-5">
                <img src="img/people-2.jpg" alt="Image" class="mb-4 img-fluid">
                <h2 class="tm-text-primary mb-4">Catherine Pinky</h2>
                <h3 class="tm-text-secondary h5 mb-4">Chief Marketing Officer</h3>
                <p class="mb-4">
                    Sed faucibus nec velit finibus accumsan. Sed varius augue et leo pharetra, in varius lacus eleifend. Quisque ut eleifend lacus.
                </p>
                <ul class="tm-social pl-0 mb-0">
                    <li><a href="https://facebook.com"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="https://twitter.com"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="https://linkedin.com"><i class="fab fa-linkedin"></i></a></li>
                </ul>
            </div> -->
          <!--   <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-5">
                <img src="img/people-3.jpg" alt="Image" class="mb-4 img-fluid">
                <h2 class="tm-text-primary mb-4">Johnny Brief</h2>
                <h3 class="tm-text-secondary h5 mb-4">Accounting Executive</h3>
                <p class="mb-4">
                    Sed faucibus nec velit finibus accumsan. Sed varius augue et leo pharetra, in varius lacus eleifend. Quisque ut eleifend lacus.
                </p>
                <ul class="tm-social pl-0 mb-0">
                    <li><a href="https://facebook.com"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="https://twitter.com"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="https://linkedin.com"><i class="fab fa-linkedin"></i></a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-5">
                <img src="img/people-4.jpg" alt="Image" class="mb-4 img-fluid">
                <h2 class="tm-text-primary mb-4">George Nelson</h2>
                <h3 class="tm-text-secondary h5 mb-4">Creative Art Director #C69</h3>
                <p class="mb-4">
                    Nunc convallis facilisis congue. Curabitur gravida rutrum justo sed pulvinar. Pellentesque ac ante in erat bibendum dignissim.
                </p>
                <ul class="tm-social pl-0 mb-0">
                    <li><a href="https://facebook.com"><i class="fab fa-facebook"></i></a></li>
                    <li><a href="https://twitter.com"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="https://linkedin.com"><i class="fab fa-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
 -->
</div>
</div>

<?php /*=============== End Code for Main Page ===================*/ ?>
<style type="text/css">
    .extra-style{
        background: #fff;
        box-shadow: 2px 2px 6px 1px #969696;
        -webkit-box-shadow: 4px 3px 8px 1px #969696; border-radius: 10px;
        margin-left: 4px;
        margin-top: 2px;
    }
</style>



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
            document.getElementById("nwoc").innerHTML = "Required";
            document.getElementById("nwoc").style.color = "red";
            document.getElementById("name").style.border = "1px solid red";
            status++;
        } else {
            document.getElementById("nwoc").innerHTML = "Looks Good!";
            document.getElementById("nwoc").style.color = "green";
            document.getElementById("name").style.border = "1px solid green";
        }
        if (email == '') {
            document.getElementById("ewoc").innerHTML = "";
            document.getElementById("ewoc").style.color = "none";
            document.getElementById("email").style.border = "1px solid";
        } else {
            if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
                document.getElementById("ewoc").innerHTML = "Looks Good!";
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
            document.getElementById("mnwoc").innerHTML = "Required";
            document.getElementById("mnwoc").style.color = "red";
            document.getElementById("mobile").style.border = "1px solid red";
            status++;
        } else {
            if (numbers == '10') {

                document.getElementById("mnwoc").innerHTML = "Looks Good!";
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
            document.getElementById("mwoc").innerHTML = "Required";
            document.getElementById("mwoc").style.color = "red";
            document.getElementById("message").style.border = "1px solid red";
            status++;
        } else {

            document.getElementById("mwoc").innerHTML = "Looks Good!";
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

