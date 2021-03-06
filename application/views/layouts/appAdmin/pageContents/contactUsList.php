
  <div class="content-box-large">
	<div class="panel-heading">
		<div class="panel-title" style="float: none;">Contact Us
			<div class="pull-right">
				<!--<span class="glyphicon glyphicon-refresh" title="Reload">&nbsp;</span>-->
				
				<a href="<?php echo base_url();?>appAdmin/contactUsFrm" class="btn btn-info">
					<span class="glyphicon glyphicon-plus-sign" title="Add New"></span> Add
				</a>
			</div>
			
		</div>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
    <form method="post" action="<?php echo base_url();?>appAdmin/contactUsMultipleDelete">
		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-hover" id="example">
			<thead>
				<tr>
					<th width="10"></th>
					<th>PTC Name</th>
					<th>Area</th>
					<th>City</th>
					<th width="100">Mob No</th>
					<th width="60"></th>
				</tr>
			</thead>
			<tbody>
        <?php foreach ($contactUsListData as $contactUsListData_item): ?>
        <tr class="">
          <td><input type="checkbox" name="multipleDeleteSelect[]" id="multipleDeleteSelect[]" value="<?php echo $contactUsListData_item['Id'];?>"/></td>
          <td><?php echo $contactUsListData_item['ptcTitle'];?>. <?php echo $contactUsListData_item['ptcName'];?></td>
          <td><?php echo $contactUsListData_item['contArea'];?></td>
          <td> <?php echo $contactUsListData_item['contCity'];?></td>
          <td> <?php echo $contactUsListData_item['mobileNumber'];?></td>
           <td>
             <div class="pull-right">
               <form method="post"></form>
             <form action="<?php echo base_url();?>appAdmin/contactUsFrm" method="post" style="display: inline" >
                <input type="hidden" name="Id" value="<?php echo $contactUsListData_item['Id'];?>" />
                  <button type="submit" class="btn btn-info btn-xs" title="Edit" name="edit" value="edit">
                    <span class="glyphicon glyphicon-edit"></span>
                  </button>
              </form> 
              <form action="<?php echo base_url();?>appAdmin/contactUsDelete" method="post" style="display: inline" >
                <input type="hidden" name="Id" value="<?php echo $contactUsListData_item['Id'];?>" />
                  <button type="submit" class="btn btn-info btn-xs" title="Delete" name="delete" value="delete" onclick="return confirmDelete();">
                    <span class="glyphicon glyphicon-remove-sign"></span>
                  </button>
              </form>
             <!-- <span class="glyphicon glyphicon-ban-circle"></span> -->  
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
