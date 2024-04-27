<?php

class CSR_model extends CI_Model {

    public function CSR_Controller()
    {
        parent::model();
    }
    
    /*------- Start Code for insert the data for role ----------*/
    
    public function insert($data) {
        $insert =$this->db->insert('pro_stat_sr', $data);
        return $insert?$this->db->insert_id():false;
    }    
    
    /*--------------Start Code for to get process by empid-----------*/

    public function getProcessById($id){
        $this->db->where('emp_id', $id);
        return $this->db->get('process_history')->result();
    }
    
    /*--------- Start Code for count the role -------------*/
    
    public function get_count() 
    {
        $this->db->where('role_id', '5');
        return $this->db->get('admin')->num_rows();
    }

    /*------------------------- Get data for check box-----------------*/
    
    public function getdataforcheckbox($id,$date,$shift_id)
    {
        $this->db->where('emp_id', $id);
        $this->db->where('pro_date', $date);
        $this->db->where('shift_id', $shift_id);
        return $this->db->get('pro_stat_sr')->result();
    }

    /*------------- Start Code for get all role from tbl_role----------*/
    
    public function getAll_CSR($limit,$start) {
     
       $this->db->select('*');
       $this->db->limit($limit, $start);
       $this->db->where('role_id', '5');
       $this->db->from('admin');   
       $query=$this->db->get();
       return $query->result();
       
   }

   /*--------- Check Already CSR Present or not of given date ----------*/
   public function check_already_addcsr($id,$fkey,$date)
   {
       $this->db->select('*');
       if($id!=''){
           $this->db->where('emp_id',$id);
       }
       if($fkey!=''){
           $this->db->where('camp_id',$fkey);
       }
       if($date!=''){
           $this->db->where('pro_date',$date);
       }
       $this->db->from('pro_stat_sr');   
       $query=$this->db->get();
       return $query->result();
   }

   /*-------------- Code for to get Process Value ---------------*/
   
   public function get_comp_value($adminid,$compid,$date){
    $this->db->select('*');
    if($adminid!=''){
       $this->db->where('emp_id',$adminid);
   }
   if($compid!=''){
       $this->db->where('camp_id',$compid);
   }
   if($date!=''){
       $this->db->where('pro_date',$date);
   }
   $this->db->from('pro_stat_sr');   
   $query=$this->db->get();
   return $query->result();
}

public function get_sum_processvalue($adminid,$date)
{
    
   if($adminid!=''){
       $this->db->where('emp_id',$adminid);
   }
   
   if($date!=''){
       $this->db->where('pro_date',$date);
   } 
   $this->db->select_sum("pro_val");
   $query= $this->db->get("pro_stat_sr")->row();
   
   return $query->pro_val;
}

/*----------- Start Code for delete the role ---------------*/

public function delete($id) {
    $this->db->where('role_id', $id);
    $this->db->delete('tbl_role');
    return true;
}

/*------ Start code for change status for role------------*/

public function changeStatus($id) {
   $table=$this->getDataById($id);
   if($table[0]->is_status==0)
   {
    $this->update($id,array('is_status' => '1'));
    return "Activated";
}else{
    $this->update($id,array('is_status' => '0'));
    return "Deactivated";
}
}


/*------------- Start Code for search by id ---------*/

public function getDataById($id) {
    $this->db->where('role_id', $id);
    return $this->db->get('tbl_role')->result();
}

/*-------------- Start Code for update the role -------*/

public function update($id,$camp_id,$date,$data) {
    $this->db->where('emp_id', $id);
    $this->db->where('camp_id', $camp_id);
    $this->db->where('pro_date', $date);
    $this->db->update('pro_stat_sr', $data);
    return true;
}

public function insert_stat_upd_history($data)
{
  $insert =$this->db->insert('pro_stat_upd_history', $data);
  return $insert?$this->db->insert_id():false;
}

public function allshift()
{
    return $this->db->get('tbl_shift')->result();
}

public function findprocess($admin_id)
{
    $this->db->where('emp_id', $admin_id);
    return $this->db->get('process_history')->result();
}

public function getprocessbyshift($shift_id)
{
    $this->db->where('shift_id', $shift_id);
    return $this->db->get('tbl_compaign')->result();
}


public function getadminbyroleid($id)
{
    $this->db->where('role_id', $id);
    return $this->db->get('admin')->result();
}

public function getadminteam_member_id($id)
{
    $this->db->where('team_member_id', $id);
    $this->db->order_by('name', 'ASC');
    $query = $this->db->get('admin');
    $output = '<option value="">Select Option </option>';
    foreach($query->result() as $row)
    {
     $output .= '<option value="'.$row->admin_id.'">'.$row->name.'</option>';
 }
 return $output;
}

public function getmanagerByIdCSR($id)
{
    $this->db->where('team_member_id', $id);
    return $this->db->get('admin')->result();
}
}  

