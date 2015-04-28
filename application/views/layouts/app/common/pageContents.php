<div class="container_12">
  <div class="wrapper">
    <?php 
      if(isset($pageContents['home'])){
       $this->load->view($pageContents['home']);
      }       
      
      if(isset($pageContents['aboutUs'])){
       $this->load->view($pageContents['aboutUs']);
      }      
      
      if(isset($pageContents['testimonial'])){
       $this->load->view($pageContents['testimonial']);
      }
      
      if(isset($pageContents['deliveriablesMenu'])){
       $this->load->view($pageContents['deliveriablesMenu']);
      }
            
      if(isset($pageContents['contactUs'])){
       $this->load->view($pageContents['contactUs']);
      } 
     ?>
   </div>
</div>


            
                
                  
             