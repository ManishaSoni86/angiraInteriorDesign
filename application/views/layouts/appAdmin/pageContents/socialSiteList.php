
  <div class="content-box-large">
	<div class="panel-heading">
		<div class="panel-title" style="float: none;">Social Site
			<div class="pull-right">
				<!--<span class="glyphicon glyphicon-refresh" title="Reload">&nbsp;</span> -->
				
				<a href="<?php echo base_url();?>appAdmin/socialSiteFrm" class="btn btn-info">
					<span class="glyphicon glyphicon-plus-sign" title="Add New"></span> Add
				</a>
			</div>
		</div>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
    <form method="post" action="<?php echo base_url();?>appAdmin/socialSiteMultipleDelete">
		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-hover" id="example">
			<thead>
				<tr>
					<th width="10"></th>
					<th width="100">Site Name</th>
					<th>Site Link</th>
					<th width="60">Logo</th>
					<th width="75">Visibility</th>
					<th width="60"></th>
				</tr>
			</thead>
			<tbody>
        <?php foreach ($socialSiteListData as $socialSiteListData_item): ?>
        <tr class="">
          <td><input type="checkbox" name="multipleDeleteSelect[]" id="multipleDeleteSelect[]" value="<?php echo $socialSiteListData_item['Id'];?>"/></td>
          <td><?php echo $socialSiteListData_item['SiteName'];?></td>
          <td><?php echo $socialSiteListData_item['idPageLink'];?></td>
          <td><img height="45" width="60" src="<?php echo $this->config->item('images_path_database');?><?php echo $socialSiteListData_item['siteIcon'];?>" /></td>
          <td class="center"> 
            <?php 
              if($socialSiteListData_item['isVisible'] == '0'){
                echo 'No';
               }
               else {
                 echo 'Yes';
               }
               ?></td>
           
           <td>
             <div class="pull-right">
               <form method="post"></form>
             <form action="<?php echo base_url();?>appAdmin/socialSiteFrm" method="post" style="display: inline" >
                <input type="hidden" name="Id" value="<?php echo $socialSiteListData_item['Id'];?>" />
                  <button type="submit" class="btn btn-info btn-xs" title="Edit" name="edit" value="edit">
                    <span class="glyphicon glyphicon-edit"></span>
                  </button>
              </form> 
              <form action="<?php echo base_url();?>appAdmin/socialSiteDelete" method="post" style="display: inline" >
                <input type="hidden" name="Id" value="<?php echo $socialSiteListData_item['Id'];?>" />
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
    <div><button type="submit" name="multipleDelete" value="multipleDel" class="input-sm btn btn-info" onclick="return confirmDelete();">Multiple Delete</button></div>
    </form>
		</div> <!-- Responsive Tabble Div Close -->
	</div><!--Panel Body Close -->
</div> <!-- Contain Box Close -->
