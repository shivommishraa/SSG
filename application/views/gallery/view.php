   <div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Product Gallery Images</h2>
                        
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="">Product</a></li>
                                    <li class="breadcrumb-item "><a href="">Product Gallery Images</a></li>
                                    
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
                                 <button class="btn btn-sm btn-primary"  onClick="return redirect('<?php echo site_url(); ?>Image_gallery/manage_gallery');"><i class="fa fa-list" aria-hidden="true"></i> List Gallery</button>
                             </div>
                         </div>
                     </h5>

                     <h3 class="mt-2 ml-3"><?php echo !empty($gallery['product_name'])?$gallery['product_name']:''; ?>  </h3>                                 
                     <div class="card-body">
                       <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                           
                        <?php if(!empty($gallery['images'])){ ?>
                            <div class="row">
                                
                             <?php foreach($gallery['images'] as $imgRow){ ?>
                                <div  class="col-md-4" id="imgb_<?php echo $imgRow['id']; ?>">
                                    <img src="<?php echo base_url('./uploads/product_image/'.$imgRow['file_name']); ?>" height="80%" width="70%">
                                    <a href="javascript:void(0);" class="badge badge-danger" onclick="deleteImage('<?php echo $imgRow['id']; ?>')">delete</a>
                                </div>
                            <?php } ?>
                            
                        <?php } else {?>
                            <div class="alert alert-info" role="alert">
                             <strong>Any Images Not Found!</strong>
                         </div>
                     <?php } ?>
                     
                 </div>    
             </div>
         </div>


         <script>
            function deleteImage(id){
                var result = confirm("Are you sure to delete?");
                if(result){
                    $.post( "<?php echo base_url('Image_gallery/manage_gallery/deleteImage'); ?>", {id:id}, function(resp) {
                        if(resp != ''){
                            $('#imgb_'+id).remove();
                            alert('The image has been removed from the gallery');
                        }else{
                            alert('Some problem occurred, please try again.');
                        }
                    }
                    );
                }
            }
        </script>
        <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>