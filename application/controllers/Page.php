<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	public function index()
	{
		$this->load->view('index');
	}

    public function admin() {
        $this->load->view('admin/index');
    }

	public function dashboard() {
		$this->load->view('admin/dashboard');
	}

	public function units() {
		$this->load->view('admin/units');
	}
}
