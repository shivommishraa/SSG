<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <h4  class="btn btn-primary btn-block">Product Details
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button> </h4>
        <div class="container">
          <div class="row" style="margin-top: 10px;">
            <div class="col-lg-4 form-group">
              <b>Name :</b><?php echo $tbl_product[0]->product_name ?></div>

              <div class="col-lg-4 form-group">
                <b>Brand  :</b><?php if($tbl_product[0]->product_brand!=0){$brand=$getbrand($tbl_product[0]->product_brand);if(!empty($brand)){echo $brand[0]->brand_name;} } ?></div>

                <div class="col-lg-4 form-group">
                </div>

                <div class="col-lg-4 form-group">
                  <b>Actual Price:</b><?php echo $tbl_product[0]->actual_price ?></div>

                  <div class="col-lg-4 form-group">
                   <b> Discount Percantage :</b>  <?php echo $tbl_product[0]->discount_percentage ?></div>

                   <div class="col-lg-4 form-group">
                    <b> Discount Price :</b><?php echo $tbl_product[0]->discount_price ?></div>
                    

                    <div class="col-lg-12 form-group">
                     <b>Description: </b><?php echo $tbl_product[0]->product_description ?></div>
                   </div>
                 </div>
                 <div class="modal-footer">
                  <button type="button" class="btn btn-danger btn-md-lg pull-left" data-dismiss="modal">Close</button>
                </div>
              </div>