<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Details extends CI_Controller {
    public function __construct($id = null){
        parent::__construct();
        $this->load->model('Details_model');
    }
    public function index(){
        $pro_idd =  $this->uri->segment('3');
        $pro_id = base64_decode($pro_idd);
        $acv['data'] = $this->Details_model->get_img($pro_id );
        $acb['pro_data'] = $this->Details_model->get_data($pro_id);
        $releted['releted_pro'] = $this->Details_model->get_releted_pro($pro_id);
        $new_array = array_merge($acv,$acb,$releted);
        // echo "<pre>";
        // print_r($releted);
        // exit;
        $this->load->view('shop-details',$new_array);
    }
}
