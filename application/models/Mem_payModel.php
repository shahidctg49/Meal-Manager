<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mem_payModel extends CI_Model {
	function __construct(){
		parent::__construct();
	}
	/* for index function */
	public function retrive(){
		return $this->db->get('mem_pay')->result();
	}
	/* for create function */
	public function create($data){
		$this->db->insert('mem_pay',$data);
		return $this->db->insert_id();
	}
	/* for update functin */
	public function single_retrive($id){
		return $this->db->where('id',$id)->get('mem_pay')->row();
	}
	public function update($id,$data){
		$this->db->where('id',$id)->update('mem_pay',$data);
		return $this->db->affected_rows();
	}
	/* for delete function */
	public function delete($condition){
		$this->db->delete('mem_pay',$condition);
		return $this->db->affected_rows();
	}
}
