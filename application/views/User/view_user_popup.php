<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <h4  class="btn btn-primary btn-block">User Details
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button> </h4>
        <div class="container">
          <h5 style="color: #5969ff">Official Details</h5>
          <div class="row" style="margin-top: 10px;">
            
            <div class=" row col-lg-8 ml-1 form-group">
             <div class="col-lg-6">
              <b>Name : </b><?php echo $user[0]->name ?></div>
              <div class="col-lg-4   mt-2 form-group">
                <b>Role : </b><?php
                if(!empty($user[0]->role_id))
                {
                  $role=$getrole($user[0]->role_id);
                  echo $role[0]->role_name;
                }
                ?>
              </div>
                <div class="col-lg-6 form-group">
                <b>Department : </b><?php
                if(!empty($user[0]->dept_id))
                {
                  $department=$getdepartment($user[0]->dept_id);
                 // echo $department[0]->dept_name;
                }
                ?>
              </div>
              <div class="col-lg-6"> <b>Mobile : </b><?php echo $user[0]->mobile ?>
                </div>
                <div class="col-lg-8 form-group">
                 <b>Email : </b><?php echo $user[0]->email_id ?>
                </div>
                
              </div>
              <div class="col-lg-4">
                <div class="col-lg-4 form-group">
                  <?php if(!empty($user[0]->user_image)){ ?>
                    <img class="img-thubnell" src="<?php echo base_url().'uploads/user_image/'. $user[0]->user_image ?>" alt="<?php echo base_url(); ?>assets/images/admin.png" height="100px" width="100px"/>
                  <?php }else{?>
                    <img class="img-thubnell" src="<?php echo base_url(); ?>assets/images/admin.png ?>"  height="100px" width="100px"/>
                  <?php }?>
                </div>
              </div>

              <div class="col-lg-4 ml-1 form-group" style="margin-top: -10px;">
                <b>Qualification : </b><?php echo $user[0]->qualification ?>
              </div>
              <div class="col-lg-4 form-group"  style="margin-top: -10px;">
                <b>Experience : </b><?php echo $user[0]->experience ?>
              </div>
              <div class="col-lg-4 form-group"> </div></div>
              <h5 style="color: #5969ff">Personal Details</h5>
              <div class="row">
                <div class="col-lg-4 form-group">
                  <b>Date of Birth : </b><?php echo $user[0]->dob ?>
                </div>

                <div class="col-lg-4 form-group">
                  <b>Gender : </b><?php echo $user[0]->sex ?>
                </div>

                <div class="col-lg-4 form-group">
                  <b>Blood Group: </b><?php echo $user[0]->blood_gr ?>
                </div>

                <div class="col-lg-12 form-group">
                  <b>Address : </b><?php echo $user[0]->address ?>
                </div>
                <div class="col-lg-4 form-group">
                  <b>City : </b><?php echo $user[0]->city ?>
                </div>

                <div class="col-lg-4 form-group">
                  <b>State : </b><?php echo $user[0]->state ?>
                </div>

                <div class="col-lg-4 form-group">
                  <b>Country : </b><?php echo $user[0]->country ?>
                </div>

                <div class="col-lg-4 form-group">
                  <b>Nationality : </b><?php echo $user[0]->nationality ?>
                </div>

                <div class="col-lg-4 form-group">
                  <b>Guardian : </b><?php echo $user[0]->guardian_name ?>
                </div>

              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger btn-md-lg pull-left" data-dismiss="modal">Close</button>
            </div>
          </div>