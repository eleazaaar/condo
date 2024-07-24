<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;

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

    public function sign_in()
    {
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('status' => 400, 'icon' => 'warning', 'title' => 'Required All Fields', 'message' => validation_errors()));
            die;
        } else {
            $email = $this->input->post('email', TRUE);
            $password = $this->input->post('password', TRUE);

            if ($this->auth->login($email, $password)) {
                if($this->session->userdata('userlevel')==$this->auth::ADMIN){
                    echo json_encode(array('status' => 200, 'url' => site_url('app')));
                }else{
                    echo json_encode(array('status' => 200, 'url' => site_url('user')));
                }
                die;
            } else {
                echo json_encode(array('status' => 400, 'icon' => 'warning', 'title' => 'Not Match', 'message' => 'Username and Password does not match or does not exists'));
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
        // $this->form_validation->set_rules('password', 'Password', 'required');
        // $this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'required|matches[password]');
        $this->form_validation->set_rules('contact_no', 'Contact Number', 'required|regex_match[/^09\d{9}$/]');

        // if ($this->form_validation->run() == FALSE) {
        //     echo json_encode(array('status' => 400, 'icon' => 'warning', 'title' => 'Invalid Data', 'message' => validation_errors('', '<br>')));
        //     die;
        // }

        extract($this->input->post(NULL,TRUE));

        $data['email'] = $email;
        $data['fname'] = $fname;
        $data['mname'] = $mname;
        $data['lname'] = $lname;
        $data['contact_number'] = $contact_no;
        // $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        $data['user_type'] = 2;

        $res = $this->db->insert('user',$data);
        if ($res) {
            // echo json_encode(array('status' => 200,'icon' => 'success', 'title' => 'Success', 'message' => 'Account created successfully.'));
            // die;

            $message = $this->generatePassword();

            $this->sendActivationEmail($email, $message);
        } else {
            echo json_encode(array('status' => 400,'icon' => 'error', 'title' => 'Error', 'message' => 'Something went wrong while adding.'));
            die;
        }
    }

    public function generatePassword() {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        $password = implode($pass);

        $this->auth->savePassword($password);

        return "Password: $password";
    }

    // public function sendActivationEmail($email, $message) {
    //     $this->load->library('email');

    //     $config = array(
    //         'protocol' => 'smtp', 
    //         'smtp_host' => 'ssl://smtp.googlemail.com', 
    //         'smtp_timeout' => 30,
    //         'smtp_port' => 465, 
    //         'smtp_user' => "azurestaycations@gmail.com", 
    //         'smtp_pass' => "Azure@Admin", 
    //         'charset' => 'utf-8',
    //         'mailtype' => 'html',
    //         'newline' => "\r\n" 
    //     );
        
    //     $subject = 'Activate Account';

    //     $this->email->initialize($config);
    //     $this->email->set_newline("\r\n");
    //     $this->email->set_crlf("\r\n");
    //     $this->email->from('azurestaycations@gmail.com');
    //     $this->email->to($email);
    //     $this->email->subject($subject);
    //     $this->email->message($message);
        
    //     if (!$this->email->send()) {
    //         show_error($this->email->print_debugger());
    //     } else {
    //         return 1;
    //     }
    // }

    public function sendActivationEmail($email, $message) {
        
        $mailer = new PHPMailer(true);
        $mailer->isSMTP();
        $mailer->Host = 'smtp.gmail.com';
        $mailer->SMTPAuth = true;
        $mailer->Username = 'azurestaycations@gmail.com';
        $mailer->Password = 'Azure@Admin';
        $mailer->SMTPSecure = 'tls';
        $mailer->Port = 587;
        $mailer->setFrom('azurestaycations@gmail.com');
        $mailer->addAddress($email);
        $mailer->isHTML(true);
        $mailer->Subject = 'Activate Account';
        $mailer->Body = $message;

        if (!$mailer->send()) {
            show_error($mailer->ErrorInfo);
        } else {
            return 'Success';
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        unset($_SESSION);
        redirect('login');
    }
}
