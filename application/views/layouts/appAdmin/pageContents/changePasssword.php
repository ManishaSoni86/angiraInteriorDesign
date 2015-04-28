
	<div class="content-box-large">
      <form class="form-horizontal changePasswordForm" role="form" method="post" action="changePasswordUpdate">
		<div class="panel-heading">
	        <div class="panel-title">Change Password</div>
	      
	        <div class="panel-options">            
            <a href="#" data-rel="collapse">
              <button type="reset" name="reset" class="btn btn-link" value="">
                <i class="glyphicon glyphicon-refresh"></i>
               </button>   
             </a>
	        </div>
	    </div>
		<div class="panel-body">
			  <div class="form-group">
			    <label for="UserName" class="col-sm-3 control-label">User Name</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="UserName" placeholder="User Name" name="name" value="<?php echo $this->session->userdata('name');?>">
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="OldPasswrd" class="col-sm-3 control-label">Old Password</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="OldPasswrd" placeholder="Old Password" name="oldPassword" value="<?php echo set_value('oldPassword'); ?>">
			      <span class="Error"><?php echo form_error('oldPassword'); ?></span>
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="NewPasswrd" class="col-sm-3 control-label">New Password</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="NewPasswrd" placeholder="New Password" name="newPassword" value="<?php echo set_value('newPassword'); ?>">
			      <span class="Error"><?php echo form_error('newPassword'); ?></span>
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="ConfrmPasswrd" class="col-sm-3 control-label">Confirm Password</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="ConfrmPasswrd" placeholder="Confirm Password" name="password" value="<?php echo set_value('password'); ?>">
			      <span class="Error"><?php echo form_error('password'); ?></span>
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <div class="col-sm-offset-3 col-sm-9">
			      <button type="submit" class="btn btn-primary" value="submit">Submit</button>
			    </div>
			  </div>
			</form>
		</div>
	</div>
