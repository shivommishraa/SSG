 <div class="dashboard-wrapper">
  <div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="page-header">
            <h2 class="pageheader-title">Manage Inquiry</h2>
            <div class="page-breadcrumb">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="">Product</a></li>
                  <li class="breadcrumb-item "><a href="">Manage Inquiry</a></li>
                  
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
       <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
          <form  role="form" action="<?php echo site_url(); ?>Product/Tbl_productController/manage_inquiry" method="post">
           <div class="row col-md-12">
             <div class="col-md-3 card-header">
              <input type="text" name="name"  placeholder="Search By Name" class="form-control form-control ml-2"/></div>
              <div class="col-md-4 card-header">
                
                <input type="text" name="customer_email"  placeholder="Search By Email" class="form-control form-control"/>

              </div>

              <div class="col-md-3 card-header">
                <button type="submit" class="btn btn-sm btn-info" name="search" >Search</button>
                <button class="btn btn-sm btn-danger"  onClick="return redirect('<?php echo base_url();?>Product/Tbl_productController/manage_inquiry');">Reset</button>
              </div>

                                  <!--<div class="col-md-2 card-header text-right">
                                      <button class="btn btn-sm btn-primary"  onClick="return redirect('<?php //echo site_url(); ?>Product/Tbl_productController/addTbl_product');"><i class="fa fa-plus" aria-hidden="true"></i> Add New</button>
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
                                  <?php if(!empty($inquiry)) {?>
                                    <table class="table table-striped table-bordered first">
                                      <thead>
                                        <tr>
                                         <th>SL No</th>
                                         <th>Product Name</th>
                                         <th>Email</th>
                                         <th>Status</th>
                                         <th colspan="3">Actions</th>

                                       </tr>
                                     </thead>
                                     <tbody>
                                      <?php $i=1; foreach($inquiry as $inquirydata) { ?>
                                       <tr>
                                        <td> <?php echo $i; ?> </td>
                                        <td> <?php echo $inquirydata->customer_name ?></td>
                                        
                                        <td> <?php echo $inquirydata->customer_email ?></td> 


                                        <?php $status=$status_inq($inquirydata->inquiry_id); ?>
                                        <td><a href="" onclick="javascript:status_inquiry(<?php echo $inquirydata->inquiry_id ?>)" data-toggle="modal" data-target="#modal-info">
                                          <?php
                                          if($status){
                                            $status_n=$status_name($status[0]->status_id);
                                            $status_echo=$status_n[0]->status_names;
                                          }else{ $status_echo="Pending";}
                                          ?>
                                          <span class="label label-primary"><?php echo $status_echo; ?></span>
                                        </i></a></td>

                                        <td><a href="" onclick="javascript:product_Inquiryadmin(<?php echo $inquirydata->inquiry_id ?>)" data-toggle="modal" data-target="#modal-info"><i class="fa fa-eye"style="color: green;"></i></a></td>

                                        

                                        <!-- <td><a href="<?php //echo site_url()?>Product/Tbl_productController/edit_Inquiry/<?php //echo $inquirydata->inquiry_id?>"><i class="fas fa-pencil-alt"style="color: blue;"></i></a></td>-->

                                        <td><a href="<?php echo site_url()?>Product/Tbl_productController/deleteInquiry/<?php echo $inquirydata->inquiry_id?>" onclick="return confirm('are you sure to delete')"><i class="fa fa-trash"style="color: red;"></i></a></td>
                                      </tr>
                                      <?php $i++; } ?>
                                    </tbody>
                                  </table>
                                <?php } else {?>
                                  <div class="alert alert-info" role="alert">
                                   <strong>No Product Record Found!</strong>
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
                  <script src="<?php echo base_url()  ?>Custom_JS/Product_JS/product_inquiry.js" type="text/javascript"></script>
                  <script type="text/javascript">
                   var baseURL ='<?php echo base_url();  ?>'
                 </script>

                 <!--Code End for print the data from database in popup box -->
