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

    public function amenity(){

        $data['ex_js'] = 'js/admin/amenity.js.php'; 
        $this->site($data,'admin/amenity');
    }

    public function units(){

        $data['ex_js'] = 'js/admin/units.js.php'; 
        $this->site($data,'admin/units');
    }

    public function book(){

        $data['ex_js'] = 'js/admin/book.js.php'; 
        $this->site($data,'admin/book');
    }

    private function site($data,$page)
    {
        $datas['url'] = $page;
        $datas['data'] = $data;
        $this->load->view('layout/main', $datas);
    }
}
