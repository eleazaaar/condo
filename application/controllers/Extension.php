<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PHPMailer\PHPMailer\PHPMailer;

class Extension extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	public function get_amenities_select2(){
		$query = $this->db->get('amenity');
		$amenities = [];

		foreach($query->result() as $row){
			$amenities[] = ['id'=>$row->id, 'text'=>$row->name];
		}

		echo json_encode($amenities);
	}

	public function send_inquiry() {

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('name', 'Your Name', 'required|min_length[5]|max_length[100]');
		$this->form_validation->set_rules('subject', 'Subject', 'required|min_length[5]|max_length[500]');
		$this->form_validation->set_rules('message', 'Message', 'required|min_length[5]|max_length[500]');

		if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('status' => 400, 'icon' => 'warning', 'title' => 'Invalid Data', 'message' => validation_errors('', '<br>')));
            die;
        }

		extract($this->input->post(NULL, TRUE));

		if ($this->sendEmailInquiry($email, $name, $message, $subject)) {
			echo json_encode(array('status'=> 200,'icon'=> 'success', 'title' => 'Success', 'message' => 'Inquiry sent successfully.'));
		} else {
			echo json_encode(array('status'=> 400,'icon'=> 'error', 'title' => 'Error', 'message' => 'Something went wrong.'));
		}
	}

	public function sendEmailInquiry($email, $name, $message, $subject)
    {
        $mailer = new PHPMailer(true);
        $mailer->isSMTP();
        $mailer->Host = 'smtp.gmail.com';
        $mailer->SMTPAuth = true;
        $mailer->Username = 'azurestaycations@gmail.com';
        $mailer->Password = 'spohodhubtzlzdti';
        $mailer->SMTPSecure = 'tls';
        $mailer->Port = 587;
        $mailer->setFrom($email);
        $mailer->addAddress('azurestaycations@gmail.com');
        $mailer->isHTML(true);
        $mailer->Subject = $subject . ' | ' . $name . ' - ' . $email;
        $mailer->Body = $message;

        if (!$mailer->send()) {
            show_error($mailer->ErrorInfo);
            return 0;
        } else {
            return 1;
        }
    }
}
