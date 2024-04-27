<?php

class Adminmodel extends CI_Model {

  public function Login_Controller()
  {
    parent::model();
  }
  
  
  public function validate()
  {
   $email_id=$this->security->xss_clean($this->input->post('email_id'));
         //$password=md5($this->input->post('password'));
   $password=$this->input->post('password');
   $this->db->select('*');
   $this->db->from('admin');
   $this->db->where('email_id', $email_id);  
   $this->db->where('password', $password);  
   $query = $this->db->get(); 
   if($query->num_rows()>0)
   {
    $row=$query->row();
    $data=array(
      
      'email_id'=>$row->email_id,
      'password'=>$row->password,
      'session_id'=>$row->admin_id,
      'validated'=>true
    );
    
    $this->session->set_userdata($data);
    $this->session->userdata($data);
    return true;
    
  }
  else
  {
    return false;
  }
  
}


public function getadmin($id)
{
  $this->db->where('admin_id', $id);
  return $this->db->get('admin')->result();
}

public function total_admin()
{
 return $this->db->get('admin')->num_rows();
}    

public function get_emp_last_row(){
 $this->db->order_by('admin_id','DESC');
 return $this->db->get('admin')->result();  
}
/*===================== Start Important code for Excel Uploder file====================*/

public function get_data_email($email)
{
 $this->db->where('email_id',$email);
 return $this->db->get('admin')->num_rows();
}

public function emp_role_id($role){
  $query=$this->db->get_where('tbl_role',array('role_name' => trim($role)));
  return $query->row_array();
}

public function emp_dept_id($dept){
  $query=$this->db->get_where('tbl_department',array('dept_name' => trim($dept)));
  return $query->row_array();
}

public function emp_dsgn_id($id){
  $query=$this->db->get_where('tbl_designation',array('dsgn_name' => trim($id)));
  return $query->row_array();
}


public function update_excel_emp($updeteemp){
  $this->db->update_batch('admin', $updeteemp,'email_id');
  return true;
}

public function import_excel_data($data)
{
 $this->db->insert_batch('admin', $data);
 return true;
}

/*===================== End Important code for Excel Uploder file====================*/



}  

