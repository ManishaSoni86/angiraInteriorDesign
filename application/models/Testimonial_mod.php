<?php
class Testimonial_mod extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->load->helper('url'); //to access the base url from routesuserLoggedinData
    }
    
    function get_testimonial()
    {
        $sql = "SELECT * FROM testimonials";
        $query = $this->db->query($sql);
         //echo $this->db->last_query();
        return $query->result_array();
    }
    
    function get_testimonialNumRows()
    {
        $sql = "SELECT * FROM testimonials";
        $query = $this->db->query($sql);
         //echo $this->db->last_query();
        return $query->num_rows();
    }
  
    function getSingle_testimonial($id){
        $sql = "SELECT * FROM testimonials WHERE id = ?";

        $query =$this->db->query($sql, array($id)); 
        
        return $query->result_array();
    }

    function insert_testimonial($testimonialInsertDataArray)
    {        
        $this->db->insert('testimonials', $testimonialInsertDataArray);
    } 
      
    function multipleDelete_testimonial($id)
    {
        $this->db->delete('testimonials', array('Id' => $id));
    }
    
     function delete_testimonial($id)
    {
        $this->db->delete('testimonials', array('id' => $id));
    }

    function update_testimonial($updDataArray)
    {
     // var_dump($updDataArray); exit;
        $this->db->update('testimonials', $updDataArray, array('Id' => $_POST['Id']));
    }
    
}
?>
