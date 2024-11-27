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
        $this->db->select("mobile, COUNT(result) as result_count"); // Select mobile and the count of result = 1
$this->db->where("result", "1"); // Only consider rows where result = 1
$this->db->where("status", "1"); // Only consider active users (status = 1)
$this->db->from("tbl_quiz");

// Group by mobile number to count result = 1 for each mobile
$this->db->group_by("mobile");

// Order by the count of result = 1 in descending order (max count first)
$this->db->order_by("result_count", "DESC"); 

// Fetch the results
$query = $this->db->get();

// Return the results
return $query->result();


       /* $this->db->select("*");
        $this->db->where("result", "1");
        $this->db->where("status", "1");
        $this->db->from("tbl_quiz");
        $this->db->group_by("mobile"); // Group by 'mobile' to make mobile numbers unique
        $this->db->order_by("mobile", "DESC"); // Order by 'mobile' in descending order
        $query = $this->db->get();
        return $query->result();*/
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
