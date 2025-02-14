<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loadhome extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('Homepage_model');
    }
    public function index(){
        
            $abc['btw_data'] = $this->Homepage_model->btwdate();
        
            $ab['data'] = $this->Homepage_model->get_product();
            $ac['type_pro'] = $this->Homepage_model->type_pro();
            $new_array = array_merge($ab,$ac,$abc);
            $this->load->view('homepage',$new_array);
        
       
    }
    public function add_to_cart(){
        
        if($this->session->userdata('id') == NULL){
            $result = "error";
            $msg = "you  are not log-in please login first Thankyou!";
            $data = array('result' => $result, "msg"=>$msg);
        }else{
            $qty = $this->input->post('qty');
            $id = $this->input->post('id');
            $u_id = $this->session->userdata('id');
            $cart_data = array(
                'prod_id'=>$id,
                'user_id'=>$u_id
                
            );
            $a = $this->Homepage_model->add_cart($cart_data,$u_id,$id);
            if($a){
                $result = "success";
                $msg = "Product is added successfully";
                $data = array('result' => $result, "msg"=>$msg);
            }
            else{
                $result = "error";
                $msg = "Product is already exist in your cart Thankyou!";
                $data = array('result' => $result, "msg"=>$msg);
            }
        }
        echo json_encode($data);
    }
    public function add_to_cart_shop(){
        
        if($this->session->userdata('id') == NULL){
            $result = "error";
            $msg = "you  are not log-in please login first Thankyou!";
            $data = array('result' => $result, "msg"=>$msg);
        }else{
            $qty = $this->input->post('qty');
            $id = $this->input->post('id');
            $u_id = $this->session->userdata('id');
            $cart_data = array(
                'prod_id'=>$id,
                'user_id'=>$u_id,
                'pro_qty'=>$qty
            );
            $a = $this->Homepage_model->add_cart($cart_data,$u_id,$id);
            if($a){
                $result = "success";
                $msg = "Product is added successfully";
                $data = array('result' => $result, "msg"=>$msg);
            }
            else{
                $result = "error";
                $msg = "Product is already exist in your cart Thankyou!";
                $data = array('result' => $result, "msg"=>$msg);
            }
        }
        echo json_encode($data);
    }
    
}