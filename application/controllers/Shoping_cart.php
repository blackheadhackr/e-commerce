<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shoping_cart extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('Cart');
    }
    public function index(){
        $a['cart_data']= $this->Cart->get_cart();
        $v['dat']= $this->Cart->get_cart_data();
        $all = array_merge($a,$v);
        $this->load->view('shoping-cart',$all);
    }
    public function up_qty(){
        $id =  $this->input->post('id');
        $qty =  $this->input->post('qty');

        $arr = array(
            'prod_id'=> $id,
            'pro_qty'=>$qty
        );
        $a = $this->Cart->upqty($arr,$id);
        
    }
    public function del_item(){
        $id =  $this->input->post('id');
        $user_id = $this->session->userdata('id');
        $a =  $this->Cart->del($id,$user_id);
        if($a){
            $result = "success";
            $msg = " your data has been delete successfully";
            $data = array("result"=>$result , "msg"=>$msg);
        }else{
            $result = "error";
            $msg = "something went wrong please connect to customer care Thankyou!";
            $data = array("result"=>$result , "msg"=>$msg);
        }
        echo json_encode($data);
    }
}