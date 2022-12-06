<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mem_payCtrl extends AdminController {

	function __construct(){
		parent::__construct();
		$this->load->model('Mem_payModel','um');
		$this->load->model('CommonModel','cm');
	}
	public function index(){
		$data['mem_pay']=$this->db->query("SELECT `mem_pay`.*, member_information.name FROM `mem_pay` JOIN member_information on member_information.id=mem_pay.member_id")->result();
		$data['page']='mem_pay/index';
		$this->load->view('app',$data);
	}
	public function create(){
		/* load helper and library */
		$this->load->helper('form');
		$data['members']=$this->cm->common_select('member_information','id,name,contact');
		$data['page']='mem_pay/create';
		$this->load->view('app',$data);
	}

	public function store(){
		/* load helper and library */
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		/* set validatin */
		$this->form_validation->set_rules('member_id', 'ID', 'required');
		$this->form_validation->set_rules('pdate', 'Date', 'required');
		$this->form_validation->set_rules('amount', 'Amount', 'required');
		$this->form_validation->set_rules('type', 'Type', 'required');
		

		if ($this->form_validation->run() == FALSE){
			$data['page']='mem_pay/create';
			$this->load->view('app',$data);
        }else{
			$ud['member_id']=$this->input->post('member_id');
			$ud['pdate']=$this->input->post('pdate');
			$ud["{$this->input->post('type')}"]=$this->input->post('amount');
			$ud['note']=$this->input->post('note');

			if($this->cm->common_insert('mem_pay',$ud)){
				$this->session->set_flashdata('msg','<b class="text-success">Data saved</b>');
				redirect('mem_pay');
			}else{
				$this->session->set_flashdata('msg','<b class="text-danger">Please Try again</b>');
				redirect('mem_pay/create');
			}
		}
	}
	public function update($id){
		/* load helper and library */
		$this->load->helper('form');
		$this->load->library('form_validation');
		/* set validatin */
		$this->form_validation->set_rules('member_id', 'ID', 'required');
		$this->form_validation->set_rules('pdate', 'Date', 'required');
		$this->form_validation->set_rules('amount', 'Amount', 'required');
		$this->form_validation->set_rules('type', 'Type', 'required');
		
		if ($this->form_validation->run() == FALSE){
			$data['members']=$this->cm->common_select('member_information','id,name,contact');
			$data['mem_pay']=$this->um->single_retrive($id);
			$data['page']="mem_pay/edit";
			$this->load->view('app',$data);
		}else{
			/* make amount 0 befor update */
			$dud["pay"]=0;
			$dud["exp"]=0;
			$this->um->update($id,$dud);

			$ud['member_id']=$this->input->post('member_id');
			$ud['pdate']=$this->input->post('pdate');
			$ud["{$this->input->post('type')}"]=$this->input->post('amount');
			$ud['note']=$this->input->post('note');
		
			if($this->um->update($id,$ud)){
				$this->session->set_flashdata('msg','<b class="text-success">Data updated</b>');
			}else{
				$this->session->set_flashdata('msg','<b class="text-danger">Please Try again</b>');
				// $this->load->view('mem_pay/edit/'.$id);
			}
			redirect('mem_pay');
		}
	}
		
	public function destroy($id){
		$condition['id']=$id;
		if($this->um->delete($condition)){
			$this->session->set_flashdata('msg','<b class="text-success">Data deleted</b>');
		}else{
			$this->session->set_flashdata('msg','<b class="text-danger">Please Try again</b>');
		}
		redirect('mem_pay');
	}
}
