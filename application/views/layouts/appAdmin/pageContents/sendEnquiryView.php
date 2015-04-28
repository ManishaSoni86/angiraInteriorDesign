
  <div class="content-box-large">
  <div class="panel-heading">
    <div class="panel-title" style="float: none;">Enquiry
      <div class="pull-right">
        <span class="" title="Back"><a href="sendEnquiriesList">Back To List</a></span>
      </div>
    </div>
  </div>
  <div class="panel-body">
     <div class="row>" 
	      <div class="col-sm-12">
	         <div class="col-sm-6">
	            <div class="col-sm-2"><b>Subject</b></div>
	            <div class="hidden-xs col-sm-1"><b>:</b></div>
	            <div class="col-sm-9"><?php echo $sendEnquirySingleData['subject'];?></div>
	         </div>
	         <div class="visible-xs"><hr /></div>
	         
	         <div class="col-sm-6">
	            <div class="col-sm-2"><b>Send Date</b></div>
	            <div class="hidden-xs col-sm-1"><b>:</b></div>
	            <div class="col-sm-9"><?php echo $sendEnquirySingleData['enqDate'];?></div>
	         </div>
	         <div class="visible-xs"><hr /></div>
	      </div>
	 </div>
      <div class="row">      
      <div class="col-sm-12" style="border: 1px solid #666666;">
         <div class="row">
            <div class="col-sm-2"><b>Massage &nbsp;:</b></div>
            <div class="col-sm-10">
                <?php echo $sendEnquirySingleData['massage'];?> 
            </div>
         </div>
           <div class="row"> 
              <div class="col-sm-offset-4 col-sm-8">
                <div class="col-xs-12">
                    <div class="col-sm-2"><b>PTC</b></div>
                    <div class="hidden-xs col-sm-1"><b>:</b></div>
                    <div class="col-sm-9"><?php echo $sendEnquirySingleData['gender'];?>. <?php echo $sendEnquirySingleData['ptcName'];?></div>
                    <div class="visible-xs"><hr /></div>
                </div>
                
                <div class="col-xs-12">                
                <div class="col-sm-2"><b>Company </b></div>
                <div class="hidden-xs col-sm-1"><b>:</b></div>
                <div class="col-sm-9"><?php echo $sendEnquirySingleData['senderCompanyName'];?></div>
                <div class="visible-xs"><hr /></div>
                </div>
                
                <div class="col-xs-12">              
                <div class="col-sm-2"><b>E-mail Id</b></div>
                <div class="hidden-xs col-sm-1"><b>:</b></div>
                <div class="col-sm-9"><?php echo $sendEnquirySingleData['email'];?></div>
                <div class="visible-xs"><hr /></div>
                </div>
                
                <div class="col-xs-12">              
                <div class="col-sm-2"><b>Ph No</b></div>
                <div class="hidden-xs col-sm-1"><b>:</b></div>
                <div class="col-sm-9">
                  <?php echo $sendEnquirySingleData['ISD'];?> -
                  <?php echo $sendEnquirySingleData['STD'];?> -
                  <?php echo $sendEnquirySingleData['phNumber'];?>
                </div>
                <div class="visible-xs"><hr /></div>
                </div>
                
                <div class="col-xs-12">
                <div class="col-sm-2"><b>Mob No</b></div>
                <div class="hidden-xs col-sm-1"><b>:</b></div>
                <div class="col-sm-9"><?php echo $sendEnquirySingleData['mobileNumber'];?></div>
                <div class="visible-xs"><hr /></div>
                </div>
                
                <div class="col-xs-12">                 
                  <div class="col-sm-2"><b>Address</b></div>
                  <div class="hidden-xs col-sm-1"><b>:</b></div>
                  <div class="col-sm-9">
                    <?php echo $sendEnquirySingleData['city'];?> 
                    <?php echo $sendEnquirySingleData['state'];?> 
                    <?php echo $sendEnquirySingleData['country'];?>
                  </div>
                  <div class="visible-xs"><hr /></div>
                </div>
                </div>          
              </div>
            </div>
     </div> 
    
  </div><!--Panel Body Close -->
</div> <!-- Contain Box Close -->
