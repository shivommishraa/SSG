<div class="modal-dialog modal-md">
  <div class="modal-content">
    <h4  class="btn btn-danger btn-block">  <?php if(!empty($role)){ echo $role[0]->role_name; } ?> 
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">  
     <span aria-hidden="true">&times;</span></button></h4>
     <form class="needs-validation"   method="post" action="<?php echo site_url()?>Meeting/Meeting_Controller/add_meeting_comment">

       
      <div class="container-fluid">
       <div class="card-body">
         <div class="row">
          
           <div class="card-body">
            <div class="table-responsive">
              <?php  if(!empty($role[0]->designation)){ ?>
                <table class="table table-striped table-bordered first">
                 <thead>
                   <tr> <th>Assigned Designation Given Below.</th> </tr>
                 </thead>
                 <?php  $arr = explode(",", $role[0]->designation); 
                 foreach ($arr as $key) {
                   $designation=$getdesignation($key);?>
                   <tr>   <td>  <?php  echo $designation[0]->dsgn_name; ?> </td></tr>
                 <?php  }?>
               </table>
             <?php }else{?>
               <div class="alert alert-danger" role="alert">
                 <strong>Sorry!!..No Any Designation Assigned In This Role.</strong>
               </div>
             <?php } ?>
           </div>
         </div>
       </div>
       <div class="row mt-2">
         

       </div>

     </div>

   </div>

   <div class="modal-footer">
    <button type="button" class="btn btn-danger btn-md-lg pull-left" data-dismiss="modal">Close</button>
  </div>
</form>
</div></div>