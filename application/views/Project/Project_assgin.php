<div class="modal-dialog modal-md">
  <div class="modal-content">
    <h4  class="btn btn-primary btn-block">Agent Assign Project
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button> </h4>
        <div class="container">
         <span class="pl-2"><b>Agent Name-</b> <?php echo $admindata[0]->name; ?></span>
         <div class="row" >
           <div class="card-body">
             <form class="needs-validation" method="post" enctype="multipart/form-data" id="contact_form">
               <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                  <label for="validationCustom01">Project</label>
                  <select class="form-control"  name="pr_id" id="validationCustom02"required>
                   <option value="">Select Project</option>
                   <?php foreach($Project as $row): ?>
                    <option value="<?php echo $row->pr_id; ?>" ><?php echo $row->pr_title; ?></option>
                  <?php endforeach; ?>
                </select>
                <span id="email_id" class="text-danger"></span>
              </div>  
            </div>
            <div class="row">
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2 ">
                <label for="validationCustom01">Remark</label>
                <textarea class="form-control"  name="remark" id="validationCustom02"required="" placeholder="Remark write here..."></textarea>
                <span id="email_id" class="text-danger"></span>
              </div>  
            </div>

          </form>   
          
        </div>
      </div>
      <div class="modal-footer mt-4">
        <button type="button" class="btn btn-danger btn-md-lg pull-left" data-dismiss="modal">Close</button>
        <button class="btn btn-success" type="submit">Submit</button>
      </div>
    </form>                                 
    
  </div>
  
</div>
</div>
</div></div>