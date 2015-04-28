
	<div class="content-box-large">
      <form class="form-horizontal mediaForm" role="form" enctype="multipart/form-data" action="<?php echo $action; ?>" id="formModalNediaUpload" method="post">
		<div class="panel-heading">
	        <div class="panel-title"><?php echo $pageTitle; ?></div>

	        <div class="panel-options">            
            <a href="#" data-rel="collapse">
              <button type="reset" name="reset" class="btn btn-link" value="">
                <i class="glyphicon glyphicon-refresh"></i>
               </button>   
             </a>
	          <a href="<?php echo base_url();?>appAdmin/mediaList" data-rel="reload"><i class="">Back</i></a>
	        </div>
	    </div>
		<div class="panel-body">        
          <input type="hidden" name="Id" value="<?php echo $updId; ?>">
			  		
			  <div class="form-group">
			    <label for="MediaCaption" class="col-sm-3 control-label">Media Caption</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="MediaCaption" placeholder="Media Caption" name="Caption" <?php if(isset($mediaSingleData)) {?> value="<?php echo $mediaSingleData['Caption']; ?>" <?php } else { ?> value="<?php echo set_value('Caption'); ?>" <?php } ?>/> 
			      <span class="Error"><?php echo form_error('Caption'); ?></span>
			    </div>
			  </div>
			  			  
			  <div class="form-group">
			    <label for="MediaAltText" class="col-sm-3 control-label">Alt Text</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="MediaAltText" placeholder="Alt Text" name="altText" <?php if(isset($mediaSingleData)) {?> value="<?php echo $mediaSingleData['altText']; ?>" <?php } else { ?> value="<?php echo set_value('altText'); ?>" <?php } ?>>
			      <span class="Error"><?php echo form_error('altText'); ?></span>
			    </div>
			  </div>
			  			  
			  <div class="form-group">
			    <label for="MediaRelavance" class="col-sm-3 control-label">Related To</label>
			    <div class="col-sm-9">
          <select class="form-control" id="MediaRelavance" name="realetedCatagory">
            <option value="">--Related Catagory--</option>             
              <?php foreach ($categoryListData as $categoryListData_item): ?>
                <option value="<?php echo $categoryListData_item['Id']; ?>"<?php if((isset($mediaSingleData['realetedCatagory'])) && ($mediaSingleData['realetedCatagory'] == $categoryListData_item['Id'])) { ?> selected="selected"  <?php } echo set_select('realetedCatagory', $categoryListData_item['Id']);?>><?php echo $categoryListData_item['catName']; ?></option>              
              <?php endforeach ?> 
          </select>          
			      <span class="Error"><?php echo form_error('realetedCatagory'); ?></span>
			    </div> 
			  </div>
			  
			  <div class="form-group">
			    <label for="MediaImg" class="col-sm-3 control-label">Image</label>
			    <div class="col-sm-7">
			      <input type="file" class="form-control" id="MediaImg" placeholder="Image" name="imgName" value="">
			      <span class="Error"><?php echo form_error('imgName'); ?><?php if(isset($error)) echo $error; ?></span>
			    </div>
			    <div class="col-sm-2">
            <img src="<?php $this->config->item('images_path_database');?><?php if(isset($mediaSingleData)) echo $mediaSingleData['imgName'];?>" height="45" width="60" />
          </div>
			  </div>
			  
			  <div class="form-group">
			    <div class="col-sm-offset-3 col-sm-9">
			      <?php if(isset($addBtn)) { ?>        
                <span class="Error" title="Add New"><?php echo $addBtn; ?></span>
           <?php
            }
           else { ?>
            <button type="submit" value="submit" class="btn btn-primary"><?php echo $SubmitValue; ?></button>
			     <?php } ?>
			    </div>
			  </div>
			</form>
		</div>
	</div>
