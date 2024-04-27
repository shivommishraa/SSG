<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <h4  class="btn btn-primary btn-block">Query Details
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button> </h4>
        <div class="container">
          <div class="row" style="margin-top: 10px;">
            <h4 class="col-lg-12 form-group"style="color:#bd4444;">Customer Details</h4>
            <div class="col-lg-4 form-group">
              <?php 
              $status_action=$status_history($Query[0]->contact_id);
              ?>
              <b>Name :</b> <?php echo $Query[0]->name ?></div>

              
              <div class="col-lg-4 form-group">
              </div>
              <div class="col-lg-4 form-group">
              </div>
              <div class="col-lg-6 form-group">
               <b>Email :</b> <?php echo $Query[0]->email ?></div>
               <div class="col-lg-4 form-group">
                 <b>Mobile :</b> <?php echo $Query[0]->mobile ?></div>
                 <div class="col-lg-2 form-group">
                 </div>
                 <div class="col-lg-12 form-group" style="text-align: justify;">
                   <b>Subject :</b> <?php echo $Query[0]->subject ?></div>
                   <div class="col-lg-12 form-group" style="text-align: justify;">
                     <b>Message :</b> <?php echo $Query[0]->message ?></div>
                     
                     <?php if($status_action){?>
                      <h4 class="col-lg-12 mt-2 form-group"style="color:#bd4444;">Company Actions</h4>
                      
                      <div class="col-lg-4 form-group">
                        <?php $statusname=$status_name($status_action[0]->status_id);
                        $admin=$adminname($status_action[0]->updated_by);
                        ?>
                        <b>Action By :</b> <?php echo $admin[0]->name; ?>
                        
                      </div>
                      <div class="col-lg-4 form-group">
                       <b>Status :</b> <?php echo $statusname[0]->status_names; ?>
                     </div>
                     <div class="col-lg-4 form-group">
                       <b>Modify At :</b> <?php echo $status_action[0]->modify_at; ?>
                     </div>
                     <div class="col-lg-12 form-group">
                       <b>Comment :</b> <?php echo $status_action[0]->comment; ?>
                     </div>
                   <?php } ?>
                 </div>
                 <div class="modal-footer">
                  <button type="button" class="btn btn-danger btn-md-lg pull-left" data-dismiss="modal">Close</button>
                </div>
              </div>