   <div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
      <div class="container-fluid dashboard-content ">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
              <h2 class="pageheader-title">Edit Milstone</h2>

              <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="">Project</a></li>
                    <li class="breadcrumb-item "><a href="">Edit Milstone</a></li>

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
                  <button class="btn btn-sm btn-primary"  onClick="return redirect('<?php echo base_url(); ?>Project/ProjectController/viewprojectdata/<?php echo $pr_id ?>');"><i class="fas fa-backward" aria-hidden="true"> </i> Back</button>
                </div>
              </div>
            </h5>
            <form role="form" method="post" class="needs-validation" novalidate="" action="<?php echo site_url()?>Project/ProjectController/updare_member_mile" enctype="multipart/form-data">

              <div class="card-body"> 
               <div class="row"> 
                <input type="hidden" name="mile_id" value="<?php echo $edit_mile[0]->mile_id; ?>">     
                <input type="hidden" name="pr_id" value="<?php echo $pr_id; ?>">         
                <div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-5 ">
                  <label for="name">Name</label>
                  <span style="color: red;"><?php echo form_error('task_name'); ?></span>
                  <input type="text" required="" value="<?php echo $edit_mile[0]->mile_name ?>"  class="form-control" id="validationCustom01" name="mile_name" placeholder="Enter Milstone Name">
                  <div class="valid-feedback"> Looks good!</div>
                  <div class="invalid-feedback">Write Milstone name here.</div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 ">
                  <label for="name">Member</label>
                  <span style="color: red;"><?php echo form_error('id_role'); ?></span>
                  <select class="form-control"  name="id_role" id="validationCustom02"required>
                   <option value="">Select Member</option>
                   <?php foreach($All_agent as $row): ?>
                    <option value="<?php echo $row->admin_id.','.$row->role_id; ?>"<?php if(!empty($edit_mile)){ if($row->admin_id==$edit_mile[0]->member_id ){ echo "selected";}} ?> ><?php echo $row->name; ?></option>
                  <?php endforeach; ?>
                </select>
                <div class="valid-feedback"> Looks good!</div>
                <div class="invalid-feedback">Please choose a valid option.</div>
              </div>
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 mb3">
               <label for="name">Complete (in %)</label>
               <span style="color: red;"><?php echo form_error('complete'); ?></span>

               <input type="number" min="0" max="100" maxlength="3" class="form-control"  value="<?php echo $edit_mile[0]->complete ?>" required=""  placeholder="Fill valid percentage(%)." id="percentage-mask" name="complete">
    
       <div class="valid-feedback"> Looks good!</div>
       <div class="invalid-feedback">Please fill the completed percent.</div>
    </div>
             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
              <label for="fname">Description</label>
              <span style="color: red;"><?php echo form_error('desciption'); ?></span>
              <textarea required="" class="form-control"id="validationCustom01" name="desciption" placeholder="Write description here.."><?php echo $edit_mile[0]->desciption ?></textarea>
              <div class="valid-feedback"> Looks good!</div>
              <div class="invalid-feedback">Write description here..</div>
            </div>

            <div class="form-row pt-2">
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-2">
                <button type="submit" style="margin-left:15px;"class="btn btn-primary pt-2"><i class="fas fa-angle-double-up"></i>  Update</button>
              </div>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</section>
</div>
