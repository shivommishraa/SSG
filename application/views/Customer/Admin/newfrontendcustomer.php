   <div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Add Frontend Customer</h2>
                        
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="">Customer</a></li>
                                    <li class="breadcrumb-item "><a href="">Add Frontend Customer</a></li>
                                    
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
                                 <button class="btn btn-sm btn-primary"  onClick="return redirect('<?php echo site_url(); ?>Customer/FrontendCustomer/manageFrontendCustomer');"><i class="fa fa-list" aria-hidden="true"></i>List Frontend Customer</button>
                             </div>
                         </div>
                     </h5>
                     <div class="card-body">
                       <form role="form" class="needs-validation" novalidate  method="post" action="<?php echo site_url()?>Customer/FrontendCustomer/addFrontendCustomer"  enctype="multipart/form-data" >
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 ">
                              <label for="validationCustom01">Customer Type:</label>
                              <input type="text" class="form-control" required id="validationCustom01" name="type" required="">
                              <div class="valid-feedback">
                                Looks good!
                              </div>
                              <div class="invalid-feedback">
                                Enter Customer Type.
                              </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 ">
                                    <label for="validationCustom03">Status:</label>
                                    <select class="form-control"  name="status" id="validationCustom02"required>
                                       <option value="0">No</option>
                                       <option value="1" >Yes</option>
                                    </select>
                                    <div class="valid-feedback">
                                        Looks good!
                                    </div>
                            </div>
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
