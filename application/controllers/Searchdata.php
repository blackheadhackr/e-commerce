<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Searchdata extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->model('Searchdata_model');
    }
    public function index(){
        $data = $this->input->post('catname');
        $a['dataa']= $this->Searchdata_model->serchdata($data);
        $this->load->view('searchdata',$a);
    }
}	