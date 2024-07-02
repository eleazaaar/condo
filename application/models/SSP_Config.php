<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SSP_Config extends CI_Model
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

    public function get_sql_details(){
        return $this->sql_details;
    }

    public function get_table(){
        return $this->table;
    }

    public function get_primary_key(){
        return $this->primaryKey;
    }

    public function get_columns(){
        return $this->columns;
    }
  
    public function set_table($data){
        $this->table=$data;
    }

    public function set_primary_key($data){
        $this->primaryKey=$data;
    }

    public function set_columns($data){
        $this->columns=$data;
    }
}
