<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Add Shift</h2>
                        
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="">Shift</a></li>
                                    <li class="breadcrumb-item "><a href="">Add Shift</a></li>
                                    
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
                                 <button class="btn btn-sm btn-primary"  onClick="return redirect('<?php echo site_url(); ?>Shift/Shift_Controller/manage_shift');"><i class="fa fa-list" aria-hidden="true"></i> List Shift</button>
                             </div>
                         </div>
                     </h5>
                     <div class="card-body">
                        <form class="needs-validation" novalidate  method="post" action="<?php echo site_url()?>Shift/Shift_Controller/addTbl_shift">

                            <div class="row">
                             <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 ">
                                
                               <label for="validationCustom01">Shift Name:</label>
                               <input type="text" class="form-control" required id="validationCustom01" name="shift_name" required="">
                               <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 ">
                            
                           <label for="validationCustom01">Start Time:</label>
                           <input type="time" class="form-control" required id="validationCustom01" name="shift_start_time" required="">
                           <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 ">
                        
                       <label for="validationCustom01">Start Time:</label>
                       <input type="time" class="form-control" required id="validationCustom01" name="shift_end_time" required="">
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
