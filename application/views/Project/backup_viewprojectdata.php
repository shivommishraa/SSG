<div class="dashboard-wrapper">
  <div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="page-header">
            <h2 class="pageheader-title">View Project</h2>
            <div class="page-breadcrumb">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="">Project</a></li>
                  <li class="breadcrumb-item "><a href="">View Project</a></li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
       <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="media influencer-profile-data d-flex align-items-center p-2">
                  <div class="mr-4">
                    <img src="<?php echo base_url(); ?>assets/images/dribbble1.png" alt="User Avatar" class="rounded-circle user-avatar-lg">
                  </div>
                  <div class="media-body">
                   <h3 class="m-b-10"><?php  echo $Project[0]->pr_title;?></h3>
                   <p><span class="m-r-20 d-inline-block">Start Date<span class="m-l-10 d-inline-block text-primary"><?php  echo $Project[0]->pr_startdate;?></span></span><span class="m-r-20 d-inline-block"> Ends<span class="m-l-10 text-secondary"><?php  echo $Project[0]->pr_deadline;?></span></span>
                   </p>
                 </div>
                 <button class="btn btn-sm btn-primary"  onClick="return redirect('<?php echo base_url(); ?>Project/ProjectController/projectlist');"><i class="fa fa-list" aria-hidden="true"></i> List Project</button>
               </div>
             </div>
           </div>
         </div>
         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mb-5">
          <div class="section-block">
            <h5 class="section-title"></h5>
            <!-- ============================Start code for clickable task ============================== -->
          </div>
          <div class="tab-regular tab-sm">
            <ul class="nav nav-tabs nav-fill" id="myTab7" role="tablist">
              <li class="nav-item">
                <a class="nav-link " id="home-tab-justify" data-toggle="tab" href="#home-justify" role="tab" aria-controls="home"aria-selected="true">Details</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="notes-tab-justify" data-toggle="tab" href="#notes-justify" role="tab" aria-controls="contact" aria-selected="false">Notes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="files-tab-justify" data-toggle="tab" href="#files-justify" role="tab" aria-controls="contact" aria-selected="false">Files</a>
              </li>
              <li class="nav-item <?php if($this->session->flashdata('Success')){?> active <?php }?>">
                <a class="nav-link active" id="profile-tab-justify" data-toggle="tab" href="#profile-justify" role="tab" aria-controls="profile" aria-selected="false" >Team</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="contact-tab-justify" data-toggle="tab" href="#contact-justify" role="tab" aria-controls="contact" aria-selected="false">Activity</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="task-tab-justify" data-toggle="tab" href="#task-justify" role="tab" aria-controls="contact" aria-selected="false">Task</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="mile-tab-justify" data-toggle="tab" href="#mile-justify" role="tab" aria-controls="contact" aria-selected="false">Milestone</a>
              </li>


            </ul>
            <!-- ============================Start code for Project Details ============================== -->
            <div class="tab-content mt-1" id="myTabContent7">
              <div class="tab-pane fade " id="home-justify" role="tabpanel" aria-labelledby="home-tab-justify">
               <div class="card-body ">
                <a href="#" class="btn btn-block text-center "style="color: #fff; background-color: #ef823b;"><i class="fas fa-info-circle"></i> Project Details</a>
              </div>
              <div class="container-fluid">
                <?php  $getbyproject=$getadmin($Project[0]->prospect_id); ?>
                <div class="row">
                  <div class="col-lg-4" style="background-color:#fff;"><b> Worktye:</b> &nbsp;<?php  echo $Project[0]->pr_worktype;?></div>
                  <div class="col-lg-4" style="background-color:#fff;"><b>Added By:</b> &nbsp;<?php echo $getbyproject[0]->name ?></div>
                </div>
                <div class="row">
                  <div class="col-lg-4 mt-2" style="background-color:#fff;"><b> Installments:</b> &nbsp;<?php  echo $Project[0]->pr_installments;?></div>

                  <div class="col-lg-4 mt-2" style="background-color:#fff;"><b> Inst Ammount:</b> &nbsp;<?php  echo $Project[0]->pr_inst_amt;?></div>

                  <div class="col-lg-4 mt-2" style="background-color:#fff;"><b> Balance:</b> &nbsp;<?php  echo $Project[0]->pr_balance;?></div>

                </div>
                <div class="row">

                 <div class="col-lg-4 mt-2" style="background-color:#fff;"><b>Service ID:</b> &nbsp;<?php  echo $Project[0]->ser_id;?></div>
                 <div class="col-lg-4 mt-2" style="background-color:#fff;"><b>Added Date:</b> &nbsp;<?php  echo $Project[0]->pr_mod_at;?></div>

               </div>
               <div class="row">

                <div class="col-lg-4 mt-2" style="background-color:#fff;"><b> Description:</b> &nbsp;<?php  echo $Project[0]->pr_description;?></div>

              </div>

            </div>

          </div>
          <!-- ============================End code for Project Details ==================== -->

          <!-- ============================Start code for Notes ============================== -->

          <div class="tab-pane fade " id="notes-justify" role="tabpanel" aria-labelledby="notes-tab-justify">
           <div class="card-body ">
            <a href="#" class="btn btn-block text-center "style="color: #fff; background-color: #eb8aef;"><i class="fas fa-edit"> </i> Notes</a>
          </div>
          <?php if($this->session->flashdata('success')){ ?>
           <div class="alert alert-success">
            <strong><span class="glyphicon glyphicon-ok"></span>   <?php echo $this->session->flashdata('success'); ?></strong>
            <button type="button"  onClick="return redirect('<?php echo base_url();?>Project/ProjectController/viewprojectdata/<?php echo $Project[0]->pr_id; ?>');"class="close" data-dismiss="modal" aria-label="Close">  
             <span aria-hidden="true">&times;</span></button>
           </div>
         <?php } ?>
         <form role="form" method="post"class="needs-validation"  action="<?php echo base_url()?>Project/ProjectController/upd_project_note" enctype="multipart/form-data">
          <div  class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
            <input type="hidden" value="<?php echo $Project[0]->pr_id ?>" name="pr_id">
            <div class="form-group">
              <label class="control-label sr-only" for="summernote">Descriptions </label>
              <textarea class="form-control" required="" id="summernote" name="pr_note" rows="6" placeholder="Write Descriptions"><?php echo $Project[0]->pr_note; ?></textarea>
            </div><div class="valid-feedback">Looks good! </div>
            <div class="invalid-feedback">Please select member.</div>
          </div> 
          <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 "> <button class="btn btn-success" type="submit"><i class="fas fa-angle-double-up"></i> Submit</button> </div> 

          <!-- ==========Start Script for Note text editor ====================== -->
          <script type="text/javascript">
           $(document).ready(function() {
            $('#summernote').summernote({
              height: 300

            });   /*272130501900358  s9S7Ef  7607011866*/  
          });
        </script></form>
        <!-- ==========End Script for Note text editor ====================== -->     
      </div>
      <!-- ============================End code for Notes ============================== -->

      <!-- ============================Start code for Files ============================== -->

      <div class="tab-pane fade " id="files-justify" role="tabpanel" aria-labelledby="files-tab-justify">
       <div class="card-body ">
        <a href="#" class="btn btn-block text-center "style="color: #fff; background-color: #eb8aef;"><i class="fas fa-edit"> </i> Files</a>
      </div>
      <?php if($this->session->flashdata('success')){ ?>
       <div class="alert alert-success">
        <strong><span class="glyphicon glyphicon-ok"></span>   <?php echo $this->session->flashdata('success'); ?></strong>
        <button type="button"  onClick="return redirect('<?php echo base_url();?>Project/ProjectController/viewprojectdata/<?php echo $Project[0]->pr_id; ?>');"class="close" data-dismiss="modal" aria-label="Close">  
         <span aria-hidden="true">&times;</span></button>
       </div>
     <?php } ?>
     <form role="form" method="post"class="needs-validation"  action="<?php echo base_url()?>Project/ProjectController/uploadNotes" enctype="multipart/form-data">
      <div  class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-2 ml-3">
        <input type="hidden" value="<?php echo $Project[0]->pr_id ?>" name="pr_id">
        <div class="form-group ">
          <label class="control-label sr-only" for="summernote">Descriptions </label>
          <input type="file" required="" name="dataFile" class="form-control bg-primary" id="fileChooser" onchange="return ValidateFileUpload()" /> 
        </div> </div>
        <span style="color: red;" id="invalidfile" class="form-group mt-2"></span>
         <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 ml-3" > <button class="btn btn-success " type="submit"><i class="fas fa-angle-double-up"></i> Submit</button> </div>

        <div  class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-2 ">

         <img id="blah" src=""  class="form-group border"/>
         <span style="color: blue;" id="otherimage" class="form-group "></span>
       </div>

       </form>
       <?php if(!empty($project_note)){ ?>
       <div class="accrodion-regular mt-3">
         <div id="accordion4">
           <div class="card bg-white">
            <div class="card-header" id="headingTen">
              <h5 class="mb-0">
               <button class="btn btn-link text-blue" data-toggle="collapse" data-target="#collapseTen" aria-expanded="true" aria-controls="collapseTen">
                <span class="fas fa-angle-down mr-3"></span>All Uploaded Files Here
              </button>
            </h5>
          </div>
          <div id="collapseTen" class="collapse show" aria-labelledby="headingTen" data-parent="#accordion4">
            <div class="card-body">
             <table class="table table-striped table-bordered first">
    <thead>
      <tr>
       <th>SL No</th>
       <th>File Name</th>
       <th>Added By</th>
       <th>Added At</th>
       <th colspan="2">Actions</th>

     </tr>
   </thead>
   <tbody>
    <?php $i=1; foreach($project_note as $ro) { 
      $addby=$getmember($ro->add_by);
      ?>
      <tr>
        <td> <?php echo $i; ?> </td>
        <td> <?php echo $ro->dataFile ?></td>
        <td> <?php echo $addby[0]->name ?></td>
        <td> <?php echo $ro->add_at ?></td>
        <td><a href="<?php echo site_url()?>Project/ProjectController/deleteprojectfile/<?php echo $ro->note_id.'/'.$ro->project_id; ?>" onclick="return confirm('are you sure to delete')"><i class="fa fa-trash"style="color: red;"></i></a></td>
         <td><a href="<?php echo base_url().'uploads/Project_file/'. $ro->dataFile ?>"><i class="fas fa-eye"style="color: green;"></i></a></td>
      </tr>
      <?php $i++; } ?>
    </tbody>
  </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php }?>
    <!-- ==========Start Script  ====================== -->
    <script type="text/javascript">

     function ValidateFileUpload() {
      var fuData = document.getElementById('fileChooser');
      var FileUploadPath = fuData.value;
      var filee = document.getElementById('fileChooser').files[0];

//To check if user upload any file
if (FileUploadPath == '') {
  alert("Please upload an image");

} else {
  var Extension = FileUploadPath.substring(
    FileUploadPath.lastIndexOf('.') + 1).toLowerCase();

//The file uploaded is an image

if (Extension == "pdf" || Extension == "png" || Extension == "bmp"
  || Extension == "jpeg" || Extension == "jpg" || Extension == "pdf" || Extension == "txt" || Extension == "pptx" || Extension == "xls" || Extension == "doc" || Extension == "docx" || Extension == "xlsx" || Extension == "rtf" ) {
  if (filee.size > 10024000) {
    alert('Max Upload size is 50MB only');
    document.getElementById('invalidfile').innerHTML = 'Max Upload size is 50 MB only.Please select valid file.';
    if (fuData.files && fuData.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#blah').attr('src', '');
        document.getElementById('fileChooser').value = '';
      }

      reader.readAsDataURL(fuData.files[0]);
    }
    return false;
  }else{

// To Display
if(Extension=="jpeg" || Extension=="jpg" || Extension=="png" || Extension=="jpeg"){
  if (fuData.files && fuData.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#blah').attr('src', e.target.result)
      .width(150)
      .height(200);
    }

    reader.readAsDataURL(fuData.files[0]);
    document.getElementById('invalidfile').innerHTML = '';
    document.getElementById('otherimage').innerHTML = '';
  }
}else{
  var Extensionn = document.getElementById('fileChooser').files[0].name;
  if (fuData.files && fuData.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#blah').attr('src', '');

    }

    reader.readAsDataURL(fuData.files[0]);
  }
  document.getElementById('invalidfile').innerHTML = '';
  document.getElementById('otherimage').innerHTML = "File Name: "+Extensionn;

}

} 
}
//The file upload is NOT an image
else {

  alert("Only allows file types of PNG, JPG, JPEG, BMP, PDF, EXL, EXLS, DOC,DOCX, PPT and PPTX. ");
  document.getElementById('invalidfile').innerHTML = 'Oonly allows file types of PNG, JPG, JPEG, BMP, PDF, EXL, EXLS, DOC,DOCX, PPT and PPTX. Please select valid file.';
  if (fuData.files && fuData.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {
      $('#blah').attr('src', '');
      document.getElementById('fileChooser').value = '';
    }

    reader.readAsDataURL(fuData.files[0]);

  }

}
}
}

</script>

<!-- ==========End Script  ====================== -->     
</div>
<!-- ============================End code for Files ============================== -->


<!-- ============================Start code for Add Team ============================== -->

<div class="tab-pane fade show active" id="profile-justify" role="tabpanel" aria-labelledby="profile-tab-justify">
 <div class="card-body ">
  <a href="#" class="btn btn-block text-center "style="color: #fff; background-color: #413bd8;"><i class="fas fa-user-plus"></i> Add Team</a>
</div>
<?php if($this->session->flashdata('success')){ ?>
 <div class="alert alert-success">
  <strong><span class="glyphicon glyphicon-ok"></span>   <?php echo $this->session->flashdata('success'); ?></strong>
  <button type="button"  onClick="return redirect('<?php echo base_url();?>Project/ProjectController/viewprojectdata/<?php echo $Project[0]->pr_id; ?>');"class="close" data-dismiss="modal" aria-label="Close">  
   <span aria-hidden="true">&times;</span></button>
 </div>
<?php } ?>
<?php if($this->session->flashdata('Delete')){ ?>
 <div class="alert alert-danger">
  <strong><span class="glyphicon glyphicon-ok"></span>   <?php echo $this->session->flashdata('Delete'); ?></strong>
  <button type="button"  onClick="return redirect('<?php echo base_url();?>Project/ProjectController/viewprojectdata/<?php echo $Project[0]->pr_id; ?>');"class="close" data-dismiss="modal" aria-label="Close">  
   <span aria-hidden="true">&times;</span></button>
 </div>
<?php } ?>
<div class="row" >
 <div class="card-body">
  <form class="needs-validation" action="<?php echo base_url() ?>/Project/ProjectController/add_project_team" novalidate="" method="post" enctype="multipart/form-data" id="contact_form">
    <input type="hidden" name="pr_id" value="<?php echo $Project[0]->pr_id; ?>">
    <div class="row">
      <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5 ">
        <label for="validationCustom01">Team Member</label>
        <select class="form-control"  name="id_role" id="validationCustom02"required>
         <option value="">Select Member</option>
         <?php foreach($All_agent as $row): ?>
          <option value="<?php echo $row->admin_id.','.$row->role_id; ?>" ><?php echo $row->name; ?></option>
        <?php endforeach; ?>
      </select>
      <span id="id_role" class="text-danger"></span>
      <div class="valid-feedback">Looks good! </div>
      <div class="invalid-feedback">Please select member.</div>
    </div>  

    <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5 ">
      <label for="validationCustom01">Remark</label>
      <input type="text"  class="form-control"  name="remark" id="validationCustom02"required="" placeholder="Remark write here...">
      <span id="remark" class="text-danger"></span>
      <div class="valid-feedback">Looks good! </div>
      <div class="invalid-feedback">Please write remark here..</div>
    </div>
    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 pt-4"> <button class="btn btn-success" type="submit"><i class="fas fa-angle-double-up"></i> Submit</button> </div>  

  </div>   
</form>   

</div>
</div>
<!-- ============================End code for Add Team ============================== -->

<!-- ============================Start code for List Team Member ============================== -->
<div class="table-responsive">
  <?php if(!empty($team)) {?>
   <div class="card-body ">
    <a href="#" class="btn btn-success btn-block text-center "style="color: #fff;"><i class="fas fa-list-ol"></i> Added Team Member</a>
  </div>
  <table class="table table-striped table-bordered first">
    <thead>
      <tr>
       <th>SL No</th>
       <th>Name</th>
       <th>Role</th>
       <th>Added By</th>
       <th>Added At</th>
       <th>Actions</th>

     </tr>
   </thead>
   <tbody>
    <?php $i=1; foreach($team as $ro) { 
      $member=$getmember($ro->member_id);
      $addby=$getmember($ro->add_by);
      $role=$getrole($ro->proj_role);
      ?>
      <tr>
        <td> <?php echo $i; ?> </td>
        <td> <?php echo $member[0]->name ?></td>
        <td> <?php echo $role[0]->role_name ?></td>
        <td> <?php echo $addby[0]->name ?></td>
        <td> <?php echo $ro->add_at ?></td>
        <td><a href="<?php echo site_url()?>Project/ProjectController/deleteteam_member/<?php echo $ro->team_id.'/'.$Project[0]->pr_id; ?>" onclick="return confirm('are you sure to delete')"><i class="fa fa-trash"style="color: red;"></i></a></td>
      </tr>
      <?php $i++; } ?>
    </tbody>
  </table>
<?php }else {?>
  <div class="alert alert-danger" role="alert">
   <strong>Sorry!!..No any member added in this Project.</strong>
 </div>
<?php } ?>

<div class="dataTables_paginate paging_simple_numbers pt-2 "><?php //echo $links; ?></div>
</div>
</div>
<!-- ============================ End code for List Team Member ============================== -->

<!-- ====================== Start code for history of project. ==================================== -->


<div class="tab-pane fade" id="contact-justify" role="tabpanel" aria-labelledby="contact-tab-justify">
 <div class="table-responsive">
  <?php if(!empty($project_history)) {?>

   <div class="card-body ">
    <a href="#" class="btn btn-block text-center "style="color: #fff; background-color: #f98a87;"><i class="fas fa-history"> </i> History</a>
  </div>
  <table class="table table-striped table-bordered first">
    <thead>
      <tr>
        <th>SL No</th>
        <th>Name</th>
        <th>Role</th>
        <th>Added By</th>
        <th>Added At</th>
      </tr>
    </thead>
    <tbody>
      <?php $i=1; foreach($project_history as $ro) { 
        $member=$getmember($ro->member_id);
        $addby=$getmember($ro->add_by);
        $role=$getrole($ro->proj_role);
        ?>
        <tr>

          <td> <?php echo $i; ?> </td>
          <td> <?php echo $member[0]->name ?></td>
          <td> <?php echo $role[0]->role_name ?></td>
          <td> <?php echo $addby[0]->name ?></td>
          <td> <?php echo $ro->add_at ?></td>
        </tr>
        <?php $i++; } ?>
      </tbody>
    </table>
  <?php }else {?>
    <div class="alert alert-danger" role="alert">
     <strong>Sorry!!..No any Activity found in this Project.</strong>
   </div>
 <?php } ?>

 <div class="dataTables_paginate paging_simple_numbers pt-2 "><?php //echo $links; ?></div>
</div>
</div>
<!-- ====================== End code for history of project ==================================== -->


<!-- ====================== Start code for add the task ==================================== -->

<div class="tab-pane fade" id="task-justify" role="tabpanel" aria-labelledby="task-tab-justify">
  <?php if(!empty($Added_member)){?>
    <div class="card-body ">
      <a href="#" class="btn btn-primary btn-block text-center "style="color: #fff;"><i class=" fas fa-plus-circle"></i> Add Task</a>
    </div>
    <?php if($this->session->flashdata('success')){ ?>
     <div class="alert alert-success">
      <strong><span class="glyphicon glyphicon-ok"></span>   <?php echo $this->session->flashdata('success'); ?></strong>
      <button type="button"  onClick="return redirect('<?php echo base_url();?>Project/ProjectController/viewprojectdata/<?php echo $Project[0]->pr_id; ?>');"class="close" data-dismiss="modal" aria-label="Close">  
       <span aria-hidden="true">&times;</span></button>
     </div>
   <?php }?>
   <form role="form" method="post"class="needs-validation" novalidate="" action="<?php echo base_url()?>Project/ProjectController/addtask" enctype="multipart/form-data"></html>
    <div class="card-body"> 
     <div class="row"> 
      <input type="hidden" name="pr_id" value="<?php echo $Project[0]->pr_id; ?>">       
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 ">
        <label for="name">Name</label>
        <span style="color: red;"><?php echo form_error('task_name'); ?></span>
        <input type="text" required=""  class="form-control" id="name" name="task_name" placeholder="Enter Task Name">
        <div class="valid-feedback"> Looks good!</div>
        <div class="invalid-feedback">Write task name here.</div>
      </div>
      
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 ">
        <label for="name">Team Member</label>
        <span style="color: red;"><?php echo form_error('id_role'); ?></span>
        <select class="form-control"  name="id_role" id="validationCustom02"required>
         <option value="">Select Team Member</option>
         <?php foreach($Added_member as $row): 
           $memberr=$getmember($row->member_id);
           ?>
           <option value="<?php echo $row->member_id.','.$row->proj_role; ?>" ><?php echo $memberr[0]->name; ?></option>
         <?php endforeach; ?>
       </select>
       <div class="valid-feedback"> Looks good!</div>
       <div class="invalid-feedback">Please select the member.</div>
     </div>
     <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
      <label for="fname">Description</label>
      <span style="color: red;"><?php echo form_error('desciption'); ?></span>
      <textarea required="" class="form-control" id="fname" name="desciption" placeholder="Write description here.."></textarea>
      <div class="valid-feedback"> Looks good!</div>
      <div class="invalid-feedback">Write description here..</div>
    </div>

    <div class="form-row ml-2">
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-2">
        <button type="submit" class="btn btn-primary "><i class="fas fa-angle-double-up"></i> Submit</button>
      </div></div>
    </form>


    <!-- ============================End code for Add the task ============================== -->

    <!-- ============================Start code for listing of task ============================== -->

    <div class="table-responsive">
      <?php if(!empty($alltask)) {?>

       <div class="card-body ">
        <a href="#" class="btn btn-success   btn-block text-center "style="color: #fff;"><i class="fas fa-list-ol"></i> Assigned Task List</a>
      </div>
      <table class="table table-striped table-bordered first">
        <thead>
          <tr>
            <th>SL No</th>
            <th>Task Name</th>
            <th>Member Name</th>
            <th>Role</th>
            <th>Last Status</th>
            <th colspan="3">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i=1; foreach($alltask as $ro) { 
           $member=$getmember($ro->member_id);
           $addby=$getmember($ro->add_by);
           $role=$getrole($ro->member_role);
           $page="view";
           ?>
           <tr>

            <td> <?php echo $i; ?> </td>
            <td> <?php echo $ro->task_name ?></td>
            <td> <?php echo $member[0]->name ?></td>
            <td> <?php echo $role[0]->role_name ?></td><?php  $tsk_status=$task_status($ro->task_status); ?>
            <td ><?php  if($ro->member_role > $userlogin[0]->role_id || $ro->member_role == $userlogin[0]->role_id){?> <a href="" onclick="javascript:task_status2(<?php echo $ro->task_id.','.$ro->project_id ?>)" data-toggle="modal" data-target="#modal-info"> <?php echo $tsk_status[0]->task_status_name; ?> </a><?php }else{ echo $tsk_status[0]->task_status_name;} ?></td>
            <?php if($ro->add_by==$admin[0]->admin_id){ ?>
              <td><a href="<?php echo site_url()?>Project/ProjectController/editmember_task/<?php echo $ro->task_id.'/'.$Project[0]->pr_id;  ?>"><i class="fas fa-pencil-alt"style="color: blue;"></i></a></td>
              <td><a href="<?php echo site_url()?>Project/ProjectController/delete_member_task/<?php echo  $ro->task_id.'/'.$Project[0]->pr_id;  ?>" onclick="return confirm('are you sure to delete')"><i class="fa fa-trash"style="color: red;"></i></a></td>
            <?php }else{ ?>
              <td>..</td>
              <td>..</td>
            <?php } ?>
            
            <td><a href="" onclick="javascript:taskdetails(<?php echo $ro->task_id.','.$Project[0]->pr_id; ?>)" data-toggle="modal" data-target="#modal-info"><i class="fa fa-eye"style="color: green;"></i></a></td>

          </tr>
          <?php $i++; } ?>
        </tbody>
      </table>
    <?php }else {?>
      <div class="alert alert-danger mt-3" role="alert">
       <strong>Sorry!!..No any Task found in this Project.</strong>
     </div>
   <?php } ?>
 <?php }else{ ?>
   <div class="alert alert-danger mt-3" role="alert">
     <strong>Sorry!!..No any Team member added in this Project.Please Add Team member first.</strong>
   </div>
 <?php } ?>
</div>

<!-- ============================End code for Listing the task ============================== -->
</div>
</div></form></div>



<!-- ====================== Start code for add the Milestone ==================================== -->

<div class="tab-pane fade" id="mile-justify" role="tabpanel" aria-labelledby="mile-tab-justify">
  <?php if(!empty($Added_member)){?>
    <div class="card-body ">
      <a href="#" class="btn btn-block text-center "style="color: #fff;background-color: #f924d9;"><i class=" fas fa-plus-circle"></i> Add Milestone</a>
    </div>
    <?php if($this->session->flashdata('success')){ ?>
     <div class="alert alert-success">
      <strong><span class="glyphicon glyphicon-ok"></span>   <?php echo $this->session->flashdata('success'); ?></strong>
      <button type="button"  onClick="return redirect('<?php echo base_url();?>Project/ProjectController/viewprojectdata/<?php echo $Project[0]->pr_id; ?>');"class="close" data-dismiss="modal" aria-label="Close">  
       <span aria-hidden="true">&times;</span></button>
     </div>
   <?php }?>
   <form role="form" method="post"class="needs-validation" novalidate="" action="<?php echo base_url()?>Project/ProjectController/addmilestone" enctype="multipart/form-data">
    <div class="card-body"> 
     <div class="row"> 
      <input type="hidden" name="pr_id" value="<?php echo $Project[0]->pr_id; ?>">       
      <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5 ">
        <label for="name">Name</label>
        <span style="color: red;"><?php echo form_error('task_name'); ?></span>
        <input type="text" required=""  class="form-control" id="name" name="mile_name" placeholder="Enter Milestone Name">
        <div class="valid-feedback"> Looks good!</div>
        <div class="invalid-feedback">Write milestone name here.</div>
      </div>
      
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 ">
        <label for="name">Team Member</label>
        <span style="color: red;"><?php echo form_error('id_role'); ?></span>
        <select class="form-control"  name="id_role" id="validationCustom02"required>
         <option value="">Select Team Member</option>
         <?php foreach($Added_member as $row): 
           $memberr=$getmember($row->member_id);
           ?>
           <option value="<?php echo $row->member_id.','.$row->proj_role; ?>" ><?php echo $memberr[0]->name; ?></option>
         <?php endforeach; ?>
       </select>
       <div class="valid-feedback"> Looks good!</div>
       <div class="invalid-feedback">Please select the member.</div>
     </div>
     <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 mb3">
       <label for="name">Complete (in %)</label>
       <span style="color: red;"><?php echo form_error('complete'); ?></span>
       
       <input type="number" min="0" max="100" maxlength="3" class="form-control " required=""  placeholder="Fill valid percentage (%)." id="percentage-mask" name="complete">

       <div class="valid-feedback"> Looks good!</div>
       <div class="invalid-feedback">Please fill the valid percent.</div>
     </div>
     <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
      <label for="fname">Description</label>
      <span style="color: red;"><?php echo form_error('desciption'); ?></span>
      <textarea required="" class="form-control" id="fname" name="desciption" placeholder="Write description here.."></textarea>
      <div class="valid-feedback"> Looks good!</div>
      <div class="invalid-feedback">Write description here..</div>
    </div>

    <div class="form-row ml-2">
      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-2">
        <button type="submit" class="btn btn-primary "><i class="fas fa-angle-double-up"></i> Submit</button>
      </div></div>
    </form>


    <!-- ============================End code for Add the task ============================== -->

    <!-- ============================Start code for listing of task ============================== -->

    <div class="table-responsive">
      <?php if(!empty($allmile)) {?>

       <div class="card-body ">
        <a href="#" class="btn btn-success   btn-block text-center "style="color: #fff;"><i class="fas fa-list-ol"></i> Assigned Milestone List</a>
      </div>
      <table class="table table-striped table-bordered first">
        <thead>
          <tr>
            <th>SL No</th>
            <th>Milstone Name</th>
            <th>Member Name</th>
            <th>Role</th>
            <th>Last Status</th>
            <th colspan="3">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i=1; foreach($allmile as $ro) { 
           $member=$getmember($ro->member_id);
           $addby=$getmember($ro->add_by);
           $role=$getrole($ro->member_role);
           $page="view";
           ?>
           <tr>

            <td> <?php echo $i; ?> </td>
            <td> <?php echo $ro->mile_name ?></td>
            <td> <?php echo $member[0]->name ?></td>
            <td> <?php echo $role[0]->role_name ?></td><?php  $tsk_status=$task_status($ro->mile_status); ?>
            <td ><?php  if($ro->member_role > $userlogin[0]->role_id || $ro->member_role == $userlogin[0]->role_id){?> <a href="" onclick="javascript:mile_status(<?php echo $ro->mile_id.','.$ro->project_id ?>)" data-toggle="modal" data-target="#modal-info"> <?php echo $tsk_status[0]->task_status_name; ?> </a><?php }else{ echo $tsk_status[0]->task_status_name;} ?></td>
            <?php if($ro->add_by==$admin[0]->admin_id){ ?>
              <td><a href="<?php echo site_url()?>Project/ProjectController/editmember_mile/<?php echo $ro->mile_id.'/'.$Project[0]->pr_id;  ?>"><i class="fas fa-pencil-alt"style="color: blue;"></i></a></td>
              <td><a href="<?php echo site_url()?>Project/ProjectController/delete_member_mile/<?php echo  $ro->mile_id.'/'.$Project[0]->pr_id;  ?>" onclick="return confirm('are you sure to delete')"><i class="fa fa-trash"style="color: red;"></i></a></td>
            <?php }else{ ?>
              <td>..</td>
              <td>..</td>
            <?php } ?>
            
            <td><a href="" onclick="javascript:miledetails(<?php echo $ro->mile_id.','.$Project[0]->pr_id; ?>)" data-toggle="modal" data-target="#modal-info"><i class="fa fa-eye"style="color: green;"></i></a></td>

          </tr>
          <?php $i++; } ?>
        </tbody>
      </table>
    <?php }else {?>
      <div class="alert alert-danger mt-3" role="alert">
       <strong>Sorry!!..No any Milstone found in this Project.</strong>
     </div>
   <?php } ?>
 <?php }else{ ?>
   <div class="alert alert-danger mt-3" role="alert">
     <strong>Sorry!!..No any Team member added in this Project.Please Add Team member first.</strong>
   </div>
 <?php } ?>
</div>

<!-- ============================End code for Listing the task ============================== -->
</div>
</div>

</div>


</section>
</div>


</body>


<!--Code start for print the data from database in popup box -->

<div class="modal modal-light   displaycontent" id="modal-info">

  <?php //include('adminviewpopup.php'); ?>
</div>
<script src="<?php echo base_url()  ?>Custom_JS/Task/Task_status.js" type="text/javascript"></script>
<script src="<?php echo base_url()  ?>Custom_JS/Project/list_project.js" type="text/javascript"></script>
<script type="text/javascript">
 var baseURL ='<?php echo base_url();  ?>'
</script>

<!--Code End for print the data from database in popup box -->


