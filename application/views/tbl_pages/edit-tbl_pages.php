 <div class="dashboard-wrapper">
  <div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="page-header">
            <h2 class="pageheader-title">Update Page</h2>
            <div class="page-breadcrumb">
             <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="">Pages</a></li>
                <li class="breadcrumb-item "><a href="">Update Page</a></li>
                
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
             <button class="btn btn-sm btn-primary"  onClick="return redirect('<?php echo site_url(); ?>Pages/Tbl_pagesController/manageTbl_pages');"><i class="fa fa-list" aria-hidden="true"></i> List Pages</button>
           </div>
         </div>
       </h5>
       <div class="card-body">
        
        <form role="form" class="needs-validation" novalidate  method="post" action="<?php echo site_url()?>Pages/Tbl_pagesController/editTbl_pagesPost" enctype="multipart/form-data">
          <input type="hidden" value="<?php echo $tbl_pages[0]->id ?>"   name="tbl_pages_id">


          <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
              
             <label for="validationCustom01"> Route :</label>
             <input type="text" id="validationCustom01" value="<?php echo $tbl_pages[0]->route ?>" required="Category Name" placeholder="Route Name" class="form-control" name="route">

             <div class="valid-feedback">
              Looks good!
            </div>
          </div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-2">
            
           <label for="validationCustom01"> Content :</label>
           
           <textarea id="validationCustom01"  required="Category Name" placeholder="Route Name" class="form-control" name="content"><?php echo $tbl_pages[0]->content ?></textarea>
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
