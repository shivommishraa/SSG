<div class="modal-dialog modal-lg">
  <div class="modal-content">
    <h4  class="btn btn-primary btn-block">Pages Details
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button> </h4>
        <div class="container">
          <div class="row" style="margin-top: 10px;">
            <div class="col-lg-12 form-group">
              <b>Route :</b> <?php echo $tbl_pages[0]->route ?></div>
              <div class="col-lg-12 form-group">
                <b>Content:</b><span style="text-align: justify;
                text-justify: inter-word;"> <?php echo $tbl_pages[0]->content ?></span></div>

              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger btn-md-lg pull-left" data-dismiss="modal">Close</button>
            </div>
          </div>