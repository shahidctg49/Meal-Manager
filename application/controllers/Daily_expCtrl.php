<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Daily_expCtrl extends AdminController {

	function __construct(){
		parent::__construct();
		$this->load->model('Daily_expModel','um');
		$this->load->model('CommonModel','cm');
	}
	public function index()
	{
		$data['daily_exp']=$this->db->query("SELECT daily_exp.*,member_information.name FROM `daily_exp` JOIN member_information on member_information.id=daily_exp.member_id")->result();
		$data['page']='daily_exp/index';
		$this->load->view('app',$data);
	}
	public function create(){
		/* load helper and library */
		$this->load->helper('form');
		$data['members']=$this->cm->common_select('member_information','id,name,contact');
		$data['page']='daily_exp/create';
		$this->load->view('app',$data);
	}

	public function store(){
		/* load helper and library */
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		/* set validatin */
		$this->form_validation->set_rules('member_id', 'ID', 'required');
		$this->form_validation->set_rules('expdate', 'Date', 'required');
		$this->form_validation->set_rules('amount', 'Amount', 'required');
		

		if ($this->form_validation->run() == FALSE){
			$data['page']='daily_exp/create';
			$this->load->view('app',$data);
        }else{

			if($_FILES['uppic']['name']){
				$imgname=time().rand(1000,9999);

				$c['file_name']=$imgname;
				$c['upload_path']='upload/voucher/';
				$c['allowed_types']='jpeg|jpg|png|gif';

				$this->load->library('upload',$c);
				// "uppic" is form name 
				if(!$this->upload->do_upload('uppic')){
					$this->session->set_flashdata('msg',$this->upload->display_errors());
				}else{
					$image_data=$this->upload->data();

					$conf=array(
						'image_library' => 'gd2',
						'source_image' 	=> $image_data['full_path'],
						'new_image'		=>'upload/voucher/thumb/'.$image_data['file_name'],
						'maintain_ratio'=> FALSE,
						'width'			=> 100,
						'height'		=> 100
					);

					$this->load->library('image_lib',$conf);
					$this->image_lib->resize();
					$this->image_lib->clear();

					$ud['uppic']=$image_data['file_name'];
				}
			}

			$ud['member_id']=$this->input->post('member_id');
			$ud['expdate']=$this->input->post('expdate');
			$ud['note']=$this->input->post('note');
			$ud['amount']=$this->input->post('amount');

			if($refid=$this->cm->common_insert('daily_exp',$ud)){
				$mpay['member_id']=$this->input->post('member_id');
				$mpay['pay']=$this->input->post('amount');
				$mpay['pdate']=$this->input->post('expdate');
				$mpay['note']="Pay from shopping";
				$mpay['ref_id']=$refid;
				$this->cm->common_insert('mem_pay',$mpay);

				$this->session->set_flashdata('msg','<b class="text-success">Data saved</b>');
				redirect('daily_exp');
			}else{
				$this->session->set_flashdata('msg','<b class="text-danger">Please Try again</b>');
				redirect('daily_exp/create');
			}
		}
	}

	public function update($id){
		/* load helper and library */
		$this->load->helper('form');
		$this->load->library('form_validation');
		/* set validatin */
		$this->form_validation->set_rules('member_id', 'ID', 'required');
		$this->form_validation->set_rules('expdate', 'Date', 'required');
		$this->form_validation->set_rules('amount', 'Amount', 'required');
		
		if ($this->form_validation->run() == FALSE){
			$data['members']=$this->cm->common_select('member_information','id,name,contact');
			$data['daily_exp']=$this->um->single_retrive($id);
			$data['page']="daily_exp/edit";
			$this->load->view('app',$data);
		}else{
			if($_FILES['uppic']['name']){
				$imgname=time().rand(1000,9999);

				$c['file_name']=$imgname;
				$c['upload_path']='upload/voucher/';
				$c['allowed_types']='jpeg|jpg|png|gif';

				$this->load->library('upload',$c);
				// "uppic" is form name 
				if(!$this->upload->do_upload('uppic')){
					$this->session->set_flashdata('msg',$this->upload->display_errors());
				}else{
					$image_data=$this->upload->data();

					
					$conf=array(
						'image_library' => 'gd2',
						'source_image' 	=> $image_data['full_path'],
						'new_image'		=>'upload/voucher/thumb/'.$image_data['file_name'],
						'maintain_ratio'=> FALSE,
						'width'			=> 100,
						'height'		=> 100
					);

					$this->load->library('image_lib',$conf);
					$this->image_lib->resize();
					$this->image_lib->clear();

					$ud['uppic']=$image_data['file_name'];
				}
			}

			$ud['member_id']=$this->input->post('member_id');
			$ud['expdate']=$this->input->post('expdate');
			$ud['note']=$this->input->post('note');
			$ud['amount']=$this->input->post('amount');
		
			if($this->um->update($id,$ud)){
				$mpay['pay']=$this->input->post('amount');
				$mpay['pdate']=$this->input->post('expdate');
				$mcon['ref_id']=$id;
				$this->cm->common_update('mem_pay',$mpay,$mcon);

				$this->session->set_flashdata('msg','<b class="text-success">Data updated</b>');
			}else{
				$this->session->set_flashdata('msg','<b class="text-danger">Please Try again</b>');
				// $this->load->view('daily_exp/edit/'.$id);
			}
			redirect('daily_exp');
		}
	}

	public function destroy($id){
		$condition['id']=$id;
		if($this->um->delete($condition)){
			$mcon['ref_id']=$id;
			$this->cm->common_dalete('mem_pay',$mcon);
			$this->session->set_flashdata('msg','<b class="text-success">Data deleted</b>');
		}else{
			$this->session->set_flashdata('msg','<b class="text-danger">Please Try again</b>');
		}
		redirect('daily_exp');
	}
}
