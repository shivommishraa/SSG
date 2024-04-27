 <?php if(!empty($fdate)){ $daterange= date('m/d/Y',strtotime($fdate)).'-'.date('m/d/Y',strtotime($last_date)); }else $daterange='';
 
 if(!empty($daterange)){
   $string = explode('-',$daterange);
   $Date1 = date('Y-m-d',strtotime($string[0]));
   $Date2 = date('Y-m-d',strtotime($string[1]));
 }else{ $Date1=date('Y-m-d',strtotime('-7 days')); $Date2=date('Y-m-d');}

 $start    = new DateTime($Date1);
 $end      = (new DateTime($Date2))->modify('+1 day');
 $interval = new DateInterval('P1D');
 $period   = new DatePeriod($start, $interval, $end);
 $list=array();
 foreach ($period as $dts) {
   $list[]=$dts->format("Y-m-d");
 }
 ?>
 <style type="text/css">
 .tdwidth{
  min-width: 100px;
}

</style>
<div class="dashboard-wrapper">
  <div class="dashboard-ecommerce">
    <div class="container-fluid dashboard-content ">
      <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
          <div class="page-header">
            <h2 class="pageheader-title">Manage CSR</h2>
            <div class="page-breadcrumb">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="">CSR</a></li>
                  <li class="breadcrumb-item "><a href="">Manage CSR</a>
                  </li>
                  
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
       <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
          <form  role="form" action="<?php echo site_url(); ?>Admin_CSR/CSR_Controller/manage_csr" method="post">
           <div class="row col-md-12 mt-3">
            <div class="col-md-4 form-group">
              <div class="input-group date" id="datetimepicker7" data-target-input="nearest" data-target="#datetimepicker7" >
                <input type="text" class="form-control datetimepicker-input fa fa-calendar-alt"placeholder="From Date" data-toggle="datetimepicker"required="" value="<?php echo $Date1; ?>" name="fdate" data-target="#datetimepicker7" />
                <div class="input-group-append" >
                  <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
                </div>
              </div>
            </div>
            <div class="col-md-4 form-group">
              <div class="input-group date" id="datetimepicker8" data-target-input="nearest"  data-target="#datetimepicker8">
                <input type="text" class="form-control datetimepicker-input fa fa-calendar-alt"  placeholder="To Date" data-toggle="datetimepicker" required=""value="<?php echo $Date2; ?>" name="last_date" data-target="#datetimepicker8" />
                <div class="input-group-append" >
                 <div class="input-group-text"><i class="fa fa-calendar-alt"></i></div>
               </div>
             </div>
           </div>
           <div class="col-md-4 ">
            <button type="submit" class="btn btn-sm btn-info from" name="search" ><i class="fa fa-search" aria-hidden="true"></i> Search</button>
            <button class="btn btn-sm btn-danger"   onClick="return redirect('<?php echo base_url();?>Admin_CSR/CSR_Controller/manage_csr');"><i class="fas fa-redo"></i> Reset</button>
            <button  class="btn btn-sm btn-primary from "  onClick="return redirect('<?php echo base_url();?>Admin_CSR/CSR_Controller/add_csr');"><i class="fa fa-plus" aria-hidden="true"> </i> Add CSR</button>
          </div>
          
          <div class="col-md-4 pt-1"style="text-align: center;color:#fff;""><div class="btn-sm bg-success">Date : <?php echo $Date1.' To '.$Date2 ?></div></div>
          
          
        </div>

      </form>
      <?php if($this->session->flashdata('success')){ ?>
       <div class="alert alert-success mt-2">
        <strong><span class="glyphicon glyphicon-ok"></span>   <?php echo $this->session->flashdata('success'); ?></strong>
      </div>
    <?php } ?>
    <div class="card-body">
      <div class="table-responsive">
        <?php if(!empty($userlogindata)) {?>
          
          <!--  <div class="col-md-12 form-group text-center bg-info text-white"><?php echo $admin[0]->name; ?></div> -->
                         <!--        <table class="table table-striped table-bordered first table-responsive">
                                    <thead>
                                      <tr>
                                           <th class="tdwidth">SL No</th>
                                           <th class="tdwidth">Process</th>
                                        <?php $i=1; foreach($list as $days) { ?>
                                           <th class="tdwidth"><?php  echo date('Y-m-d', strtotime($days));  ?></th>
                                           <?php } ?>
                                           <th> Total </th>
                                      </tr>
                                    </thead>
                                    <tbody>

                                       <?php $grand=array(); $i=1; foreach($all_process as $pro) { ?>
                                      <tr>
                                      <td> <?php  echo $i; ?> </td>
                                      <td> <?php echo $pro->compaign_name ?></td>
                                     <?php $value=array(); foreach($list as $days) { ?>
                                     <td><?php  $date= date('Y-m-d', strtotime($days));
                                     $camp_value=$get_comp_value($admin[0]->admin_id,$pro->compaign_id,$date);
                                      if(!empty($camp_value)){ echo $val=$camp_value[0]->pro_val; $value[]=$val; }else{ $day=date('l', strtotime($days)); 
                                        if($day=="Saturday"|| $day=="Sunday"){ ?>
                                          <span style="color: red;">W</span>
                                          <?php  }
                                      else{ echo '0';}}
                                             ?></td> 
                                           <?php } ?>
                                   <td><?php echo $grand[]=array_sum($value); ?></td>
                                     

                                 </tr>
                                     <?php $i++; } ?>
                                     <tr>
                                      <td class="tdwidth"><?php echo $i;?></td>
                                      <th class="tdwidth">Total</th>
                                       <?php foreach($list as $days) { ?>
                                      <th class="tdwidth">  
                                         <?php  $date= date('Y-m-d', strtotime($days));
                                    echo $sum_process=$get_sum_processvalue($admin[0]->admin_id,$date);
                                     
                                             ?>
                                      </th>
                                    <?php } ?>
                                     <th><?php echo array_sum($grand); ?></th>
                                     </tr>
                                    </tbody>
                                  </table> -->
                                  <?php $value=array(); foreach($userlogindata as $ro) {
                                    if($ro->admin_id!=$admin[0]->admin_id){
                                     ?>
                                     
                                     <table class="table table-striped table-bordered first table-responsive">
                                      <hr/>
                                      <div class="col-md-12 form-group text-center bg-info text-white"><?php echo $ro->name; ?></div>
                                      <thead>
                                        <tr>
                                         <th class="tdwidth">SL No</th>
                                         <th class="tdwidth">Process</th>
                                         <?php $i=1; foreach($list as $days) { ?>
                                           <th class="tdwidth"><?php  echo date('Y-m-d', strtotime($days));  ?></th>
                                         <?php } ?>
                                         <th class="tdwidth"> Total </th>
                                       </tr>
                                     </thead>
                                     <tbody>

                                       <?php $grand=array(); $i=1; foreach($all_process as $pro) { ?>
                                        <tr>
                                          <td> <?php  echo $i; ?> </td>
                                          <td> <?php echo $pro->compaign_name ?></td>
                                          <?php $value=array(); foreach($list as $days) { ?>
                                           <td><?php  $date= date('Y-m-d', strtotime($days));
                                           $camp_value=$get_comp_value($ro->admin_id,$pro->compaign_id,$date);
                                           if(!empty($camp_value)){ echo $val=$camp_value[0]->pro_val; $value[]=$val; }else{ $day=date('l', strtotime($days)); 
                                           if($day=="Saturday"|| $day=="Sunday"){ ?>
                                            <span style="color: red;">W</span>
                                          <?php  }
                                          else{ echo '0';}}
                                          ?></td> 
                                        <?php } ?>
                                        <td><?php echo $grand[]=array_sum($value); ?></td>
                                        

                                      </tr>
                                      <?php $i++; } ?>
                                      <tr>
                                        <td><?php echo $i;?></td>
                                        <th>Total</th>
                                        <?php foreach($list as $days) { ?>
                                          <th>  
                                           <?php  $date= date('Y-m-d', strtotime($days));
                                           echo $sum_process=$get_sum_processvalue($ro->admin_id,$date);
                                           
                                           ?>
                                         </th>
                                       <?php } ?>
                                       <th><?php echo array_sum($grand); ?></th>
                                     </tr>
                                   </tbody>
                                   
                                 </table>
                               <?php } }?>



                             <?php } else {?>
                              <div class="alert alert-info" role="alert">
                               <strong>No Any Record Found!</strong>
                             </div>
                           <?php } ?>

                           <div class="dataTables_paginate paging_simple_numbers pt-2 " id="DataTables_Table_0_paginate"><?php echo $links; ?></div>

                           
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
              <script src="<?php echo base_url()  ?>Custom_JS/Product_JS/product.js" type="text/javascript"></script>
              <script type="text/javascript">
               var baseURL ='<?php echo base_url();  ?>'
             </script>

             <!--Code End for print the data from database in popup box -->
