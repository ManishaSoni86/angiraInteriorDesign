
	<div class="content-box-large">
      <form class="form-horizontal companyProfileForm" role="form" action="<?php echo $action; ?>" method="post">
		<div class="panel-heading">
	        <div class="panel-title"><?php echo $pageTitle; ?></div>
	      
	        <div class="panel-options">            
            <a href="#" data-rel="collapse">
              <button type="reset" name="reset" class="btn btn-link" value="">
                <i class="glyphicon glyphicon-refresh"></i>
               </button>   
             </a>
	          <a href="<?php echo base_url();?>appAdmin/companyProfileList" data-rel="reload"><i class="">Back</i></a>
	        </div>
	    </div>
		<div class="panel-body">        
        <input type="hidden" name="Id" value="<?php echo $updId; ?>">			  
			  <div class="form-group">
			    <label for="ckeditor_full" class=" control-label">Company Profile</label>
			    <div>
            <div>
              <textarea class="form-control" id="ckeditor_full" placeholder="Testimonial Content" name="companyProfile"><?php if(isset($companyProfileSingleData)) { echo $companyProfileSingleData['companyProfile']; } else { echo set_value('companyProfile'); } ?></textarea>
              <span class="Error"><?php echo form_error('companyProfile'); ?></span>
            </div>
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="CompImg" class="col-sm-3 control-label">Image</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="getImgValModal" placeholder="Image" name="Img" <?php if(isset($companyProfileSingleData)) {?> value="<?php echo $companyProfileSingleData['Img']; ?>" <?php } else { ?> value="<?php echo set_value('Img'); ?>" <?php } ?>>
			      <span class="Error"><?php echo form_error('Img'); ?></span>
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="BascDtlKeywrd" class="col-sm-3 control-label">Keyword</label>
			    <div class="col-sm-9">
			      <textarea class="form-control" id="BascDtlKeywrd" placeholder="Keyword" rows="3" name="Keywords" ><?php if(isset($companyProfileSingleData)) { echo $companyProfileSingleData['Keywords']; } else { echo set_value('Keywords'); } ?></textarea>
			      <span class="Error"><?php echo form_error('Keywords'); ?></span>
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="BascDtlMetaD" class="col-sm-3 control-label">Meta Description</label>
			    <div class="col-sm-9">
			      <textarea class="form-control" id="BascDtlMetaD" placeholder="Meta Desccription" rows="3" name="metaDesc" ><?php if(isset($companyProfileSingleData)) { echo $companyProfileSingleData['metaDesc']; } else { echo set_value('metaDesc'); } ?></textarea>
			      <span class="Error"><?php echo form_error('metaDesc'); ?></span>
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