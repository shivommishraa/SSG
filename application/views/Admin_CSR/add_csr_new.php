 <?php 
 if($admin[0]->role_id!='5'){
  if(!empty($checkbox))
    {?>
      <input type="hidden" id="shift" value="<?php if(!empty($ssshift)){ echo $ssshift;} ?>">
      <input type="text" id="agent"  value="<?php if(!empty($checkbox)){ echo $checkbox[0]->emp_id;} ?>">
      <body onload="updatedata();">
      <?php }?>
      <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
          <div class="container-fluid dashboard-content ">
            <div class="row">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                  <h2 class="pageheader-title">Add Agent CSR</h2>
                  
                  <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="">Admin CSR</a></li>
                        <li class="breadcrumb-item "><a href="">Add CSR</a></li>
                        
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
                       <button class="btn btn-sm btn-primary"  onClick="return redirect('<?php echo site_url(); ?>Admin_CSR/CSR_Controller/Manage_csr');"><i class="fa fa-list" aria-hidden="true"></i> List CSR</button>
                     </div>
                   </div>
                 </h5>
                 <div class="card-body">
                  <form class="needs-validation" novalidate=""  method="post" action="<?php echo site_url()?>Admin_CSR/CSR_Controller/addTbl_csr">

                   <div class="row">
                    <?php if($this->session->flashdata('success')){ ?>
                     <div class="alert alert-danger">
                      <strong><span class="glyphicon glyphicon-ok"></span>   <?php echo $this->session->flashdata('success'); ?></strong>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" >
                      <div class="form-group">
                       <div class="form-check">
                        <input class="form-check-input" type="checkbox"required id="invalidCheck" name="upd" value="upd" >
                        <label class="form-check-label" for="invalidCheck">
                         Click box if you want to update process.
                       </label>
                       
                     </div>
                   </div>
                   </div> <?php } ?>
                   <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-2">
                    
                     <label for="validationCustom01">Date:</label>
                     <input type="date" class="form-control" required id="validationCustom01" name="pro_date"<?php if(!empty($checkbox)){?> readonly="" <?php } ?>" value="<?php if(!empty($checkbox)){ echo $checkbox[0]->pro_date;} ?>" required="">
                     <div class="valid-feedback">Looks good! </div>
                     <div class="invalid-feedback">Please provide a valid date.</div>
                   </div>
                   <?php if(empty($checkbox)){?>
                    <?php if($admin[0]->role_id=='1'){ ?> 
                      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-2">
                       <label for="validationCustom01">Project Manager:</label>
                       <select required=""  name="role_id" id="prmanager" class="form-control">
                        <option value="">Select Option</option>
                        <?php foreach($allprmanager as $row){  ?>

                          <option value="<?php echo $row->admin_id; ?>"><?php echo $row->name; ?></option>
                        <?php } ?>
                      </select>
                      <div class="valid-feedback"> Looks good! </div>
                      <div class="invalid-feedback">Please choose a valid option.</div>
                    </div> 
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-2">
                     <label for="validationCustom01">Manager:</label>
                     <select required="" name="prman_id" id="manager" class="form-control">
                      <option value="">Select Option</option>
                    </select>
                    <div class="valid-feedback"> Looks good! </div>
                    <div class="invalid-feedback">Please choose a valid option.</div>
                    </div><?php }if($admin[0]->role_id=='2'){ ?>
                      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-2">
                       <label for="validationCustom01">Manager:</label>
                       <select required="" name="prman_id" id="manager" class="form-control">
                        <option value="">Select Option</option>
                        <?php 
                        $allmanager=$getmanager($admin[0]->admin_id);
                        foreach($allmanager as $row){  ?>

                          <option value="<?php echo $row->admin_id; ?>"><?php echo $row->name; ?></option>
                        <?php } ?>
                      </select>
                      <div class="valid-feedback"> Looks good! </div>
                      <div class="invalid-feedback">Please choose a valid option.</div>
                    </div>
                  <?php } if($admin[0]->role_id=='1' || $admin[0]->role_id=='2'){ ?>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-2">
                     <label for="validationCustom01">Team Leader:</label>
                     <select required=""  name="role_id" id="teamLeader"class="form-control">
                      <option value="">Select Option</option>
                    </select>
                    <div class="valid-feedback"> Looks good! </div>
                    <div class="invalid-feedback">Please choose a valid option.</div>
                  </div>
                <?php } if($admin[0]->role_id=='3'){ ?>
                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-2">
                   <label for="validationCustom01">Team Leader:</label>
                   <select required=""  name="role_id" id="teamLeader"class="form-control">
                    <option value="">Select Option</option>
                    <?php 
                    $allmanager=$getmanager($admin[0]->admin_id);
                    foreach($allmanager as $row){  ?>

                      <option value="<?php echo $row->admin_id; ?>"><?php echo $row->name; ?></option>
                    <?php } ?>
                  </select>
                  <div class="valid-feedback"> Looks good! </div>
                  <div class="invalid-feedback">Please choose a valid option.</div>
                </div>
              <?php }if($admin[0]->role_id=='1' || $admin[0]->role_id=='2' || $admin[0]->role_id=='3'){ ?>

               <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-2">
                 <label for="validationCustom01">Agent:</label>
                 <select required=""  name="admin_id" id="agent"class="form-control">
                  <option value="">Select Option</option>
                </select>
                <div class="valid-feedback"> Looks good! </div>
                <div class="invalid-feedback">Please choose a valid option.</div>
              </div>
            <?php } if($admin[0]->role_id=='4'){?>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-2">
               <label for="validationCustom01">Agent:</label>
               <select required=""  name="admin_id" id="agent"class="form-control">
                <option value="">Select Option</option>
                <?php 
                $allmanager=$getmanager($admin[0]->admin_id);
                foreach($allmanager as $row){  ?>

                  <option value="<?php echo $row->admin_id; ?>"><?php echo $row->name; ?></option>
                <?php } ?>
              </select>
              <div class="valid-feedback"> Looks good! </div>
              <div class="invalid-feedback">Please choose a valid option.</div>
            </div>
          <?php }}if(!empty($checkbox)){ ?>
            <input type="hidden" name="admin_id" value="<?php echo $checkbox[0]->emp_id;?>">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-2">
             <label for="validationCustom01">Agent:</label>
             <select required="" disabled=""  name="admin_id" id="agent"class="form-control">
               <?php foreach($alluser as $row){
                ?>
                
                <option value="<?php echo $row->admin_id; ?>"<?php if(!empty($checkbox)){ if($checkbox[0]->emp_id==$row->admin_id){echo "selected";} } ?> ><?php echo $row->name; ?></option>
              <?php } ?>
            </select>
            <div class="valid-feedback"> Looks good! </div>
            <div class="invalid-feedback">Please choose a valid option.</div>
          </div>
        <?php } ?>
        <!-- --- Important Code Please no edit or intrunpt this code.----------> 
        
     <!--      <?php if(!empty($checkbox)){?> <input type="hidden" name="admin_id" value="<?php echo $checkbox[0]->emp_id;?>"><?php } ?>
            <?php if(!empty($allowed_csr)){
                     $str = $allowed_csr[0]->setting_value;
                     $value=explode(",",$str);
                      foreach ($value as $key) {
                      if($admin[0]->role_id==$key){  ?>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-2">
                <label for="validationCustom01">User:</label>
                <select id="admin" class="form-control" <?php if(!empty($checkbox)){?> disabled <?php } ?>  name="admin_id" id="validationCustom02"required>
                      <option value="<?php echo $admin[0]->admin_id; ?>">Self Otherwise Choose</option>
                      <?php foreach($alluser as $row){
                        if($admin[0]->admin_id==$row->team_member_id){?>
                      }
                      <option value="<?php echo $row->admin_id; ?>"<?php if(!empty($checkbox)){ if($checkbox[0]->emp_id==$row->admin_id){echo "selected";} } ?> ><?php echo $row->name; ?></option>
                      <?php }} ?>
                  </select>
                  <div class="valid-feedback"> Looks good! </div>
                  <div class="invalid-feedback">Please choose a valid option.</div>
                  </div> <?php }else{?>
               
                    <?php } } }?> -->

                    <!-- --- Important Code Please no edit or intrunpt this code.----------> 

                    <?php if(!empty($process)) { ?>
                      <?php if(!empty($allshift)) { ?>
                        <input type="hidden" name="shiftt" value="<?php if(!empty($checkbox)){ echo $checkbox[0]->shift_id; } ?>">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-2">
                         <label for="validationCustom01">Shift:</label>
                         <select class="form-control" id="grades" required="" name="shift_id"<?php if(!empty($checkbox)){?> disabled <?php } ?>">
                          <option value="">Select Shift</option>
                          <?php foreach($allshift as $sh): ?>
                            <option value="<?php echo $sh->shift_id ?>"<?php if(!empty($checkbox)){ if($ssshift==$sh->shift_id){echo "selected";}} ?>><?php echo $sh->shift_name;?></option>
                          <?php endforeach; ?>
                        </select>
                        <div class="valid-feedback">Looks good!</div>
                        <div class="invalid-feedback">Please provide a valid shift.</div>
                      </div>
                    <?php }?>
                    <div id="classes"class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2"  ></div>
                  <?php } else { ?>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-2"></div>
                    <div class="alert alert-info mt-3 ml-3" role="alert">
                      <strong>No Any Process Assigned..!</strong>
                    </div>
                  <?php } ?>  
                </div>
                <div class="form-row pt-2">
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
                   <?php if($this->session->flashdata('success')){ ?>
                     <button class="btn btn-primary" type="submit">Update</button>
                     <?php
                     $this->session->set_flashdata('success')=="";
                     ?>
                     <button class="btn btn-danger" ><a href="<?php base_url() ?>add_csr" style="color: #fff;">Cancel</a></button>
                   <?php }else{ ?>
                    <button class="btn btn-primary" type="submit">Submit</button><?php } ?>             
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php }else{  redirect('CSR/CSR_Controller/add_csr');} ?>
<!-- ===== Start Code for to get data after select shift or admin ====== -->

<script type="text/javascript">

  $(document).ready(function(){    
    $('#grades').change(function(){ 
     $('#classes').show();      
     var shift = $('#grades').val();
             //var admin = $('#admin').val(); 
             var admin = $('#agent').val(); 
             
             $.ajax({
              type: "POST",
              url: "<?php echo base_url(); ?>Admin_CSR/CSR_Controller/findprocess",
              data: {shift_id:shift,admin_id:admin},
              success: function(classes) 
              { 
               
                if(!$.trim(classes)){
                 $('#classes').html("<div class='text-danger pt-4'>Sorry..!! In this shift no any process assigned.Please select other shift.</div>");
                 $("#grades").val("");
               }else{
                 
                $('#classes').html(classes);
              }
            }        
          });

           });
    $('#admin').change(function(){   
      $('#classes').hide(); 
      $("#grades").val("");      
    });
  });
  

  function updatedata() {     
    var shift = $('#shift').val();
             //var admin = $('#admin').val();
             var admin = $('#agent').val();  
             var datee = $('#validationCustom01').val(); 
             $.ajax({
              type: "POST",
              url: "<?php echo base_url(); ?>Admin_CSR/CSR_Controller/updatefindprocess",
              data: {shift_id:shift,admin_id:admin,date:datee},
              success: function(classes) 
              {
                

                $('#classes').html(classes); 

                
              }        
            });

           };
           
           

           
         </script>
         <script type="text/javascript">

           $(document).ready(function(){
             $('#prmanager').change(function(){
              var admin_id = $('#prmanager').val();
              if(admin_id != '')
              {
               $.ajax({
                url:"<?php echo base_url(); ?>Admin_CSR/CSR_Controller/fetch_prmanager",
                method:"POST",
                data:{admin_id:admin_id},
                success:function(data)
                {
                 $('#manager').html(data);
     //$('#city').html('<option value="">Select City</option>');
   }
 });
             }
             else
             {
               $('#manager').html('<option value="">Select Option</option>');
   //$('#city').html('<option value="">Select City</option>');
 }
});
           });


           $(document).ready(function(){
             $('#manager').change(function(){
              var admin_id = $('#manager').val();
              if(admin_id != '')
              {
               $.ajax({
                url:"<?php echo base_url(); ?>Admin_CSR/CSR_Controller/fetch_prmanager",
                method:"POST",
                data:{admin_id:admin_id},
                success:function(data)
                {
                 $('#teamLeader').html(data);
     //$('#city').html('<option value="">Select City</option>');
   }
 });
             }
             else
             {
               $('#teamLeader').html('<option value="">Select Option</option>');
   //$('#city').html('<option value="">Select City</option>');
 }
});
           });


           $(document).ready(function(){
             $('#teamLeader').change(function(){
              var admin_id = $('#teamLeader').val();
              if(admin_id != '')
              {
               $.ajax({
                url:"<?php echo base_url(); ?>Admin_CSR/CSR_Controller/fetch_prmanager",
                method:"POST",
                data:{admin_id:admin_id},
                success:function(data)
                {
                 $('#agent').html(data);
     //$('#city').html('<option value="">Select City</option>');
   }
 });
             }
             else
             {
               $('#agent').html('<option value="">Select Option</option>');
   //$('#city').html('<option value="">Select City</option>');
 }
});
           });
         </script>
         <!-- ===== End Code for to get data after select shift or admin ====== -->
