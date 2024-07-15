<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	public function __construct() {
		parent::__construct();
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

	public function schedule() {
		$this->site([],'schedule');
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
