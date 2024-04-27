 <div class="dashboard-wrapper">
  <div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">

      <div class="row">
       <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card alert alert-dangers">

          <?php if($this->session->flashdata('success')){ ?>
            <div class="alert col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3" style="background-color: #fff4af;">
             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
              <strong style="font-size: 18px; color: #000;"><span class="glyphicon glyphicon-ok"></span>
                <?php echo $this->session->flashdata('success'); ?></strong>
              

                 <button class="btn btn-sm btn-success pt-2 ml-2"  onClick="return redirect('<?php echo site_url(); ?>Invoice/InvoiceController/viewInvoice/<?php echo $invoice_id ?>');"><i class="fa fa-eye"></i> View</button>

               <button class="btn btn-sm btn-success pt-2"  onClick="return redirect('<?php echo site_url(); ?>Invoice/InvoiceController/printInvoice/<?php echo $invoice_id; ?>');"style="background-color: #2e52c5; color: #fff;"><i class="fa fa-print" aria-hidden="true"> </i> Print</button>
                <button class="btn btn-sm pt-2"  onClick="return redirect('<?php echo site_url(); ?>PDF/Pdf_invoice/pdfInvoice/<?php echo $invoice_id; ?>');" style="background-color: #c51181; color: #fff;"><i class="fas fa-file-pdf" aria-hidden="true"> </i> PDF</button>
                
                   <button class="btn btn-sm pt-2"  onClick="return redirect('<?php echo site_url(); ?>Project/ProjectController/frmProjectInvoice/<?php echo $Project[0]->pr_id ?>');" style="background-color: #ec5c0e; color: #fff;"><i class="fa fa-plus"></i> New Invoice</button>
               
                 <button class="btn btn-sm pt-2"  onClick="return redirect('<?php echo site_url(); ?>Project/ProjectController/projectlist');" style="background-color: #a650fb; color: #fff;"><i class="fa fa-list"></i> List Project</button>
              </div>


            <?php } ?>

          </div>
        </div>

      </div>
    </div>
  </div>
</div>
</div>


<!--Code start for print the data from database in popup box -->


<div class="modal modal-light   displaycontent" id="modal-info">
  <?php //include('adminviewpopup.php'); ?>
</div>
<script src="<?php echo base_url()  ?>Custom_JS/Role/role_js.js" type="text/javascript"></script>
<script type="text/javascript">
 var baseURL ='<?php echo base_url();  ?>'
</script>

<!--Code End for print the data from database in popup box -->
