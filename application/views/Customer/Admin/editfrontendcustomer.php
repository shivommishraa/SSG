 <div class="dashboard-wrapper">
  <div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="page-header">
            <h2 class="pageheader-title">Update Frontend Customer</h2>
            <div class="page-breadcrumb">
             <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="">Customer</a></li>
                <li class="breadcrumb-item "><a href="">Update Frontend Customer</a></li>
                
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
             <button class="btn btn-sm btn-primary"  onClick="return redirect('<?php echo site_url(); ?>Customer/FrontendCustomer/manageFrontendCustomer');"><i class="fa fa-list" aria-hidden="true"></i> List Frontend Customer</button>
           </div>
         </div>
       </h5>
       <div class="card-body">
        
        <form role="form" class="needs-validation" novalidate  method="post" action="<?php echo site_url()?>Customer/FrontendCustomer/frontendcustomerUpdatePost" enctype="multipart/form-data">
          <input type="hidden" value="<?php echo $ctdata[0]->id ?>"   name="id">
          <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 ">
                                <label for="validationCustom01">Customer Name:</label>
                                <input type="text" class="form-control" required id="validationCustom01" name="name"  value="<?php echo $ctdata[0]->name ?>" required="">
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Enter Customer Name.
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 ">
                                <label for="validationCustom01">Customer Email:</label>
                                <input type="email"  value="<?php echo $ctdata[0]->name ?>" class="form-control" required id="validationCustom01" name="email" required="">
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Enter Customer Email.
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 ">
                                <label for="validationCustom01">Mobile:</label>
                                <input type="number"  value="<?php echo $ctdata[0]->name ?>" class="form-control" required id="validationCustom01" name="mobile" required="">
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Enter Customer Mobile Number.
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 ">
                                <label for="validationCustom01">Profile Image:</label>
                                <input type="file" class="form-control" required id="validationCustom01" name="customerimage" required="">
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <div class="invalid-feedback">
                                    Enter Customer Profile Image.
                                </div>
                            </div>
                            <?php if(!empty($add_info[0]->customerimage)){ ?>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 ">
                                    <label for="validationCustom03">Uploaded Customer Image:</label>
                                    <img height="150px" width="200px" src="<?php echo site_url(); ?>ssgassests/img/customerimage/<?php echo $ctdata[0]->customerimage; ?>"/>
                                </div>
                                <?php } ?>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 ">
                                <label for="validationCustom03">Status:</label>
                                <select class="form-control"  name="status" id="validationCustom02"required>
                                    <option value="0"<?php if("0"==$ctdata[0]->status) echo "selected"; ?>>No</option>
                                    <option value="1" <?php if("0"==$ctdata[0]->status) echo "selected"; ?>>Yes</option>
                                </select>
                                <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
      </div>
      <div class="form-row">
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
