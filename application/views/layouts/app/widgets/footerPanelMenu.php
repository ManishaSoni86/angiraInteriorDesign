<div class="panel-body">
	<p class="simplenav">
		<a href="<?php echo base_url(); ?>app/index">Home</a> | 
		<a href="<?php echo base_url(); ?>app/aboutUs">About</a> |
		<?php
			foreach ($headerMenuList as $headerMenuList_item):
		?>
		<a href="<?php echo base_url(); ?>app/deliveriables?catId=<?php echo $headerMenuList_item['Id']; ?>"><?php echo $headerMenuList_item['catName']; ?></a> |
		<?php endforeach ?>
		<a href="<?php echo base_url(); ?>app/contactUs">Contact</a>
	</p>
</div>