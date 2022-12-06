<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UserModel extends CI_Model {
	function __construct(){
		parent::__construct();
	}
	/* for index function */
	public function retrive(){
		return $this->db->get('tbl_auth')->result();
	}
	/* for create function */
	public function create($data){
		$this->db->insert('tbl_auth',$data);
		return $this->db->insert_id();
	}
	/* for update functin */
	public function single_retrive($id){
		return $this->db->where('id',$id)->get('tbl_auth')->row();
	}
	public function update($id,$data){
		$this->db->where('id',$id)->update('tbl_auth',$data);
		return $this->db->affected_rows();
	}
	/* for delete function */
	public function delete($condition){
		$this->db->delete('tbl_auth',$condition);
		return $this->db->affected_rows();
	}
}
