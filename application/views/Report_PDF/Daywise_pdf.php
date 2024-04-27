<html>
<head>
  <style>
  table tr th{
   font-weight: bold;
   color:white;
   background-color: #888;     
 }
</style>
</head>
<body><hr>
 <table  align="center" width="100%" border="1" cellpadding="1" cellspacing="0" nobr="true" style="margin-top: 60px;">
  <?php if(!empty($userlogindata)) { ?>
    <thead>
     <tr>
       <th>SL No</th>
       <th>Name</th>
       <th>Role</th>
       <?php $i=1; foreach($all_process as $pro) { ?>
         <th><?php echo $pro->compaign_name ?></th>
       <?php } ?>
       <th> Total </th>
     </tr>
   </thead>
   <tbody> 
     <?php foreach($userlogindata as $ro) {
      $Role=$get_role($ro->role_id);
      ?>
      <tr>
       <td> <?php  echo $i; ?> </td>
       <td> <?php echo $ro->name ?></td>
       <td> <?php echo $Role[0]->role_name ?></td>
       <?php $value=array();foreach($all_process as $pro) {?>
         <td> 
           <?php $camp_value=$get_comp_value($ro->admin_id,$pro->compaign_id,$date);
           if(!empty($camp_value)){ echo $val=$camp_value[0]->pro_val; $value[]=$val; }else{ $day=date('l', strtotime($date)); 
           if($day=="Saturday" || $day=="Sunday"){ ?>
            <span style="color: red;">W</span>
          <?php  }
          else{ echo '0';}}
          ?></td>
        <?php } ?>
        <td><?php echo array_sum($value); ?></td>
      </tr>
      <?php $i++;} ?>
      
    </tbody>
  </table>
  
<?php } else {?>
  <div class="alert alert-danger" role="alert">
   <strong>No Any Record Found...!!</strong>
 </div>
<?php } ?> 
</body>
</html>