<?php (defined('BASEPATH')) OR exit('No direct script access allowed');
/*
 * MY_Model is use for CRUD
 *
 */

class MY_Model extends CI_Model {

	var $db;
	var $db_write;

	public function __construct()
	{
		$this->db	 	 = $this->load->database('default', TRUE);
		//$this->db_write  = $this->load->database('write_db', TRUE);
	}

	public function create( $object,$table_name )
	{
		if( $this->db->insert( $table_name ,$object) ):
			return TRUE;
		else:
			return FALSE;
		endif;
	}

	public function update( $id_value,$object,$id_field,$table_name ){
		$this->db->where( $id_field,$id_value );
		$this->db->limit(1);
		return ($this->db->update( $table_name, $object ) && $this->db->affected_rows() == 1) ? TRUE : FALSE;
	}

	public function update_multiple( $object,$id_field,$table_name ){
		$this->db->where( $id_field,$object[$id_field] );
		$this->db->update( $table_name, $object );
		return ( $this->db->affected_rows() > 0 ? TRUE : FALSE );
	}

	public function delete( $id_value,$id_field,$table_name ){
		$this->db->where( $id_field, $id_value );
		$this->db->limit(1);
		return ( $this->db->delete( $table_name, $object ) && $this->db->affected_rows() == 1) ? TRUE : FALSE;
	}

	public function delete_multiple( $id_value,$id_field,$table_name ){
		$this->db->where( $id_field, $id_value );
		return ( $this->db->delete( $table_name ) && $this->db->affected_rows() == 1) ? TRUE : FALSE;
	}

	public function read( $id_value, $id_field, $table_name ){ //  read by id
		$this->db->where( $id_field, $id_value );
		$query = $this->db->get( $table_name );
		return $query->row_array();
	}

	public function get_all( $table_name,$order="",$limit="",$condition="" )
	{
		if($order!='') $this->db->order_by( $order );
		if($limit!='') $this->db->limit( $limit );
		if($condition!='') $this->db->where( $condition );
		$query = $this->db->get( $table_name );
		return $query->result_array();

	}

	public function count( $conditions, $table_name ){
		if( $conditions !='' ):
			$this->db->where( $conditions );
		endif;
		return $this->db->count_all_results( $table_name );
	}


	public function next_id( $table_name )
	{
		$query_string 	= "SHOW TABLE STATUS LIKE '".$table_name."'";
		$query			= $this->db->query( $query_string );
		return $query->row('Auto_increment');

	}

	public function max_value( $id_field,$table_name )
	{
		$query_string 	= "SELECT MAX(".$id_field.") AS `max` FROM ".$table_name;
		$query 			= $this->db->query($query_string);
		return $query->row('max');

	}

	public function min_value( $id_field,$table_name )
	{
		$query_string 	= "SELECT MIN(".$id_field.") AS `min` FROM ".$table_name;
		$query 			= $this->db->query($query_string);
		return $query->row('min');

	}
}