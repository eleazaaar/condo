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

    public function book_feedback()
    {
        $data['ex_js'] = 'js/user/book_feedback.js.php';
        $this->site($data, 'user/book_feedback');
    }

    public function write_feedback()
    {
        $this->form_validation->set_rules('schedule_id', 'Schedule ID', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            #redirect
            $this->plain_site(['errors' => validation_errors()], 'errors/error_422');
            return;
        }

        extract($this->input->post(NULL, TRUE));
        $query = $this->db->query("
            SELECT a.*,s.from_date,s.to_date,s.total_amount
            ,g.data as img_data, g.mime
            FROM schedule s 
            INNER JOIN accomodation a ON s.accomodation_id=a.id
            LEFT JOIN gallery g ON a.id=g.what_id AND g.what='units_thumbnail'
            WHERE s.id='$schedule_id'
        ");
        $data['ex_js'] = 'js/user/write_feedback.js.php';
        $data['schedule_id'] = $schedule_id;
        $data['data'] = $query->result();
        $this->site($data, 'user/write_feedback');
    }

    public function save_feedback()
    {
        $this->form_validation->set_rules('schedule_id', 'Schedule ID', 'required|numeric');
        $this->form_validation->set_rules('rating', 'Rating', 'required|numeric');
        $this->form_validation->set_rules('pros', 'Pros', 'required');
        $this->form_validation->set_rules('cons', 'Cons', 'min_length[0]');

        if ($this->form_validation->run() == FALSE) {
            $data = array('status' => 400, 'icon' => 'warning', 'title' => 'Invalid Data', 'message' => 'Invalid Data Entry!<br>' . validation_errors('', '<br>'));
            $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
            die;
        }
        extract($this->input->post(NULL,TRUE));

        $res = $this->db->insert('unit_feedbak',
        [
            'schedule_id' => $schedule_id,
            'pros' => $pros,
            'cons' => $cons,
            'rate' => $rating,
        ]);

        $data = [];
        if($res){
            $data = array('status' => 200, 'icon' => 'success', 'title' => 'Thank you for your feedback', 'message' => '','url'=>site_url('user/book_feedback'));            
        }else{
            $message = implode('. ', $this->db->error());
            $data = array('status' => 400, 'icon' => 'error', 'title' => 'Error Occured', 'message' => $message);            
        }

        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($data));
    }

    public function get_checkout_book()
    {
        $data = $this->units->get_checkout_book($this->session->userdata('userid'));
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }

    public function schedule()
    {

        $data['ex_js'] = 'js/user/schedule.js.php';
        $this->site($data, 'user/schedule');
    }

    public function get_available_units()
    {
        $from = $this->input->post('from', TRUE);
        $to = $this->input->post('to', TRUE);
        $units = $this->units->get_available_units($from, $to);
        echo json_encode($units);
    }

    public function preview_schedue_details()
    {
        $this->form_validation->set_rules('unit_id', 'ID', 'trim|required|numeric');
        $this->form_validation->set_rules('from', 'From Date', 'trim|required|regex_match[/^\d{4}-\d{2}-\d{2}$/]');
        $this->form_validation->set_rules('to', 'To Date', 'trim|required|regex_match[/^\d{4}-\d{2}-\d{2}$/]');

        if ($this->form_validation->run() == FALSE) {
            // echo json_encode(array('status' => 400, 'icon' => 'warning', 'title' => 'Invalid Data', 'message' => 'Invalid Data Entry!<br>' . validation_errors('', '<br>')));
            $this->site([], 'layout/invalid_data_entry');
            return;
        }

        extract($this->input->post(NULL, TRUE));

        $query = $this->db
            ->where(['id' => $unit_id])
            ->get('accomodation');
        $data = $query->row_array();
        $data['from'] = $from;
        $data['to'] = $to;

        $data['ex_js'] = 'js/user/preview_schedule_details.js.php';
        $this->site($data, 'user/preview_schedule_details');
    }

    public function save_schedule()
    {
        $_POST['userid'] = $this->session->userdata('userid');
        $this->form_validation->set_rules('userid', 'USER ID', 'trim|required|numeric');
        $this->form_validation->set_rules('unit_id', 'ID', 'trim|required|numeric');
        $this->form_validation->set_rules('from', 'From Date', 'trim|required|regex_match[/^\d{4}-\d{2}-\d{2}$/]');
        $this->form_validation->set_rules('to', 'To Date', 'trim|required|regex_match[/^\d{4}-\d{2}-\d{2}$/]');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('status' => 400, 'icon' => 'warning', 'title' => 'Invalid Data', 'message' => 'Invalid Data Entry!<br>' . validation_errors('', '<br>')));
            die;
        }

        extract($this->input->post(NULL, TRUE));

        $data = [
            'user_id' => $userid,
            'accomodation_id' => $unit_id,
            'from_date' => $from,
            'to_date' => $to,
            'status' => 'Pending'
        ];
        $this->db->insert('schedule', $data);

        $data = [];
        if ($this->db->affected_rows()) {
            $this->site($data, 'user/schedule_applied');
        } else {
            $this->site($data, 'layout/error_occured');
        }
    }

    public function your_book()
    {
        $data['ex_js'] = 'js/user/book.js.php';
        $this->site($data, 'user/book');
    }

    public function ssp_book()
    {
        echo $this->ssp_model->book();
    }

    private function site($data, $page)
    {
        $datas['url'] = $page;
        $datas['data'] = $data;
        $this->load->view('layout/user', $datas);
    }

    private function plain_site($data, $page)
    {
        $datas['url'] = $page;
        $datas['data'] = $data;
        $this->load->view('layout/plain', $datas);
    }
}
