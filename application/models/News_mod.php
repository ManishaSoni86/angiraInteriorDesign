<?php
class News_mod extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->load->helper('url'); //to access the base url from routesuserLoggedinData
    }
    
    function get_news()
    {
        $sql = "SELECT * FROM news";
        $query = $this->db->query($sql);
         //echo $this->db->last_query();
        return $query->result_array();
    }
    
    function get_newsNumRows()
    {
        $sql = "SELECT * FROM news";
        $query = $this->db->query($sql);
         //echo $this->db->last_query();
        return $query->num_rows();
    }
  
    function getSingle_news($id){
        $sql = "SELECT * FROM news WHERE id = ?";

        $query =$this->db->query($sql, array($id)); 
        
        return $query->result_array();
    }

    function insert_news($newsInsertDataArray)
    {        
        $this->db->insert('news', $newsInsertDataArray);
    } 
      
    function multipleDelete_news($id)
    {
        $this->db->delete('news', array('Id' => $id));
    }
    
     function delete_news($id)
    {
        $this->db->delete('news', array('id' => $id));
    }

    function update_news($updDataArray)
    {
     // var_dump($updDataArray); exit;
        $this->db->update('news', $updDataArray, array('Id' => $_POST['Id']));
    }
    
}
?>
