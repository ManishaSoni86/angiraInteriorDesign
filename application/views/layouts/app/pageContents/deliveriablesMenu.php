<div id="courses">
	<section class="container">
						<h2 class="top-2"></h2>
		<div class="row"></div>
		<div class="row"></div>
			<?php
				$sNo	= 0;
				if((isset($_GET['catId'])) && ($_GET['catId'] != ""))
				{ 	?>
			<?php				
				   foreach ($productsRightListData as $productsListData_item):
					?>
				<div class="col-md-2">
					<div class="featured-box">
						<!--<i class="fa fa-cogs fa-2x"></i>-->
						<div>
							<a class="img-indent boxer boxer_image" href="<?php echo $this->config->item('images_path_database'); ?><?php echo $productsListData_item['imageFeatured'];?>" title="<?php echo $productsListData_item['name'];?>" data-gallery="gallery"  >
	                    		<img class="prodImgAll img-thumbnail" src="<?php echo $this->config->item('images_path_database');?><?php echo $productsListData_item['imageFeatured']; ?>" alt="" class="img-rounded pull-left" width="300">
	                		</a>
							<h3 class="prodTitle" >
								<button onclick="getSingleProduct('<?php echo $productsListData_item['Id']; ?>')" id="<?php echo $productsListData_item['Id']; ?>" class="MainProdTitle btn-link" href="<?php echo base_url();?>app/deliveriables?catId=<?php echo $productsListData_item['categoryId'];?>&proId=<?php echo $productsListData_item['Id'];?>">
									<?php echo $productsListData_item['name']; ?>
								</button>
							</h3>
							<!--<?php $prodDescription	= substr($productsListData_item['description'],0,200); echo $prodDescription; ?>-->
						</div>
					</div>
				</div>
				
				<?php 
				endforeach;
				
				 }
				  ?>
			</div>
	
		</section>
	</div>

<?php
	if(isset($_GET['proId'])){
	?>
		<!-- container -->
	<div class="container">
		<div class="row allProdContainer">
			<!-- Article content -->			
			<section class="col-sm-12 maincontent singlepageContainer" >
				<h3 class="prodATitle"><?php echo $productSingleData['name'];?></h3>
				<div class="row">
					<p class="col-sm-3">
	                    <a class="img-indent boxer boxer_image prodImgHref" href="<?php echo $this->config->item('images_path_database');?><?php echo $productSingleData['imageFeatured'];?>">
	                    	<img class="prodImg" src="<?php echo $this->config->item("images_path_database");?><?php echo $productSingleData['imageFeatured'];?>" alt="" class="img-rounded pull-left">
	                	</a>
	                </p>
					<div class="col-sm-9 prodDesc">
						<?php echo $productSingleData['description'];?>
					</divs>
					</div>
			</section>			
		</div>
	</div>
	<!-- /container -->
	<?php
	} 
	else{
?>
			<!-- container -->
	<div class="container">
		<div class="row allProdContainer">
			<!-- Article content -->
			
			<section class="col-sm-12 maincontent singlepageContainer" id="">
				<h3 class="prodATitle"></h3>
				<div class="row">
					<p class="col-sm-3">
	                    <a class="img-indent boxer boxer_image prodImgHref" href="">
	                    	
	                	</a>
	                </p>
					<div class="col-sm-9 prodDesc">
					</div>
					</div>
			</section>			
		</div>
	</div>
	<!-- /container -->
<?php } ?>