<?php
class Social_site_mod extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->load->helper('url'); //to access the base url from routesuserLoggedinData
    }
    
    function get_socialSite()
    {
        $sql = "SELECT * FROM social_sites_detail";
        $query = $this->db->query($sql);
         //echo $this->db->last_query();
        return $query->result_array();
    }
    
    // Query for App
    function get_socialSiteSelected($where)
    {
        $sql = "SELECT * FROM social_sites_detail where " .$where;
        $query = $this->db->query($sql);
         //echo $this->db->last_query();
        return $query->result_array();
    }
  
    function getSingle_socialSite($id){
        $sql = "SELECT * FROM social_sites_detail WHERE id = ?";

        $query =$this->db->query($sql, array($id)); 
        
        return $query->result_array();
    }

    function insert_socialSite($socialSiteInsertDataArray)
    {        
        $this->db->insert('social_sites_detail', $socialSiteInsertDataArray);
    } 
      
    function multipleDelete_socialSite($id)
    {
        $this->db->delete('social_sites_detail', array('Id' => $id));
    }
    
     function delete_socialSite($id)
    {
        $this->db->delete('social_sites_detail', array('id' => $id));
    }

    function update_socialSite($updDataArray)
    {
     // var_dump($updDataArray); exit;
        $this->db->update('social_sites_detail', $updDataArray, array('Id' => $_POST['Id']));
    }
    
}
?>
