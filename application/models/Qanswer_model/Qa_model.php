<?php
class Qa_model extends CI_Model
{
    public function getAll()
    {
        $this->db->where("status", 1);
        return $this->db->get("tbl_questionanswer")->result();
    }

    public function getAllData($limit, $start, $question)
    {
        $this->db->select("*");
        $this->db->limit($limit, $start);
        if ($question != "") {
            $this->db->where("question", $question);
        }
        $this->db->from("tbl_questionanswer");
        $query = $this->db->get();
        return $query->result();
    }

    public function get_count($question = "")
    {
        if ($question != "") {
            $this->db->where("question", $question);
        }
        return $this->db->get("tbl_questionanswer")->num_rows();
    }

    public function delete($id)
    {
        $this->db->where("qa_id", $id);
        $this->db->delete("tbl_questionanswer");
        return true;
    }

    public function changeStatus($id)
    {
        $table = $this->getDataBydata_id($id);
        if ($table[0]->status == 0) {
            $this->update($id, ["status" => "1"]);
            return "Activated";
        } else {
            $this->update($id, ["status" => "0"]);
            return "Deactivated";
        }
    }

    public function update($id, $data)
    {
        $this->db->where("qa_id", $id);
        $this->db->update("tbl_questionanswer", $data);
        return true;
    }

    public function getDataBydata_id($id)
    {
        $this->db->where("qa_id", $id);
        return $this->db->get("tbl_questionanswer")->result();
    }

    public function insert($data)
    {
        $this->db->insert("tbl_questionanswer", $data);
        return $this->db->insert_id();
    }

    public function getDataByQa_id($id)
    {
        $this->db->where("qa_id", $id);
        return $this->db->get("tbl_questionanswer")->result();
    }

    public function updateQa($id, $data)
    {
        $this->db->where("qa_id", $id);
        $this->db->update("tbl_questionanswer", $data);
        return true;
    }


    
     public function insertQuiz($data)
    {
        $this->db->insert("tbl_quiz", $data);
        return $this->db->insert_id();
    }


    public function getAllDataQuiz($limit, $start, $question)
    {
        $this->db->select("*");
        $this->db->limit($limit, $start);
        if ($question != "") {
            $this->db->where("question", $question);
        }
        $this->db->from("tbl_quiz");
        $query = $this->db->get();
        return $query->result();
    }

    public function get_countQuiz($question = "")
    {
        if ($question != "") {
            $this->db->where("question", $question);
        }
        return $this->db->get("tbl_quiz")->num_rows();
    }
}
