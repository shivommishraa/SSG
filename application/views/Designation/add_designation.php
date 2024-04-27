<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Add Designation</h2>
                        
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="">Designation</a></li>
                                    <li class="breadcrumb-item "><a href="">Add Designation</a></li>
                                    
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
                                 <button class="btn btn-sm btn-primary"  onClick="return redirect('<?php echo site_url(); ?>Designation/Designation_Controller/manage_designation');"><i class="fa fa-list" aria-hidden="true"></i> List Designation</button>
                             </div>
                         </div>
                     </h5>
                     <div class="card-body">
                        <form class="needs-validation" novalidate  method="post" action="<?php echo site_url()?>Designation/Designation_Controller/addTbl_designation">

                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    
                                   <label for="validationCustom01">Designation Name:</label>
                                   <input type="text" class="form-control" required id="validationCustom01" name="dsgn_name" required="">
                                   <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div>
                            
                            
                        </div>
                      
                        <div class="form-row pt-2">
                            
                            
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
