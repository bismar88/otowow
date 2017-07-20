<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends MY_Model {

	protected $_tabel = 'Category';
	protected $_tabel2 = 'ProductCategory';
	protected $_tabel3 = 'Product';

	public function __construct(){
		parent::__construct();

	}

	/* s: add category */
	public function addCategory($data) {
		if (! $data || ! is_array ( $data ))
			return false;
		
		$data ['CategoryStatus'] = 1;
	    $data ['CategoryCreatedBy'] = $this->session->userdata('user_id');
		$data ['CategoryCreatedDate'] = date ( 'Y-m-d H:i:s' );
		return $this->create($data,$this->_tabel);

	}
	/* e: add brand */

	/* s: update brand */
	public function updateCategory($id,$data) {
		if (! $id && ! $data && ! is_array($data))
			return false;
		
		$data['CategoryModifiedBy'] = $this->session->userdata('user_id');
		$data['CategoryModifiedDate'] = date ( 'Y-m-d H:i:s' );

		$id_field = 'CategoryId';
	
		return $this->update($id,$data,$id_field,$this->_tabel);
	}
	/* e: update brand */

	/* s: delete brand */
	public function updateStatusCategory($id, $status) {
		if (! $id && ! $status)
			return false;
		
		$data = array(
			'CategoryStatus' => $status,
			'CategoryModifiedBy' => $this->session->userdata('user_id'),
			'CategoryModifiedDate' => date ( 'Y-m-d H:i:s' )
		);

		$id_field = 'CategoryId';
		
		return $this->update($id,$data,$id_field,$this->_tabel);
	}
	/* e: delete brand */

	/* s: hapus data */
	public function deleteCategory($id) {
		if (! $id )
			return false;
		
		$id_field = 'CategoryId';
		return $this->delete ( $id, $id_field, $this->_tabel ) && ($this->db->affected_rows () > 0) ? true : false;
	}
	/* e: hapus data */

	public function get($id = NULL) {
		$id_value = $id;
		$id_field = 'CategoryId';
		$table_name = $this->_tabel;

		return $this->read($id_value,$id_field,$table_name);
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

	public function getList($limit = 100, $offset = 0, $conditions = NULL) {
		$this->db->select('A.CategoryId,A.CategoryName,A.CategoryUrl,A.CategoryDesc,A.CategoryStatus,A.CategoryParentId,B.CategoryName as ParentName');
		$this->db->select('B.CategoryName as ParentName');
		$this->db->from($this->_tabel.' as A');
		$this->db->join($this->_tabel.' as B','A.CategoryParentId = B.CategoryId','LEFT');
		
		if ($conditions <> NULL):
			$this->db->where($conditions);
		endif;

		if ($limit <> NULL):
			$this->db->limit ( $limit, $offset );
		endif;
		
		$this->db->order_by( 'A.CategoryCreatedDate', 'DESC');
		$query = $this->db->get ();
		// echo $this->db->last_query();
		// die();
		return $query->result_array ();
	}
    
	public function getListHome($limit = 100, $offset = 0, $conditions = NULL) {
		$this->db->select('A.CategoryId,A.CategoryName,A.CategoryImage,A.CategoryUrl,A.CategoryDesc,A.CategoryStatus,A.CategoryParentId');
		$this->db->from($this->_tabel.' as A');
		
		if ($conditions <> NULL):
			$this->db->where($conditions);
		endif;

		if ($limit <> NULL):
			$this->db->limit ( $limit, $offset );
		endif;
		
		$this->db->order_by( 'A.CategoryOrder');
		$query = $this->db->get ();
		// echo $this->db->last_query();
		// die();
		return $query->result_array ();
	}

	public function getListChild($limit = 100, $offset = 0, $conditions = NULL) {
		$this->db->select('A.CategoryId,A.CategoryName,A.CategoryImage,A.CategoryUrl,A.CategoryDesc,A.CategoryStatus,A.CategoryParentId');
		$this->db->from($this->_tabel.' as A');
		
		if ($conditions <> NULL):
			$this->db->where($conditions);
		endif;

		if ($limit <> NULL):
			$this->db->limit ( $limit, $offset );
		endif;
		
		$this->db->order_by( 'A.CategoryId');
		$query = $this->db->get ();
		// echo $this->db->last_query();
		// die();
		$res = $query->result_array ();
		if ($res):
			$result = array();
			foreach($res as $row=>$val):
				$this->db->select('B.ProductImage');
				$this->db->from($this->_tabel2.' as A');
				$this->db->join($this->_tabel3.' as B','B.ProductId = A.ProductId','LEFT');
				$this->db->where('A.CategoryId',$val['CategoryId']);
				$this->db->order_by('B.ProductCreatedDate');

				$query2 = $this->db->get();

				$val['ProductImage'] = $query2->result_array();
				$result[] = $val;
			endforeach;

			return $result;
		else:
			return FALSE;
		endif;
	}

    public function totalData($conditions = NULL)
    {
    	// return $this->count($conditions, $this->_tabel);
   		$this->db->select('A.CategoryId');
		$this->db->select('B.CategoryName as ParentName');
		$this->db->from($this->_tabel.' as A');
		$this->db->join($this->_tabel.' as B','A.CategoryParentId = B.CategoryId','LEFT');
		
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

/* End of file category_model.php */
/* Location: ./application/modules/content/models/category_model.php */