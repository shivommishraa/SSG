 <?php 
 if(!empty($checkbox))
  {?>
    <input type="hidden" id="shift" value="<?php if(!empty($ssshift)){ echo $ssshift;} ?>">
    <input type="hidden" id="admin"  value="<?php if(!empty($checkbox)){ echo $checkbox[0]->emp_id;} ?>">
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
                      <li class="breadcrumb-item"><a href="">CSR</a></li>
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
                     <button class="btn btn-sm btn-primary"  onClick="return redirect('<?php echo site_url(); ?>CSR/CSR_Controller/Manage_csr');"><i class="fa fa-list" aria-hidden="true"></i> List CSR</button>
                   </div>
                 </div>
               </h5>
               <div class="card-body">
                <form class="needs-validation" novalidate="" method="post" action="<?php echo site_url()?>CSR/CSR_Controller/addTbl_csr">

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
                   <input type="date" class="form-control"  id="validationCustom01" name="pro_date"<?php if(!empty($checkbox)){?> readonly="" <?php } ?>" value="<?php if(!empty($checkbox)){ echo $checkbox[0]->pro_date;} ?>" required="">
                   <div class="valid-feedback">Looks good! </div>
                   <div class="invalid-feedback">Please provide a valid date.</div>
                 </div> 
                 
                 <input type="hidden"id="admin" name="admin_id"value="<?php echo $admin[0]->admin_id;?>"> 
                 
                 <?php if(!empty($process)) { ?>
                  <?php if(!empty($allshift)) { ?>
                    <input type="hidden" name="shiftt" value="<?php if(!empty($checkbox)){ echo $checkbox[0]->shift_id; } ?>">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-2">
                     <label for="validationCustom01">Shift:</label>
                     <select class="form-control" id="grades" required="" name="shift_id"<?php if(!empty($checkbox)){?> disabled <?php } ?>">
                      <option value="">Select Shift</option>
                      <?php foreach($allshift as $sh): ?>
                        <option value="<?php echo $sh->shift_id ?>"<?php if(!empty($ssshift)){ if($ssshift==$sh->shift_id){echo "selected";}} ?>><?php echo $sh->shift_name;?></option>
                      <?php endforeach; ?>
                    </select>
                    <div class="valid-feedback">Looks good!</div>
                    <div class="invalid-feedback">Please choose a valid shift.</div>
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
                 <!--  <button class="btn btn-danger" ><a href="<?php base_url() ?>/add_csr" style="color: #fff;">Cancel</a></button> -->
                 <button  class="btn btn btn-danger "  onClick="return redirect('<?php echo base_url();?>CSR/CSR_Controller/add_csr');">Cancel</button>
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

<!-- ===== Start Code for to get data after select shift or admin ====== -->

<script type="text/javascript">

  $(document).ready(function(){    
    $('#grades').change(function(){ 
     $('#classes').show();      
     var shift = $('#grades').val();
     var admin = $('#admin').val(); 
     
     $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>CSR/CSR_Controller/findprocess",
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
    var admin = $('#admin').val(); 
    var datee = $('#validationCustom01').val(); 
    $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>CSR/CSR_Controller/updatefindprocess",
      data: {shift_id:shift,admin_id:admin,date:datee},
      success: function(classes) 
      {
        

        $('#classes').html(classes); 

        
      }        
    });

  };
  
</script>
<!-- ===== End Code for to get data after select shift or admin ====== -->
