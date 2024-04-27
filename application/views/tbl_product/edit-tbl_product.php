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
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
        <label for="validationCustom05">Product Description:</label>
        <textarea  class="form-control"  name="product_description"><?php echo $tbl_product[0]->product_description ?></textarea>
        
        
      </div>
      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
       <label for="validationCustom03">Actual Price:</label>
       <input type="text" value="<?php echo $tbl_product[0]->actual_price ?>"   class="form-control"  name="actual_price" >
       
     </div>
     <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
      <label for="validationCustom04">Discount Percentage:</label>
      <input type="number" class="form-control"  value="<?php echo $tbl_product[0]->discount_percentage ?>" id="validationCustom04" name="discount_percentage">
      
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
                            