   <div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
      <div class="container-fluid dashboard-content ">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
              <h2 class="pageheader-title">Edit Project</h2>

              <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="">Project</a></li>
                    <li class="breadcrumb-item "><a href="">Add Project</a></li>

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
                  <button class="btn btn-sm btn-primary"  onClick="return redirect('<?php echo base_url(); ?>Project/ProjectController/projectlist');"><i class="fa fa-list" aria-hidden="true"></i> List Project</button>
                </div>
              </div>
            </h5>
            <form role="form" class="needs-validation" method="post" novalidate="" action="<?php echo site_url()?>Project/ProjectController/updateproject" enctype="multipart/form-data">
              <div class="card-body" style="background-color: #f4e2f7 !important;"> 
               <div class="row">

                <input type="hidden" value="<?php echo $Project[0]->pr_id ?>" class="form-control" id="prid" name="pr_id">      
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                  <label for="name">Project Title</label>
                  <input type="text" required="" value="<?php echo $Project[0]->pr_title ?>" class="form-control" required id="validationCustom01" placeholder="Write Project Title Here." name="pr_title">
                  <div class="valid-feedback">Looks good! </div>
                  <div class="invalid-feedback">Please fill the project title.</div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-2">
                  <label for="name">Project Worktype</label>
                  <input type="text" required="" placeholder="Write Project Worktype Here." value="<?php echo $Project[0]->pr_worktype ?>" class="form-control" id="name" name="pr_worktype">
                  <div class="valid-feedback">Looks good! </div>
                  <div class="invalid-feedback">Please fill the project worktype.</div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-2">
                  <label for="fname">Project Start Date</label>
                  <input type="date" required="" value="<?php echo $Project[0]->pr_startdate ?>" class="form-control" id="fname" name="pr_startdate" placeholder="Write Project Start Date Here.">
                  <div class="valid-feedback">Looks good! </div>
                  <div class="invalid-feedback">Please fill the valid date.</div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-2">
                  <label for="gender">Project Deadline</label>
                  <input type="date" required=""  value="<?php echo $Project[0]->pr_deadline ?>" class="form-control" id="password" name="pr_deadline" placeholder="Write Project Deadline Here.">
                  <div class="valid-feedback">Looks good! </div>
                  <div class="invalid-feedback">Please fill valid date.</div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-2">
                  <label for="email">Project Description</label>
                  <input type="text" required="" value="<?php echo $Project[0]->pr_description ?>" class="form-control" id="email" name="pr_description" placeholder="Write Project Description Here.">
                  <div class="valid-feedback">Looks good! </div>
                  <div class="invalid-feedback">Please fill the project description.</div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-2">
                  <label for="designation">Project Budget</label>
                  <input type="text" required="" value="<?php echo $Project[0]->pr_budget ?>" class="form-control" id="designation" name="pr_budget" placeholder="Write Project Budget Here." >
                  <div class="valid-feedback">Looks good! </div>
                  <div class="invalid-feedback">Please fill the project budget.</div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-2">
                  <label for="doc_id">Project Installments</label>
                  <input type="text" required=""  value="<?php echo $Project[0]->pr_installments ?>" class="form-control" id="adminid" name="pr_installments" placeholder="Write Project Installments Here.">
                  <div class="valid-feedback">Looks good! </div>
                  <div class="invalid-feedback">Please fill the project installments.</div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-2">
                  <label for="name">Project Installment Amount</label>
                  <input type="text" required=""  value="<?php echo $Project[0]->pr_inst_amt ?>" class="form-control" id="name" name="pr_inst_amt" placeholder="Write Project Installment Amount Here.">
                  <div class="valid-feedback">Looks good! </div>
                  <div class="invalid-feedback">Please fill the project installment amount.</div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-2">
                  <label for="fname">Project Balance</label>
                  <input type="text" required=""  value="<?php echo $Project[0]->pr_balance ?>" class="form-control" id="fname" name="pr_balance" placeholder="Write Project Balance Here.">
                  <div class="valid-feedback">Looks good! </div>
                  <div class="invalid-feedback">Please fill the project balance.</div>
                </div>
                <!-- <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-2">
                  <label for="gender">Project Status ID</label>
                  <input type="text" required="" value="<?php echo $Project[0]->pr_status_id ?>" class="form-control" id="gender" name="pr_status_id">
                </div> -->



                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
                  <label for="designation">Phase</label>
                  <input type="text" required="" value="<?php echo $Project[0]->ser_id ?>"  class="form-control" id="designation" name="ser_id" placeholder="Phase A,B,C">
                  <div class="valid-feedback">Looks good! </div>
                  <div class="invalid-feedback">Please fill the service id.</div>
                </div>

                <div  class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
                 <label>Progress(in %)</label>
                 <div class="form-control">
                  <input type="range" min="0" name="pr_progress" value="<?php echo $Project[0]->pr_progress ?>" class="mt-1" max="100"  id="progressbar" onchange="showVal(this.value)">
                  <span name="pr_progress" id="prog">0%</span>

                </div></div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
                 <label for="validationCustom01">Priority</label>
                 <select required=""  name="pr_priority" id="teamLeader"class="form-control">
                  <option value="">Select Option</option>
                  <option value="Low"<?php if("Low"==$Project[0]->pr_priority){ echo "selected"; } ?>>Low</option>
                  <option value="Medium"<?php if("Medium"==$Project[0]->pr_priority){ echo "selected"; } ?>>Medium</option>
                  <option value="High"<?php if("High"==$Project[0]->pr_priority){ echo "selected"; } ?>>High</option>
                  <option value="Urgent"<?php if("Urgent"==$Project[0]->pr_priority){ echo "selected"; } ?>>Urgent</option>
                </select>
                <div class="valid-feedback"> Looks good! </div>
                <div class="invalid-feedback">Please choose a valid option.</div>
              </div>
              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
               <label for="validationCustom01">Customer</label>
                 <select  name="pr_customer" id="teamLeader"class="form-control">
                        <option value="">Select Option</option>
                        <?php foreach ($customer as $key) {?>
                           <option value="<?php echo $key->cus_id; ?>"<?php if($key->cus_id==$Project[0]->pr_customer){ echo "selected";} ?>><?php echo $key->cus_name; ?></option>
                       <?php  } ?>

                    </select>

            </div>
            <div  class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
             <label>Customer Can View</label>
             <div class="form-control">
               <div class="switch-button switch-button-sm switch-button-success btn-danger">
                 <input type="checkbox" <?php if($Project[0]->pr_cus_view=="on"){ ?>checked=""<?php } ?> name="pr_cus_view" id="switch16"><span>
                  <label for="switch16"></label></span>
                </div>
              </div>
            </div>
            <div  class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
              <label>Customer Can Comment</label>
              <div class="form-control">
               <div class="switch-button switch-button-sm  switch-button-success btn-danger">
                <input type="checkbox"   <?php if($Project[0]->pr_cus_comment=="on"){ ?>checked=""<?php } ?> name=" pr_cus_comment" id="switch17"><span>
                  <label for="switch17"></label></span>
                </div>
              </div>
            </div>


            <div  class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">

             <label  for="summernote">Note </label>
             <div class="form-group">
              <label class="control-label sr-only" for="summernote">Descriptions </label>
              <textarea class="form-control" id="summernote" name="pr_note" rows="6" placeholder="Write Descriptions">
                <?php echo $Project[0]->pr_note ?>
              </textarea>
            </div>
          </div>

          <!--<label for="designation">Prospect ID</label>-->
          <input type="hidden" required="" value="<?php echo $Project[0]->pr_id ?>" class="form-control" id="designation" name="prospect_id">

          <div class="form-row pt-2">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-2">
              <button type="submit" style="margin-left:15px;"class="btn btn-primary pt-2">Update</button>
            </div>
          </div>
        </div>
      </form>

    </div>
  </div>
</div>
</section>
</div>

<script type="text/javascript">
 function showVal(newVal){
  newVall=newVal+"%";
  document.getElementById("prog").innerHTML=newVall;
}
</script>
<script>
  $(document).ready(function() {
    $('#summernote').summernote({
      height: 300

    });
  });

  $(document).ready(function() {

    var n=document.getElementById("progressbar").value;
    newVall=n+"%";
    document.getElementById("prog").innerHTML=newVall;


  });

</script>