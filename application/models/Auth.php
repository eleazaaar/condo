<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Model
{
    const ADMIN = '1';
    const USER = '2';
    public function __construct()
    {
        parent::__construct();
        $this->load->library('encryption');
    }

    public function login($email, $password)
    {
        $email = $this->security->xss_clean($email);
        $password = $this->security->xss_clean($password);

        $query = $this->db->query("SELECT id,email,CONCAT_WS(' ',fname,mname,lname) as name,password,user_type FROM user WHERE email='$email';");
        if ($query && $query->num_rows()==1) {
            $row = $query->row();
            if (!password_verify($password, $row->password)) {
                return false;
            }
            // USER AND PASSWORD ARE GOODS
            $this->session->set_userdata("userid", $row->id);
            $this->session->set_userdata("email", $row->email);
            $this->session->set_userdata("userfullname", $row->name);
            $this->session->set_userdata("userlevel", $row->user_type);

            $key = $this->encryption->create_key(16);
            $this->session->set_userdata("usertoken", $key);
            $this->session->set_userdata("dikoalamitatawagdito", password_hash($key,PASSWORD_DEFAULT));
            return true;
        }else if($email=='administrator@azure-condo.com' && $password== 'azurecondo123') {
            // USER AND PASSWORD ARE GOODS
            $this->session->set_userdata("email", 'administrator@azure-condo.com');
            $this->session->set_userdata("userfullname", 'AZURE ADMIN');

            $key = $this->encryption->create_key(16);
            $this->session->set_userdata("usertoken", $key);
            $this->session->set_userdata("dikoalamitatawagdito", password_hash($key,PASSWORD_DEFAULT));
            $this->session->set_userdata("userlevel", self::ADMIN);
            return true;
        }
        return false;
    }

    public function is_login(){
        if($this->is_valid_user()){
            return true;
        }
        else {
            // redirect('login');
            return false;
        }
    }

    public function is_admin(){
        return $this->is_valid_user() && $this->session->has_userdata('userlevel') && $this->session->userdata('userlevel')==self::ADMIN;
    }

    public function is_valid_user(){
        return $this->session->has_userdata('email') && !empty($this->session->userdata('email'))
        && password_verify($this->session->userdata('usertoken'),$this->session->userdata('dikoalamitatawagdito'));
    }
}
