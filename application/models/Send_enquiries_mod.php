<?php
class Send_enquiries_mod extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->load->helper('url'); //to access the base url from routesuserLoggedinData
    }
    
    function get_sendEnquiries()
    {
        $sql = "SELECT * FROM enquires";
        $query = $this->db->query($sql);
         //echo $this->db->last_query();
        return $query->result_array();
    }
  
    function getSingle_sendEnquiries($id){
        $sql = "SELECT * FROM enquires WHERE id = ?";

        $query =$this->db->query($sql, array($id)); 
        
        return $query->result_array();
    }
  
    function get_sendEnquiriesByOption($where){
        $sql = "SELECT * FROM enquires ".$where;

        $query =$this->db->query($sql, $where); 
        
        return $query->result_array();
    }
    

    function insert_sendEnquiries($sendEnquiriesInsertDataArray)
    {        
        $this->db->insert('enquires', $sendEnquiriesInsertDataArray);
    } 
      
    function multipleDelete_sendEnquiries($id)
    {
        $this->db->delete('enquires', array('Id' => $id));
    }
    
     function delete_sendEnquiries($id)
    {
        $this->db->delete('enquires', array('id' => $id));
    }

    function update_sendEnquiries($updDataArray)
    {
        $this->db->update('enquires', $updDataArray, array('Id' => $_POST['Id']));
    }
    
}
?>
