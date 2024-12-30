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
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
             <label for="validationCustom01">Customer Type:</label>
             <input type="text" id="validationCustom01" value="<?php echo $ctdata[0]->type ?>" required="Customer Type" placeholder="Customer Type" class="form-control" name="type">
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
