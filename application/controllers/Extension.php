<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Extension extends CI_Controller {

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
	}
}
