<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
  }

	public function index(){
		$this->load->view('v_index');
	}

	public function home_dokter(){

	}
	public function home_admin(){

	}

  public function home_petshop()
  {
    $this->load->view('v_home_petshop'); 
  }

}


/* End of file Home.php */
/* Location: ./application/controllers/Home.php */
