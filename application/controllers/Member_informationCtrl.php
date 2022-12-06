<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Member_informationCtrl extends AdminController {

	function __construct(){
		parent::__construct();
		$this->load->model('Member_informationModel','um');
		$this->load->model('CommonModel','cm');
	}
	public function index()
	{
		$data['member_information']=$this->um->retrive();
		$data['page']='member_information/index';
		$this->load->view('app',$data);
	}
	public function create(){
		/* load helper and library */
		$this->load->helper('form');
		$data['page']='member_information/create';
		$this->load->view('app',$data);
	}

	public function store(){
		/* load helper and library */
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		/* set validatin */
		$this->form_validation->set_rules('name', 'Full Name', 'required');
		$this->form_validation->set_rules('father_name', 'Father Name', 'required');
		$this->form_validation->set_rules('contact', 'Contact', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		

		if ($this->form_validation->run() == FALSE){
			$data['page']='member_information/create';
			$this->load->view('app',$data);
        }else{
			$ud['name']=$this->input->post('name');
			$ud['father_name']=$this->input->post('father_name');
			$ud['contact']=$this->input->post('contact');
			$ud['address']=$this->input->post('address');

			if($this->cm->common_insert('member_information',$ud)){
				$this->session->set_flashdata('msg','<b class="text-success">Data saved</b>');
				redirect('member_information');
			}else{
				$this->session->set_flashdata('msg','<b class="text-danger">Please Try again</b>');
				redirect('member_information/create');
        }
	}
}
	public function update($id){
		/* load helper and library */
		$this->load->helper('form');
		$this->load->library('form_validation');
		/* set validatin */
		$this->form_validation->set_rules('name', 'Full Name', 'required');			
		$this->form_validation->set_rules('contact', 'Full Name', 'required');			
		$this->form_validation->set_rules('father_name', 'Full Name', 'required');			
		$this->form_validation->set_rules('address', 'Full Name', 'required');			
		
		if ($this->form_validation->run() == FALSE){
			$data['member_information']=$this->um->single_retrive($id);
			$data['page']="member_information/edit";
			$this->load->view('app',$data);
		}else{
			$ud['name']=$this->input->post('name');
			$ud['father_name']=$this->input->post('father_name');
			$ud['contact']=$this->input->post('contact');
			$ud['address']=$this->input->post('address');			
		
			if($this->um->update($id,$ud)){
				$this->session->set_flashdata('msg','<b class="text-success">Data updated</b>');
			}else{
				$this->session->set_flashdata('msg','<b class="text-danger">Please Try again</b>');
				// $this->load->view('member_information/edit/'.$id);
			}
			redirect('member_information');
		}
	}
		
	public function destroy($id){
		$condition['id']=$id;
		if($this->um->delete($condition)){
			$this->session->set_flashdata('msg','<b class="text-success">Data deleted</b>');
		}else{
			$this->session->set_flashdata('msg','<b class="text-danger">Please Try again</b>');
		}
		redirect('member_information');
	}
}
