<?php
class Project extends CI_Model
{
  public function ProjectController()
  {
    parent::model();
    $this->load->library('session');
  }
  /*start code for the insert the project*/
  public function insert($data)
  {
    $this->db->insert('tbl_project',$data);
    return $this->db->insert_id();
  }
  /*Start code of count the project */
  public function get_count($name="",$type=""){

    if($name!=''){

      $this->db->where('pr_title',$name);

        //$this->db->like('film.title',"%$query%");
    }
    if($type!=''){
      $this->db->where('pr_worktype',$type);
    }

    return $this->db->get('tbl_project')->num_rows();
  }

 /* public function getAll()
  {

   $this->db->select('*');
   $this->db->from('tbl_project');
   $this->db->join('client_user','tbl_project.prospect_id=client_user.cltid');
   $this->db->join('admin','tbl_project.pr_mod_by=admin.adminid');
   $this->db->join('tbl_status','tbl_project.pr_status_id=tbl_status.status_id');
   $query = $this->db->get();
   return $query->result();

 }*/
 /*start code for find the all project*/
 public function getallproject($limit, $start,$name='',$type='')
 {
  $this->db->select('*');
  $this->db->limit($limit, $start);
  if($name!=''){
    $this->db->where('pr_title',$name);
  }
  if($type!=''){
    $this->db->where('pr_worktype',$type);
  }
  $this->db->from('tbl_project');
  $query = $this->db->get();
  return $query->result();

}


/*start code for project delete*/

public function delete($id)
{
  $this->db->where('pr_id',$id);
  $this->db->delete('tbl_project');
  return true;
}

/*Start code for update the project*/

public function updated($id,$data) {
  $this->db->where('pr_id', $id);
  $this->db->update('tbl_project', $data);
  return true;
}   

/*==================== Start code for get all agent =============================*/

public function getAll_agent($limit, $start,$admin_id="") {
 $role_id="5";
 $this->db->select('*');
 $this->db->limit($limit, $start);
 $this->db->where('role_id',$role_id);
 if(!empty($admin_id)){
   $this->db->where('admin_id',$admin_id);}
   $this->db->from('admin');   
   $query=$this->db->get();
   return $query->result();
   
 }
 /*start code for the count the agent*/
 public function count_for_agent($admin_id=""){

   $role_id=5;
   $this->db->where('role_id',$role_id);
   if(!empty($admin_id)){
     $this->db->where('admin_id',$admin_id);}
     return $this->db->get('admin')->num_rows();

   }

   /*==================== End code for get all agent =============================*/

   public function getDataById($id) {

     $this->db->select('*');
     $this->db->where('pr_id',$id);
     $this->db->from('tbl_project');
     $query=$this->db->get();
     return $query->result();

   } 

   public function get_allproject() {

     $this->db->select('*');
     $this->db->from('tbl_project');
     $query=$this->db->get();
     return $query->result();

   } 

   public function getAllCustomer()
   {
       $this->db->select('*');
     $this->db->from('tbl_customer');
     $query=$this->db->get();
     return $query->result();
   }

   public function update($id,$data) {
    $this->db->where('pr_id', $id);
    $this->db->update('tbl_project', $data);
    return true;
  } 



  public function changeStatuspr($id) 
  {
   $table=$this->getDataById($id);
   if($table[0]->pr_status==0)
   {
    $this->update($id,array('pr_status' => '1'));
    return "Activated";
  }else{
    $this->update($id,array('pr_status' => '0'));
    return "Deactivated";
  }
}


             //Menu List 
public function getAllMenuGroup()
{
  return $this->db->get('tbl_menu_group')->result();
}
public function getAllMenu()
{
  $qry_menu = "SELECT * FROM  tbl_menu";
  $q = $this->db->query($qry_menu);
  return $q->result();  
} 



public function allprojectstatus()
{

  $this->db->select('*');

  $this->db->where('status_type',3);

  return $this->db->get('tbl_status')->result();
}


public function changeProjectStatus($data)
{
  $this->db->insert('project_history',$data);
  return $this->db->insert_id(); 
}

public function updateprojectstatus($project_id,$statusid)
{

  $this->db->set('pr_status_id',$statusid,false);
  $this->db->where('pr_id',$project_id);
  $this->db->update('tbl_project');
  return true;

}





public function deleteProjectHistory($id)
{
  $this->db->where('history_id',$id);
  $this->db->delete('project_history');
  return true;
}


public function deleteproject($id)
{
  $this->db->where('pr_id',$id);
  $this->db->delete('tbl_project');
  return true;
}

public function ProjectHistoryDetails($id)
{

  $this->db->select('*');
  $this->db->from('project_history');
  if(!empty($id)) {
    $this->db->group_start();
    $this->db->like('project_id',$id);
    $this->db->join('admin', 'project_history.mod_by = admin.adminid');
    $this->db->join('tbl_status', 'project_history.status_id = tbl_status.status_id');
    $this->db->group_end();
    $query=$this->db->get();
    return $query->result();

  }
}


/*============== Start code for add project team ==================*/

public function insert_projectTeam($data){
  $this->db->insert('project_team',$data);
  return $this->db->insert_id();
}

public function insert_projectTeam_history($data){
  $this->db->insert('project_team_history',$data);
  return $this->db->insert_id();
}


public function get_projectteam($id){

  $this->db->select('*');
  $this->db->where('project_id',$id);
  return $this->db->get('project_team')->result();
}

public function deleteteam_member($id)
{
  $this->db->where('team_id',$id);
  $this->db->delete('project_team');
  return true;
}

public function check_already_member($pr_id,$member_id){

  $this->db->select('*');
  $this->db->where('project_id',$pr_id);
  $this->db->where('member_id  ',$member_id);
  return $this->db->get('project_team')->result();
}


public function get_projectteamhistory($id)
{
  $this->db->select('*');
  $this->db->where('project_id',$id);
  return $this->db->get('project_team_history')->result();
}


public function projecthistorydelete($id)
{
  $this->db->where('history_id',$id);
  $this->db->delete('project_history');
  return true;
}


public function insert_task($data)
{
  $this->db->insert('tbl_task',$data);
  return $this->db->insert_id();
}

public function insert_task_histry($data){
  $this->db->insert('task_status_history',$data);
  return $this->db->insert_id();
}
public function get_alltask()
{
  return $this->db->get('tbl_task')->result();
}

public function get_taskbyid($id)
{
  $this->db->select('*');
  $this->db->where('project_id',$id);
  return $this->db->get('tbl_task')->result();
}

public function editmember_task($id)
{
 $this->db->select('*');
 $this->db->where('task_id',$id);
 return $this->db->get('tbl_task')->result();
}

public function delete_member_task($id)
{
  $this->db->where('task_id',$id);
  $this->db->delete('tbl_task');
  return true;
}

public function update_member_task($id,$data)
{

 $this->db->where('task_id', $id);
 $this->db->update('tbl_task', $data);
 return true;
}


public function get_Added_member($id)
{
  $this->db->select('*');
  $this->db->where('project_id',$id);
  return $this->db->get('project_team')->result();
}


/*========================== Start code for milestone ==============================*/


public function insert_mile($data)
{
  $this->db->insert('tbl_milestone',$data);
  return $this->db->insert_id();
}

public function insert_mile_histry($data){
  $this->db->insert('mile_status_history',$data);
  return $this->db->insert_id();
}

public function get_milebyid($id)
{
  $this->db->select('*');
  $this->db->where('project_id',$id);
  return $this->db->get('tbl_milestone')->result();
}


public function delete_member_mile($id)
{
  $this->db->where('mile_id',$id);
  $this->db->delete('tbl_milestone');
  return true;
}


public function editmember_mile($id)
{
 $this->db->select('*');
 $this->db->where('mile_id',$id);
 return $this->db->get('tbl_milestone')->result();
}


public function update_member_mile($id,$data)
{

 $this->db->where('mile_id', $id);
 $this->db->update('tbl_milestone', $data);
 return true;
}

  public function uploadNotes($data){
    $this->db->insert('project_notes',$data);
  return $this->db->insert_id();
  }

public function get_project_note($id){
  $this->db->select('*');
 $this->db->where('project_id',$id);
 return $this->db->get('project_notes')->result();
}

public function deleteprojectfile($id)
{
 
    $this->db->where('note_id',$id);
  $this->db->delete('project_notes');
  return true;
}


public function addclient($data)
{
   $this->db->insert('tbl_customer',$data);
  return $this->db->insert_id();
}

public function getclientbyname($client)
{
 if (is_numeric($client)) {
       $this->db->like('cus_mobile', $client);
    }else{ 
    $this->db->like('cus_name', $client);}
 
 return $this->db->get('tbl_customer')->result();
}



public function findclientdatabyid($id)
{
 
    $this->db->where('cus_id', $id);
 
 return $this->db->get('tbl_customer')->result();
}


public function get_alltax(){
  $this->db->select('*');
  return $this->db->get('tbl_tax')->result();
}

}
