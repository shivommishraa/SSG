<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <h4  class="btn btn-primary btn-block">Inquiry Details
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button> </h4>
        <div class="container">
          <div class="row" style="margin-top: 10px;">
            <?php $product=$getproduct($inquiry[0]->product_id); ?> 
            <?php $brand=$getbrand($inquiry[0]->brand_id); 
            $status_action=$status_history($inquiry[0]->inquiry_id);
            ?> 
            <h4 class="col-lg-12 form-group"style="color:#bd4444;">Product Details</h4>
            <div class="col-lg-12 form-group">
             <b>Inquiry Product :</b> <?php echo $product[0]->product_name ?></div>
             <div class="col-lg-4 form-group">
               <b>Brand :</b> <?php echo $brand[0]->brand_name ?></div>

               <div class="col-lg-4 form-group">
                 <b>Quantity :</b> <?php echo $qty=$inquiry[0]->product_qty ?></div>
                 <div class="col-lg-4 form-group"></div>

                 <div class="col-lg-4 form-group">
                  <b>M.R.P :</b> <?php echo $product[0]->actual_price ?></div>
                  <?php $p=$product[0]->discount_percentage; if($p!="0" AND $p!="" ){?>
                    <div class="col-lg-4 form-group">
                      <b>Discount :</b><?php  echo $p."%";?></div><?php } ?>
                      <?php $dp=$product[0]->discount_price;$rs=$qty*$dp; if($rs=="0"){$rs=$dp;}  ?>

                      <div class="col-lg-4 form-group">
                       <b>Total Price :</b> <?php echo $rs;  ?></div> 

                       <div class="col-lg-2 form-group">
                       </div>
                       
                       <h4 class="col-lg-12 form-group"style="color:#bd4444;">Customar Details</h4>
                       <div class="col-lg-4 form-group">
                        <b>Name :</b> <?php echo $inquiry[0]->customer_name ?></div>

                        
                        <div class="col-lg-4 form-group">
                        </div>
                        <div class="col-lg-4 form-group">
                        </div>
                        <div class="col-lg-6 form-group">
                         <b>Email :</b> <?php echo $inquiry[0]->customer_email ?></div>
                         <div class="col-lg-4 form-group">
                           <b>Mobile :</b> <?php echo $inquiry[0]->customer_mobile ?></div>
                           <div class="col-lg-12 form-group" style="text-align: justify;">
                             <b>Message :</b> <?php echo $inquiry[0]->customer_message ?></div>
                             <?php if($status_action){?>
                              <h4 class="col-lg-12 mt-2 form-group"style="color:#bd4444;">Company Actions</h4>
                              
                              <div class="col-lg-4 form-group">
                                <?php $statusname=$status_name($status_action[0]->status_id);
                                $admin=$adminname($status_action[0]->updated_by);
                                ?>
                                <b>Action By :</b> <?php echo $admin[0]->name; ?>
                                
                              </div>
                              <div class="col-lg-4 form-group">
                               <b>Status :</b> <?php echo $statusname[0]->status_names; ?>
                             </div>
                             <div class="col-lg-4 form-group">
                               <b>Modify At :</b> <?php echo $status_action[0]->modify_at; ?>
                             </div>
                             <div class="col-lg-12 form-group">
                               <b>Comment :</b> <?php echo $status_action[0]->comment; ?>
                             </div>
                           <?php } ?>
                         </div>
                         <div class="modal-footer">
                          <button type="button" class="btn btn-danger btn-md-lg pull-left" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div>