<div class="modal-dialog modal-md">
  <div class="modal-content">
    <h4  class="btn  btn-block" style="background-color: #ff5959;color: #fff;">Add Team
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span></button> </h4>
       <div class="container">
        <div class="row" style="margin-top: 10px;">
           <div class="card-body">
           <span id="success_message"></span>
                             <form class="needs-validation" method="post" enctype="multipart/form-data" action="<?php echo site_url()?>Admin/User_Controller/addteammember" id="contact_form">
                                        <div class="row">
                                           <input type="hidden" id="aid" name="admin_id"value="<?php echo $user[0]->admin_id ?>">

                                          
                                           <input type="hidden" name="old_team_member_id"value="<?php if(!empty($user[0]->team_member_id)){echo $user[0]->team_member_id;} ?>">
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                              <label for="validationCustom01"><?php echo $user[0]->name.' ('.$drop_team[0]->role_name.')'; ?></label>

                                                <div class="input-group">
                                                 <select class="form-control"  name="team_member_id" id="validationCustom02"required>
                                                 <option value="">Select Team Member</option>
                                                 <?php if(!empty($drop_team)){
                                                  foreach($alluser as $row){
                                                    if($row->role_id==$drop_team[0]->team){
                                                   ?>
                                                  <option value="<?php echo $row->admin_id; ?>"<?php if(!empty($user[0]->team_member_id)){ if($user[0]->team_member_id==$row->admin_id){ echo "selected";}} ?> ><?php echo $row->name; ?></option>
                                                  <?php } }}?> 
                                                </select>
                                                </div>
                                                 <span id="compaign_id" class="text-danger"></span>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-4">      
                                            <button class="btn btn-success" type="submit">Add</button>
                                              <button  class="btn btn-danger text-right"  onClick="return redirect('<?php echo base_url();?>Admin/User_Controller/manage_user');" id="pcc" type="button">Cancel</button>
                                           </div>
                                        </div>
                                     </form></div>
                                  <!--   <div class="container">                  
                                     <div class="card-body">
                                    <div class="table-responsive" id="data">
                                    <?php if(!empty($history_data)) {?>
                                  <table class="table table-striped table-bordered first">
                                    <thead>
                                      <tr>
                                           <th>SL No</th>
                                           <th>Process Name</th>
                                           <th>Mod By</th>
                                           <th>Mod At</th>
                                           <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody >
                                    <?php $i=1;
                                     foreach($history_data as $ro) { 
                                      $process=$process_name($ro->compaign_id);
                                      $emp=$emp_name($ro->mod_by);
                                      ?>
                                     <tr>
                                      <td> <?php echo $i; ?> </td>
                                      <td> <?php echo $process[0]->compaign_name ?></td>
                                      <td><?php echo $emp[0]->name?></td>
                                      <td><?php echo $ro->mod_at?></td>
                                     <td><a type="button" pid="<?php echo $ro->ph_sr ?>" aid="<?php echo $user[0]->admin_id ?>" onclick="return confirm('are you sure to delete')" class="btn delete pcc"><i class="fa fa-trash " style="color: red;"></i></a></td>
                                   </tr>
                                     <?php $i++; } ?>
                                    </tbody>
                            </table>
                              <?php } else {?>
                            <div class="alert alert-info" role="alert">
                             <strong>No any assignment Record Found!</strong>
                            </div>
                                  <?php } ?>
                                </div>
                            </div>
                          </div>
                        </div>
           </div>
           <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-md-lg pull-left" data-dismiss="modal">Close</button>
     </div>
 </div> -->


<!---------------------Code for get and submit data to database------------------>
 <script>
/*$(document).ready(function(){

 $('#contact_form').on('submit', function(event){
  event.preventDefault();
  $.ajax({
   url:"<?php echo base_url(); ?>Admin/User_Controller/user_assignCompaign",
   method:"POST",
   data:$(this).serialize(),
   dataType:"json",
   beforeSend:function(){
    $('#contact').attr('disabled', 'disabled');
   },
   success:function(data)
   {
    if(data.error)
    {
     if(data.compaign_id != '')
     {
      $('#compaign_id').html(data.compaign_id);
     }
     else
     {
      $('#compaign_id').html('');
     }
     
    }
    if(data.success)
    {

     $('#success_message').html(data.success);
     $('#compaign_id').html('');
    // $('#contact_form')[0].reset();
     alert("Process added");
      setTimeout(admincompaign(data.aid),10000); 
    }
     if(data.already)
    {

     $('#success_message').html(data.already);
     $('#compaign_id').html('');
    }
    $('#contact').attr('disabled', false);
   }

  })
 });

});

///------------------------------Code for delete ------------------------------

$(document).ready(function(){
 $('.delete').click(function(){
    var pid = $(this).attr('pid');
    var aid = $(this).attr('aid');
  $.ajax({
   url:"<?php echo base_url(); ?>Admin/User_Controller/assignCompaigndelete",
   method:"GET",
   data:{pid:pid},
   dataType:"json",
   success:function(data)
   {
     if(data.unsuccess)
    {
    
      $('#success_message').html(data.unsuccess);
     
    }
    if(data.success)
    {
       $('#success_message').html(data.success);
          setTimeout(admincompaign(aid),40000);
    }
  
   }
  });
 });

});

*/

</script>