<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UserCtrl extends AdminController {

	function __construct(){
		parent::__construct();
		$this->load->model('UserModel','um');
	}
	public function index()
	{
		$data['users']=$this->um->retrive();
		$data['page']='users/index';
		$this->load->view('app',$data);
	}
	public function create(){
		$this->authorization(2);
		/* load helper and library */
		$this->load->helper('form');
		$this->load->view('users/create');
	}
	public function store(){
		/* load helper and library */
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		/* set validatin */
		$this->form_validation->set_rules('name', 'Full Name', 'required');
		$this->form_validation->set_rules('email', 'Email Address', 'required|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('contact', 'Contact', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[20]');
		$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');

		if ($this->form_validation->run() == FALSE){
            $this->load->view('users/create');
        }else{
			$ud['name']=$this->input->post('name');
			$ud['email']=$this->input->post('email');
			$ud['contact']=$this->input->post('contact');
			$ud['password']=sha1(md5($this->input->post('password')));
			if($this->um->create($ud)){
				$this->session->set_flashdata('msg','<b class="text-success">Data saved</b>');
				redirect('users');
			}else{
				$this->session->set_flashdata('msg','<b class="text-danger">Please Try again</b>');
				$this->load->view('users/create');
			}  
        }
	}
	public function update($id){
		/* load helper and library */
		$this->load->helper('form');
		$this->load->library('form_validation');
		/* set validatin */
		$this->form_validation->set_rules('name', 'Full Name', 'required');
		
		if($this->input->post('password')){ // check validation if user provide password
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[20]');
			$this->form_validation->set_rules('cpassword', 'Confirm Password', 'required|matches[password]');
		}
		if ($this->form_validation->run() == FALSE){
			$data['users']=$this->um->single_retrive($id);
			$data['page']="users/edit";
            $this->load->view('app',$data);
        }else{
			$ud['name']=$this->input->post('name');
			$ud['email']=$this->input->post('email');
			if($this->input->post('password')){ // update if user provide password
				$ud['password']=sha1(md5($this->input->post('password')));
			}
			if($this->um->update($id,$ud)){
				$this->session->set_flashdata('msg','<b class="text-success">Data updated</b>');
			}else{
				$this->session->set_flashdata('msg','<b class="text-danger">Please Try again</b>');
				//$this->load->view('users/edit/'.$id);
			}
			redirect('users');
        }
	}
	public function destroy($id){
		$condition['id']=$id;
		if($this->um->delete($condition)){
			$this->session->set_flashdata('msg','<b class="text-success">Data deleted</b>');
		}else{
			$this->session->set_flashdata('msg','<b class="text-danger">Please Try again</b>');
		}
		redirect('users');
	}
}
