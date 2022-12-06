<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class MealCountCtrl extends AdminController {

	function __construct(){
		parent::__construct();
		$this->load->model('CommonModel','cm');
	}

	public function index()
	{
		$data['members']=$this->cm->common_select('member_information','id,name,contact');
		$data['page']='meal_expense/index';
		$this->load->view('app',$data);
	}

    public function get_meal_list(){
        $mmonth=sprintf("%02d", $this->input->get('mmonth'));
        $myear=$this->input->get('myear');
        $member_id=$this->input->get('member_id');
        $before_date="$myear-$mmonth-01";
        $after_date=date("Y-m-t", strtotime($before_date));
        if($mmonth){
            $data['olddata']=$this->db->query("SELECT sum(`pay`) as pay, sum(`exp`) as exp FROM `mem_pay` WHERE pdate < '$before_date' and `member_id`=$member_id")->row();
            $data['nowdata']=$this->db->query("SELECT * FROM `mem_pay` WHERE pdate BETWEEN '$before_date' and '$after_date' and member_id=$member_id")->result();
            $result=$this->load->view('meal_expense/get_meal_list',$data,true);
            
        }else{
            $result="<h2 class='text-center text-danger'>Please select a month and year</h2>";
        }

        print_r(json_encode($result));
	}

	public function create(){
		/* load helper and library */
		$this->load->helper('form');
		$data['members']=$this->cm->common_select('member_information','id,name,contact');
		$data['page']='meal_expense/create';
		$this->load->view('app',$data);
	}

    public function get_meal(){
        $mmonth=sprintf("%02d", $this->input->get('mmonth'));
        $myear=$this->input->get('myear');
        if($mmonth){
            $data['mmonth']=$mmonth;
            $data['myear']=$myear;
            $data['meal_info']=$this->db->query("SELECT (sum(lunch) + sum(dinner) + SUM(breakfast)) as tmeal,member_id,member_information.name FROM `mem_rec` join member_information on member_information.id=mem_rec.member_id where YEAR(mdate)='$myear' and month(mdate)= '$mmonth' group BY member_id")->result();
            $data['pay_info']=$this->db->query("SELECT sum(pay) as pay,member_id,member_information.name FROM mem_pay join member_information on member_information.id=mem_pay.member_id where YEAR(pdate)='$myear' and month(pdate)= '$mmonth' group BY member_id")->result();
            $result=$this->load->view('meal_expense/get_meal',$data,true);
        }else{
            $result="<h2 class='text-center text-danger'>Please select a month and year</h2>";
        }

        print_r(json_encode($result));
	}

	public function store(){
        $mmonth=$this->input->post('mmonth');
        $myear=$this->input->post('myear');
        $mcost=$this->input->post('mcost');
		$meal_info=$this->db->query("SELECT (sum(lunch) + sum(dinner) + SUM(breakfast)) as tmeal,member_id FROM `mem_rec` where YEAR(mdate)='$myear' and month(mdate)= '$mmonth' group BY member_id")->result();
        $savedata=array();
        if($meal_info){
            foreach($meal_info as $mem){
                $savedata[]=array(
                    'member_id'=>$mem->member_id,
                    'exp'=>($mem->tmeal * $mcost),
                    'pdate'=>date("Y-m-t", strtotime("$myear-$mmonth-01")),
                    'note' => "Exp for ".$mem->tmeal." meal, per meal cost ".$mcost
                );
            }
        }
        if($this->db->insert_batch('mem_pay', $savedata)){
            $this->session->set_flashdata('msg','<b class="text-success">Data saved</b>');
            redirect('meal_exp');
        }else{
            $this->session->set_flashdata('msg','<b class="text-danger">Please Try again</b>');
            $this->load->view('meal_exp/add');
        }
	}

}
