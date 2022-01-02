<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Shop_model
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

class M_Shop extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function product_list()
  {
    $this->db->select('*');
    $this->db->from('produk');
    $this->db->join('petshop','petshop.id_petshop = produk.id_petshop');
    $this->db->where('stok > 0');
    $query = $this->db->get()->result();
    return $query;
  }

  // ------------------------------------------------------------------------

}

/* End of file Shop_model.php */
/* Location: ./application/models/Shop_model.php */
