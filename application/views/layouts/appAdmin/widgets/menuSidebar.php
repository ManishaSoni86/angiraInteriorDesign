
  	<div class="sidebar content-box" style="display: block;">
        <ul class="nav">
            <!-- Main menu -->            
            <li class="current"><a href="<?php echo base_url();?>appAdmin/index"><i class="glyphicon glyphicon-home"></i> Home</a></li>
            
            <?php if(($this->session->userdata('role')  ==1) || ($this->session->userdata('role')  ==2) || ($this->session->userdata('role')  ==3)) {?>
            <li><a href="<?php echo base_url();?>appAdmin/sliderSettingsList"><i class="glyphicon glyphicon-film"></i> Slider Settings</a></li>
            <li class="submenu">
            	<a href="">
            		<i class="glyphicon glyphicon-book"></i>	Company Detail
            		 <span class="caret pull-right"></span>
            		 <ul>
            		    <?php if($this->session->userdata('role')  ==1) {?>
                        <li><a href="<?php echo base_url();?>appAdmin/appSettingsList">App Settings</a></li>
                     <?php } ?>
                        <li><a href="<?php echo base_url();?>appAdmin/companyProfileList">Company Profile</a></li>
                        <li><a href="<?php echo base_url();?>appAdmin/socialSiteList">Social Site</a></li>
                    </ul>
            	</a>
            </li>                    
            <li><a href="<?php echo base_url();?>appAdmin/categoryList"><i class="glyphicon glyphicon-list-alt"></i>Catagory</a></li>
            <li><a href="<?php echo base_url();?>appAdmin/productsList"><i class="glyphicon glyphicon-list"></i>Products</a></li>
            
            <li><a href="<?php echo base_url();?>appAdmin/mediaList"><i class="glyphicon glyphicon-picture"></i>Media</a></li>
            <li><a href="<?php echo base_url();?>appAdmin/testimonialList"> <i class="glyphicon glyphicon-thumbs-up"></i>Testimonial</a></li>
            <li><a href="<?php echo base_url();?>appAdmin/newsList"> <i class="glyphicon glyphicon-thumbs-up"></i>News</a></li>
            <li><a href="<?php echo base_url();?>appAdmin/contactUsList"> <i class="glyphicon glyphicon-earphone"></i>Contact Us</a></li>
            <?php } ?>
           <!--
            <li class="submenu">
            	<a href="">
            		<i class="glyphicon glyphicon-earphone"></i>Contact Us
            		 <span class="caret pull-right"></span>
            		 <ul>
                        <li><a href="">Office Type</a></li>
                        <li><a href="<?php echo base_url();?>appAdmin/contactUsList">Contact Detail</a></li>
                    </ul>
            	</a>
            </li>-->
            <?php if(($this->session->userdata('role')  ==1) || ($this->session->userdata('role')  ==2) || ($this->session->userdata('role')  ==3)) {?>
            <li class="submenu">
            	<a href="">
            		<i class="glyphicon glyphicon-inbox"></i> Sales
            		 <span class="caret pull-right"></span>
            		 <ul>
                     <li><a href="<?php echo base_url();?>appAdmin/sendEnquiriesList">	My Enquiries</a></li>
                     <li><a href="<?php echo base_url();?>appAdmin/InvoiceList"> Invoice</a></li>
                 </ul>
            	</a>
            </li>
           <?php } ?>
        </ul>
     </div>