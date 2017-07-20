<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Maintenance_model extends MY_Model {

	protected $_tabel = 'Maintenance';
	
	public function __construct(){
		parent::__construct();

	}

	public function get($id = NULL) {
		$id_value = $id;
		$id_field = 'MaintenanceId';
		$table_name = $this->_tabel;

		return $this->read($id_value,$id_field,$table_name);
	}

	public function getNama($name = NULL) {
		$id_value = $name;
		$id_field = 'MaintenanceName';
		$table_name = $this->_tabel;

		return $this->read($id_value,$id_field,$table_name);
	}
	
	public function getList($limit = 100, $offset = 0, $conditions = NULL) {
		$this->db->select('A.MaintenanceId,A.MaintenanceName,A.MaintenanceTeaser,A.MaintenanceDesc,A.MaintenanceCategory,A.MaintenanceImage,A.MaintenanceStatus,A.MaintenancePublishedDate,A.MaintenanceCreatedDate,A.MaintenanceDate');
		$this->db->from($this->_tabel.' as A');
		
		if ($conditions <> NULL):
			$this->db->where($conditions);
		endif;

		if ($limit <> NULL):
			$this->db->limit ( $limit, $offset );
		endif;
		
		$this->db->order_by( 'MaintenanceDate', 'DESC');
		$query = $this->db->get ();
		// echo $this->db->last_query();
		// die();
		return $query->result_array ();
	}
    
    public function totalData($conditions = NULL)
    {
    	// return $this->count($conditions, $this->_tabel);
    	$this->db->select('A.MaintenanceId');
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

}

/* End of file Maintenance_model.php */
/* Product: ./application/modules/content/models/Maintenance_model.php */