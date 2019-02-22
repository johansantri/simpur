<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {
public function __construct()
        {
                parent::__construct();
                $this->load->model('anggota_m','anggota'); 
                $this->load->helper('security');
                $this->load->model('transaksi_m','transaksi');             
                 if(empty($this->session->userdata['email'])){
                redirect(site_url().'welcome/login');
            } 
        }

	public function index()
	{
		 
		$anggota = $this->anggota->_baca();

		$data = array ('title' 	=> 'anggota ',
						
						'anggota'	=> $anggota,
						'isi'	=> 'anggota/index'
					);
		$this->load->view('aturan/sambungan',$data);
	}

	public function add()
	{
		$anggota = $this->anggota->_baca();
		$valid=$this->form_validation;
		

		$valid->set_rules('npm_npp','npm_npp','required|is_unique[anggota.npm_npp]|max_length[10]|min_length[9]',
							array('required'				=>' harus di isi',
									'min_length'			=>' npm minimal 9 karakter',
									'max_length'			=>' npm maksimal 10 karakter',
									'is_unique'				=>'ooops npm,  <strong>'.$this->input->post('npm_npp').'</strong> sudah ada, buat npm npp baru'));
									
									if($valid->run()===FALSE) {//identik sama persis
		
		$data= array('title'	=>'add anggota',
					
					'anggota'	=>$anggota,
					'isi' 		=>'anggota/add'  );
		$this->load->view('aturan/sambungan',$data);

		}else {
		$masuk=$this->input;
		
		$data = array(
					'npm_npp'					=>$masuk->post('npm_npp',TRUE),
					'nama_depan'				=>$masuk->post('nama_depan',TRUE),
					'nama_belakang'				=>$masuk->post('nama_belakang',TRUE),	
					'fakultas'					=>$masuk->post('fakultas',TRUE),
					'jurusan'					=>$masuk->post('jurusan',TRUE),
					'no_hp'						=>$masuk->post('no_hp',TRUE),				
					'user_id'					=>$this->session->userdata('id'),		
					'status'					=>$masuk->post('status',TRUE)
					);
		$data=$this->security->xss_clean($data);
		$this->anggota->tambah($data);
		$this->session->set_flashdata ('sukses','data anggota berhasil ditambah');
		redirect (base_url('i/anggota'));
	}

		
}
		public function edit ($id=null) 
		{
		$key = $this->anggota->detail($id);
		//validasi
		$valid=$this->form_validation;
		$valid->set_rules('npm_npp','npm_npp ','required',
								
								array('required'		=>' harus diisi'));
										if($valid->run()===FALSE) {
								//end validasi anggota			
							
		$data = array ('title' => 'Edit Anggota  ',
						
						'key'	=> $key,
						'isi'  =>'anggota/edit');
		$this->load->view('aturan/sambungan',$data);
		//masuk database	
		}else {
		$masuk=$this->input;
		
		$data = array('id_anggota'				=>$id,
					'npm_npp'					=>$masuk->post('npm_npp',TRUE),
					'nama_depan'				=>$masuk->post('nama_depan',TRUE),
					'nama_belakang'				=>$masuk->post('nama_belakang',TRUE),	
					'fakultas'					=>$masuk->post('fakultas',TRUE),
					'jurusan'					=>$masuk->post('jurusan',TRUE),
					'no_hp'						=>$masuk->post('no_hp',TRUE),				
					'user_id'					=>$this->session->userdata('id'),		
					'status'					=>$masuk->post('status',TRUE)
					);
		$data=$this->security->xss_clean($data);
		$this->anggota->edit($data);
		$this->session->set_flashdata ('sukses','data anggota  berhasil diubah');
		redirect (base_url('i/anggota'));
	}
}
		public function detail ($id=null) 
		{
	
		
		$maksimal 	= $this->transaksi->maksimal_pinjam($id);
		$lis 		= $this->transaksi->lis($id);
		
		
	
		//validasi
		$valid 		= $this->form_validation;
		$valid->set_rules('id_buku','judul_buku ','required',
					array('required'		=>' buku belum dipilih,harus di isi'));
		$valid->set_rules('status_transaksi','status transaksi ','required',
					array('required'		=>' status belum dipilih,harus di isi'));
		if($valid->run()===FALSE) {
								//end validasi transaksi			
							
		$data = array ('title' 				=> '',
						'maksimal'			=> $maksimal,
						
						'lis'				=> $lis,
						'isi'  				=> 'anggota/detail');
		$this->load->view('aturan/sambungan',$data);
		//masuk database	
		}else {
		
		}
	}

}
