   <div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
      <div class="container-fluid dashboard-content ">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
              <h2 class="pageheader-title">Update User</h2>
              
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
                 <div class="col-md-4 pt-3"></div>
                 <div class="col-md-4 pt-3"></div>
                 <div class="col-md-4 pt-3 text-right">
                   <button class="btn btn-sm btn-primary"  onClick="return redirect('<?php echo site_url(); ?>Admin/User_Controller/manage_user');"><i class="fa fa-list" aria-hidden="true"></i> List User</button>
                 </div>
               </div>
             </h5>
             <div class="card-body">
              <form class="needs-validation" novalidate  method="post" enctype="multipart/form-data" action="<?php echo site_url()?>Admin/User_Controller/update_user">

                <div class="row">
                 <input type="hidden" class="form-control" required id="validationCustom01" value="<?php echo $user[0]->admin_id ?>" name="admin_id" required=""> 
               <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
                  
                   <label for="validationCustom01"> Name:</label>
                   <input type="text" class="form-control" required id="validationCustom01" value="<?php echo $user[0]->name ?>" name="name" required="">
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
                    <option value="<?php echo $row->role_id; ?>"<?php if($row->role_id==$user[0]->role_id) echo "selected"; ?> ><?php echo $row->role_name; ?></option>
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
                    <option value="<?php echo $row->dept_id; ?>"<?php if($row->dept_id==$user[0]->dept_id) echo "selected"; ?> ><?php echo $row->dept_name; ?></option>
                  <?php endforeach; ?>
                </select>
                <div class="valid-feedback">
                  Looks good!
                </div>
                <span style="color: red;"> <?php echo form_error('dept_id'); ?></span>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
                <label for="validationCustom05">Email :</label>
                <input type="email" class="form-control" value="<?php echo $user[0]->email_id ?>" required="" value="" name="email_id">
                <div class="valid-feedback">
                  Looks good!
                </div>
                <span style="color: red;"> <?php echo form_error('email'); ?></span>
              </div>
              
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
                <label for="validationCustom05">    Mobile:</label>
                <input type="number" class="form-control" required="" value="<?php echo $user[0]->mobile ?>" name="mobile">
                <div class="valid-feedback">
                  Looks good!
                </div>
                <span style="color: red;"> <?php echo form_error('mobile'); ?></span>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
                <label for="validationCustom05">Date Of Birth:</label>
                <input type="Date" class="form-control" value="<?php echo $user[0]->dob ?>" name="dob">
                
              </div>
              
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
                <label for="validationCustomUsername">Address:</label>
                <textarea  class="form-control" name="address" ><?php echo $user[0]->address ?></textarea>
                
                
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
               <label for="validationCustom03">City:</label>
               <input type="city"  class="form-control" value="<?php echo $user[0]->city ?>" name="city" >
               
             </div>
             <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
              <label for="validationCustom04">State:</label>
              <select class="form-control"  name="state" id="validationCustom02">
               <option value="">Select State</option>
               <?php foreach ($State as $st) {?>
                
                
                <option value="<?php echo $st->state_id;?>"<?php if($user[0]->state==$st->state_id){echo "selected";}?>><?php echo $st->state_name;?></option>

              <?php } ?>
              
            </select>
            

          </div>
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
            <label for="validationCustom05">Country:</label>
            <input type="text" class="form-control"value="<?php echo $user[0]->country ?>" name="country">
            
          </div>
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
            <label for="validationCustom05">Nationality:</label>
            <input type="text" class="form-control"value="<?php echo $user[0]->nationality ?>" name="nationality">
            
          </div>
          
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
            <label for="validationCustom05">Blood Group:</label>
            <select class="form-control"  name="blood_gr" id="validationCustom02">
              <option value="">Select Blood Group</option>
              <option value="A+"<?php if("A+"==$user[0]->blood_gr) echo "selected"; ?>>A+</option>
              <option value="A-"<?php if("A-"==$user[0]->blood_gr) echo "selected"; ?>>A-</option>
              <option value="B+"<?php if("B+"==$user[0]->blood_gr) echo "selected"; ?>>B+</option>
              <option value="B-"<?php if("B-+"==$user[0]->blood_gr) echo "selected"; ?>>B-</option>
              <option value="AB+"<?php if("AB+"==$user[0]->blood_gr) echo "selected"; ?>>AB+</option>
              <option value="AB-"<?php if("AB-"==$user[0]->blood_gr) echo "selected"; ?>>AB-</option>
              <option value="O+"<?php if("O+"==$user[0]->blood_gr) echo "selected"; ?>>O+</option>
              <option value="O-"<?php if("O-"==$user[0]->blood_gr) echo "selected"; ?>>O-</option>
              
            </select>
            
          </div>
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
            <label for="validationCustom05">Gender:</label>
            <select class="form-control"  name="sex" id="validationCustom02"required>
              <option value="">Select Gender</option>
              <option value="Male"<?php if("Male"==$user[0]->sex) echo "selected"; ?>>Male</option>
              <option value="Female"<?php if("Female"==$user[0]->sex) echo "selected"; ?>>Female</option>
              <option value="Other"<?php if("Other"==$user[0]->sex) echo "selected"; ?>>Other</option>
              
            </select>
            <div class="valid-feedback">
              Looks good!
            </div>
            <span style="color: red;"> <?php echo form_error('sex'); ?></span>
          </div>
          
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
            <label for="validationCustom05">Qualification:</label>
            <input type="text" class="form-control" required="" value="<?php echo $user[0]->qualification ?>" name="qualification">
            <div class="valid-feedback">
              Looks good!
            </div>
            <span style="color: red;"> <?php echo form_error('qualification'); ?></span>
          </div>

          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
            <label for="validationCustom05">    Experience :</label>
            <select class="form-control"  name="experience" id="validationCustom02"required>
              <option value="">Select Experience</option>
              <option value="Fresher"<?php if("Fresher"==$user[0]->experience) echo "selected"; ?> >Fresher</option>
              <?php for($i=1;$i<=12;$i++){ ?>
               <option value="<?php echo $i; ?>"<?php if($i==$user[0]->experience) echo "selected"; ?> ><?php echo $i." Year"; ?></option>
             <?php } ?>
             <option value="12+"<?php if("12+"==$user[0]->experience) echo "selected"; ?>>12+ Year</option>
           </select>
           <div class="valid-feedback">
            Looks good!
          </div>
          <span style="color: red;"> <?php echo form_error('experience'); ?></span>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
          <label for="validationCustom05">Guardian Name:</label>
          <input type="text" class="form-control" value="<?php echo $user[0]->guardian_name ?>" name="guardian_name">
          
        </div>
        <?php if(!empty($user[0]->user_image)){ ?>
          <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-8 pt-2">
            
            <img class="img-thubnell" class="form-control" src="<?php echo base_url().'uploads/user_image/'. $user[0]->user_image ?>" height="100px" width="100px"/>
            <input type="file" value="<?php $user[0]->user_image ?>" class="ml-3"  name="user_image"><br/>
            <span class="pl-3">User Image</span>

            
          </div>
        <?php }else{?>
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
            <label for="validationCustom05">User Image:</label>
            <input type="file"  class="form-control"  name="  user_image"></div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2"></div>
          <?php } ?>
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2"></div> </div>
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
