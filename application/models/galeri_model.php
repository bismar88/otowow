<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Galeri_model extends MY_Model {

	protected $_tabel = 'Galeri';
	
	public function __construct(){
		parent::__construct();
	}

	public function totalData($conditions = NULL)
    {
    	// return $this->count($conditions, $this->_tabel);
    	$this->db->select('A.GaleriId');
		$this->db->from($this->_tabel.' as A');
		
		if ($conditions <> NULL):
			$this->db->where($conditions);
		endif;

		$query = $this->db->get ();
		//echo $this->db->last_query();die();
    	if ($query->result_array()):
			return $query->num_rows();
		else:
			return 0;
		endif;
    }

    public function getList($limit = 100, $offset = 0, $conditions = NULL) 
    {
		$this->db->select('A.GaleriId,A.GaleriName,A.GaleriFile');
		$this->db->from($this->_tabel.' as A');
		
		if ($conditions <> NULL):
			$this->db->where($conditions);
		endif;

		if ($limit <> NULL):
			$this->db->limit ( $limit, $offset );
		endif;
		
		$this->db->order_by( 'A.GaleriId', 'DESC');
		$query = $this->db->get ();
		return $query->result_array ();
	}

	public function get($id = NULL) 
	{
		$id_value = $id;
		$id_field = 'GaleriId';
		$table_name = $this->_tabel;

		return $this->read($id_value,$id_field,$table_name);
	}
}