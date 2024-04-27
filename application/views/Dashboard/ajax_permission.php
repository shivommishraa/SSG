
<div class="form-group col-md-6" id="sbname">
    <label for="name">Permission:</label>

    <div style="border:1px solid lightgray;">
    <?php  foreach ($menu_groups as $menu_group) { ?> 
     <li> <input type="checkbox" name="gruops[<?php echo $menu_group->grp_id ?>]" value="<?php echo $menu_group->grp_id ?>" <?php $arr=(explode(',',$datata[0]->groups)); for($i=0;$i<count($arr);$i++){ if($menu_group->grp_id ==  $arr[$i]){ echo "checked"; } }?> /><strong>&nbsp;&nbsp;<?php echo $menu_group->grp_name ;?></strong>
     <?php  foreach ($menu_details as $menu_detail){  if($menu_detail->menu_grp == $menu_group->grp_id){ ?>
   <ul><input type="checkbox" name="menus[<?php echo $menu_detail->menu_id  ?>]"  value="<?php echo $menu_detail->menu_id ?>" <?php $menu_r =(explode(',',$datata[0]->menus));for($i=0;$i<count($menu_r);$i++){ if($menu_detail->menu_id == $menu_r[$i]) echo "checked"; }   ?> />&nbsp;&nbsp;<?php echo $menu_detail->menu_name;?></ul>
    <?php } } } ?>
   </li>
   </div>
    </div>
