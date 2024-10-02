<?php
class Qa_model extends CI_Model {

 
    public function getAll() {
        $this->db->where('status', 1); 
        return $this->db->get('tbl_questionanswer')->result();
    }

    public function getAllData($limit,$start,$question) {
        $this->db->select('*');
        $this->db->limit($limit, $start);
        if($question!=''){
            $this->db->where('question',$question);
        }
        $this->db->from('tbl_questionanswer');   
        $query=$this->db->get();
        return $query->result(); 
    }

    public function get_count($question='') 
    {
        if($question!=''){
            $this->db->where('question',$question);  
        }
        return $this->db->get('tbl_questionanswer')->num_rows();
    }

    public function delete($id) {
        $this->db->where('qa_id', $id);
        $this->db->delete('tbl_questionanswer');
        return true;
    }

    public function changeStatus($id) {
        $table=$this->getDataBydata_id($id);
        if($table[0]->status==0)
        {
            $this->update($id,array('status' => '1'));
            return "Activated";
        }else{
            $this->update($id,array('status' => '0'));
            return "Deactivated";
        }
    }

    public function update($id,$data) {
        $this->db->where('qa_id', $id);
        $this->db->update('tbl_questionanswer', $data);
        return true;
    }

    public function getDataBydata_id($id) {
        $this->db->where('qa_id', $id);
        return $this->db->get('tbl_questionanswer')->result();
    }

    public function insert($data) {
        $this->db->insert('tbl_questionanswer', $data);
        return $this->db->insert_id();
    }

      public function getDataByQa_id($id) {
        $this->db->where('qa_id', $id);
        return $this->db->get('tbl_questionanswer')->result();
    }

    public function updateQa($id,$data) {
        $this->db->where('qa_id', $id);
        $this->db->update('tbl_questionanswer', $data);
        return true;
    }
       /* public function all_text_category()
        {
             return $this->db->get('tbl_textcategory')->result();
        }
        public function get_count($category_name='') 
        {
            if($category_name!=''){
                $this->db->where('category_name',$category_name);
                
            }
            
            return $this->db->get('tbl_category')->num_rows();
        }

        public function get_textcount($category_name='')
        {
            if($category_name!=''){
                $this->db->where('cate_name',$category_name);
                
            }
            
            return $this->db->get('tbl_textcategory')->num_rows();
        }
        public function get_textstatuscount($category_name='')
        {
            if($category_name!=''){
                $this->db->where('cate_id',$category_name);
                
            }
            
            return $this->db->get('tbl_text_status')->num_rows();
        }
        public function getAllcategory($limit,$start,$category_name) {
         
           $this->db->select('*');
           $this->db->limit($limit, $start);
           if($category_name!=''){
            $this->db->where('category_name',$category_name);
            
        }
        $this->db->from('tbl_category');   
        $query=$this->db->get();
        return $query->result();
        
    }


    public function getAlltextcategory($limit,$start,$category_name)
    {
        $this->db->select('*');
           $this->db->limit($limit, $start);
           if($category_name!=''){
            $this->db->where('cate_name',$category_name);
            
        }
        $this->db->from('tbl_textcategory');   
        $query=$this->db->get();
        return $query->result();
    }


    public function getAlltextstatus($limit,$start,$category_id)
    {
        $this->db->select('*');
           $this->db->limit($limit, $start);
           if($category_id!=''){
            $this->db->where('cate_id',$category_id);
            
        }
        $this->db->from('tbl_text_status');   
        $query=$this->db->get();
        return $query->result();
    }

    public function insert($data) {
        $this->db->insert('tbl_category', $data);
        return $this->db->insert_id();
    }

    public function textcategoryinsert($data) {
        $this->db->insert('tbl_textcategory', $data);
        return $this->db->insert_id();
    }

    public function textstatusinsert($data) {
        $this->db->insert('tbl_text_status', $data);
        return $this->db->insert_id();
    }

    public function getDataBycategory_id($category_id) {
        $this->db->where('category_id', $category_id);
        return $this->db->get('tbl_category')->result();
    }

    public function getTextBycategory_id($category_id) {
        $this->db->where('cate_id', $category_id);
        return $this->db->get('tbl_textcategory')->result();
    }

    public function getTextBystatus_id($s_id) {
        $this->db->where('text_status_id', $s_id);
        return $this->db->get('tbl_text_status')->result();
    }
    public function update($category_id,$data) {
        $this->db->where('category_id', $category_id);
        $this->db->update('tbl_category', $data);
        return true;
    }

    public function Textupdate($category_id,$data) {
        $this->db->where('cate_id', $category_id);
        $this->db->update('tbl_textcategory', $data);
        return true;
    }

    public function Textstatusupdate($s_id,$data) {
        $this->db->where('text_status_id', $s_id);
        $this->db->update('tbl_text_status', $data);
        return true;
    }

    public function delete($category_id) {
        $this->db->where('category_id', $category_id);
        $this->db->delete('tbl_category');
        return true;
    }

    public function textdelete($category_id) {
        $this->db->where('cate_id', $category_id);
        $this->db->delete('tbl_textcategory');
        return true;
    }

    public function textstatusdelete($category_id) {
        $this->db->where('text_status_id', $category_id);
        $this->db->delete('tbl_text_status');
        return true;
    }

    public function changeStatus($category_id) {
        $table=$this->getDataBycategory_id($category_id);
        if($table[0]->status==0)
        {
            $this->update($category_id,array('status' => '1'));
            return "Activated";
        }else{
            $this->update($category_id,array('status' => '0'));
            return "Deactivated";
        }
    }

    public function TextchangeStatus($cate_id) {
        $table=$this->getTextBycategory_id($cate_id);
        if($table[0]->status_staus==0)
        {
            $this->Textupdate($cate_id,array('status_staus' => '1'));
            return "Activated";
        }else{
            $this->Textupdate($cate_id,array('status_staus' => '0'));
            return "Deactivated";
        }
    }
    public function TextstatuschangeStatus($cate_id) {
        $table=$this->getTextBystatus_id($cate_id);
        if($table[0]->status_status==0)
        {
            $this->Textstatusupdate($cate_id,array('status_status' => '1'));
            return "Activated";
        }else{
            $this->Textstatusupdate($cate_id,array('status_status' => '0'));
            return "Deactivated";
        }
    }



    public function parent_zero_category(){
        $zero="0";
        $this->db->select('*');
        $this->db->where('parent_id', $zero);
        $this->db->from('tbl_category');
        $query=$this->db->get();
        return $query->result();
    }


    public function getsingleparent($id)
    {
        $this->db->where('parent_id', $id);
        return $this->db->get('tbl_category')->result();
    }

    public function getparent($id)
    {
        $this->db->where('category_id', $id);
        return $this->db->get('tbl_category')->result();
    }
*/

}