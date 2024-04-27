<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <h4  class="btn btn-primary btn-block">Assign Process
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button> </h4>
        <div class="container">
          <div class="row" style="margin-top: 10px;">
           <div class="card-body">
             <span id="success_message"></span>
             <form class="needs-validation" method="post" enctype="multipart/form-data" id="contact_form">
              <div class="row">
               <input type="hidden" id="aid" name="admin_id"value="<?php echo $user[0]->admin_id ?>">
               <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 ml-3">
                <label for="validationCustom01"><?php echo $user[0]->name; ?></label>
                <div class="input-group">
                 <select class="form-control"  name="compaign_id" id="validationCustom02"required>
                   <option value="">Select Process</option>
                   <?php foreach($compaign as $row): ?>
                    <option value="<?php echo $row->compaign_id; ?>" ><?php echo $row->compaign_name; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <span id="compaign_id" class="text-danger"></span>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 pt-4">      
              <button class="btn btn-primary" aid="<?php echo $user[0]->admin_id ?>" id="pcc" type="submit">Assign</button>
            </div>
          </div>
        </form></div>
        <div class="container">                  
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
</div>


<!---------------------Code for get and submit data to database------------------>
<script>
  $(document).ready(function(){

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



</script>