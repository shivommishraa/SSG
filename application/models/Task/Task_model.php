<?php

class Task_model extends CI_Model {

  public function Task_Controller()
  {
    parent::model();
  }

  /*--------- Start Code for count the assigned_task -------------*/

  public function get_count($id='') 
  {
    if($id!=''){

      $this->db->where('member_id ',$id);

    }

    return $this->db->get('tbl_task')->num_rows();
  }

  /*--------- End Code for count the assigned_task -------------*/


  /*------------- Start Code for get all assigned_task from task----------*/

  public function getAll_assigned_task($limit,$start,$id='') {

   $this->db->select('*');
   $this->db->limit($limit,$start);
   if($id!=''){
     $this->db->where('member_id  ',$id);
   }
   $this->db->from('tbl_task');   
   $query=$this->db->get();
   return $query->result();
   
 }
 /*=================== End code for get all assigned_task from task ================*/


 /*=================== Start code for get status by status id to task status table================*/
 public function task_status($id)
 {
  if($id!=''){
   $this->db->where('task_status_id  ',$id);
 }
 $this->db->from('task_status');   
 $query=$this->db->get();
 return $query->result();
}
/*=================== End code for get task status by id ==============================*/

/*=================== Start code for get all task status ==============================*/
public function getall_task_status()
{
  return $this->db->get('task_status')->result();
}
/*=================== End code for get all task status ==============================*/

/*=================== Start code for Update task status ==============================*/
public function Update_task_status($id,$data)
{
 $this->db->where('task_id', $id);
 $this->db->update('tbl_task', $data);
 return true;
}
/*=================== End code for Update task status ==============================*/

/*=================== Start code for get task status by tbl_task==============================*/
public function get_task_byid($id)
{
 $this->db->where('task_id',$id);
 $this->db->from('tbl_task');   
 $query=$this->db->get();
 return $query->result();
}
/*=================== End code for get task status by tbl_task==============================*/

/*=================== Start code for find single project details==============================*/
public function find_project($pr_id){

  $this->db->select('*');
  $this->db->where('pr_id',$pr_id);
  return $this->db->get('tbl_project')->result();
}
/*=================== End code for find single project details==============================*/


/*================================= Start code for task_status_history =======================*/

public function task_status_history($id,$tid)
{
 $this->db->select('*');
 $this->db->where('project_id',$id);
 $this->db->where('task_id',$tid);
 return $this->db->get('task_status_history')->result();
}


/*================================= Start code for mile_status_history =======================*/

public function mile_status_history($id,$tid)
{
 $this->db->select('*');
 $this->db->where('project_id',$id);
 $this->db->where('mile_id',$tid);
 return $this->db->get('mile_status_history')->result();
}

public function get_mail_byid($id)
{
 $this->db->where('mile_id',$id);
 $this->db->from('tbl_milestone');   
 $query=$this->db->get();
 return $query->result();
}



/*=================== Start code for Update Milestone status ==============================*/
public function Update_mile_status($id,$data)
{
 $this->db->where('mile_id', $id);
 $this->db->update('tbl_milestone', $data);
 return true;
}
/*=================== End code for Update Milestone status ==============================*/



}  

