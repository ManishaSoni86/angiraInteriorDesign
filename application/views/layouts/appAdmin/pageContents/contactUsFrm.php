
	<div class="content-box-large">
      <form class="form-horizontal contactUsForm" role="form" action="<?php echo $action; ?>" method="post">
		<div class="panel-heading">
	        <div class="panel-title"><?php echo $pageTitle; ?></div>
	      
	        <div class="panel-options">            
            <a href="#" data-rel="collapse">
              <button type="reset" name="reset" class="btn btn-link" value="">
                <i class="glyphicon glyphicon-refresh"></i>
               </button>   
             </a>
	          <a href="<?php echo base_url();?>appAdmin/contactUsList" data-rel="reload"><i class="">Back</i></a>
	        </div>
	    </div>
		<div class="panel-body">        
          <input type="hidden" name="Id" value="<?php echo $updId; ?>">
			  			  
			  <div class="form-group">
			    <label for="OffceType" class="col-sm-3 control-label">Office Type</label>
			    <div class="col-sm-9">
					<select class="form-control" id="OffceType" name="officeTypeId">
						<option value=""> --Office Type--	</option>
						
						<option value="1" <?php if((isset($contactUsSingleData['officeTypeId'])) && ($contactUsSingleData['officeTypeId'] == '1')) { ?> selected="selected"  <?php } echo set_select('officeTypeId', '1'); ?>>
						  <?php echo $this->config->item('corporate_Office'); ?>
						</option>
            <option value="2" <?php if((isset($contactUsSingleData['officeTypeId'])) && ($contactUsSingleData['officeTypeId'] == '2')) { ?> selected="selected"  <?php } echo set_select('officeTypeId', '2'); ?>>
              <?php echo $this->config->item('regional_Office'); ?>
           </option>
            <option value="3" <?php if((isset($contactUsSingleData['officeTypeId'])) && ($contactUsSingleData['officeTypeId'] == '3')) { ?> selected="selected"  <?php } echo set_select('officeTypeId', '3'); ?>>
              <?php echo $this->config->item('head_Office'); ?>
            </option>
            <option value="4" <?php if((isset($contactUsSingleData['officeTypeId'])) && ($contactUsSingleData['officeTypeId'] == '4')) { ?> selected="selected"  <?php } echo set_select('officeTypeId', '4'); ?>>
              <?php echo $this->config->item('brach_Office'); ?>
            </option>
					</select>					 
			      <span class="Error"><?php echo form_error('officeTypeId'); ?></span>
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="" class="col-sm-3 control-label">PTC Gender</label>
			    <div class="col-sm-9">
			      <input type="radio" name="ptcTitle" id="Mr" value="Mr" <?php if((isset($contactUsSingleData['ptcTitle'])) && ($contactUsSingleData['ptcTitle'] == 'Mr')) { ?> checked="checked" <?php } echo set_radio('ptcTitle', 'Mr'); ?>> Mr. &nbsp;
			      <input type="radio" name="ptcTitle" id="Mrs" value="Mrs" <?php if((isset($contactUsSingleData['ptcTitle'])) && ($contactUsSingleData['ptcTitle'] == 'Mrs')) { ?> checked="checked" <?php } echo set_radio('ptcTitle', 'Mrs'); ?>> Mrs. &nbsp;
			      <input type="radio" name="ptcTitle" id="Miss" value="Miss" <?php if((isset($contactUsSingleData['ptcTitle'])) && ($contactUsSingleData['ptcTitle'] == 'Miss')) { ?> checked="checked" <?php } echo set_radio('ptcTitle', 'Miss'); ?>> Miss 
			      <span class="Error"><?php echo form_error('ptcTitle'); ?></span>
			    </div>
			  </div>
			  
			  
			  <div class="form-group">
			    <label for="PtcName" class="col-sm-3 control-label">PTC Name</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="PtcName" placeholder="PTC Name" name="ptcName" <?php if(isset($contactUsSingleData)) {?> value="<?php echo $contactUsSingleData['ptcName']; ?>" <?php } else { ?> value="<?php echo set_value('ptcName'); ?>" <?php } ?>  /> 
			      <span class="Error"><?php echo form_error('ptcName'); ?></span>
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="PTCImg" class="col-sm-3 control-label">PTC Image</label>
			    <div class="col-sm-5">
			      <input type="text" class="form-control" id="ptcImg" placeholder="PTC Image" name="ptcImg" <?php if(isset($contactUsSingleData)) {?> value="<?php echo $contactUsSingleData['ptcImg']; ?>" <?php } else { ?> value="<?php echo set_value('ptcImg'); ?>" <?php } ?>>
			      <span class="Error"><?php echo form_error('ptcImg'); ?></span>
			    </div>
			    <div class="col-sm-2">
            <img src="" id="ptcImgShow" width="60" height="45" />
          </div>
			    <div class="col-sm-2">
			      <button type="button" class="btn btn-primary" id="PtcImgbtn" value="ptcImgSel" data-toggle="modal" data-target="#popupModal" >Select Img</button>
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="OffceImg" class="col-sm-3 control-label">Office Image</label>
			    <div class="col-sm-5">
			      <input type="text" class="form-control" id="OffceImg" placeholder="Office Image" name="officeImg" <?php if(isset($contactUsSingleData)) {?> value="<?php echo $contactUsSingleData['officeImg']; ?>" <?php } else { ?> value="<?php echo set_value('officeImg'); ?>" <?php } ?>>
			      <span class="Error"><?php echo form_error('officeImg'); ?></span>
			    </div>
			    <div class="col-sm-2">
            <img src="" id="officeImgShow" width="60" height="45" />
          </div>
			    <div class="col-sm-2">
            <button type="button" class="btn btn-primary" id="OffceImgBtn" value="officeImgSel" data-toggle="modal" data-target="#popupModal" >Select Img</button>
          </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="PhNo" class="col-sm-3 control-label">Phone No</label>
			    <div class="col-sm-2">
			      <input type="tel" class="form-control" id="STD Code" placeholder="STD Code" name="STD" <?php if(isset($contactUsSingleData)) {?> value="<?php echo $contactUsSingleData['STD']; ?>" <?php } else { ?> value="<?php echo set_value('STD'); ?>" <?php } ?> >
			      <span class="Error"><?php echo form_error('STD'); ?></span>
			    </div>
			    <div class="col-sm-7">
			      <input type="tel" class="form-control" id="PhNo" placeholder="Phone No" name="phNumber" <?php if(isset($contactUsSingleData)) {?> value="<?php echo $contactUsSingleData['phNumber']; ?>" <?php } else { ?> value="<?php echo set_value('phNumber'); ?>" <?php } ?> >
			      <span class="Error"><?php echo form_error('phNumber'); ?></span>
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="FaxNo" class="col-sm-3 control-label">Fax No</label>
			    <div class="col-sm-9">
			      <input type="tel" class="form-control" id="FaxNo" placeholder="Fax No" name="faxNumber" <?php if(isset($contactUsSingleData)) {?> value="<?php echo $contactUsSingleData['faxNumber']; ?>" <?php } else { ?> value="<?php echo set_value('faxNumber'); ?>" <?php } ?> >
			      <span class="Error"><?php echo form_error('faxNumber'); ?></span>
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="MobNo" class="col-sm-3 control-label">Mobile No</label>
			    <div class="col-sm-9">
			      <input type="tel" class="form-control" id="MobNo" placeholder="Mobile No" name="mobileNumber" <?php if(isset($contactUsSingleData)) {?> value="<?php echo $contactUsSingleData['mobileNumber']; ?>" <?php } else { ?> value="<?php echo set_value('mobileNumber'); ?>" <?php } ?> >
			      <span class="Error"><?php echo form_error('mobileNumber'); ?></span>
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="Location" class="col-sm-3 control-label">Location</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="Location" placeholder="Location" name="contLocation" <?php if(isset($contactUsSingleData)) {?> value="<?php echo $contactUsSingleData['contLocation']; ?>" <?php } else { ?> value="<?php echo set_value('contLocation'); ?>" <?php } ?> >
			      <span class="Error"><?php echo form_error('contLocation'); ?></span>
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="Area" class="col-sm-3 control-label">Area</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="Area" placeholder="Area" name="contArea" <?php if(isset($contactUsSingleData)) {?> value="<?php echo $contactUsSingleData['contArea']; ?>" <?php } else { ?> value="<?php echo set_value('contArea'); ?>" <?php } ?> >
			      <span class="Error"><?php echo form_error('contArea'); ?></span>
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="City" class="col-sm-3 control-label">City</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="City" placeholder="City" name="contCity" <?php if(isset($contactUsSingleData)) {?> value="<?php echo $contactUsSingleData['contCity']; ?>" <?php } else { ?> value="<?php echo set_value('contCity'); ?>" <?php } ?> >
			      <span class="Error"><?php echo form_error('contCity'); ?></span>
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="State" class="col-sm-3 control-label">State</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="State" placeholder="State" name="contState" <?php if(isset($contactUsSingleData)) {?> value="<?php echo $contactUsSingleData['contState']; ?>" <?php } else { ?> value="<?php echo set_value('contState'); ?>" <?php } ?> >
			      <span class="Error"><?php echo form_error('contState'); ?></span>
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="Country" class="col-sm-3 control-label">Country</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="Country" placeholder="Country" name="contCountry" <?php if(isset($contactUsSingleData)) {?> value="<?php echo $contactUsSingleData['contCountry']; ?>" <?php } else { ?> value="<?php echo set_value('contCountry'); ?>" <?php } ?> >
			      <span class="Error"><?php echo form_error('contCountry'); ?></span>
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="Pincode" class="col-sm-3 control-label">Pincode</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="Pincode" placeholder="Pincode" name="contPincode" <?php if(isset($contactUsSingleData)) {?> value="<?php echo $contactUsSingleData['contPincode']; ?>" <?php } else { ?> value="<?php echo set_value('contPincode'); ?>" <?php } ?> >
			      <span class="Error"><?php echo form_error('contPincode'); ?></span>
			    </div>
			  </div>			  
			  
			  <div class="form-group">
			    <label for="email" class="col-sm-3 control-label">E-Mail</label>
			    <div class="col-sm-9">
			      <input type="email" class="form-control" id="email" placeholder="E-Mail" name="contEmail" <?php if(isset($contactUsSingleData)) {?> value="<?php echo $contactUsSingleData['contEmail']; ?>" <?php } else { ?> value="<?php echo set_value('contEmail'); ?>" <?php } ?> >
			      <span class="Error"><?php echo form_error('contEmail'); ?></span>
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="ContMetaD" class="col-sm-3 control-label">Meta Description</label>
			    <div class="col-sm-9">
			      <textarea class="form-control" id="ContMetaD" placeholder="Meta Desccription" rows="3" name="tMetaDesc"><?php if(isset($contactUsSingleData)) { echo $contactUsSingleData['tMetaDesc']; } else { echo set_value('tMetaDesc'); } ?></textarea>
			      <span class="Error"><?php echo form_error('tMetaDesc'); ?></span>
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="" class="col-sm-3 control-label">Google map</label>
			    <div class="col-sm-9">
			    	<input type="checkbox" value="" id="googleMapSel" /> Check the check box if Google Map is require <br />
			      <input type="text" id="Latitute" placeholder="Latitute" name="gMapLatitute" <?php if(isset($contactUsSingleData)) {?> value="<?php echo $contactUsSingleData['gMapLatitute']; ?>" <?php } else { ?> value="<?php echo set_value('gMapLatitute'); ?>" <?php } ?> > 
			      <input type="text" id="Langitute" placeholder="Langitute" name="gMapLangitute" <?php if(isset($contactUsSingleData)) {?> value="<?php echo $contactUsSingleData['gMapLangitute']; ?>" <?php } else { ?> value="<?php echo set_value('gMapLangitute'); ?>" <?php } ?> >
			      <span class="Error">
			        <?php echo form_error('gMapLatitute'); ?>
              <?php echo form_error('gMapLangitute'); ?>			        
			      </span>
			    </div>
			  </div>
			  			  
			  <div class="form-group">
			    <div class="col-sm-offset-3 col-sm-9">
			      <button type="submit" class="btn btn-primary" value="submit"><?php echo $SubmitValue; ?></button>
			    </div>
			  </div>
			</form>
		</div>
	</div>
	
	<?php include 'popupModal.php'; ?>
