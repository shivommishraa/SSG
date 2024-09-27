   <div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Add Question Answer</h2>
                        
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="">Question Answer</a></li>
                                    <li class="breadcrumb-item "><a href="">Add Question Answer</a></li>
                                    
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
                             <div class="col-md-4 pt-3"></div>
                             <div class="col-md-4 pt-3 text-right">
                                 <button class="btn btn-sm btn-primary"  onClick="return redirect('<?php echo site_url(); ?>Questionanswer/Qacontroller/ManageQuestionanswer');"><i class="fa fa-list" aria-hidden="true"></i>List Question Answer</button>
                             </div>
                         </div>
                     </h5>
                     <div class="card-body">
                       <form role="form" class="needs-validation" novalidate  method="post" action="<?php echo site_url()?>Questionanswer/Qacontroller/addQuestionPost"  enctype="multipart/form-data" >
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                
                              <label for="validationCustom01">Question:</label>
                              <input type="text" class="form-control" required id="validationCustom01" name="question" required="">
                              <div class="valid-feedback">
                                Looks good!
                              </div>
                              <div class="invalid-feedback">
                                Enter feature name.
                              </div>
                        </div>
                        <!-- <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
                           <label for="validationCustom02">Parent:</label>
                           <select class="form-control" id="validationCustom02"  name="parent_id">
                               <option value="0">Select Parent</option>
                               <?php foreach($categorydropdown as $row): ?>
                                   <option value="<?php echo $row->category_id; ?>" ><?php echo $row->category_name; ?></option>
                               <?php endforeach; ?>
                           </select>
                       </div> -->
                   </div>
                   <div class="form-row pt-2">
                                     
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
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
