<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_units($id){
        $res = $this->db
        ->where('id',$id)
        ->get('accomodation');
        return $res->row();
    }

    public function save_units($data){
        return $this->db->insert('accomodation',$data);
    }

    public function update_units($id, $data){
        return $this->db
        ->set($data)
        ->where('id',$id)
        ->update('accomodation');
    }
}
