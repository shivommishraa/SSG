 <div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Update Designation</h2>
                        <div class="page-breadcrumb">
                         <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="">Designation</a></li>
                                <li class="breadcrumb-item "><a href="">Update Designation</a></li>
                                
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
                         <button class="btn btn-sm btn-primary"  onClick="return redirect('<?php echo site_url(); ?>Designation/Designation_Controller/manage_designation');"><i class="fa fa-list" aria-hidden="true"></i> List Designation</button>
                     </div>
                 </div>
             </h5>
             <div class="card-body">
                <form class="needs-validation" novalidate  method="post" action="<?php echo site_url()?>Designation/Designation_Controller/editdesignationPost">
                    <input type="hidden" value="<?php echo $rolee[0]->dsgn_id ?>"   name="dsgn_id">

                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            
                           <label for="validationCustom01">Designation Name:</label>
                           <input type="text" class="form-control" required id="validationCustom01" name="dsgn_name"value="<?php echo $rolee[0]->dsgn_name ?>" required="">
                           <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    
                </div>
                <!--   <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                            
                           <label for="validationCustom01">Department:</label>
                           <input type="text" class="form-control" required id="validationCustom01" name="department"value="<?php echo $rolee[0]->department ?>" required="">
                           <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    
                </div> -->
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
