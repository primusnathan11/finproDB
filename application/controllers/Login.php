<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Login extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
		$this->load->model('M_Login');
  }

  public function index()
  {
    $this->load->view('v_login'); 
  }

  public function auth(){
	$email = htmlspecialchars($this->input->post('email',TRUE),ENT_QUOTES);
    $password = htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);
 
    $cek_user = $this->M_Login->auth_user($email,$password);
	$cek_dokter = $this->M_Login->auth_dokter($email,$password);
	$cek_petshop = $this->M_Login->auth_petshop($email,$password);

        if($cek_user->num_rows() > 0){ 
					$this->form_validation->set_rules('email', 'email', 'trim|required',
					array('required' => 'Alamat email belum terisi'));
					$this->form_validation->set_rules('password', 'password', 'trim|required',
					array('required' => 'Password belum terisi'));

					if ($this->form_validation->run() == TRUE) {
						if($this->M_Login->login_user($email, $password) == TRUE){
							redirect('Home/index');
						} else {
							$this->session->set_flashdata('gagal', 'Login gagal! Pastikan data yang anda masukkan benar');
							redirect('Login/index');
						}
					} else {
						$this->session->set_flashdata('gagal', validation_errors());
							redirect('Login/index');
					}
 
        }
		else if ($cek_dokter->num_rows() > 0){ 
			$this->form_validation->set_rules('email', 'email', 'trim|required',
			array('required' => 'Alamat email belum terisi'));
			$this->form_validation->set_rules('password', 'password', 'trim|required',
			array('required' => 'Password belum terisi'));

			if ($this->form_validation->run() == TRUE) {
				if($this->M_Login->login_dokter($email, $password) == TRUE){
					redirect('Home/index');
				} else {
					$this->session->set_flashdata('gagal', 'Login gagal! Pastikan data yang anda masukkan benar');
					redirect('Login/index');
				}
			} else {
				$this->session->set_flashdata('gagal', validation_errors());
					redirect('Login/index');
			}
        }
		else if ($cek_petshop->num_rows() > 0){ 
			$this->form_validation->set_rules('email', 'email', 'trim|required',
			array('required' => 'Alamat email belum terisi'));
			$this->form_validation->set_rules('password', 'password', 'trim|required',
			array('required' => 'Password belum terisi'));

			if ($this->form_validation->run() == TRUE) {
				if($this->M_Login->login_petshop($email, $password) == TRUE){
					redirect('Home/home_petshop');
				} else {
					$this->session->set_flashdata('gagal', 'Login gagal! Pastikan data yang anda masukkan benar');
					redirect('Login/index');
				}
			} else {
				$this->session->set_flashdata('gagal', validation_errors());
					redirect('Login/index');
			}
        }
	}
	public function register_view(){
		$this->load->view('v_register');
	}

	public function register_user(){
		$this->load->view('v_register_user');
	}

	public function register_petshop(){
		$this->load->view('v_register_petshop');
	}

	public function register_dokter(){
		$this->load->view('v_register_dokter');
	}

	public function daftar_user(){
		
		$this->form_validation->set_rules('nama_user', 'nama_user', 'trim|required',
        array('required' => 'nama belum terisi'));
		$this->form_validation->set_rules('telp_user', 'telp_user', 'trim|required',
        array('required' => 'telp user belum terisi'));
		$this->form_validation->set_rules('email_user', 'email_user', 'trim|required',
        array('required' => 'email belum terisi'));
        $this->form_validation->set_rules('pass_user', 'pass_user', 'trim|required',
		array('required' => 'Password belum terisi'));
		$this->form_validation->set_rules('alamat_user', 'alamat_user', 'trim|required',
        array('required' => 'alamat belum terisi'));
		
		if ($this->form_validation->run() == TRUE ) {
	    	$masuk=$this->M_Login->daftar_user();
				if($masuk==true){
		    		$this->session->set_flashdata('pesan', 'Daftar Akun berhasil');
    				} else{
		    		$this->session->set_flashdata('gagal', 'Daftar Akun gagal');
				}
		    redirect(base_url('Login/index'), 'refresh');
		} else{
		    $this->session->set_flashdata('pesan', validation_errors());
		    redirect(base_url('Login/daftar_user'), 'refresh');
	    }

	}

	public function daftar_petshop(){
		
		$this->form_validation->set_rules('nama_petshop', 'nama_petshop', 'trim|required',
        array('required' => 'nama belum terisi'));
		$this->form_validation->set_rules('telp_petshop', 'telp_petshop', 'trim|required',
        array('required' => 'telp user belum terisi'));
		$this->form_validation->set_rules('email_petshop', 'email_petshop', 'trim|required',
        array('required' => 'email belum terisi'));
        $this->form_validation->set_rules('pass_petshop', 'pass_petshop', 'trim|required',
		array('required' => 'Password belum terisi'));
		$this->form_validation->set_rules('alamat_petshop', 'alamat_petshop', 'trim|required',
        array('required' => 'alamat belum terisi'));
		
		if ($this->form_validation->run() == TRUE ) {
	    	$masuk=$this->M_Login->daftar_petshop();
				if($masuk==true){
		    		$this->session->set_flashdata('pesan', 'Daftar Akun berhasil');
    				} else{
		    		$this->session->set_flashdata('gagal', 'Daftar Akun gagal');
				}
		    redirect(base_url('Login/index'), 'refresh');
		} else{
		    $this->session->set_flashdata('pesan', validation_errors());
		    redirect(base_url('Login/daftar_user'), 'refresh');
	    }

	}

	public function daftar_dokter(){
		$config['upload_path'] = './uploads/sertifikat_dokter';
		$config['allowed_types'] = 'jpg|png|pdf';
		$this->upload->initialize($config);
	
			if ($_FILES['sertifikat_dokter']['name'] != "") {
				$this->load->library('upload', $config);
	
				if (!$this->upload->do_upload('sertifikat_dokter')) {
					$this->session->set_flashdata('pesan', $this->upload->display_errors());
					redirect('Login/index');
				} else {
					if($this->M_Login->daftar_dokter($this->upload->data('file_name'))){
						$this->session->set_flashdata('pesan', 'berhasil menambah data');
					} else {
						$this->session->set_flashdata('pesan', 'gagal menambah data');
					}
					redirect('Login/index');
				}
					
			} else {
				if ($this->M_Login->daftar_dokter('')) {
					$this->session->set_flashdata('pesan', 'berhasil menambah data');
				} else {
					$this->session->set_flashdata('pesan', 'gagal menambah data');
				}
				redirect('Login/index');
			}	
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('Home/index');
	}

}


/* End of file Login.php */
/* Location: ./application/controllers/Login.php */
