<div class="dashboard-wrapper">
  <div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="page-header">
            <h2 class="pageheader-title">Import User Deatils</h2>
            
            <div class="page-breadcrumb">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="">User</a></li>
                  <li class="breadcrumb-item "><a href="">Import User Deatils</a></li>
                  
                </ol>
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
               <div class="col-md-4 pt-3"></div>
               <div class="col-md-4 pt-3 text-left">
               </div>
               <div class="col-md-4 pt-3 text-right">
                 <button class="btn btn-sm btn-primary"  onClick="return redirect('<?php echo site_url(); ?>Admin/User_Controller/manage_user');"><i class="fa fa-list" aria-hidden="true"></i> List User</button>
               </div>
             </div>
           </h5>
           <div class="card-body">
            <form  method="post" class="needs-validation" novalidate enctype="multipart/form-data" action="<?php echo site_url()?>Admin/User_Controller/import_user_details">

              <div class="row">

                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
                  <label for="validationCustom05">Uplaod Excel File :</label>
                  <input type="file" class="form-control" required="" accept=".xls, .xlsx" name="uploadFile">
                 <div class="valid-feedback">Looks good!</div>
                 <div class="invalid-feedback">Please fill valid excel file.</div>
                 
                </div>
                <div class="form-row pt-4"> 
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2 ml-3">
                   <button class="btn btn-primary" type="submit">Submit</button>
                 </div>
               </div>
             </form>
           </div>
         </div>
       </div>
     </div>
   </div>
 </div>
