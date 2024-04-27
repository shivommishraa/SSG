<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <form role="form" method="post" action="<?php echo site_url()?>frm_project-post" enctype="multipart/form-data"></html>
         
            <div class="modal-header">
              
                
                <h4  class="modal-title" style="color: #00f;"><b>Add Project</b>
                    
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        
                        <span aria-hidden="true">&times;</span></button> </h4></div>
                        <table id="example1" class="table table-bordered table-hover">
                           
                          <div class="container-fluid">
                              <div class="form-group">
                                
                                <div class="col-md-4 mb-3">
                                   <label for="name">Project Title</label>
                                   <span style="color: red;"><?php echo form_error('pr_title'); ?></span>
                                   <input type="text" required=""  class="form-control" id="name" name="pr_title" placeholder="Enter Project Title">
                               </div>
                               <div class="col-md-4 mb-3">
                                   <label for="name">Project Worktype</label>
                                   <span style="color: red;"><?php echo form_error('pr_worktype'); ?></span>
                                   <input type="text" required="" class="form-control" id="name" name="pr_worktype" placeholder="Enter Project Worktype">
                               </div>
                               <div class="col-md-4 mb-3">
                                <label for="fname">Project Start Date</label>
                                <span style="color: red;"><?php echo form_error('pr_startdate'); ?></span>
                                <input type="date" required="" class="form-control" id="fname" name="pr_startdate" placeholder="Project Start Date">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="gender">Project Deadline</label>
                                <span style="color: red;"><?php echo form_error('pr_deadline'); ?></span>
                                <input type="date" required=""  class="form-control" id="password" name="pr_deadline" placeholder="Project Deadline">
                            </div>
                            
                            
                            <div class="col-md-4 mb-3">
                             <label for="email">Project Description</label>
                             <span style="color: red;"><?php echo form_error('pr_description'); ?></span>
                             <input type="text" required="" class="form-control" id="email" name="pr_description" placeholder="Project Description">
                         </div>
                         <div class="col-md-4 mb-3">
                            <label for="designation">Project Budget</label>
                            <span style="color: red;"><?php echo form_error('pr_budget'); ?></span>
                            <input type="text" required="" class="form-control" id="designation" name="pr_budget" placeholder="Project Budget">
                        </div>
                        <div class="col-md-4 mb-3">
                           <label for="doc_id">Project Installments</label>
                           <span style="color: red;"><?php echo form_error('pr_installments'); ?></span>
                           <input type="text"required="" class="form-control" id="adminid" name="pr_installments" placeholder="Project Installments">
                       </div>
                       
                       <div class="col-md-4 mb-3">
                           <label for="name">Project Installment Amount</label>
                           <span style="color: red;"><?php echo form_error('pr_inst_amt'); ?></span>
                           <input type="text" required="" class="form-control" id="name" name="pr_inst_amt" placeholder="Project Installment Amount">
                       </div>
                       
                       <div class="col-md-4 mb-3">
                        <label for="fname">Project Balance</label>
                        <span style="color: red;"><?php echo form_error('pr_balance'); ?></span>
                        <input type="text" required="" class="form-control" id="fname" name="pr_balance" placeholder="Project Balance">
                    </div>
                    
                    
                    
                    <div class="col-md-4 mb-3">
                     <label for="gender">Project Status ID</label>
                     <span style="color: red;"><?php echo form_error('pr_status_id'); ?></span>
                     <input type="text" required="" class="form-control" id="gender" name="pr_status_id" placeholder="Project Status ID">
                 </div>
                 <div class="col-md-4 mb-3">
                     <label for="designation">Service ID</label>
                     <span style="color: red;"><?php echo form_error('ser_id'); ?></span>
                     <input type="text" required=""  class="form-control" id="designation" name="ser_id" placeholder="Service ID">
                 </div>
                 
                 <div class="col-md-4 mb-3">
                    <!-- <label for="designation">ProspectID</label>-->
                    <span style="color: red;"><?php echo form_error('prospect_id'); ?></span>
                    <input type="hidden" required="" value="<?php echo $id;?>"class="form-control" id="designation" name="prospect_id" placeholder="Agent ID">
                </div>
                
                
                
            </div></div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-md-lg pull-left" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-info">Submit</button>
        </div>
    </form>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->



