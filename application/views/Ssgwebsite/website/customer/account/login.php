<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="<?php echo base_url(); ?>ssgassests/img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Login</h2>
                    <div class="breadcrumb__option">
                        <a href="<?php echo base_url(); ?>">Home</a>
                        <span>Login</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Login Form Begin -->
<div class="login-form spad">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="form-title text-center mb-4">
                    <h2>Login</h2>
                </div>
                <form id="login-form" action="" method="POST">
                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Email or Username</label>
                        <input type="text" id="email" name="email" class="form-control" placeholder="Enter your email or username" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
                    </div>
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                    </div>
                    <div class="text-center mb-3">
                        <a href="#" class="text-decoration-none">Forgot password?</a>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <div class="text-center mt-3">
                        <span>Not a member? <a href="#" class="text-decoration-none">Register</a></span>
                    </div>
                </form>
                <div class="social-login text-center mt-4">
                    <span>Sign in with:</span>
                    <div class="d-flex justify-content-center gap-3 mt-2">
                        <a href="#" class="btn btn-outline-secondary btn-sm"><i class="fab fa-facebook"></i> Facebook</a>
                        <a href="#" class="btn btn-outline-secondary btn-sm"><i class="fab fa-google"></i> Google</a>
                        <a href="#" class="btn btn-outline-secondary btn-sm"><i class="fab fa-twitter"></i> Twitter</a>
                        <a href="#" class="btn btn-outline-secondary btn-sm"><i class="fab fa-github"></i> GitHub</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login Form End -->

    <!-- Contact Form End -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" language="javascript" >  
$(document).ready(function() {
    $("#btnsubmit").click(function() { //alert('hello');
        var name = $('#name').val();
        var mobile = $('#mobile').val();
        var address = $('#address').val();
        var products = $('#products').val();
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
        if (address == '') {
            document.getElementById("ewoc").innerHTML = "";
            document.getElementById("ewoc").style.color = "red";
            document.getElementById("address").style.border = "1px solid red";
            status++;
        } else {
           
                document.getElementById("ewoc").innerHTML = "";
                document.getElementById("ewoc").style.color = "green";
                document.getElementById("address").style.border = "1px solid green";
              
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
        if (products == '') {
            document.getElementById("mwoc").innerHTML = "";
            document.getElementById("mwoc").style.color = "red";
            document.getElementById("products").style.border = "1px solid red";
            status++;
        } else {

            document.getElementById("mwoc").innerHTML = "";
            document.getElementById("mwoc").style.color = "green";
            document.getElementById("products").style.border = "1px solid green";
        }
        if (status == '0') {
            jQuery.ajax({
                type: "POST",
                url: "<?php echo base_url() . 'Website/Website_controller/saveorder'?>",
                dataType: 'html',
                data: {
                    name: name,
                    mobile: mobile,
                    address: address,
                    products: products
                },
                success: function(res) {
                    if (res == 1) {
                        $('#name').val('');
                        $('#mobile').val('');
                        $('#address').val('');
                        $('#products').val('');
                        $('#woc').show();
                        document.getElementById("nwoc").innerHTML = "";
                        document.getElementById("nwoc").style.color = "";
                        document.getElementById("name").style.border = "1px solid";
                        document.getElementById("ewoc").innerHTML = "";
                        document.getElementById("ewoc").style.color = "";
                        document.getElementById("address").style.border = "1px solid";
                        document.getElementById("mwoc").innerHTML = "";
                        document.getElementById("mwoc").style.color = "";
                        document.getElementById("products").style.border = "1px solid";
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
