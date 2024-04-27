 <div class="dashboard-wrapper">
  <div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="page-header">
            <h2 class="pageheader-title">Update Text Status</h2>
            <div class="page-breadcrumb">
             <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="">Text Status</a></li>
                <li class="breadcrumb-item "><a href="">Update Text Status</a></li>
                
              </ol>
            </nav>
          </nav>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
      <div class="card">
        <h5 class="card-header">
          <div class="row col-md-12 ">
           <div class="col-md-4"></div>
           <div class="col-md-4 "></div>
           <div class="col-md-4 text-right">
             <button class="btn btn-sm btn-primary"  onClick="return redirect('<?php echo site_url(); ?>Category/Category_Controller/ManageText_status');"><i class="fa fa-list" aria-hidden="true"></i> List Text Status</button>
           </div>
         </div>
       </h5>
       <div class="card-body">
        
        <form role="form" class="needs-validation" novalidate  method="post" action="<?php echo site_url()?>Category/Category_Controller/editTbl_statusPost" enctype="multipart/form-data">
          <input type="hidden" value="<?php echo $txt_st_data[0]->text_status_id ?>"   name="text_status_id">

          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
            <label for="validationCustom01">Text:</label>
            <textarea name="text_status" id="validationCustom01" required="" placeholder="Text Status" class="form-control" ><?php echo $txt_st_data[0]->text_status ?></textarea>
             <div class="valid-feedback">
              Looks good!
            </div>

          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
                    </div> <label for="validationCustom05">Status Category :</label>
           <select class="form-control" id="validationCustom05" required="" name="cate_id">
            <option value="">Select Category</option>
             <?php foreach($categorydropdown as $row): ?>
              <option value="<?php echo $row->cate_id; ?>" <?php if($row->cate_id==$txt_st_data[0]->cate_id){ echo "selected";}?>><?php echo $row->cate_name; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        



      </div>
      <div class="form-row">
        
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-2 pt-2">
          <button class="btn btn-primary" type="submit">Update</button>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
</div>
</div>
</div>
