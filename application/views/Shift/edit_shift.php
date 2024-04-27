 <div class="dashboard-wrapper">
  <div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="page-header">
            <h2 class="pageheader-title">Update Shift</h2>
            <div class="page-breadcrumb">
             <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="">Shift</a></li>
                <li class="breadcrumb-item "><a href="">Update Shift</a></li>
                
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
             <button class="btn btn-sm btn-primary"  onClick="return redirect('<?php echo site_url(); ?>Shift/Shift_Controller/manage_shift');"><i class="fa fa-list" aria-hidden="true"></i> List Shift</button>
           </div>
         </div>
       </h5>
       <div class="card-body">
        <form class="needs-validation" novalidate  method="post" action="<?php echo site_url()?>Shift/Shift_Controller/editshiftPost">
          <input type="hidden" value="<?php echo $rolee[0]->shift_id ?>"   name="shift_id">

          <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 ">
              
             <label for="validationCustom01">Shift Name:</label>
             <input type="text" class="form-control" required id="validationCustom01" name="shift_name"value="<?php echo $rolee[0]->shift_name ?>" required="">
             <div class="valid-feedback">
              Looks good!
            </div>
          </div>
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 ">
            
           <label for="validationCustom01">Shift Start Time:</label>
           <input type="time" class="form-control" required id="validationCustom01" name="shift_start_time"value="<?php echo $rolee[0]->shift_start_time ?>" required="">
           <div class="valid-feedback">
            Looks good!
          </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 ">
          
         <label for="validationCustom01">Shift End Time:</label>
         <input type="time" class="form-control" required id="validationCustom01" name="shift_end_time"value="<?php echo $rolee[0]->shift_end_time ?>" required="">
         <div class="valid-feedback">
          Looks good!
        </div>
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
