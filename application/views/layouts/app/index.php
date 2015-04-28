<?php
    if((isset($loadLocations['header'])) || (isset($header))){
    $this->load->view('layouts/app/common/header');
  }
?>
<!--==============================content================================-->
<?php 
if((isset($loadLocations['pageContents'])) || (isset($pageContents))){
     $this->load->view('layouts/app/common/pageContents');       
 }
?>  
				
<!--==============================footer=================================-->
<?php
    if((isset($loadLocations['footer'])) || (isset($footer))){
    $this->load->view('layouts/app/common/footer');
  }
?>

