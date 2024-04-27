<div class="modal-dialog modal-md">
  <div class="modal-content">
   <form class="needs-validation"action="<?php echo base_url() ?>/Task/Task_Controller/Update_mile_statusforview" method="post" enctype="multipart/form-data" id="contact_form">

    <h4  class="btn btn-block" style="background-color: #ef172c; color: #fff">Milestone Status
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button> </h4>

        <div class="container">
         <div class="card-body">
           <button type="button" class="btn btn-primary ml-3" data-toggle="tooltip" data-placement="bottom" title="Project">
             <?php if(!empty($Project)){ echo $Project[0]->pr_title;} ?> </button>
             <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Task"><?php if(!empty($mile_data)){ echo $mile_data[0]->mile_name;} ?>
           </button>
           <!-- ============ Start Important Code lines for Task Status History =============== -->
           <input type="hidden" name="mile_id" value="<?php echo $mile_id; ?>">
           <input type="hidden" name="mile_name" value="<?php echo $mile_data[0]->mile_name; ?>">
           <input type="hidden" name="member_id" value="<?php echo $mile_data[0]->member_id; ?>">
           <input type="hidden" name="member_role" value="<?php echo $mile_data[0]->member_role; ?>">
           <input type="hidden" name="desciption" value="<?php echo $mile_data[0]->desciption; ?>">
           <input type="hidden" name="project_id" value="<?php echo $mile_data[0]->project_id; ?>">
           <!-- ============ End Important Code lines for Task Status History =================== -->

           <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
            <label for="validationCustom01">Status</label>
            <select class="form-control"  name="task_status_id" id="validationCustom02"required>
             <option value="">Select Status</option>
             <?php foreach($Task_status as $row): ?>
              <option value="<?php echo $row->task_status_id; ?>" <?php if(!empty($mile_data)){if($row->task_status_id==$mile_data[0]->mile_status){ echo "selected";}} ?>><?php echo $row->task_status_name; ?></option>
            <?php endforeach; ?>
          </select>
          <span id="id_role" class="text-danger"></span>
          <div class="valid-feedback">Looks good! </div>
          <div class="invalid-feedback">Please select member.</div>
        </div>  
         <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3 ">
          <label for="validationCustom01">Complete</label>
          <input type="number" min="0" max="100" maxlength="3"   class="form-control "  name="complete" id="percentage-mask" required="" placeholder="Fill valid percentage(%)." value="<?php if(!empty($mile_data[0]->remark)){ echo $mile_data[0]->complete;} ?>">
          <span id="complete" class="text-danger"></span>
          <div class="valid-feedback">Looks good! </div>
          <div class="invalid-feedback">Please write percent here..</div>
        </div>

        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3 ">
          <label for="validationCustom01">Remark</label>
          <textarea  class="form-control"  name="remark" id="validationCustom02" required="" placeholder="Remark write here..."><?php if(!empty($mile_data[0]->remark)){ echo $mile_data[0]->remark;} ?></textarea>
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

 <script type="text/javascript">
    $(function(e) {
        "use strict";
        $(".date-inputmask").inputmask("dd/mm/yyyy"),
            $(".phone-inputmask").inputmask("(999) 999-9999"),
            $(".international-inputmask").inputmask("+9(999)999-9999"),
            $(".xphone-inputmask").inputmask("(999) 999-9999 / x999999"),
            $(".purchase-inputmask").inputmask("aaaa 9999-****"),
            $(".cc-inputmask").inputmask("9999 9999 9999 9999"),
            $(".ssn-inputmask").inputmask("999-99-9999"),
            $(".isbn-inputmask").inputmask("999-99-999-9999-9"),
            $(".currency-inputmask").inputmask("$9999"),
            $(".percentage-inputmask").inputmask("999%"),
            $(".decimal-inputmask").inputmask({
                alias: "decimal",
                radixPoint: "."
            }),

            $(".email-inputmask").inputmask({
                mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[*{2,6}][*{1,2}].*{1,}[.*{2,6}][.*{1,2}]",
                greedy: !1,
                onBeforePaste: function(n, a) {
                    return (e = e.toLowerCase()).replace("mailto:", "")
                },
                definitions: {
                    "*": {
                        validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~/-]",
                        cardinality: 1,
                        casing: "lower"
                    }
                }
            })
    });
  
         
     </script>