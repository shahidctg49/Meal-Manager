<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Mem_recCtrl extends AdminController {

	function __construct(){
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('Mem_recModel','um');
		$this->load->model('CommonModel','cm');
	}
	public function index()
	{
		$data['page']='mem_rec/index';
		$this->load->view('app',$data);
	}

	public function get_member_list(){
        $mdate=$this->input->get('mdate');
        if($mdate){
            $con['mdate']=$mdate;
            $mdatecheck=$this->cm->common_select('mem_rec','id',$con);
            if($mdatecheck){
                $data['members']=$this->db->query("SELECT mem_rec.*, member_information.name,member_information.contact FROM `mem_rec` JOIN member_information on member_information.id=mem_rec.member_id WHERE mem_rec.mdate='$mdate'")->result();;
                $result=$this->load->view('mem_rec/get_member_list',$data,true);
            }else{
                $result="<h2 class='text-center text-danger'>No data found at this date</h2>";
            }
        }else{
            $result="<h2 class='text-center text-danger'>Please select a date</h2>";
        }

        print_r(json_encode($result));
	}
	public function create(){
		/* load helper and library */
		$data['page']='mem_rec/create';
		$this->load->view('app',$data);
	}

	public function get_member(){
        $mdate=$this->input->get('mdate');
        if($mdate){
            $con['mdate']=$mdate;
            $mdatecheck=$this->cm->common_select('mem_rec','id',$con);
            if(!$mdatecheck){
                $data['members']=$this->cm->common_select('member_information','id,name,contact');
                $result=$this->load->view('mem_rec/get_member',$data,true);
            }else{
                $result="<h2 class='text-center text-danger'>You have already hit this date</h2>";
            }
        }else{
            $result="<h2 class='text-center text-danger'>Please select a date</h2>";
        }

        print_r(json_encode($result));
	}

	public function store(){
		$ud=array();
        $breakfast=$this->input->post('breakfast');
        foreach($breakfast as $mem_id=>$brk){
            $ud[]=array(
                    'mdate'=>$this->input->post('mdate'),
                    'member_id'=>$mem_id,
                    'breakfast'=>$brk,
                    'lunch'=>$this->input->post('lunch')[$mem_id],
                    'dinner'=>$this->input->post('dinner')[$mem_id]
                );
        }

        if($this->db->insert_batch('mem_rec', $ud)){
            $this->session->set_flashdata('msg','<b class="text-success">Data saved</b>');
            redirect('mem_rec');
        }else{
            $this->session->set_flashdata('msg','<b class="text-danger">Please Try again</b>');
            $this->load->view('mem_rec/add');
        }
	}

	public function update(){
		$ud['breakfast']=$this->input->post('breakfast');
		$ud['lunch']=$this->input->post('lunch');			
		$ud['dinner']=$this->input->post('dinner');			
	
		$con['id']=$this->input->post('att_id');	
		if($this->cm->common_update('mem_rec',$ud,$con)){
			$this->session->set_flashdata('msg','<b class="text-success">Data updated</b>');
		}else{
			$this->session->set_flashdata('msg','<b class="text-danger">Please Try again</b>');
		}
		redirect('mem_rec');
	}
}
