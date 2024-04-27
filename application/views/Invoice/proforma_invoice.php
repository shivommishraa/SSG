<html>
<head>
  <title>Delivery Note</title>
</head>
<body>
  <?php

  $clientname=$getclientname($invoice_detail[0]->client_id);
  $statename=$getstatename($clientname[0]->cus_state);

  ?>
  
   <table style="padding-left:1000px;" cellpadding="10"  cellspacing="0"   width="100%"  >
    <thead>
      <tr style="background-color: #101010c2;color: #fff;">
       
      	<td>Our Info: </td>
        <td>Customer:</td>
     
      </tr>
    </thead>
    <tbody>
        <tr >
          <td><?php if(!empty($setting)){ 

          	  echo '<b>'.$setting[2]->setting_value.'</b><br/>';
          	  echo $setting[3]->setting_value.'<br/>';
          	  echo $setting[4]->setting_value; echo ', '.$setting[5]->setting_value.'<br/>';
          	  echo $setting[7]->setting_value.'<br/>';
          	  echo $setting[6]->setting_value;
          	 
          	
          }  ?></td>
          <td><?php if(!empty($clientname)){ 

          	  echo '<b>'.$clientname[0]->cus_name.'</b><br/>';
          	  echo $clientname[0]->cus_address.'<br/>';
          	  echo $clientname[0]->cus_city; echo ', '.$statename[0]->state_name.'<br/>';
          	  echo $clientname[0]->  cus_country.' - ('.$clientname[0]->pin.')<br/>';
          	  echo ' (+91) '.$clientname[0]->cus_mobile.'<br/>';
          	  echo ' '.$clientname[0]->cus_email;

          } ?></td>
          
        </tr>
    </tbody>
  </table>
  <br/>

  
  <div>
   <?php  $gId=$getItem($invoice_detail[0]->inc_id); ?>
   <table style="padding-left:1000px;" border="1px"cellpadding="10"  cellspacing="0"   width="100%"  >
    <thead>
      <tr style="background-color: #101010c2;color: #fff;">
       
        <td width="60%">Description</td>
        <td width="10%">Price</td>
        <td width="10%">Qty</td>
        <td width="20%">Amount</td>
      
      </tr>
    </thead>
    <tbody >
      <?php $i=1; foreach ($gId as $key) {?>
        
        
        <tr style="background-color: #ececec;color: #000;">
         
          <td width="60%"><?php echo $key->itm_remark; ?></td>
          <td width="10%"><?php echo $key->itm_rate; ?></td>
          <td width="10%"><?php echo $key->itm_qty; ?></td>
          <td width="20%"><?php echo $key->itm_amount; ?></td>
        
        </tr>

      <?php  $i++; } ?>
    </tbody>
  </table>
  <br/><br/>
   <div align="left">
   <table style="padding-left:1000px;" border="0px"cellpadding="2"  cellspacing="1"   width="100%"  >
     <tr>
      <td ></td> <td></td>
      <td border="1px">Summary: </td>
      <td border="1px" style="color: #00f;"></td>
    </tr><tr>
     <td ></td> <td></td>
     <td border="1px">Due Date</td>
     <?php
     $str1 = $invoice_detail[0]->inc_due_date;
     $date1 = DateTime::createFromFormat('Y-m-d', $str1);
     ?>
     <td border="1px" style="color: #00f;"><?php echo ' '.$date1->format('d-m-Y'); ?></td>
   </tr><tr>
     <td ></td> <td></td>
     <td border="1px">Total Amount :</td>
     

     <td border="1px" style="color: #00f;"><?php echo ' Rs. '.$invoice_detail[0]->grand_total; ?></td></tr>
    <tr>
    	<td ></td> <td></td>
     <td border="1px">Balance Due :</td>
      <td border="1px" style="color: #00f;"><b><?php echo ' Rs. '.$invoice_detail[0]->grand_total; ?></b></td></tr>
   
 </table>
</div>
    <table style="padding-left:1000px;" align="center" cellpadding="10"  cellspacing="0"   width="100%"  >
    <thead>
      <tr style="color: #000;">
        
        <td></td>
      	<td><b>Authorized person</b></td>
     
      </tr>
    </thead>
    <tbody>
        <tr>
          <td></td>
          <td><?php
          			foreach ($adminji as $key) {
          				if($key->admin_id==$invoice_detail[0]->add_by){
          				  echo '('.$key->name.')<br/>&nbsp;';	
          				  foreach ($admin_role as $keyy) {
 					if($keyy->role_id==$key->role_id){
 									echo $keyy->role_name;
 							}
 					} 
 				} 
 			}     ?>
 				 
 						
 			</td>
         
          
        </tr>
    </tbody>
  </table>
  
<div>
 <?php $termcon=$term_con($invoice_detail[0]->payment_terms) ?>
 <?php if(!empty($termcon)){?>
  <span style="color: #e2134b; font-weight: bold; font-size: 15px; "><?php  echo $termcon[0]->term_con_name; ?></span>
  <span style="margin-left: 90px;">&nbsp;</br/>&nbsp;<br/><hr/>&nbsp;<br/>
   <?php echo $termcon[0]->term_condition; ?>
   </span><?php  } ?>
 </div>
 
</div>

</body>
</html>
