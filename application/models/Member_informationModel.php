<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Member_informationModel extends CI_Model {
	function __construct(){
		parent::__construct();
	}
	/* for index function */
	public function retrive(){
		return $this->db->get('member_information')->result();
	}
	/* for create function */
	public function create($data){
		$this->db->insert('member_information',$data);
		return $this->db->insert_id();
	}
	/* for update functin */
	public function single_retrive($id){
		return $this->db->where('id',$id)->get('member_information')->row();
	}
	public function update($id,$data){
		$this->db->where('id',$id)->update('member_information',$data);
		return $this->db->affected_rows();
	}
	/* for delete function */
	public function delete($condition){
		$this->db->delete('member_information',$condition);
		return $this->db->affected_rows();
	}
}
