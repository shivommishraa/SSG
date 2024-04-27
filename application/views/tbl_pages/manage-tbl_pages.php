 <div class="dashboard-wrapper">
  <div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="page-header">
            <h2 class="pageheader-title">Manage Pages</h2>
            <div class="page-breadcrumb">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="">Pages</a></li>
                  <li class="breadcrumb-item "><a href="">Manage Pages</a></li>
                  
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
       <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
          <form  role="form" action="<?php echo site_url(); ?>Pages/Tbl_pagesController/manageTbl_pages" method="post">
           <div class="row col-md-12">
            <div class="col-md-4 card-header">
              <input type="text" name="name"  placeholder="Search By Name" class="form-control form-control ml-2"/></div>
              <div class="col-md-3 card-header">
                <button type="submit" class="btn btn-sm btn-info" name="search" >Search</button>
                <button class="btn btn-sm btn-danger"  onClick="return redirect('<?php echo base_url();?>Pages/Tbl_pagesController/manageTbl_pages');">Reset</button>
              </div>
              <div class="col-md-3 card-header"> </div>
              <div class="col-md-2 card-header text-right">
                <button class="btn btn-sm btn-primary"  onClick="return redirect('<?php echo site_url(); ?>Pages/Tbl_pagesController/addTbl_pages');"><i class="fa fa-plus" aria-hidden="true"></i> Add New</button>
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
            <?php if(!empty($tbl_pagess)) {?>
              <table class="table table-striped table-bordered first">
                <thead>
                  <tr>
                    <th>SL No</th>
                    <th>route</th>
                    <th>Status</th>
                    <th colspan="3">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i=1; foreach($tbl_pagess as $tbl_pages) { ?>
                    <tr>
                      <td> <?php echo $i; ?> </td>
                      <td><?php echo $tbl_pages->route ?></td>
                      <td><span <?php if($tbl_pages->status==0){?> class="badge badge-success"<?php }else{ ?> class="badge badge-danger"<?php }?>>
                        <a style="color:#fff;" href="<?php echo site_url()?>Pages/Tbl_pagesController/changeStatusTbl_pages/<?php echo $tbl_pages->id ?>" > <?php if($tbl_pages->status==0){ echo "Activate"; } else { echo "Deactivate"; } ?></a></span></td>
                        <td><a href="<?php echo site_url()?>Pages/Tbl_pagesController/editTbl_pages/<?php echo $tbl_pages->id?>"><i class="fas fa-pencil-alt"style="color: blue;"></i></a></td>
                        <td><a href="" onclick="javascript:load_marks(<?php echo $tbl_pages->id ?>)" data-toggle="modal" data-target="#modal-info"><i class="fa fa-eye"style="color: green;"></i></a></td>  
                        
                        <td><a href="<?php echo site_url()?>Pages/Tbl_pagesController/deleteTbl_pages/<?php echo $tbl_pages->id?>" onclick="return confirm('Are you sure to delete')"><i class="fa fa-trash"style="color: red;"></i></a></td>
                        

                      </tr>
                      <?php $i++; } ?>
                    </tbody>
                  </table>
                <?php } else {?>
                  <div class="alert alert-info" role="alert">
                    <strong>No Pages Found!</strong>
                  </div>
                <?php } ?>
              </div>
              <div class="dataTables_paginate paging_simple_numbers pt-2 "><?php echo $links; ?></div>
            </div>

          </div>

        </body>
        </html>




        <!--Code start for print the data from database in popup box -->


        <div class="modal modal-light   displaycontent" id="modal-info">
          <?php //include('adminviewpopup.php'); ?>
        </div>
        <script src="<?php echo base_url()  ?>Custom_JS/Pages_JS/pages_js.js" type="text/javascript"></script>
        <script type="text/javascript">
         var baseURL ='<?php echo base_url();  ?>'
       </script>

       <!--Code End for print the data from database in popup box -->
