 <div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Update Location</h2>
                        <div class="page-breadcrumb">
                           <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="">Location</a></li>
                                <li class="breadcrumb-item "><a href="">Update Location</a></li>
                                
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
                        <button class="btn btn-sm btn-primary"  onClick="return redirect('<?php echo site_url(); ?>Location/LocationController/listLocation');"><i class="fa fa-list" aria-hidden="true"></i> List Location</button>
                    </div>
                </div>
            </h5>
            <div class="card-body">
                <form class="needs-validation" novalidate  method="post" action="<?php echo site_url()?>Location/LocationController/editsinglelocation">
                    <input type="hidden" value="<?php echo $location[0]->location_id ?>"   name="location_id">

                    <div class="row">
                       <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 ">

                         <label for="validationCustom01">Location Name:</label>
                         <input type="text" class="form-control" id="validationCustom01" name="location_name"value="<?php echo $location[0]->location_name ?>" placeholder="Enter Location Name" required="">
                         <div class="valid-feedback">
                            Looks good!
                        </div> <div class="invalid-feedback">Please fill the location name.</div>
                    </div>


                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 ">
                       <label for="validationCustom01">Select Company:</label>
                       <select class="form-control"  name="comp_id" id="validationCustom02"required >
                        <option value="">Select Company</option>
                        <?php foreach($company as $row): ?>
                          <option value="<?php echo $row->cmp_id; ?>"<?php if(!empty(set_value('comp_id'))){ if(set_value('comp_id')==$row->cmp_id){ echo "selected"; } } 
                          if(!empty($location[0]->comp_id)){ if($location[0]->comp_id==$row->cmp_id){ echo "selected"; }}
                          ?> 
                          ><?php echo $row->cmp_name; ?></option>
                      <?php endforeach; ?>
                  </select>
                  <span style="color: red;"><?php echo form_error('comp_id'); ?></span>
                  <div class="valid-feedback">
                    Looks good!
                </div> <div class="invalid-feedback">Please fill the company.</div>
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
