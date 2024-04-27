 <div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Add Project</h2>

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
                   <form role="form" method="post"class="needs-validation" novalidate="" action="<?php echo base_url()?>Project/ProjectController/addproject" enctype="multipart/form-data"></html>
                    <div class="card-body text-white" style="background-color: #f4e2f7 !important;"> 
                     <div class="row" >        
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12  ">
                            <label for="name">Title</label>
                            <span style="color: red;"><?php echo form_error('pr_title'); ?></span>
                            <input type="text" required="" value="<?php echo set_value('pr_title'); ?>"  class="form-control" id="name" name="pr_title" placeholder="Project Title ">
                          
                            <div class="invalid-feedback">Please fill the project title.</div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mt-2">
                            <label for="name">Worktype</label>
                            <span style="color: red;"><?php echo form_error('pr_worktype'); ?></span>
                            <input type="text" required="" value="<?php echo set_value('pr_worktype'); ?>"class="form-control" id="name" name="pr_worktype" placeholder="Enter Worktype">
                            <div class="valid-feedback"> Looks good!</div>
                            <div class="invalid-feedback">Please fill the project worktype.</div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-2">
                            <label for="fname">Start Date</label>
                            <span style="color: red;"><?php echo form_error('pr_startdate'); ?></span>
                            <input type="date" required=""  value="<?php echo set_value('pr_startdate'); ?>" class="form-control" id="fname" name="pr_startdate" placeholder="Enter Start Date">
                            <div class="valid-feedback"> Looks good!</div>
                            <div class="invalid-feedback">Please fill the valid date.</div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-2">
                            <label for="gender">Deadline</label>
                            <span style="color: red;"><?php echo form_error('pr_deadline'); ?></span>
                            <input type="date" required=""  value="<?php echo set_value('pr_deadline'); ?>"  class="form-control" id="password" name="pr_deadline" placeholder="Enter Deadline">
                            <div class="valid-feedback"> Looks good!</div>
                            <div class="invalid-feedback">Please fill the valid date.</div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-2">
                            <label for="email">Description</label>
                            <span style="color: red;"><?php echo form_error('pr_description'); ?></span>
                            <input type="text" required="" value="<?php echo set_value('pr_description'); ?>" class="form-control" id="email" name="pr_description" placeholder="Enter Description">
                            <div class="valid-feedback"> Looks good!</div>
                            <div class="invalid-feedback">Please fill the project description.</div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-2">
                            <label for="designation">Budget</label>
                            <span style="color: red;"><?php echo form_error('pr_budget'); ?></span>
                            <input type="text" required="" value="<?php echo set_value('pr_budget'); ?>" class="form-control" id="designation" name="pr_budget" placeholder="Enter Budget">
                            <div class="valid-feedback"> Looks good!</div>
                            <div class="invalid-feedback">Please fill the project budget.</div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-2">
                            <label for="doc_id">Installments</label>
                            <span style="color: red;"><?php echo form_error('pr_installments'); ?></span>
                            <input type="text"  value="<?php echo set_value('pr_installments'); ?>" required="" class="form-control" id="adminid" name="pr_installments" placeholder="Enter Installments">
                            <div class="valid-feedback"> Looks good!</div>
                            <div class="invalid-feedback">Please fill the project installments.</div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-2">
                            <label for="name">Installment Amount</label>
                            <span style="color: red;"><?php echo form_error('pr_inst_amt'); ?></span>
                            <input type="text"  value="<?php echo set_value('pr_inst_amt'); ?>"  required="" class="form-control" id="name" name="pr_inst_amt" placeholder="Enter Installment Amount">
                            <div class="valid-feedback"> Looks good!</div>
                            <div class="invalid-feedback">Please the project installment amount.</div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-2">
                            <label for="fname">Balance</label>
                            <span style="color: red;"><?php echo form_error('pr_balance'); ?></span>
                            <input type="text" value="<?php echo set_value('pr_balance'); ?>" required="" class="form-control" id="fname" name="pr_balance" placeholder="Enter Balance">
                            <div class="valid-feedback"> Looks good!</div>
                            <div class="invalid-feedback">Please fill the project balance.</div>
                        </div>


                        <div  class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
                           <label for="designation">Phase</label>
                           <span style="color: red;"><?php echo form_error('ser_id'); ?></span>
                           <input type="text" required="" value="<?php echo set_value('ser_id'); ?>" class="form-control" id="designation" name="ser_id" placeholder="Phase A,B,C">
                           <div class="valid-feedback"> Looks good!</div>
                           <div class="invalid-feedback">Please fill the service id.</div>
                       </div>
                       <div  class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
                           <label>Progress(in %)</label>
                           <div class="form-control">
                            <input type="range" min="0" value="<?php if(empty(set_value('pr_progress'))){ echo '0';}else{ echo set_value('pr_progress'); } ?>" name="pr_progress" class="mt-1" max="100"  id="progressbar" onchange="showVal(this.value)">
                            <span name="pr_progress" id="prog">0%</span>

                        </div></div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
                         <label for="validationCustom01">Priority</label>
                         <select required=""  name="pr_priority" value="<?php echo set_value('pr_priority'); ?>" id="teamLeader"class="form-control">
                            <option value="">Select Option</option>
                            <option value="Low"<?php if("Low"==set_value('pr_priority')){ echo "selected"; } ?>>Low</option>
                            <option value="Medium"<?php if("Low"==set_value('Medium')){ echo "selected"; } ?>>Medium</option>
                            <option value="High"<?php if("Low"==set_value('High')){ echo "selected"; } ?>>High</option>
                            <option value="Urgent"<?php if("Low"==set_value('Urgent')){ echo "selected"; } ?>>Urgent</option>
                        </select>
                        <div class="valid-feedback"> Looks good! </div>
                        <div class="invalid-feedback">Please choose a valid option.</div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
                     <label for="validationCustom01">Customer</label>
                     <select   name="pr_customer" value="<?php echo set_value('pr_customer'); ?>" id="teamLeader"class="form-control">
                        <option value="">Select Option</option>
                        <?php foreach ($customer as $key) {?>
                           <option value="<?php echo $key->cus_id; ?>"<?php if($key->cus_id==set_value('pr_customer')){ echo "selected"; } ?>><?php echo $key->cus_name; ?></option>
                       <?php  } ?>

                    </select>

                </div>
                <div  class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
                   <label>Customer Can View</label>
                   <div class="form-control">
                       <div class="switch-button switch-button-sm switch-button-success btn-danger">
                           <input type="checkbox" <?php if(set_value('pr_cus_view')=="on"){ ?>checked=""<?php } ?> name="pr_cus_view" id="switch16"><span>
                            <label for="switch16"></label></span>
                        </div>
                    </div>
                </div>
                <div  class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
                    <label>Customer Can Comment</label>
                    <div class="form-control">
                       <div class="switch-button switch-button-sm  switch-button-success btn-danger">
                           <input type="checkbox"  <?php if(set_value('pr_cus_comment')=="on"){ ?>checked=""<?php } ?> name=" pr_cus_comment" id="switch17"><span>
                            <label for="switch17"></label></span>
                        </div>
                    </div>
                </div>


                <div  class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">

                 <label  for="summernote">Note </label>
                 <div class="form-group">
                    <label class="control-label sr-only" for="summernote">Descriptions </label>
                    <textarea class="form-control" id="summernote" name="pr_note" rows="6" placeholder="Write Descriptions"><?php echo set_value('pr_note'); ?></textarea>
                </div>
            </div>

        </div>


        <div class="form-row ">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-2">
                <button type="submit" class="btn btn-primary pt-2">Submit</button>
            </div>
        </div>
    </form>
</div>       
</div>
</div>
</section>   
</div>
</div>
</body>

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
    if(n===""){n=0;}
    newVall=n+"%";
    document.getElementById("prog").innerHTML=newVall;


  });
</script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2({ tags: true });
    });
</script>