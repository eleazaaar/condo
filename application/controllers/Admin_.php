<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_ extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('auth');
        // if ($this->auth->is_login() == false) {
        //     redirect('app');
        // }

        // $this->load->model('admin');
        $this->load->model('ssp_model');
    }

    public function add_user()
    {
        $this->form_validation->set_rules(
            'username',
            'Username',
            'required|min_length[5]|max_length[12]|is_unique[user_account.username]',
            array(
                'required'      => 'You have not provided %s.',
                'is_unique'     => 'This %s already exists.'
            )
        );
        $this->form_validation->set_rules('name', 'Name', 'required|min_length[5]|max_length[100]');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required|matches[password]');
        $this->form_validation->set_rules('is_admin', 'Is Admin', 'required|in_list[1,0]');
        
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('status' => 400, 'icon' => 'warning', 'title' => 'Invalid Data', 'message' => 'Invalid Data Entry!<br>'.validation_errors('','<br>')));
            die;
        }

        $data['username'] = $this->input->post('username', TRUE);
        $data['name'] = $this->input->post('name', TRUE);
        $data['password'] = password_hash($this->input->post('password', TRUE), PASSWORD_DEFAULT);
        $data['is_admin'] = $this->input->post('is_admin', TRUE);
        $data['added_by'] = $this->session->userdata('username');

        $res = $this->admin->save_user($data);
        if ($res) {
            echo json_encode(array('icon' => 'success', 'title' => 'Success', 'message' => 'Added Successfully'));
            die;
        } else {
            echo json_encode(array('icon' => 'error', 'title' => 'Error', 'message' => 'Something went wrong while adding'));
            die;
        }
    }

    public function ssp_units()
    {
        echo $this->ssp_model->units();
    }
}
