<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('Shop_model');
    }


    public function index(){
        $ac['type_pro'] = $this->Shop_model->type_pro();
        $a['all_data'] = $this->Shop_model->get_product();
        $new_array = array_merge($a,$ac);
        $this->load->view('shop-grid',$new_array);
    }
}