<?php
class Products_mod extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->load->helper('url'); //to access the base url from routesuserLoggedinData
    }
    
    function get_Products()
    {
        $sql = "SELECT * from products";
        $query = $this->db->query($sql);
         //echo $this->db->last_query();
        return $query->result_array();
    }
    
    function getSlug_Products($slug)
    {
        $sql = "SELECT * from products" .$slug;
        $query = $this->db->query($sql);
         //echo $this->db->last_query();
        return $query->result_array();
    }
    
    function get_ProductsJoin($wherePrdJoin)
    {
        $sql = "SELECT products.*, categories.catName, categories.catDetail, categories.parentCat from products LEFT JOIN categories ON products.categoryId = categories.Id " .$wherePrdJoin;
        $query = $this->db->query($sql);
         //echo $this->db->last_query();
        return $query->result_array();
    }
  
    function getSingle_Products($id){
        $sql = "SELECT * FROM products WHERE Id = ?";

        $query =$this->db->query($sql, array($id)); 
        
        return $query->result_array();
    }
    
    function get_ProductsNumRows()
    {
        $sql = "SELECT * FROM products";
        $query = $this->db->query($sql);
         //echo $this->db->last_query();
        return $query->num_rows();
    }

    function insert_Products($ProductsInsertDataArray)
    {        
        $this->db->insert('products', $ProductsInsertDataArray);
    } 
      
    function multipleDelete_Products($id)
    {
        $this->db->delete('products', array('Id' => $id));
    }
    
     function delete_Products($id)
    {
        $this->db->delete('products', array('id' => $id));
    }

    function update_Products($updDataArray)
    {
     // var_dump($updDataArray); exit;
        $this->db->update('products', $updDataArray, array('Id' => $_POST['Id']));
    }
    
}
?>
