   <div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
      <div class="container-fluid dashboard-content ">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
              <h2 class="pageheader-title">Add Product Image</h2>
              
              <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="">Product Image</a></li>
                    <li class="breadcrumb-item "><a href="">Add Product Image</a></li>
                    
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
                   <button class="btn btn-sm btn-primary"  onClick="return redirect('<?php echo site_url(); ?>Product_Image/Product_imageController/ManageProduct_image');"><i class="fa fa-list" aria-hidden="true"></i> List Product Image</button>
                 </div>
               </div>
             </h5>
             <div class="card-body">
               
              <form role="form" class="needs-validation" novalidate method="post" method="post" action="<?php echo site_url()?>Product_Image/Product_imageController/addProduct_imagePost"  enctype="multipart/form-data" >

                <div class="row">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                    
                   <label for="validationCustom01">Product:</label>
                   
                   <select class="form-control" required id="validationCustom01"  name="product_id">
                     <option value="">Select Product</option>
                     <?php foreach($productdropdown as $row): ?>
                      <option value="<?php echo $row->id; ?>" ><?php echo $row->product_name; ?></option>
                    <?php endforeach; ?>
                  </select>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
                 <label for="validationCustom03">Product Image:</label>
                 <input type="file" placeholder="product_image Image"  id="validationCustom03"  class="form-control" id="actual_price" name="product_image" required="">
                 <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
            </div>
            <div class="form-row pt-2">
                                           <!-- <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom03">City</label>
                                                <input type="text" class="form-control" id="validationCustom03" placeholder="City" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                              </div>-->
                                              
                                              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
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

