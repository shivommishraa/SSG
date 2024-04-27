<?php 
if(!empty($client_data)){?>
 
    <div class="row">
     <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="cursor: pointer; color: green;"  >
      <span>Client Details:</span><br/><hr/>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3" style="cursor: pointer; color: green;"  >
      <span><?php echo $client_data[0]->cus_name;?></span></div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3" style="cursor: pointer; color: green;"  >
      <span>Mobile: <?php echo $client_data[0]->cus_mobile;?></span></div>
      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3" style="cursor: pointer; color: green;"  >
      <span>Email: <?php echo $client_data[0]->cus_email;?></span></div>
      <input type="hidden" name="client_state" value="<?php echo $client_data[0]->cus_state;?>">
      <hr/>
     
    </div>
  </div>              
  
  <?php    }else{   } ?> 
