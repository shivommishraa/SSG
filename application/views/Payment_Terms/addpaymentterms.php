<div class="dashboard-wrapper">
  <div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="page-header">
            <h2 class="pageheader-title">Add Payment Terms</h2>

            <div class="page-breadcrumb">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="">Payment Termas</a></li>
                  <li class="breadcrumb-item "><a href="">Add Payment Terms</a></li>

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
                 <button class="btn btn-sm btn-primary"  onClick="return redirect('<?php echo site_url(); ?>Payment_Terms/Payment_Controller/manage_paymentterms');"><i class="fa fa-list" aria-hidden="true"></i> Manage Payment Terms</button>
               </div>
             </div>
           </h5>
           <div class="card-body">
            <form class="needs-validation" novalidate  method="post" action="<?php echo site_url()?>Payment_Terms/Payment_Controller/addTbl_paycon">

              <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">


                 <label for="validationCustom01">Payment Terms:</label>
                 <input type="text" class="form-control" required id="validationCustom01" placeholder="" name="term_con_name" required="">
                  <div class="valid-feedback"> Looks good! </div>
                  <div class="invalid-feedback">Please fill the payment term name.</div>
              </div>



              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 pt-3 ">
                <label for="validationCustom01">Payment Condition:</label>
                <label class="control-label sr-only" for="summernote">Descriptions </label>
                <textarea class="form-control" required="" id="summernote" name="term_condition" rows="6" placeholder="Write Descriptions"><?php //echo $Project[0]->pr_note; ?></textarea>
              </div><div class="valid-feedback">Looks good! </div>
              <div class="invalid-feedback">Please select member.</div>
            </div> 

            <!-- ==========Start Script for Note text editor ====================== -->
            <script type="text/javascript">
             $(document).ready(function() {
              $('#summernote').summernote({
                height: 300

              });   
            });
          </script>



          <div class="form-row pt-2">


           <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-2 "> <button class="btn btn-success" type="submit"><i class="fas fa-angle-double-up"></i> Submit</button> </div> 

         </div>
       </form>
     </div>
   </div>
 </div>
</div>
</div>
</div>
