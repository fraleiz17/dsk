<?php

class test_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    function insertData($data){
        foreach ($data as $table => $rows) {            
            foreach ($rows as $row) {
                $this->db->insert($table, $row);
            }            
        }
    }

}
