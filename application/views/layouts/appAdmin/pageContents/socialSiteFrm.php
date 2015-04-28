
	<div class="content-box-large">
      <form class="form-horizontal socialSiteForm" role="form" action="<?php echo $action; ?>" method="post">
		<div class="panel-heading">
	        <div class="panel-title"><?php echo $pageTitle; ?></div>
	      
	        <div class="panel-options">            
            <a href="#" data-rel="collapse">
              <button type="reset" name="reset" class="btn btn-link" value="">
                <i class="glyphicon glyphicon-refresh"></i>
               </button>   
             </a>
	          <a href="<?php echo base_url();?>appAdmin/socialSiteList" data-rel="reload"><i class="">Back</i></a>
	        </div>
	    </div>
		<div class="panel-body">        
          <input type="hidden" name="Id" value="<?php echo $updId; ?>">
			  <div class="form-group">
			    <label for="SiteName" class="col-sm-3 control-label">Site Name</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="SiteName" placeholder="Site Name" name="SiteName" <?php if(isset($socialSiteSingleData)) {?> value="<?php echo $socialSiteSingleData['SiteName']; ?>" <?php } else { ?> value="<?php echo set_value('SiteName'); ?>" <?php } ?>>
			      <span class="Error"><?php echo form_error('SiteName'); ?></span>
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="SiteIDPageLink" class="col-sm-3 control-label">ID Page Link </label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="SiteIDPageLink" placeholder="ID Page Link" name="idPageLink" <?php if(isset($socialSiteSingleData)) {?> value="<?php echo $socialSiteSingleData['idPageLink']; ?>" <?php } else { ?> value="<?php echo set_value('idPageLink'); ?>" <?php } ?>>
			      <span class="Error"><?php echo form_error('idPageLink'); ?></span>
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="SiteIcon" class="col-sm-3 control-label">Site Icon</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="getImgValModal" placeholder="Site Icon" name="siteIcon" <?php if(isset($socialSiteSingleData)) {?> value="<?php echo $socialSiteSingleData['siteIcon']; ?>" <?php } else { ?> value="<?php echo set_value('siteIcon'); ?>" <?php } ?>>
			      <span class="Error"><?php echo form_error('siteIcon'); ?></span>
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="MkVisible" class="col-sm-3 control-label">Make Visible</label>
			    <div class="col-sm-9">
			      <input type="checkbox" id="MkVisible" value="1" name="isVisible" <?php if((isset($socialSiteSingleData['isVisible'])) && ($socialSiteSingleData['isVisible'] == '1')) { ?> checked="checked" <?php } echo set_checkbox('isVisible', '1'); ?> > &nbsp; Please check if want to display. 
			      <span class="Error"><?php echo form_error('isVisible'); ?></span>
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
