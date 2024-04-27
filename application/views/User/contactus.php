 <div class="dashboard-wrapper">
  <div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="page-header">
            <h2 class="pageheader-title">Manage Contact Us</h2>
            <div class="page-breadcrumb">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="">User</a></li>
                  <li class="breadcrumb-item "><a href="">Manage Contact Us</a></li>
                  
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
       <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
          <form  role="form" action="<?php echo site_url(); ?>Admin/User_Controller/managecontactus" method="post">
           <div class="row col-md-12">
             <div class="col-md-3 card-header">
              <input type="date" name="name" value="<?php if(!empty($selectdate)){ echo $selectdate;} ?>"  placeholder="Search By Date" class="form-control form-control ml-2"/></div>
              

              <div class="col-md-3 card-header">
                <button type="submit" class="btn btn-sm btn-info" name="search" >Search</button>
                <button class="btn btn-sm btn-danger"  onClick="return redirect('<?php echo base_url();?>Admin/User_Controller/managecontactus');">Reset</button>
              </div>
              <div class="col-md-4 card-header text-right"></div>
             <!--  <div class="col-md-2 card-header text-right">
                <button class="btn btn-sm btn-primary"  onClick="return redirect('<?php //echo site_url(); ?>Admin/User_Controller/add_user');"><i class="fa fa-plus" aria-hidden="true"></i> Add New</button>
              </div> -->
              
              
            </div>
          </form>
          <?php if($this->session->flashdata('success')){ ?>
           <div class="alert alert-success">
            <strong><span class="glyphicon glyphicon-ok"></span>   <?php echo $this->session->flashdata('success'); ?></strong>
          </div>
        <?php } ?>
        <?php if($this->session->flashdata('Deleted')){ ?>
         <div class="alert alert-danger">
          <strong><span class="glyphicon glyphicon-ok"></span>   <?php echo $this->session->flashdata('Deleted'); ?></strong>
        </div>
      <?php } ?>
      <div class="card-body">
        <div class="table-responsive">
          <?php if(!empty($contactus)) {?>
            <table class="table table-striped table-bordered first">
              <thead>
                <tr>
                 <th>SL No</th>
                 <th>Name</th>
                 <th>Email Id</th>
                 <th>Mobile Number</th>
                 <th>Message</th>
                 <th>Send At</th>
                 <th>Action</th>
                 <!-- <th>Status</th>
                 <th colspan="5">Actions</th> -->

               </tr>
             </thead>
             <tbody>
              <?php $i=1; foreach($contactus as $ro) { ?>
               <tr>
                <td> <?php echo $i; ?> </td>
                <td> <?php echo $ro->name ?></td>
                <td><?php echo $ro->email?></td>
                <td><?php echo $ro->mobile?></td>
                <td><?php echo $ro->message?></td>
                <td><?php echo date('d-m-Y h:i:s',strtotime($ro->send_at));?></td>
                
                <!-- <td> --><!-- <span <?php //if($ro->status==0){?> class="badge badge-success"<?php //}else{ ?> class="badge badge-danger"<?php //}?>> -->
                  <a style="color:#fff;" href="<?php //echo site_url()?>Admin/User_Controller/changeStatusTbl_user/<?php //echo $ro->admin_id ?>" > <?php //if($ro->status==0){ echo "Activate"; } else { echo "Deactivate"; } ?></a></span><!-- </td> -->
                  <!-- 
                  <td><a href="" onclick="javascript:adminviewdata(<?php //echo $ro->admin_id ?>)" data-toggle="modal" data-target="#modal-info"><i class="fa fa-eye"style="color: green;"></i></a></td> -->

                 <!--  <td><a href="<?php //echo site_url()?>Admin/User_Controller/editTbl_user/<?php //echo $ro->admin_id?>"><i class="fas fa-pencil-alt"style="color: blue;"></i></a></td>-->
                  <td><a href="<?php echo site_url()?>Admin/User_Controller/deleteTbl_cus/<?php echo $ro->contact_id?>" onclick="return confirm('are you sure to delete')"><i class="fa fa-trash"style="color: red;"></i></a></td> 



                  
                </tr>
                <?php $i++; } ?>
              </tbody>
            </table>
          <?php } else {?>
            <div class="alert alert-info" role="alert">
             <strong>No Record Found!</strong>
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
<script src="<?php echo base_url();  ?>Custom_JS/User/user.js" type="text/javascript"></script>
<script type="text/javascript">
 var baseURL ='<?php echo base_url();  ?>'
</script>

<!--Code End for print the data from database in popup box -->
