<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_m extends CI_Model {

	   public function __construct()
        {
                $this->load->database();
        }

        public function _baca()
	   {
                $this->db->select('*');
                $this->db->from('buku');
                 $this->db->where ('buku.hapus <>',1);
                $this->db->order_by('buku.id_buku','DESC');
                $query=$this->db->get();
                return $query->result ();
	   }
       public function _kategori()
       {
        $query=$this->db->get('kategori');
            return $query->result ();
       }

       public function _rak($id_kategori)
       {
                $this->db->where('id_kategori', $id_kategori);
        $result = $this->db->get('rak_buku')->result(); // Tampilkan semua data kota berdasarkan id provinsi
        
        return $result;
            }

        public function detail($id_buku){
             $this->db->select('buku.id_buku,buku.judul_buku,buku.pengarang,buku.penerbit,buku.tahun,buku.id_kategori,buku.id_rak,buku.kondisi,buku.asal_buku,buku.id_rak,buku.jumlah,buku.kode_buku,kategori.nama_kategori,rak_buku.nama_rak');
           
        
             $this->db->join('kategori','kategori.id=buku.id_kategori','left');
             $this->db->join('rak_buku','rak_buku.id=buku.id_rak','left');
                $hasil = $this->db->where ('buku.id_buku',$id_buku)
                ->limit(1)
                ->get('buku');
                if ($hasil->num_rows()>0){
                        return $hasil->row();
                } else {
                        return array();
                }             

        }
        public function tambah($data){
                $this->db->insert('buku',$data);

        }

        public function edit($data){
                $this->db->where('id_buku',$data['id_buku']);
                $this->db->update('buku',$data);

        }

         public function hapus($data){
                $this->db->where('id_buku',$data['id_buku']);
                $this->db->update('buku',$data);

        }
}
