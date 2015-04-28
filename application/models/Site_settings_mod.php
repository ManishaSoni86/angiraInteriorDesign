<?php
class Site_settings_mod extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    $this->load->helper('url'); //to access the base url from routesuserLoggedinData
    }
    
    function get_siteSettings()
    {
        $sql = "SELECT * FROM site_settings";
        $query = $this->db->query($sql);
         //echo $this->db->last_query();
        return $query->result_array();
    }
    
    function get_siteSettingsNumRos()
    {
        $sql = "SELECT * FROM site_settings";
        $query = $this->db->query($sql);
         //echo $this->db->last_query();
        return $query->num_rows();
    }
  
    function getSingle_siteSettings($id){
        $sql = "SELECT * FROM site_settings WHERE id = ?";

        $query =$this->db->query($sql, array($id)); 
        
        return $query->result_array();
    }

    function insert_siteSettings($siteSettingsInsertDataArray)
    {        
        $this->db->insert('site_settings', $siteSettingsInsertDataArray);
    }
    
     function delete_siteSettings($id)
    {
        $this->db->delete('site_settings', array('id' => $id));
    }

    function update_siteSettings($updDataArray)
    {
     // var_dump($updDataArray); exit;
        $this->db->update('site_settings', $updDataArray, array('Id' => $_POST['Id']));
    }
    
}
?>
