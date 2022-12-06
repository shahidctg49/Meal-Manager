<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mem_recModel extends CI_Model {
	function __construct(){
		parent::__construct();
	}
	/* for index function */
	public function retrive(){
		return $this->db->get('mem_rec')->result();
	}
	/* for create function */
	public function create($data){
		$this->db->insert('mem_rec',$data);
		return $this->db->insert_id();
	}
	/* for update functin */
	public function single_retrive($id){
		return $this->db->where('id',$id)->get('mem_rec')->row();
	}
	public function update($id,$data){
		$this->db->where('id',$id)->update('mem_rec',$data);
		return $this->db->affected_rows();
	}
	/* for delete function */
	public function delete($condition){
		$this->db->delete('mem_rec',$condition);
		return $this->db->affected_rows();
	}
}
