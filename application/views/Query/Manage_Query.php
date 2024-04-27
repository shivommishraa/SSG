  <style>
  
  ul li {     
    list-style:none;           
  }
  ul li img {
    cursor: pointer;
  }  
</style>

<div class="dashboard-wrapper">
  <div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="page-header">
            <h2 class="pageheader-title">Manage Query</h2>
            <div class="page-breadcrumb">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="">Query</a></li>
                  <li class="breadcrumb-item "><a href="">Manage Query</a></li>
                  
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
       <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
          <form  role="form" action="<?php echo site_url(); ?>Query/Query/manageQuery" method="post">
           <div class="row col-md-12">
            
             <div class="col-md-4 card-header">
              <input type="text" name="brand_name"  placeholder="Search By Name" class="form-control form-control ml-2"/></div>
              

              <div class="col-md-3 card-header">
                <button type="submit" class="btn btn-sm btn-info" name="search" >Search</button>
                <button class="btn btn-sm btn-danger"  onClick="return redirect('<?php echo base_url();?>Query/Query/manageQuery');">Reset</button>
              </div>
              <div class="col-md-3 card-header"></div>
                                 <!-- <div class="col-md-2 card-header text-right">
                                      <button class="btn btn-sm btn-primary"  onClick="return redirect('<?php //echo site_url(); ?>Brand/Tbl_brandController/addTbl_brand');"><i class="fa fa-plus" aria-hidden="true"></i> Add New</button>
                                    </div>-->
                                    
                                    
                                  </div>
                                </form>
                                <?php if($this->session->flashdata('success')){ ?>
                                 <div class="alert alert-success">
                                  <strong><span class="glyphicon glyphicon-ok"></span>   <?php echo $this->session->flashdata('success'); ?></strong>
                                </div>
                              <?php } ?>


                              <div class="card-body">
                                <div class="table-responsive">
                                  <?php if(!empty($Query)) {?>
                                    <table class="table table-striped table-bordered first">
                                      <thead>
                                        <tr>
                                         <th>SL No</th>
                                         <th>Name</th>
                                         <th>Subject</th>
                                         <th>Status</th>
                                         <th colspan="2">Actions</th>
                                       </tr>
                                     </thead>
                                     <tbody>
                                      <?php $i=1; foreach($Query as $qu) { ?>
                                       <tr>
                                        <td> <?php echo $i; ?> </td>
                                        <td> <?php echo $qu->name ?> </a> </td>
                                        <td>  <?php echo $qu->subject ?>  </td>

                                   <!--   <td><span <?php if($qu->status==0){?> class="badge badge-danger"<?php }else{ ?> class="badge badge-success"<?php }?>>
                                    <a style="color:#fff;" href="<?php echo site_url()?>Query/Query/changeStatusQuery/<?php echo $qu->contact_id ?>"  > <?php if($qu->status==0){ echo "Pending"; } else { echo "Viewed"; } ?></a></span></td>-->
                                    
                                    <?php $status=$status_inq($qu->contact_id); ?>
                                    <td><a href="" onclick="javascript:status_inquiry(<?php echo $qu->contact_id ?>)" data-toggle="modal" data-target="#modal-info">
                                      <?php
                                      if($status){
                                        $status_n=$status_name($status[0]->status_id);
                                        $status_echo=$status_n[0]->status_names;
                                      }else{ $status_echo="Pending";}
                                      ?>
                                      <span class="label label-primary"><?php echo $status_echo; ?></span>
                                    </i></a></td>

                                    <!--<td><a href="<?php //echo site_url()?>Query/Query/editQuery/<?php $qu->contact_id?>"><i class="fas fa-pencil-alt"style="color: blue;"></i></a></td>-->
                                    
                                    <td><a href="" onclick="javascript:load_marks(<?php echo $qu->contact_id ?>)" data-toggle="modal" data-target="#modal-info"><i class="fa fa-eye"style="color: green;"></i></a></td>

                                    <td><a href="<?php echo site_url()?>Query/Query/deleteQuery/<?php echo $qu->contact_id?>" onclick="return confirm('are you sure to delete')"><i class="fa fa-trash"style="color: red;"></i></a></td>

                                  </tr>
                                  <?php $i++; } ?>
                                </tbody>
                              </table>
                            <?php } else {?>
                              <div class="alert alert-info" role="alert">
                               <strong>No Query Record Found!</strong>
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
              <script src="<?php echo base_url()  ?>Custom_JS/Query_JS/query.js" type="text/javascript"></script>
              <script type="text/javascript">
               var baseURL ='<?php echo base_url();  ?>'
             </script>

             <!--Code End for print the data from database in popup box -->
             