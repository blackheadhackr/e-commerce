<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Type extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('Type_model');
    }
    public function index(){
        $pro_type =  $this->uri->segment('3');
        $type = base64_decode($pro_type);
        $a['data'] = $this->Type_model->get_pro_type($type);
        
        $this->load->view('type',$a);
    }
}
