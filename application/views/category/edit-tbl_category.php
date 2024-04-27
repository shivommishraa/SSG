 <div class="dashboard-wrapper">
  <div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="page-header">
            <h2 class="pageheader-title">Update Category</h2>
            <div class="page-breadcrumb">
             <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="">Category</a></li>
                <li class="breadcrumb-item "><a href="">Update Category</a></li>
                
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
             <button class="btn btn-sm btn-primary"  onClick="return redirect('<?php echo site_url(); ?>Category/Category_Controller/ManageTbl_category');"><i class="fa fa-list" aria-hidden="true"></i> List Category</button>
           </div>
         </div>
       </h5>
       <div class="card-body">
        
        <form role="form" class="needs-validation" novalidate  method="post" action="<?php echo site_url()?>Category/Category_Controller/editTbl_categoryPost" enctype="multipart/form-data">
          <input type="hidden" value="<?php echo $tbl_Category[0]->category_id ?>"   name="category_id">

          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
              
             <label for="validationCustom01">Category Name:</label>
             <input type="text" id="validationCustom01" value="<?php echo $tbl_Category[0]->category_name ?>" required="Category Name" placeholder="Category Name" class="form-control" name="category_name">

             <div class="valid-feedback">
              Looks good!
            </div>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
           <label for="validationCustom02">Parent :</label>
           <select class="form-control" id="validationCustom02" name="parent_id">
             <option style="background: #82868a;color:#fff;"<?php if($tbl_Category[0]->parent_id==0){?>value="0"<?php }else{?>value="<?php echo $tbl_Category[0]->parent_id; ?>"<?php }?>><?php if( $tbl_Category[0]->parent_id==0){echo "Select Parent";}else{ $pname=$getparent($tbl_Category[0]->parent_id);
               if(!empty($pname)){ echo $pname[0]->category_name;}
             } ?></option>
             <?php if( $tbl_Category[0]->parent_id!=0){?> <option value="0">None</option><?php }?>
             <?php foreach($categorydropdown as $row): ?>
              <option value="<?php echo $row->category_id; ?>"><?php echo $row->category_name; ?></option>
            <?php endforeach; ?>
          </select>
          <div class="valid-feedback">
            Looks good!
          </div>
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
