<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
        
    public $status; 
    public $roles;

    function __construct(){
        parent::__construct();
        $this->load->model('User_model', 'user_model', TRUE);
        $this->load->library('form_validation');  
          $this->load->model('transaksi_m','transaksi');   
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->status = $this->config->item('status'); 
        $this->roles = $this->config->item('roles');
    }      
    
    public function index()
    {   
            if(empty($this->session->userdata['email'])){
                redirect(site_url().'welcome/login');
            } 
            $pinjam=$this->transaksi->_baca();
       $data = array ('title' 	=> '',
                      'pinjam'    =>$pinjam,
       				  'isi'	         => 'home/index');
		$this->load->view('aturan/sambungan',$data);

          
    }
        
        
        public function register()
        {

            $this->form_validation->set_rules('firstname', 'First Name', 'required');
            $this->form_validation->set_rules('lastname', 'Last Name', 'required');    
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');    
                       
            if ($this->form_validation->run() == FALSE) {   
               $data = array('title' =>'',
             				'isi'=>'register/index'  );
                $this->load->view('aturan/sambungan',$data);
            }else{                
                if($this->user_model->isDuplicate($this->input->post('email'))){
                    $this->session->set_flashdata('flash_message', 'email anda sudah terdaftar ');
                    redirect(site_url().'Welcome/login');
                }else{
                    
                    $clean = $this->security->xss_clean($this->input->post(NULL, TRUE));
                    $id = $this->user_model->insertUser($clean); 
                    $token = $this->user_model->insertToken($id);                                        
                    
                    $qstring = $this->base64url_encode($token);                    
                    $url = site_url() . 'Welcome/complete/token/' . $qstring;
                    $link = '<a href="' . $url . '">' . $url . '</a>'; 

                    $message = '';                     
                    $message .= '' . $link;       
                    echo $message; //send this in email

            		$config = Array(  
                    'protocol' => 'smtp',  
                    'smtp_host' => 'ssl://smtp.googlemail.com',  
                    'smtp_port' => 465,  
                    'smtp_user' => 'xxxx',   
                    'smtp_pass' => 'xxxxxx',   
                    'mailtype' => 'html',   
                    'charset' => 'iso-8859-1'  
                    );  
                    $this->load->library('email', $config);  
                    $this->email->set_newline("\r\n");  
                    $this->email->from(($this->input->post('email',TRUE)), ($this->input->post('firstname',TRUE)));   
                    $this->email->to($this->input->post('email',TRUE));  
                    $this->email->cc('xxxxx');   
                    $this->email->subject('proses pendaftaran');   
                    $this->email->message('untuk melanjutkan register klik link ini   .'.$message);  
                    if (!$this->email->send()) {  
                    echo 'what this is';  
                    }else{  
                    echo 'Success to send email'; 
                     return redirect();  
                    }  
                    exit;                     
                    
                };              
            }
        }
        
        
        protected function _islocal(){
            return strpos($_SERVER['HTTP_HOST'], 'local');
        }
        
        public function complete()
        {                                   
            $token = base64_decode($this->uri->segment(4));       
            $cleanToken = $this->security->xss_clean($token);
            
            $user_info = $this->user_model->isTokenValid($cleanToken); //either false or array();           
            
            if(!$user_info){
                $this->session->set_flashdata('flash_message', 'Token is invalid or expired');
                redirect(site_url().'welcome/login');
            }            
            $data = array(
                'firstName'	=> $user_info->first_name, 
                'email'		=> $user_info->email, 
                'user_id'	=> $user_info->id,
                'title'     => 'untuk melanjutkan,silahkan masukan password',
                'isi'		=> 'complete/index', 
                'token'		=> $this->base64url_encode($token)
            );
           
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');              
            
            if ($this->form_validation->run() == FALSE) {   
               
                $this->load->view('aturan/sambungan', $data);
                
            }else{
                
                $this->load->library('password');                 
                $post = $this->input->post(NULL, TRUE);
                
                $cleanPost = $this->security->xss_clean($post);
                
                $hashed = $this->password->create_hash($cleanPost['password']);                
                $cleanPost['password'] = $hashed;
                unset($cleanPost['passconf']);
                $userInfo = $this->user_model->updateUserInfo($cleanPost);
                
                if(!$userInfo){
                    $this->session->set_flashdata('flash_message', 'There was a problem updating your record');
                    redirect(site_url().'welcome/login');
                }
                
                unset($userInfo->password);
                
                foreach($userInfo as $key=>$val){
                    $this->session->set_userdata($key, $val);
                }
                redirect(site_url().'welcome/');
                
            }
        }
        
        public function login()
        {
        	$data= array('title' => '', 
        				 'isi'	 =>'login/index' );
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');    
            $this->form_validation->set_rules('password', 'Password', 'required'); 
            
            if($this->form_validation->run() == FALSE) {
               $this->load->view('aturan/sambungan',$data);
            }else{
                
                $post = $this->input->post();  
                $clean = $this->security->xss_clean($post);
                
                $userInfo = $this->user_model->checkLogin($clean);
                
                if(!$userInfo){
                    $this->session->set_flashdata('flash_message', 'email atau password salah');
                    redirect(site_url().'welcome/login');
                }                
                foreach($userInfo as $key=>$val){
                    $this->session->set_userdata($key, $val);
                }
                redirect(site_url().'welcome/');
            }
            
        }
        
        public function logout()
        {
            $this->session->sess_destroy();
            redirect(site_url().'welcome/login');
        }
        
        public function forgot()
        {
            
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email'); 
            
            if($this->form_validation->run() == FALSE) {
                $data = array('title' =>'',
                				'isi' =>'forgot/index' );
                $this->load->view('aturan/sambungan',$data);
            }else{
                $email = $this->input->post('email');  
                $clean = $this->security->xss_clean($email);
                $userInfo = $this->user_model->getUserInfoByEmail($clean);
                
                if(!$userInfo){
                    $this->session->set_flashdata('flash_message', 'anda salah memasukan email, silahkan daftar');
                    redirect(site_url().'welcome/register');
                }   
                
                if($userInfo->status != $this->status[1]){ //if status is not approved
                    $this->session->set_flashdata('flash_message', 'akun anda tidak di approved');
                    redirect(site_url().'welcome/register');
                }
                
                //build token 
                
                $token = $this->user_model->insertToken($userInfo->id);                        
                $qstring = $this->base64url_encode($token);                  
                $url = site_url() . 'welcome/reset_password/token/' . $qstring;
                $link = '<a href="' . $url . '">' . $url . '</a>'; 
                
                $message = '';                     
                $message .= '<strong>A password reset has been requested for this email account</strong><br>';
                $message .= '<strong>Please click:</strong> ' . $link;             

                echo $message; //send this through mail

                $config = Array(  
                    'protocol' => 'smtp',  
                    'smtp_host' => 'ssl://smtp.googlemail.com',  
                    'smtp_port' => 465,  
                    'smtp_user' => 'xxxxxxx',   
                    'smtp_pass' => 'xxxxxxxx',   
                    'mailtype' => 'html',   
                    'charset' => 'iso-8859-1'  
                    );  
                    $this->load->library('email', $config);  
                    $this->email->set_newline("\r\n");  
                    $this->email->from(($this->input->post('email',TRUE)), ($this->input->post('firstname',TRUE)));   
                    $this->email->to($this->input->post('email',TRUE));  
                    $this->email->cc('xxxxxx');   
                    $this->email->subject('proses pendaftaran');   
                    $this->email->message('untuk melanjutkan reset, klik link ini   .'.$message);  
                    if (!$this->email->send()) {  
                    echo 'what this is';  
                    }else{  
                    echo 'Success to send email'; 
                     return redirect();  
                    }  
                    exit;                     
               
                
            }
            
        }
        
        public function reset_password()
        {
           $token = $this->base64url_decode($this->uri->segment(4));                  
            $cleanToken = $this->security->xss_clean($token);
            
            $user_info = $this->user_model->isTokenValid($cleanToken); //either false or array();               
            
            if(!$user_info){
                $this->session->set_flashdata('flash_message', 'Token tidak berlaku atau kadaluarsa');
                redirect(site_url().'welcome/login');
            }            
            $data = array(
                'title' =>'reset',
                'firstName'=> $user_info->first_name, 
                'email'=>$user_info->email, 
//                'user_id'=>$user_info->id, 
                'isi' =>'reset/index',
                'token'=>$this->base64url_encode($token)
            );
           
            $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
            $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');              
            
            if ($this->form_validation->run() == FALSE) {   
               
                $this->load->view('aturan/sambungan',$data);
                
            }else{
                                
                $this->load->library('password');                 
                $post = $this->input->post(NULL, TRUE);                
                $cleanPost = $this->security->xss_clean($post);                
                $hashed = $this->password->create_hash($cleanPost['password']);                
                $cleanPost['password'] = $hashed;
                $cleanPost['user_id'] = $user_info->id;
                unset($cleanPost['passconf']);                
                if(!$this->user_model->updatePassword($cleanPost)){
                    $this->session->set_flashdata('flash_message', 'ada masalah dalam perubahan password');
                }else{
                    $this->session->set_flashdata('flash_message', 'password anda telah berubah, silahkan masuk dengan pas baru');
                }
                redirect(site_url().'welcome/login');                
            }
        }
        
    public function base64url_encode($data) { 
      return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); 
    } 

    public function base64url_decode($data) { 
      return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT)); 
    }  

       
}
