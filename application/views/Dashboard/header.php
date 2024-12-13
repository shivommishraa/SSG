<!doctype html>
<html lang="en">

<head>

   <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/admin.png" type="image/x-icon" />
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <!-- Bootstrap CSS -->
   <script type="text/javascript" src="<?=base_url()?>Custom_JS/custom.js" ></script>
   <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery-3.3.1.min.js"></script>
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/datepicker/tempusdominus-bootstrap-4.css" />
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css">
   <link href="<?php echo base_url(); ?>assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/libs/css/style.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/charts/chartist-bundle/chartist.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/charts/morris-bundle/morris.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/charts/c3charts/c3.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/fonts/flag-icon-css/flag-icon.min.css">

   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/datatables/css/dataTables.bootstrap4.css">

   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/datatables/css/buttons.bootstrap4.css">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/datatables/css/select.bootstrap4.css">
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/summernote/css/summernote-bs4.css">
   
   <title>SSG MART</title>
   
</head>

<body>

    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
             <!--  <img src="<?php //echo base_url(); ?>assets/images/firstrite_logo1.png" alt="" height="90vw"> -->
                <a class="navbar-brand" href="#" style="font-family:Montserrat Regular;">SSG MART</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <!--<li class="nav-item">
                            <div id="custom-search" class="top-search-bar">
                                <input class="form-control" type="text" placeholder="Search..">
                            </div>
                        </li>-->
                        
                        <li class="nav-item dropdown connection">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-calendar-alt"></i> 
                                <?php echo  date("d-m-Y");?></a>
                                
                            </li>
                            <li class="nav-item dropdown notification">
                                <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-clock"></i>
                                    <span id="MyClockDisplay" class="clock" onload="showTime()"></span>
                                </a>
                                
                            </li>
                            <li class="nav-item dropdown nav-user">
                                <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php if(!empty($admin[0]->user_image)){ ?>
                                        <img src="<?php echo base_url().'uploads/user_image/'. $admin[0]->user_image ?>" alt="" class="user-avatar-md rounded-circle">
                                    <?php }else{ ?>
                                        
                                       <img src="<?php echo base_url(); ?>assets/images/admin.png" alt="" class="user-avatar-md rounded-circle">
                                   <?php } ?>
                               </a>
                               <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?php  echo $admin[0]->name;?> </h5>
                                    <span class="status"></span><span class="ml-2">Available</span>
                                </div>
                                <a href="" class="dropdown-item" onclick="javascript:adminviewdata(<?php echo $admin[0]->admin_id ?>)" data-toggle="modal" data-target="#modal-info"><i class="fas fa-user mr-2"></i>Account</a>
                                <a href="" class="dropdown-item" onclick="javascript:change_password(<?php echo $admin[0]->admin_id ?>)" data-toggle="modal" data-target="#modal-info"><i class="fas fa-cog mr-2"></i>Change Password</a>
                                <a class="dropdown-item" href="<?php echo site_url(); ?>Admin/Login_Controller/logout"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

        <div id="load"></div>
    <div id="contents">
          
    </div>
        



        <div class="modal modal-light   displaycontent" id="modal-info">
            <?php //include('adminviewpopup.php'); ?>
        </div>
        <script src="<?php echo base_url()  ?>Custom_JS/User/user.js" type="text/javascript"></script>
        <script src="<?php echo base_url()  ?>Custom_JS/Header/header.js" type="text/javascript"></script>
        <script type="text/javascript">
           var baseURL ='<?php echo base_url();  ?>'
       </script>

<!-- =============== Start Code for Preloader================================ -->
  <script type="text/javascript">
  
document.onreadystatechange = function () {
  var state = document.readyState
  if (state == 'interactive') {
       document.getElementById('contents').style.visibility="hidden";
  } else if (state == 'complete') {
      setTimeout(function(){
         document.getElementById('interactive');
         document.getElementById('load').style.visibility="hidden";
         document.getElementById('contents').style.visibility="visible";
      },500);
  }
}

</script>
<style type="text/css">
  
  #load{
    width:100%;
    height:100%;
    position:fixed;
    z-index:9999;
    background:url("<?php echo base_url(); ?>assets/images/loading2.gif") no-repeat center center 
}
</style>
<!-- =============== Start Code for Preloader================================ -->
