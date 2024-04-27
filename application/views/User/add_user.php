<div class="dashboard-wrapper">
  <div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="page-header">
            <h2 class="pageheader-title">Add User</h2>
            
            <div class="page-breadcrumb">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="">User</a></li>
                  <li class="breadcrumb-item "><a href="">Add User</a></li>
                  
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
               <div class="col-md-6 pt-3"></div>
               <div class="col-md-6 text-right pt-3" >
                 <button class="btn btn-sm btn-success"  onClick="return redirect('<?php echo site_url(); ?>Admin/User_Controller/ImportUserExcel');"><i class="fa fa-plus" aria-hidden="true"> </i> Import Excel File</button>
                  <button class="btn btn-sm btn-primary"  onClick="return redirect('<?php echo site_url(); ?>Admin/User_Controller/manage_user');"><i class="fa fa-list" aria-hidden="true"> </i> List User</button>
               </div>
             </div>
           </h5>
           <div class="card-body">
            <form class="needs-validation" novalidate  method="post" enctype="multipart/form-data" action="<?php echo site_url()?>Admin/User_Controller/submit_user">

              <div class="row">
               
                 <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
                  
                 <label for="validationCustom01"> Name:</label>
                 <input type="text" class="form-control" required id="validationCustom01" name="name" required="">
                 <div class="valid-feedback">
                  Looks good!
                </div>
                <span style="color: red;"> <?php echo form_error('name'); ?></span>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
               <label for="validationCustom02">Role:</label>
               <select class="form-control"  name="role_id" id="validationCustom02"required>
                 <option value="">Select Role</option>
                 <?php foreach($role as $row): ?>
                  <option value="<?php echo $row->role_id; ?>" ><?php echo $row->role_name; ?></option>
                <?php endforeach; ?>
              </select>
              <div class="valid-feedback">
                Looks good!
              </div>
              <span style="color: red;"> <?php echo form_error('role_id'); ?></span>
            </div>
             <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
               <label for="validationCustom02">Department:</label>
               <select class="form-control"  name="dept_id" id="validationCustom02"required>
                 <option value="">Select Department</option>
                 <?php foreach($department as $row): ?>
                  <option value="<?php echo $row->dept_id; ?>" ><?php echo $row->dept_name; ?></option>
                <?php endforeach; ?>
              </select>
              <div class="valid-feedback">
                Looks good!
              </div>
              <span style="color: red;"> <?php echo form_error('dept_id'); ?></span>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
              <label for="validationCustom05">Email :</label>
              <input type="email" class="form-control" required="" value="" name="email_id">
              <div class="valid-feedback">
                Looks good!
              </div>
              <span style="color: red;"> <?php echo form_error('email'); ?></span>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
              <label for="validationCustom05">Password :</label>
              <input type="password" class="form-control" required="" value="" name="password">
              <div class="valid-feedback">
                Looks good!
              </div>
              <span style="color: red;"> <?php echo form_error('password'); ?></span>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
              <label for="validationCustom05">Confirm Password:</label>
              <input type="password" class="form-control" required="" value="" name="confirm_password">
              <div class="valid-feedback">
                Looks good!
              </div>
              <span style="color: red;"> <?php echo form_error('confirm_password'); ?></span>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
              <label for="validationCustom05">    Mobile:</label>
              <input type="number" class="form-control" required="" value="" name="mobile">
              <div class="valid-feedback">
                Looks good!
              </div>
              <span style="color: red;"> <?php echo form_error('mobile'); ?></span>
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
              <label for="validationCustom05">Date Of Birth:</label>
              <input type="Date" class="form-control"  value="" name="dob">
              
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
              <label for="validationCustom05">Guardian Name:</label>
              <input type="text" class="form-control" value="" name="guardian_name">
              
            </div>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
              <label for="validationCustomUsername">Address:</label>
              <textarea  class="form-control" name="address" ></textarea>
              
              
            </div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
             <label for="validationCustom03">City:</label>
             <input type="city"  class="form-control" name="city" >
             
           </div>
           <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
            <label for="validationCustom04">State:</label>
            <select class="form-control"  name="state" id="validationCustom02">
             <option value="">Select State</option>
             <?php foreach ($State as $st) {?>
               
              <option value="<?php echo $st->state_id;?>"><?php echo $st->state_name;?></option>
            <?php } ?>
          </select>
          

        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
          <label for="validationCustom05">Country:</label>
          <input type="text" class="form-control" value="" name="country">
          
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
          <label for="validationCustom05">Nationality:</label>
          <input type="text" class="form-control"value="" name="nationality">
          
        </div>
        
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
          <label for="validationCustom05">Blood Group:</label>
          <select class="form-control"  name="blood_gr" id="validationCustom02">
            <option value="">Select Blood Group</option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
            
          </select>
          
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
          <label for="validationCustom05">Gender:</label>
          <select class="form-control"  name="sex" id="validationCustom02"required>
            <option value="">Select Gender</option>
            <option value="Male">Male</option>
            <option value="Male">Female</option>
            <option value="Male">Other</option>
            
          </select>
          <div class="valid-feedback">
            Looks good!
          </div>
          <span style="color: red;"> <?php echo form_error('sex'); ?></span>
        </div>
        
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
          <label for="validationCustom05">Qualification:</label>
          <input type="text" class="form-control" required="" value="" name="qualification">
          <div class="valid-feedback">
            Looks good!
          </div>
          <span style="color: red;"> <?php echo form_error('qualification'); ?></span>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
          <label for="validationCustom05">    Experience :</label>
          <select class="form-control"  name="experience" id="validationCustom02"required>
            <option value="">Select Experience</option>
            <option value="Fresher">Fresher</option>
            <?php for($i=1;$i<=12;$i++){ ?>
             <option value="<?php echo $i; ?>"><?php echo $i." Year"; ?></option>
           <?php } ?>
           <option value="12+">12+ Year</option>
         </select>
         <div class="valid-feedback">
          Looks good!
        </div>
        <span style="color: red;"> <?php echo form_error('experience'); ?></span>
      </div>

      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
        <label for="validationCustom05">Image :</label>
        <input type="file" class="form-control"  value="" name="  user_image">
        
      </div>
      
      

      


    </d iv>
    <div class="form-row pt-2">
                                           <!-- <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 mb-2">
                                                <label for="validationCustom03">City</label>
                                                <input type="text" class="form-control" id="validationCustom03" placeholder="City" required>
                                                <div class="invalid-feedback">
                                                    Please provide a valid city.
                                                </div>
                                              </div>-->
                                              
                                              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2 ml-3">
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
