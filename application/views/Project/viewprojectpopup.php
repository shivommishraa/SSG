<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <h4  class="btn btn-danger btn-block">Task
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">  
       <span aria-hidden="true">&times;</span></button></h4>
       <table id="example1" class="table table-bordered table-hover">

         <div class="container-fluid ml-2">

          <div class="row">

            
            
            <?php $member=$findmember($task[0]->member_id);
            $role=$findrole($task[0]->member_role);
            $addby=$findmember($task[0]->add_by);
            $pro_name=$getprojectname($task[0]->project_id);

            ?>
            <div class="col-lg-10" style="background-color:#fff;"><b> Project Name:</b> &nbsp;<?php  echo $pro_name[0]->pr_title;?></div></div>
            <div class="row mt-2">
              <div class="col-lg-5" style="background-color:#fff;"><b> Task Name:</b> &nbsp;<?php  echo $task[0]->task_name;?></div>
              
              <?php  $tskk_status=$task_status($task[0]->task_status);?>
              <div class="col-lg-5 " style="background-color:#fff;"><b>Last Status:</b> &nbsp;<?php echo $tskk_status[0]->task_status_name ?></div>
            </div>
            <div class="row mt-2">
             <div class="col-lg-5" style="background-color:#fff;"><b>Task Assign Member:</b> &nbsp;<?php echo $member[0]->name ?></div>
             <div class="col-lg-5" style="background-color:#fff;"><b>Member Role:</b> &nbsp;<?php echo $role[0]->role_name ?></div>
           </div>
           <div class="row mt-2">

             <div class="col-lg-5" style="background-color:#fff;"><b>Added By:</b> &nbsp;<?php echo $addby[0]->name ?></div>
             <div class="col-lg-5" style="background-color:#fff;"><b>Added At:</b> &nbsp;<?php echo $task[0]->add_at ?></div>
             

           </div>

           <div class="row mt-2">
             <div class="col-lg-10" style="background-color:#fff;"><b>Description:</b> &nbsp;<?php echo $task[0]->desciption ?></div>

           </div>


         </div></table>
         <div class="card  mt-2">
          <div class="card-header " id="headingTwelve">
            <h5 class="mb-0">
              <button class="mb-2 col-md-12 pl-4 btn  bg-primary collapsed text-white" data-toggle="collapse" data-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
                <span class="fas fa-angle-down mr-3"></span>Assigned Task History
              </button>
            </h5>
          </div>
          <div id="collapseTwelve" class="collapse" aria-labelledby="headingTwelve" data-parent="#accordion4">
            <div class="card-body">
              <div class="table-responsive">
               <table class="table table-striped table-bordered first">
                 <?php if(!empty($task_status_history)) {?>
                  <thead>

                    <tr>
                      <th>SL No</th>
                      <th width="100px">Task</th>
                      <th>Member</th>
                      <th>Status</th>
                      <th>Action By</th>
                      <th>Action At</th>
                      <th>Remark</th>
                    </tr>

                  </thead>
                  <tbody>

                    <?php $i=1; foreach($task_status_history as $ro) { 
                     $membername=$findmember($ro->member_id);
                     $add_by=$findmember($ro->add_by);
                     $tsk_status=$task_status($ro->task_status);
                     ?>
                     <tr>

                      <td> <?php echo $i; ?> </td>
                      <td width="100px"> <?php echo $ro->task_name ?></td>
                      <td> <?php echo $membername[0]->name ?></td>
                      <td> <?php echo $tsk_status[0]->task_status_name ?></td>
                      <td> <?php echo $add_by[0]->name ?></td>
                      <td> <?php echo $ro->add_at ?></td>
                      <td> <?php echo $ro->remark ?></td>

                    </tr>
                    <?php $i++; } ?>
                  </tbody>
                </table>
              <?php }else {?>
                <div class="alert alert-danger" role="alert">
                 <strong>Sorry!!..No any Activity found in this Project.</strong>
               </div>
             <?php } ?>

           </div>
         </div>
       </div>
     </div>
     <div class="modal-footer">
      <button type="button" class="btn btn-danger btn-md-lg pull-left" data-dismiss="modal">Close</button>
    </div>
  </div></div></div>
  <!-- ========================== Start Code for Open Append History Box ============================ -->

  <script>
    $('.collapse').on('shown.bs.collapse', function() {
      $(this).parent().find(".fa-angle-down").removeClass("fa-angle-down").addClass("fa-angle-up");
    }).on('hidden.bs.collapse', function() {
      $(this).parent().find(".fa-angle-up").removeClass("fa-angle-up").addClass("fa-angle-down");
    });

    $('.panel-heading a').click(function() {
      $('.panel-heading').removeClass('active');

        //If the panel was open and would be closed by this click, do not active it
        if (!$(this).closest('.panel').find('.panel-collapse').hasClass('in'))
          $(this).parents('.panel-heading').addClass('active');
      });
    </script>