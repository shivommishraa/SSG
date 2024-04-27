 <div class="dashboard-wrapper">
  <div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="page-header">
            <h2 class="pageheader-title">Manage Payment Terms</h2>
            <div class="page-breadcrumb">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="">Payment Terms</a></li>
                  <li class="breadcrumb-item "><a href="">Manage Payment Terms</a>
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
          <form  role="form" action="<?php echo site_url(); ?>Payment_Terms/Payment_Controller/manage_paymentterms" method="post">
           <div class="row col-md-12">
             <div class="col-md-3 card-header">
              <input type="text" name="trmc_name" value="<?php if(!empty($name)){ echo $name;} ?>"  placeholder="Search By Name" class="form-control form-control ml-2"/></div>
              

              <div class="col-md-3 card-header">
                <button type="submit" class="btn btn-sm btn-info" name="search" ><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                <button class="btn btn-sm btn-danger"   onClick="return redirect('<?php echo base_url();?>Payment_Terms/Payment_Controller/manage_paymentterms');"><i class="fa fa-refresh" aria-hidden="true"></i> Reset</button>
              </div>
              <div class="col-md-4 card-header"></div>
              <div class="col-md-2 card-header text-right">
                <button class="btn btn-sm btn-primary"  onClick="return redirect('<?php echo site_url(); ?>Payment_Terms/Payment_Controller/addpaymentterms');"><i class="fa fa-plus" aria-hidden="true"></i> Add New</button>
              </div>
              
              
            </div>
          </form>
          <?php if($this->session->flashdata('success')){ ?>
           <div class="alert alert-success">
            <strong><span class="glyphicon glyphicon-ok"></span>   <?php echo $this->session->flashdata('success'); ?></strong>
            <button type="button"  onClick="return redirect('<?php echo base_url();?>Payment_Terms/Payment_Controller/manage_paymentterms');"class="close" data-dismiss="modal" aria-label="Close">  
             <span aria-hidden="true">&times;</span></button>
           </div>
         <?php } ?>
         <div class="card-body">
          <div class="table-responsive">
            <?php if(!empty($role)) {?>
              <table class="table table-striped table-bordered first">
                <thead>
                  <tr>
                   <th>SL No</th>
                   <th>Term Name</th>
                   <th>Term Condition</th>
                   <th>Status</th>
                   <th colspan="2">Actions</th>

                 </tr>
               </thead>
               <tbody>
                <?php $i=1; foreach($role as $ro) { ?>
                 <tr>
                  <td> <?php echo $i; ?> </td>
                  <td> <?php echo $ro->term_con_name  ?></td>
                  <td> <?php echo $ro->term_condition    ?></td>
                  
                  
                  <!--   Payment_Terms/Payment_Controller/manage_paymentterms -->

                  <td><span <?php if($ro->term_con_status ==0){?> class="badge badge-success"<?php }else{ ?> class="badge badge-danger"<?php }?>>
                    <a style="color:#fff;" href="<?php echo site_url()?>Payment_Terms/Payment_Controller/changeStatusTbl_edit/<?php echo $ro->term_con_id ?>" > <?php if($ro->term_con_status ==0){ echo "Activate"; } else { echo "Deactivate"; } ?></a></span></td>
                    
                    <!--  <td><a href="" onclick="javascript:load_role(<?php echo $ro->term_con_id ?>)" data-toggle="modal" data-target="#modal-info"><i class="fa fa-eye"style="color: green;"></i></a></td> -->

                    <td><a href="<?php echo site_url()?>Payment_Terms/Payment_Controller/editTbl_payment/<?php echo $ro->term_con_id?>"><i class="fas fa-pencil-alt"style="color: blue;"></i></a></td>

                    <td><a href="<?php echo site_url()?>Payment_Terms/Payment_Controller/deleteTbl_paymentcon/<?php echo $ro->term_con_id?>" onclick="return confirm('are you sure to delete')"><i class="fa fa-trash"style="color: red;"></i></a></td>
                  </tr>
                  <?php $i++; } ?>
                </tbody>
              </table>
            <?php } else {?>
              <div class="alert alert-info" role="alert">
               <strong>No Payment Terms Record Found!</strong>
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
<script src="<?php echo base_url()  ?>Custom_JS/Role/role_js.js" type="text/javascript"></script>
<script type="text/javascript">
 var baseURL ='<?php echo base_url();  ?>'
</script>

<!--Code End for print the data from database in popup box -->
