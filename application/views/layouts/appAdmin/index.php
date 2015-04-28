<?php
	//$this->load->view('header');
    if((isset($loadLocations['header'])) || (isset($header))){
		$this->load->view('layouts/appAdmin/common/header');
	}
 ?>   <!-- Main Container for Nav and View/Form Deail. -->
   <div class="page-content">
    <div class="row">
    
    <!-- Starting of Sidebar-left -->
    <?php
    if((isset($loadLocations['sidebarLeft'])) || (isset($sidebarLeft))){
	    	 $this->load->view('layouts/appAdmin/common/sidebarLeft'); 
	    }
	?>
	<?php 
    if((isset($loadLocations['pageContents'])) || (isset($pageContents))){
	    	 $this->load->view('layouts/appAdmin/common/pageContents'); 	   	
	   }?>
	    	
	<?php
	if((isset($loadLocations['sidebarRight'])) || (isset($sidebarRight))){
	    	 $this->load->view('layouts/appAdmin/common/sidebarRight'); 
	    }
	?>
		  	
	</div>
   </div>
   <?php 
	if((isset($loadLocations['footer'])) || (isset($footer))){
		$this->load->view('layouts/appAdmin/common/footer');
	}
	?>