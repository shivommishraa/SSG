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
                    
                    <ul class="nav flex-column">
                       
                        <?php if (!empty($menu_groups)) { ?>
                         <?php $i = 1;
                         foreach ($menu_groups as $menu_group) { 
                          ?>
                          <?php 
                          foreach($admin_role as $admin_rname){ if ($admin[0]->role_id == $admin_rname->role_id){ 
                              $page=explode(',',$admin_rname->groups);
                              for($j=0;$j<count($page);$j++){ if ($page[$j] == $menu_group->grp_id){ ?> 
                                 <li class="nav-item">
                                     <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#<?php echo $menu_group->grp_name ?>" aria-controls="<?php echo $menu_group->grp_name ?>" href="<?php  echo $menu_group->grp_page; ?>">
                                        <i class="fas fa-f fa-folder"></i>
                                        <span><?php echo $menu_group->grp_name ?></span>
                                        
                                    </a></li>  <div id="<?php echo $menu_group->grp_name ?>" class="collapse submenu" style="">
                                     <ul class="nav flex-column">
                                         <?php foreach ($menu_details as $menu_detail) {
                                             if($menu_detail->menu_grp==$menu_group->grp_id){
                                                $sub_m=explode(',',$admin_rname->menus);
                                                for($k=0;$k<count($sub_m);$k++){ if ($sub_m[$k] == $menu_detail->menu_id){ 
                                                   
                                                  ?>
                                                  <li <?php if($menu_detail->default_menu_status=='2') { echo 'class="nav-item"';} ?> > 
                                                      <a href="<?php echo base_url().$menu_detail->menu_page;   ?>" ><i class="m-r-10 mdi mdi-subdirectory-arrow-right"></i><?php echo $menu_detail->menu_name ?>
                                                      <?php if($menu_detail->default_menu_status=='2') { ?> <span class="pull-right-container">
                                                         <i class="fa fa-angle-left pull-right"></i>
                                                         </span><?php } ?>
                                                     </a>
                                                     
                                                     <ul  class="nav flex-column" >
                                                         <?php 
                                                         foreach ($menu_details as $menu_detailses) {
                                                            $sub_menu=explode(',',$admin_rname->menus);
                                                            for($m=0;$m<count($sub_menu);$m++){ if ($sub_menu[$m] == $menu_detailses->menu_id){
                                                               if($menu_detail->menu_id == $menu_detailses->child_grp){
                                                                 
                                                                ?>
                                                                <li class="nav-item">
                                                                 <a class="nav-link" href="<?php echo base_url().$menu_detailses->menu_page;   ?>"><i class="m-r-10 mdi mdi-subdirectory-arrow-right"></i><?php echo $menu_detailses->menu_name ?></a>
                                                             </li>
                                                         <?php } } } }  ?>
                                                     </ul>
                                                 </li>
                                             <?php  }  } } } ?>
                                         </ul>
                                     </div>
                                 </li>
                             <?php } } } } }}  ?>
                             
                         </ul>
                     </ul>
                 </div>
             </nav>
         </div>
     </div>
     


