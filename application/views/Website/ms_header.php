<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>M Status</title>
    <link rel="stylesheet" href="<?php echo base_url(); ?>Web_assests/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>Web_assests/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>Web_assests/css/templatemo-style.css">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>Web_assests/img/mstatusicon.png" type="image/x-icon" />
</head>
<body>
    
    <div id="loader-wrapper">
        <div id="loader"></div>

        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>

    </div>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo base_url(); ?>Website/Website_controller">
                <!-- <i class="fas fa-film mr-2"></i>
                Mobile Status --><img height="65px" width="150px" src="<?php echo base_url(); ?>Web_assests/img/mstatuslogo.jpg">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0" >
               
                <li class="nav-item">
                    <a class="nav-link nav-link-1 <?php if(!empty($page_active)){ if($page_active=='index_active'){ ?> active <?php } } ?>" aria-current="page" href="<?php echo base_url(); ?>Website/Website_controller">Images</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-link-3 <?php if(!empty($page_active)){ if($page_active=='text_active'){ ?> active <?php } } ?>" href="<?php echo base_url(); ?>Website/Website_controller/text_page">Texts</a>
                </li>

                <!-- <li class="nav-item">
                    <a class="nav-link nav-link-2 <?php //if(!empty($page_active)){ if($page_active=='videos_active'){ ?> active <?php //} } ?>" href="<?php //echo base_url(); ?>Website/Website_controller/videos_page">DP Images</a>
                </li> -->

                <!-- <li class="nav-item">
                    <a class="nav-link nav-link-2 <?php //if(!empty($page_active)){ if($page_active=='videos_active'){ ?> active <?php //} } ?>" href="<?php //echo base_url(); ?>Website/Website_controller/videos_page">Videos</a>
                </li> -->
                
               <!--  <li class="nav-item">
                    <a class="nav-link nav-link-3" href="about.php">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-4" href="contact.php">Contact</a>
                </li> -->
            </ul>
            </div>
        </div>
    </nav>

    