<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Searchdata_model extends CI_Model 
{
    public function serchdata($data){
        $all_data = array();
        $this->db->select('*');
        $this->db->where("title LIKE '%$data%' OR type LIKE '%$data%'");
        $a = $this->db->get('product_table')->result();

        foreach($a as $data){
            $id = $data->id;
            $this->db->select('product_table.*,  product_image.img_name');
            $this->db->from('product_table');
            $this->db->where('id',$id);
            $this->db->JOIN('product_image','product_table.id = product_image.product_id', 'RIGHT');
            $this->db->group_by('product_table.id , product_image.product_id');
            $all_data[] = $this->db->get()->result();
        }
        return $all_data;
    }
}