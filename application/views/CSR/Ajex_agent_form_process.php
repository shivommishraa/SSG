<?php $i=0; foreach ($totalprocess as $key) {
 foreach ($shiftprocess as $shift){
  if($shift->compaign_id==$key->compaign_id){
    ?>
    <div class="row">
     <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-2">
      <label for="validationCustom01"><?php echo $shift->compaign_name; ?>:</label>
      <input type="hidden" name="camp_id[]" value="<?php echo $shift->compaign_id ?>">
      <input type="number" class="form-control" required id="validationCustom01" value="<?php if(!empty($checkbox)){ echo $checkbox[$i]->pro_val;} ?>" name="pro_val[<?php echo $shift->compaign_id ?>]" required="">
      <div class="valid-feedback"> Looks good!  </div>
      <div class="invalid-feedback">Please provide a valid value.</div>
    </div>
  </div>              
  
  <?php    $i++; }}} ?> 

