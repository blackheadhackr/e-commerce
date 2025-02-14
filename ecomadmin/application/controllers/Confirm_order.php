<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Confirm_order extends CI_Controller 
{    
    public function __construct(){
    parent::__construct();
    $this->load->model('Confirn_m');
    }
    public function index(){
    $per['son'] = $this->Confirn_m->get_person_det();
    $a['data'] = $this->Confirn_m->get_order();
    $new = array_merge($per,$a);
        $this->load->view('conf',$new);
    }
    public function checkorder(){
        $iid = $this->uri->segment(3);
        $id = base64_decode($iid);
        $a['daata'] = $this->Confirn_m->get_ord($id);
        $b['cart'] = $this->Confirn_m->get_cart_data($id);
        $new = array_merge($a,$b);
        $this->load->view('morder',$new);
    }
    public function accept_order(){
         $id = $this->input->post('id');
        $a = $this->Confirn_m->acppt_order($id);
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
    public function dilivered(){
        $per['son'] = $this->Confirn_m->get_person_deti();
        $a['data'] = $this->Confirn_m->get_orderi();
        $new = array_merge($per,$a);
        $this->load->view('diliver_product',$new);
    }
    public function checkorderl(){
        $iid = $this->uri->segment(3);
        $id = base64_decode($iid);
        $a['daata'] = $this->Confirn_m->get_orda($id);
        $b['cart'] = $this->Confirn_m->get_cart_dataa($id);
        $new = array_merge($a,$b);
        $this->load->view('morder',$new);
    }
}