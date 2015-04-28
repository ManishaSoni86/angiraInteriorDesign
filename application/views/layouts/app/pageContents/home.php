<section class="news-box top-margin">
        <div class="container">
            <h2><span>Our latest projects</span></h2>
            <div class="row">
            	<?php 
            		$sNo	= 0;
            		foreach ($projectsListData as $projectsListData_item) :
					$sNo++;
				?>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                    <div class="newsBox">
                        <div class="thumbnail">
                            <figure>
                            	<a class="img-indent boxer boxer_image" href="<?php echo $this->config->item('images_path_database');?><?php echo $projectsListData_item['imageFeatured'];?>" title="<?php echo $projectsListData_item['name'];?>" data-gallery="gallery">
		                       		<img class="homeProdectImg" src="<?php echo $this->config->item('images_path_database');?><?php echo $projectsListData_item['imageFeatured'];?>" alt="<?php echo $projectsListData_item['imageFeatured'];?>" />
		                       </a>
                            	
                            </figure>
                            <div class="caption maxheight2">
                                <div class="box_inner">
                                        <div class="box">
                                            <p class="title homeProdTitle"><strong><?php echo $projectsListData_item['name']; ?></strong></p>
                                            <p>
                                            	<?php $homeProjDesc	= substr($projectsListData_item['description'],0,150); echo $homeProjDesc; ?>.
                                           	</p>
                                        </div>
                                        <div>
                                            <a href="<?php echo base_url(); ?>app/deliveriables?catId=<?php echo $projectsListData_item['categoryId']; ?>&proId=<?php echo $projectsListData_item['Id'];?>" class="btn-inline">more</a>
                                        </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
                <?php  
                if($sNo	== 4){
                	break;
                }
                endforeach;
                ?>
           
            </div>
        </div>
    </section>
   
  
	
      <section class="container">
      <div class="row">
      	<div class="col-md-4"><div class="title-box clearfix "><h2 class="title-box_primary">About Us</h2></div> 
	        <p>
	        	<span>
	        	<?php $homeAboutUs	= substr($companyProfileListData['0']['companyProfile'],0,400); echo $homeAboutUs; ?>.
	        	</span>
	        </p>
	        <p></p>
	        <a href="<?php echo base_url(); ?>app/aboutUs" title="read more" class="btn-inline " target="_self">read more</a> 
       </div>
        
        <div class="col-md-4"><div class="title-box clearfix "><h2 class="title-box_primary">Projects</h2></div> 
            <div class="list styled custom-list">
            <ul>
            	<?php 
            		$sNo	= '';
            		foreach ($productsListData as $productsListData_item) :
					$sNo++;
				?>
            	<li><a title="<?php echo $productsListData_item['name']; ?>" href="<?php echo base_url(); ?>app/deliveriables?catId=<?php echo $productsListData_item['categoryId']; ?>&proId=<?php echo $productsListData_item['Id'];?>"><?php echo $productsListData_item['name']; ?></a></li>
            	<?php 
            	 
                if($sNo	== 7){
                	break;
                }
                endforeach ?>
            </ul>
            </div>
         </div>
         <div class="col-md-4">
         	<div class="title-box clearfix "><h2 class="title-box_primary">Our Clients</h2></div>          	
        	<?php 
        		$sNo	= '';
        		foreach ($testimonialListData as $testimonialListData_item) :
				$sNo++;
			?>
            <blockquote class="blockquote-1">
				<p>
					<?php $homeTestiDesc	= substr($testimonialListData_item['description'],0,220); echo $homeTestiDesc; ?>.
				</p>
				<small><?php echo  $testimonialListData_item['title'];?> <cite title="Source Title"></cite></small>
					<a href="<?php echo base_url(); ?>app/testimonial" title="read more" class="btn-inline " target="_self">read more</a>
			</blockquote>
			<?php 
            	 
                if($sNo	== 1){
                	break;
                }
                endforeach ?>
		</div>
         
      </div>
      </section>