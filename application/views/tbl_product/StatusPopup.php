<div class="modal-dialog modal-md">
  <div class="modal-content">
    <h4  class="btn btn-primary btn-block">Inquiry Status
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button> </h4>
        <div class="container">
          <div class="row" style="margin-top: 10px;">
           <div class="card-body">
            <form method="post" action="<?php echo site_url()?>Product/Tbl_productController/submitupdate_status">
              <input type="hidden" value="<?php echo $inquiry_id;?>" name="inquiry_id">
              <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
                 <label for="validationCustom02">Inquiry Status:</label>
                 
                 <select class="form-control"  name="status_id" id="validationCustom02"required>
                  <?php $statuss=$status_history($inquiry_id);
                  if(empty($statuss)){
                   ?> 
                   <option value="">Select Inquiry Status</option><?php } ?>
                   
                   <?php foreach($status as $row): ?>
                     <option value="<?php echo $row->status_id; ?>"<?php if(!empty($statuss)){if($row->status_id==$statuss[0]->status_id) echo "selected";} ?> ><?php echo $row->status_names; ?></option>
                   <?php endforeach; ?>
                 </select>
                 <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-2">
                <label for="validationCustomUsername">Comment :</label>
                <textarea required="" class="form-control" name="comment" ><?php if($statuss){ echo $statuss[0]->comment;}?></textarea>  
              </div> </div>
              
              
              <div class="modal-footer mt-4">
                <button type="button" class="btn btn-danger btn-md-lg pull-left" data-dismiss="modal">Close</button>
                <button class="btn btn-success" type="submit">Submit</button>
              </div>
            </form>                                 
            
          </div>
          
        </div>
      </div>
    </div></div>