<?php
class Media_mod extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
        $this->load->helper('url'); //to access the base url from routesuserLoggedinData
    }
    
    function get_Media()
    {
        $sql = "SELECT * FROM media";
        $query = $this->db->query($sql);
         //echo $this->db->last_query();
        return $query->result_array();
    }
  
    function getSingle_Media($id){
        $sql = "SELECT * FROM media WHERE id = ?";

        $query =$this->db->query($sql, array($id)); 
        
        return $query->result_array();
    }
    
    function get_MediaNumRows()
    {
        $sql = "SELECT * FROM media";
        $query = $this->db->query($sql);
         //echo $this->db->last_query();
        return $query->num_rows();
    }
    

    function insert_Media($MediaInsertDataArray)
    {        
       $qu= $this->db->insert('media', $MediaInsertDataArray);
       //var_dump($qu); exit;
    } 
      
    function multipleDelete_Media($id)
    {
        $this->db->delete('media', array('Id' => $id));
    }
    
     function delete_Media($id)
    {
        $DelData  = $this->getSingle_Media($id);
        if($DelData['0']['imgName'] != ''){
          $delImgPath = './images/blockImages/'.$DelData['0']['imgName'];
          unlink($delImgPath);
        }
        $this->db->delete('media', array('id' => $id));
    }

    function update_Media($updDataArray)
    {
     // var_dump($updDataArray); exit;
        $this->db->update('media', $updDataArray, array('Id' => $_POST['Id']));
    }
    
}
?>
