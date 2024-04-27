 <div class="dashboard-wrapper">
  <div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="page-header">
            <h2 class="pageheader-title">All Meeting Comments</h2>
            <div class="page-breadcrumb">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="">Meeting</a></li>
                  <li class="breadcrumb-item "><a href="">All Meeting Comment</a>
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
          <form  role="form" action="<?php echo site_url(); ?>Meeting/Meeting_Controller/list_meeting_comment" method="post">
           <div class="row col-md-12">
         <!--     <div class="col-md-3 card-header">
          <input type="date" name="meeting_date" value="<?php if(!empty($meeting_date)){ echo $meeting_date;} ?>""  placeholder="Search By date" class="form-control form-control ml-2"/></div> -->


            <!--   <div class="col-md-3 card-header">
                <button type="submit" class="btn btn-sm btn-info" name="search" ><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                <button class="btn btn-sm btn-danger"   onClick="return redirect('<?php echo base_url();?>Meeting/Meeting_Controller/list_meeting_comment');"><i class="fa fa-refresh" aria-hidden="true"></i> Reset</button>
              </div> -->  <div class="col-md-10 card-header"></div>

              <div class="col-md-2 card-header">
               <button class="btn btn-sm btn-primary"  onClick="return redirect('<?php echo site_url(); ?>Meeting/Meeting_Controller/manage_meeting');"><i class="m-r-10 mdi mdi-arrow-up"></i>Manage Meeting</button>
             </div>



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
        <?php $allowed=0;if(!empty($allowed_meeting)){
         $str = $allowed_meeting[0]->setting_value;
         $value=explode(",",$str);
         foreach ($value as $key) {
          if($admin[0]->role_id==$key){ $allowed++; }}} ?>
          <?php if($allowed!=0) {?>
           <?php if(!empty($comment)) {?>
            <table class="table table-striped table-bordered first">
              <thead>
                <tr>

                 <th>SL No</th>
                 <th>Title</th>
                 <th>User</th>
                 <th>Role</th>
                 <th>Comment</th>
                 <th>Comment At</th>

               </tr>
             </thead>
             <tbody>
              <?php $i=1; foreach($comment as $ro) {
               $getuser=$finduser($ro->user_id);
               $getcomment=$findcomment($ro->meeting_id);
               $getrole=$findrole($ro->role_id);
               ?>
               <tr>
                <td> <?php echo $i; ?> </td>
                <td> <?php echo $getcomment[0]->meeting_title ?></td>
                <td> <?php echo $getuser[0]->name ?></td>
                <td> <?php echo $getrole[0]->role_name ?></td>
                <td> <?php echo $ro->comment ?></td>
                <td> <?php echo $ro->add_at ?></td>

            </tr>
            <?php $i++; } ?>
          </tbody>
        </table>
      <?php } else {?>
        <div class="alert alert-danger" role="alert">
         <strong>No Meeting Record Found!</strong>
       </div>
     <?php }}else{

      redirect('Admin/Role_Controller/error_page');}
      ?>

      <div class="dataTables_paginate paging_simple_numbers pt-2 "><?php echo $links; ?></div>
    </div>
  </div>
</div>

</div>
</div>
</div>
