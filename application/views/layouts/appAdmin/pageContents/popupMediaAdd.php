 <style type="text/css">
      .Error { color: #D43F3A;}
    </style>
<!-- Bootstrap -->
    <link href="<?php echo $this->config->item('host_url');?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $this->config->item('host_url');?>assets/bootstrapvalidator/dist/css/bootstrapValidator.min.css"/>
    <!-- styles -->
    <link href="<?php echo $this->config->item('host_url');?>assets/css/styles.css" rel="stylesheet">

<!-- Coding For New Window Open -->
<script type="text/javascript">

</script>
<div class="">
  <div class="">
    <div class="content-box-large">
    <div class="panel-heading">
          <div class="panel-title">Add New</div>
      </div>
    <div class="panel-body">
      <form class="form-horizontal mediaForm" role="form" enctype="multipart/form-data" action="<?php echo base_url();?>appAdmin/popupMediaAddInsert" method="post">
            
        <div class="form-group">
          <label for="MediaCaption" class="col-sm-3 control-label">Media Caption</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="MediaCaption" placeholder="Media Caption" name="Caption" value="<?php echo set_value('Caption'); ?>" /> 
            <span class="Error"><?php echo form_error('Caption'); ?></span>
          </div>
        </div>
                
        <div class="form-group">
          <label for="MediaAltText" class="col-sm-3 control-label">Alt Text</label>
          <div class="col-sm-9">
            <input type="text" class="form-control" id="MediaAltText" placeholder="Alt Text" name="altText" value="<?php echo set_value('altText'); ?>"/>
            <span class="Error"><?php echo form_error('altText'); ?></span>
          </div>
        </div>
                
        <div class="form-group">
          <label for="MediaRelavance" class="col-sm-3 control-label">Related To</label>
          <div class="col-sm-9">
            <select class="form-control" id="MediaRelavance" name="realetedCatagory">
            <option value="">--Related Catagory--</option>             
              <?php foreach ($categoryListData as $categoryListData_item): ?>
                <option value="<?php echo $categoryListData_item['Id']; ?>"<?php echo set_select('realetedCatagory', $categoryListData_item['Id']);?>><?php echo $categoryListData_item['catName']; ?></option>              
              <?php endforeach ?> 
          </select>         
            <span class="Error"><?php echo form_error('realetedCatagory'); ?></span>
          </div>
        </div>
        
        <div class="form-group">
          <label for="MediaImg" class="col-sm-3 control-label">Image</label>
          <div class="col-sm-9">
            <input type="file" class="form-control" id="MediaImg" placeholder="Image" name="imgName" value="">
            <span class="Error"><?php echo form_error('imgName'); ?><?php if(isset($error)) echo $error; ?></span>
          </div>
        </div>        
        
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
            <button type="submit" value="submit" class="btn btn-primary" onclick="SetImageValue();">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
    
  </div>
</div>


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo $this->config->item('host_url');?>assets/bootstrap/js/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="<?php echo $this->config->item('host_url');?>assets/bootstrap/js/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo $this->config->item('host_url');?>assets/bootstrap/js/bootstrap.min.js"></script>
