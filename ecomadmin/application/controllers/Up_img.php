<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Up_img extends CI_Controller {
    public function index(){
        $this->load->view('add_pro_img');
    }
    public function upload_files()
    {
            $countFile = count(array_filter($_FILES['images']['name']));
            for($i=0; $i<$countFile; $i++){
                $_FILES['file']['name']     =  $_FILES['images']['name'][$i];
                $_FILES['file']['type']     =  $_FILES['images']['type'][$i];
                $_FILES['file']['size']     =  $_FILES['images']['size'][$i];
                $_FILES['file']['tmp_name'] =  $_FILES['images']['tmp_name'][$i];
                $_FILES['file']['error']    =  $_FILES['images']['error'][$i]; 
        
                    $config['upload_path']          = './uploads/';
                    $config['allowed_types']        = 'gif|jpg|png';
                    $config['max_size']             = 10000;
                    $config['max_width']            = 5000;
                    $config['max_height']           = 5000;

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);
                    
                    if ( ! $this->upload->do_upload('file'))
                    {
                        $error = array('error' => $this->upload->display_errors());
                      
                    }
                    else
                    {   
                        $updata = array(
                            'img_name'=> $this->upload->data('file_name'),
                            'product_id'=>$this->input->post('pro_id'),
                        );
                         $this->load->model('File_upload');
                         $a = $this->File_upload->file_upload($updata);
                         
                     }
            }
            

            if($a){
                $this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>success!</strong> data uploaded successfully ........
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>');
            redirect('homepage/add_product');
             
        }

            
            
    }   
}