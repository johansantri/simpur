<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {
public function __construct()
        {
                parent::__construct();
                $this->load->model('buku_m','buku'); 
                	$this->load->helper('security');            
                 if(empty($this->session->userdata['email'])){
                redirect(site_url().'welcome/login');
            } 
        }

	public function index()
	{
		 
		$buku = $this->buku->_baca();

		$data = array ('title' 	=> 'Data buku ',
						
						'buku'	=> $buku,
						'isi'	=> 'buku/index'
					);
		$this->load->view('aturan/sambungan',$data);
	}

	public function add()
	{
		
		$kategori=$this->buku->_kategori();
		$valid=$this->form_validation;
		
		

		$valid->set_rules('kode_buku','kode_buku','required|is_unique[buku.kode_buku]|max_length[24]|min_length[3]',
							array('required'				=>' harus di isi',
									'min_length'			=>' kode buku minimal 3 karakter',
									'max_length'			=>' kode buku maksimal 24 karakter',
									'is_unique'				=>'ows,  <strong>'.$this->input->post('kode_buku').'</strong> sudah ada, buat kode buku baru'));
									
									if($valid->run()===FALSE) {//identik sama persis
		
		$data= array('title'	=>	'tambah Buku',
					
					'kategori'	=>	$kategori,
					'isi' 		=>	'buku/add'  );
		$this->load->view('aturan/sambungan',$data);

		}else {
		$masuk=$this->input;
		
		$data = array(
					'kode_buku'						=>$masuk->post('kode_buku',TRUE),
					'judul_buku'					=>$masuk->post('judul_buku',TRUE),
					'pengarang'						=>$masuk->post('pengarang',TRUE),	
					'penerbit'						=>$masuk->post('penerbit',TRUE),
					'tahun'							=>$masuk->post('tahun',TRUE),
					'asal_buku'						=>$masuk->post('asal_buku',TRUE),
					'id_kategori'					=>$masuk->post('id_kategori',TRUE),
					
					'id_rak'						=>$masuk->post('id_rak',TRUE),
					'kondisi'						=>$masuk->post('kondisi',TRUE),
					'jumlah'						=>$masuk->post('jumlah',TRUE),				
					'user_id'						=>$this->session->userdata('id',TRUE));
		$data=$this->security->xss_clean($data);
		$this->buku->tambah($data);
		$this->session->set_flashdata ('sukses','data buku berhasil ditambah');
		redirect (base_url('i/buku'));
	}

		
}
		public function rak(){
			// Ambil data ID Provinsi yang dikirim via ajax post
		$id_kategori = $this->input->post('id_kategori',true);
		$data=$this->security->xss_clean($id_kategori);
		$rak = $this->buku->_rak($id_kategori);
		
		// Buat variabel untuk menampung tag-tag option nya
		// Set defaultnya dengan tag option Pilih
		$lists = "<option value=''>Pilih</option>";
		
		foreach($rak as $data){
			$lists .= "<option value='".$data->id."'>".$data->nama_rak."</option>"; // Tambahkan tag option ke variabel $lists
		}
		
		$callback = array('list_rak'=>$lists); // Masukan variabel lists tadi ke dalam array $callback dengan index array : list_kota

		echo json_encode($callback); // konversi varibael $callback menjadi JSON
		}
		


		public function edit ($id=null) 
		{
			
		$key = $this->buku->detail($id);
		//validasi
		$kategori=$this->buku->_kategori();
		$valid=$this->form_validation;
		$valid->set_rules('kode_buku','kode_buku ','required',
								
								array('required'		=>' harus diisi'));
										if($valid->run()===FALSE) {
								//end validasi buku			
							
		$data = array ('title' 		=> 'Edit Buku  ',
						
						'key'		=> $key,
						'kategori'	=> $kategori,
						'isi'  		=>'buku/edit');
		$this->load->view('aturan/sambungan',$data);
		//masuk database	
		}else {
		$masuk=$this->input;
		
		$data = array('id_buku'							=>$id,
					'kode_buku'						=>$masuk->post('kode_buku',TRUE),
					'judul_buku'					=>$masuk->post('judul_buku',TRUE),
					'pengarang'						=>$masuk->post('pengarang',TRUE),	
					'penerbit'						=>$masuk->post('penerbit',TRUE),
					'tahun'							=>$masuk->post('tahun',TRUE),
					'asal_buku'						=>$masuk->post('asal_buku',TRUE),
					'id_kategori'					=>$masuk->post('id_kategori',TRUE),
					
					'id_rak'						=>$masuk->post('id_rak',TRUE),
					'kondisi'						=>$masuk->post('kondisi',TRUE),
					'jumlah'						=>$masuk->post('jumlah',TRUE),				
					'user_id'						=>$this->session->userdata('id'));
		$data=$this->security->xss_clean($data);
		$this->buku->edit($data);
		$this->session->set_flashdata ('sukses','data buku  berhasil diubah');
		redirect (base_url('i/buku'));
	}
}



	public function hapus($id)
		{
		$key = $this->buku->detail($id);
		$masuk=$this->input;		
		$data = array('id_buku'							=>$id,
						'hapus'							=>1,									
						'user_id'						=>$this->session->userdata('id'));
		$this->buku->hapus($data);
		$this->session->set_flashdata ('sukses','data buku berhasil dihapus');
		redirect (base_url('i/buku'));
		}


public function tes($id_kategori){
	$as=$this->buku->_rak($id_kategori);	
	print_r(json_encode($as));
}


}

