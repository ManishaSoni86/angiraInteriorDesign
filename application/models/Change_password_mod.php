<?php
class Change_password_mod extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->load->helper('url'); //to access the base url from routesuserLoggedinData
    }
  
    function getSingle_changePassword($name){
        $sql = "SELECT * FROM users WHERE name = ?";

        $query =$this->db->query($sql, array($name)); 
        
        return $query->result_array();
    }

    function update_changePassword($updDataArray, $where)
    {
     // var_dump($updDataArray); exit;
        $this->db->update('users', $updDataArray, $where);
    }
    
}
?>
