
			<section class="container">
					<div class="row">
						<h2 class="top-4"></h2>
						<div>
    				 <?php foreach ($testimonialListData as $testimonialListData_item): ?>
						<div class="row">
							<?php
                          if($testimonialListData_item['imageName'] != "")
             			 { ?>
             			 	<div class="col-md-3">
								<a class="img-indent boxer boxer_image" href="<?php echo $this->config->item('images_path_database'); ?><?php echo $testimonialListData_item['imageName'];?>" title="<?php echo $testimonialListData_item['title'];?>" data-gallery="gallery"  >
									<img class="testimonialImg" src="<?php echo $this->config->item('images_path_database'); ?><?php echo $testimonialListData_item['imageName'];?>" alt="<?php echo $testimonialListData_item['title']?>" />
								</a>
							</div>
						<?php } ?>
							<div class="col-md-9">
								<p class="top-03 testimonialTitle"><?php echo $testimonialListData_item['title']?></p>
								<p class="font-3 top-1 line-height"><?php echo $testimonialListData_item['description']?></p>
							</div>
							</div>
							<?php endforeach ?>
						</div>
					</div>
					
				</section>
			
			
	