<?php
Class Home extends CI_Controller
{
    
    public function index()
    {
        if(!$this->session->userdata('userid'))
        {
           return redirect('LoginController') ;
        }
        $data['title'] = 'Home Page';
        
        $this->load->view("header");

        $this->load->view("Home");
    }
    
    public function contactUs()
    {
        if(!$this->session->userdata('userid'))
        {
           return redirect('LoginController') ;
        }
         $this->load->view("header");
        $this->load->view('contact');
    }
    
    public function aboutUs()
    {
        if(!$this->session->userdata('userid'))
        {
           return redirect('LoginController') ;
        }
         $this->load->view("header");
        $this->load->view('about');
    }
  
}
?>
