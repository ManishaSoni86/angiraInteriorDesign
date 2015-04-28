
	<div class="content-box-large">
      <form class="form-horizontal sliderSettingsForm" role="form" action="<?php echo $action;?>" method="post">
		<div class="panel-heading">
	        <div class="panel-title"><?php echo $pageTitle; ?></div>
	      
	        <div class="panel-options">            
            <a href="#" data-rel="collapse">
              <button type="reset" name="reset" class="btn btn-link" value="">
                <i class="glyphicon glyphicon-refresh"></i>
               </button>   
             </a>
	          <a href="<?php echo base_url();?>appAdmin/sliderSettingsList" data-rel="reload"><i class="">Back</i></a>
	        </div>
	    </div>
		<div class="panel-body">        
          <input type="hidden" name="Id" value="<?php echo $updId; ?>">
			  			  
				  <div class="form-group">
			    <label for="PTCImg" for="PtcImgbtn" class="col-sm-3 control-label">Slide Main Image</label>
			    <div class="col-sm-5">
			      <input type="text" class="form-control" id="ptcImg" placeholder="Slide Main Image" name="slideMainImage" <?php if(isset($sliderSettingSingleData)) {?> value="<?php echo $sliderSettingSingleData['slideMainImage']; ?>" <?php } else { ?> value="<?php echo set_value('slideMainImage'); ?>" <?php } ?>>
			      <span class="Error"><?php echo form_error('slideMainImage'); ?></span>
			    </div>
			    <div class="col-sm-2">
            <img src="" id="ptcImgShow" width="60" height="45" />
          </div>
			    <div class="col-sm-2">
			      <button type="button" class="btn btn-primary" id="PtcImgbtn" value="ptcImgSel" data-toggle="modal" data-target="#popupModal" >Select Img</button>
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="OffceImg" for="OffceImgBtn" class="col-sm-3 control-label">Slide Icon Image</label>
			    <div class="col-sm-5">
			      <span id="sliderIconImgChooseContainer">
			          <input type="checkbox" id="sliderIconImgChoose" name="SliderIconImg" value="" /> Same As Above.
			      </span>
			      <input type="text" class="form-control" id="OffceImg" placeholder="Slide Icon Image" name="siideIconImage" <?php if(isset($sliderSettingSingleData)) {?> value="<?php echo $sliderSettingSingleData['siideIconImage']; ?>" <?php } else { ?> value="<?php echo set_value('siideIconImage'); ?>" <?php } ?>>
			      <span class="Error"><?php echo form_error('siideIconImage'); ?></span>
			    </div>
			    <div class="col-sm-2">
            <img src="" id="officeImgShow" width="60" height="45" />
          </div>
			    <div class="col-sm-2" id="sliderIconImgBtnContainer">
            <button type="button" class="btn btn-primary" id="OffceImgBtn" value="officeImgSel" data-toggle="modal" data-target="#popupModal" >Select Img</button>
          </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="SliderTitle" class="col-sm-3 control-label">Slide Title</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="SliderTitle" placeholder="Slide Title" name="slideTitle" <?php if(isset($sliderSettingSingleData)) {?> value="<?php echo $sliderSettingSingleData['slideTitle']; ?>" <?php } else { ?> value="<?php echo set_value('slideTitle'); ?>" <?php } ?> >
			      <span class="Error"><?php echo form_error('slideTitle'); ?></span>
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="SliderDesc" class="col-sm-3 control-label">Slide Description</label>
			    <div class="col-sm-9">
			      <textarea class="form-control" id="SliderDesc" placeholder="Slide Desccription" rows="3" name="slideDesc"><?php if(isset($sliderSettingSingleData)) { echo $sliderSettingSingleData['slideDesc']; } else { echo set_value('slideDesc'); } ?></textarea>
			      <span class="Error"><?php echo form_error('slideDesc'); ?></span>
			    </div>
			  </div>
        
        <div class="form-group">
          <label for="SliderHyperlink" class="col-sm-3 control-label">Slide Hyperlink</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="SliderHyperlink" placeholder="Slide Hyperlink" name="slideHyperlink" <?php if(isset($sliderSettingSingleData)) {?> value="<?php echo $sliderSettingSingleData['slideHyperlink']; ?>" <?php } else { ?> value="<?php echo set_value('slideHyperlink'); ?>" <?php } ?> >
            <span class="Error"><?php echo form_error('slideHyperlink'); ?></span>
          </div>
        </div>
        			  			  
			  <div class="form-group">
			    <div class="col-sm-offset-3 col-sm-9">
			    <?php if(isset($addBtn)) { ?>        
              <span class="Error" title="Add New"><?php echo $addBtn; ?></span>
          <?php
            }
          else { ?>
			      <button type="submit" class="btn btn-primary" value="submit"><?php echo $SubmitValue; ?></button>
			     <?php } ?>
			    </div>
			  </div>
			</form>
		</div>
	</div>
	
	<?php include 'popupModal.php'; ?>
	


