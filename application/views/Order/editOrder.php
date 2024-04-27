 <div class="dashboard-wrapper">
  <div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="page-header">
            <h2 class="pageheader-title">Update Order</h2>
            <div class="page-breadcrumb">
             <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="">Order</a></li>
              </ol>
            </nav>
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
           <div class="col-md-4"></div>
           <div class="col-md-4 "></div>
           <div class="col-md-4 text-right">
             <button class="btn btn-sm btn-primary"  onClick="return redirect('<?php echo site_url(); ?>Order/OrderController/manageorder');"><i class="fa fa-list" aria-hidden="true"></i> Manage Order</button>
           </div>
         </div>
       </h5>
       <div class="card-body">
        <form role="form" class="needs-validation" novalidate  method="post" action="<?php echo site_url()?>Order/OrderController/updateOrderDetails" enctype="multipart/form-data">
          <input type="hidden" value="<?php echo $order[0]->id ?>"   name="id">
	        <div class="row">
	            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 ">
	             <label for="validationCustom01">Customer Name:</label>
	             <input type="text" id="validationCustom01" value="<?php echo $order[0]->name ?>" required="Customer Name" placeholder="Customer Name" class="form-control" name="name">
	             <div class="valid-feedback">
	              Looks good!
	            </div>
	          </div>
	           <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 ">
	             <label for="validationCustom01">Customer Mobile:</label>
	             <input type="text" id="validationCustom01" value="<?php echo $order[0]->mobile ?>" required="Customer Mobile" placeholder="Customer Mobile" class="form-control" name="mobile">
	             <div class="valid-feedback">
	              Looks good!
	            </div>
	          </div>
	      	</div>
	      	<div class="row">
	           <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-2">
	             <label for="validationCustom01">Address:</label>
	             <input type="text" id="validationCustom01" value="<?php echo $order[0]->address ?>" required="Customer Address" placeholder="Customer Address" class="form-control" name="address">
	             <div class="valid-feedback">
	              Looks good!
	            </div>
	          </div>
	      	</div>
	      	<div class="row">
	           <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-2">
	             <label for="validationCustom01">Products:</label>
	             <textarea  id="validationCustom01" required="Product Details" placeholder="Product Details" class="form-control" name="products"><?php echo $order[0]->products ?></textarea>
	             <div class="valid-feedback">
	              Looks good!
	            </div>
	          </div>
	      	</div>
      <div class="form-row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-2 pt-2">
          <button class="btn btn-primary" type="submit">Update Order</button>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
</div>
</div>
</div>
