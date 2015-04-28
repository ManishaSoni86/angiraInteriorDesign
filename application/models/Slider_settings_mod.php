<?php
class Slider_settings_mod extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->load->helper('url'); //to access the base url from routesuserLoggedinData
    }
    
    function get_sliderSetting()
    {
        $sql = "SELECT * FROM slider_settings";
        $query = $this->db->query($sql);
         //echo $this->db->last_query();
        return $query->result_array();
    }
  
    function getSingle_sliderSetting($id){
        $sql = "SELECT * FROM slider_settings WHERE id = ?";

        $query =$this->db->query($sql, array($id)); 
        
        return $query->result_array();
    }
    
    function get_sliderSettingNumRows()
    {
        $sql = "SELECT * FROM slider_settings";
        $query = $this->db->query($sql);
         //echo $this->db->last_query();
        return $query->num_rows();
    }

    function insert_sliderSetting($sliderSettingInsertDataArray)
    {        
        $this->db->insert('slider_settings', $sliderSettingInsertDataArray);
    } 
      
    function multipleDelete_sliderSetting($id)
    {
        $this->db->delete('slider_settings', array('Id' => $id));
    }
    
     function delete_sliderSetting($id)
    {
        $this->db->delete('slider_settings', array('id' => $id));
    }

    function update_sliderSetting($updDataArray)
    {
     // var_dump($updDataArray); exit;
        $this->db->update('slider_settings', $updDataArray, array('Id' => $_POST['Id']));
    }
    
}
?>
