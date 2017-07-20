<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News_model extends MY_Model {

	protected $_tabel = 'News';
	protected $_tabel2 = 'TemporarySearch';
	
	public function __construct(){
		parent::__construct();

	}

	public function get($id = NULL) {
		$id_value = $id;
		$id_field = 'NewsId';
		$table_name = $this->_tabel;

		return $this->read($id_value,$id_field,$table_name);
	}

	public function getNama($name = NULL) {
		$id_value = $name;
		$id_field = 'NewsName';
		$table_name = $this->_tabel;

		return $this->read($id_value,$id_field,$table_name);
	}
	
	public function getList($limit = 100, $offset = 0, $conditions = NULL) {
		$this->db->select('A.NewsId,A.NewsName,A.NewsDate,A.NewsTeaser,A.NewsDesc,A.NewsCategory,A.NewsImage,A.NewsStatus,A.NewsPublishedDate,A.NewsCreatedDate');
		$this->db->from($this->_tabel.' as A');
		
		if ($conditions <> NULL):
			$this->db->where($conditions);
		endif;

		if ($limit <> NULL):
			$this->db->limit ( $limit, $offset );
		endif;
		
		$this->db->order_by( 'NewsDate', 'DESC');
		$query = $this->db->get ();
		// echo $this->db->last_query();
		// die();
		return $query->result_array ();
	}
    
    public function totalData($conditions = NULL)
    {
    	// return $this->count($conditions, $this->_tabel);
    	$this->db->select('A.NewsId');
		$this->db->from($this->_tabel.' as A');
		
		if ($conditions <> NULL):
			$this->db->where($conditions);
		endif;

		$query = $this->db->get ();
    	if ($query->result_array()):
			return $query->num_rows();
		else:
			return 0;
		endif;
    }

    public function totalDataSearch($conditions = NULL)
    {
    	// return $this->count($conditions, $this->_tabel);
    	$this->db->select('A.TempId');
		$this->db->from($this->_tabel2.' as A');
		
		if ($conditions <> NULL):
			$this->db->where($conditions);
		endif;

		$query = $this->db->get ();
    	if ($query->result_array()):
			return $query->num_rows();
		else:
			return 0;
		endif;
    }

    public function getListSearch($limit = 100, $offset = 0, $conditions = NULL) {
		$this->db->select('*');
		$this->db->from($this->_tabel2.' as A');
		
		if ($conditions <> NULL):
			$this->db->where($conditions);
		endif;

		if ($limit <> NULL):
			$this->db->limit ( $limit, $offset );
		endif;
		
		$this->db->order_by( 'TempId', 'DESC');
		$query = $this->db->get ();
		// echo $this->db->last_query();
		// die();
		return $query->result_array ();
	}

}

/* End of file news_model.php */
/* Product: ./application/modules/content/models/news_model.php */