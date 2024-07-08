<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('auth');

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

        $data['ex_js'] = 'js/admin/amenity.js.php'; 
        $this->site($data,'user/schedule');
    }

    private function site($data,$page)
    {
        $datas['url'] = $page;
        $datas['data'] = $data;
        $this->load->view('layout/user', $datas);
    }
}
