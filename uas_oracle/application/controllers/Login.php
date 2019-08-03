<?php

class Login extends CI_Controller{
    
    function __construct(){
        parent::__construct();
    }
    
    function index(){
       if($this->session->userdata('username',true) && $this->session->userdata('level',true)){
                redirect('home','refresh');
            }else{
                    
	
            }
        
    }
}