<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ssp_Model extends CI_Model
{
    // DB table to use
    private $table = '';

    // Table's primary key
    private $primaryKey = 'id';

    // Array of database columns which should be read and sent back to DataTables.
    // The `db` parameter represents the column name in the database, while the `dt`
    // parameter represents the DataTables column identifier. In this case simple
    // indexes
    private $columns = [];
    // SQL server connection information
    private $sql_details = array(
        'user' => '',
        'pass' => '',
        'db'   => '',
        'host' => ''
        // ,'charset' => 'utf8' // Depending on your PHP and MySQL config, you may need this
    );

    public function __construct()
    {
        parent::__construct();
        $this->load->library('ssp');
        $this->sql_details = array(
            'user' => $this->db->username,
            'pass' => $this->db->password,
            'db'   => $this->db->database,
            'host' => $this->db->hostname
        );
    }

    public function amenity()
    {
        $this->table = 'amenity';
        $this->primaryKey = 'id';
        $this->columns = array(
            array('db' => 'name', 'dt' => 0),
            array(
                'db' => 'id', 'dt' => 1,
                'formatter' => function ($data,$row) {
                    return "
                        <button type='button' class='btn btn-primary edit_amenity' data-id='$data' data-name='".$row['name']."'>
                            Edit
                        </button>
                ";
                }
            ),
        );

        return json_encode(
            SSP::simple($_POST, $this->sql_details, $this->table, $this->primaryKey, $this->columns)
        );
    }

    public function units()
    {
        $this->table = 'accomodation';
        $this->primaryKey = 'id';
        $this->columns = array(
            array('db' => 'name', 'dt' => 0),
            array('db' => 'description', 'dt' => 1),
            array('db' => 'room_no', 'dt' => 2),
            array('db' => 'floor_no', 'dt' => 3),
            array('db' => 'f_size', 'dt' => 4),
            array('db' => 'good_for', 'dt' => 5),
            array('db' => 'max_of', 'dt' => 6),
            array('db' => 'remarks', 'dt' => 7),
            array(
                'db' => 'id', 'dt' => 8,
                'formatter' => function ($data) {
                    return "
                        <button type='button' class='btn btn-primary edit_units' data-id='$data'>
                            Edit
                        </button>
                ";
                }
            ),
        );

        return json_encode(
            SSP::simple($_POST, $this->sql_details, $this->table, $this->primaryKey, $this->columns)
        );
    }

    public function book()
    {
        $this->table = "(
            SELECT a.id, a.name,a.f_size,a.good_for,a.max_of,a.price,s.from_date,s.to_date
            FROM accomodation a
            INNER JOIN schedule s ON a.id=s.accomodation_id
            ) temp";
        $this->primaryKey = 'id';
        $this->columns = array(
            array('db' => 'name', 'dt' => 0),
            array('db' => 'from_date', 'dt' => 1),
            array('db' => 'to_date', 'dt' => 2),
            array('db' => 'price', 'dt' => 3),
            array(
                'db' => 'id', 'dt' => 4,
                'formatter' => function ($data) {
                    return "
                        <span class='badge badge-warning'>PENDING</span>
                ";
                }
            ),
        );

        return json_encode(
            SSP::simple($_POST, $this->sql_details, $this->table, $this->primaryKey, $this->columns)
        );
    }
}
