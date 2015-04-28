
		<button class="btn-danger" id="moveTop">Move Top</button>

<footer id="footer">			
		<div class="container">
			
		 <?php if(isset($footerWidgets['footerSocialSite'])){$this->load->view($footerWidgets['footerSocialSite']);} ?>
		</div>
		<div class="footer2">
			<div class="container">
				<div class="row">

					<div class="col-md-6 panel">
						<?php if(isset($footerWidgets['footerPanelMenu'])){$this->load->view($footerWidgets['footerPanelMenu']);} ?>
					</div>

					<div class="col-md-6 panel">
						<div class="panel-body">
							<p class="text-right">
								Copyright &copy; 2014. Template by <a href="http://webthemez.com/" rel="develop">WebThemez.com</a>
							</p>
						</div>
					</div>

				</div>
				<!-- /row of panels -->
			</div>
		</div>
	</footer>

	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="assets/js/modernizr-latest.js"></script> 
    <script type='text/javascript' src='<?php echo $this->config->item('host_url'); ?>assets/app/js/fancybox/jquery.fancybox.pack.js'></script>
    
    <script type='text/javascript' src='<?php echo $this->config->item('host_url'); ?>assets/app/js/jquery.mobile.customized.min.js'></script>
    <script type='text/javascript' src='<?php echo $this->config->item('host_url'); ?>assets/app/js/jquery.easing.1.3.js'></script> 
    <script type='text/javascript' src='<?php echo $this->config->item('host_url'); ?>assets/app/js/camera.min.js'></script> 
    <script src="<?php echo $this->config->item('host_url'); ?>assets/app/js/bootstrap.min.js"></script> 
	<script src="<?php echo $this->config->item('host_url'); ?>assets/app/js/custom.js"></script>
    <script type='text/javascript'> 
		jQuery(function(){
			
			jQuery('#camera_wrap_4').camera({
				height: '600',
				loader: 'bar',
				pagination: false,
				thumbnails: false,
				hover: false,
				opacityOnGrid: false,
				imagePath: 'assets/images/'
			});

		});
	</script>
    
</body>
</html>

	

  
  <script type="text/javascript" src="<?php echo $this->config->item('host_url'); ?>assets/jqueryUI/jquery-ui.js"></script>
<script type="text/javascript">

//for ContactUs Google Map Btn
  jQuery(function(){
    jQuery('#MapHdSw').click(function(){
      jQuery('#MapCaintnerAdmin').toggle();
      
      if(jQuery(this).html()!="Show Map"){       
            jQuery(this).html('Show Map');
         }else{
            jQuery(this).html('Hide Map');
        }
    });
 });
 </script>
 
			<script type='text/javascript'>
			  function getSingleProduct(pId){
				jQuery(function(){
				
				        //dataString = jQuery("#JqAjaxForm").serialize();
				    
				    	dataString = "Id="+pId;
				    	
				        jQuery.ajax({
				        type: "POST",
				        url: "<?php echo base_url();?>app/process_productAjax",
				        data: dataString,
				        dataType: "json",
				        success: function(data) {
				        
				                jQuery(".prodATitle").html( data.name );
				                jQuery(".prodImgHref").attr({href : '<?php echo $this->config->item('images_path_database');?>/'+data.image});
				                jQuery(".prodImgHref").html('<img class="prodImg" src="<?php echo $this->config->item("images_path_database");?>'+data.image+'" alt="" class="img-rounded pull-left">');
				                //jQuery(".prodDesc").empty('');
				                jQuery(".prodDesc").html( data.descp );
				        }
				          
				        }); 
				});
					
			  }
			  
		 </script>	
 
