<?php if(isset($message))
{
 ?>
 <script>
   alert('<?php  echo $message ?>');
 </script>
 <?php 
}
?>

<div class="dashboard-wrapper">
  <div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="page-header">
            <h2 class="pageheader-title">Assign Project</h2>

            <div class="page-breadcrumb">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="">Project</a></li>
                  <li class="breadcrumb-item "><a href="">Assign Project</a></li>

                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
       <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
          <form  role="form" action="<?php echo site_url(); ?>Project/ProjectController/Agent_Project" method="post">
           <div class="row col-md-12 mt-3">
            <div class="col-md-4 form-group">
              <div class="input-group " >
                <input type="text" class="form-control "placeholder="Agent Name"  name="admin_id" data-target="#datetimepicker7" />
              </div>
            </div>
            
            <div class="col-md-4 ">
              <button type="submit" class="btn btn-sm btn-info from" name="search" ><i class="fa fa-search" aria-hidden="true"></i> Search</button>
              <button class="btn btn-sm btn-danger"   onClick="return redirect('<?php echo base_url();?>Project/ProjectController/Agent_Project');"><i class="fas fa-redo"></i> Reset</button>
              <!--  <button  class="btn btn-sm btn-primary from "  onClick="return redirect('<?php echo base_url();?>Project/ProjectController/');"><i class="fa fa-plus" aria-hidden="true"> </i> Add Project</button> -->
            </div>
            <div class="col-md-4 form-group">
              <div class="input-group " >
                <input type="hidden" class="form-control "placeholder="Work Type" name="pr_worktype"  />
              </div>
            </div>
            
            
            
          </div>

        </form>
        <?php if($this->session->flashdata('success')){ ?>
         <div class="alert alert-success mt-2">
          <strong><span class="glyphicon glyphicon-ok"></span>   <?php echo $this->session->flashdata('success'); ?></strong>
        </div>
      <?php } ?>
      <div class="card-body">
       <div class="table-responsive">
        <?php if(!empty($Project)) {?> 
          <table class="table table-striped table-bordered first">
            <thead>
              <tr>
               <th>S.No</th>

               <th>Agent Name</th>
               <th>Email Id</th>
               <th>Project Assign</th>
             </tr>
           </thead>
           <tbody>
            <?php  if(count($Project)){ 
              $i=1; foreach($Project as $agent) { 

                ?>
                <tr>
                  <td> <?php echo $i; ?> </td>
                  <td> <?php echo $agent->name ?></a></td>
                  <td> <?php echo $agent->email_id ?></a></td>
                  <td> <button class="btn btn-primary"><a href="" onclick="javascript:assign_project(<?php echo $agent->admin_id ?>)" data-toggle="modal" data-target="#modal-info" style="color: #fff;">Project</button></td>
                    



     <!--   <td>
        <div class="btn-group">
          <button class="btn btn-mini btn-success "><i class="fa fa-cog" style="font-size:14px"></i></button>
          <button class="btn btn-mini btn-success dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
          <ul class="dropdown-menu">
            <li><a href="<?php echo base_url()?>Project/ProjectController/editprdetails/<?php// echo $projects->pr_id?>">Edit</a></li>
            <li><a href=""  onclick="javascript:projectdetails(<?php //echo $projects->pr_id ?>)" data-toggle="modal" data-target="#modal-info""  >View</a></li>
            <li><a href="<?php echo base_url()?>Project/ProjectController/deletelistdata/<?php //echo $projects->pr_id?>"onclick="return confirm('are you sure to delete')">Delete</a></li>
            </ul>
            </div>
          </td> -->
        </tr>
      </tr>
      <?php $i++; } ?>
    <?php }} else {?>
      <div class="alert alert-info" role="alert">
        <strong>Sorry No Data Found!</strong>
      </div>
    <?php } ?>

  </tbody>
</table>
</div>
<div class="dataTables_paginate paging_simple_numbers pt-2 " id="DataTables_Table_0_paginate"><?php echo $links; ?></div>

</section>
</div>


</body>


<!--Code start for print the data from database in popup box -->

<div class="modal modal-light   displaycontent" id="modal-info">

  <?php //include('adminviewpopup.php'); ?>
</div>
<script src="<?php echo base_url()  ?>Custom_JS/Project/project_assign.js" type="text/javascript"></script>
<script type="text/javascript">
 var baseURL ='<?php echo base_url();  ?>'
</script>

<!--Code End for print the data from database in popup box -->


