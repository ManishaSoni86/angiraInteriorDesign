
	<div class="content-box-large">
      <form class="form-horizontal productForm" role="form" method="post" action="<?php echo $action; ?>">
		<div class="panel-heading">
	        <div class="panel-title"><?php echo $pageTitle; ?></div>
	      
	        <div class="panel-options">            
            <a href="#" data-rel="collapse">
              <button type="reset" name="reset" class="btn btn-link" value="">
                <i class="glyphicon glyphicon-refresh"></i>
               </button>   
             </a>
	          <a href="<?php echo base_url();?>appAdmin/ProductsList" data-rel="reload"><i class="">Back</i></a>
	        </div>
	    </div>
		<div class="panel-body">     
          <input type="hidden" name="Id" value="<?php echo $updId; ?>">
			  			  
			  <div class="form-group">
			    <label for="ProdCatagry" class="col-sm-3 control-label">Product Catagory</label>
			    <div class="col-sm-9">
					<select class="form-control selectpicker" id="ProdCatagry" name="categoryId">
						<option value="">--Product Catagory--</option>             
              <?php foreach ($categoryListData as $categoryListData_item): ?>
                <option value="<?php echo $categoryListData_item['Id']; ?>"<?php if((isset($productSingleData['categoryId'])) && ($productSingleData['categoryId'] == $categoryListData_item['Id'])) { ?> selected="selected"  <?php } echo set_select('categoryId', $categoryListData_item['Id']);?>><?php echo $categoryListData_item['catName']; ?></option>              
              <?php endforeach ?> 
					</select>					 
			      <span class="Error"><?php echo form_error('categoryId'); ?></span>
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="ProdName" class="col-sm-3 control-label">Product Name</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="ProdName" placeholder="Product Name" name="name" <?php if(isset($productSingleData)) {?> value="<?php echo $productSingleData['name']; ?>" <?php } else { ?> value="<?php echo set_value('name'); ?>" <?php } ?>  /> 
			      <span class="Error"><?php echo form_error('name'); ?></span>
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="ProdFeatureImg" class="col-sm-3 control-label">Product Feature Image </label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="getImgValModal" placeholder="Product Feature Image" name="imageFeatured" <?php if(isset($productSingleData)) {?> value="<?php echo $productSingleData['imageFeatured']; ?>" <?php } else { ?> value="<?php echo set_value('imageFeatured'); ?>" <?php } ?>>
			      <span class="Error"><?php echo form_error('imageFeatured'); ?></span>
			    </div>
			  </div>  
			     
        <div class="form-group">
         <label for="ckeditor_full" class="control-label">Product Description</label>
          <div>
            <div>
            <textarea class="form-control" id="ckeditor_full" placeholder="Product Description" rows="3" name="description"><?php if(isset($productSingleData)) { echo $productSingleData['description']; } else { echo set_value('description'); } ?></textarea>
            <span class="Error"><?php echo form_error('description'); ?></span>
            </div>
          </div>
        </div>
			  
			  <div class="form-group">
			    <label for="ProdKeywrd" class="col-sm-3 control-label">Keyword</label>
			    <div class="col-sm-9">
			      <textarea class="form-control" id="ProdKeywrd" placeholder="Keyword" rows="3" name="Keywords"><?php if(isset($productSingleData)) { echo $productSingleData['Keywords']; } else { echo set_value('Keywords'); } ?></textarea>
			      <span class="Error"><?php echo form_error('Keywords'); ?></span>
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="ProdMetaD" class="col-sm-3 control-label">Meta Description</label>
			    <div class="col-sm-9">
			      <textarea class="form-control" id="ProdMetaD" placeholder="Meta Desccription" rows="3" name="metaDesc"><?php if(isset($productSingleData)) { echo $productSingleData['metaDesc']; } else { echo set_value('metaDesc'); } ?></textarea>
			      <span class="Error"><?php echo form_error('metaDesc'); ?></span>
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="ProdTat" class="col-sm-3 control-label">TAT</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="ProdTat" placeholder="TAT" name="supplyTAT" <?php if(isset($productSingleData)) {?> value="<?php echo $productSingleData['supplyTAT']; ?>" <?php } else { ?> value="<?php echo set_value('supplyTAT'); ?>" <?php } ?>>
			      <span class="Error"><?php echo form_error('supplyTAT'); ?></span>
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="" class="col-sm-3 control-label">Price</label>
			    <div class="col-sm-9">
              <div class="col-sm-6">
    			      <input type="radio" name="Price" id="PriceRange"> Price Range &nbsp;
    			     </div>
              <div class="col-sm-6">
    			      <input type="radio" name="Price" id="PriceExact"> Exact Price
    			    </div>
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="" class="col-sm-3 control-label">Price Level</label>
			    <div class="col-sm-9">
              <div class="col-sm-6" id="priceRangeField">
                 <div class="col-sm-6">
    			         <input type="text" id="MinPrice" class=" form-control" placeholder="Minimum Price" name="minPrice" <?php if(isset($productSingleData)) {?> value="<?php echo $productSingleData['minPrice']; ?>" <?php } else { ?> value="<?php echo set_value('minPrice'); ?>" <?php } ?>>
    			       </div>
                <div class="col-sm-6"> 
    			         <input type="text" id="MaxPrice" class=" form-control" placeholder="Maximun Price" name="maxPrice" <?php if(isset($productSingleData)) {?> value="<?php echo $productSingleData['maxPrice']; ?>" <?php } else { ?> value="<?php echo set_value('maxPrice'); ?>" <?php } ?>>
    			      </div>
    			    </div>
    			    
              <div class="col-sm-6" id="exactPriceField">
                 <div class="col-sm-6">
                   <input type="text" id="MRP" class=" form-control" placeholder="MRP" name="MRP" <?php if(isset($productSingleData)) {?> value="<?php echo $productSingleData['MRP']; ?>" <?php } else { ?> value="<?php echo set_value('MRP'); ?>" <?php } ?>>
                 </div>
                <div class="col-sm-6"> 
                   <input type="text" id="Discount" class=" form-control" placeholder="Discount %" name="discountPercentage" <?php if(isset($productSingleData)) {?> value="<?php echo $productSingleData['discountPercentage']; ?>" <?php } else { ?> value="<?php echo set_value('discountPercentage'); ?>" <?php } ?>>
                </div>
              </div>
			      <span class="Error">
			        <?php echo form_error('minPrice'); ?>
			        <?php echo form_error('maxPrice'); ?>
			        <?php echo form_error('MRP'); ?>
			        <?php echo form_error('discountPercentage'); ?>
			     </span>
			    </div>
			  </div>
			  
			  
			  <div class="form-group">
			    <div class="col-sm-offset-3 col-sm-9">
			      <div class="checkbox col-sm-6">
			        <label>
			          <input type="checkbox" name="isFetaure" value="1" <?php if((isset($productSingleData['isFetaure'])) && ($productSingleData['isFetaure'] == '1')) { ?> checked="checked" <?php } echo set_checkbox('isFetaure', '1'); ?>> Feature Product
			        </label>
			      </div>
			      <div class="checkbox col-sm-6">
			        <label>
			          <input name="inStock" value="1" type="checkbox" <?php if((isset($productSingleData['inStock'])) && ($productSingleData['inStock'] == '1')) { ?> checked="checked" <?php } echo set_checkbox('inStock', '1'); ?>> Stock Avalibility
			        </label>
			      </div>
			      <span class="Error">
			         <?php echo form_error('isFetaure'); ?>
               <?php echo form_error('inStock'); ?>			        
			      </span>
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
