<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller 
{   
    public function __construct(){
        parent::__construct();
        $this->load->model('Order_model');
    }
    
    public function index(){
    $per['son'] = $this->Order_model->get_person_det();
    $a['data'] = $this->Order_model->get_order();
    $new = array_merge($per,$a);
        $this->load->view('order',$new);
    }
    public function checkorder(){
        $iid = $this->uri->segment(3);
        $id = base64_decode($iid);
        $a['daata'] = $this->Order_model->get_ord($id);
        $b['cart'] = $this->Order_model->get_cart_data($id);
        $new = array_merge($a,$b);
        $this->load->view('morder',$new);
    }

    public function accept_order(){
        $id = $this->input->post('id');
        $a = $this->Order_model->acppt_order($id);
        if($a){
            $result = "success";
            $msg = "you accept this order";
            $data = array("result"=>$result, "msg"=>$msg);
        }else{
            $result = "error";
            $msg = "sorry we are working on this";
            $data = array("result"=>$result, "msg"=>$msg);
        }
        echo json_encode($data);
    }
    public function acpt_order(){
        $id = $this->input->post('id');
        $a = $this->Order_model->acptorder($id);
        if($a){
            $result = "success";
            $msg = "product is accepted";
            $data = array("result"=>$result, "msg"=>$msg);
        }else{
            $result = "error";
            $msg = "product is already accepted please check confirmed order page for dilivery";
            $data = array("result"=>$result, "msg"=>$msg);
        }
        echo json_encode($data);
    }
}