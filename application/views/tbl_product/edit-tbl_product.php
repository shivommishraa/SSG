 <div class="dashboard-wrapper">
  <div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="page-header">
            <h2 class="pageheader-title">Update Product</h2>
            <div class="page-breadcrumb">
             <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="">Product</a></li>
                <li class="breadcrumb-item "><a href="">Update Product</a></li>
                
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
             <button class="btn btn-sm btn-primary"  onClick="return redirect('<?php echo site_url(); ?>Product/Tbl_productController/manageTbl_product');"><i class="fa fa-list" aria-hidden="true"></i> List Product</button>
           </div>
         </div>
       </h5>
       <div class="card-body">
        <form class="needs-validation" novalidate  method="post" action="<?php echo site_url()?>Product/Tbl_productController/editTbl_productPost">
          <input type="hidden" value="<?php echo $tbl_product[0]->id ?>"   name="tbl_product_id">

          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
              
             <label for="validationCustom01">Product Name:</label>
             <input type="text" class="form-control" required id="validationCustom01" name="product_name"value="<?php echo $tbl_product[0]->product_name ?>" required="">
             <div class="valid-feedback">
              Looks good!
            </div>
          </div> 
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
           <label for="validationCustom02">Product Brand:</label>
           <select class="form-control"  name="product_brand" id="validationCustom02"required>
            <option value="">Select Product Brand</option>
            <?php foreach($branddropdown as $row): ?>
             
             <option value="<?php echo $row->brand_id; ?>" <?php if($row->brand_id==$tbl_product[0]->product_brand) echo "selected"; ?>><?php echo $row->brand_name; ?></option>
             
           <?php endforeach; ?>
         </select>
         <div class="valid-feedback">
          Looks good!
        </div>
      </div>
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-2">
                                    <label for="validationCustom03">Product Category:</label>
                                    <select required class="form-control"  name="product_category" id="validationCustom02"required>
                                       <option value="">Select Product Category</option>
                                       <?php foreach ($categorydropdown as $row): ?>
                                            <option value="<?php echo $row->cate_id; ?>" <?php if($row->cate_id==$tbl_product[0]->product_category) echo "selected"; ?>><?php echo $row->cate_name; ?></option>
                                      <?php endforeach; ?>
                                    </select>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Enter product category.
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
                                    <label for="validationCustom03">Actual Price:</label>
                                    <input  type="number" value="<?php echo $tbl_product[0]->actual_price; ?>" class="form-control" required=""  name="actual_price" >
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Enter actual price.
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
                                    <label for="validationCustom03">Sell Price:</label>
                                    <input required type="number" value="<?php echo $tbl_product[0]->sell_price ?>"  class="form-control" name="sell_price" >
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Enter sell price.
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
                                    <label for="validationCustom04">Discount Percentage:</label>
                                    <input type="number" class="form-control" value="<?php echo $tbl_product[0]->discount_percentage ?>" name="discount_percentage">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
                                    <label for="validationCustom03">Enable For Scroll:</label>
                                    <select class="form-control"  name="enable_for_scroll" id="validationCustom02"required>
                                       <option value="0" <?php if("0"==$tbl_product[0]->enable_for_scroll) echo "selected"; ?>>No</option>
                                       <option value="1"<?php if("1"==$tbl_product[0]->enable_for_scroll) echo "selected"; ?>>Yes</option>
                                    </select>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
                                    <label for="validationCustom03">Product Feature:</label>
                                    <select class="form-control"  name="enable_featured_product" id="validationCustom02" >
                                       <option value="">Select Product Feature</option>
                                       <?php foreach ($featureddropdown as $row): ?>
                                            <option value="<?php echo $row->category_id; ?>"  <?php if($row->category_id==$tbl_product[0]->enable_featured_product) echo "selected"; ?>>
                                                <?php echo $row->category_name; ?>
                                            </option>
                                      <?php endforeach; ?>
                                    </select>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
                                    <label for="validationCustom03">Thumble Image:</label>
                                    <input type="file"  class="form-control" name="thumble_image" >
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
        <label for="validationCustom05">Product Description:</label>
        <textarea  class="form-control"  name="product_description"><?php echo $tbl_product[0]->product_description ?></textarea>
        
        
      </div>
     <!--  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
       <label for="validationCustom03">Actual Price:</label>
       <input type="text" value="<?php //echo $tbl_product[0]->actual_price ?>"   class="form-control"  name="actual_price" >
       
     </div> -->
     <!-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
      <label for="validationCustom04">Discount Percentage:</label>
      <input type="number" class="form-control"  value="<?php //echo $tbl_product[0]->discount_percentage ?>" id="validationCustom04" name="discount_percentage">
      
    </div> -->




  </div>
  <div class="form-row">
                                           <!-- <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom03">City</label>
                                                <input type="text" class="form-control" id="validationCustom03" placeholder="City" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                              </div>-->
                                              
                                              
                                              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-2 pt-2">
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

                              <!----------------------------------  Form JS ---------------------------------------------------------------->

                              <script>
                               $('#form').parsley();
                             </script>
                             <script>
                              
                              (function() {
                                'use strict';
                                window.addEventListener('load', function() {
                                  var forms = document.getElementsByClassName('needs-validation');
                                  var validation = Array.prototype.filter.call(forms, function(form) {
                                    form.addEventListener('submit', function(event) {
                                      if (form.checkValidity() === false) {
                                        event.preventDefault();
                                        event.stopPropagation();
                                      }
                                      form.classList.add('was-validated');
                                    }, false);
                                  });
                                }, false);
                              })();
                            </script>
                            