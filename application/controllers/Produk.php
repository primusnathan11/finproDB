<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Produk
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Produk extends CI_Controller
{
    
  public function __construct()
  {
    parent::__construct();
	$this->load->model('M_Produk');
  }

  public function produk_petshop()
  {
	$data['list'] = $this->M_Produk->get_list_produk();
    $this->load->view('v_produk_petshop', $data);
  }

	public function add_produk(){
 	$config['upload_path'] = './uploads/products/';
	$config['allowed_types'] = 'jpg|png';
	
	$this->upload->initialize($config);

		if ($_FILES['gambar_produk']['name'] != "") {
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('gambar_produk')) {
				$this->session->set_flashdata('pesan', $this->upload->display_errors());
				redirect('Produk/produk_petshop');
			} else {
				if($this->M_Produk->tambah_produk($this->upload->data('file_name'))){
					$this->session->set_flashdata('pesan', 'Berhasil menambah data');
				} else {
					$this->session->set_flashdata('pesan', 'Gagal menambah data');
				}
				redirect('Produk/produk_petshop');
			}
				
		} else {
			if ($this->M_Produk->tambah_produk('')) {
				$this->session->set_flashdata('pesan', 'Berhasil menambah data');
			} else {
				$this->session->set_flashdata('pesan', 'Gagal menambah data');
			}
			redirect('Produk/produk_petshop');
		}	
}

public function get_detail_produk($id_produk=''){
	$data_detail=$this->M_Produk->detail_produk($id_produk);
	echo json_encode($data_detail);
}


public function update_produk(){
	$config['upload_path'] = './uploads/products/';
	$config['allowed_types'] = 'jpg|png';
	
	$this->upload->initialize($config);

		if ($_FILES['gambar_produk']['name'] != "") {
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('gambar_produk')) {
				$this->session->set_flashdata('pesan', $this->upload->display_errors());
				redirect('Produk/index');
			} else {
				if($this->M_Produk->update_produk($this->upload->data('file_name'))){
					$this->session->set_flashdata('pesan', 'Berhasil mengubah data');
				} else {
					$this->session->set_flashdata('pesan', 'Ubah data gagal, maaf coba lagi');
				}
				redirect('Produk/produk_petshop');
			}
				
		} else {
			if ($this->M_Produk->update_produk('')) {
				$this->session->set_flashdata('pesan', 'Berhasil mengubah data');
			} else {
				$this->session->set_flashdata('pesan', 'Ubah data gagal, maaf coba lagi');
			}
			redirect('Produk/produk_petshop');
		}	
	}
	
public function hapus_produk($id_produk){
	$hapus = $this->M_Produk->hapus_produk($id_produk);
	if($hapus == TRUE){
		$this->session->set_flashdata('pesan', 'Hapus produk berhasil');
	} else {
		$this->session->set_flashdata('gagal', 'Hapus produk gagal');
	}
	redirect(base_url('Produk/produk_petshop'), 'refresh');
}

}


/* End of file Produk.php */
/* Location: ./application/controllers/Produk.php */
