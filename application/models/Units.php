<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Units extends CI_Model {

	public function index() {
		
	}

	public function get_checkout_book($userid){
		$where = $userid ? "AND s.user_id = '$userid'" : '';
		$query = $this->db->query("
			SELECT a.*, s.from_date, s.id as schedule_id, s.to_date,s.total_amount, u.rate, u.remarks as f_remarks, u.pros, u.cons
			FROM `accomodation` a
			INNER JOIN `schedule` s on a.id= s.accomodation_id
			LEFT JOIN `unit_feedbak` u ON s.id=u.schedule_id
			WHERE s.status='Check-Out' $where
		");
		return $query->result();
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
