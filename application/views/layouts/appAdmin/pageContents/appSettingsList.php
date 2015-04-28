
  <div class="content-box-large">
	<div class="panel-heading">
		<div class="panel-title" style="float: none;">App Settings
			<div class="pull-right">
				<!--<span class="glyphicon glyphicon-refresh" title="Reload">&nbsp;</span>-->
				
				<?php if(isset($addBtn)) { ?>				 
         <span class="Error" title="Add New"><?php echo $addBtn; ?></span>
         <?php
        }
        else { ?>
				<a href="<?php echo base_url();?>appAdmin/appSettingsFrm" class="btn btn-info">
					<span class="glyphicon glyphicon-plus-sign" title="Add New"></span> Add
				</a>
				<?php } ?>
			</div>
		</div>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-hover" id="example">
			<thead>
				<tr>
					<th></th>
					<th>Company Name</th>
					<th>Punch Line</th>
					<th>Logo</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
			  <?php foreach ($siteSettingListData as $siteSettingListData_item): ?>
				<tr class="">
					<td><input type="checkbox" /></td>
					<td><?php echo $siteSettingListData_item['companyName'];?></td>
					<td><?php echo $siteSettingListData_item['companyPunchline'];?></td>
          <td><img height="45" width="60" src="<?php echo $this->config->item('images_path_database'); echo $siteSettingListData_item['companyLogo'];?>" /></td>
					 <td>
					   <div class="pull-right">
					   <form action="<?php echo base_url();?>appAdmin/appSettingsFrm" method="post" style="display: inline" >
                <input type="hidden" name="Id" value="<?php echo $siteSettingListData_item['Id'];?>" />
                  <button type="submit" class="btn btn-info btn-xs" title="Edit" name="edit" value="edit">
                    <span class="glyphicon glyphicon-edit"></span>
                  </button>
              </form> 
              <form action="<?php echo base_url();?>appAdmin/appSettingsDelete" method="post" style="display: inline" >
                <input type="hidden" name="Id" value="<?php echo $siteSettingListData_item['Id'];?>" />
                  <button type="submit" class="btn btn-info btn-xs" title="Delete" name="delete" value="delete" onclick="return confirmDelete();">
                    <span class="glyphicon glyphicon-remove-sign"></span>
                  </button>
		         	</form>  
		         	</div>
			      </td>
				</tr>
				<?php endforeach ?>	
			</tbody>
		</table>
		</div> <!-- Responsive Tabble Div Close -->
	</div><!--Panel Body Close -->
</div> <!-- Contain Box Close -->

