
  <div class="content-box-large">
	<div class="panel-heading">
		<div class="panel-title" style="float: none;">Testimonial
			<div class="pull-right">
				<!--<span class="glyphicon glyphicon-refresh" title="Reload">&nbsp;</span>-->
				
				<?php if(isset($addBtn)) { ?>        
         <span class="Error" title="Add New"><?php echo $addBtn; ?></span>
         <?php
        }
        else { ?>
        <a href="<?php echo base_url();?>appAdmin/testimonialFrm" class="btn btn-info">
          <span class="glyphicon glyphicon-plus-sign" title="Add New"></span> Add
        </a>
        <?php } ?>
			</div>
			
		</div>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
    <form method="post" action="<?php echo base_url();?>appAdmin/testimonialMultipleDelete">
		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-hover" id="example">
			<thead>
				<tr>
					<th width="10"></th>
					<th width="100">Title</th>
					<th>Description</th>
					<th width="60">Img</th>
					<th width="80">Updation Date</th>
					<th width="60"></th>
				</tr>
			</thead>
			<tbody>
			   <?php foreach ($testimonialListData as $testimonialListData_item): ?>
				  <td><input type="checkbox" name="multipleDeleteSelect[]" id="multipleDeleteSelect[]" value="<?php echo $testimonialListData_item['Id'];?>"/></td>
          <td><?php echo $testimonialListData_item['title'];?></td>
          <td><?php echo $testimonialListData_item['description'];?></td>
          <td><img height="45" width="60" src="<?php echo $this->config->item('images_path_database');?><?php echo $testimonialListData_item['imageName'];?>" /></td>
          <td class="center"> <?php echo $testimonialListData_item['date'];?></td>
           
           <td>
             <div class="pull-right">
               <form method="post"></form>
             <form action="<?php echo base_url();?>appAdmin/testimonialFrm" method="post" style="display: inline" >
                <input type="hidden" name="Id" value="<?php echo $testimonialListData_item['Id'];?>" />
                  <button type="submit" class="btn btn-info btn-xs" title="Edit" name="edit" value="edit">
                    <span class="glyphicon glyphicon-edit"></span>
                  </button>
              </form> 
              <form action="<?php echo base_url();?>appAdmin/testimonialDelete" method="post" style="display: inline" >
                <input type="hidden" name="Id" value="<?php echo $testimonialListData_item['Id'];?>" />
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
