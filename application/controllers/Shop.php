<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Shop extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
		$this->load->model('M_Shop');
  }

  public function index()
  {
		$data['produk'] = $this->M_Shop->product_list();
    $this->load->view('v_shop', $data);
  }

}


/* End of file Shop.php */
/* Location: ./application/controllers/Shop.php */
