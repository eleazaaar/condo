<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AuthenticationModel extends CI_Model {

	public function signUpUser($data) {
        $data['user_type'] = 2;
        $data['contact_number'] = $data['mobile'];
        unset($data['mobile']);
		return $this->db->insert('user', $data);
	}

    public function loginUser($data) {
        $this->db->where('email', $data['email']);
        $query = $this->db->get('user');
        if ($query->row()) {
            if (password_verify($data['password'], $query->row()->password)) {
                return $query->row();
            } else {
                return false;
            }
        }
    }
}
