<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wish_list extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Wish_list_model');
    }
    public function index(){
        $a['dataa'] = $this->Wish_list_model->get_wish();
        $this->load->view('wishlist',$a);
    }

    public function add_wish(){
        if($this->session->userdata('id') == NULL){
            $result = "error";
            $msg = "I am unable to recognize you, please login first.";

            $data = array('result'=>$result, 'msg'=>$msg);
        }
        else{
            $pro_id = $this->input->post('id');

        $data = array(
            'pro_id' => $pro_id,
            'user_id' => $this->session->userdata('id')
            );
        $a = $this->Wish_list_model->addwish($data,$pro_id);


        if($a){
            $result = "success";
            $msg = "Product is added in your favourite list.";
            
            $data = array('result'=>$result, 'msg'=>$msg);
        }else{
            $result = "error";
            $msg = "product is already exist in your favourite";

            $data = array('result'=>$result, 'msg'=>$msg);
        }
        }
        // $pro_id = $this->input->post('id');

            // $data = array(
            //     'pro_id' => $pro_id,
            //     'user_id' => $this->session->userdata('id')
            //     );
            // $a = $this->Wish_list_model->addwish($data,$pro_id);


            // if($a){
            //     $result = "success";
            //     $msg = "Product is added in your favourite list.";
                
            //     $data = array('result'=>$result, 'msg'=>$msg);
            // }else{
            //     $result = "error";
            //     $msg = "product is already exist in your favourite";

            //     $data = array('result'=>$result, 'msg'=>$msg);
        // }
        echo json_encode($data);
       
    }
    public function del_wish(){
        $pro_id = $this->input->post('id');

        $data = array(
            'pro_id' => $pro_id,
            'user_id' => $this->session->userdata('id')
            );
        $a = $this->Wish_list_model->del_wish($data,$pro_id);

        if($a){
            $result = "success";
            $msg = "Product removed from your favourite list";
            
            $data = array('result'=>$result, 'msg'=>$msg);
        }else{
            $result = "error";
            $msg = "we are working on this please wait for some time Thankyou!";

            $data = array('result'=>$result, 'msg'=>$msg);
        }
        echo json_encode($data);

    }
}