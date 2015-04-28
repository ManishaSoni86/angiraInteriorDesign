
	<div class="content-box-large">
		<div class="panel-heading">
	        <div class="panel-title"><?php echo $pageTitle; ?></div>
	      
	        <div class="panel-options">
	          <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
	          <a href="<?php echo base_url();?>appAdmin/usersList" data-rel="reload"><i class="">Back</i></a>
	        </div>
	    </div>
		<div class="panel-body">
      <form class="form-horizontal usersForm" role="form" method="post" action="<?php echo $action; ?>">     
          <input type="hidden" name="Id" value="<?php echo $updId; ?>">
				
			  <div class="form-group">
			    <label for="UserCode" class="col-sm-3 control-label">User/Emp Code</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" name="empCode" id="UserCode" placeholder="User/Emp Code"<?php if(isset($usersSingleData)) {?> value="<?php echo $usersSingleData['empCode']; ?>" <?php } else { ?> value="<?php echo set_value('empCode'); ?>" <?php } ?>>
			      <span class="Error"><?php echo form_error('empCode'); ?></span>
			    </div>
			  </div>
			  			  
			  <div class="form-group">
			    <label for="UserRole" class="col-sm-3 control-label">User Role</label>
			    <div class="col-sm-9">
			      <div class="col-sm-9">
    					<select class="form-control" id="UserRole" name="role">
    						<option value="0">--Select--</option>
    						<?php if($this->session->userdata('role')  ==1) {?>
    						  <option value="1" <?php if((isset($usersSingleData['role'])) && ($usersSingleData['role'] == '1')) { ?> selected="selected"  <?php } echo set_select('role', '1'); ?>>Web Developer</option>
    						<?php }
                if(($this->session->userdata('role')  ==1) || ($this->session->userdata('role')  ==2)) {?>
    						  <option value="2" <?php if((isset($usersSingleData['role'])) && ($usersSingleData['role'] == '2')) { ?> selected="selected"  <?php } echo set_select('role', '2'); ?>>Administrative</option>
    						<?php }
                 if(($this->session->userdata('role')  ==1) || ($this->session->userdata('role')  ==2) || ($this->session->userdata('role')  ==3)) {?>
    						  <option value="3" <?php if((isset($usersSingleData['role'])) && ($usersSingleData['role'] == '3')) { ?> selected="selected"  <?php } echo set_select('role', '3'); ?>>Web Manager</option>
    						<?php }
                  if(($this->session->userdata('role')  ==1) || ($this->session->userdata('role')  ==2) || ($this->session->userdata('role')  ==3) || ($this->session->userdata('role')  ==4)) {?>
    						  <option value="4" <?php if((isset($usersSingleData['role'])) && ($usersSingleData['role'] == '4')) { ?> selected="selected"  <?php } echo set_select('role', '4'); ?>>Sales</option>
    					 <?php } ?>
    					</select>
    				</div>
						<div class="col-sm-3">				
			         <input type="checkbox" name="isActive" value="1" <?php if((isset($usersSingleData['isActive'])) && ($usersSingleData['isActive'] == '1')) { ?> checked="checked" <?php } echo set_checkbox('isActive', '1'); ?>> Make user Active/Inactive 
			      </div>
			      <span class="Error"><?php echo form_error('role'); ?> <br />
			        <?php echo form_error('isActive'); ?>
			      </span>
			    </div>
			  </div>
			  
			  
			  <div class="form-group">
			    <label for="UserMail" class="col-sm-3 control-label">User E-Mail</label>
			    <div class="col-sm-9">
			      <input type="email" class="form-control" name="userEmail" id="UserMail" placeholder="User E-Mail"<?php if(isset($usersSingleData)) {?> value="<?php echo $usersSingleData['userEmail']; ?>" <?php } else { ?> value="<?php echo set_value('userEmail'); ?>" <?php } ?>>
			      <span class="Error"><?php echo form_error('userEmail'); ?></span>
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="UserName" class="col-sm-3 control-label">User Name</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" name="name" id="UserName" placeholder="User Name"<?php if(isset($usersSingleData)) {?> value="<?php echo $usersSingleData['name']; ?>" <?php } else { ?> value="<?php echo set_value('name'); ?>" <?php } ?>>
			      <span class="Error"><?php echo form_error('name'); ?></span>
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="UserPasswrd" class="col-sm-3 control-label">Password</label>
			    <div class="col-sm-9">
			      <input type="password" class="form-control" name="password" id="UserPasswrd" placeholder="Password" <?php if(isset($usersSingleData)) {?> value="<?php echo $usersSingleData['password']; ?>" <?php } else { ?> value="<?php echo set_value('password'); ?>" <?php } ?>>
			      <span class="Error"><?php echo form_error('password'); ?></span>
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <label for="ReportingLocation" class="col-sm-3 control-label">Reporting Location</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" name="reportingLocation" id="ReportingLocation" placeholder="Reporting Location"<?php if(isset($usersSingleData)) {?> value="<?php echo $usersSingleData['reportingLocation']; ?>" <?php } else { ?> value="<?php echo set_value('reportingLocation'); ?>" <?php } ?>>
			      <span class="Error"><?php echo form_error('reportingLocation'); ?></span>
			    </div>
			  </div>
			  
			  <div class="form-group">
			    <div class="col-sm-offset-3 col-sm-9">
			      <button type="submit" class="btn btn-primary" value="submit"><?php echo $SubmitValue; ?></button>
			    </div>
			  </div>
			</form>
		</div>
	</div>
