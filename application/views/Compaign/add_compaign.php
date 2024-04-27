   <div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Add Process</h2>
                        
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="">Process</a></li>
                                    <li class="breadcrumb-item "><a href="">Add Process</a></li>
                                    
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
                                 <button class="btn btn-sm btn-primary"  onClick="return redirect('<?php echo site_url(); ?>Compaign/Compaign_Controller/manage_compaign');"><i class="fa fa-list" aria-hidden="true"></i> List Process</button>
                             </div>
                         </div>
                     </h5>
                     <div class="card-body">
                        <form class="needs-validation" novalidate  method="post" action="<?php echo site_url()?>Compaign/Compaign_Controller/addTbl_compaign">

                            <div class="row">
                               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-2">
                                   <label for="validationCustom02">Shift:</label>
                                   <select class="form-control"  name="shift_id" id="validationCustom02"required>
                                       <option value="">Select Shift</option>
                                       <?php foreach($shift as $row): ?>
                                          <option value="<?php echo $row->shift_id; ?>" ><?php echo $row->shift_name; ?></option>
                                      <?php endforeach; ?>
                                  </select>
                                  <div class="valid-feedback">
                                    Looks good!
                                </div>
                                <span style="color: red;"> <?php echo form_error('shift_id'); ?></span>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-2">
                                
                               <label for="validationCustom01">Process Name:</label>
                               <input type="text" class="form-control" required id="validationCustom01" name="compaign_name" required="">
                               <div class="valid-feedback">
                                Looks good!
                            </div>
                            <span style="color: red;"> <?php echo form_error('compaign_name'); ?></span>
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
