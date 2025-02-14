<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('Login_model');
    }
    public function index(){
        if($this->session->userdata("id")==false){
            $this->load->view('login');
        }else{
            redirect(base_url('Loadhome'));
        }
    }
    public function check(){
        $uname = $this->input->post('username');
        $pass = $this->input->post('password');
        $this->form_validation->set_rules('username','username','required');
        $this->form_validation->set_rules('password','password','required');
        if($this->form_validation->run()==false){
            $this->load->view('login');
        }else{
            $a = $this->Login_model->loggin($pass,$uname);
            if($a){
                
               $this->session->set_userdata("id",$a->id);
               $this->session->set_userdata("uname",$a->name);
               $this->session->set_userdata("email",$a->email);
               $this->session->set_userdata("user_type",$a->usertype);
               
               redirect(base_url('Loadhome'));

            }else{
                $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> seems like you have enter wrong username or password please check and fill again <b>Thankyou!</b>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
                $this->load->view('login');
            }
        }
    }
    // sinup  code here ..................................................
    public function sinup(){
    
        $this->load->view('sin-up');
    }
    public function user(){
        $name = $this->input->post('Name');
        $email = $this->input->post('email');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $this->form_validation->set_rules('Name','name','required');
        $this->form_validation->set_rules('email','email','required|is_unique[user_reg.email]');
        $this->form_validation->set_rules('username','username','required|is_unique[user_reg.username]');
        $this->form_validation->set_rules('password','password','required');
        $this->form_validation->set_message('is_unique', '%s is already taken please choose another');
        if($this->form_validation->run()==false){
            $this->load->view('sin-up');
        }else{
            $data = array(
                'name' => $name,
                'email' => $email,
                'username'=>$username,
                'password'=>$password
            );
            $a = $this->Login_model->user_reg($data);
            if($a){
                $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>SUCCESS!</strong> Registration is compleated please login and enjoy thankyou!.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
                redirect(base_url('login'));
            }else{
                $this->session->set_flashdata('msg', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> please give us some time we are working on this. <b>Thankyou!</b>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>');
                $this->load->view('sin-up');
            }
        }
    }
    
    public function myorder(){
        $a['cart_data']= $this->Login_model->order();
        $v['dat']= $this->Login_model->get_cart_data();
        $all = array_merge($a,$v);
        $this->load->view('my_order',$all);
    }
    public function logout(){
        $array_items = array('name', 'email', 'user_type',);
        $this->session->unset_userdata($array_items);
        $this->session->sess_destroy();
        redirect(base_url('login')); 
    }

}