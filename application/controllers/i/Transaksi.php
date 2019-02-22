<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends CI_Controller {
	public function __construct()
        {
                parent::__construct();
                $this->load->model('transaksi_m','transaksi'); 
                $this->load->model('anggota_m','anggota'); 
                $this->load->model('buku_m','buku'); 
                $this->load->helper('security');            
                 if(empty($this->session->userdata['email'])){
                redirect(site_url().'welcome/login');
            } 
        }

	public function index()
	{
		 
		$transaksi = $this->transaksi->_baca();
		$data = array ('title' 		=> 'Data transaksi ('.count($transaksi).')',
						'transaksi'	=> $transaksi,
						'isi'		=> 'transaksi/index');
		$this->load->view('aturan/sambungan',$data);
	}

	 public function cetak()
    {
      	$transaksi = $this->transaksi->_baca();
        $data = array('title' 		=> 'Data transaksi ('.count($transaksi).')',
						'transaksi'	=> $transaksi,
						'isi'		=> 'transaksi/cetak');
        $this->load->view('transaksi/cetak',$data);
        $html = $this->output->get_output();    
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'Portrait');
        $this->dompdf->render();
        $this->dompdf->stream("welcome.pdf", array("Attachment"=>0));
    }

   

	public function add()
	{
		$transaksi = $this->transaksi->_baca();
		$anggota = $this->transaksi->_anggota();
	
		$data= array('title'	=>'cari npm atau cari nama peminjam buku, pilih (+) plus',
					'transaksi'	=>$transaksi,
					'anggota'	=>$anggota,
					'isi' 		=>'transaksi/list_anggota' );
		$this->load->view('aturan/sambungan',$data);		
	}
		public function pinjam ($id_anggota) 
		{
	
		$key 		= $this->anggota->detail($id_anggota);
		$anggota 	= $this->transaksi->_anggota();
		$maksimal 	= $this->transaksi->maksimal_pinjam($id_anggota);
		$lis 		= $this->transaksi->lis($id_anggota);		
		$buku 		= $this->buku->_baca();	
		
	
		//validasi
		$valid 		= $this->form_validation;
		$valid->set_rules('id_buku','judul_buku ','required',
					array('required'		=>' buku belum dipilih,harus di isi'));
		$valid->set_rules('status_transaksi','status transaksi ','required',
					array('required'		=>' status belum dipilih,harus di isi'));
		if($valid->run()===FALSE) {
								//end validasi transaksi			
							
		$data = array ('title' 				=> 'transaksi peminjam  ',
						
						'key'				=> $key,						
						'anggota'			=> $anggota,
						'maksimal'			=> $maksimal,
						'lis'				=> $lis,
						'buku'				=> $buku,
						
						'isi'  				=> 'transaksi/add');
		$this->load->view('aturan/sambungan',$data);
		//masuk database	
		}else {
		$masuk=$this->input;
		
		$data = array (
						'user_id'				=>$this->session->userdata('id'),	
						'id_anggota'			=>$id_anggota,
						'id_buku'				=>$masuk->post('id_buku',TRUE),					
						'tgl_pinjam'			=>$masuk->post('tgl_pinjam',TRUE),
						'tgl_kembali'			=>$masuk->post('tgl_kembali',TRUE),	
						'status_transaksi'		=>$masuk->post('status_transaksi',TRUE)
										
					);
		$data=$this->security->xss_clean($data);
		$this->transaksi->tambah($data);
		$this->session->set_flashdata ('sukses','data transaksi  berhasil tambah');
		redirect (base_url('i/transaksi/add/'.$id_anggota));
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
							
		$data = array ('title' 				=> 'transaksi detail  ',
						'maksimal'			=> $maksimal,
						
						'lis'				=> $lis,
						'isi'  				=> 'transaksi/detail');
		$this->load->view('aturan/sambungan',$data);
		//masuk database	
		}else {
		
		}
	}

	public function kembali ($id_transaksi=null) 
		{
		
		$lihat 		= $this->transaksi->baca($id_transaksi);
		
		$anggota 	= $this->transaksi->_anggota();	
			
		$buku 		= $this->buku->_baca();	
		
		
		//validasi
		$valid 		= $this->form_validation;
	
		$valid->set_rules('status_transaksi','status transaksi ','required',
					array('required'		=>' status belum dipilih,harus di isi'));
		if($valid->run()===FALSE) {
								//end validasi transaksi			
							
		$data = array ('title' 				=> 'transaksi pengembalian buku  ',
						'lihat'				=> $lihat,
												
						'anggota'			=> $anggota,
						
						
						'buku'				=> $buku,
						
						'isi'  				=> 'transaksi/_kembali');
		$this->load->view('aturan/sambungan',$data);
		//masuk database	
		}else {
		$masuk=$this->input;
		
		$data = array ('id_transaksi'			=>$id_transaksi,
						'user_id'				=>$this->session->userdata('id'),	
						
						'status_transaksi'		=>$masuk->post('status_transaksi',TRUE),
						'terlambat'				=>$masuk->post('terlambat',TRUE),
						'denda'					=>$masuk->post('denda',TRUE)
						
										
					);
		$data=$this->security->xss_clean($data);
		$this->transaksi->edit($data);
		$this->session->set_flashdata ('sukses','data transaksi  berhasil dikembalikan');
		redirect (base_url('i/transaksi/detail/'.$id_anggota));
		}
	}
}
