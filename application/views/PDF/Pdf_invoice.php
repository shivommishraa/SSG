<html>
<head>
  <title>Invoice</title>
</head>
<body>
  <?php

  $clientname=$getclientname($invoice_detail[0]->client_id);
  $statename=$getstatename($clientname[0]->cus_state);

  ?>
  
  <div>
    <span style="font-size: 12px; font-family: times; "><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if(!empty($clientname)){ echo $clientname[0]->cus_name;} ?></b></span><br/>
    <span style="font-size: 11px; font-family: times; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if(!empty($clientname)){ echo $clientname[0]->  cus_address;} ?></span><br/>
    <span style="font-size: 11px; font-family: times; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if(!empty($clientname)){ echo $clientname[0]->cus_city; echo ', '.$statename[0]->state_name; } ?></span><br/>
    <span style="font-size: 11px; font-family: times; ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php if(!empty($clientname)){ echo $clientname[0]->  cus_country.' - ('.$clientname[0]->pin.')';} ?></span><br/>
    <span style="font-size: 11px; font-family: times;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Phone :<?php if(!empty($clientname)){ echo ' (+91) '.$clientname[0]->cus_mobile;} ?></span><br/>
    <span style="font-size: 11px; font-family: times;" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Email :<?php if(!empty($clientname)){ echo ' '.$clientname[0]->cus_email;} ?></span>
  </div>

  
  <div>
   <?php  $gId=$getItem($invoice_detail[0]->inc_id); ?>
   <table style="padding-left:1000px;" border="1px"cellpadding="10"  cellspacing="0"   width="100%"  >
    <thead>
      <tr style="background-color: #101010c2;color: #fff;">
       
        <td>Item</td>
        <td>Description</td>
        <td>Price</td>
        <td>Qty</td>
        <td>Amount</td>
        
      </tr>
    </thead>
    <tbody>
      <?php foreach ($gId as $key) {?>
        
        
        <tr>
         
          <td><?php echo $key->itm_name; ?></td>
          <td><?php echo $key->itm_remark; ?></td>
          <td><?php echo $key->itm_rate; ?></td>
          <td><?php echo $key->itm_qty; ?></td>
          <td><?php echo $key->itm_amount; ?></td>
          
        </tr>

      <?php   } ?>
    </tbody>
  </table>
  <br/>
  <div align="left">
   <table style="padding-left:1000px;" border="0px"cellpadding="2"  cellspacing="1"   width="100%"  >
     <tr>
      <td ></td> <td></td><td ></td> <td></td>
      <td border="1px">Invoice #</td>
      <td border="1px" style="color: #00f;"><?php echo ' SRN  '.$invoice_detail[0]->client_id; ?></td>
    </tr><tr>
     <td ></td> <td></td><td ></td> <td></td>
     <td border="1px">Due Date</td>
     <?php
     $str1 = $invoice_detail[0]->inc_due_date;
     $date1 = DateTime::createFromFormat('Y-m-d', $str1);
     ?>
     <td border="1px" style="color: #00f;"><?php echo ' '.$date1->format('d-m-Y'); ?></td>
   </tr><tr>
     <td ></td> <td></td><td ></td> <td></td>
     <td border="1px">Total Amount</td>

     <td border="1px" style="color: #00f;"><?php echo ' '.$invoice_detail[0]->grand_total; ?></td>
   </tr>
 </table>
</div>
<div>
 <?php $termcon=$term_con($invoice_detail[0]->payment_terms) ?>
 <?php if(!empty($termcon)){?>
  <span style="color: #e2134b; font-weight: bold; font-size: 15px;"><?php  echo $termcon[0]->term_con_name; ?></span>
  <span>&nbsp;</br/><hr/><br/>
   <?php echo $termcon[0]->term_condition; ?>
   </span><?php  } ?>
 </div>
 
</div>

</body>
</html>
<!-- https://www.free-css.com/free-css-templates -->