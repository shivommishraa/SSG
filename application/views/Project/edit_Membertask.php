   <div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
      <div class="container-fluid dashboard-content ">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
              <h2 class="pageheader-title">Edit Task</h2>

              <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="">Project</a></li>
                    <li class="breadcrumb-item "><a href="">Edit Task</a></li>

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
            <form role="form" method="post" class="needs-validation" novalidate="" action="<?php echo site_url()?>Project/ProjectController/updare_member_task" enctype="multipart/form-data">
             
              <div class="card-body"> 
               <div class="row"> 
                <input type="hidden" name="task_id" value="<?php echo $edit_task[0]->task_id; ?>">     
                <input type="hidden" name="pr_id" value="<?php echo $pr_id; ?>">         
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 ">
                  <label for="name">Name</label>
                  <span style="color: red;"><?php echo form_error('task_name'); ?></span>
                  <input type="text" required="" value="<?php echo $edit_task[0]->task_name ?>"  class="form-control" id="validationCustom01" name="task_name" placeholder="Enter Task Name">
                  <div class="valid-feedback"> Looks good!</div>
                  <div class="invalid-feedback">Write Task name here.</div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 ">
                  <label for="name">Member</label>
                  <span style="color: red;"><?php echo form_error('id_role'); ?></span>
                  <select class="form-control"  name="id_role" id="validationCustom02"required>
                   <option value="">Select Member</option>
                   <?php foreach($All_agent as $row): ?>
                    <option value="<?php echo $row->admin_id.','.$row->role_id; ?>"<?php if(!empty($edit_task)){ if($row->admin_id==$edit_task[0]->member_id ){ echo "selected";}} ?> ><?php echo $row->name; ?></option>
                  <?php endforeach; ?>
                </select>
                <div class="valid-feedback"> Looks good!</div>
                <div class="invalid-feedback">Please choose a valid option.</div>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
                <label for="fname">Description</label>
                <span style="color: red;"><?php echo form_error('desciption'); ?></span>
                <textarea required="" class="form-control"id="validationCustom01" name="desciption" placeholder="Write description here.."><?php echo $edit_task[0]->desciption ?></textarea>
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
