<div class="modal-dialog modal-md">
  <div class="modal-content">
    <h4  class="btn btn-danger btn-block">Action
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">  
       <span aria-hidden="true">&times;</span></button></h4>
       <form class="needs-validation"   method="post" action="<?php echo site_url()?>Meeting/Meeting_Controller/add_meeting_comment">

        <input type="hidden" name="meeting_id" value="<?php echo $meeting[0]->meeting_id ?>">
        <input type="hidden" name="admin_id" value="<?php echo $admin_id ?>">
        <input type="hidden" name="role_id" value="<?php echo $role_id ?>">
        <div class="container-fluid">
         <div class="card-body">
           <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
             <?php if(!empty($meeting)){ echo 'Title: '.$meeting[0]->meeting_title; } ?> </div>
             <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 mt-2">
               <?php if(!empty($meeting)){ echo 'Date: '; echo $d=date('d-m-Y', strtotime($meeting[0]->meeting_date)); }?>
             </div>
             <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 mt-2">
               <?php if(!empty($meeting)){  $d=date('d-m-Y', strtotime($meeting[0]->meeting_date)); $da=date('l', strtotime($meeting[0]->meeting_date)); echo 'Day: '.$da;}?>
             </div>
             <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 mt-2">
               <?php if(!empty($meeting)){ echo 'Time: '.$meeting[0]->meeting_time;} ?> </div></div>
               <div class="row mt-2">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">

                 <label for="validationCustom01">Comment:-</label>
                 <textarea class="form-control" required id="validationCustom01" name="comment" placeholder="Write Comment here.." required=""></textarea>
                 <div class="valid-feedback">
                  Looks good!
                </div>
              </div>

            </div>

          </div>

        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-success btn-md-lg pull-left" >Submit</button>
          <button type="button" class="btn btn-danger btn-md-lg pull-left" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div></div>