 <div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Product Gallery</h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="">Product</a></li>
                                    <li class="breadcrumb-item "><a href="">Product Gallery</a></li>
                                    
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <?php if($this->session->flashdata('success')){ ?>
               <div class="alert alert-success">
                <strong><span class="glyphicon glyphicon-ok"></span>   <?php echo $this->session->flashdata('success'); ?></strong>
            </div>
        <?php } ?>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    
                    <div class="row col-md-12">
                        <div class="col-md-8"> </div>
               <!--  <div class="col-md-4 card-header text-right">
                <a href="<?php echo base_url('Image_gallery/manage_gallery/add'); ?>" class="btn btn-primary"><i class="fa fa-plus"> </i> Add Images</a>
            </div>-->
        </div>
        
        <div class="card-body">
          <table class="table table-striped table-bordered first">
            <thead>
                <tr>
                    <th width="10%">Sr. No</th>
                    <th>Name</th>
                    <th>Created</th>
                    <th>Status</th>
                    <th colspan="3">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($gallery)){ $i=0;  
                    foreach($gallery as $row){ $i++; 
                        $defaultImage = !empty($row['default_image'])?'<img src="'.base_url().'uploads/images/'.$row['default_image'].'" alt="" />':''; 
                        $statusLink = ($row['status'] == 1)?site_url('Image_gallery/manage_gallery/block/'.$row['id']):site_url('Image_gallery/manage_gallery/unblock/'.$row['id']);  
                        $statusTooltip = ($row['status'] == 1)?'Click to Deactivate':'Click to Activate';  
                        ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            
                            <td><?php echo $row['product_name']; ?>
                            
                            <td><?php echo $row['created']; ?></td>
                            <td><a href="<?php echo $statusLink; ?>" title="<?php echo $statusTooltip; ?>"><span class="badge <?php echo ($row['status'] == 1)?'badge-success':'badge-danger'; ?>"><?php echo ($row['status'] == 1)?'Active':'Inactive'; ?></span></a></td>
                            <td>
                                <a href="<?php echo base_url('Image_gallery/manage_gallery/view/'.$row['id']); ?>" ><i class="fa fa-eye"style="color: green;"></i></a> </td>
                                <td> <a href="<?php echo base_url('Image_gallery/manage_gallery/edit/'.$row['id']); ?>" ><i class="fas fa-pencil-alt"style="color: blue;"></i></a> </td>
                                <td>  <a href="<?php echo base_url('Image_gallery/manage_gallery/delete/'.$row['id']); ?>" onclick="return confirm('Are you sure to delete..?')?true:false;"><i class="fa fa-trash"style="color: red;"></i></a>
                                </td>
                            </tr>
                        <?php } }else{ ?>
                            <tr><td colspan="6">No Gallery Images found...</td></tr>
                        <?php } ?>

                    </tbody>
                </table>
                <div class="dataTables_paginate paging_simple_numbers pt-2 "><?php echo $links; ?></div>
            </div>

        </div>
    </div>
</div>
