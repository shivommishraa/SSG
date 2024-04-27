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
        <tr>
          <td><?php if(!empty($setting)){ 

          	  echo '<b>'.$setting[2]->setting_value.'</b><br/>';
          	  echo $setting[3]->setting_value.'<br/>';
          	  echo $setting[4]->setting_value; echo ', '.$setting[5]->setting_value.'<br/>';
          	  echo$setting[7]->setting_value.'<br/>';
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
       
      	<td width="10%">Sr.</td>
        <td width="70%">Description</td>
        <td width="20%">Qty</td>
      
        
      </tr>
    </thead>
    <tbody>
      <?php $i=1; foreach ($gId as $key) {?>
        
        
        <tr style="background-color: #ececec;color: #000;">
         
          <td width="10%"><?php echo $i; ?></td>
          <td width="70%"><?php echo $key->itm_remark; ?></td>
          <td width="20%"><?php echo $key->itm_qty; ?></td>
        
          
        </tr>

      <?php  $i++; } ?>
    </tbody>
  </table>
  <br/><br/>
    <table style="padding-left:1000px;" align="center" cellpadding="10"  cellspacing="0"   width="100%"  >
    <thead>
      <tr style="color: #000;">
       
      	<td>Authorized person</td>
        <td>Sign Received by :</td>
     
      </tr>
    </thead>
    <tbody>
        <tr>
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
          <td>&nbsp;<br/><hr></td>
          
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
