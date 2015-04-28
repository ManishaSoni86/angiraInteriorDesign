
  <div class="content-box-large">
	<div class="panel-heading">
		<div class="panel-title" style="float: none;">Users
			<div class="pull-right">
				<!--<span class="glyphicon glyphicon-refresh" title="Reload">&nbsp;</span>-->
				
				<a href="<?php echo base_url();?>appAdmin/usersFrm" class="btn btn-info">
					<span class="glyphicon glyphicon-plus-sign" title="Add New"></span> Add
				</a>
			</div>
		</div>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
    <form method="post" action="<?php echo base_url();?>appAdmin/usersMultipleDelete">
		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-hover" id="example">
			<thead>
				<tr>
					<th width="10"></th>
          <th>User Name</th>
					<th>User/Emp Code</th>
					<th>User Role</th>
					<th>User Active/Inactive</th>
					<th width="60"></th>
				</tr>
			</thead>
			<tbody>
         <?php foreach ($usersListData as $usersListData_item): ?>
			  <tr class="">
        <td><input type="checkbox" name="multipleDeleteSelect[]" id="multipleDeleteSelect[]" value="<?php echo $usersListData_item['Id'];?>"/></td>
          <td><?php echo $usersListData_item['name'];?></td>
          <td><?php echo $usersListData_item['empCode'];?></td>
          <td><?php echo $usersListData_item['role'];?></td>
          <td>
           <?php
            if($usersListData_item['isActive']  == '0'){
              echo "No";
            }
            else {
                echo "Yes";
            }
           ?> 
          </td>
          
           <td>
             <div class="pull-right">
               <form method="post"></form>
             <form action="<?php echo base_url();?>appAdmin/usersFrm" method="post" style="display: inline" >
                <input type="hidden" name="Id" value="<?php echo $usersListData_item['Id'];?>" />
                  <button type="submit" class="btn btn-info btn-xs" title="Edit" name="edit" value="edit">
                    <span class="glyphicon glyphicon-edit"></span>
                  </button>
              </form> 
              <form action="<?php echo base_url();?>appAdmin/usersDelete" method="post" style="display: inline" >
                <input type="hidden" name="Id" value="<?php echo $usersListData_item['Id'];?>" />
                  <button type="submit" class="btn btn-info btn-xs" title="Delete" name="delete" value="delete" onclick="return confirmDelete();">
                    <span class="glyphicon glyphicon-remove-sign"></span>
                  </button>
              </form>  
            <!--  <span class="glyphicon glyphicon-ban-circle"></span> -->
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
