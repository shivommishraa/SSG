 <?php 
 
 if(empty($date)){
  $date=date('Y-m-d');}

  
  ?>

  <div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
      <div class="container-fluid dashboard-content ">
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
              <h2 class="pageheader-title">Daywise Report</h2>
              <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="">Report</a></li>
                    <li class="breadcrumb-item "><a href="">Daywise Report</a>
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
            <form  role="form" action="<?php echo site_url(); ?>Report/Daywise_Controller/daywise_report" method="post">
             <div class="row col-md-12 mt-3">
              <div class="col-md-3 form-group">
                <div class="input-group date"  data-target-input="nearest" data-target="#datetimepicker7" >
                  <input type="date" class="form-control"placeholder="From Date" data-toggle="datetimepicker"required="" value="<?php echo $date; ?>" name="date" data-target="#datetimepicker7" />
                  
                </div>
              </div>
              <div class="col-md-3 ">
               
                <button type="submit" class="btn btn-sm btn-info from" name="search" ><i class="fa fa-search" aria-hidden="true"></i> Search</button>
                <button class="btn btn-sm btn-danger"   onClick="return redirect('<?php echo base_url();?>Report/Daywise_Controller/daywise_report');"><i class="fas fa-redo"></i> Reset</button>
                
              </div>
              
              <div class="col-md-3 pt-1 " style="text-align: center;color:#fff;"><div class="btn-sm bg-success"><i class="fa fa-calendar-alt"></i> <?php echo $d=date('d-m-Y', strtotime($date)); $da=date('l', strtotime($date)); echo ' ('.$da.')';?></div></div>

              <div class="col-md-3 pt-1 text-right">
                

               <button class="btn btn-sm btn-primary"   onClick="return redirect('<?php echo base_url();?>PDF/Pdf_report/Daywise_report_pdf/<?php echo $date; ?>');"><i class="fa fa-download"></i> PDF</button>
              </div>
              
              
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
              
              
             <table class="table  table-bordered" >
              <thead>
                <tr>
                 <th>SL No</th>
                 <th>Name</th>
                 <th>Role</th>
                 <?php $i=1; foreach($all_process as $pro) { ?>
                   <th><?php echo $pro->compaign_name ?></th>
                 <?php } ?>
                 <th> Total </th>
               </tr>
             </thead>
             <tbody> 
               <?php foreach($userlogindata as $ro) {
                $Role=$get_role($ro->role_id);
                ?>
                <tr>
                 <td> <?php  echo $i; ?> </td>
                 <td> <?php echo $ro->name ?></td>
                 <td> <?php echo $Role[0]->role_name ?></td>
                 <?php $value=array();foreach($all_process as $pro) {?>
                   <td> 
                     <?php $camp_value=$get_comp_value($ro->admin_id,$pro->compaign_id,$date);
                     if(!empty($camp_value)){ echo $val=$camp_value[0]->pro_val; $value[]=$val; }else{ $day=date('l', strtotime($date)); 
                     if($day=="Saturday" || $day=="Sunday"){ ?>
                      <span style="color: red;">W</span>
                    <?php  }
                    else{ echo '0';}}
                    ?></td>
                  <?php } ?>
                  <th><?php echo array_sum($value); ?></th>
                </tr>
                <?php $i++;} ?>
              </tr>
            </tbody>
          </table> 
        </div>
      <?php } else {?>
        <div class="alert alert-danger" role="alert">
         <strong>No Any Record Found...!!</strong>
       </div>
     <?php } ?> 
     <div class="dataTables_paginate paging_simple_numbers pt-2 "><?php echo $links; ?></div>
   </div>
 </div>
</div>
</div>
</div>
</div>

