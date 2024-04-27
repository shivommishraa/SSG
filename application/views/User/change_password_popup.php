<div class="modal-dialog modal-md">
  <div class="modal-content">
    <h4  class="btn btn-primary btn-block">Change Password
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button> </h4>
        <div class="container">
          <div class="card-body">
           <span id="success_message"></span>
           <form class="needs-validation" method="post" enctype="multipart/form-data" id="contact_form">
             <!-- action="<?php echo site_url()?>Admin/User_Controller/user_changepassword">-->
             <div class="row">
               <input type="hidden" name="admin_id"value="<?php echo $user[0]->admin_id ?>">
               <input type="hidden" name="Eemail_id"value="<?php echo $user[0]->email_id ?>">
               <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                <label for="validationCustom01">User Id</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-user" aria-hidden="true"></i></span>
                  </div>
                  <input type="email" name="email_id" class="form-control" id="" placeholder="User Id" aria-describedby="inputGroupPrepend" required>
                </div>
                <span id="email_id" class="text-danger"></span>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-2 "> <label for="validationCustom01">Old Password</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-key" aria-hidden="true"></i></span>
                  </div>
                  <input type="Password" name="old_password"class="form-control" id="old_password" placeholder="Old Password" aria-describedby="inputGroupPrepend" required>
                  <div class="invalid-feedback">
                    Please Enter Old Password.
                  </div>
                  <span id="old_password" class="text-danger"></span>
                </div>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-2"><label for="validationCustom01">New Password</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-key" aria-hidden="true"></i></span>
                  </div>
                  <input type="Password" name="new_password" class="form-control" id="new_password" placeholder="New Password" aria-describedby="inputGroupPrepend" required>
                  
                  <span id="new_password" class="text-danger"></span>
                </div>
              </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-2"><label for="validationCustom01">Confirm Password</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend"><i class="fa fa-key" aria-hidden="true"></i></span>
                  </div>
                  <input type="Password" name="confirm_password" class="form-control" id="validationCustomUsername" placeholder="Confirm Password" aria-describedby="inputGroupPrepend" required>
                  <div class="invalid-feedback">
                    Please Enter Confirm Password.
                  </div>
                  <span id="confirm_password" class="text-danger"></span>
                </div>
              </div>
            </div>
            
            
            <div class="modal-footer mt-4">
             
             <button class="btn btn-primary" type="submit">Change</button>
             <button type="button" class="btn btn-danger btn-md-lg pull-left" data-dismiss="modal">Close</button>
           </div>
         </div>
       </div>
     </form>



     <script>
      $(document).ready(function(){

       $('#contact_form').on('submit', function(event){
        event.preventDefault();
        $.ajax({
         url:"<?php echo base_url(); ?>Admin/User_Controller/user_changepassword",
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
           if(data.email_id != '')
           {
            $('#email_id').html(data.email_id);
          }
          else
          {
            $('#email_id').html('');
          }
          if(data.old_password != '')
          {
            $('#old_password').html(data.old_password);
          }
          else
          {
            $('#old_password').html('');
          }
          if(data.new_password != '')
          {
            $('#new_password').html(data.new_password);
          }
          else
          {
            $('#new_password').html('');
          }
          if(data.confirm_password != '')
          {
            $('#confirm_password').html(data.confirm_password);
          }
          else
          {
            $('#confirm_password').html('');
          }
        }
        if(data.success)
        {
         $('#success_message').html(data.success);
         $('#email_id').html('');
         $('#old_password').html('');
         $('#new_password').html('');
         $('#confirm_password').html('');
         $('#contact_form')[0].reset();
       }
       $('#contact').attr('disabled', false);
     }
   })
      });

     });
   </script>
