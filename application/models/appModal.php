<?php
class app_modal extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->load->helper('url'); //to access the base url from routesuserLoggedinData
    }
    
    function get_category()
    {
        $sql = "SELECT * FROM categories ";
        $query = $this->db->query($sql);
         //echo $this->db->last_query();
        return $query->result_array();
    }
  
    function getSingle_category($where){
        $sql = "SELECT * FROM categories  WHERE". $where;

        $query =$this->db->query($sql); 
        
        return $query->result_array();
    }
    
}
?>
