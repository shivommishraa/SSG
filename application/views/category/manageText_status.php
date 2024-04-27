 <div class="dashboard-wrapper">
  <div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="page-header">
            <h2 class="pageheader-title">Manage Text Status</h2>
            <div class="page-breadcrumb">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="">Category</a></li>
                  <li class="breadcrumb-item "><a href="">Manage Text Status</a></li>
                  
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
       <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
          <form  role="form" action="<?php echo site_url(); ?>Category/Category_Controller/ManageText_status" method="post">
           <div class="row col-md-12">
             <div class="col-md-4 card-header">
              	<select class="form-control form-control ml-2"name="cate_id">
	                <option value="">Select Category</option>
	                    <?php foreach($categorydropdown as $row): ?>
	                        <option value="<?php echo $row->cate_id; ?>" ><?php echo $row->cate_name; ?></option>
	                <?php endforeach; ?>
	            </select>
	           </div>
              <div class="col-md-3 card-header">
                <button type="submit" class="btn btn-sm btn-info" name="search" >Search</button>
                <button class="btn btn-sm btn-danger"  onClick="return redirect('<?php echo base_url();?>Category/Category_Controller/ManageText_status');">Reset</button>
              </div>

             <div class="col-md-3 card-header"> </div>
              <div class="col-md-2 card-header text-right">
                <button class="btn btn-sm btn-primary"  onClick="return redirect('<?php echo site_url(); ?>Category/Category_Controller/addText_status');"><i class="fa fa-plus" aria-hidden="true"></i> Add New</button>
              </div>
              
              
            </div>
          </form>
          <?php if($this->session->flashdata('success')){ ?>
           <div class="alert alert-success">
            <strong><span class="glyphicon glyphicon-ok"></span>   <?php echo $this->session->flashdata('success'); ?></strong>
          </div>
        <?php } ?>

        <div class="card-body">
          <div class="table-responsive">
           <?php if(!empty($textStatus_data)) {?>
            <table class="table table-striped table-bordered first">
              <thead>
                <tr>
                 <th>SL No</th>
                 <th>Text Category</th>
                 <th>Text</th>
                 <th>Status</th>
                 <th colspan="2">Actions</th>

               </tr>
             </thead>
             <tbody>
              <?php $i=1; foreach($textStatus_data as $data) { ?>
               <tr>
                <td> <?php echo $i; ?> </td>
                <td><?php foreach($categorydropdown as $row){ 
                		if($row->cate_id==$data->cate_id){ echo $row->cate_name; }}
                	?>	
                </td>
                <td>  <?php echo $data->text_status ?> </td>
               <td><span <?php if($data->status_status==0){?> class="badge badge-danger"<?php }else{ ?> class="badge badge-success"<?php }?>>
                <a style="color:#fff;" href="<?php echo site_url()?>Category/Category_Controller/changeStatusText_status/<?php echo $data->text_status_id ?>" > <?php if($data->status_status==1){ echo "Activate"; } else { echo "Deactivate"; } ?></a></span></td>
                <td><a href="<?php echo site_url()?>Category/Category_Controller/editText_status/<?php echo $data->text_status_id?>"><i class="fas fa-pencil-alt"style="color: blue;"></i></a></td>
                <td><a href="<?php echo site_url()?>Category/Category_Controller/textdeleteTbl_status/<?php echo $data->text_status_id?>" onclick="return confirm('Are you sure to delete.')"><i class="fa fa-trash"style="color: red;"></i></a></td>
              </tr>
              <?php $i++; } ?>
            </tbody>
          </table>
        <?php } else {?>
          <div class="alert alert-info" role="alert">
           <strong>No Text Status Record Found!</strong>
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
<script src="<?php echo base_url()  ?>Custom_JS/Product_JS/product.js" type="text/javascript"></script>
<script type="text/javascript">
 var baseURL ='<?php echo base_url();  ?>'
</script>

<!--Code End for print the data from database in popup box -->
