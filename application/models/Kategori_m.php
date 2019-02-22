<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_m extends CI_Model {

	   public function __construct()
        {
                $this->load->database();
        }
	public function _baca()
	{
		$this->db->select('*');
        	$this->db->from('kategori');
        	$this->db->order_by('id','DESC');
        	$query=$this->db->get();
        	return $query->result ();
	}
         public function detail($id){
                $hasil = $this->db->where ('id',$id)
                                                ->limit(1)
                                                ->get('kategori');
                                                if ($hasil->num_rows()>0){
                                                        return $hasil->row();
                                                } else {
                                                        return array();
                                                }



              

        }
        public function tambah($data){
                $this->db->insert('kategori',$data);

        }

         public function edit($data){
                $this->db->where('id',$data['id']);
                $this->db->update('kategori',$data);

        }
}
