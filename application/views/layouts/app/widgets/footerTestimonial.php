 
 <div class="border">
	<h3>Client Testimonials</h3>
	<?php 
	$Sno	= 0;
	foreach ($testimonialListData as $testimonialListData_item): 
	$Sno++;          
      $H_testiDesc=substr($testimonialListData_item['description'],0,100);
      ?>
	<div class="grid_3 alpha">
		<?php echo $H_testiDesc;?>...
		<div class="tright top-3">
			<p class="color-2"><?php echo $testimonialListData_item['title']; ?></p>
			<p class="color-3 top-01">India</p>
		</div>
	</div>
	<div class="grid_1 omega"></div>
	<div class="clear"></div>
	<p class="top-1"><a href="<?php echo base_url(); ?>app/testimonial" class="button">Read More</a></p>
	<?php 
	if($Sno==1)
    {
       Break;
    }
    endforeach ?>
</div> 