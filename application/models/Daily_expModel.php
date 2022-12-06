<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Daily_expModel extends CI_Model {
	function __construct(){
		parent::__construct();
	}
	/* for index function */
	public function retrive(){
		return $this->db->get('daily_exp')->result();
	}
	/* for create function */
	public function create($data){
		$this->db->insert('daily_exp',$data);
		return $this->db->insert_id();
	}
	/* for update functin */
	public function single_retrive($id){
		return $this->db->where('id',$id)->get('daily_exp')->row();
	}
	public function update($id,$data){
		$this->db->where('id',$id)->update('daily_exp',$data);
		return $this->db->affected_rows();
	}
	/* for delete function */
	public function delete($condition){
		$this->db->delete('daily_exp',$condition);
		return $this->db->affected_rows();
	}
}
