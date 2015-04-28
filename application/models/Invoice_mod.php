<?php
class Invoice_mod extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->load->helper('url'); //to access the base url from routesuserLoggedinData
    }
    
    function get_invoice($where = null)
    {
        $sql = "SELECT * FROM invoice ". $where;
        $query = $this->db->query($sql);
         //echo $this->db->last_query();
        return $query->result_array();
    }
  
    function getSingle_invoice($id){
        $sql = "SELECT * FROM invoice  WHERE id = ?";

        $query =$this->db->query($sql, array($id)); 
        
        return $query->result_array();
    }

    function insert_invoice($invoiceInsertDataArray)
    {        
        $this->db->insert('invoice ', $invoiceInsertDataArray);
    } 
      
    function multipleDelete_invoice($id)
    {
        $this->db->delete('invoice', array('Id' => $id));
    }
    
     function delete_invoice($id)
    {
        $this->db->delete('invoice ', array('id' => $id));
    }

    function update_invoice($updDataArray)
    {
     // var_dump($updDataArray); exit;
        $this->db->update('invoice ', $updDataArray, array('Id' => $_POST['Id']));
    }
    
}
?>
