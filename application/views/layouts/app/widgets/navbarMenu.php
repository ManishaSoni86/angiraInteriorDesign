<div class="container">
	<div class="navbar-header">
		<!-- Button for smallest screens -->
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="index.html">
			<img class="logoHeader" src="<?php echo $this->config->item('images_path_database');?><?php echo $siteSettingSingleData['companyLogo'];?>" alt="Techro HTML5 template">
		</a>
	</div>
	
	<div class="navbar-collapse collapse">
		<ul class="nav navbar-nav pull-right mainNav">
			<li class="active"><a href="<?php echo base_url(); ?>app/index">Home</a></li>
			<li><a href="<?php echo base_url(); ?>app/aboutUs">About</a></li>
				<?php
					foreach ($headerMenuList as $headerMenuList_item):
				?>
			<li>
				<a href="<?php echo base_url(); ?>app/deliveriables?catId=<?php echo $headerMenuList_item['Id']; ?>"><?php echo $headerMenuList_item['catName']; ?></a>
			</li>
				<?php endforeach ?>
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">Pages <b class="caret"></b></a>
				<ul class="dropdown-menu">
					<li><a href="sidebar-right.html">Right Sidebar</a></li>
					<li><a href="#">Dummy Link1</a></li>
					<li><a href="#">Dummy Link2</a></li>
					<li><a href="#">Dummy Link3</a></li>
				</ul>
			</li>
			<li><a href="<?php echo base_url(); ?>app/contactus">Contact</a></li>
		</ul>
	</div>
	
		<!--/.nav-collapse -->
</div>

