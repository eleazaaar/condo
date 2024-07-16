<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Units_ extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Units');
	}

	public function getUnitsGallery() {
		$id = $this->input->post('id');
		$data = $this->Units->getUnitsGallery($id);
		echo '<div class="row">';
		foreach ($data as $value) {
		echo '<div class="col-3 mb-3">
               <a href="data:'.$value->mime.';base64,'.$value->data.'" target="_blank"> 
               <img class="img-fluid" src="data:'.$value->mime.';base64,'.$value->data.'" alt="" width="100%" style="border-radius: 10px">
               </a>
            </div>';
		}
		echo '</div>';
	}
}
