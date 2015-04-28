
<form method="post" name="send_enq" id="SendEnqForm" action="">

<div class="main_sd">

	<div class="feilds">
		<p class="font-3 top-1 line-height">
		<div>
		<input type="text" name="subject" id="Subject" value="" placeholder="Subject" class="text"/>
		<div class="error"><?php echo form_error('subject'); ?></div> 
		
		<div class="sdEnq_tx"> Mr.</div>
		 <input type="radio" name="gender" id="MrG" value="Mr" style="width:50px;" />
		
		<div class="sdEnq_tx"> Mrs.</div>
		 <input type="radio" name="gender" id="MrsG" value="Mrs" style="width:50px"; /></br>
		 <div i class="error"><?php echo form_error('gender'); ?></div> 
		
		<input type="text" name="ptcName" id="SenderNm" value="" placeholder="Sender Name" class="text" /> 
		<div  class="error"><?php echo form_error('ptcName'); ?></div> 
		
		<input type="text" name="senderCompanyName" id="ComNm" value="" placeholder="Company Name" class="text" /> 
		<div  class="error"><?php echo form_error('senderCompanyName'); ?></div> 
		
		<input type="text" name="country" id="Country" value="" placeholder="Country Name" class="text" /> 
		<div  class="error"><?php echo form_error('country'); ?></div> 
		
		<input type="text" name="state" id="State" value="" placeholder="State" class="text"  /> 
		<div  class="error"><?php echo form_error('state'); ?></div>
		
		<input type="text" name="city" id="City" value="" placeholder="City" class="text"  /> 
		<div  class="error"><?php echo form_error('city'); ?></div>
		
		<input type="text" name="email" id="Mail_Id" value="" placeholder="Email Id" class="text" />
		<div id="Mail_IdError" class="error"><?php echo form_error('email'); ?></div> <br/>
		
		<input type="text" name="ISD" id="ISDcode" value="" maxlength="3" placeholder="ISD Code" style="width:45px;"/>-
		<input type="text" name="STD" id="STDcode" value="" maxlength="4" placeholder="STD Code" style="width:60px;"/>-
		<input type="text" name="phNumber" id="PhNo" value="" maxlength="7" placeholder="Phone No" class="text" style="width:170px;" /></br>
		<div class="sdEnq_tx"> (+91) &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;(011) &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;(2202202) </div></br>
		<div  class="error"><?php echo form_error('ISD'); ?></div>
		<div  class="error"><?php echo form_error('STD'); ?></div>
		<div  class="error"><?php echo form_error('phNumber'); ?></div>
		
		<input type="text" name="mobileNumber" id="MobNo" value="" placeholder="Mobile no" class="text" style="width:300px"; /> </br>
		<div class="sdEnq_tx"> (078888899667)</div><br />
		<div  class="error"><?php echo form_error('mobileNumber'); ?></div> 
	
		<textarea name="massage" id="Massage" placeholder="massage"></textarea>
		<div  class="error"><?php echo form_error('massage'); ?></div> 
		<div class="sub_btn">
			<input type="submit" value="submit" name="submit" style="width:80px;"/>
		</div>
		<div class="clear"></div><br /><br />
		<div class="sucessMsg text-center">
			ddd
		</div>
	</div>
	</p>
	</div>
</div>
</form>

<script type="text/javascript">
jQuery(function(){
    jQuery("#SendEnqForm").submit(function(e){
       e.preventDefault();

    	//console.log($("#JqAjaxForm"));
        dataString = jQuery("#SendEnqForm").serialize();
        jQuery.ajax({
        type: "POST",
        url: "<?php echo base_url(); ?>app/sendEnquiryInsert",
        data: dataString,
      //  dataType: "json",
        success: function() {
        	alert('Form submiteed successfully');       
       		jQuery(".sucessMsg").html('Form submiteed successfully');
    		jQuery("#SendEnqForm").trigger('reset');      
        }
          
        });   
    });
});
</script>
