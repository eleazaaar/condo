<?php
defined('BASEPATH') or exit('No direct script access allowed');

class App extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth');
        
        if (!$this->auth->is_login() || $this->session->userdata('userlevel')!=$this->auth::ADMIN) {
            // die( $this->session->userdata('userlevel'));
            redirect('login');
        }
    }
    public function index()
    {
        $data['ex_js'] = 'js/admin/dashboard.js.php';
        $this->site($data, 'admin/dashboard');
    }

    public function amenity()
    {

        $data['ex_js'] = 'js/admin/amenity.js.php';
        $this->site($data, 'admin/amenity');
    }

    public function users()
    {

        $data['ex_js'] = 'js/admin/users.js.php';
        $this->site($data, 'admin/users');
    }

    public function units()
    {

        $data['ex_js'] = 'js/admin/units.js.php';
        $this->site($data, 'admin/units');
    }

    public function book()
    {

        $data['ex_js'] = 'js/admin/book.js.php';
        $this->site($data, 'admin/book');
    }

    private function site($data, $page)
    {
        $datas['url'] = $page;
        $datas['data'] = $data;
        $this->load->view('layout/main', $datas);
    }

    public function get_user_data($user='') {
        return $this->db->get_where('user', array('id'=> $user))->row_array();
    }

    public function my_profile()
    {
        $user = $this->session->userdata('userid');
        $data['datas'] = $this->get_user_data($user);
        $data['ex_js'] = 'js/my_profile.js.php';
        $this->site($data, 'layout/my_profile');
    }

    public function is_email_unique($email, $user_id) {
        $query = $this->db->where(array('email'=>$email, 'id !=' => $user_id))
                    ->get('user');
        
        return $query->num_rows() === 0;
    }

    public function update_profile()
    {
        if (!$this->is_email_unique($this->input->post('email'), $this->session->userdata('userid'))) {
            $this->form_validation->set_rules(
                'email',
                'Email',
                'required|valid_email|is_unique[user.email]',
                array(
                    'required'      => 'You have not provided %s.',
                    'is_unique'     => 'This %s already exists.'
                )
            );
        }

        $this->form_validation->set_rules('fname', 'First Name', 'required|min_length[5]|max_length[100]');
        $this->form_validation->set_rules('mname', 'Middle Name', 'regex_match[/^.*$/]');
        $this->form_validation->set_rules('lname', 'Last Name', 'required|min_length[5]|max_length[100]');
        $this->form_validation->set_rules('contact_number', 'Contact Number', 'required|regex_match[/^09\d{9}$/]');

        if ($_POST['password']) {
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required|matches[password]');
        }

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('status' => 400, 'icon' => 'warning', 'title' => 'Invalid Data', 'message' => validation_errors('', '<br>')));
            die;
        }

        extract($this->input->post(NULL, TRUE));
        
        $data = [
            'fname' => $fname,
            'mname' => $lname,
            'lname' => $mname,
            'email' => $email,
            'contact_number' => $contact_number
        ];

        if ($password) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }
        
        $sql = $this->db->set($data)
                        ->where('id', $this->session->userdata('userid'))
                        ->update('user');

        if ($sql) {
            echo json_encode(array('status'=> 200,'icon'=> 'success','title'=> 'Success','message'=> 'Update Successfully'));
        } else {
            echo json_encode(array('status'=> 400, 'icon'=> 'error','title'=> 'Error','message'=> 'Failed To Update'));
        }
    }
}
