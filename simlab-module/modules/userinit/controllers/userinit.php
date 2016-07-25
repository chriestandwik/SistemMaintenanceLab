<?php
class userinit extends CI_Controller{
   
    public function __construct() {
        parent::__construct();
    }
    
    public function index() {
       $d['title']="SIM-Lab User";
       $this->load->view('userinit_view',$d);
    }
}
?>