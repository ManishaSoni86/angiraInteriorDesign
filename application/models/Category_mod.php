<?php
class Category_mod extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->load->helper('url'); //to access the base url from routesuserLoggedinData
    }
    
    function get_category($where = null)
    {
        $sql = "SELECT * FROM categories ". $where;
        $query = $this->db->query($sql);
         //echo $this->db->last_query();
        return $query->result_array();
    }
  
    function getSingle_category($id){
        $sql = "SELECT * FROM categories  WHERE id = ?";

        $query =$this->db->query($sql, array($id)); 
        
        return $query->result_array();
    }

    function insert_category($categoryInsertDataArray)
    {        
        $this->db->insert('categories ', $categoryInsertDataArray);
    } 
      
    function multipleDelete_category($id)
    {
        $this->db->delete('categories', array('Id' => $id));
    }
    
     function delete_category($id)
    {
        $this->db->delete('categories ', array('id' => $id));
    }

    function update_category($updDataArray)
    {
     // var_dump($updDataArray); exit;
        $this->db->update('categories ', $updDataArray, array('Id' => $_POST['Id']));
    }
    
}
?>
