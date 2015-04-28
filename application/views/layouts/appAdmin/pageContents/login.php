
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-wrapper">
			        <div class="box">
			            <div class="content-wrap">
			                <h6>Sign In</h6>
				                <form method="post" action="<?php echo base_url();?>appLogin/doLogin">
				                <input class="form-control" type="email"  name="userEmail" value="" placeholder="User Email">
				                <input class="form-control" type="password" name="password" value="" placeholder="Password">
				                
				                <div class="action">
				                    <button class="btn btn-primary signup" type="submit">Login</button>
				                </div>
				                
 			                </form>
			            </div>
			        </div>

			        <div class="already">
			        	<?php 
			        	if(isset($msg)){ ?> 					
							   <span><?php echo $msg;?></span>	
			        	<?php
						    } ?>
						    <div> <a href="<?php echo base_url();?>appLogin/forgotPassword">Forgot Password ?</a></div>			             
			        </div>
			    </div>
			</div>
		</div>
