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

    <!-- Contact Form Begin -->
    <div class="contact-form spad">
        <div class="container">
           <!--  <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>Leave Message</h2>
                    </div>
                </div>
            </div> -->
            <form id="contact-form" action="" method="POST">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <input type="text" id="email" name="name" placeholder="Email">
                        <span id="nwoc"></span>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <input type="number" id="password" name="password" placeholder="Password" required>
                        <span id="mnwoc" ></span>
                    </div>
                    <div class="col-lg-12 text-center">
                        <button type="button" id="btnsubmit" class="site-btn">Submit</button>
                        <div style="display: none;" class="form-group" id="woc">
                        <span style="color: blue;">Your order has been received successfully. We will reach you soon..!!</span>
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
