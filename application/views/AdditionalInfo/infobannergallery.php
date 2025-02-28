<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content">
            <div class="row">
                <div class="col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title"><?php echo $title; ?></h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?php echo site_url(); ?>Dashboard" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="#">Manage Additional Info</a></li>
                                    <li class="breadcrumb-item active">Info Banner Gallery</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5>Add Image For Banner/Offer</h5>
                            <button class="btn btn-sm btn-primary" onclick="redirect('<?php echo site_url(); ?>AddInfo/Addinfocontroller/manageInfo');">
                                <i class="fa fa-list"></i> Go To Info Details List
                            </button>
                        </div>
                        
                        <?php if (!empty($error_msg)) : ?>
                            <div class="col-12">
                                <div class="alert alert-danger"><?php echo $error_msg; ?></div>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ($this->session->flashdata('success')) : ?>
                            <div class="alert alert-success">
                                <strong><span class="glyphicon glyphicon-ok"></span> <?php echo $this->session->flashdata('success'); ?></strong>
                            </div>
                        <?php endif; ?>
                        
                        <div class="card-body">
                            <form method="post" action="" enctype="multipart/form-data">
                                <input type="hidden" name="tbl_additional_info_id" value="1">
                                
                                <div class="row">
                                    <div class="col-md-4"> 
                                        <label for="bannercategory">Category:</label>
                                        <select class="form-control" required id="bannercategory" name="bannercategory">
                                            <option value="">Select Category</option>
                                            <?php foreach ($bannercategory as $row) : ?>
                                                <option value="<?php echo $row->id; ?>"><?php echo $row->title; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label>Images:</label>
                                        <input type="file" name="images[]" class="form-control" multiple>
                                    </div>
                                    <div class="col-md-4">
                                        <input type="submit" name="imgSubmit" class="btn btn-success mt-4" value="SUBMIT">
                                    </div>
                                </div>
                            </form>
                            
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <!-- <h5>All Banner List</h5> -->
                            </div>
                            <hr style="background-color:red;">
                            <form role="form" action="<?php echo site_url(); ?>AddInfo/Addinfocontroller/infobannergallery" method="post">
                                <div class="row mt-3 align-items-center">
                                    <div class="col-md-4">
                                       <h3>ALL IMAGES</h3>
                                    </div>
                                    <div class="col-md-4 text-right">
                                         <select class="form-control" required name="bannercategory">
                                            <option value="">Search By Category</option>
                                            <?php foreach ($bannercategory as $row) : ?>
                                                <option value="<?php echo $row->id; ?>"><?php echo $row->title; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-4 text-right">
                                        <button type="submit" class="btn btn-info">Search</button>
                                        <button type="button" class="btn btn-danger" onclick="redirect('<?php echo base_url();?>AddInfo/Addinfocontroller/infobannergallery');">Reset</button>
                                    </div>
                                </div>
                            </form>
                            <hr style="background-color:green;">
                            <div class="row mt-4">
                                <?php if (!empty($gallery)) : ?>
                                    <?php foreach ($gallery as $imgRow) : ?>
                                        <div class="col-md-4" id="imgb_<?php echo $imgRow->id; ?>">
                                            <span class="badge badge-dark"><?php echo $bannercategorybyid($imgRow->bannercategory)[0]->title ?? ''; ?></span>
                                            <img src="<?php echo base_url('ssgassests/infodetailsupload/' . $imgRow->infobannerimage); ?>" class="img-fluid mt-3" alt="Info Banner">
                                            <div class="mt-2">
                                                <?php if (($infomodeldata[0]->modelpopupimage) == $imgRow->infobannerimage) { ?>
                                                <span class="badge badge-info">Selected As Model Popup</span>
                                                <?php } else { ?>
                                                <a href="javascript:void(0);" class="badge badge-primary" onclick="setImage('<?php echo $imgRow->infobannerimage; ?>')">Set As Model Popup</a>
                                                <?php }  ?>
                                                <?php if ((($infomodeldata[0]->modelpopupimage) == $imgRow->infobannerimage) || (($infomodeldata[0]->offerimage) == $imgRow->infobannerimage) ) { ?>
                                                <?php }else{ ?>
                                                <a href="javascript:void(0);" class="badge badge-danger" onclick="deleteImage('<?php echo $imgRow->id; ?>')">Delete</a>
                                                <?php } ?>
                                                <?php if (($infomodeldata[0]->offerimage) == $imgRow->infobannerimage) { ?>
                                                <span class="badge badge-warning mt-1 mb-2">Selected For Offer Page</span>
                                                <?php } else { ?>
                                                <a href="javascript:void(0);" class="badge badge-warning mt-1 mb-2" onclick="setofferImage('<?php echo $imgRow->infobannerimage; ?>')">Set For Offer Page</a>
                                                <?php } ?>
                                                <a href="javascript:void(0);" class="badge badge-success sendimagetowhatsapp mt-1 mb-2" onclick="sendimagetowhatsapp('<?php echo base_url('ssgassests/infodetailsupload/' . $imgRow->infobannerimage); ?>')">Share on WhatsApp</a>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <div class="alert alert-info text-center" role="alert">
                                        <strong>No Record Found!</strong>
                                    </div>
                                <?php endif; ?>
                            </div>
                             <div class="dataTables_paginate paging_simple_numbers pt-2 "><?php echo $links; ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function deleteImage(id) {
        if (confirm("Are you sure to delete?")) {
            $.post("<?php echo base_url('AddInfo/Addinfocontroller/deleteImage'); ?>", { id: id }, function(resp) {
                if (resp) {
                    $('#imgb_' + id).remove();
                    alert('The image has been removed from the gallery');
                } else {
                    alert('Some problem occurred, please try again.');
                }
            });
        }
    }
    
    function setImage(image) {
        if (confirm("Are you sure to set this as an info banner?")) {
            $.post("<?php echo base_url('AddInfo/Addinfocontroller/setImageAsModelPopup'); ?>", { image: image }, function(resp) {
                if (resp) {
                    alert('The image has been set as an Info Banner.');
                    location.reload();
                } else {
                    alert('Some problem occurred, please try again.');
                }
            });
        }
    }

    function setofferImage(image) {
        if (confirm("Are you sure to set this as an offer banner?")) {
            $.post("<?php echo base_url('AddInfo/Addinfocontroller/setImageForOffer'); ?>", { image: image }, function(resp) {
                if (resp != '') {
                    alert('The image has been set as an Offer Banner.');
                    location.reload();
                } else {
                    alert('Some problem occurred, please try again.');
                }
            });
        }
    }

    /*function sendimagetowhatsapp(imageUrl) {
        window.open("https://wa.me/?text=" + encodeURIComponent("Check out this image: " + imageUrl), '_blank');
    }*/

    function sendimagetowhatsapp(imageUrl) {
        fetch(imageUrl)
            .then(response => response.blob())
            .then(blob => {
                // Create a downloadable link for the image
                const url = URL.createObjectURL(blob);
                const a = document.createElement("a");
                a.href = url;
                a.download = "shared-image.jpg";  // Image will be saved with this name
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
                URL.revokeObjectURL(url);

                // Notify user to manually share the image on WhatsApp
                alert("Image downloaded. Now open WhatsApp and share it manually.");

                // Open WhatsApp Web for user to manually upload the image
                window.open("https://web.whatsapp.com/", "_blank");
            })
            .catch(error => console.error("Error fetching the image:", error));
    }
</script>
<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>