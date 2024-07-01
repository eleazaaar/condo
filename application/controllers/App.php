<?php
defined('BASEPATH') or exit('No direct script access allowed');

class App extends CI_Controller
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

    public function site($data,$page)
    {
        $data['url'] = $page;
        $this->load->view('layout/main', $data);
    }
}
