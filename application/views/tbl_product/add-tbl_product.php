<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Add Product</h2>
                        
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="">Product</a></li>
                                    <li class="breadcrumb-item "><a href="">Add Product</a></li>
                                    
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
                                 <button class="btn btn-sm btn-primary"  onClick="return redirect('<?php echo site_url(); ?>Product/Tbl_productController/manageTbl_product');"><i class="fa fa-list" aria-hidden="true"></i> List Product</button>
                             </div>
                         </div>
                     </h5>
                     <div class="card-body">
                        <form class="needs-validation" enctype="multipart/form-data" novalidate  method="post" action="<?php echo site_url() ?>Product/Tbl_productController/addTbl_productPost">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                   <label for="validationCustom01">Product Name:</label>
                                   <input type="text" class="form-control" required id="validationCustom01" name="product_name" required="">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Enter product name.
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-2">
                                    <label for="validationCustom02">Product Brand:</label>
                                    <select required class="form-control"  name="product_brand" id="validationCustom02"required>
                                       <option value="">Select Product Brand</option>
                                       <?php foreach ($branddropdown as $row): ?>
                                            <option value="<?php echo $row->brand_id; ?>" ><?php echo $row->brand_name; ?></option>
                                      <?php endforeach; ?>
                                    </select>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Enter brand name.
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-2">
                                    <label for="validationCustom03">Product Category:</label>
                                    <select required class="form-control"  name="product_category" id="validationCustom02"required>
                                       <option value="">Select Product Category</option>
                                       <?php foreach ($categorydropdown as $row): ?>
                                            <option value="<?php echo $row->cate_id; ?>" ><?php echo $row->cate_name; ?></option>
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
                                    <input  type="number"  class="form-control" required=""  name="actual_price" >
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Enter actual price.
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
                                    <label for="validationCustom03">Sell Price:</label>
                                    <input required type="number"  class="form-control" name="sell_price" >
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                    <div class="invalid-feedback">
                                        Enter sell price.
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
                                    <label for="validationCustom04">Discount Percentage:</label>
                                    <input type="number" class="form-control" value="0" name="discount_percentage">
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <!-- =========== -->
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
                                    <label for="validationCustom03">Latest Product:</label>
                                    <select class="form-control"  name="latest_product" id="validationCustom02"required>
                                       <option value="0">No</option>
                                       <option value="1">Yes</option>
                                    </select>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
                                    <label for="validationCustom03">Most Viewed Product:</label>
                                    <select class="form-control"  name="most_viewed_product" id="validationCustom02"required>
                                       <option value="0">No</option>
                                       <option value="1">Yes</option>
                                    </select>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
                                    <label for="validationCustom03">Top Rated Product:</label>
                                    <select class="form-control"  name="top_rated_product" id="validationCustom02"required>
                                       <option value="0">No</option>
                                       <option value="1">Yes</option>
                                    </select>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <!-- =========== -->
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
                                    <label for="validationCustom03">Enable For Scroll:</label>
                                    <select class="form-control"  name="enable_for_scroll" id="validationCustom02"required>
                                       <option value="0">No</option>
                                       <option value="1">Yes</option>
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
                                            <option value="<?php echo $row->category_id; ?>" >
                                                <?php echo $row->category_name; ?>
                                            </option>
                                      <?php endforeach; ?>
                                    </select>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
                                    <label for="validationCustom03">Thumbnail Image:</label>
                                    <input type="file"  class="form-control" name="thumble_image" >
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
                                    <label for="validationCustomUsername">Product Description:</label>
                                    <textarea  class="form-control" name="product_description" ></textarea>
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
