<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banner_model extends MY_Model {

	protected $_tabel = 'Banner';
	
	public function __construct(){
		parent::__construct();
	}

	public function getBanner($id = NULL) 
	{
		$id_value = $id;
		$id_field = 'BannerId';
		$table_name = $this->_tabel;

		return $this->read($id_value,$id_field,$table_name);
	}

	public function getCategoryBanner($cat = NULL) 
	{
		$this->db->where( 'BannerCategory', $cat );
		$this->db->where( 'BannerStatus', 1);
		$this->db->order_by( 'BannerId','DESC');
		$query = $this->db->get( $this->_tabel );
		return $query->row_array();
	}

}