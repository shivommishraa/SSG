    <!-- Page Banner Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="<?php echo base_url(); ?>ssgassests/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>My Profile</h2>
                        <div class="breadcrumb__option">
                            <a href="<?php echo base_url(); ?>">Home</a>
                            <span>My Profile</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </section>
  <!-- Page Banner Section End -->
  <!-- My Profile Section Begin -->
  <section class="featured spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action active" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">My Profile</a>
            <!-- <a class="list-group-item list-group-item-action" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Address</a>
            <a class="list-group-item list-group-item-action" id="list-messages-list" data-toggle="list" href="#list-messages" role="tab" aria-controls="messages">My Orders</a>
            <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Settings</a> -->
          </div>
        </div>
        <div class="col-lg-8">
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
              <!-- ================Home===================== -->
              <section style="background-color: #eee;">
                <div class="container py-5">
                  <!-- <div class="row">
                    <div class="col">
                      <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                          <li class="breadcrumb-item"><a href="#">Home</a></li>
                          <li class="breadcrumb-item"><a href="#">User</a></li>
                          <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                        </ol>
                      </nav>
                    </div>
                  </div> -->

                  <div class="row">
                    <div class="col-lg-4">
                      <div class="card mb-4">
                        <div class="card-body text-center">
                          <?php if(!empty($loggedinCusomter[0]->customerimage)){ ?>
                            <img src="<?php echo base_url(); ?>ssgassests/img/customerimage/<?php echo $loggedinCusomter[0]->customerimage; ?>" alt="avatar"
                            class="rounded-circle img-fluid" style="width: 150px;">
                          <?php }else{ ?>
                          <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                            class="rounded-circle img-fluid" style="width: 150px;">
                          <?php } ?>
                          <h5 class="my-3"><?php echo $loggedinCusomter[0]->name; ?></h5>
                          <!-- <p class="text-muted mb-1">Full Stack Developer</p> -->
                          <!-- <p class="text-muted mb-4">Bay Area, San Francisco, CA</p> -->
                          <!-- <div class="d-flex justify-content-center mb-2">
                            <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary">Follow</button>
                            <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-primary ms-1">Message</button>
                          </div> -->
                        </div>
                      </div>
                     <!--  <div class="card mb-4 mb-lg-0">
                        <div class="card-body p-0">
                          <ul class="list-group list-group-flush rounded-3">
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                              <i class="fas fa-globe fa-lg text-warning"></i>
                              <p class="mb-0">https://mdbootstrap.com</p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                              <i class="fab fa-github fa-lg text-body"></i>
                              <p class="mb-0">mdbootstrap</p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                              <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                              <p class="mb-0">@mdbootstrap</p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                              <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                              <p class="mb-0">mdbootstrap</p>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                              <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                              <p class="mb-0">mdbootstrap</p>
                            </li>
                          </ul>
                        </div>
                      </div> -->
                    </div>
                    <div class="col-lg-8">
                      <div class="card mb-4">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-3">
                              <p class="mb-0">Full Name</p>
                            </div>
                            <div class="col-sm-9">
                              <p class="text-muted mb-0"><?php echo $loggedinCusomter[0]->name; ?></p>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                              <p class="text-muted mb-0"><?php echo $loggedinCusomter[0]->email; ?></p>
                            </div>
                          </div>
                          <hr>
                          <!-- <div class="row">
                            <div class="col-sm-3">
                              <p class="mb-0">Phone</p>
                            </div>
                            <div class="col-sm-9">
                              <p class="text-muted mb-0">34534534</p>
                            </div>
                          </div>
                          <hr> -->
                          <div class="row">
                            <div class="col-sm-3">
                              <p class="mb-0">Mobile</p>
                            </div>
                            <div class="col-sm-9">
                              <p class="text-muted mb-0"><?php echo $loggedinCusomter[0]->mobile; ?></p>
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <p class="mb-0">User Type</p>
                            </div>
                            <div class="col-sm-9">
                              <p class="text-muted mb-0">General</p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- <div class="row">
                        <div class="col-md-6">
                          <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                              <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status
                              </p>
                              <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                              <div class="progress rounded" style="height: 5px;">
                                <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                                  aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                              <div class="progress rounded" style="height: 5px;">
                                <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72"
                                  aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                              <div class="progress rounded" style="height: 5px;">
                                <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89"
                                  aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                              <div class="progress rounded" style="height: 5px;">
                                <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55"
                                  aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                              <div class="progress rounded mb-2" style="height: 5px;">
                                <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66"
                                  aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="card mb-4 mb-md-0">
                            <div class="card-body">
                              <p class="mb-4"><span class="text-primary font-italic me-1">assigment</span> Project Status
                              </p>
                              <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                              <div class="progress rounded" style="height: 5px;">
                                <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80"
                                  aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                              <div class="progress rounded" style="height: 5px;">
                                <div class="progress-bar" role="progressbar" style="width: 72%" aria-valuenow="72"
                                  aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                              <div class="progress rounded" style="height: 5px;">
                                <div class="progress-bar" role="progressbar" style="width: 89%" aria-valuenow="89"
                                  aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                              <div class="progress rounded" style="height: 5px;">
                                <div class="progress-bar" role="progressbar" style="width: 55%" aria-valuenow="55"
                                  aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                              <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                              <div class="progress rounded mb-2" style="height: 5px;">
                                <div class="progress-bar" role="progressbar" style="width: 66%" aria-valuenow="66"
                                  aria-valuemin="0" aria-valuemax="100"></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div> -->
                    </div>
                  </div>
                </div>
              </section>
              <!-- =================Home==================== -->
            </div>
            <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
              ..2.
            </div>
            <div class="tab-pane fade" id="list-messages" role="tabpanel" aria-labelledby="list-messages-list">
              ..3.
            </div>
            <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
              ..4.
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- My Profile Section End -->
  <script>
    $(function () {
        $('#myList a:last-child').tab('show')
    })
  </script>