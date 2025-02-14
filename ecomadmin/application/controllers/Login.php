<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function index(){
            if($this->session->userdata('name')==TRUE){ 
                redirect(base_url('homepage')); 
            }else{
                $this->load->view('login/login');
            }
    }
    public function check(){
        if($this->session->userdata('name')==TRUE && $this->session->userdata('user_type')=='admin'){
            redirect(base_url('homepage')); 
        }
        $name = $this->input->post('username');
        $pass = $this->input->post('password');
        $this->form_validation->set_rules('username', 'User name', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if($this->form_validation->run()==false){
				
            $this->load->view('login/login');

        }
        else{
           $this->load->model('log_in');
           $log = $this->log_in->check($name, $pass);
           if($log->num_rows() > 0){
                $kuchh = $log->row();
                $this->session->set_userdata("name",$kuchh->user_name);
                $this->session->set_userdata("email",$kuchh->email);
                $this->session->set_userdata("id",$kuchh->id);
                $this->session->set_userdata("usertype",$kuchh->user_type);
                redirect(base_url('homepage'));
                
           }else{ 
            $this->session->set_flashdata('dharmender', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Sorry!</strong> Your username and password not matched with our condition. <br> Please try again with valid username and password.........
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            $this->load->view('login/login');
           }

        }
    }

    public function logout(){
        $array_items = array('name', 'email', 'user_type',);
        $this->session->unset_userdata($array_items);
        $this->session->sess_destroy();
        redirect(base_url('login')); 


    }
    

}