<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function save_units($data){
        return $this->db->insert('accomodation',$data);
    }
}
