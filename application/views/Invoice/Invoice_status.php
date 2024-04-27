<div class="modal-dialog modal-md">
  <div class="modal-content">
    <h4  class="btn btn-danger btn-block"> Change Status
      
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">  
       <span aria-hidden="true">&times;</span></button></h4>
       <form class="needs-validation" validate=""  method="post" action="<?php echo site_url()?>Invoice/InvoiceController/addStatus_invoice">


         
        <div class="container-fluid">
         <div class="card-body">
           <div class="row">
            
             <div class="card-body">
              <input type="hidden" name="inc_id" value="<?php echo $inc_id ?>">
              <label for="validationCustom01">Mark As</label>
              <select class="form-control" required="" id="validationCustom01" name=" inc_status" required="">
                <option value="">Select Option</option>
                <?php foreach ($inc_status as $key ) {?>
                 <option value="<?php echo $key->inc_sts_id; ?>"<?php if(!empty($invoice)){ if($invoice[0]->inc_status==$key->inc_sts_id){ echo "selected";; } } ?>><?php echo $key->in_sts_name; ?></option>
               <?php } ?>
             </select>
             <div class="valid-feedback"> Looks good! </div>
             <div class="invalid-feedback">Please choose the select option.</div>
             
             
           </div>
         </div>
         
       </div>

     </div>

     <div class="modal-footer">
      <div class="row">
        <div class="col-md-6"> 
          <button class="btn btn-success btn-md-lg" type="submit">Submit</button>
        </div>
        <div class="col-md-6"> 
         <button type="button" class="btn btn-danger btn-md-lg" data-dismiss="modal">Close</button>
       </div>
     </div>             
     
   </div>
 </form>
</div></div>