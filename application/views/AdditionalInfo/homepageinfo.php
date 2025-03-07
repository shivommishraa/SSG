   <div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Home Page Info</h2>
                        
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="">Manage Additional Info</a></li>
                                    <li class="breadcrumb-item "><a href="">Home Page Info</a></li>
                                    
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                       <h5 class="card-header">
                         <div class="row col-md-12 ">
                             <div class="col-md-4 pt-3"></div>
                             <div class="col-md-4 pt-3"></div>
                             <div class="col-md-4 pt-3 text-right">
                                 <button class="btn btn-sm btn-primary"  onClick="return redirect('<?php echo site_url(); ?>AddInfo/Addinfocontroller/manageInfo');"><i class="fa fa-list" aria-hidden="true"></i>List Additional Info</button>
                             </div>
                         </div>
                     </h5>
                     <div class="card-body">
                       <form role="form" class="needs-validation" novalidate  method="post" action="<?php echo site_url(); ?>AddInfo/Addinfocontroller/editAddInfoPost"  enctype="multipart/form-data" >
                        <input type="hidden" value="<?php echo $add_info[0]->id ?>"   name="id">
                        <div class="row">
                             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
                                <h4>Infomation Popup For Home Page (Details)</h4>
                             </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
                                    <label for="validationCustom03">Info Popup For Home Page:</label>
                                    <select class="form-control"  name="modelpopupenable" id="validationCustom02"required>
                                       <option value="0" <?php if("0"==$add_info[0]->modelpopupenable) echo "selected"; ?>>No</option>
                                       <option value="1" <?php if("1"==$add_info[0]->modelpopupenable) echo "selected"; ?>>Yes</option>
                                    </select>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
                                    <label for="validationCustom03">Info Popup Image:</label>
                                    <a class="btn btn-sm btn-primary"  href="<?php echo site_url(); ?>AddInfo/Addinfocontroller/infobannergallery">Click Here</a>
                                    <!-- <input type="file"  class="form-control" name="modelpopupimage" >
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div> -->
                                </div>
                            <?php if(!empty($add_info[0]->modelpopupimage)){ ?>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
                                    <label for="validationCustom03">Uploaded Info Popup Image:</label>
                                    <img height="150px" width="200px" src="<?php echo site_url(); ?>ssgassests/infodetailsupload/<?php echo $add_info[0]->modelpopupimage; ?>"/>
                                </div>
                                <?php } ?>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
                                    <label for="validationCustom03">Info Popup Button Link:</label>
                                    <input  type="text" value="<?php echo $add_info[0]->modelpopupbtnlink ?>"  class="form-control" required=""  name="modelpopupbtnlink" >
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                   <!--  <div class="invalid-feedback">
                                        Enter actual price.
                                    </div> -->
                                </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
                                <h4>Heading For Top Of the Home Page (Details)</h4>
                             </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
                                <label for="validationCustomUsername">Top Heading Message:</label>
                                <textarea class="form-control" name="topheadingmsg" ><?php echo $add_info[0]->topheadingmsg ?></textarea>
                            </div>
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
                                <h4>Main Banner For Home Page (Details)</h4>
                            </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-2">
                                    <label for="validationCustom03">Main Banner Image:</label>
                                    <input type="file"  class="form-control" name="bannerimage" >
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                 <?php if(!empty($add_info[0]->bannerimage)){ ?>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
                                    <label for="validationCustom03">Uploaded Main Banner Image:</label>
                                    <img height="150px" width="200px" src="<?php echo site_url(); ?>ssgassests/infodetailsupload/<?php echo $add_info[0]->bannerimage; ?>"/>
                                </div>
                                <?php } ?>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-2">
                                    <label for="validationCustom03">Main Banner Title:</label>
                                    <input  type="text" value="<?php echo $add_info[0]->bannertitle ?>" class="form-control" required=""  name="bannertitle" >
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                   <!--  <div class="invalid-feedback">
                                        Enter actual price.
                                    </div> -->
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
                                    <label for="validationCustomUsername">Main Banner Description:</label>
                                    <textarea  class="form-control" name="bannerdescription" ><?php echo $add_info[0]->bannerdescription ?></textarea>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
                                    <label for="validationCustomUsername">Main Banner Additional Message:</label>
                                    <textarea  class="form-control" name="banneradditionalmsg" ><?php echo $add_info[0]->banneradditionalmsg ?></textarea>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
                                    <label for="validationCustom03">Main Banner Button Title:</label>
                                    <input  type="text" value="<?php echo $add_info[0]->bannerbtntitle; ?>"  class="form-control" required=""  name="bannerbtntitle" >
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                   <!--  <div class="invalid-feedback">
                                        Enter actual price.
                                    </div> -->
                                </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
                                    <label for="validationCustom03">Main Banner Button URL:</label>
                                    <input  type="text"value="<?php echo $add_info[0]->bannerbtnurl; ?>"  class="form-control" required=""  name="bannerbtnurl" >
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <!-- <div class="invalid-feedback">
                                        Enter actual price.
                                    </div> -->
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
                                    <label for="validationCustom03">Main Banner Status:</label>
                                    <select class="form-control"  name="status" id="validationCustom02"required>
                                       <option value="0"<?php if("0"==$add_info[0]->status) echo "selected"; ?>>No</option>
                                       <option value="1"<?php if("1"==$add_info[0]->status) echo "selected"; ?>>Yes</option>
                                    </select>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                            </div>
                              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
                                <h4>Offer Page (Details)</h4>
                             </div>
                           <!--  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
                                    <label for="validationCustom03">Info Popup For Home Page:</label>
                                    <select class="form-control"  name="modelpopupenable" id="validationCustom02"required>
                                       <option value="0" <?php //if("0"==$add_info[0]->modelpopupenable) echo "selected"; ?>>No</option>
                                       <option value="1" <?php //if("1"==$add_info[0]->modelpopupenable) echo "selected"; ?>>Yes</option>
                                    </select>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                            </div> -->
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
                                    <label for="validationCustom03">Offer Page Image:</label>
                                    <a class="btn btn-sm btn-primary"  href="<?php echo site_url(); ?>AddInfo/Addinfocontroller/infobannergallery">Click Here</a>
                                    <!-- <input type="file"  class="form-control" name="modelpopupimage" >
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div> -->
                                </div>
                            <?php if(!empty($add_info[0]->offerimage)){ ?>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
                                    <label for="validationCustom03">Uploaded Offer Page Image:</label>
                                    <img height="150px" width="200px" src="<?php echo site_url(); ?>ssgassests/infodetailsupload/<?php echo $add_info[0]->offerimage; ?>"/>
                                </div>
                                <?php } ?>
                </div>
            <div class="form-row pt-2">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
