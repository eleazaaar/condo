<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('AuthenticationModel');
    }

	public function signUp() {
		$data = $this->input->post('data') ? $this->input->post('data') : $this->input->get('data');

        if (empty($data['fname'])) {
            echo json_encode(['code' => 0, 'icon' => 'warning', 'title' => 'Warning!', 'html' => 'First name is required.']); return;
        }    
        if (empty($data['lname'])) { 
            echo json_encode(['code' => 0, 'icon' => 'warning', 'title' => 'Warning!', 'html' => 'Last name is required.']); return;
        }
        if (empty($data['email'])) {
            echo json_encode(['code' => 0, 'icon' => 'warning', 'title' => 'Warning!', 'html' => 'Email is required.']); return;
        }
        if (empty($data['mobile'])) { 
            echo json_encode(['code' => 0, 'icon' => 'warning', 'title' => 'Warning!', 'html' => 'Phone is required.']); return;
        }
        if (empty($data['password'])) {
            echo json_encode(['code' => 0, 'icon' => 'warning', 'title' => 'Warning!', 'html' => 'Password is required.']); return;
        }
        
        $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
        
        if ($this->AuthenticationModel->signUpUser($data)) {
            echo json_encode(['code' => 1, 'icon' => 'success', 'title' => 'Success!', 'html' => 'Account created successfully.']);
        } else {
            echo json_encode(['code' => 0, 'icon' => 'error', 'title' => 'Error!', 'html' => 'Something went wrong.']);
        }
	}

    public function login() {
        $data = $this->input->post('data') ? $this->input->post('data') : $this->input->get('data');

        if (empty($data['email'])) {
            echo json_encode(['code' => 0, 'icon' => 'warning', 'title' => 'Warning!', 'html' => 'Email is required.']); return;
        }
        if (empty($data['password'])) {
            echo json_encode(['code' => 0, 'icon' => 'warning', 'title' => 'Warning!', 'html' => 'Password is required.']); return;
        }
        
        $data = $this->AuthenticationModel->loginUser($data);
        if ($data) {
            // Set session
            $this->session->set_userdata('user', $data);

            echo json_encode(['code' => 1, 'icon' => 'success', 'title' => 'Success!', 'html' => 'Login successfully.']);
        } else {
            echo json_encode(['code' => 0, 'icon' => 'error', 'title' => 'Error!', 'html' => 'Invalid email or password.']);
        }
    }
}
