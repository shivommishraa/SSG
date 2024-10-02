 <div class="dashboard-wrapper">
  <div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="page-header">
            <h2 class="pageheader-title">Update Question Answer</h2>
            <div class="page-breadcrumb">
             <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Questionanswer/Qacontroller/ManageQuestionanswer">Question Answer</a></li>
                <li class="breadcrumb-item "><a href="">Update Question Answer</a></li>
                
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
             <button class="btn btn-sm btn-primary"  onClick="return redirect('<?php echo site_url(); ?>Questionanswer/Qacontroller/ManageQuestionanswer');"><i class="fa fa-list" aria-hidden="true"></i> List Question Answer</button>
           </div>
         </div>
       </h5>
       <div class="card-body">
        
        <form role="form" class="needs-validation" novalidate  method="post" action="<?php echo site_url()?>Questionanswer/Qacontroller/updateQuestion" enctype="multipart/form-data">
          <input type="hidden" value="<?php echo $qa_data[0]->qa_id ?>"   name="cate_id">

          <div class="row">
         
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                
                              <label for="validationCustom01">Question:</label>
                              <input type="text" placeholder="Enter Question Here" value="<?php echo $qa_data[0]->question ?>" class="form-control" required id="validationCustom01" name="question" required="">
                              <div class="valid-feedback">
                                Looks good!
                              </div>
                              <div class="invalid-feedback">
                                Enter feature name.
                              </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                
                              <label for="validationCustom02">Answer:</label>
                              <input type="text" placeholder="Enter Answer Here." value="<?php echo $qa_data[0]->answer ?>" class="form-control" required id="validationCustom01" name="answer" required="">
                              <div class="valid-feedback">
                                Looks good!
                              </div>
                              <div class="invalid-feedback">
                                Enter feature name.
                              </div>
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                
                              <label for="validationCustom03">Options:</label>
                              <input type="text" placeholder="Enter options in comma-separated format here." class="form-control" value="<?php echo $qa_data[0]->options ?>" required id="validationCustom01" name="options" required="">
                              <div class="valid-feedback">
                                Looks good!
                              </div>
                              <div class="invalid-feedback">
                                Enter feature name.
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
