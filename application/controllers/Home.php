<?php
Class Home extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Home Page';
        
        $this->load->view("header");

        $this->load->view("Home");
    }
  
}
?>
