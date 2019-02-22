<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_m extends CI_Model {

	   public function __construct()
        {
                $this->load->database();
        }

        public function _baca()
	   {
                $this->db->select('*,count(transaksi.id_anggota)as total');
                $this->db->from('transaksi');
                $this->db->join('buku','buku.id_buku=transaksi.id_buku','left');
                $this->db->join('anggota','anggota.id_anggota=transaksi.id_anggota','left');
                $this->db->order_by('total', 'desc');
                $this->db->group_by('transaksi.id_anggota');
                $this->db->where ('transaksi.status_transaksi <>','kembali');               
                $query=$this->db->get();
                return $query->result ();
	   }
        public function baca($id_transaksi)
       {
                $this->db->select('transaksi.id_transaksi,transaksi.id_buku,transaksi.id_anggota,transaksi.tgl_pinjam,transaksi.tgl_kembali,transaksi.status_transaksi,transaksi.terlambat,transaksi.denda,buku.judul_buku,buku.kondisi,buku.jumlah,buku.kode_buku,anggota.nama_depan,anggota.nama_belakang,anggota.npm_npp');
           
        
                $this->db->join('anggota','anggota.id_anggota=transaksi.id_transaksi','left');
                $this->db->join('buku','buku.id_buku=transaksi.id_buku','left');
                $hasil = $this->db->where ('transaksi.id_transaksi',$id_transaksi)
                ->limit(1)
                ->get('transaksi');
                if ($hasil->num_rows()>0){
                        return $hasil->row();
                } else {
                        return array();
                }       
       }

         public function maksimal_pinjam($id_anggota)
       {
                $this->db->select('transaksi.*,buku.judul_buku,buku.kode_buku,anggota.npm_npp,anggota.nama_depan,anggota.nama_belakang');
                $this->db->from('transaksi');
                $this->db->join('buku','buku.id_buku=transaksi.id_buku');
                $this->db->join('anggota','anggota.id_anggota=transaksi.id_anggota');
                $this->db->where ('transaksi.id_anggota',$id_anggota);
                $this->db->where ('transaksi.status_transaksi <>','kembali');
                $this->db->order_by('transaksi.id_transaksi','DESC');
                $query=$this->db->get();
                return $query->result ();
       }

        public function lis($id_anggota)
       {
                $this->db->select('transaksi.*,buku.judul_buku,buku.kode_buku,anggota.npm_npp,anggota.nama_depan,anggota.nama_belakang');
         
                $this->db->from('transaksi');
                $this->db->join('buku','buku.id_buku=transaksi.id_buku');
                $this->db->join('anggota','anggota.id_anggota=transaksi.id_anggota');
                $this->db->where ('transaksi.id_anggota',$id_anggota);
                $this->db->where ('transaksi.status_transaksi <>','kembali');
                $this->db->order_by('transaksi.id_transaksi','DESC');
                $this->db->order_by('transaksi.terlambat','DESC');
                $query=$this->db->get();
                return $query->result ();
       }

       public function _kategori()
       {
                $query=$this->db->get('kategori');
                return $query->result ();
       }
        public function _anggota()
       {
                $this->db->select('*');  
                $this->db->from('anggota');
                
                $this->db->where('anggota.status <>','tidak aktif');
                $query=$this->db->get();
                return $query->result ();
       }


        public function detail($id_transaksi){
                $this->db->select('*');           
                $hasil = $this->db->where ('transaksi.id_transaksi',$id_transaksi)
                ->limit(1)
                ->get('transaksi');
                if ($hasil->num_rows()>0){
                return $hasil->row();
                } else {
                return array();
                }             

        }
        public function tambah($data){
                $this->db->insert('transaksi',$data);

        }

        public function edit($data){
                $this->db->where('id_transaksi',$data['id_transaksi']);
                $this->db->update('transaksi',$data);

        }
}
