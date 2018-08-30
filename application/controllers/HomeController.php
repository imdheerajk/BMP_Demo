<?php
Class HomeController extends CI_Controller
{
    public function index()
    {
//        $this->load->model("HomeModel");
//        $DATA['records'] = $this->HomeModel->getData();
        $this->load->view("Home");
    }
  
}
?>
