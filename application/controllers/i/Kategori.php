<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
public function __construct()
        {
                parent::__construct();
                $this->load->model('kategori_m','kategori'); 
                	$this->load->helper('security');            
                 if(empty($this->session->userdata['email'])){
                redirect(site_url().'welcome/login');
            } 
        }

	public function index()
	{
		 
		$kategori = $this->kategori->_baca();

		$data = array ('title' 	=> 'Data kategori ',
						'kategori'	=> $kategori,
						'isi'	=> 'kategori/index'
					);
		$this->load->view('aturan/sambungan',$data);
	}

	public function add()
	{
		$kategori = $this->kategori->_baca();
		$valid=$this->form_validation;
		

		$valid->set_rules('nama_kategori','nama_kategori','required|is_unique[kategori.nama_kategori]|max_length[100]|min_length[3]',
							array('required'				=>' harus di isi',
									'min_length'			=>' nama kategori minimal 3 karakter',
									'max_length'			=>' nama kategori maksimal 100 karakter',
									'is_unique'				=>'ooops nama kategori,  <strong>'.$this->input->post('nama_kategori').'</strong> sudah ada, buat nama baru'));
									
									if($valid->run()===FALSE) {//identik sama persis
		
		$data= array('title'	=>'tambah Kategori',
					'kategori'	=>$kategori,
					'isi' 		=>'kategori/add'  );
		$this->load->view('aturan/sambungan',$data);

		}else {
		$masuk=$this->input;
		
		$data = array(
					'nama_kategori'				=>$masuk->post('nama_kategori',TRUE),
					'catatan'					=>$masuk->post('catatan',TRUE),
						
					'user_id'					=>$this->session->userdata('id')		
					
					);
		$data=$this->security->xss_clean($data);
		$this->kategori->tambah($data);
		$this->session->set_flashdata ('sukses','data kategori berhasil ditambah');
		redirect (base_url('i/kategori'));
	}

		
}
		public function edit ($id=null) 
		{
		$key = $this->kategori->detail($id);
		//validasi
		$valid=$this->form_validation;
		$valid->set_rules('nama_kategori','nama_kategori ','required',
								
								array('required'		=>' harus diisi'));
										if($valid->run()===FALSE) {
								//end validasi kategori			
							
		$data = array ('title' => 'Edit Kategori  ',
						'key'	=> $key,
						'isi'  =>'kategori/edit');
		$this->load->view('aturan/sambungan',$data);
		//masuk database	
		}else {
		$masuk=$this->input;
		
		$data = array('id'	=>$id,
					'nama_kategori'				=>$masuk->post('nama_kategori',TRUE),
					'catatan'					=>$masuk->post('catatan',TRUE),
						
					'user_id'					=>$this->session->userdata('id')		
					
					);
		$data=$this->security->xss_clean($data);
		$this->kategori->edit($data);
		$this->session->set_flashdata ('sukses','data kategori  berhasil diubah');
		redirect (base_url('i/kategori'));
	}
}
}
