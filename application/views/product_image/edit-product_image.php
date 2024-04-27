 <div class="dashboard-wrapper">
  <div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="page-header">
            <h2 class="pageheader-title">Update Product Image</h2>
            <div class="page-breadcrumb">
             <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="">Product Image</a></li>
                <li class="breadcrumb-item "><a href="">Update Product Image</a></li>
                
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
             <button class="btn btn-sm btn-primary"  onClick="return redirect('<?php echo site_url(); ?>Product_Image/Product_imageController/ManageProduct_image');"><i class="fa fa-list" aria-hidden="true"></i> List Brand</button>
           </div>
         </div>
       </h5>
       <div class="card-body">
        <form role="form" method="post" class="needs-validation" novalidate method="post"  action="<?php echo site_url()?>Product_Image/Product_imageController/editProduct_imagePost" enctype="multipart/form-data">

         <input type="hidden" value="<?php echo $product_image[0]->id ?>"   name="product_image_id">


         <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
            
           <label for="validationCustom01">Product Name:</label>
           

           <select class="form-control" required id="validationCustom01"  name="product_id">
            <option value="">Select Product</option>
            <?php foreach($productdropdown as $row): ?>
             
             <option value="<?php echo $row->id; ?>" <?php if($row->id==$product_image[0]->product_id) echo "selected"; ?>><?php echo $row->product_name; ?></option>
             
           <?php endforeach; ?>
         </select>
         <div class="valid-feedback">
          Looks good!
        </div>
      </div>
      
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
       <label class="pt-2">Product Image :</label><br/>
       <img class="img-thubnell" src="<?php echo base_url().'uploads/product_image/'.$product_image[0]->product_image ?>" alt="Image" height="200px"width="200px" style="border: 3px solid gray">
       <input type="file" class="btn btn-primary mt-3" value="$product_image[0]->product_image" brand_id="product_image" name="product_image"><br/> </div>
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
