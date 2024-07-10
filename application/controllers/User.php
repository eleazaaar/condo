<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // $this->load->model('auth');
        $this->load->model('units');

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

        $data['ex_js'] = 'js/user/schedule.js.php'; 
        $this->site($data,'user/schedule');
    }

    public function get_available_units(){
        $from = $this->input->post('from',TRUE);
        $to = $this->input->post('to',TRUE);
        $units = $this->units->get_available_units($from,$to);
        echo json_encode($units);
    }

    public function save_schedule(){
        $this->form_validation->set_rules('unit_id', 'ID', 'trim|required|numeric');
        $this->form_validation->set_rules('from', 'From Date', 'trim|required|regex_match[/^\d{4}-\d{2}-\d{2}$/]');
        $this->form_validation->set_rules('to', 'To Date', 'trim|required|regex_match[/^\d{4}-\d{2}-\d{2}$/]');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('status' => 400, 'icon' => 'warning', 'title' => 'Invalid Data', 'message' => 'Invalid Data Entry!<br>' . validation_errors('', '<br>')));
            die;
        }

        extract($this->input->post(NULL,TRUE));

        $data = [
            'user_id' => 0,
            'accomodation_id'=>$unit_id,
            'from_date'=>$from,
            'to_date'=>$to
        ];
        $this->db->insert('schedule',$data);
        
        if ($this->db->affected_rows()) {
            echo json_encode(array('icon' => 'success', 'title' => 'Success', 'message' => 'Save Successfully'));
            die;
        } else {
            echo json_encode(array('icon' => 'error', 'title' => 'Error', 'message' => 'Something went wrong'));
            die;
        }
    }

    private function site($data,$page)
    {
        $datas['url'] = $page;
        $datas['data'] = $data;
        $this->load->view('layout/user', $datas);
    }
}
