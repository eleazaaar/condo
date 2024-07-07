<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    /**
     * AMENITY------------------------------------------------
     */

    public function save_amenity($data){
        return $this->db->insert('amenity',$data);
    }

    public function update_amenity($id, $data){
        return $this->db
        ->set($data)
        ->where('id',$id)
        ->update('amenity');
    }

    /**
     * END OF UNITS-----------------------------------------
     */

    /**
     * UNITS------------------------------------------------
     */
    public function get_units($id){
        $res = $this->db
        ->where('id',$id)
        ->get('accomodation');
        return $res->row();
    }

    public function save_units($data){
        $this->db->trans_begin();
        $this->db->insert('accomodation',$data['units']);
        $id = $this->db->insert_id();
        foreach($data['amenities'] as $a){
            $this->db->insert('accomodation_amenity',[
                'accomodation_id'=>$id,
                'amenity_id'=>$a
            ]);
        }
        if ($this->db->trans_status() === FALSE){
            $this->db->trans_rollback();return false;
        }else{
            $this->db->trans_commit();return true;
        }
    }

    public function update_units($id, $data){
        return $this->db
        ->set($data)
        ->where('id',$id)
        ->update('accomodation');
    }

    /**
     * END OF UNITS-----------------------------------------
     */
}
