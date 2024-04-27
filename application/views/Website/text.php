 <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="<?php echo base_url(); ?>Web_assests/img/hero.jpg">
    <form role="form" action="<?php echo site_url(); ?>Website/Website_controller/text_page" method="post" class="d-flex tm-search-form">
        <select  class="form-control tm-search-input" name="cate_id">
            <option value="">Search</option>
             <?php if(!empty($category_data)) { ?>
           <?php $i=1; foreach($category_data as $category) { ?>
            <option value="<?php echo $category->cate_id; ?>"<?php if(!empty($searchdata)){
                if($category->cate_id==$searchdata){ echo "selected";}
            } ?>> <?php echo $category->cate_name;?></option>
             <?php $i++; } } ?>
        </select>
        <button class="btn btn-outline-success tm-search-btn" type="submit">
            <i class="fas fa-search"></i>
        </button>
    </form>
</div>
            <div class="container-fluid row">
                <div class="col-12 text-center">
                    <div class="tm-text-primary" style="padding-top: 10px; font-size: 20px">
                        Latest Text Status 
                    </div >
                </div>  
            </div><hr>
            <div class="container-fluid tm-container-content tm-mt-40" style="margin-top: 20px">
                <div class="row">
                   <?php if(!empty($txtSts_data)) {?>
                       <?php $i=1; foreach($txtSts_data as $txtSts) { ?>
                        <div class="col-sm-3 mb-3 bg-white">
                            <div class="card">
                              <div class="card-body">
                                <!-- <h5 class="card-title">Special title treatment</h5> -->
                                <p class="card-text" id="<?php  echo $txtSts->cate_id.'copy'.$txtSts->text_status_id;?>"><?php  echo $txtSts->text_status;?></p>
                               <button id="<?php  echo 'btn-'.$txtSts->cate_id.'copy'.$txtSts->text_status_id;?>" class="button copiedText" onclick="copyToClipboard('<?php  echo '#'.$txtSts->cate_id.'copy'.$txtSts->text_status_id;?>')" >COPY</button>
                              <!--  <i class="fa fa-heart" style="color: red;" aria-hidden="true"></i>
                              -->  <!-- <i class="fa fa-heart" style="border:1px solid white;" aria-hidden="true"></i>
                               <i class="fa fa-heart-o"style="color: red;" aria-hidden="true"></i>
                              --> </div>
                            </div>
                        </div>
                        <?php $i++; }  } else {?>
                        <div class="alert alert-info"style="text-align: center;" role="alert">
                           <strong>No records found.</strong>
                       </div>
                   <?php } ?>

                   </div>
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
<style>
.button {
  display: inline-block;
  padding: 4px 16px;
  font-size: 12px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
  border: 1px solid gray;
  border-radius: 15px;
  box-shadow: 0 2px #999;
  background-image: linear-gradient(to right,#5EFCE8, #736EFE);
}

.button:hover {background-color: #3e8e41}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 1px #666;
  transform: translateY(4px);
  border:1px solid white;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">
    function copyToClipboard(element) {
      var $temp = $("<input>");
      $("body").append($temp);
      $temp.val($(element).text()).select();
      document.execCommand("copy");
      $temp.remove();
    }

    $(document).ready(function() {
        $(".copiedText").click(function() {
            $('.copiedText').html("COPY");
            var btnid=$(this).attr('id');
            $('#'+btnid).html("COPIED");
        });
    });
</script>