 <style type="text/css">
 tr:nth-child(odd) {
  background: #b8d1f3;
}
/*background color for all the EVEN background rows  */
tr:nth-child(even) {
  background: #dae5f4;
}
input{
  border-radius: 20px;
}

</style><body onload="loadImage()">
<div class="dashboard-wrapper">
  <div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="page-header">
            <h2 class="pageheader-title">Add Invoice</h2>

            <div class="page-breadcrumb">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="">Project</a></li>
                  <li class="breadcrumb-item "><a href="">Create Invoice</a></li>

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
                 <button class="btn btn-sm btn-primary"  onClick="return redirect('<?php echo base_url(); ?>Project/ProjectController/frmaddClient');"><i class="fa fa-plus" aria-hidden="true"></i> Add Client</button>
               </div>
             </div>
           </h5>
           <form role="form" method="post"class="needs-validation" novalidate="" action="<?php echo base_url()?>Invoice/InvoiceController/addInvoices" enctype="multipart/form-data"></html>
            <div class="card-body text-white" style="background-color: #e2f5f7;"> 
               <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12  ">
                 <div class="p-2 text-white" id="alertdiv" >
                 </div></div></div>
             <div class="row" >   
             
               <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12  ">
             
                <span style="color: #000; font-size: 18px;"><?php echo form_error(''); ?>Bill To</span>
              </div> 
              <input type="hidden" name="pr_id" value="<?php echo $Project[0]->pr_id; ?>">    
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6  pt-2">
                <label for="name">Search Client</label>
                <span style="color: red;"><?php echo form_error('pr_title'); ?></span>
                <input type="text" required=""  value="<?php echo set_value('client_name'); ?>"  class="form-control" id="client_name" name="client_name" placeholder="Enter client name or mobile number to search. ">

                <div class="invalid-feedback">Please fill the client name.</div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6  pt-2">
                <label for="name">Warehouse</label>
                <span style="color: red;"><?php echo form_error('warehouse'); ?></span>
                <select required=""   class="form-control " id="" name="warehouse">
                  <option>Select Option</option>
                  <?php foreach ($warehouse as $key) {?>
                   <option value="<?php echo $key->location_id ?>"><?php echo $key->location_name ?></option>
                 <?php  } ?>
               </select>

               <div class="invalid-feedback">Please fill the client name.</div>
             </div>

             <div id="classes"class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-2"  >
             </div>

             <input type="hidden" name="client_id" id="client_id">
             

              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12  ">
                <span style="color: #000; font-size: 18px;">Invoice Properties</span>
              </div>

              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6  pt-2">
                <label for="name">Invoice Number</label>
                <span style="color: red;"><?php echo form_error('inc_number'); ?></span>
                <input type="text" required="" value="<?php echo set_value('inc_number'); ?>"  class="form-control" id="" name="inc_number" placeholder="Enter Invoice Number . ">

                <div class="invalid-feedback">Please fill the client name.</div>
              </div>

              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6  pt-2">
                <label for="name">Reference</label>
                <span style="color: red;"><?php echo form_error('inc_reference'); ?></span>
                <input type="text" required="" value="<?php echo set_value('inc_reference'); ?>"  class="form-control" id="" name="inc_reference" placeholder="Enter Reference #. ">

                <div class="invalid-feedback">Please fill the client name.</div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6  pt-2">
                <label for="name">Invoice Date</label>
                <span style="color: red;"><?php echo form_error('inc_date'); ?></span>
                <input type="date" required="" value="<?php if(!empty(set_value('inc_date'))){ echo set_value('inc_date');}else{ echo date('Y-m-d');} ?>"  class="form-control" id="" name="inc_date" placeholder="Enter Invoice Date . ">

                <div class="invalid-feedback">Please fill the client name.</div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6  pt-2">
                <label for="name">Invoice Due Date</label>
                <span style="color: red;"><?php echo form_error('inc_due_date'); ?></span>
                <input type="date" required="" value="<?php if(!empty(set_value('inc_due_date'))){ echo set_value('inc_due_date');}else{ echo date('Y-m-d');} ?>"  class="form-control" id="" name="inc_due_date" placeholder="Enter Invoice Due Date . ">

                <div class="invalid-feedback">Please fill the client name.</div>
              </div>

              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6  pt-2">
                <label for="name">Tax</label>
                <span style="color: red;"><?php echo form_error('inc_tax'); ?></span>
                <select required="" value="<?php echo set_value('inc_tax'); ?>"  class="form-control " id="" name="inc_tax">
                  <option value="">Select Option</option>
                  <?php foreach ($All_tax as $key) {?>
                   <option value="<?php $key->tax_id ?>"><?php echo $key->tax_name ?></option>
                 <?php   } ?>
               </select>

               <div class="invalid-feedback">Please fill the client name.</div>
             </div>

             <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6  pt-2">
              <label for="name">Discount</label>
              <span style="color: red;"><?php echo form_error('inc_discount'); ?></span>
              <input type="text" required="" value="<?php echo set_value('inc_discount'); ?>"  class="form-control" id="" name="inc_discount" placeholder="Enter Discount . ">

              <div class="invalid-feedback">Please fill the client name.</div>
            </div>

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12  pt-2">
              <label for="name">Invoice Note</label>
              <span style="color: red;"><?php echo form_error('inc_note'); ?></span>
              <textarea required="" value="<?php echo set_value('inc_note'); ?>"  class="form-control" id="" name="inc_note" placeholder="Enter Invoice Note. "></textarea>

              <div class="invalid-feedback">Please fill the client name.</div>
            </div>
            <!-- ================ Code add===================================== -->

            <div class="table-responsive mt-3">

              <table class="table table-bordered table-hover " id="tbl_posts">
                <thead>
                  <tr style="color: #fff; background-color: #7caff5;">

                    <th width="400px">Item Name</th>
                    <th width="200px">Rate</th>
                    <th width="150px">Quantity</th>
                    <th width="200px">Discount(%)</th>
                    <th width="150px">Tax(%)</th>
                    <th width="200px">Total Tax</th>
                    <th width="200px">Amount (₹)</th>
                    <th>Action</th>

                  </tr>
                  <tr> <hr/ style="background-color: #9696f5;"></tr>
                </thead>
                <tbody id="tbl_posts_body">

          <tr id="rec-2">
            <td><input type="text"  class="form-control itm_name" name="itm_name[]"></td>
            <td><input type="number"  value="0" class="form-control itm_rate" name="itm_rate[]"></td>
            <td><input type="number" value="1"  class="form-control itm_qty" name="itm_qty[]"></td>
            <td><input type="number" value="0"  class="form-control itm_discount" name="itm_discount[]"></td>
            
            <td><input type="number" value="0" class="form-control itm_tax_per" name="itm_tax_per[]"></td>
            <td><input type="number" value="0" readonly=""  class="form-control itm_tax" name="itm_tax[]"></td>
            
            <td><input type="number" value="0" readonly=""  class="form-control itm_amount" name="itm_amount[]"></td>
           <tr>
             <td colspan="8"><textarea class="form-control" name="itm_remark[]"></textarea></td>
           </tr>   
                    </tr>
                  </tbody>
                </table>
              </div>

              <div class="well clearfix ml-3 mt-2">
                <a class="btn btn-success pull-right add-record" data-added="0"><i class="fa fa-plus"> </i> Add Row</a>
              </div>
              <div style="display:none;" id="rec-">
                <table id="sample_table">
                  <tbody>
                    <tr id="row">
                     <td><input type="text" id="" class="form-control itm_name" name="itm_name[]"></td>
                     <td><input type="number" value="0"  onkeyup="calcuation()" class="form-control itm_rate" name="itm_rate[]"></td>
                     <td><input type="number" value="1" id="itm_qty-"  onkeyup="calcuation()" class="form-control itm_qty" name="itm_qty[]"></td>
                     <td><input type="number" value="0"  onkeyup="calcuation()" class="form-control itm_discount" name="itm_discount[]"></td>
                     
                     <td><input type="number" value="0"  onkeyup="calcuation()" class="form-control itm_tax_per" name="itm_tax_per[]"></td>
                     <td><input type="number" readonly=""  value="0" onkeyup="calcuation()" class="form-control itm_tax" name="itm_tax[]"></td>
                     
                     <td><input type="number" readonly="" value="0" onkeyup="calcuation()" class="form-control itm_amount" name="itm_amount[]"></td>
                     <td><a class="btn btn-xs delete-record nvh" data-id="0" ><i class="fa fa-trash"style="color: red;"></i></a></td>
                     <tr>
                      <td colspan="8"><textarea class="form-control" name="itm_remark[]"></textarea></td>
                    </tr>
                  </tr>
                </tbody>

              </table>
            </div>
            <!-- ================= Code end=========================================== -->

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6  pt-2"></div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6  pt-2"></div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3  pt-2 text-right">
              <label for="name">Total Tax</label></div>
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3  pt-2 text-left">
                <span style="color: gray;" value="0" name="total_tax">₹ 0</span>
              </div>

              <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6  pt-2"></div>
              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3  pt-2 text-right">
                <label for="name">Total Discount</label></div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3  pt-2 text-left">
                  <span style="color: gray;" value="0" name="total_discount">₹ 0</span>
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6  pt-2"></div>
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3  pt-2 text-right">
                  <label for="name">Shipping</label></div>
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3  pt-2 text-left">
                    <span style="color: red;"><?php echo form_error('shipping_charge'); ?></span>
                    <input type="text" required="" value="<?php if(!empty(set_value('shipping_charge'))){echo set_value('shipping_charge');}else{echo "0";} ?>"  class="form-control" id="" name="shipping_charge" placeholder="Enter Shipping Charge . ">
                    <div class="invalid-feedback">Please fill the shipping charge.</div>
                  </div>

                  <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6  pt-2"></div>
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3  pt-2 text-right">
                    <label for="name">Extra Discount</label></div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3  pt-2 text-left">

                      <span style="color: red;"><?php echo form_error('extra_discount'); ?></span>
                      <input type="text" required="" value="<?php if(!empty(set_value('extra_discount'))){echo set_value('extra_discount');}else{echo "0";} ?>"  class="form-control" id="" name="extra_discount" placeholder="Enter Extra Discount. ">

                      <div class="invalid-feedback">Please fill the extra discount.</div>
                    </div>



                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6  pt-2">
                      <label for="name">Select Employee </label>
                      <select required="" value="<?php echo set_value('user_id'); ?>"  class="form-control " id="" name="user_id">
                       <option value="">Select Option</option>
                       <?php foreach ($All_agent as $key) {?>
                         <option value="<?php echo $key->admin_id ?>"><?php echo $key->name ?></option>
                       <?php   } ?>
                     </select>
                   </div>
                   <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3  pt-2 text-right">
                    <label for="name">Grand Total (₹)</label></div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3  pt-2 text-left">
                      <span style="color: red;"><?php echo form_error('grand_total'); ?></span>
                      <input type="text" required="" readonly="" value="<?php echo set_value('grand_total'); ?>"  class="form-control" id="" name="grand_total">
                      <div class="invalid-feedback">Please fill the grand total.</div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-2">
                      <label for="name">Payment Terms</label>
                      <select required="" value="<?php echo set_value('payment_terms'); ?>"  class="form-control " id="" name="payment_terms">
                        <option>Payment On Receipt</option>
                      </select>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 text-right mt-2 mt-4">
                      <button type="submit" onclick="checkvalidate()" class="btn btn-primary pt-2 ">Genrate Invoice</button>
                    </div>

                  </div>
                  <div class="form-row ">

                  </div>
                </form>
              </div>       
            </div>
          </div>
        </section>   
      </div>
    </div>
  </body>
<script type="text/javascript">
$(document).ready(function(){
   calcuationReload();
});
  


    function calcuationReload() {
      
         $('.itm_qty').keyup(function(){ recalculaterow(this)});
         $('.itm_discount').keyup(function(){ recalculaterow(this)});
         $('.itm_tax_per').keyup(function(){ recalculaterow(this)});
         $('.itm_rate').keyup(function(){ recalculaterow(this)});


    }
function recalculaterow(vthis){

        var itm_qty = $(vthis).closest('tr').find('.itm_qty').val(); 
        var itm_tax_per = $(vthis).closest('tr').find('.itm_tax_per').val(); 
        var itm_tax = $(vthis).closest('tr').find('.itm_tax').val(); 
        var itm_rate = $(vthis).closest('tr').find('.itm_rate').val(); 
        var itm_discount = $(vthis).closest('tr').find('.itm_discount').val(); 
        var itm_amount = $(vthis).closest('tr').find('.itm_amount').val(); 
        var disP=itm_rate-((itm_rate*itm_discount)/100);
        var tax=((disP*itm_tax_per)/100);
        var Totaltax=((disP*itm_tax_per)/100)*itm_qty;
        var amount=disP+tax;
        var Totalamount=amount*itm_qty;
        $(vthis).closest('tr').find('.itm_tax').val(Totaltax);
        $(vthis).closest('tr').find('.itm_amount').val(Totalamount);
}

</script>
  <!-- ===================== Start code for after search the client data ============ -->
  <script type="text/javascript">
    function loadImage() { document.getElementById("alertdiv").style.visibility = "hidden";   
   }
   $(document).ready(function(){ 
    $('#client_name').keyup(function(){ 
     $('#classes').show();     
     var client_namee = $('#client_name').val(); 
     document.getElementById("alertdiv").style.visibility = "visible";
     $('#client_id').val("");
     $.ajax({
      type: "POST",
      url: "<?php echo base_url(); ?>Project/ProjectController/findclientdata",
      data: {client_name:client_namee},
      success: function(classes) 
      { 

        if(!$.trim(classes)){

         $('#classes').html("");
         $("#grades").val("");
       }else{

        $('#classes').html(classes);

      }
    }        
  });

   });

  });

function checkvalidate()
{
var client_id=document.getElementById("client_id").value; 
if(client_id=="")
{
document.getElementById("client_name").innerHTML=" ";
document.getElementById("alertdiv").style.visibility = "visible";
document.getElementById("alertdiv").innerHTML="Please add a new client or search from a previous added!";
document.getElementById("client_name").focus();
document.getElementById("alertdiv").style.backgroundColor="#e24444";
}
else
{
//alert(client_id);
document.getElementById("client_id").innerHTML=" ";
document.getElementById("classes").style.backgroundColor="";
document.getElementById("alertdiv").style.visibility = "hidden";
}

}

</script>

<!-- ========= End code for after search the client data ======= -->

<!-- ================= start js code for add table =============== -->

<script type="text/javascript">
  jQuery(document).delegate('a.add-record', 'click', function(e) {
   e.preventDefault(); 
   var content = jQuery('#sample_table tbody tr'),
   size = jQuery('#tbl_posts >tbody >tr').length + 1,
   element = null,    
   element = content.clone();
   element.attr('id', 'rec-'+size);
   element.find('.delete-record').attr('data-id', size);
   element.appendTo('#tbl_posts_body');
   element.find('.sn').html(size);
  
calcuationReload();
 });


  jQuery(document).delegate('a.delete-record', 'click', function(e) {
   e.preventDefault();    
   var didConfirm = confirm("Are you sure You want to delete");
   if (didConfirm == true) {
    var id = jQuery(this).attr('data-id');
    var targetDiv = jQuery(this).attr('targetDiv');
    jQuery('#rec-' + id).remove();
    jQuery('#rec-' + id).remove();
    //regnerate index number on table
    $('#tbl_posts_body tr').each(function(index) {
      //alert(index);
      $(this).find('span.sn').html(index+1);
    });
    return true;
  } else {
    return false;
  }
});



</script>

<!-- ================= end js code for add table ========================= -->
