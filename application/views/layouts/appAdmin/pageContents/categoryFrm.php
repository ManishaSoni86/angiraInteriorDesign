
	<div class="content-box-large">
	  
   <form class="form-horizontal categoryForm" role="form" enctype="multipart/form-data" action="<?php echo $action; ?>" id="formModalNediaUpload" method="post">
		
		<div class="panel-heading">
	        <div class="panel-title"><?php echo $pageTitle; ?></div>

	        <div class="panel-options">	          
            <a href="#" data-rel="collapse">
              <button type="reset" name="reset" class="btn btn-link" value="">
                <i class="glyphicon glyphicon-refresh"></i>
               </button>   
             </a>
	          <a href="<?php echo base_url();?>appAdmin/categoryList" data-rel="reload"><i class="">Back</i></a>
	        </div>
	    </div>
	    
		<div class="panel-body">        
          <input type="hidden" name="Id" value="<?php echo $updId; ?>">
			  		
			  <div class="form-group">
			    <label for="CategoryName" class="col-sm-3 control-label">Category Name</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="CategoryName" placeholder="Category Name" name="catName" <?php if(isset($categorySingleData)) {?> value="<?php echo $categorySingleData['catName']; ?>" <?php } else { ?> value="<?php echo set_value('catName'); ?>" <?php } ?>/> 
			      <span class="Error"><?php echo form_error('catName'); ?></span>
			    </div>
			  </div>
			  			  
			  <div class="form-group">
			    <label for="CategoryDetail" class="col-sm-3 control-label">Category Detail</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="CategoryDetail" placeholder="Category Detail" name="catDetail" <?php if(isset($categorySingleData)) {?> value="<?php echo $categorySingleData['catDetail']; ?>" <?php } else { ?> value="<?php echo set_value('catDetail'); ?>" <?php } ?>>
			      <span class="Error"><?php echo form_error('catDetail'); ?></span>
			    </div>
			  </div>
                
        <div class="form-group">
          <label for="CategoryParent" class="col-sm-3 control-label">Parent Category</label>
          <div class="col-sm-9">
            <select name="parentCat" class="form-control">
              <option value="">Parent Category</option>              
              <?php foreach ($categoryListData as $categoryListData_item): ?>
                <option value="<?php echo $categoryListData_item['Id']; ?>"<?php if((isset($categorySingleData['parentCat'])) && ($categorySingleData['parentCat'] == $categoryListData_item['Id'])) { ?> selected="selected"  <?php } echo set_select('parentCat', $categoryListData_item['Id']);?>><?php echo $categoryListData_item['catName']; ?></option>              
              <?php endforeach ?>         
            </select>`   
            <span class="Error"><?php echo form_error('parentCat'); ?></span>
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
