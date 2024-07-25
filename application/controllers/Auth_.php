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
                if (!$this->auth->isUserVerified($email)) {
                    $this->session->set_userdata('your_email', $email);
                    echo json_encode(array('status' => 200, 'url' => site_url('page/verify_user')));
                } else if ($this->session->userdata('userlevel') == $this->auth::ADMIN) {
                    echo json_encode(array('status' => 200, 'url' => site_url('app')));
                } else {
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
        $this->form_validation->set_rules('contact_no', 'Contact Number', 'required|regex_match[/^09\d{9}$/]');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('status' => 400, 'icon' => 'warning', 'title' => 'Invalid Data', 'message' => validation_errors('', '<br>')));
            die;
        }

        extract($this->input->post(NULL, TRUE));

        $password = $this->generatePassword();

        $data['email'] = $email;
        $data['fname'] = $fname;
        $data['mname'] = $mname;
        $data['lname'] = $lname;
        $data['contact_number'] = $contact_no;
        $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        $data['user_type'] = 2;

        $account['code'] = "Password: $password";

        $message = $this->load->view('activate_account', $account, TRUE);

        $res = $this->db->insert('user', $data);
        if ($res) {
            if ($this->sendActivationEmail($email, $message)) {
                echo json_encode(array('status' => 200, 'icon' => 'success', 'title' => 'Success', 'message' => 'Check your email to activate your account.'));
                die;
            }
        } else {
            echo json_encode(array('status' => 400, 'icon' => 'error', 'title' => 'Error', 'message' => 'Something went wrong while adding.'));
            die;
        }
    }

    public function verify_user()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('new_password', 'New Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[new_password]');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('status' => 400, 'icon' => 'warning', 'title' => 'Invalid Data', 'message' => validation_errors('', '<br>')));
            die;
        }

        extract($this->input->post(NULL, TRUE));

        if(!$this->auth->login($email, $password)){
            echo json_encode(array('status' => 400, 'icon' => 'error', 'title' => 'Credentials do not match', 'message' => ''));
            die;
        }
        $new_password = password_hash($new_password, PASSWORD_DEFAULT);
        $res = $this->db->query("
            UPDATE user SET 
            is_verified=NOW(),
            password='$new_password'
            WHERE email='$email'
        ");
        if ($res) {
            echo json_encode(array('status' => 200, 'url'=>'login'));
            die;
        } else {
            echo json_encode(array('status' => 400, 'icon' => 'error', 'title' => 'Error', 'message' => 'Something went wrong while adding.'));
            die;
        }
    }

    public function generatePassword()
    {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        $password = implode($pass);

        $this->auth->savePassword($password);

        return $password;
    }

    public function sendActivationEmail($email, $message)
    {
        $mailer = new PHPMailer(true);
        $mailer->isSMTP();
        $mailer->Host = 'smtp.gmail.com';
        $mailer->SMTPAuth = true;
        $mailer->Username = 'azurestaycations@gmail.com';
        $mailer->Password = 'spohodhubtzlzdti';
        $mailer->SMTPSecure = 'tls';
        $mailer->Port = 587;
        $mailer->setFrom('azurestaycations@gmail.com');
        $mailer->addAddress($email);
        $mailer->isHTML(true);
        $mailer->Subject = 'Activate Account';
        $mailer->Body = $message;

        if (!$mailer->send()) {
            show_error($mailer->ErrorInfo);
            return 0;
        } else {
            return 1;
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        unset($_SESSION);
        redirect('login');
    }
}
