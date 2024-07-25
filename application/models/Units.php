<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Units extends CI_Model {

	public function index() {
		
	}

	public function get_checkout_book($userid){
		$query = $this->db->query("
			SELECT 
		");
	}

	public function get_available_units($from, $to){
		$query = $this->db->query("
			SELECT a.*, g.data AS unit_thumbnail,g.mime
			FROM accomodation a
			LEFT JOIN gallery g ON a.id=g.what_id AND g.what='units_thumbnail'
			WHERE 
			NOT EXISTS
				(SELECT 1 FROM schedule s WHERE a.id=s.accomodation_id 
				AND (
					'$from' BETWEEN s.from_date AND DATE_SUB(s.to_date, INTERVAL 1 DAY)
					OR '$to' BETWEEN s.from_date AND DATE_SUB(s.to_date, INTERVAL 1 DAY))
				)
		");
		if($query){
			return $query->result();
		}
		return [];
	}

	public function getUnitsGallery($id) {
		return $this->db->query("SELECT * FROM gallery WHERE what_id = '$id' AND what = 'units'")->result();
	}

	public function getUnitsAmeneties($id) {
		return $this->db->query("SELECT * FROM amenity WHERE id IN (SELECT amenity_id FROM accomodation_amenity WHERE accomodation_id = '$id')")->result();
	}
}
