<?php
defined('BASEPATH') or exit('No direct script access allowed');

class App extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('user')) {
			redirect('login');
		} 
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

    private function site($data,$page)
    {
        $datas['url'] = $page;
        $datas['data'] = $data;
        $this->load->view('layout/main', $datas);
    }
}
