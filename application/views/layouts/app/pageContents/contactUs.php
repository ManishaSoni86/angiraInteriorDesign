<!-- container -->
	<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h3 class="section-title">Send Enquiry</h3>
												
						<?php include "Send_Enquiry_form.php"; ?>
					</div>
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-12">
								<h3 class="section-title">Office Address</h3>
								<div class="contact-info">
													<?php foreach ($contactUsListData as $contactUsListData_item): ?>
       								<?php
                 if($contactUsListData_item['ptcImg']!=""  &&  $contactUsListData_item['officeImg']!="")
                    { ?>
						<a class="img-indent boxer boxer_image" href="<?php echo $this->config->item('images_path_database');?><?php echo $contactUsListData_item['ptcImg'];?>">
							<img class="contImg" src="<?php echo $this->config->item('images_path_database');?><?php echo $contactUsListData_item['ptcImg'];?>" alt="<?php echo $contactUsListData_item['ptcName'];?>" />
						</a>
						<a class="img-indent boxer boxer_image" href="<?php echo $this->config->item('images_path_database');?><?php echo $contactUsListData_item['officeImg'];?>">
							<img class="contImg" src="<?php echo $this->config->item('images_path_database');?><?php echo $contactUsListData_item['officeImg'];?>" alt="<?php echo $contactUsListData_item['ptcName'];?>" />
						</a>
						<div class="clear"></div><br />
                      
               <?php }
                  
                 elseif($contactUsListData_item['ptcImg']!="")
                    { ?>
                       <a class="img-indent boxer boxer_image" href="<?php echo $this->config->item('images_path_database');?><?php echo $contactUsListData_item['ptcImg'];?>">
                       	 <img class="contImg" src="<?php echo $this->config->item('images_path_database');?><?php echo $contactUsListData_item['ptcImg'];?>" alt="<?php echo $contactUsListData_item['ptcName'];?>" />
                       </a>
               <?php }
                  
                 elseif($contactUsListData_item['officeImg']!="")
                    { ?>
                       <a class="img-indent boxer boxer_image" href="<?php echo $this->config->item('images_path_database');?><?php echo $contactUsListData_item['officeImg'];?>">
                       		<img class="contImg" src="<?php echo $this->config->item('images_path_database');?><?php echo $contactUsListData_item['officeImg'];?>" alt="<?php echo $contactUsListData_item['ptcName'];?>" />
                       </a>
               <?php }
                  else {
                    } ?> 
								<div class="extra-wrap">
								<p class="top-03 contHd">
									<?php
			                        if($contactUsListData_item['officeTypeId']  == 1){
			                          echo $this->config->item('corporate_Office');
			                        } 
			                        elseif($contactUsListData_item['officeTypeId']  == 2){
			                          echo $this->config->item('regional_Office');
			                        } 
			                        elseif($contactUsListData_item['officeTypeId']  == 3){
			                          echo $this->config->item('head_Office');
			                        } 
			                        elseif($contactUsListData_item['officeTypeId']  == 4){
			                          echo $this->config->item('brach_Office');
			                        } 
			                        ?>	
								</p>
								<p class="font-3 top-1 line-height">
								<b><?php echo $contactUsListData_item['ptcTitle']." ". $contactUsListData_item['ptcName']; ?></b><br />
                      <b>Address : </b><?php echo $contactUsListData_item['contLocation'].", ".$contactUsListData_item['contArea'];  ?> <br />
                      <?php echo $contactUsListData_item['contCity'].", ". $contactUsListData_item['contState'].", ".$contactUsListData_item['contCountry']."- ".$contactUsListData_item['contPincode']; ?> <br />
                      <b>PH No. : </b><?php echo $contactUsListData_item['STD']."- ". $contactUsListData_item['phNumber'];?> <br />
                      <b>Fax No : </b><?php echo $contactUsListData_item['faxNumber']; ?> <br />
                      <b>Mob : </b><?php echo $contactUsListData_item['mobileNumber']; ?> <br />
                      <b> Email Id :</b> <?php echo $contactUsListData_item['contEmail']; ?><br />
                      <?php
                      if($contactUsListData_item['gMapLatitute'] != ''){ ?>
                        <form method="post">
                        <button type="button" name="Shwmap" class="vw_mr_gPrdImg" id="MapBtn">Show_Map</button>
                        </form>
                        <button type="button" name="MapTogl" id="MapHdSw">Hide Map</button>
                      <?php 
                      }
                      ?>     
                      
                  <script type="text/javascript">
                  
                    // Show Map Coding
                    jQuery(document).ready(function() {
                      jQuery('#MapBtn').click(function(){
                        jQuery('#MapBtn').hide();
                        jQuery('#MapHdSw').show();
                        jQuery('#googleMapAdmin').show();
                        var mapProp = {
                          center:new google.maps.LatLng(<?php echo $contactUsListData_item['gMapLatitute']; ?>,<?php echo $contactUsListData_item['gMapLangitute']; ?>),
                          zoom:17,
                          mapTypeId:google.maps.MapTypeId.ROADMAP
                          };
                        var map=new google.maps.Map(document.getElementById("googleMapAdmin")
                          ,mapProp);
                        
                        jQuery('#MapBtn').hide();
                        jQuery('#MapHdSw').show();
                      });
                    });
                  </script>
                        
                        <div class="clear"></div>
                        <div id="MapCaintnerAdmin">
                          <div id="googleMapAdmin" style="width:100%;height:200px; display: none; border: 1px solid #fff;"></div>
                        </div>
								</p><br />
								
							</div>
									<?php endforeach ?>
								</div>
							</div>
						</div>
											
					</div>
				</div>
			</div>
	<!-- /container -->




