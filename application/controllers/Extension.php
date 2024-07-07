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
}
