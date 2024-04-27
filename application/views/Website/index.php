 
<?php /*=============== Start Code for Main Page ===================*/ ?>

<div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="<?php echo base_url(); ?>Web_assests/img/hero.jpg">
    <form role="form" action="<?php echo site_url(); ?>Website/Website_controller/index" method="post" class="d-flex tm-search-form">
        <select  class="form-control tm-search-input" name="galleryid">
            <option value="">Search</option>
             <?php if(!empty($allbrand)) { ?>
           <?php $i=1; foreach($allbrand as $brand) { ?>
            <option value="<?php echo $brand->brand_id; ?>"<?php if(!empty($searchdata)){
                if($brand->brand_id==$searchdata){ echo "selected";}
            } ?>> <?php echo $brand->brand_name;?></option>
             <?php $i++; } } ?>

        </select>
       <!--  <input name="" type="search" placeholder="Search Keywod ()" aria-label="Search"> -->
        <button class="btn btn-outline-success tm-search-btn" type="submit">
            <i class="fas fa-search"></i>
        </button>
    </form>
</div>
<!-- <div class="container-fluid mt-2  row mb-4">
    <div class="col-12 text-center">
     
        <?php if(!empty($allbrand)) { ?>
           <?php $i=1; foreach($allbrand as $brand) { ?>

            <button type="submit" class="btn btn-sm btn-primary"  data-filter="<?php echo ".".$brand->brand_id ?>" >
                <?php echo $brand->brand_name;?>
             <input type="hidden" name="galleryid" value="<?php echo $brand->brand_id; ?>">
                </button>

                <?php $i++; } } ?>
            </div>
                
        </div> -->
            <div class="container-fluid row">
                <div class="col-12 text-center">
                    <div class="tm-text-primary" style="padding-top: 10px; font-size: 20px">
                        Latest Image Status 
                    </div >
                </div>  
            </div><hr>
            <div class="container-fluid tm-container-content tm-mt-40" style="margin-top: 20px">

               <!--  <div class="row mb-1">
                    <h5 class="col-12 tm-text-primary text-center">
                        Latest Image Status 
                    </h5>
                     -->
                  <!--   <div class="col-6 d-flex justify-content-end align-items-center">
                        <form action="" class="tm-text-primary">
                              <?php echo $links; ?><!-- <input type="text" value="1" size="1" class="tm-input-paging tm-text-primary"> of 200 -->
                        <!-- </form>
                    </div> -->
                <!-- </div> -->
                <div class="row tm-mb-90 tm-gallery">
                   <?php if(!empty($products)) {?>
                       <?php $i=1; foreach($products as $product) { 
                         $pro_img =$product_image($product->gallery_id);
                         $pro_brand =$product_brand($pro_img[0]->product_brand);
                                //if(!empty($pro_img)){
                         ?>

                         <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                            <figure class="effect-ming tm-video-item">
                               <img height="236px" width="420px" src="<?php echo base_url().'uploads/product_image/'.$product->file_name    ?>"  alt="madhur" class="img-fluid">
                                <figcaption class="d-flex align-items-center justify-content-center">
                                   <!--  <h2><a href="<?php echo base_url()?>/Website_controller/photodetails"> View More</a></h2> -->
                                    <h2><?php  echo $pro_brand[0]->brand_name;?></h2>
                                    <!--  <a href="<?php echo site_url(); ?>Nice_website/Website_Controller/product_view/<?php echo $product->id?>"><?php echo $product->product_name; echo " (".$pro_brand[0]->brand_name.")"?></a> -->
                                    <!-- <a href="#">View more</a> -->
                                </figcaption>                    
                            </figure>
                            <div class="d-flex justify-content-between tm-text-gray">
                                <span class="tm-text-gray-light"><?php  //echo date('d-M-Y',strtotime($product->uploaded_on)) ?></span>
                                <span class="badge badge-primary" style="background-color: blue;"><a style="color: white; font-size: 14px"  href="<?php echo base_url().'uploads/product_image/'.$product->file_name ?>" download>  <i class="fa fa-download"></i>  Download </a> </span>
                                <span><!-- (9,906) Downloads --></span>

                            </div>
                        </div>
                        <?php $i++; } //} ?>
                    <?php } else {?>
                        <div class="alert alert-info"style="text-align: center;" role="alert">
                           <strong>No Photos Found!</strong>
                       </div>
                   <?php } ?>

                   </div> <!-- row -->
               <div class="row tm-mb-90">
                <div class="col-12 d-flex justify-content-between align-items-center tm-paging-col">
                    <a href="javascript:void(0);" class=" tm-btn-prev mb-2 disabled"></a>
                    <div class="tm-paging d-flex">
                        <?php echo $links; ?>
                    </div>
                    <a href="javascript:void(0);" class=" tm-btn-next"></a>
                </div>            
            </div>
        </div>

        <?php /*=============== End Code for Main Page ===================*/ ?>
