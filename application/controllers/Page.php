<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('auth');
        
        if ($this->auth->is_login() && $this->auth->isUserVerified($this->session->userdata('email'))) {
			if ($this->session->userdata('userlevel') == 1) {
				redirect('app');
			} else if ( $this->session->userdata('userlevel') == 2) {
				redirect('User');
			}
        }
	}

	public function index() {
		$this->load->view('index');
	}

	public function login() {
		$this->load->view('login');
	}

	public function signup() {
		$this->load->view('signup');
	}

	public function verify_user(){
		$this->load->view('verify_user');
	}

	public function home() {
		$this->load->view('admin/dashboard');
	}

	public function dashboard() {
		$this->load->view('admin/dashboard');
	}

	public function units() {
		$this->load->view('admin/units');
	}

	private function site($data,$page){
    $datas['url'] = $page;
    $datas['data'] = $data;
    $this->load->view('layout/guest', $datas);
  }
	public function amenities() {
		$this->load->view('admin/amenity');
	}

}
