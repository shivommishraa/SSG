   <?php $allowed=0;if(!empty($allowed_page_permission)){
     $str = $allowed_page_permission[0]->setting_value;
     $value=explode(",",$str);
     foreach ($value as $key) {
      if($admin[0]->role_id==$key){ $allowed++; }}} ?>
      <?php if($allowed!=0) {?>
        <div class="dashboard-wrapper">
          <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content ">
              <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                  <div class="page-header">
                    <h2 class="pageheader-title">Permission</h2>
                    
                    <div class="page-breadcrumb">
                      <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                          <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                          <li class="breadcrumb-item"><a href="">Permission</a></li>
                          
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
                         <button class="btn btn-sm btn-primary"  onClick="return redirect('<?php echo site_url(); ?>Dashboard');"><i class="fa fa-list" aria-hidden="true"></i> Dashboard</button>
                       </div>
                     </div>
                   </h5>
                   <div class="card">    
                    <div class="card-body">
                     <?php if($this->session->flashdata('success')){ $uurl=$_SERVER["PHP_SELF"]; ?>
                     <div class="alert alert-success">
                      <strong><span class="glyphicon glyphicon-ok"></span>   <?php echo $this->session->flashdata('success'); ?></strong>
                      <button type="button"  onClick="return redirect('<?php echo  $uurl; ?>');"class="close" data-dismiss="modal" aria-label="Close">  
                       <span aria-hidden="true">&times;</span></button>
                     </div>
                   <?php } ?>
                   <form role="form" method="post" action="<?php echo site_url()?>Dashboard/save_pages" enctype="multipart/form-data"></html>
                    <div class="box-body">          
                      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 " id="adname">
                        <label for="name">Permission:</label>
                        <select class="form-control" id="name" name="admin_role" class="names">
                          <option value="">-- Select Role --</option>
                          <?php  foreach($admin_role as $role_admin){ ?>
                            <option value="<?php echo $role_admin->role_id  ?>"><?php echo $role_admin->role_name; ?></option>
                          <?php  }  ?>
                        </select>
                      </div>
                      <div id="box"></div>
                    </div>
                    <div class="mt-2 ml-3">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
                </div>        
              </div>
            </div>
          </section>    
          </div><?php }else{
            redirect('Admin/Role_Controller/error_page');} ?>
            <script>

              $(document).ready(function(){
                $("#name").change(function(){
                 var id=  $('#name option:selected').attr('value'); 
                 $.ajax({
                  url : "<?php echo site_url('Dashboard/get_page_name');?>",
                  method : "GET",
                  data : {id: id},
                  async : true,
        //data: "type=vegmeal",
        dataType: "html",
        success: function(data){
          // alert(data);
          $("#adname").hide();
          $('#box').fadeIn().html(data);
        }
      });


               });

              });
            </script>