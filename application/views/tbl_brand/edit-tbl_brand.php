<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Update Brand</h2>
                        <div class="page-breadcrumb">
                         <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="">Brand</a></li>
                                <li class="breadcrumb-item "><a href="">Update Brand</a></li>
                                
                            </ol>
                        </nav>
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
                     <div class="col-md-4"></div>
                     <div class="col-md-4 "></div>
                     <div class="col-md-4 text-right">
                         <button class="btn btn-sm btn-primary"  onClick="return redirect('<?php echo site_url(); ?>Brand/Tbl_brandController/manageTbl_brand');"><i class="fa fa-list" aria-hidden="true"></i> List Brand</button>
                     </div>
                 </div>
             </h5>

             <div class="card-body">
              <form role="form" class="needs-validation" novalidate method="post" action="<?php echo site_url()?>Brand/Tbl_brandController/editTbl_brandPost" enctype="multipart/form-data">
                 
                  <input type="hidden" value="<?php echo $tbl_brand[0]->brand_id ?>"   name="tbl_brand_brand_id">


                  <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                        
                       <label for="validationCustom01">Brand Name:</label>
                       <input type="text" class="form-control" required id="validationCustom01" name="brand_name"value="<?php echo $tbl_brand[0]->brand_name ?>" required="">
                       <div class="valid-feedback">
                        Looks good!
                    </div>
                </div>
                
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
                 <label class="pt-2">Brand Image :</label><br/>
                 <img class="img-thubnell" src="<?php echo base_url().'uploads/tbl_brand/'.$tbl_brand[0]->brand_image ?>" alt="Image" height="200px"width="200px" style="border: 3px solid gray">
                 <input type="file" class="btn btn-primary mt-3" value="$tbl_brand[0]->brand_image" brand_id="brand_image" name="brand_image"><br/>
                 
             </div>
             <div class="valid-feedback">
                Looks good!
            </div>
        </div>
    </div>
    <div class="form-row">
                                           <!-- <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom03">City</label>
                                                <input type="text" class="form-control" id="validationCustom03" placeholder="City" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                            </div>-->
                                            
                                            
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-3 pl-4">
                                                <button class="btn btn-primary" type="submit">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
