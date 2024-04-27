 <div class="dashboard-wrapper">
  <div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="page-header">
            <h2 class="pageheader-title">My Meetings</h2>
            <div class="page-breadcrumb">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="">User</a></li>
                  <li class="breadcrumb-item "><a href="">User Meeting</a>
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
          <form  role="form" action="<?php echo site_url(); ?>Admin/User_Controller/user_meeting" method="post">
           <div class="row col-md-12">
             <div class="col-md-3 card-header">
              <input type="date" name="meeting_date" value="<?php if(!empty($meeting_date)){ echo $meeting_date;} ?>""  placeholder="Search By date" class="form-control form-control ml-2"/></div>
              

              <div class="col-md-3 card-header">
                <button type="submit" class="btn btn-sm btn-info" name="search" ><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                <button class="btn btn-sm btn-danger"   onClick="return redirect('<?php echo base_url();?>Admin/User_Controller/user_meeting');"><i class="fa fa-refresh" aria-hidden="true"></i> Reset</button>
              </div>
              <div class="col-md-4 card-header"></div>
              
              
              
            </div>
          </form>
          <?php if($this->session->flashdata('success')){ $uurl=$_SERVER["PHP_SELF"]; ?>
          <div class="alert alert-success">
            <strong><span class="glyphicon glyphicon-ok"></span>   <?php echo $this->session->flashdata('success'); ?></strong>
            <button type="button"  onClick="return redirect('<?php echo  $uurl; ?>');"class="close" data-dismiss="modal" aria-label="Close">  
             <span aria-hidden="true">&times;</span></button>
           </div>
         <?php } ?>
         <?php if($this->session->flashdata('delete')){ $uurl=$_SERVER["PHP_SELF"]; echo $uurl;?>
         <div class="alert alert-danger">
          <strong><span class="glyphicon glyphicon-ok"></span>   <?php echo $this->session->flashdata('delete'); ?></strong>
          <button type="button"  onClick="return redirect('<?php echo $uurl; ?>');"class="close" data-dismiss="modal" aria-label="Close">  
           <span aria-hidden="true">&times;</span></button>
         </div>                                     
       <?php } ?>
       <div class="card-body">
        <div class="table-responsive">
          <?php if(!empty($meeting)) {?>
            <table class="table table-striped table-bordered first text-center">
              <thead>
                <tr>

                 <th>SL No</th>
                 <th>Title</th>
                 <th>Date</th>
                 <th>Time</th>
                 <th>Role</th>
                 <th>Campaign</th>
                 <th>Action</th>
                 

               </tr>
             </thead>
             <tbody>
              <?php $found=0; $i=1; foreach($meeting as $ro) { 
               $arr = explode(",", $ro->role_id);
               foreach ($arr as $key) {
                 if($key==$admin[0]->role_id){ $found++;
                   ?>
                   <tr>
                    <td> <?php echo $i++; ?> </td>
                    <td> <?php echo $ro->meeting_title; ?> </td>
                    <td> <?php echo $ro->meeting_date ?></td>
                    <td> <?php echo $ro->meeting_time ?></td>
                    <td> <?php 
                    $arr = explode(",", $ro->role_id);
                    foreach ($arr as $key) {
                      $roleget=$findrole($key);?>
                      <?php  if($key==$admin[0]->role_id){ echo $roleget[0]->role_name;}?> 
                      <?php  } ?> </td>
                      <td>   <?php 
                      $arr = explode(",", $ro->camp_id);
                      foreach ($arr as $key) {
                        $camget=$findcomp($key);?>
                        <?php echo $camget[0]->compaign_name .'<br/>';?> 
                      <?php  }

                      ?> </td>
                      <td><a href="" onclick="javascript:meeting_comment(<?php echo $ro->meeting_id.','.$admin[0]->admin_id.','.$admin[0]->role_id ?>)" data-toggle="modal" data-target="#modal-info"><i class=" fas fa-comment"style="color: green;"></i></a></td>

                    </tr>
                  <?php }} } ?>
                </tbody>
              </table>
            <?php } else {?>
              <div class="alert alert-danger" role="alert">
               <strong>No Meeting Record Found!</strong>
             </div>
           <?php } ?>
           <?php if($found==0){ ?>
            <div class="alert alert-danger" role="alert">
             <strong>No Meeting Record Found!</strong>
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
<script src="<?php echo base_url()  ?>Custom_JS/Meeting/meeting.js" type="text/javascript"></script>
<script type="text/javascript">
 var baseURL ='<?php echo base_url();  ?>'
</script>

<!--Code End for print the data from database in popup box -->
