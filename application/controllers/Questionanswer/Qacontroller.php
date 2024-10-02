<?php
defined("BASEPATH") or exit("No direct script access allowed");

class Qacontroller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Category_model/Category_model");
        $this->load->model("Qanswer_model/Qa_model");
        $this->load->model("Brand_model/tbl_brand");
        $this->load->helper("url");
        $this->load->library("pagination");
        $this->load->model("Admin_model/Adminmodel");
        $this->load->model("Menu_model/Menu");
        $this->load->model("Admin_model/Role_model");
        $this->load->library("session");
        $this->load->helper(["url", "form"]);
        if (!$this->session->userdata("validated")) {
            redirect("login");
        }
    }

    public function ManageQuestionanswer()
    {
        $id = $this->session->userdata("session_id");
        $data["admin"] = $this->Adminmodel->getadmin($id);
        $data["menu_groups"] = $this->Menu->getAllMenuGroup();
        $data["menu_details"] = $this->Menu->getAllMenu();
        $data["admin_role"] = $this->Menu->adminrole();
        //============================ Start Pager Code ==============================
        $name = $this->input->post("question")
            ? $this->input->post("question")
            : 0;
        $name = $this->uri->segment(4) ? $this->uri->segment(4) : $name;
        $this->load->config("bootstrap_pagination");
        $config = $this->config->item("pagination_config");
        $config["base_url"] =
            base_url() .
            "Questionanswer/Qacontroller/ManageQuestionanswer" .
            "/$name";
        $config["total_rows"] = $this->Qa_model->get_count($name);
        $config["per_page"] = 40;
        $config["uri_segment"] = 5;
        $this->pagination->initialize($config);
        $page = $this->uri->segment(5) ? $this->uri->segment(5) : 0;
        $data["links"] = $this->pagination->create_links();
        //============================ End Pager Code ==============================
        $data["allData"] = $this->Qa_model->getAllData(
            $config["per_page"],
            $page,
            $name
        );
        $this->load->view("Dashboard/header.php", $data);
        $this->load->view("Dashboard/side.php");
        $this->load->view("Question_Answer/managequestionanswer", $data);
        $this->load->view("Dashboard/footer.php");
    }

    public function deleteQa($tbl_id)
    {
        $delete = $this->Qa_model->delete($tbl_id);
        $this->session->set_flashdata("success", "Record deleted");
        redirect("Questionanswer/Qacontroller/ManageQuestionanswer");
    }

    public function changeStatus($tbl_id)
    {
        $edit = $this->Qa_model->changeStatus($tbl_id);
        $this->session->set_flashdata(
            "success",
            "Record " . $edit . " Successfully"
        );
        redirect("Questionanswer/Qacontroller/ManageQuestionanswer");
    }

    public function addQa()
    {
        $id = $this->session->userdata("session_id");
        $data["admin"] = $this->Adminmodel->getadmin($id);
        $data["menu_groups"] = $this->Menu->getAllMenuGroup();
        $data["menu_details"] = $this->Menu->getAllMenu();
        $data["admin_role"] = $this->Menu->adminrole();
        $this->load->view("Dashboard/header.php", $data);
        $this->load->view("Dashboard/side.php");
        $this->load->view("Question_Answer/addquestionanswer", $data);
        $this->load->view("Dashboard/footer.php");
    }

    public function addQuestionPost()
    {
        $data["question"] = $this->input->post("question");
        $data["status"] = $this->input->post("status");
        $data["answer"] = $this->input->post("answer");
        $data["options"] = $this->input->post("options");
        $this->Qa_model->insert($data);
        $this->session->set_flashdata(
            "success",
            "Question added Successfully."
        );
        redirect("Questionanswer/Qacontroller/ManageQuestionanswer");
    }

    public function editQa($qa_id)
    {
        $id = $this->session->userdata("session_id");
        $data["admin"] = $this->Adminmodel->getadmin($id);
        $data["menu_groups"] = $this->Menu->getAllMenuGroup();
        $data["menu_details"] = $this->Menu->getAllMenu();
        $data["admin_role"] = $this->Menu->adminrole();
        $this->load->view("Dashboard/header.php", $data);
        $this->load->view("Dashboard/side.php");
        $data["qa_id"] = $qa_id;
        $data["qa_data"] = $this->Qa_model->getDataByQa_id($qa_id);
        $this->load->view("Question_Answer/editquestionanswer", $data);
        $this->load->view("Dashboard/footer.php");
    }

    public function updateQuestion()
    {
        $qa_id = $this->input->post("qa_id");
        $data["question"] = $this->input->post("question");
        $data["answer"] = $this->input->post("answer");
        $data["options"] = $this->input->post("options");
        $edit = $this->Qa_model->updateQa($qa_id, $data);
        if ($edit) {
            $this->session->set_flashdata(
                "success",
                "Question Updated Successfully."
            );
            redirect("Questionanswer/Qacontroller/ManageQuestionanswer");
        }
    }



    public function ManageQuiz()
    {
        $id = $this->session->userdata("session_id");
        $data["admin"] = $this->Adminmodel->getadmin($id);
        $data["menu_groups"] = $this->Menu->getAllMenuGroup();
        $data["menu_details"] = $this->Menu->getAllMenu();
        $data["admin_role"] = $this->Menu->adminrole();
        //============================ Start Pager Code ==============================
        $name = $this->input->post("name")
            ? $this->input->post("name")
            : 0;

        $result = $this->input->post("result")
            ? $this->input->post("result")
            : 0;
        $name = $this->uri->segment(4) ? $this->uri->segment(4) : $name;
        $result = $this->uri->segment(5) ? $this->uri->segment(5) : $result;
        $this->load->config("bootstrap_pagination");
        $config = $this->config->item("pagination_config");
        $config["base_url"] =
            base_url() .
            "Questionanswer/Qacontroller/ManageQuiz" .
            "/$name";
        $config["total_rows"] = $this->Qa_model->get_countQuiz($name,$result);
        $config["per_page"] = 40;
        $config["uri_segment"] = 5;
        $this->pagination->initialize($config);
        $page = $this->uri->segment(6) ? $this->uri->segment(6) : 0;
        $data["links"] = $this->pagination->create_links();
        //============================ End Pager Code ==============================
        $data["allData"] = $this->Qa_model->getAllDataQuiz(
            $config["per_page"],
            $page,
            $name,
            $result
        );
        $this->load->view("Dashboard/header.php", $data);
        $this->load->view("Dashboard/side.php");
        $this->load->view("Question_Answer/quizlist", $data);
        $this->load->view("Dashboard/footer.php");
    }


    public function changeStatusQuiz($tbl_id)
    {
        $edit = $this->Qa_model->changeStatusQuiz($tbl_id);
        $this->session->set_flashdata(
            "success",
            "Record " . $edit . " Successfully"
        );
        redirect("Questionanswer/Qacontroller/ManageQuiz");
    }
}
