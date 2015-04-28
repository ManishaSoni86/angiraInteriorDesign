
	<div class="content-box-large">
      <form class="form-horizontal newsForm" role="form" method="post" action="<?php echo $action; ?>">
		<div class="panel-heading">
	        <div class="panel-title"><?php echo $pageTitle; ?></div>
	      
	        <div class="panel-options">            
            <a href="#" data-rel="collapse">
              <button type="reset" name="reset" class="btn btn-link" value="">
                <i class="glyphicon glyphicon-refresh"></i>
               </button>   
             </a>
	          <a href="<?php echo base_url();?>appAdmin/newsList" data-rel="reload"><i class="">Back</i></a>
	        </div>
	    </div>
		<div class="panel-body">     
          <input type="hidden" name="Id" value="<?php echo $updId; ?>">
          
			  <div class="form-group">
			    <label for="NewsTitle" class="col-sm-3 control-label">Title</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="NewsTitle" placeholder="News Title" name="title" <?php if(isset($newsSingleData)) {?> value="<?php echo $newsSingleData['title']; ?>" <?php } else { ?> value="<?php echo set_value('title'); ?>" <?php } ?>>
			      <span class="Error"><?php echo form_error('title'); ?></span>
			    </div>
			  </div>
			  			  
			  <div class="form-group">
			    <label for="NewsImg" class="col-sm-3 control-label">Image</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="getImgValModal" placeholder="News Image" name="imageName" <?php if(isset($newsSingleData)) {?> value="<?php echo $newsSingleData['imageName']; ?>" <?php } else { ?> value="<?php echo set_value('imageName'); ?>" <?php } ?>>
			      <span class="Error"><?php echo form_error('imageName'); ?></span>
			    </div>
			  </div>
			  
			  
			  <div class="form-group">
			    <label for="NewsContent" class="control-label">News Content </label>
			    <div>
            <div>
              <textarea class="form-control" id="ckeditor_full" placeholder="News Content" name="description"><?php if(isset($newsSingleData)) { echo $newsSingleData['description']; } else { echo set_value('description'); } ?></textarea>
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
