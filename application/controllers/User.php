<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('auth');
        $this->load->model('units');

        // if (!$this->auth->is_login()) {
        //     $this->load->view('login');return;
        // }
    }
    public function index()
    {
        # dashboard
        $this->site([],'admin/dashboard');
    }

    public function schedule(){

        $data['ex_js'] = 'js/user/schedule.js.php'; 
        $this->site($data,'user/schedule');
    }

    public function get_available_units(){
        $from = $this->input->post('from',TRUE);
        $to = $this->input->post('to',TRUE);
        $units = $this->units->get_available_units($from,$to);
        echo json_encode($units);
    }

    private function site($data,$page)
    {
        $datas['url'] = $page;
        $datas['data'] = $data;
        $this->load->view('layout/user', $datas);
    }
}
