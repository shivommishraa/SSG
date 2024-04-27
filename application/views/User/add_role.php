<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Add Role</h2>
                        
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="">User</a></li>
                                    <li class="breadcrumb-item "><a href="">Add Role</a></li>
                                    
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
                               <button class="btn btn-sm btn-primary"  onClick="return redirect('<?php echo site_url(); ?>Admin/Role_Controller/manage_role');"><i class="fa fa-list" aria-hidden="true"></i> List Role</button>
                           </div>
                       </div>
                   </h5>
                   <div class="card-body">
                    <form class="needs-validation" novalidate  method="post" action="<?php echo site_url()?>Admin/Role_Controller/addTbl_role">

                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 ">


                             <label for="validationCustom01">Role Name:</label>
                             <input type="text" class="form-control" required id="validationCustom01" name="role_name" required="">
                             <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 ">

                         <label for="validationCustom01">Select Designation:</label>
                         <select class="form-control selectpicker"  name="designation[]" id="validationCustom02"required multiple>
                           <?php foreach($designation as $row): ?>
                              <option value="<?php echo $row->dsgn_id; ?>" ><?php echo $row->dsgn_name; ?></option>
                          <?php endforeach; ?>
                      </select>
                      <span style="color: red;"><?php echo form_error('designation[]'); ?></span>
                      <div class="valid-feedback">
                        Looks good!
                    </div> <div class="invalid-feedback">Please fill the designation box.</div>
                </div>
                              <!--   <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 ">
                                    
                                   <label for="validationCustom01">Department:</label>
                                   <select class="form-control" id="validationCustom01" name="department" required="">
                                    <option value="">Select Department</option>
                                        <?php foreach ($department as $key) {?>
                                           <option value="<?php echo $key->dept_id ?>"><?php echo $key->dept_name; ?></option>
                                      <?php  } ?>
                                    ></select>
                                   <div class="valid-feedback">
                                    Looks good!
                                </div>
                            </div> -->
                            
                            
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
