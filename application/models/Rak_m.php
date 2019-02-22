<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rak_m extends CI_Model {

	   public function __construct()
        {
                $this->load->database();
        }
	public function _baca()
	{
		$this->db->select('*');
        	$this->db->from('rak_buku');
        	$this->db->order_by('id','DESC');
        	$query=$this->db->get();
        	return $query->result ();
	}
         public function detail($id){
                $this->db->select('rak_buku.id,rak_buku.nama_rak,rak_buku.catatan,rak_buku.id_kategori,kategori.nama_kategori');
                $this->db->from('rak_buku');
                $this->db->join('kategori','kategori.id=rak_buku.id_kategori','left');
                $hasil = $this->db->where ('rak_buku.id',$id)
                                                ->limit(1)
                                                ->get();
                                                if ($hasil->num_rows()>0){
                                                        return $hasil->row();
                                                } else {
                                                        return array();
                                                }



              

        }
        public function tambah($data){
                $this->db->insert('rak_buku',$data);

        }

         public function edit($data){
                $this->db->where('id',$data['id']);
                $this->db->update('rak_buku',$data);

        }
         public function delete($data){
            $this->db->where('id',$data['id']);
            $this->db->delete('rak_buku',$data);
            
        }
}
