<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Menu
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-10" aria-controls="submenu-10"><i class="fas fa-f fa-folder"></i>User</a>
                        <div id="submenu-10" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url(); ?>Admin/User_Controller/manage_user">Manage User</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url(); ?>Admin/User_Controller/add_user">Add User</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url(); ?>Admin/Role_Controller/manage_role">Manage Role</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url(); ?>Admin/Role_Controller/addrole">Add Role</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url(); ?>Task/Task_Controller/assigned_task">Assigned Task</a>
                                </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url(); ?>Admin/User_Controller/user_meeting">User Meeting</a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-101" aria-controls="submenu-101"><i class="fas fa-f fa-folder"></i>Report</a>
                        <div id="submenu-101" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url(); ?>Report/Daywise_Controller/daywise_report">Day Wise</a>
                                </li>




                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-8" aria-controls="submenu-8"><i class="fas fa-fw fa-columns"></i>Shift</a>
                        <div id="submenu-8" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url(); ?>Shift/Shift_Controller/manage_shift">Manage Shift</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url(); ?>Shift/Shift_Controller/add_shift">Add Shift</a>
                                </li>

                            </ul>
                        </div>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-8Meeting" aria-controls="submenu-8Meeting"><i class="fas fa-fw fa-columns"></i>Meeting</a>
                        <div id="submenu-8Meeting" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url(); ?>Meeting/Meeting_Controller/manage_meeting">Manage Meeting</a>
                                </li>
                                 <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url(); ?>Meeting/Meeting_Controller/Add_meeting">Add Meeting</a>
                                </li>
                               
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-9" aria-controls="submenu-9"><i class="fas fa-fw fa-map-marker-alt"></i>Process</a>
                        <div id="submenu-9" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url(); ?>Compaign/Compaign_Controller/manage_compaign">Manage Process</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url(); ?>Compaign/Compaign_Controller/add_compaign">Add Process</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-99" aria-controls="submenu-99"><i class="fa fa-fw fa-rocket"></i>Agent CSR</a>
                        <div id="submenu-99" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url(); ?>CSR/CSR_Controller/Manage_csr">Manage CSR<span class="badge badge-secondary">New</span></a>
                                    <a class="nav-link" href="<?php echo site_url(); ?>CSR/CSR_Controller/add_csr">Add CSR <span class="badge badge-secondary">New</span></a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-77" aria-controls="submenu-77"><i class="fas fa-fw fa-inbox"></i>Admin CSR <span class="badge badge-secondary">New</span></a>
                        <div id="submenu-77" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo site_url(); ?>Admin_CSR/CSR_Controller/Manage_csr">Manage CSR<span class="badge badge-secondary">New</span></a>
                                    <a class="nav-link" href="<?php echo site_url(); ?>Admin_CSR/CSR_Controller/add_csr">Add CSR <span class="badge badge-secondary">New</span></a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    <!-- =============  Important Link for future project Temprery Hide ..NO DELETE ======= -->
                           <!--  <li class="nav-item ">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Product<span class="badge badge-success">6</span></a>
                                <div id="submenu-1" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                       
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo site_url(); ?>Product/Tbl_productController/ManageTbl_product">Manage Product</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo site_url(); ?>Product/Tbl_productController/addTbl_product">Add Product</a>
                                        </li>
                                         <li class="nav-item">
                                            <a class="nav-link" href="<?php echo site_url(); ?>Image_gallery/manage_gallery">Product Gallery</a>
                                        </li>
                                         <li class="nav-item">
                                            <a class="nav-link" href="<?php echo site_url(); ?>Product/Tbl_productController/manage_inquiry">Product Inquiry</a>
                                        </li>
                                       
                                    </ul>
                                </div>
                            </li> -->


                           <!--  <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-fw fa-chart-pie"></i>Brand</a>
                                <div id="submenu-3" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo site_url(); ?>Brand/Tbl_brandController/ManageTbl_brand">Manage brand</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo site_url(); ?>Brand/Tbl_brandController/addTbl_brand">Add Brand</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </li> -->
                             <!-- <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-rocket"></i>Product Image</a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo site_url(); ?>Product_Image/Product_imageController/ManageProduct_image">Manage Product Image <span class="badge badge-secondary">New</span></a>
                                             <a class="nav-link" href="<?php echo site_url(); ?>Product_Image/Product_imageController/addProduct_image">Add Product Image <span class="badge badge-secondary">New</span></a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </li>-->
                            <!-- == Upper side written Important Link for future project Temprery Hide ..NO DELETE ==== -->
                            <li class="nav-item ">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4444" aria-controls="submenu-4444"><i class="fab fa-fw fa-wpforms"></i>Project</a>
                                <div id="submenu-4444" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo site_url()?>Project/ProjectController/projectlist">Manage Project</a>
                                            <a class="nav-link" href="<?php echo base_url()?>/Project/ProjectController/Agent_Project">Agent Project</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-item ">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fab fa-fw fa-wpforms"></i>Category</a>
                                <div id="submenu-4" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo site_url()?>Category/Category_Controller/ManageTbl_category">Manage Category</a>
                                            <a class="nav-link" href="<?php echo site_url()?>Category/Category_Controller/addTbl_category">Add Category</a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fas fa-fw fa-file"></i>Pages</a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo site_url(); ?>Pages/Tbl_pagesController/manageTbl_pages">Manage Pages <span class="badge badge-secondary">New</span></a>
                                            <a class="nav-link" href="<?php echo site_url(); ?>Pages/Tbl_pagesController/addTbl_pages">Add Pages <span class="badge badge-secondary">New</span></a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-7" aria-controls="submenu-7"><i class="fas fa-fw fa-inbox"></i>Query <span class="badge badge-secondary">New</span></a>
                                <div id="submenu-7" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="<?php echo base_url(); ?>Query/Query/manageQuery">Manage Query</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </li>




                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        