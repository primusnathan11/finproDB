<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Produk_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class M_Produk extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------
  public function get_list_produk(){
	return $this->db->where('id_petshop',$this->session->userdata('id_petshop'))
					->get('produk')->result();
  }

  // ------------------------------------------------------------------------
  public function tambah_produk($nama_file){
		if ($nama_file == "") {
				$tambah = array(
						'nama_produk' =>$this->input->post('nama_produk'),
						'harga_produk' =>$this->input->post('harga_produk'),
						'stok' =>$this->input->post('stok'),
						'id_petshop' =>$this->session->userdata('id_petshop')
				);
		} else {
				$tambah = array(
						'nama_produk' =>$this->input->post('nama_produk'),
						'harga_produk' =>$this->input->post('harga_produk'),
						'stok' =>$this->input->post('stok'),
						'gambar_produk'=>$nama_file,
						'id_petshop' =>$this->session->userdata('id_petshop')
				);
		}
		return $this->db->insert('produk', $tambah);
}

public function detail_produk($id_produk=''){
	return $this->db->where('id_produk', $id_produk)->get('produk')->row();
}


public function update_produk($nama_file){
	if ($nama_file == "") {
		$update = array(
			'nama_produk' =>$this->input->post('nama_produk'),
			'harga_produk' =>$this->input->post('harga_produk'),
			'stok' =>$this->input->post('stok')
		);
	} else {
		$update = array(
			'nama_produk' =>$this->input->post('nama_produk'),
			'harga_produk' =>$this->input->post('harga_produk'),
			'stok' =>$this->input->post('stok'),
			'gambar_produk'=>$nama_file
		);
	}
	return $this->db->where('id_produk',$this->input->post('id_produk'))->update('produk', $update);
}

public function hapus_produk($id_produk){
	$this->db->where('id_produk', $id_produk);
	return $this->db->delete('produk');
}
  // ------------------------------------------------------------------------

}

/* End of file Produk_model.php */
/* Location: ./application/models/Produk_model.php */
