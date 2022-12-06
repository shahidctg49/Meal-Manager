<?php 

class AdminController extends CI_Controller {
	function __construct(){
		parent::__construct();
		/* authentication  */
		if(!$this->session->get_userdata()['ud']){
			redirect('login');
		}
	}
	
	public function authorization($role_id){
		/* authorization  */
		if($this->session->get_userdata()['ud']->role_id !=$role_id){
			redirect('/');
		}
	}
}