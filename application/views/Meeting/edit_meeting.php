 <div class="dashboard-wrapper">
  <div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="page-header">
            <h2 class="pageheader-title">Update Meeting</h2>
            <div class="page-breadcrumb">
             <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="">Meeting</a></li>
                <li class="breadcrumb-item "><a href="">Update Meeting</a></li>
                
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
             <button class="btn btn-sm btn-primary"  onClick="return redirect('<?php echo site_url(); ?>Meeting/meeting_Controller/manage_meeting');"><i class="fa fa-list" aria-hidden="true"></i> Manage Meeting</button>
           </div>
         </div>
       </h5>
       <div class="card-body">
        <form class="needs-validation" novalidate  method="post" action="<?php echo site_url()?>Meeting/Meeting_Controller/editmeetingPost">
          <input type="hidden" value="<?php echo $meeting[0]->meeting_id; ?>"   name="meeting_id">

          <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 ">
              
             <label for="validationCustom01">Meeting Title:</label>
             <input type="text" class="form-control" value="<?php echo $meeting[0]->meeting_title ?>" placeholder="Meeting Title"required id="validationCustom01" name="meeting_title" required="">
             <span style="color: red;"><?php echo form_error('meeting_title'); ?></span>
             <div class="valid-feedback">
              Looks good!
            </div><div class="invalid-feedback">Please fill the title box.</div>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 ">
            
           <label for="validationCustom01">Select Role:</label>
           <select class="form-control selectpicker"  name="role_id[]" id="validationCustom02"required multiple>
             <?php   foreach($role as $row):
               $arr = explode(",", $meeting[0]->role_id);
               
               ?>
               <option value="<?php echo $row->role_id; ?>" <?php if(!empty($meeting[0]->role_id)){foreach ($arr as $key) {if($key==$row->role_id){ echo "selected";}}} ?> ><?php echo $row->role_name; ?></option>
             <?php endforeach; ?>
           </select>
           <span style="color: red;"><?php echo form_error('role_id[]'); ?></span>
           <div class="valid-feedback">
            Looks good!
          </div> <div class="invalid-feedback">Please fill the role box.</div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mt-2">
          
         <label for="validationCustom01">Select Compaign:</label>
         <select class="form-control selectpicker"  name="camp_id[]" id="validationCustom02"required multiple>
           <?php   foreach($compaign as $row):
             $arr = explode(",", $meeting[0]->camp_id);
             
             ?>
             <option value="<?php echo $row->compaign_id; ?>" <?php if(!empty($meeting[0]->camp_id)){foreach ($arr as $key) {if($key==$row->compaign_id){ echo "selected";}}} ?> ><?php echo $row->compaign_name; ?></option>
           <?php endforeach; ?>
         </select>
         <span style="color: red;"><?php echo form_error('camp_id[]'); ?></span>
         <div class="valid-feedback">
          Looks good!
        </div><div class="invalid-feedback">Please fill the compaign box.</div>
      </div>

      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mt-2">
        
       <label for="validationCustom01">Select Date:</label>
       <input type="date" class="form-control" value="<?php echo $meeting[0]->meeting_date ?>" required id="validationCustom01" name="meeting_date" required="">
       <div class="valid-feedback">
        Looks good!
      </div> <div class="invalid-feedback">Please fill the date box.</div>
    </div>
    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mt-2">
      
     <label for="validationCustom01">Select Time:</label>
     <input type="time" class="form-control"  value="<?php echo $meeting[0]->meeting_time ?>"  required id="validationCustom01" name="meeting_time" required="">
     <div class="valid-feedback">
      Looks good!
    </div><div class="invalid-feedback">Please fill the time box.</div>
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

<!----------------------------------  Form JS ---------------------------------------------------------------->

<script>
 $('#form').parsley();
</script>
<script>
  
  (function() {
    'use strict';
    window.addEventListener('load', function() {
      var forms = document.getElementsByClassName('needs-validation');
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();
</script>
