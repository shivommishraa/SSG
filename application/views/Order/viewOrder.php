<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <h4  class="btn btn-primary btn-block">Order Details
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button> </h4>
        <div class="container">
          <div class="row" style="margin-top: 10px;">
            <div class="col-lg-4 form-group">
              <b>Customer Name : </b><?php echo $order[0]->name ?></div>
              <div class="col-lg-4 form-group">
              	<b>Customer Mobile : </b><?php echo $order[0]->mobile ?>
          	  </div>
          	  <div class="col-lg-12 form-group">
              	<b>Customer Address : </b><?php echo $order[0]->address ?>
          	  </div>
          	  <div class="col-lg-12 form-group">
              	<b>Product Details : </b><?php echo $order[0]->products ?>
          	  </div>

            </div>
                 </div>
                 <div class="modal-footer">
                  <button type="button" class="btn btn-danger btn-md-lg pull-left" data-dismiss="modal">Close</button>
                </div>
              </div>
</div>