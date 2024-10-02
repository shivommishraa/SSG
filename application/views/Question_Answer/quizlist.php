 <div class="dashboard-wrapper">
  <div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="page-header">
            <h2 class="pageheader-title">Manage Quiz</h2>
            <div class="page-breadcrumb">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="">Question Answer</a></li>
                  <li class="breadcrumb-item "><a href="">Manage Quiz</a></li>
                  
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
       <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
          <form  role="form" action="<?php echo site_url(); ?>Questionanswer/Qacontroller/ManageQuiz" method="post">
           <div class="row col-md-12">
             <div class="col-md-3 card-header"> 
             	 <select name="result" class="form-control form-control ml-2">
             	 	<option value="">Select Result</option>
             	 	<option value="1">Pass</option>
             	 	<option value="2">Fail</option>
             	 </select>
             </div>
             <div class="col-md-4 card-header">
              <input type="text" name="name"  placeholder="Search By Name" class="form-control form-control ml-2"/></div>
              <div class="col-md-3 card-header">
                <button type="submit" class="btn btn-sm btn-info" name="search" >Search</button>
                <button class="btn btn-sm btn-danger"  onClick="return redirect('<?php echo base_url(); ?>Questionanswer/Qacontroller/ManageQuiz');">Reset</button>
              </div>

              <!-- <div class="col-md-2 card-header text-right">
                <button class="btn btn-sm btn-primary"  onClick="return redirect('<?php //echo site_url(); ?>Questionanswer/Qacontroller/addQa');"><i class="fa fa-plus" aria-hidden="true"></i> Add New</button>
              </div> -->
              
              
            </div>
          </form>
          <?php if ($this->session->flashdata("success")) { ?>
           <div class="alert alert-success">
            <strong><span class="glyphicon glyphicon-ok"></span>   <?php echo $this->session->flashdata(
                "success"
            ); ?></strong>
          </div>
        <?php } ?>

        <div class="card-body">
          <div class="table-responsive">
           <?php if (!empty($allData)) { ?>
            <table class="table table-striped table-bordered first">
              <thead>
                <tr>
                 <th>SL No</th>
                 <th>Name</th>
                 <th>Mobile</th>
                 <th>Result</th>
                 <th>Date</th>
                 <th colspan="1">Actions</th>

               </tr>
             </thead>
             <tbody>
              <?php
              $i = 1;
              foreach ($allData as $qa_data) { ?>
               <tr>
                <td> <?php echo $i; ?> </td>
                <td>  <?php echo $qa_data->name; ?> </td>
                <td>  <?php echo $qa_data->mobile; ?> </td>
                <td><span <?php if (
                   $qa_data->result == 2
               ) { ?> class="badge badge-danger"<?php } else { ?> class="badge badge-success"<?php } ?>>
                <a style="color:#fff;" href="#" > 
                    <?php if (
                          $qa_data->result == 2
                      ) {
                          echo "Fail";
                      } else {
                          echo "Pass";
                      } ?></a></span></td>
                <td>  <?php echo $qa_data->updated_at; ?> </td>
                 <td><span <?php if (
                   $qa_data->status == 0
               ) { ?> class="badge badge-success"<?php } else { ?> class="badge badge-danger"<?php } ?>>
                <a style="color:#fff;" href="<?php echo site_url(); ?>Questionanswer/Qacontroller/changeStatusQuiz/<?php echo $qa_data->id; ?>" > 
                    <?php if (
                          $qa_data->status == 0
                      ) {
                          echo "Enable";
                      } else {
                          echo "Disable";
                      } ?></a></span></td>
              </tr>
              <?php $i++;}
              ?>
            </tbody>
          </table>
        <?php } else { ?>
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
  <?php
//include('adminviewpopup.php');
?>
</div>
<script src="<?php echo base_url(); ?>Custom_JS/Product_JS/product.js" type="text/javascript"></script>
<script type="text/javascript">
 var baseURL ='<?php echo base_url(); ?>'
</script>

<!--Code End for print the data from database in popup box -->
