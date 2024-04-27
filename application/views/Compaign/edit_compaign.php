 <div class="dashboard-wrapper">
  <div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="page-header">
            <h2 class="pageheader-title">Update Process</h2>
            <div class="page-breadcrumb">
             <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="">Process</a></li>
                <li class="breadcrumb-item "><a href="">Update Process</a></li>
                
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
             <button class="btn btn-sm btn-primary"  onClick="return redirect('<?php echo site_url(); ?>Compaign/Compaign_Controller/manage_Compaign');"><i class="fa fa-list" aria-hidden="true"></i> List Process</button>
           </div>
         </div>
       </h5>
       <div class="card-body">
        <form class="needs-validation" novalidate  method="post" action="<?php echo site_url()?>Compaign/Compaign_Controller/editcompaign_Post">
          <input type="hidden" value="<?php echo $compaign[0]->compaign_id ?>"   name="compaign_id">

          <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 ">
              
             <label for="validationCustom01">Process Name:</label>
             <input type="text" class="form-control" required id="validationCustom01" name="compaign_name"value="<?php echo $compaign[0]->compaign_name ?>" required="">
             <div class="valid-feedback">
              Looks good!
            </div>
          </div>
          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
           <label for="validationCustom02">Shift:</label>
           <select class="form-control"  name="shift_id" id="validationCustom02"required>
             <option value="">Select Shift</option>
             <?php foreach($shift as $row): ?>
              <option value="<?php echo $row->shift_id; ?>"<?php if($row->shift_id==$compaign[0]->shift_id) echo "selected"; ?> ><?php echo $row->shift_name; ?></option>
            <?php endforeach; ?>
          </select>
          <div class="valid-feedback">
            Looks good!
          </div>
          <span style="color: red;"> <?php echo form_error('shift_id'); ?></span>
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
