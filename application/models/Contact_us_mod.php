<?php
class Contact_us_mod extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->load->helper('url'); //to access the base url from routesuserLoggedinData
    }
    
    function get_contactUs()
    {
        $sql = "SELECT * FROM contacts";
        $query = $this->db->query($sql);
         //echo $this->db->last_query();
        return $query->result_array();
    }
  
    function getSingle_contactUs($id){
        $sql = "SELECT * FROM contacts WHERE id = ?";

        $query =$this->db->query($sql, array($id)); 
        
        return $query->result_array();
    }

    function insert_contactUs($contactUsInsertDataArray)
    {        
        $this->db->insert('contacts', $contactUsInsertDataArray);
    } 
      
    function multipleDelete_contactUs($id)
    {
        $this->db->delete('contacts', array('Id' => $id));
    }
    
     function delete_contactUs($id)
    {
        $this->db->delete('contacts', array('id' => $id));
    }

    function update_contactUs($updDataArray)
    {
     // var_dump($updDataArray); exit;
        $this->db->update('contacts', $updDataArray, array('Id' => $_POST['Id']));
    }
    
}
?>
