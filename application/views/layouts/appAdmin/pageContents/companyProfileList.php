
  <div class="content-box-large">
	<div class="panel-heading">
		<div class="panel-title" style="float: none;">Company Profile
			<div class="pull-right">
				<!--<span class="glyphicon glyphicon-refresh" title="Reload">&nbsp;</span>-->
				
				<?php if(isset($addBtn)) { ?>        
         <span class="Error" title="Add New"><?php echo $addBtn; ?></span>
         <?php
        }
        else { ?>
        <a href="<?php echo base_url();?>appAdmin/companyProfileFrm" class="btn btn-info">
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
					<th width="10"></th>
					<th>Company Profile</th>
					<th width="60">Image</th>
					<th width="60"></th>
				</tr>
			</thead>
			<tbody>
			   <?php foreach ($companyProfileListData as $companyProfileListData_item): ?>
				  <tr class="">
          <td><input type="checkbox" /></td>
          <td><?php echo $companyProfileListData_item['companyProfile'];?></td>
          <td>
            <img height="45" width="60" src="<?php $this->config->item('images_path_database'); echo $companyProfileListData_item['Img'];?>" /></td>
           <td>
             <div class="pull-right">
             <form action="<?php echo base_url();?>appAdmin/companyProfileFrm" method="post" style="display: inline" >
                <input type="hidden" name="Id" value="<?php echo $companyProfileListData_item['Id'];?>" />
                  <button type="submit" class="btn btn-info btn-xs" title="Edit" name="edit" value="edit">
                    <span class="glyphicon glyphicon-edit"></span>
                  </button>
              </form> 
              <form action="<?php echo base_url();?>appAdmin/companyProfileDelete" method="post" style="display: inline" >
                <input type="hidden" name="Id" value="<?php echo $companyProfileListData_item['Id'];?>" />
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