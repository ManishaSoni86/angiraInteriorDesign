<script type="text/javascript">
  // Gallery Popup
    function newWin(a) {  
        window.open(a,"popupMediaAdd","width=600, height=300, top=200, left=200, toolbar=no, directories=no, menubar=no, status=no, resizable=0, scrollbars=yes, fullscreen=no");  
      }  
    </script>
<!DOCTYPE html>
<html>
  <head>
  	<title><?php if(isset($pageTitle)){echo $pageTitle; }?></title>
  	
    <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8" >
    
    <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">

    <!-- Bootstrap -->
    <link href="<?php echo $this->config->item('host_url');?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $this->config->item('host_url');?>assets/bootstrapvalidator/dist/css/bootstrapValidator.min.css"/>
    <!-- styles -->
    <link href="<?php echo $this->config->item('host_url');?>assets/css/styles.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    
    
    <style type="text/css">
    	.model-media-img{width: 160px; height: 120px;}
    	.modal-wide .modal-dialog {
        width: 70%;
      }
      .selImg{
        border: 4px solid #A94442;
      }
    	.showUser{color:#fff; height: auto; margin-top:8px;}
    	.Error { color: #D43F3A;}
    </style>
    <script type="text/javascript">
      function confirmDelete()
        {
          var agree=confirm("This action will delete permanantly your record/records");
          if (agree)
            {
               return true;
            }
          else
            {
               return false;
            }
        }

    </script>
  
 
  </head>
  <body>
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-4">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a ><?php if(isset($header['title'])){echo $header['title'];} ?></a></h1>
	              </div>
	           </div>
	           <div class="col-md-6"> 	             
                <div class="row">
	               <div class="col-md-3 text-center showUser hidden-xs">
	                <h5> <?php if(isset($header['myAccount'])) echo "Hi ".$header['myAccountDtl'];?></h5>
	               </div>
	             <?php if(isset($header['search'])){$this->load->view($header['search']);} ?> 
	           </div>
	           </div>
	           <div class="col-md-2 text-center">
	           	<?php if(isset($header['myAccount'])){$this->load->view($header['myAccount']);} ?>
	           </div>
	        </div>
	     </div>
	</div>
	
