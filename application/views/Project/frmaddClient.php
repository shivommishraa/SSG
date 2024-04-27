 <div class="dashboard-wrapper">
 	<div class="dashboard-ecommerce">
 		<div class="container-fluid dashboard-content ">
 			<div class="row">
 				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
 					<div class="page-header">
 						<h2 class="pageheader-title">Add Client</h2>

 						<div class="page-breadcrumb">
 							<nav aria-label="breadcrumb">
 								<ol class="breadcrumb">
 									<li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
 									<li class="breadcrumb-item"><a href="">Project</a></li>
 									<li class="breadcrumb-item "><a href="">Add Client</a></li>

 								</ol>
 							</nav>
 						</div>
 					</div>
 				</div>
 			</div>
 			<div class="row">
 				<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
 					<div class="card">
 						<h5 class="card-header">
 							<div class="row col-md-12 ">
 								<div class="col-md-4 pt-3"></div>
 								<div class="col-md-4 pt-3"></div>
 								<div class="col-md-4 pt-3 text-right">
 									<button class="btn btn-sm btn-primary"  onClick="return redirect('<?php echo base_url(); ?>Project/ProjectController/projectlist');"><i class="fa fa-list" aria-hidden="true"></i> List Project</button>
 								</div>
 							</div>
 						</h5>
 						<form role="form" method="post"class="needs-validation" novalidate="" action="<?php echo base_url()?>Project/ProjectController/addclient" enctype="multipart/form-data"></html>
 							<div class="card-body text-white" style="background-color: #e2f7e8;"> 
 								<div class="row" >  
 									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12  ">
 										<span style="color: #000; font-size: 20px;">Billing Address</span>
 									</div>      
 									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-2 ">
 										<label for="name">Name</label>
 										<span style="color: red;"><?php echo form_error('cus_name'); ?></span>
 										<input type="text" required="" value="<?php echo set_value('cus_name'); ?>"  class="form-control" id="cus_name" name="cus_name" placeholder="Client Name ">

 										<div class="invalid-feedback">Please fill the customer name.</div>
 									</div>	
 									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mt-2">
 										<label for="name">Phone</label>
 										<span style="color: red;"><?php echo form_error('cus_mobile'); ?></span>
 										<input type="number" required="" value="<?php echo set_value('cus_mobile'); ?>"class="form-control" id="cus_mobile" name="cus_mobile" placeholder="Enter Phone Number">
 										<div class="valid-feedback"> Looks good!</div>
 										<div class="invalid-feedback">Please fill the phoner number.</div>
 									</div>
 									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-2">
 										<label for="fname">Email</label>
 										<span style="color: red;"><?php echo form_error('cus_email'); ?></span>
 										<input type="email" required=""  value="<?php echo set_value('cus_email'); ?>" class="form-control" id="cus_email" name="cus_email" placeholder="Enter Email">
 										<div class="valid-feedback"> Looks good!</div>
 										<div class="invalid-feedback">Please fill the email id.</div>
 									</div>


 								
 									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12  mt-2">
 										<label for="name">Address</label>
 										<span style="color: red;"><?php echo form_error('cus_address'); ?></span>
 										<textarea required="" value="<?php echo set_value('cus_address'); ?>"  class="form-control" id="cus_address" name="cus_address" placeholder="Enter Address"><?php echo set_value('cus_address'); ?></textarea>

 										<div class="invalid-feedback">Please fill the address.</div>
 									</div>


 									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
 										<label for="validationCustom01">Pin </label>
 										<input type="text" required=""  value="<?php echo set_value('pin'); ?>" class="form-control" id="pin" name="pin" placeholder="Enter Postbox pin">

 									</div>

 									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
 										<label for="validationCustom01">Country</label>
 										
 										<input type="text" required="" readonly="" class="form-control" value="India" id="cus_country" name="cus_country" placeholder="Enter Country">

 									</div>

 									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
 										<label for="validationCustom04">State</label>
 										<select   name="cus_state" value="<?php echo set_value('cus_state'); ?>" id="cus_state" class="form-control">
 											<option value="">Select Option</option>
 											<?php foreach ($State as $key) {?>
 												<option value="<?php echo $key->state_id; ?>"<?php if($key->state_id==set_value('cus_state')){ echo "selected"; } ?>><?php echo $key->state_name; ?></option>
 											<?php  } ?>

 										</select>

 									</div>
 									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 mt-2">
 										<label for="name">City</label>
 										<span style="color: red;"><?php echo form_error('cus_city'); ?></span>
 										<input type="text" required="" value="<?php echo set_value('cus_city'); ?>"class="form-control" id="city" name="cus_city" placeholder="Enter City">
 										<div class="valid-feedback"> Looks good!</div>
 										<div class="invalid-feedback">Please fill the City name.</div>
 									</div>
 										<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 mt-2">
 										<label for="name">Company</label>
 										<span style="color: red;"><?php echo form_error('company'); ?></span>
 										<input type="text" required="" value="<?php echo set_value('company'); ?>"class="form-control" id="company" name="company" placeholder="Enter company">
 										<div class="valid-feedback"> Looks good!</div>
 										<div class="invalid-feedback">Please fill the company name.</div>
 									</div>
 									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 mt-2">
 										<label for="fname">Tax Id</label>
 										<span style="color: red;"><?php echo form_error('tax_id'); ?></span>
 										<input type="text" required=""  value="<?php echo set_value('tax_id'); ?>" class="form-control" id="tax_id" name="tax_id" placeholder="Enter Tax Id">
 										<div class="valid-feedback"> Looks good!</div>
 										<div class="invalid-feedback">Please fill the tax id.</div>
 									</div>


 									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12  mt-2">
 										<span style="color: #000; font-size: 20px;">Shipping Address</span>
 									</div>   
 									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12  mt-2">
 										<input type="checkbox" value="<?php echo set_value('cus_check'); ?>" onchange= "addressFunction()"  id="same" name="same" placeholder="Enter Postbox pin"><span style="color: #195db3;"> Same As Billing
 										Please leave Shipping Address blank if you do not want to print it on the invoice.</span>

 									</div>
 													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-2 ">
 										<label for="name">Name</label>
 										<span style="color: red;"><?php echo form_error('cus_name'); ?></span>
 										<input type="text" required="" value="<?php echo set_value('same_name'); ?>"  class="form-control" id="same_name" name="same_name" placeholder="Client Name ">

 										<div class="invalid-feedback">Please fill the customer name.</div>
 									</div>	
 									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 mt-2">
 										<label for="name">Phone</label>
 										<span style="color: red;"><?php echo form_error('same_mobile'); ?></span>
 										<input type="number" required="" value="<?php echo set_value('same_mobile'); ?>"class="form-control" id="same_mobile" name="same_mobile" placeholder="Enter Phone Number">
 										<div class="valid-feedback"> Looks good!</div>
 										<div class="invalid-feedback">Please fill the phoner number.</div>
 									</div>
 									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-2">
 										<label for="fname">Email</label>
 										<span style="color: red;"><?php echo form_error('same_email'); ?></span>
 										<input type="email" required=""  value="<?php echo set_value('same_email'); ?>" class="form-control" id="same_email" name="same_email" placeholder="Enter Email">
 										<div class="valid-feedback"> Looks good!</div>
 										<div class="invalid-feedback">Please fill the email id.</div>
 									</div>


 								
 									<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12  mt-2">
 										<label for="name">Address</label>
 										<span style="color: red;"><?php echo form_error('same_address'); ?></span>
 										<textarea required="" value="<?php echo set_value('same_address'); ?>"  class="form-control" id="same_address" name="same_address" placeholder="Enter Address"></textarea>

 										<div class="invalid-feedback">Please fill the address.</div>
 									</div>


 									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
 										<label for="validationCustom01">Pin </label>
 										<input type="text" required=""  value="<?php echo set_value('same_pin'); ?>" class="form-control" id="same_pin" name="same_pin" placeholder="Enter Postbox pin">

 									</div>

 									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
 										<label for="validationCustom01">Country</label>
 									
 										<input type="text" required="" readonly="" value="India"class="form-control" id="same_country" name="same_country" placeholder="Enter Country">
 									</div>

 									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 pt-2">
 										<label for="validationCustom01">State</label>
 										<select   name="same_state" value="<?php echo set_value('same_state'); ?>" id="same_state"class="form-control">
 											<option value="">Select Option</option>
 											<?php foreach ($State as $key) {?>
 												<option value="<?php echo $key->state_id; ?>"<?php if($key->state_id==set_value('cus_state')){ echo "selected"; } ?>><?php echo $key->state_name; ?></option>
 											<?php  } ?>

 										</select>

 									</div>
 									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 mt-2">
 										<label for="same_city">City</label>
 										<span style="color: red;"><?php echo form_error('same_city'); ?></span>
 										<input type="text" required="" value="<?php echo set_value('same_city'); ?>"class="form-control" id="same_city" name="same_city" placeholder="Enter City">
 										<div class="valid-feedback"> Looks good!</div>
 										<div class="invalid-feedback">Please fill the City name.</div>
 									</div>
 										

 								</div>


 								<div class="form-row ">
 									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-2">
 										<button type="submit" class="btn btn-success pt-2">Submit</button>
 									</div>
 								</div>
 							</form>
 						</div>       
 					</div>
 				</div>
 			</section>   
 		</div>
 	</div>
 </body>
<script> 
function addressFunction() 
{ 
  if (document.getElementById('same').checked) 
  { 
    document.getElementById('same_name').value=document.getElementById('cus_name').value; 
    document.getElementById('same_email').value=document.getElementById('cus_email').value; 
    document.getElementById('same_mobile').value=document.getElementById('cus_mobile').value; 
    document.getElementById('same_address').value=document.getElementById('cus_address').value; 
    document.getElementById('same_pin').value=document.getElementById('pin').value; 
    document.getElementById('same_country').value=document.getElementById('cus_country').value; 
    document.getElementById('same_city').value=document.getElementById('city').value; 
     var y = document.getElementById("cus_state").selectedIndex;
    document.getElementById('same_state').value = y;
  

   
  } 
      
  else
  { 
    document.getElementById('same_name').value=""; 
    document.getElementById('same_email').value=""; 
    document.getElementById('same_mobile').value=""; 
    document.getElementById('same_address').value=""; 
    document.getElementById('same_pin').value=""; 
    document.getElementById('same_city').value=""; 
    document.getElementById('same_state').value=""; 
    document.getElementById('same_country').value=""; 
   
  } 
} 
</script> 