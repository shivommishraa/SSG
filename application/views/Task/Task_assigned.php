 <div class="dashboard-wrapper">
  <div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="page-header">
            <h2 class="pageheader-title">Assigned Task</h2>
            <div class="page-breadcrumb">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="">User</a></li>
                  <li class="breadcrumb-item "><a href="">Assigned Task</a>
                  </li>
                  
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
       <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
          <form  role="form" action="<?php echo site_url(); ?>Task/Task_Controller/assigned_task" method="post">
            <div class=" mb-2 col-md-12 pl-4 bg-secondary text-white">Total Assigned Task</div>
            <div class="row col-md-12">

            <!-- <div class="col-md-3 card-header">
              <input type="text" name="role_name"  placeholder="Search By Name" class="form-control form-control ml-2"/></div>
              

              <div class="col-md-3 card-header">
                <button type="submit" class="btn btn-sm btn-info" name="search" ><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                <button class="btn btn-sm btn-danger"   onClick="return redirect('<?php echo base_url();?>Task/Task_Controller/assigned_task');"><i class="fa fa-refresh" aria-hidden="true"></i> Reset</button>
              </div>
              <div class="col-md-4 card-header"></div> -->
              <!-- <div class="col-md-2 card-header text-right">
                <button class="btn btn-sm btn-primary"  onClick="return redirect('<?php //echo site_url(); ?>Admin/Role_Controller/addrole');"><i class="fa fa-plus" aria-hidden="true"></i> Add New</button>
              </div> -->
              
              
            </div>
          </form>
          <?php if($this->session->flashdata('success')){ ?>
           <div class="alert alert-success">
            <strong><span class="glyphicon glyphicon-ok"></span>   <?php echo $this->session->flashdata('success'); ?></strong>
          </div>
        <?php } ?>
        <div class="card-body">
          <div class="table-responsive">
            <?php if(!empty($assigned_task)) {?>
              <table class="table table-striped table-bordered first">
                <thead>
                  <tr>

                   <th width="30px">SL No</th>
                   <th>Task Name</th>
                   <th>Project Name</th>
                   <th>Added By</th>
                   <th width="450px">Description</th>
                   <th colspan="1"width="50px">Status</th>

                 </tr>
               </thead>
               <tbody>
                <?php $i=1; foreach($assigned_task as $ro) {
                  $add_by=$findadd_by($ro->add_by);
                  $status=$task_status($ro->task_status);
                  $project=$find_project($ro->project_id);
                  ?>
                  <tr>

                    <td width="30px"> <?php echo $i; ?> </td>
                    <td> <?php echo $ro->task_name ?></td>
                    <td> <?php echo $project[0]->pr_title ?></td>
                    <td> <?php echo $add_by[0]->name ?></td>
                    <td width="450px"> <?php echo $ro->desciption ?></td>
                    

                    <td><a href="" onclick="javascript:task_status(<?php echo $ro->task_id.','.$ro->project_id ?>)" data-toggle="modal" data-target="#modal-info"<?php if($status[0]->task_status_id=="1"){ ?>class="badge badge-success"<?php }else{ ?>class="badge badge-danger"<?php } ?>><?php echo $status[0]->task_status_name;?></a></td>

                  </tr>
                  <?php $i++; } ?>
                </tbody>
              </table>
            <?php } else {?>
              <div class="alert alert-danger" role="alert">
               <strong>Sorry No Task Assigned!!</strong>
             </div>
           <?php } ?>

           <div class="dataTables_paginate paging_simple_numbers pt-2 "><?php echo $links; ?></div>
         </div>
       </div>
     </div>

   </div>
 </div>
</div>


<!--Code start for print the data from database in popup box -->


<div class="modal modal-light   displaycontent" id="modal-info">
  <?php //include('adminviewpopup.php'); ?>
</div>
<script src="<?php echo base_url()  ?>Custom_JS/Task/Task_status.js" type="text/javascript"></script>
<script type="text/javascript">
 var baseURL ='<?php echo base_url();  ?>'
</script>

<!--Code End for print the data from database in popup box -->
