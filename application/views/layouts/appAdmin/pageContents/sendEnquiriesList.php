
  <div class="content-box-large">
	<div class="panel-heading">
		<div class="panel-title col-sm-12" style="float: none;"><span class="col-sm-4">Enquiries</span>
			<div class="">
				<!--<span class="glyphicon glyphicon-refresh" title="Reload">&nbsp;</span> -->
				   <form method="post" id="listOptionFoem" action="<?php echo base_url(); ?>appAdmin/sendEnquiriesList">
				     <div class="form-group col-sm-2">
                <label for="unreadOption" class="sendListOption control-label">Unread</label>
                <input type="checkbox" id="unreadOption" class="sendListOption" name="default" value="Unread"> 
             </div>
                
             <div class="form-group col-sm-2">
                <label for="readOption" class="sendListOption control-label">Read</label>
                <input type="checkbox" id="readOption" class="sendListOption" name="read" value="Read">  
             </div>
             
             <div class="form-group col-sm-2">
                <label for="trashOption" class="sendListOption control-label">Trash</label>
                <input type="checkbox" id="trashOption" class="sendListOption" name="trash" value="Trash">  
             </div>
    				 
             <div class="form-group col-sm-2">
                <label for="allOption" class="sendListOption control-label">All</label>
                <input type="checkbox" id="allOption" class="sendListOption" name="allEntries" value="allEntries"> 
             </div>  
               
            </form>
         </div>
    </div>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
		<form method="post" action="<?php echo base_url();?>appAdmin/sendEnquiriesMultipleDelete">
		 <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-hover" id="example">
			<thead>
				<tr>
					<th width="10"></th>
					<th>Sent By</th>
					<th>Subject</th>
					<th>Sent On /@</th>
					<th width="55">Status</th>
					<th width="60"></th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($sendEnquiriesListData as $sendEnquiriesListData_item): ?>
        <tr class="">
           <td><input type="checkbox" name="multipleDeleteSelect[]" id="multipleDeleteSelect[]" value="<?php echo $sendEnquiriesListData_item['Id'];?>"/></td>
          <td title="<?php echo $sendEnquiriesListData_item['email'];?>"><?php echo $sendEnquiriesListData_item['gender'];?>. <?php echo $sendEnquiriesListData_item['ptcName'];?></td>
          <td>  
               <form method="post"></form>                   
            <form action="<?php echo base_url();?>appAdmin/sendEnquiriesView" method="post" style="display: inline" >
                <input type="hidden" name="Id" value="<?php echo $sendEnquiriesListData_item['Id'];?>" />
                  <button type="submit" class="btn btn-xs btn-link" name="read" value="read">
                    <?php echo $sendEnquiriesListData_item['subject'];?>
                  </button>
              </form> 
          </td>
              
          <td class="center"> <?php echo $sendEnquiriesListData_item['enqDate'];?> @ <?php echo $sendEnquiriesListData_item['email'];?></td>
          <td class="center"><?php echo $sendEnquiriesListData_item['readStatus'];?> </td>  
           <td>
              <div class="pull-right">
              <form action="<?php echo base_url();?>appAdmin/sendEnquiriesDelete" method="post" style="display: inline" >
                <input type="hidden" name="Id" value="<?php echo $sendEnquiriesListData_item['Id'];?>" />
                  <button type="submit" class="btn btn-info btn-xs" title="Delete" name="delete" value="delete" onclick="return confirmDelete();">
                    <span class="glyphicon glyphicon-remove-sign"></span>
                  </button>
              </form> 
              <form action="<?php echo base_url();?>appAdmin/sendEnquiriesTrash" method="post" style="display: inline" >
                <input type="hidden" name="Id" value="<?php echo $sendEnquiriesListData_item['Id'];?>" />
                  <button type="submit" class="btn btn-info btn-xs" title="Trash" name="trash" value="trash" onclick="return confirm('Are you sure to Make Trash ?')">
                    <span class="glyphicon glyphicon-trash"></span>
                  </button>
              </form>  
             </div>
            </td>
        </tr>
        <?php endforeach ?> 
			</tbody>
		</table><div><button type="submit" name="multipleDelete" value="multipleDel" class="input-sm btn btn-info" onclick="return confirmDelete();">Multiple Delete</button></div>
    </form>
		</div> <!-- Responsive Tabble Div Close -->
	</div><!--Panel Body Close -->
</div> <!-- Contain Box Close -->
