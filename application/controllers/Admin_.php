<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_ extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth');
        if ($this->auth->is_login() == false || $this->session->userdata('userlevel') != $this->auth::ADMIN) {
            redirect('login');
        }

        $this->load->model('admin');
        $this->load->model('ssp_model');
    }

    /**
     * AMENITY-----------------------------------------------
     */
    public function save_amenity()
    {
        if (isset($_POST['id'])) {
            $this->form_validation->set_rules('id', 'ID', 'numeric');
        }

        $this->form_validation->set_rules('name', 'Name', 'required|min_length[3]');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('status' => 400, 'icon' => 'warning', 'title' => 'Invalid Data', 'message' => 'Invalid Data Entry!<br>' . validation_errors('', '<br>')));
            die;
        }

        $data['name'] = $this->input->post('name', TRUE);

        if (isset($_POST['id']) && !empty($_POST['id'])) {
            $id = $this->input->post('id', TRUE);
            $res = $this->admin->update_amenity($id, $data);
        } else {
            $res = $this->admin->save_amenity($data);
        }
        if ($res) {
            echo json_encode(array('icon' => 'success', 'title' => 'Success', 'message' => 'Save Successfully'));
            die;
        } else {
            echo json_encode(array('icon' => 'error', 'title' => 'Error', 'message' => 'Something went wrong'));
            die;
        }
    }

    public function ssp_amenity()
    {
        echo $this->ssp_model->amenity();
    }

    /**
     * END OF AMENITY-----------------------------------
     */

    /**
     * ----------------------UNITS
     */

    public function get_units()
    {
        $this->form_validation->set_rules('id', 'ID', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('status' => 400, 'icon' => 'warning', 'title' => 'Invalid Data', 'message' => 'Invalid Data Entry!<br>' . validation_errors('', '<br>')));
            die;
        }

        $id = $this->input->post('id');

        $res = $this->admin->get_units($id);
        if ($res) {
            echo json_encode(array('status' => 200, 'data' => $res));
            die;
        } else {
            echo json_encode(array('status' => 400, 'icon' => 'error', 'title' => 'Error', 'message' => 'Something went wrong while adding'));
            die;
        }
    }

    public function save_units()
    {
        $datas = urldecode($this->input->post('data'));
        parse_str($datas, $datas);
        $this->form_validation->set_data($datas);

        if (isset($datas['unit_id'])) {
            $this->form_validation->set_rules('unit_id', 'ID', 'numeric');
        }

        $this->form_validation->set_rules('name', 'Name', 'required|min_length[5]');
        $this->form_validation->set_rules('description', 'Description', 'required|min_length[5]');
        $this->form_validation->set_rules('room_no', 'Room Number', 'required');
        $this->form_validation->set_rules('floor_no', 'Floor Number', 'required|numeric');
        $this->form_validation->set_rules('floor_size', 'Floor Size', 'required|numeric');
        $this->form_validation->set_rules('good_for', 'Good For', 'required|numeric');
        $this->form_validation->set_rules('max_of', 'Max Of', 'required|numeric');
        $this->form_validation->set_rules('remarks', 'Remarks', 'required');
        $this->form_validation->set_rules('amenities[]', 'Amenities', 'required');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('status' => 400, 'icon' => 'warning', 'title' => 'Invalid Data', 'message' => 'Invalid Data Entry!<br>' . validation_errors('', '<br>')));
            die;
        }

        $data['units']['name'] = $datas['name'];
        $data['units']['description'] = $datas['description'];
        $data['units']['room_no'] = $datas['room_no'];
        $data['units']['floor_no'] = $datas['floor_no'];
        $data['units']['f_size'] = $datas['floor_size'];
        $data['units']['good_for'] = $datas['good_for'];
        $data['units']['max_of'] = $datas['max_of'];
        $data['units']['remarks'] = $datas['remarks'];
        $data['units']['slug'] = str_replace([' ', '-'], '_', $data['units']['name']);
        $data['amenities'] = $datas['amenities'];

        $files = [];

        for ($i=0; $i < count($_FILES['files']['name']); $i++) {
	        $file = file_get_contents($_FILES['files']['tmp_name'][$i]);
	        $final_file = base64_encode($file);
            $mime = $_FILES["files"]["type"][$i];

            $files[] = array(
                'what' => 'units',
                'data' => $final_file,
                'mime' => $mime
            );
        }

        if (isset($datas['unit_id']) && !empty($datas['unit_id'])) {
            $id = $datas['unit_id'];
            $res = $this->admin->update_units($id, $data, $files);
        } else {
            $res = $this->admin->save_units($data, $files);
        }
        if ($res) {
            echo json_encode(array('icon' => 'success', 'title' => 'Success', 'message' => 'Save Successfully'));
            die;
        } else {
            echo json_encode(array('icon' => 'error', 'title' => 'Error', 'message' => 'Something went wrong'));
            die;
        }
    }

    public function get_booked_details()
    {
        $this->form_validation->set_rules('id', 'ID', 'required|numeric');

        if ($this->form_validation->run() == FALSE) {
            echo json_encode(array('status' => 400, 'icon' => 'warning', 'title' => 'Invalid Data', 'message' =>validation_errors('', '<br>')));
            die;
        }

        $id = $this->input->post('id');

        $res = $this->admin->get_booked_details($id);
        if ($res) {
            echo json_encode(array('status' => 200, 'data' => $res));
            die;
        } else {
            echo json_encode(array('status' => 400, 'icon' => 'error', 'title' => 'Error', 'message' => 'Something went wrong while adding'));
            die;
        }
    }

    public function ssp_units()
    {
        echo $this->ssp_model->units();
    }

    /**
     * END OF UNITS ------------------------------
     */

    /**
     * BOOK
     */

    public function ssp_customer_book()
    {
        echo $this->ssp_model->customer_book();
    }
    /**
     * END OF BOOK
     */
}
