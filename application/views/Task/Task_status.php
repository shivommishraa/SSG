<div class="modal-dialog modal-md">
  <div class="modal-content">
   <form class="needs-validation"action="<?php echo base_url() ?>/Task/Task_Controller/Update_task_status" method="post" enctype="multipart/form-data" id="contact_form">

    <h4  class="btn btn-block" style="background-color: #ef172c; color: #fff">Task Status
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button> </h4>

        <div class="container">
         <div class="card-body">
           <button type="button" class="btn btn-primary ml-3" data-toggle="tooltip" data-placement="bottom" title="Project">
             <?php if(!empty($Project)){ echo $Project[0]->pr_title;} ?> </button>
             <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Task"><?php if(!empty($task_data)){ echo $task_data[0]->task_name;} ?>
           </button>
           <!-- ============ Start Important Code lines for Task Status History =============== -->
           <input type="hidden" name="task_id" value="<?php echo $task_id; ?>">
           <input type="hidden" name="task_name" value="<?php echo $task_data[0]->task_name; ?>">
           <input type="hidden" name="member_id" value="<?php echo $task_data[0]->member_id; ?>">
           <input type="hidden" name="member_role" value="<?php echo $task_data[0]->member_role; ?>">
           <input type="hidden" name="desciption" value="<?php echo $task_data[0]->desciption; ?>">
           <input type="hidden" name="project_id" value="<?php echo $task_data[0]->project_id; ?>">
           <!-- ============ End Important Code lines for Task Status History =================== -->

           <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
            <label for="validationCustom01">Status</label>
            <select class="form-control"  name="task_status_id" id="validationCustom02"required>
             <option value="">Select Status</option>
             <?php foreach($Task_status as $row): ?>
              <option value="<?php echo $row->task_status_id; ?>" <?php if(!empty($task_data)){if($row->task_status_id==$task_data[0]->task_status){ echo "selected";}} ?>><?php echo $row->task_status_name; ?></option>
            <?php endforeach; ?>
          </select>
          <span id="id_role" class="text-danger"></span>
          <div class="valid-feedback">Looks good! </div>
          <div class="invalid-feedback">Please select member.</div>
        </div>  

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3 ">
          <label for="validationCustom01">Remark</label>
          <textarea  class="form-control"  name="remark" id="validationCustom02" required="" placeholder="Remark write here..."><?php if(!empty($task_data[0]->remark)){ echo $task_data[0]->remark;} ?></textarea>
          <span id="remark" class="text-danger"></span>
          <div class="valid-feedback">Looks good! </div>
          <div class="invalid-feedback">Please write remark here..</div>
        </div>
      </div>   


    </div>
    <div class="modal-footer">
     <button class="btn btn-success " type="submit"><i class="fas fa-angle-double-up"></i> Submit</button>   </form> 


     <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="fa fa-times" aria-hidden="true"></i> Close</button>


   </div> 
 </div> 
</div>

