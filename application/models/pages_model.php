<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages_model extends MY_Model {

	protected $_tabel = 'Pages';
	protected $_tabel2 = 'Message';

	public function __construct(){
		parent::__construct();

	}

	public function addMessage($data) {
		if (! $data || ! is_array ( $data ))
			return false;
		
		$data ['MessageCreatedDate'] = date ( 'Y-m-d H:i:s' );

		return $this->create($data,$this->_tabel2);

	}
	
	public function get($segment = NULL) {
		$this->db->select('PagesName,PagesContent');
		$this->db->from($this->_tabel);
		$this->db->where('PagesSegment',$segment);
		$this->db->where('PagesStatus',1);
		$this->db->limit(1);
		$this->db->order_by('PagesId', 'DESC');
		$query = $this->db->get();
		return $query->row_array();
	}
	
	/* s: get data terakhir */
	public function getLatest() {
		$this->db->select('name,id');
		$this->db->from($this->_tabel);
		$this->db->where('status_id',1);
		$this->db->limit(1);
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get();
		return $query->row_array();
	}
	/* e: get data terakhir */

}

/* End of file pages_model.php */
/* Location: ./application/modules/content/models/pages_model.php */