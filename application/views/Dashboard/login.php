<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MS Admin|| Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="<?php echo base_url(); ?>assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/libs/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/fonts/fontawesome/css/fontawesome-all.css">


    <link rel="stylesheet" href="<?php echo base_url()  ?>/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="<?php echo base_url()  ?>/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url()  ?>/assets/libs/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url()  ?>/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">

    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
</style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><h2>Admin Login</h2></div>
            <div class="card-body">
                <form role="form" class="needs-validation" novalidate=""  method="post" action="<?php echo site_url()?>Admin/Login_Controller/login_valid"  enctype="multipart/form-data" >
                   <?php if($this->session->flashdata('success')){ ?>  
                      <span class="text-danger"> <?php echo $this->session->flashdata('success'); ?> </span>       
                  <?php } ?>
                  <div class="form-group">
                    <input class="form-control form-control-lg" id="validationCustom01" type="text" placeholder="Email Id" name="email_id"autocomplete="off" required="Email Id">
                    <span class="text-danger"><?php echo form_error('email_id'); ?></span>
                      <div class="valid-feedback">Looks good! </div>
                   <div class="invalid-feedback">Please fill registered email id.</div>
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" required="Password" id="validationCustom02" name="password" type="password" placeholder="Password">
                    <span class="text-danger"><?php echo form_error('password'); ?></span>
                      <div class="valid-feedback">Looks good! </div>
                   <div class="invalid-feedback">Please fill valid password.</div>
                </div>
                
                <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
            </form>
        </div>
       <!--  <div class="card-footer bg-white p-0  ">
            <div class="card-footer-item card-footer-item-bordered">
                <a href="#" class="footer-link">Create An Account</a></div>
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Forgot Password</a>
                </div>
            </div> -->
        </div>
        <div class=" text-center">All rights reserved by <a href="http://www.mstatus.in/">SSG Hyper Mart</a>.</div>
    </div>
    
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="<?php echo base_url()  ?>Custom_JS/Form/form_validation.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>

</html>
