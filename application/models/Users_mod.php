<?php


class Users_mod extends CI_Model {
/*
    var $empCode      = '';
    var $role         = '';
  var $userEmail      = '';
  var $name       = '';
  var $password     = '';
  var $reportingLocation  = '';
  var $isActive     = '';
*/
  
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }
  /*  
    function get_last_ten_entries()
    {
        $query = $this->db->get('users', 100);
        return $query->result();
    }
   * 
   */
   
   
   // Codeing for Login Check
    function getUser($id){
        //echo $id;
        $sql = "SELECT * FROM users WHERE id = ?";

        $query =$this->db->query($sql, array($id)); 
       
         echo $this->db->last_query();
        return $query->result();
    }
  
    function getUserLogin($userEmail, $passowrd){
        //echo $id;
        $sql = "SELECT * FROM users WHERE userEmail = '".$userEmail."' AND password =  '".$passowrd ."' AND isActive = 1";

        $query =$this->db->query($sql); 
        //var_dump($query); exit;
         //echo $this->db->last_query();
        return $query->result();
    }
    
    
  function updatePassword($userEmail, $newPassArray)
    {
       
       $query= $this->db->update('users', $newPassArray, array('userEmail' => $userEmail));
       var_dump($query); 
    } 
     
   
   // Codeing for Users Page
  function get_UserAllData($where){
        $sql = "SELECT * FROM users".$where;

        $query =$this->db->query($sql); 
       
        return $query->result_array();
    }
  
    function getSingle_users($id){
        $sql = "SELECT * FROM users WHERE id = ?";

        $query =$this->db->query($sql, array($id)); 
        
        return $query->result_array();
    } 
  
  
   function insert_users($usersInsertDataArray)
    {        
        $this->db->insert('users', $usersInsertDataArray);
    }
    
    function update_users($updDataArray)
    {
        $this->db->update('users', $updDataArray, array('Id' => $_POST['Id']));
    } 
      
    function multipleDelete_users($id)
    {
        $this->db->delete('users', array('Id' => $id));
    }
    
    function delete_users($id)
    {
        $this->db->where_in('Id', $id);# delete all reg_id in $reg_id array variable
        $this->db->delete('users');
    
        if($del)
        {
            return $del;
        }
        else
        {
            return false;
        }
    }
    
    
}
?>
