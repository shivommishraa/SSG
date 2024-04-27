<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <form role="form" method="post" action="<?php echo site_url()?>changeprojectstatus" enctype="multipart/form-data"></html>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Change Project Status</h4>
          <div class="form-group col-md-12">
            <div class="modal-body">

              <br /><label for="status">Status</label> 

              <select class="form-control" name="status_id" id="status_id" required >

               <option value="">Select Status</option>

               <?php foreach($status as $row): ?>

                 <option value="<?php echo $row->status_id; ?>"><?php echo $row->status_name; ?></option>

               <?php endforeach; ?>

             </select>

           </div>

           <div class="form-group col-md-4">

            <span style="color: red;"> <?php echo form_error('project_id'); ?></span>

            <input type="hidden" value=" <?php echo $id; ?> " name="project_id" class="form-control" id="project_id" />
          </div>

          <div class="form-group col-md-12">
            <label for="leadid">Description</label>
            <span style="color: red;"></span>
            <textarea type="text" required=""  name="comments" class="form-control" id="comments"></textarea>

          </div>

        </div>
        <div class="modal-footer">

         <button type="submit" class="btn btn-info">Save Changes</button>

       </div> </form>
       <!---------------------------------------== Start Code for Project history List ==----------------------------------------------->


       <!--Table-->
       <table class="table table-striped">
         <h4  class="modal-title"><b>Project History</b> </h4>
         <?php if(count($phistory)){ ?>
          <table id="example2" class="table table-bordered table-hover">

            <thead>
              <tr>

                <th class="clt">Title </th>
                <th class="clt">Description</th>
                <th class="clt">Status</th>
                <th class="clt">Added By</th>
                <th class="clt">Added Date</th>
                <th class="clt">Action</th>


              </tr>
            </thead>
            <?php   $i=1; foreach($phistory as $history) { ?>
              <tfoot>
                <tbody>
                  <tr>

                    <td class="cltdata"><?php  echo $history->pr_title;?></td>
                    <td><?php echo $history->comments ?></td>
                    <td><?php echo $history->status_name ?></td>
                    <td><?php echo $history->fname ?>&nbsp;<?php echo $history->lname ?></td>
                    <td><?php echo $history->mod_at ?></td>
                    <td><a href="<?php echo site_url()?>deleteProjectHistory/<?php echo $history->history_id?>" onclick="return confirm('are you sure to delete')""><i class="fa fa-fw fa-remove" style="color:red;font-size:18px;"></i></a>
                    </td>





                  </tr>
                  <?php $i++; } ?>
                </tbody>
              </tfoot>




            </table>
            <!--Table-->


            <!--Section: Live preview-->
          <?php } else {?>
            <br/>
            <div class="alert alert-info" role="alert">
              <strong>Sorry No Data Found!</strong>
            </div>
          <?php } ?>


          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>

        </section>              

        <!---------------------------------------== End Code for Project history  details List ==----------------------------------------------->

      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->



