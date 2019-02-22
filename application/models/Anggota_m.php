<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota_m extends CI_Model {

	   public function __construct()
        {
                $this->load->database();
        }
	public function _baca()
	{
		$this->db->select('*');
        	$this->db->from('anggota');
            $this->db->where ('anggota.status <>','tidak aktif');
        	$this->db->order_by('id_anggota','DESC');
        	$query=$this->db->get();
        	return $query->result ();
	}
         public function detail($id_anggota){
                $hasil = $this->db->where ('id_anggota',$id_anggota)
                ->limit(1)
                ->get('anggota');
                if ($hasil->num_rows()>0){
                        return $hasil->row();
                } else {
                        return array();
                }              

        }
        public function tambah($data){
                $this->db->insert('anggota',$data);

        }

         public function edit($data){
                $this->db->where('id_anggota',$data['id_anggota']);
                $this->db->update('anggota',$data);

        }
}
