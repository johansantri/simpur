<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rak extends CI_Controller {
public function __construct()
        {
                parent::__construct();
                $this->load->model('rak_m','rak'); 
                $this->load->model('kategori_m','kategori'); 
                	$this->load->helper('security');            
                 if(empty($this->session->userdata['email'])){
                redirect(site_url().'welcome/login');
            } 
        }

	public function index()
	{
		 
		$rak = $this->rak->_baca();

		$data = array ('title' 	=> 'Data rak buku',
						'rak'	=> $rak,
						'isi'	=> 'rak/index'
					);
		$this->load->view('aturan/sambungan',$data);
	}

	public function add()
	{
		$rak = $this->rak->_baca();
		$kategori = $this->kategori->_baca();
		$valid=$this->form_validation;
		

		$valid->set_rules('nama_rak','nama_rak','required|is_unique[rak_buku.nama_rak]|max_length[50]|min_length[3]',
							array('required'				=>' harus di isi',
									'min_length'			=>' nama rak minimal 3 karakter',
									'max_length'			=>' nama rak maksimal 50 karakter',
									'is_unique'				=>'ooops nama rak,  <strong>'.$this->input->post('nama_rak').'</strong> sudah ada, buat nama baru'));
									
									if($valid->run()===FALSE) {//identik sama persis
		
		$data= array('title'	=>'tambah rak buku',
					'rak'		=>$rak,
					'kategori'	=> $kategori,
					'isi' 		=>'rak/add'  );
		$this->load->view('aturan/sambungan',$data);

		}else {
		$masuk=$this->input;
		
		$data = array(
					'nama_rak'					=>$masuk->post('nama_rak',TRUE),
					'catatan'					=>$masuk->post('catatan',TRUE),
					'id_kategori'				=>$masuk->post('id_kategori',TRUE),
						
					'user_id'					=>$this->session->userdata('id')		
					
					);
		$data=$this->security->xss_clean($data);
		$this->rak->tambah($data);
		$this->session->set_flashdata ('sukses','data rak berhasil ditambah');
		redirect (base_url('i/rak'));
	}

		
}
		public function edit ($id=null) 
		{
		$key = $this->rak->detail($id);
		$kategori = $this->kategori->_baca();
		$valid=$this->form_validation;
		$valid->set_rules('nama_rak','nama_rak ','required',
								
								array('required'		=>' harus diisi'));
										if($valid->run()===FALSE) {
								//end validasi rak			
							
		$data = array ('title' => 'Edit rak buku  ',
						'key'	=> $key,
						'kategori'	=> $kategori,
						'isi'  =>'rak/edit');
		$this->load->view('aturan/sambungan',$data);
		//masuk database	
		}else {
		$masuk=$this->input;
		
		$data = array('id'	=>$id,
					'nama_rak'				=>$masuk->post('nama_rak',TRUE),
					'catatan'					=>$masuk->post('catatan',TRUE),
					'id_kategori'				=>$masuk->post('id_kategori',TRUE),	
					'user_id'					=>$this->session->userdata('id')		
					
					);
		$data=$this->security->xss_clean($data);
		$this->rak->edit($data);
		$this->session->set_flashdata ('sukses','data rak  berhasil diubah');
		redirect (base_url('i/rak'));
	}
}

		public function hapus($id)
		{
			
		$data = array ('id'	=> $id);
		$this->rak->delete($data);
		$this->session->set_flashdata ('sukses','data rak berhasil dihapus');
		redirect (base_url('i/rak'));
		}

}
