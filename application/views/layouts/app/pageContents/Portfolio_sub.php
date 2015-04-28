
<div class="grid_3">
	<h2 class="top-9 line-height">Our Portfolio</h2>
	<ul class="list top-03">
	<?php
			foreach ($portfolioListData as $portfolioListData_item): 
				
			
		?>
		<li><a href="<?php echo base_url();?>app/deliveriables?catId=<?php echo $portfolioListData_item['categoryId'];?>&proId=<?php echo $portfolioListData_item['Id'];?>"><?php echo $portfolioListData_item['name']; ?></a></li>
		<?php endforeach ?>
	</ul>
</div>