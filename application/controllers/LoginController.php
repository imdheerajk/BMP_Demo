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
}