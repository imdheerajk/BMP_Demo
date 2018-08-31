<?php

Class LoginController extends CI_Controller
{
    public function index()
    {
        $this->load->view("Login");
    }
    public function checkLogin()
    {
        $this->form_validation->set_rules('username', 'username', 'required|trim|xss_clean');
        $this->form_validation->set_rules('password', 'password', 'required|trim|xss_clean|callback_verifyUser');
        
        if($this->form_validation->run() == FALSE)
        {
            $this->load->view("Login");
        }
        else
        {
            $this->set_session($this->input->post("username"));
            redirect("HomeController/index");
        }
    }
    public function verifyUser()
    {
        $USERNAME = $this->input->post("username");
        $PASSWORD = $this->input->post("password");
        $this->load->model("LoginModel");
        
        if($this->LoginModel->login($USERNAME, $PASSWORD))
        {
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('verifyUser', 'Incorrect username or password');
            return FALSE;
        }
    }
    public function set_session($USERNAME)
    {
        $SQL = "SELECT * from user where username='".$USERNAME."'";
        $RESULT = $this->db->query($SQL);
        $ROW = $RESULT->row();
        
        $SESS_DATA = array(
            'userid'=>$ROW->id,
            'username'=>$ROW->username,
            'firstname'=>$ROW->first_name,
            'lastname'=>$ROW->last_name,
            'user_type'=>$ROW->user_type
        );
        $this->session->set_userData($SESS_DATA);
    }
}