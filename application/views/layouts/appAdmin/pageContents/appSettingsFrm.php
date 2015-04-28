
	<div class="content-box-large">
      <form class="form-horizontal appSettingsForm" role="form" action="<?php echo $action; ?>" method="post">
        
		<div class="panel-heading">
	        <div class="panel-title"><?php echo $pageTitle; ?></div>
	        <div class="panel-options">
	          <a href="#" data-rel="collapse">
	            <button type="reset" name="reset" class="btn btn-link" value="">
	              <i class="glyphicon glyphicon-refresh"></i>
	             </button>   
	           </a>
	          <a href="<?php echo base_url();?>appAdmin/appSettingsList" data-rel="reload"><i class="">Back</i></a>
	        </div>
	    </div>
	    
		<div class="panel-body">			  
          <input type="hidden" name="Id" value="<?php echo $updId; ?>">
			  <div class="form-group">
			    <label for="CompanyName" class="col-sm-3 control-label">Company Name</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" name="companyName" <?php if(isset($siteSettingSingleData)) {?> value="<?php echo $siteSettingSingleData['companyName']; ?>" <?php } else { ?> value="<?php echo set_value('companyName'); ?>" <?php } ?>  id="CompanyName" placeholder="Company Name">
			      <span class="Error"><?php echo form_error('companyName'); ?></span>
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="PunchLine" class="col-sm-3 control-label">Punch Line</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" name="companyPunchline" id="PunchLine" placeholder="Punch Line" <?php if(isset($siteSettingSingleData)) {?> value="<?php echo $siteSettingSingleData['companyPunchline']; ?>" <?php } else { ?> value="<?php echo set_value('companyPunchline'); ?>" <?php } ?>>
			      <span class="Error"> <?php echo form_error('companyPunchline'); ?></span>
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="CompLogo" class="col-sm-3 control-label">Logo</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" name="companyLogo" id="getImgValModal" placeholder="Logo" <?php if(isset($siteSettingSingleData)) {?> value="<?php echo $siteSettingSingleData['companyLogo']; ?>" <?php } else { ?> value="<?php echo set_value('companyLogo'); ?>" <?php } ?>>
			      <span class="Error"><?php echo form_error('companyLogo'); ?></span>
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="BascDtlKeywrd" class="col-sm-3 control-label">Keyword</label>
			    <div class="col-sm-9">
			      <textarea class="form-control" name="mainKeywords" id="BascDtlKeywrd" placeholder="Keyword" rows="3"><?php if(isset($siteSettingSingleData)) { echo $siteSettingSingleData['mainKeywords']; } else { echo set_value('mainKeywords'); } ?></textarea>
			      <span class="Error"><?php echo form_error('mainKeywords'); ?></span>
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="BascDtlMetaD" class="col-sm-3 control-label">Meta Description</label>
			    <div class="col-sm-9">
			      <textarea class="form-control" name="metaDesc" id="BascDtlMetaD" placeholder="Meta Desccription" rows="3"><?php if(isset($siteSettingSingleData)) { echo $siteSettingSingleData['metaDesc']; } else { echo set_value('metaDesc'); } ?></textarea>
			      <span class="Error"><?php echo form_error('metaDesc'); ?></span>
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label class="col-sm-3 control-label">Limit</label>
			    <div class="col-sm-9">
			      
          <div class="col-sm-3">
            <label for="NewsLimit" class="control-label">News Limit</label>
            <input type="text" class="form-control" name="newsLimit" id="NewsLimit" placeholder="News Limit" <?php if(isset($siteSettingSingleData)) { ?> value="<?php echo $siteSettingSingleData['newsLimit']; ?>" <?php } else { ?> value="<?php echo set_value('newsLimit'); ?>" <?php } ?>>
          </div>
          
          <div class="col-sm-3">
          <label for="ProductLimit" class="control-label">Product Limit</label>
            <input type="text" class="form-control" name="productsLimit" id="ProductLimit" placeholder="Product Limit" <?php if(isset($siteSettingSingleData)) {?> value="<?php echo $siteSettingSingleData['productsLimit']; ?>" <?php } else { ?> value="<?php echo set_value('productsLimit'); ?>" <?php } ?>>
          </div>
          
          <div class="col-sm-3">
          <label for="MediaLimit" class="control-label">Media Limit</label>
            <input type="text" class="form-control" name="mediaLimit" id="MediaLimit" placeholder="Gallery Limit" <?php if(isset($siteSettingSingleData)) {?> value="<?php echo $siteSettingSingleData['mediaLimit']; ?>" <?php } else { ?> value="<?php echo set_value('mediaLimit'); ?>" <?php } ?>>
          </div>
          
          <div class="col-sm-3">
          <label for="SliderImageLimit" class="control-label">Slider Img Limit</label>
            <input type="text" class="form-control" name="sliderImgLimit" id="SliderImageLimit" placeholder="Slider Image Limit" <?php if(isset($siteSettingSingleData)) {?> value="<?php echo $siteSettingSingleData['sliderImgLimit']; ?>" <?php } else { ?> value="<?php echo set_value('sliderImgLimit'); ?>" <?php } ?>>
          </div>			      
			      <span class="Error">
			        <?php echo form_error('newsLimit'); ?>
			        <?php echo form_error('productsLimit'); ?>
			        <?php echo form_error('mediaLimit'); ?>
			        <?php echo form_error('sliderImgLimit'); ?>
			     </span>
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <div class="col-sm-offset-3 col-sm-9">
			      <button type="submit" value="submit" class="btn btn-primary"><?php echo $SubmitValue; ?></button>
			    </div>
			  </div>
			</form>
		</div>
	</div>
