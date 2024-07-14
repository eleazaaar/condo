<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth');
        $this->load->model('units');
        $this->load->model('ssp_model');

        if (!$this->auth->is_login() || $this->session->userdata('userlevel') != $this->auth::USER) {
            redirect('login');
        }
    }
    public function index()
    {
        $this->your_book();
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

    public function preview_schedue_details(){
        $this->form_validation->set_rules('unit_id', 'ID', 'trim|required|numeric');
        $this->form_validation->set_rules('from', 'From Date', 'trim|required|regex_match[/^\d{4}-\d{2}-\d{2}$/]');
        $this->form_validation->set_rules('to', 'To Date', 'trim|required|regex_match[/^\d{4}-\d{2}-\d{2}$/]');

        if ($this->form_validation->run() == FALSE) {
            // echo json_encode(array('status' => 400, 'icon' => 'warning', 'title' => 'Invalid Data', 'message' => 'Invalid Data Entry!<br>' . validation_errors('', '<br>')));
            $this->site([],'layout/invalid_data_entry');
            return;
        }

        extract($this->input->post(NULL,TRUE));

        $query = $this->db->get('accomodation',['id'=>$unit_id]);
        $data = $query->row_array();
        $data['from'] = $from;
        $data['to'] = $to;
        $data['ex_js'] = 'js/user/preview_schedule_details.js.php'; 
        $this->site($data,'user/preview_schedule_details');
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
        
        $data = [];
        if ($this->db->affected_rows()) {
            $this->site($data,'user/schedule_applied');
        } else {
            $this->site($data,'layout/error_occured');
        }
    }

    public function your_book(){
        $data['ex_js'] = 'js/user/book.js.php'; 
        $this->site($data,'user/book');
    }

    public function ssp_book(){
        echo $this->ssp_model->book();
    }

    private function site($data,$page)
    {
        $datas['url'] = $page;
        $datas['data'] = $data;
        $this->load->view('layout/user', $datas);
    }
}
