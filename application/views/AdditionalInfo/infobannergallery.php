 <div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title"><?php echo $title; ?></h2>
                        <div class="page-breadcrumb">
                         <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="">Manage Additional Info</a></li>
                                <li class="breadcrumb-item "><a href="">Info Banner Gallery</a></li>
                                
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
                     <button class="btn btn-sm btn-primary"  onClick="return redirect('<?php echo site_url(); ?>AddInfo/Addinfocontroller/manageInfo');"><i class="fa fa-list" aria-hidden="true"></i> Go To Info Details List</button>
                 </div>
             </div>
         </h5>
         
         <?php if(!empty($error_msg)){ ?>
            <div class="col-xs-12">
                <div class="alert alert-danger"><?php echo $error_msg; ?></div>
            </div>
        <?php } ?>
        
        
        <div class="card-body">  
            <form method="post" action="" enctype="multipart/form-data">
               <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                 
                   <!--  <label for="validationCustom01">Name:</label> -->
                    <input type="hidden" name="tbl_additional_info_id" value="1">
                    <?php //echo form_error('product_name','<p class="help-block text-danger">','</p>'); ?>
                   <!--  <div class="valid-feedback">
                     Looks good!
                 </div> -->
             </div>
             
             <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                <label>Images:</label>
                <input type="file" name="images[]" class="form-control" multiple>
                <input type="hidden" name="id" value="<?php //echo !empty($gallery['id'])?$gallery['id']:''; ?>">

                <input type="submit" name="imgSubmit" class="btn btn-success mt-3" value="SUBMIT">
                <h2 class="text-center mt-3 card-header"><u></u></h2>
                <div class="row">
                    
                    <?php if(!empty($gallery)){ ?>
                     
                        <?php foreach($gallery as $imgRow){ ?>
                            <div class="col-md-4" id="imgb_<?php echo $imgRow->id; ?>">
                                <img src="<?php echo base_url('./ssgassests/infodetailsupload/'.$imgRow->infobannerimage); ?>"  height="80%" width="70%"/>
                                <?php if(($infomodeldata[0]->modelpopupimage) == $imgRow->infobannerimage){ ?>
                                    <span class="badge badge-info">Seleted As Model Popup</span> 
                                <?php }else  { ?>
                                   <a href="javascript:void(0);" class="badge badge-danger" onclick="deleteImage('<?php echo $imgRow->id; ?>')">Delete</a> 
                                <a href="javascript:void(0);" class="badge badge-primary" onclick="setImage('<?php echo $imgRow->infobannerimage; ?>')">Set As Model Popup</a>
                                <?php } ?>
                                
                            </div>
                        <?php } ?>
                        
                    <?php } ?>
                </div>
            </div>
        </div>
        
    </form>
</div>
</div>
</div>

<script>
    function deleteImage(id){
        var result = confirm("Are you sure to delete?");
        if(result){
            $.post( "<?php echo base_url('AddInfo/Addinfocontroller/deleteImage'); ?>", {id:id}, function(resp) {
               if(resp != ''){
                $('#imgb_'+id).remove();
                alert('The image has been removed from the gallery');
            }else{
                alert('Some problem occurred, please try again.');
            }
        });
        }
    }

    function setImage(image){
        var result = confirm("Are you sure to set this as an info banner?");
        if(result){
            $.post( "<?php echo base_url('AddInfo/Addinfocontroller/setImageAsModelPopup'); ?>", {image:image}, function(resp) {
               if(resp != ''){
                //$('#imgb_'+id).remove();
                alert('The image has been set as a Info Banner.');
            }else{
                alert('Some problem occurred, please try again.');
            }
        });
        }
    }
</script>
<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>