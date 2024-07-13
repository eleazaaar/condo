<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_ extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth');
    }

    public function login()
    {
        if ($this->auth->is_valid_user()) {
            redirect('app');
        } else {
            $this->load->view('auth/login');
        }
    }

    public function loggedin()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('status' => 400, 'icon' => 'warning', 'title' => 'Required All Fields', 'message' => validation_errors()));
            die;
        } else {
            $username = $this->input->post('username', TRUE);
            $password = $this->input->post('password', TRUE);

            if ($this->auth->login($username, $password)) {
                echo json_encode(array('status' => 200, 'url' => site_url('app')));
                die;
            } else {
                echo json_encode(array('status' => 400, 'icon' => 'warning', 'title' => 'Not Match', 'message' => 'Username and Password does not match'));
                die;
            }
        }
    }

    public function sign_up()
    {
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|valid_email|is_unique[user.email]',
            array(
                'required'      => 'You have not provided %s.',
                'is_unique'     => 'This %s already exists.'
            )
        );
        $this->form_validation->set_rules('fname', 'First Name', 'required|min_length[5]|max_length[100]');
        $this->form_validation->set_rules('mname', 'Middle Name', 'regex_match[/^.*$/]');
        $this->form_validation->set_rules('lname', 'Last Name', 'required|min_length[5]|max_length[100]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required|matches[password]');
        $this->form_validation->set_rules('contact_no', 'Contact Number', 'required|regex_match[/^09\d{9}$/]');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('status' => 400, 'icon' => 'warning', 'title' => 'Invalid Data', 'message' => validation_errors('', '<br>')));
            die;
        }

        extract($this->input->post(NULL,TRUE));

        $data['email'] = $email;
        $data['fname'] = $fname;
        $data['mname'] = $mname;
        $data['lname'] = $lname;
        $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        $data['user_type'] = 1;

        $res = $this->db->insert('user',$data);
        if ($res) {
            echo json_encode(array('status' => 200,'icon' => 'success', 'title' => 'Success', 'message' => 'Account created successfully.'));
            die;
        } else {
            echo json_encode(array('status' => 400,'icon' => 'error', 'title' => 'Error', 'message' => 'Something went wrong while adding.'));
            die;
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        unset($_SESSION);
        redirect('login');
    }
}
