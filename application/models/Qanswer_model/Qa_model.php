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


    public function getAllDataQuiz($limit, $start, $name,$result)
    {
        $this->db->select("*");
        $this->db->limit($limit, $start);
        if ($name != "") {
            $this->db->where("name", $name);
        }
        if ($result != "") {
            $this->db->where("result", $result);
        }
        $this->db->from("tbl_quiz");
        $query = $this->db->get();
        return $query->result();
    }

    public function get_countQuiz($question = "",$result="")
    {
        if ($question != "") {
            $this->db->where("question", $question);
        }
        if ($result != "") {
            $this->db->where("result", $result);
        }
        return $this->db->get("tbl_quiz")->num_rows();
    }


    public function getAllQuiz()
    {
        /*$this->db->select("*");
        $this->db->where("result", "1");
        $this->db->where("status", "1");
        $this->db->from("tbl_quiz");
        $this->db->group_by("mobile"); // Group by 'mobile' to make mobile numbers unique
        $this->db->order_by("mobile", "DESC"); // Order by 'mobile' in descending order
        $query = $this->db->get();
        return $query->result();*/
        $this->db->select("mobile, 
    COUNT(CASE WHEN result = 1 THEN 1 END) AS success_count, 
    COUNT(*) AS total_count"); // Count successes and total for each mobile
    $this->db->where("status", "1"); // Only active records
    $this->db->from("tbl_quiz");
    $this->db->group_by("mobile"); // Group by mobile number

    // Order by success_count in descending order (successes first), then by mobile number
    $this->db->order_by("success_count", "DESC");
    $this->db->order_by("mobile", "DESC");

    $query = $this->db->get();
    return $query->result();

    }

    public function changeStatusQuiz($id)
    {
        $table = $this->getDataBydata_Quizid($id);
        if ($table[0]->status == 0) {
            $this->updateQuiz($id, ["status" => "1"]);
            return "Activated";
        } else {
            $this->updateQuiz($id, ["status" => "0"]);
            return "Deactivated";
        }
    }

    public function getDataBydata_Quizid($id)
    {
        $this->db->where("id", $id);
        return $this->db->get("tbl_quiz")->result();
    }

    public function updateQuiz($id, $data)
    {
        $this->db->where("id", $id);
        $this->db->update("tbl_quiz", $data);
        return true;
    }

    
}
