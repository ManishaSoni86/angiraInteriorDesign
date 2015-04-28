
	<div class="content-box-large">
      <form class="form-horizontal testimonialForm" role="form" method="post" action="<?php echo $action; ?>">
		<div class="panel-heading">
	        <div class="panel-title"><?php echo $pageTitle; ?></div>
	      
	        <div class="panel-options">            
            <a href="#" data-rel="collapse">
              <button type="reset" name="reset" class="btn btn-link" value="">
                <i class="glyphicon glyphicon-refresh"></i>
               </button>   
             </a>
	          <a href="<?php echo base_url();?>/appAdmin/testimonialList" data-rel="reload"><i class="">Back</i></a>
	        </div>
	    </div>
		<div class="panel-body">     
          <input type="hidden" name="Id" value="<?php echo $updId; ?>">
          
			  <div class="form-group">
			    <label for="TestmnlTitle" class="col-sm-3 control-label">Title</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="TestmnlTitle" placeholder="Testimonial Title" name="title" <?php if(isset($testimonialSingleData)) {?> value="<?php echo $testimonialSingleData['title']; ?>" <?php } else { ?> value="<?php echo set_value('title'); ?>" <?php } ?>>
			      <span class="Error"><?php echo form_error('title'); ?></span>
			    </div>
			  </div>
			  			  
			  <div class="form-group">
			    <label for="TestmnlImg" class="col-sm-3 control-label">Image</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="getImgValModal" placeholder="Testimonial Image" name="imageName" <?php if(isset($testimonialSingleData)) {?> value="<?php echo $testimonialSingleData['imageName']; ?>" <?php } else { ?> value="<?php echo set_value('imageName'); ?>" <?php } ?>>
			      <span class="Error"><?php echo form_error('imageName'); ?></span>
			    </div>
			  </div>
			  
			  
			  <div class="form-group">
			    <label for="TestmnlContent" class="control-label">Testimonial Content </label>
			    <div>
            <div>
              <textarea class="form-control" id="ckeditor_full" placeholder="Testimonial Content" name="description"><?php if(isset($testimonialSingleData)) { echo $testimonialSingleData['description']; } else { echo set_value('description'); } ?></textarea>
              <span class="Error"><?php echo form_error('description'); ?></span>
            </div>
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
