 <!doctype html>
<html lang="en">

<head>

   <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/admin.png" type="image/x-icon" />
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <!-- Bootstrap CSS -->
   <script type="text/javascript" src="<?=base_url()?>Custom_JS/custom.js" ></script>
   <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery-3.3.1.min.js"></script>
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/datepicker/tempusdominus-bootstrap-4.css" />
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css">
   <link href="<?php echo base_url(); ?>assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/libs/css/style.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/charts/chartist-bundle/chartist.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/charts/morris-bundle/morris.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/charts/c3charts/c3.css">
   <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/fonts/flag-icon-css/flag-icon.min.css">

   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/datatables/css/dataTables.bootstrap4.css">

   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/datatables/css/buttons.bootstrap4.css">
   <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/vendor/datatables/css/select.bootstrap4.css">
    
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/summernote/css/summernote-bs4.css">
   
   <title>Neo Admin</title>
   
</head>
 <body>
 <!-- <div class="dashboard-wrapper">
 	<div class="dashboard-ecommerce">
  -->		<div class="container-fluid dashboard-content ">
 			 <div class="row">
 				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
 					<div class="card">
                     <form  role="form" action="<?php echo site_url(); ?>Admin/Role_Controller/manage_role" method="post">
                     <div class="row col-md-12">
                        <div class="col-md-12 card-header">
                         
                           <button class="btn btn-sm btn-success pt-2"  onClick="return redirect('<?php echo site_url(); ?>Invoice/InvoiceController/printInvoice/<?php echo $invoice_detail[0]->inc_id; ?>');"><i class="fa fa-print" aria-hidden="true"> </i> Print</button>
                           <button class="btn btn-sm btn-primary pt-2"  onClick="return redirect('<?php echo site_url(); ?>PDF/Pdf_invoice/pdfInvoice/<?php echo $invoice_detail[0]->inc_id;?>');"><i class="fas fa-file-pdf" aria-hidden="true"> </i> PDF</button>
                             <button class="btn btn-sm pt-2" style="background-color: #ff5973; color: #fff;" onClick="return redirect('<?php echo site_url(); ?>Invoice/InvoiceController/viewInvoice/<?php echo $invoice_detail[0]->inc_id; ?>');"><i class="fas fa-step-backward" aria-hidden="true"></i> Back</button>
                          
                          
                        </div>
                     </div>
                  </form>
 						<div class="card-body">
 							<div class="row"> 	
 								<div class="col-md-12 text-center" style="font-size: 22px; color: #00f; font-weight:bold;">
 									<span><u>INVOICE</u></span>
 								</div>					
 								<div class="col-md-6 ">
 									<img src="<?php echo base_url(); ?>assets/images/firstrite_logo1.png" alt="" width="190px" height="180px" class="ml-4"class = "img-rounded"><br/>
 									<span class="mt-3 ml-4" style="color: #00f;font-size: 16px;margin-top: 20px;"><?php echo ' '.$setting[2]->setting_value; ?></span>
 								</div>
 								<div class="col-md-2"></div>
 								<div class="col-md-4  text-left mt-5"style="font-size: 18px; font-weight:bold;">
 									<span>SRN:<?php echo ' '.$invoice_detail[0]->client_id; ?></span><br/>
 									<span>Reference:<?php echo ' '.$invoice_detail[0]->inc_reference; ?></span><br/>
 									<span>Gross Amount:<?php echo ' ₹ '.$invoice_detail[0]->grand_total; ?></span>
 								</div>
 							</div>
 							<div class="col-md-12 text-left pt-3 ml-2" style="font-size: 20px;  color: #000;  font-weight:bold;">
 								<span>Bil To</span><hr/>
 							</div>
 							<div class="row pl-4">	
 								<div class="col-md-7"style="font-size: 16px;color: #8a25e6;">
 									<?php 
 									$clientname=$getclientname($invoice_detail[0]->client_id); ?>
 									<span><?php if(!empty($clientname)){ echo $clientname[0]->cus_name;} ?></span><br/>
 									<span>Phone :<?php if(!empty($clientname)){ echo ' +91 '.$clientname[0]->cus_mobile;} ?></span><br/>
 									<span>Email &nbsp;:<?php if(!empty($clientname)){ echo ' &nbsp;'.$clientname[0]->cus_email;} ?></span>
 								</div>
 								
 								<div class="col-md-5"style="font-size: 16px;color: #8a25e6;">
 									<?php 

 									$str1 = $invoice_detail[0]->inc_date;
 									$str2 = $invoice_detail[0]->inc_due_date;
 									$date1 = DateTime::createFromFormat('Y-m-d', $str1);
 									$date2 = DateTime::createFromFormat('Y-m-d', $str2);
 									$day1=date('l', strtotime($str1)); 
 									$day2=date('l', strtotime($str2)); 

 									?>
 									<span>Invoice Date &nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $date1->format('d-m-Y').'&nbsp;&nbsp;('.$day1.')'; ?></span><br/>
 									<span>Due Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $date2->format('d-m-Y').'&nbsp;&nbsp;('.$day2.')'; ?></span><br/>
 									<?php $termcon=$term_con($invoice_detail[0]->payment_terms) ?>
 									<span>Terms &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $termcon[0]->term_con_name; ?></span>
 								</div>
 							</div>

 							<div class="card-body mt-3">
 								<div class="table-responsive">
 									<?php if(!empty($itm_data)) {?>
 										<table class="table table-striped table-bordered first">
 											<thead>
 												<tr>

 													<th>SL No</th>
 													<th>Item Name</th>
 													<th>Rate</th>
 													<th>Qty</th>
 													<th>Tax/Item</th>
 													<th>Discount</th>
 													<th>Amount</th>

 												</tr>
 											</thead>
 											<tbody>
 												<?php $i=1; foreach($itm_data as $ro) { ?>
 													<tr>

 														<td> <?php echo $i; ?> </td>
 														<td> <?php echo $ro->itm_name; ?></td>
 														<td> <?php echo $ro->itm_rate; ?> </td>
 														<td> <?php echo $ro->itm_qty ?></td>
 														<td> <?php echo $ro->itm_tax_per; ?> </td>
 														<td> <?php echo $ro->itm_discount ?></td>
 														<td> <?php echo $ro->itm_amount; ?> </td>

 													</tr>
 													<?php $i++; } ?>
 												</tbody>
 											</table>
 										<?php } else {?>

 										<?php } ?>

 									</div>
 								</div>
 								<div class="row pl-3">
 									<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 pt-4">
 										<span style="font-size: 16px;">Payment Status: </span><span style="font-size: 15px;color:#fff;">
 											<a href="">Due</a></span><br/>
 											<span  style="font-size: 16px">Payment Method:</span>
                                       <div class="card-body">
                                       <table class="table">
                                          <h5 class="pt-3">*****</h5>
                                          <thead>
                                             <tr>
                                                <th>Item Tax (%)</th>
                                                <th>Item Tax</th>
                                                <th>Gross Rate</th>
                                             </tr>
                                          </thead>
                                          <tbody>

                                          <?php foreach ($item_cal_detail as $key ) {?>
                                             
                                          
                                             <tr>
                                       <td><?php echo $key->itm_tax_per;?></td>
                                       <td><?php echo $key->itm_tax;?></td>
                                       <td><?php echo $key->gross_rate;?></td>
                                             
                                             </tr>
                                             <?php } ?>
                                    </tbody>
                                 </table>
                              </div>
 										</div>

 										<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12" style="margin-top: -30px;">

 											<div class="card-body">
 												<div class="card-body">
 													<table class="table">
 														<h5 class="pt-3">Summary</h5>
 														<tbody>

 															<tr>
 																<td>Tax</td>
 																
 																<td><?php echo ' ₹ '.$invoice_detail[0]->total_tax; ?></td>
 															</tr>
                                                <?php if($clientname[0]->cus_state==$setting[10]->Code){?>
                        <tr>  <td>SGST</td>
                        <td><?php echo ' ₹ '.$invoice_detail[0]->SGST; ?></td></tr><tr>
                        <td>CGST</td>
                        <td><?php echo ' ₹ '.$invoice_detail[0]->CGST; ?></td></tr>
                  <?php }else{ ?>
                        <tr>
                        <td>IGST</td>
                        <td><?php echo ' ₹ '.$invoice_detail[0]->IGST; ?></td>
                        
                        </tr>
                  <?php } ?>
 															<tr>
 																<td>Discount</td>
 																
 																<td><?php $total_dis=$invoice_detail[0]->total_discount+$invoice_detail[0]->extra_discount; echo ' ₹ '.$total_dis; ?></td>
 															</tr>
 															<tr>
 																<td>Shipping</td>
 																
 																<td><?php echo ' ₹ '.$invoice_detail[0]->shipping_charge; ?></td>
 															</tr>
 															<tr>
 																<td>Sub Total</td>
 																
 																<td><b><?php echo ' ₹ '.$invoice_detail[0]->grand_total; ?></b></td>
 															</tr>
 															<tr>
 																<td>Payment Made</td>
 																
 																<td><?php echo ' ₹ 0'?></td>
 															</tr>
 															<tr>
 																<td>Balance Due</td>
 																
 																<td><?php echo ' ₹ 0'?></td>
 															</tr>
 														</tbody>
 													</table>
 													
 												</div>
 												<span class="pt-5 pl-3" style="font-size: 16px; font-weight: bold;">Authorized person :</span><br/>
 												&nbsp;&nbsp;&nbsp;<img  src="<?php echo base_url();  ?>assets/images/sign.jpg" alt="" width="200px" height="60px" class="pt-2 img-thumbnail"><br/>
 												<span class="pl-3" style="font-size: 15px;"><?php echo '('.$admin[0]->name.')' ?></span><br/>
 												<?php foreach ($admin_role as $key) {
 													if($key->role_id==$admin[0]->role_id){
 														$role_name=$key->role_name;
 													}
 												} ?>
 												<span class="pl-3" style="font-size: 15px;"><?php echo '&nbsp;'.$role_name ?></span>
 											</div>

 										</div>


 									</div>
 									<div class="row">
 										<div class="col-md-12">
 											<span style="color: #000; font-weight: bold; font-size: 17px;">Terms & Condition</span><hr/>
 											<?php $termcon=$term_con($invoice_detail[0]->payment_terms) ?>
 											<?php if(!empty($termcon)){?>
 												<span style="color: #e2134b; font-weight: bold; font-size: 15px; "><?php	echo $termcon[0]->term_con_name; ?></span><br/>
 												<span>
 													<?php	echo $termcon[0]->term_condition; ?>
 													</span><?php	} ?>
 												</div>
 											</div>

 										</div>
 										
 									</div>
 								</div>
 							</div>
</body>