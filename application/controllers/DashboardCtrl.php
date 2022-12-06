<?php
defined('BASEPATH') OR exit ('No direct script access allowed');
class DashboardCtrl extends CI_Controller {
    function __construct() {
        parent::__construct();
        if(!$this->session->get_userdata()['ud']) {
            redirect('login');
        }
    }
    public function index()
    {
        $data['page']="dashboard";
        $this->load->view('app',$data);
    }
}