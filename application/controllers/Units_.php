<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Units_ extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Units');
	}

	public function getUnitsGallery()
	{
		$id = $this->input->post('id');
		$data = $this->Units->getUnitsGallery($id);
		$return = '<h5>Unit Gallery</h5>';
		$return .= '<div class="row">';
		foreach ($data as $value) {
			$return .= '<div class="col-lg-4 col-md-4 col-sm-6 mb-3">
						<a href="#" target="_blank" class="my_unit_image"> 
							<img class="img-fluid" src="data:' . $value->mime . ';base64,' . $value->data . '" alt="" width="100%" style="border-radius: 10px">
						</a>
            		</div>';
		}
		$return .= '</div>';

		$return .= '<hr><h5>Ameneties</h5>
					<div class="row">';
		$data = $this->Units->getUnitsAmeneties($id);
		foreach ($data as $value) {
			$return .= '<div class="col-3 mb-3">
							<span class="badge badge-secondary">' . $value->name . ' </span>
						</div>';
		}
		$return .= '</div></div>';
		echo $return;
	}

	public function get_units_gallery()
	{
		$id = $this->input->post('id');
		$data = $this->Units->getUnitsGallery($id);

		echo json_encode($data);
	}
}
