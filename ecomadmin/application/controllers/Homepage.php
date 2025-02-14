<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Homepage extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->model('Order_model');
		$this->load->model('Confirn_m');
    }
	
	public function index(){
		if($this->session->userdata('usertype') == 'admin'){
			$a['order'] = $this->Order_model->get_order();
			$this->load->model('File_upload');
			$av['data'] = $this->File_upload->getdata();
    		$an['danta'] = $this->Confirn_m->get_order();
        	$acxx['dazxta'] = $this->Confirn_m->get_orderi();
			$new = array_merge($a,$av,$an,$acxx);
			$this->load->view('homepage',$new);
		}else{
			$this->session->set_flashdata('dharmender', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			<strong>&#129302 our bot scan unauthorized Device :</strong> your location and IP is captured while log-in and transferred to the company owner. please move back to the safety zone. otherwise company is going to take strict action against you.
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>');
			$this->load->view('login/login');
			
		}
	}
    public function add_product(){
		$this->load->model('Add_catg');
		$ab['data'] = $this->Add_catg->all_data();
		$this->load->view('add_product',$ab);
	}
    public function add_category(){
		
		$this->load->view('add_cat');
	}
    public function catg_add(){
		$catg = $this->input->post('catg');
		$this->form_validation->set_rules('catg', 'catogery name', 'trim|required|is_unique[catg.catg_name]');

		if($this->form_validation->run()== false){
			$this->load->view('add_cat');
		}else{
			$data = array(
				'catg_name' => $catg
			);
			$this->load->model('Add_catg');
			$a = $this->Add_catg->addcat($data);
			if($a){
				$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade show" role="alert">
					<strong>Success !</strong> Data Upload.
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				  </div>');
				  $this->load->view('add_cat');
			}
		}
	}
    public function product_insert(){
		
		$this->form_validation->set_rules('ProductTitle', 'ProductTitle', 'required');
		$this->form_validation->set_rules('Mainprice', 'Mainprice', 'required|trim|numeric');
		$this->form_validation->set_rules('Discount', 'Discount', 'required|trim|numeric');
		$this->form_validation->set_rules('Warranty', 'Warranty', 'required');
		$this->form_validation->set_rules('Stockqty', 'Stockqty', 'required|trim|numeric');
		$this->form_validation->set_rules('Color', 'Color', 'required');
		$this->form_validation->set_rules('Bra_name', 'Bra_name', 'required');
		$this->form_validation->set_rules('Mod_name', 'Mod name', 'required');
		$this->form_validation->set_rules('Warrantysum', 'Warrantysum', 'required');
		$this->form_validation->set_rules('Warrantycov', 'Warrantycov', 'required');
		$this->form_validation->set_rules('Warrantyna', 'Warrantyna', 'required');
		$this->form_validation->set_rules('discription', 'discription', 'required');
		$this->form_validation->set_rules('type', 'type', 'required');

		if($this->form_validation->run()== false){
			$this->load->model('Add_catg');
			$ab['data'] = $this->Add_catg->all_data();
			$this->load->view('add_product',$ab);
		}else{
			$data =array( 
			'title' => $this->input->post('ProductTitle'),
			'main_price' => $this->input->post('Mainprice'),
			'discount' => $this->input->post('Discount'),
			'warranty' => $this->input->post('Warranty'),
			'stockqunt' => $this->input->post('Stockqty'),
			'color' => $this->input->post('Color'),
			'brand_name' => $this->input->post('Bra_name'),
			'model_name' => $this->input->post('Mod_name'),
			'warrentysum' => $this->input->post('Warrantysum'),
			'warrentycover' => $this->input->post('Warrantycov'),
			'warrentna' => $this->input->post('Warrantyna'),
			'type' => $this->input->post('type'),
			'discription' => $this->input->post('discription')
			);
			$this->load->model('Homepagemodel');
			$ab = $this->Homepagemodel->product_insert($data);
			$id = base64_encode($ab);
			// print_r($ab);exit;
				if($ab){
					redirect(base_url()."up_img/index/".$id);
				}else{
					$this->session->set_flashdata('msg', '<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<strong>Error!</strong> kya re khud ko dada smjhta hai ky dubara kr jake hutt.....
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				  </div>');
				 $this->load->view('add_product');
				}
		}
	}

		
}
