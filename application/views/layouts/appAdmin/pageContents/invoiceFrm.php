
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
	          <a href="<?php echo base_url(); ?>appAdmin/invoiceList" data-rel="reload"><i class="">Back</i></a>
	        </div>
	    </div>
		<div class="panel-body">     
          <input type="hidden" name="Id" value="<?php echo $updId; ?>">
			  			
			  
			  <div class="form-group">
			    <label for="CompanyName" class="col-sm-3 control-label">Company Name</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="CompanyName" placeholder="Company Name" name="companyName" <?php if(isset($invoiceSingleData)) {?> value="<?php echo $invoiceSingleData['companyName']; ?>" <?php } else { ?> value="<?php echo set_value('companyName'); ?>" <?php } ?>  /> 
			      <span class="Error"><?php echo form_error('companyName'); ?></span>
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="PTCName" class="col-sm-3 control-label">PTC Name </label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="PTCName" placeholder="PTC Name" name="ptcName" <?php if(isset($invoiceSingleData)) {?> value="<?php echo $invoiceSingleData['ptcName']; ?>" <?php } else { ?> value="<?php echo set_value('ptcName'); ?>" <?php } ?>>
			      <span class="Error"><?php echo form_error('ptcName'); ?></span>
			    </div>
			  </div> 
			  
			  <div class="form-group">
			    <label for="ProdName" class="col-sm-3 control-label">Product Name</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="ProdName" placeholder="Product Name" name="productName" <?php if(isset($invoiceSingleData)) {?> value="<?php echo $invoiceSingleData['productName']; ?>" <?php } else { ?> value="<?php echo set_value('productName'); ?>" <?php } ?>>
			      <span class="Error"><?php echo form_error('productName'); ?></span>
			    </div>
			  </div> 
			  
			  <div class="form-group">
			    <label for="ProdCode" class="col-sm-3 control-label">Product Code</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="ProdCode" placeholder="Product Code" name="productCode" <?php if(isset($invoiceSingleData)) {?> value="<?php echo $invoiceSingleData['productCode']; ?>" <?php } else { ?> value="<?php echo set_value('productCode'); ?>" <?php } ?>>
			      <span class="Error"><?php echo form_error('productCode'); ?></span>
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="PriceTaken" class="col-sm-3 control-label">Price Taken</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="PriceTaken" placeholder="Price Taken" name="priceTaken" <?php if(isset($invoiceSingleData)) {?> value="<?php echo $invoiceSingleData['priceTaken']; ?>" <?php } else { ?> value="<?php echo set_value('priceTaken'); ?>" <?php } ?>>
			      <span class="Error"><?php echo form_error('priceTaken'); ?></span>
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="" class="col-sm-3 control-label">Payment Mode</label>
			    <div class="col-sm-9">
              <div class="col-sm-6">
    			      <input type="radio" name="paymentMode" id="chqMode" value="chq" <?php if((isset($invoiceSingleData['paymentMode'])) && ($invoiceSingleData['paymentMode'] == 'chq')) { ?> checked="checked" <?php } echo set_radio('paymentMode', 'chq'); ?>> Chq;
    			     </div>
              <div class="col-sm-6">
    			      <input type="radio" name="paymentMode" id="cashMode" value="cash" <?php if((isset($invoiceSingleData['paymentMode'])) && ($invoiceSingleData['paymentMode'] == 'cash')) { ?> checked="checked" <?php } echo set_radio('paymentMode', 'cash'); ?>> Cash
    			    </div>
			    </div>
			  </div>
			  
			  
			  <div class="form-group">
			    <label for="ChqNo" class="col-sm-3 control-label">Chq Number</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="ChqNo" placeholder="Chq Number" name="chqNumber" <?php if(isset($invoiceSingleData)) {?> value="<?php echo $invoiceSingleData['chqNumber']; ?>" <?php } else { ?> value="<?php echo set_value('chqNumber'); ?>" <?php } ?>>
			      <span class="Error"><?php echo form_error('chqNumber'); ?></span>
			    </div>
			  </div> 
			  
			  <div class="form-group">
			    <label for="ChqAmt" class="col-sm-3 control-label">Chq Amount</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="ChqAmt" placeholder="Chq Amount" name="chqAmount" <?php if(isset($invoiceSingleData)) {?> value="<?php echo $invoiceSingleData['chqAmount']; ?>" <?php } else { ?> value="<?php echo set_value('chqAmount'); ?>" <?php } ?>>
			      <span class="Error"><?php echo form_error('chqAmount'); ?></span>
			    </div>
			  </div> 
			  
			  <div class="form-group">
			    <label for="ChqDt" class="col-sm-3 control-label">Chq Date</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="ChqDt" placeholder="Chq Date" name="chqDate" <?php if(isset($invoiceSingleData)) {?> value="<?php echo $invoiceSingleData['chqDate']; ?>" <?php } else { ?> value="<?php echo set_value('chqDate'); ?>" <?php } ?>>
			      <span class="Error"><?php echo form_error('chqDate'); ?></span>
			    </div>
			  </div> 
			  
			  <div class="form-group">
			    <label for="BnkName" class="col-sm-3 control-label">Bank Name</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="BnkName" placeholder="Bank Name" name="bankName" <?php if(isset($invoiceSingleData)) {?> value="<?php echo $invoiceSingleData['bankName']; ?>" <?php } else { ?> value="<?php echo set_value('bankName'); ?>" <?php } ?>>
			      <span class="Error"><?php echo form_error('bankName'); ?></span>
			    </div>
			  </div> 
			  
			  <div class="form-group">
			    <div class="col-sm-offset-3 col-sm-9">
			      <?php if(isset($addBtn)) { ?>        
              <span class="Error" title="Add New"><?php echo $addBtn; ?></span>
          <?php
		}
		else {
 ?>
			      <button type="submit" class="btn btn-primary" value="submit"><?php echo $SubmitValue; ?></button>
			    <?php } ?>
			    </div>
			  </div>
			</form>
		</div>
	</div>
