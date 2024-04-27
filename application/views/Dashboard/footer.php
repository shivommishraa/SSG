 <!--<div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                             Copyright © 2020 Neodigitech. All rights reserved. Dashboard by <a href="https://neodigitech.com/">Neodigitech Innovations (P) LTD.</a>.
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    

    <script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()  ?>Custom_JS/Photo/photo-gallery.js" type="text/javascript"></script>
    <script src="<?php echo base_url()  ?>Custom_JS/Photo/product_image.js" type="text/javascript"></script>

    <!----------------------------------  Form JS ------------------------------>
    <script src="<?php echo base_url()  ?>Custom_JS/Form/form_validation.js" type="text/javascript"></script>

    <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery-3.3.1.min.js"></script>
  
    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
  
    <script src="<?php echo base_url(); ?>assets/vendor/slimscroll/jquery.slimscroll.js"></script>
   
    <script src="<?php echo base_url(); ?>assets/libs/js/main-js.js"></script>
 
    <script src="<?php echo base_url(); ?>assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
   
    <script src="<?php echo base_url(); ?>assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    
    <script src="<?php echo base_url(); ?>assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/charts/morris-bundle/morris.js"></script>
  
    <script src="<?php echo base_url(); ?>assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="<?php echo base_url(); ?>assets/libs/js/dashboard-ecommerce.js"></script>


    <script src="<?php echo base_url(); ?>assets/vendor/datatables/js/data-table.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/libs/js/main-js.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datepicker/moment.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datepicker/tempusdominus-bootstrap-4.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datepicker/datepicker.js"></script>
    

    <script src="<?php echo base_url(); ?>assets/vendor/bootstrap-select/js/bootstrap-select.js"></script>

     <script src="<?php echo base_url(); ?>assets/vendor/inputmask/js/jquery.inputmask.bundle.js"></script>
    
    <script src="<?php echo base_url(); ?>assets/vendor/summernote/js/summernote-bs4.js"></script>

    <script src="<?php echo base_url(); ?>assets/vendor/select2/js/select2.min.js"></script>
     <script type="text/javascript">
         
        

  
    $(function(e) {
        "use strict";
        $(".date-inputmask").inputmask("dd/mm/yyyy"),
            $(".phone-inputmask").inputmask("(999) 999-9999"),
            $(".international-inputmask").inputmask("+9(999)999-9999"),
            $(".xphone-inputmask").inputmask("(999) 999-9999 / x999999"),
            $(".purchase-inputmask").inputmask("aaaa 9999-****"),
            $(".cc-inputmask").inputmask("9999 9999 9999 9999"),
            $(".ssn-inputmask").inputmask("999-99-9999"),
            $(".isbn-inputmask").inputmask("999-99-999-9999-9"),
            $(".currency-inputmask").inputmask("$9999"),
            $(".percentage-inputmask").inputmask("999%"),
            $(".decimal-inputmask").inputmask({
                alias: "decimal",
                radixPoint: "."
            }),

            $(".email-inputmask").inputmask({
                mask: "*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[*{2,6}][*{1,2}].*{1,}[.*{2,6}][.*{1,2}]",
                greedy: !1,
                onBeforePaste: function(n, a) {
                    return (e = e.toLowerCase()).replace("mailto:", "")
                },
                definitions: {
                    "*": {
                        validator: "[0-9A-Za-z!#$%&'*+/=?^_`{|}~/-]",
                        cardinality: 1,
                        casing: "lower"
                    }
                }
            })
    });
  
         
     </script>

</body>

</html>