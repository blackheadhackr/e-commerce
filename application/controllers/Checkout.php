<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('Cart');
        $this->load->model('Checkout_model');
    }
    public function index(){
        $a['cart_data']= $this->Cart->get_cart();
        $v['dat']= $this->Cart->get_cart_data();
        $all = array_merge($a,$v);
        $this->load->view('checkout',$all);
    }
    public function order(){
        $idd = array();
        $fullname =  $this->input->post('full_Name');
        $house_no =  $this->input->post('house_no');
        $area =  $this->input->post('area');
        $Landmark =  $this->input->post('Landmark');
        $City =  $this->input->post('City');
        $State =  $this->input->post('State');
        $pincode =  $this->input->post('pincode');
        $cust_no =  $this->input->post('cust_no');
        $email =  $this->input->post('email');
        $price =  $this->input->post('price');
        $idd =  $this->input->post('id');
        $midd =  $this->input->post('mid');
        $id = json_encode($idd);
        $mid = json_encode($midd);
        // print_r($mid);exit;

        $this->form_validation->set_rules('full_Name','Your name', 'required');
        $this->form_validation->set_rules('house_no','House_no', 'required');
        $this->form_validation->set_rules('area','area', 'required');
        $this->form_validation->set_rules('Landmark','Landmark', 'required');
        $this->form_validation->set_rules('City','City', 'required');
        $this->form_validation->set_rules('State','State', 'required');
        $this->form_validation->set_rules('pincode','pincode', 'required');
        $this->form_validation->set_rules('cust_no','cust_no', 'required');
        $this->form_validation->set_rules('email','email', 'required');
        $this->form_validation->set_rules('price','price', 'required');

        if($this->form_validation->run() == false){
            $result = "error";
            $nameerror = form_error('full_Name');
            $houseerror = form_error('house_no');
            $areaerror = form_error('area');
            $Landmarkerror = form_error('Landmark');
            $Cityerror = form_error('City');
            $Stateerror = form_error('State');
            $pincodeerror = form_error('pincode');
            $phoneerror = form_error('cust_no');
            $email = form_error('email');
            $data = array("result"=>$result, "nameerror"=>$nameerror,"houseerror"=>$houseerror,"areaerror"=>$areaerror,"Cityerror"=>$Cityerror,"Stateerror"=>$Stateerror,"pincodeerror"=>$pincodeerror,"phoneerror"=>$phoneerror,"email"=>$email,"Landmark"=>$Landmarkerror);
        }
        else{
            $conf_data = array(
                "name"=>$fullname,
                "email"=>$email,
                "phone"=>$cust_no,
                "house_no"=>$house_no,
                "area"=>$area,
                "landmark"=>$Landmark,
                "pincode"=>$pincode,
                "city"=>$City,
                "state"=>$State,
                "user_id"=>$this->session->userdata('id'),
                "product_id"=>$id,
                "amount"=>$price,
                "cart_main_id"=>$mid
            );
            $a = $this->Checkout_model->order_confirm($conf_data);
            if($a){
                $result = "success";
                $msg = "your order is confirmd";
                $data = array("result"=>$result, "msg"=>$msg);
            }
        }
        echo json_encode($data);
    }
}
