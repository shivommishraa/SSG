<div class="modal-dialog modal-md">
  <div class="modal-content">
    <h4  class="btn btn-danger btn-block"> Cancel Invoice

      
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">  
       <span aria-hidden="true">&times;</span></button></h4>
       <form class="needs-validation" validate=""  method="post" action="<?php echo site_url()?>Invoice/InvoiceController/addStatus_invoice">


         
        <div class="container-fluid">
         <div class="card-body">
           <div class="row">
            
             <div class="card-body">
              <input type="hidden" name="inc_id" value="<?php echo $inc_id ?>">
              <input type="hidden" name="inc_status" value="<?php echo $status ?>">
              <hr/>
              <center><span class="text-center" style="text-align: center; color: #00f; font-size: 17px;">You can not revert this action! Are you sure?</span></center> 
               <hr/>
           </div>
         </div>
         
       </div>

     </div>

     <div class="modal-footer">
          <button type="button" class="btn btn-light btn-md-lg" data-dismiss="modal">Close</button>
     
          <button class="btn btn-danger btn-md-lg" type="submit">OK..Cancel Invoice</button>
       
     </div>             
     
   </div>
 </form>
</div></div>