<?php
class Company_profile_mod extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->load->helper('url'); //to access the base url from routesuserLoggedinData
    }
    
    function get_companyProfile()
    {
        $sql = "SELECT * FROM about_us";
        $query = $this->db->query($sql);
         //echo $this->db->last_query();
        return $query->result_array();
    }
    
    function get_companyProfileNumRows()
    {
        $sql = "SELECT * FROM about_us";
        $query = $this->db->query($sql);
         //echo $this->db->last_query();
        return $query->num_rows();
    }
  
    function getSingle_companyProfile($id){
        $sql = "SELECT * FROM about_us WHERE id = ?";

        $query =$this->db->query($sql, array($id)); 
        
        return $query->result_array();
    }

    function insert_companyProfile($companyProfileInsertDataArray)
    {        
        $this->db->insert('about_us', $companyProfileInsertDataArray);
    }
    
     function delete_companyProfile($id)
    {
        $this->db->delete('about_us', array('id' => $id));
    }

    function update_companyProfile($updDataArray)
    {
     // var_dump($updDataArray); exit;
        $this->db->update('about_us', $updDataArray, array('Id' => $_POST['Id']));
    }
    
}
?>
