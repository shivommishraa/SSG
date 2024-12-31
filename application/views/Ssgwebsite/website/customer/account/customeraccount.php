    <!-- Blog Details Hero Begin -->
    <section class="blog-details-hero set-bg" data-setbg="<?php echo base_url(); ?>ssgassests/img/blog/details/details-hero.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog__details__hero__text">
                        <h2>The Moment You Need To Remove Garlic From The Menu</h2>
                        <ul>
                            <li>By Michael Scofield</li>
                            <li>January 14, 2019</li>
                            <li>8 Comments</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="list-group" id="myList" role="tablist">
      <a class="list-group-item list-group-item-action active" data-toggle="list" href="#home" role="tab">Home</a>
      <a class="list-group-item list-group-item-action" data-toggle="list" href="#profile" role="tab">Profile</a>
      <a class="list-group-item list-group-item-action" data-toggle="list" href="#messages" role="tab">Messages</a>
      <a class="list-group-item list-group-item-action" data-toggle="list" href="#settings" role="tab">Settings</a>
    </div>

    <div class="tab-content">
      <div class="tab-pane active" id="home" role="tabpanel">...</div>
      <div class="tab-pane" id="profile" role="tabpanel">...</div>
      <div class="tab-pane" id="messages" role="tabpanel">...</div>
      <div class="tab-pane" id="settings" role="tabpanel">...</div>
    </div>

    <script>
      $(function () {
        $('#myList a:last-child').tab('show')
      })
    </script>