 <footer>
         <div class="container">
         
            <div class="copy text-center">
               Copyright 2014 <a href='#'>Website</a>
            </div>
            
         </div>
   </footer>
     
    <link href="<?php echo $this->config->item('host_url');?>assets/vendors/datatables/dataTables.bootstrap.css" rel="stylesheet" media="screen">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="<?php echo $this->config->item('host_url');?>assets/bootstrap/js/jquery.js"></script>
    <!-- jQuery UI -->
    <script type="text/javascript" src="<?php echo $this->config->item('host_url');?>assets/bootstrap/js/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="<?php echo $this->config->item('host_url');?>assets/bootstrap/js/bootstrap.min.js"></script>

    <!-- Or use the original one with all validators included -->
     <script type="text/javascript" src="<?php echo $this->config->item('host_url');?>assets/bootstrapvalidator/dist/js/bootstrapValidator.min.js"></script>
    
    <!-- Text Editors -->    
    <script type="text/javascript" src="<?php echo $this->config->item('host_url');?>assets/vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.js"></script>
    <script type="text/javascript" src="<?php echo $this->config->item('host_url');?>assets/vendors/ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="<?php echo $this->config->item('host_url');?>assets/vendors/ckeditor/adapters/jquery.js"></script>

    
    <script type="text/javascript" src="<?php echo $this->config->item('host_url');?>assets/vendors/datatables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="<?php echo $this->config->item('host_url');?>assets/vendors/datatables/dataTables.bootstrap.js"></script>
    
    
    <script type="text/javascript" src="<?php echo $this->config->item('host_url');?>assets/js/custom.js"></script>
    <script type="text/javascript" src="<?php echo $this->config->item('host_url');?>assets/js/editors.js"></script>
    <script type="text/javascript" src="<?php echo $this->config->item('host_url');?>assets/js/tables.js"></script>
    

<!-- Or use the plugin with required validators
<script type="text/javascript" src="<?php echo $this->config->item('host_url');?>assets/bootstrapvalidator/src/js/bootstrapValidator.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('host_url');?>assets/bootstrapvalidator/src/js/validator/...validator..."></script>
 -->
 <script type="text/javascript">


   $(document).ready(function() {
      $('.sendListOption').click(function(){
      $('#listOptionFoem').submit(); 
        
      });
      // on Hide the latitute and langitute field of Contact Us      
      $('#Latitute').hide();
      $('#Langitute').hide();
      $('#sliderIconImgChooseContainer').hide();
      $('#sliderIconImgBtnContainer').hide(); 
            
      // Contact us Page. on Click teh button redirect to offce type widgt
     $("#goToAddnew").click(function(){
      $("html,body").animate({scrollTop:$("#addNewOfficeTypeText").offset()},1000);
      $("#addNewOfficeTypeText").focus();  
     });
     
     // COntact Us PTC Image btn Value = Hidden field modal value     
     $('#PtcImgbtn').on('click', function() { 
        var ptcImgBtnVal     = $(this).val();
        $('#selImgFor').val(ptcImgBtnVal);
    });
    
    // COntact Us Office Image = Hidden field modal value
    $('#OffceImgBtn').on('click', function() { 
        var ptcImgBtnVal     = $(this).val();
        $('#selImgFor').val(ptcImgBtnVal);
    });
    
      // All Pages.  For Choose the imagw from Select Img Widgts
        // set the value in modal footer field
      $('.selImgBtn').on('click', function() { 
        $(".selImgBtn").removeClass("selImg");
        var imgVal     = $(this).val();
         var imgUrl    = "<?php echo $this->config->item('images_path_database');?>"+ imgVal;
          $(this).addClass("selImg");
        $("#SelImgVal").val(imgVal);
        $("#SelImgUrl").val(imgUrl);
    });
     
     //set the value in form field from modal foote field
      $('#modImgGet').on('click', function() { 
        // Show the text box of Image for all page
        $('#getImgValModal').show();
        // Code for Image
        var imgValGet     = $('#SelImgVal').val();
         var imgUrlGet    = $('#SelImgUrl').val();
        $("#getImgPathModal").attr({src : imgUrlGet});
        $("#getImgValModal").val(imgValGet);
        
        // Contact Us for PTC Image Set
        if($('#selImgFor').val() == 'ptcImgSel'){
          $("#ptcImgShow").attr({src : imgUrlGet});
          $("#ptcImg").val(imgValGet);
          // show the text box and img tag
          $('#ptcImg').show();
          $('#ptcImgShow').show(); 
        }   
       // Contact Us for Office Image Set
        if($('#selImgFor').val() == 'officeImgSel'){
          $("#officeImgShow").attr({src : imgUrlGet});
          $("#OffceImg").val(imgValGet);
          // show the text box and img tag
          $('#OffceImg').show();
          $('#officeImgShow').show();     
        }
        
        if($("#ptcImg").val() != ''){        
        // for Slider Setting page Show checkbox and btn of icon image when main image is selected.
        $('#sliderIconImgChooseContainer').show();
        $('#sliderIconImgBtnContainer').show();      
      }
    });
    
         
      // for All pages set the img tag when text box has value
       if($('#getImgValModal').val() != ''){
        var imgVal       = $('#getImgValModal').val();
        var imgUrlGet    = "<?php echo $this->config->item('images_path_database');?>"+ imgVal;
        $("#getImgPathModal").attr({src : imgUrlGet});
        $('#getImgValModal').show();
      } 
      else{
      // All Pages. hide the text box and Img tag if Text has no Val
        $('#getImgValModal').hide();  
      } 
    
           
      // Contact US. hide the text box and Img tag if PTC Img Text has no Val
      if($("#ptcImg").val() == ''){
        $('#ptcImg').hide();
        $('#ptcImgShow').hide();        
      }
      else{
        $('#ptcImg').show();
        $('#ptcImgShow').show(); 
        
        // for Slider Setting page Show checkbox and btn of icon image when main image is selected.
        $('#sliderIconImgChooseContainer').show();
        $('#sliderIconImgBtnContainer').show(); 
        
        // for Contact us pages PTC Image set the img tag when text box has value
        var imgVal       = $('#ptcImg').val();
        var imgUrlGet    = "<?php echo $this->config->item('images_path_database');?>"+ imgVal;
        $("#ptcImgShow").attr({src : imgUrlGet});           
      }
      // Contact US. hide the text box and Img tag if Office Img Text has no Val
      if($("#OffceImg").val() == ''){
        $('#OffceImg').hide();
        $('#officeImgShow').hide();        
      }
      else{
        $('#OffceImg').show();
        $('#officeImgShow').show();
         
         // for Contact us pages Office Image set the img tag when text box has value
        var imgVal       = $('#OffceImg').val();
        var imgUrlGet    = "<?php echo $this->config->item('images_path_database');?>"+ imgVal;
        $("#officeImgShow").attr({src : imgUrlGet});          
      }
      
      // Slider Settings       
      $("input[name=SliderIconImg]").on('click change',function(){
        if ($('input[name=SliderIconImg]').is(':checked')){
            $('#OffceImg').val($('#ptcImg').val()); 
            var imgVal       = $('#OffceImg').val();
            var imgUrlGet    = "<?php echo $this->config->item('images_path_database');?>"+ imgVal;
            $("#officeImgShow").attr({src : imgUrlGet});   
              
            $('#OffceImg').show();
            $('#officeImgShow').show();
            $('#sliderIconImgBtnContainer').hide();                           
        }
        else{
            $('#OffceImg').val(''); 
            $('#OffceImg').hide();
            $('#officeImgShow').hide(); 
            $('#sliderIconImgBtnContainer').show();                        
        }
      }); 
    
      //on edit of slid setting if icon image is same as main image than check box is checked and icon btn is hide
      if(($('#OffceImg').val() != '') && ($('#OffceImg').val() == $('#ptcImg').val())){
          $("input[name=SliderIconImg]").attr({checked: 'checked'});
          $('#sliderIconImgBtnContainer').hide(); 
        } 
          
      //Contact Us Google map hide or show the langitute and latitute on click the check box    
      $("input[id=googleMapSel]").on('blur click change',function(){
        if ($('input[id=googleMapSel]').is(':checked')){
            $('#Latitute').show();
            $('#Langitute').show();                       
        }
        else{
            $('#Latitute').hide();
            $('#Langitute').hide();                        
        }
      });
      
         
      if($('#Latitute').val() != ''){
        $("input[id=googleMapSel]").attr({checked: 'checked'})
        $('#Latitute').show();
        $('#Langitute').show();                       
      } 
      
      // Product Page
      // Hide the Price range and exact price field on load
            $('#MinPrice').hide();
            $('#MaxPrice').hide();
            $('#MRP').hide(); 
            $('#Discount').hide();   
      
      //on Click on Price range check box price range filed show
       $("input[id=PriceRange]").on('blur click change',function(){
            $('#MinPrice').show();
            $('#MaxPrice').show();
            $('#MRP').hide(); 
            $('#Discount').hide();
            
            //exact price field blank
            $('#MRP').val('');
            $('#Discount').val('');    
      });
      
      //on Click on exact Price check box exact price filed show
       $("input[id=PriceExact]").on('blur click change',function(){
            $('#MinPrice').hide();
            $('#MaxPrice').hide();
            $('#MRP').show(); 
            $('#Discount').show(); 
            
            //price range field blank
            $('#MinPrice').val('');
            $('#MaxPrice').val('');  
      });

      // price range radio btn is checked if fields have value. - edit case and error case.
      if(($('#MinPrice').val() != '') || ($('#MaxPrice').val() != '')){
         $("input[id=PriceRange]").attr({checked: 'checked'}) 
         $('#MinPrice').show();
         $('#MaxPrice').show();       
      }

      // exact price radio btn is checked if fields have value. - edit case and error case.
      if(($('#MRP').val() != '') || ($('#Discount').val() != '')){
         $("input[id=PriceExact]").attr({checked: 'checked'}) 
         $('#MRP').show();
         $('#Discount').show();       
      }
    
    }); 
</script>	

<script type="text/javascript">
  $(document).ready(function() {
    /*
    $('.productForm')
        .find('[name="categoryId"]')
            .selectpicker()
            .change(function(e) {
                // revalidate the language when it is changed
                $('.productForm').bootstrapValidator('revalidateField', 'categoryId');
            })
        */    
    // Contact Us Form Validation
    $('.contactUsForm').bootstrapValidator({
        message: 'This value is not valid',
         /*
        feedbackIcons: {
         
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
      */
        fields: {
                 
            officeTypeId: {
                message: 'The Office Type is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Office Type is required and cannot be empty'
                    }              
                }
            },
            
            ptcTitle: {
                validators: {
                    notEmpty: {
                        message: 'The PTC Title is required'
                    }              
                }
            },
            
            ptcName: {
                message: 'The username is not valid',
                validators: {
                    notEmpty: {
                        message: 'The username is required and cannot be empty'
                    },/*
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The username must be more than 6 and less than 30 characters long'
                    },*/
                    regexp: {
                        regexp: /^[a-zA-Z0-9_ ]+$/,
                        message: 'The username can only consist of alphabetical, number and underscore'
                    }
                }
            },
            
            ptcImg: {
                validators: {
                    notEmpty: {
                        message: 'The PTC Image is required and cannot be empty'
                    }             
                }
            },
            
            officeImg: {
                validators: {
                    different: {
                        field: 'ptcImg',
                        message: 'The Office Img cannot be the same as PTC Image'
                    }  
                }
            },
            
            STD: {
                validators: {
                    stringLength: {
                        min: 2,
                        max: 4,
                        message: 'The STD Code must be more than 2 and less than 4 characters long'
                    },
                    regexp: {
                        regexp: /^[0-9-+]+$/,
                        message: 'The STD Code can only consist of number, plus and Dash'
                    }             
                }
            },
            
            phNumber: {
                validators: {
                    stringLength: {
                        min: 6,
                        max: 8,
                        message: 'The Ph No must be more than 6 and less than 8 characters long'
                    },
                    regexp: {
                        regexp: /^[0-9-+]+$/,
                        message: 'The Ph No can only consist of number, plus and Dash'
                    }             
                }
            },
            
            faxNumber: {
                validators: {
                    stringLength: {
                        min: 10,
                        max: 10,
                        message: 'The Fax No must be more than 6 and less than 8 characters long'
                    },
                    regexp: {
                        regexp: /^[0-9-+]+$/,
                        message: 'The Fax No can only consist of number, plus and Dash'
                    }             
                }
            },            
            
            mobileNumber: {
                validators: {
                    notEmpty: {
                        message: 'The Mobile No is required and cannot be empty'
                    },           
                    stringLength: {
                        min: 11,
                        max: 11,
                        message: 'The Mobile No must be 11 Digits long'
                    },
                    regexp: {
                        regexp: /^\d{11}$/,
                        message: 'The Mobile No can only consist of number'
                    }             
                }
            },           
            
            contLocation: {
                validators: {
                    notEmpty: {
                        message: 'The Contact Location is required and cannot be empty'
                    }              
                }
            },
            
            contArea: {
                validators: {
                    notEmpty: {
                        message: 'The Contact Area is required and cannot be empty'
                    }              
                }
            },
            
            contCity: {
                validators: {
                    notEmpty: {
                        message: 'The Contact City is required and cannot be empty'
                    }              
                }
            },
            
            contState: {
                validators: {
                    notEmpty: {
                        message: 'The Contact State is required and cannot be empty'
                    }              
                }
            },
            
            contCountry: {
                validators: {
                    notEmpty: {
                        message: 'The Contact Country is required and cannot be empty'
                    }              
                }
            },
            
            contPincode: {
                validators: {
                    notEmpty: {
                        message: 'The Pincode is required and cannot be empty'
                    } ,
                    regexp: {
                        regexp: /^\d{6}$/,
                        message: 'The Pincode must contain 6 digits'
                    }                 
                }
            },
            
          
            contEmail: {
                validators: {
                    notEmpty: {
                        message: 'The email is required and cannot be empty'
                    },
                    emailAddress: {
                        message: 'The email is not a valid email address'
                    },
                    regexp: {
                        regexp: /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/,
                        message: 'The email is not a valid email address'
                    }    
                }
            },
            
           gMapLatitute: {
                validators: {
                    regexp: {
                        regexp: /^([0-9])+([.])+([0-9])+$/,
                        message: 'Not A vaild Latitute'
                    }    
                }
            },
            
           gMapLangitute: {
                validators: {
                    regexp: {
                        regexp: /^([0-9])+([.])+([0-9])+$/,
                        message: 'Not A vaild Langitute'
                    }    
                }
            }      
            
        // End of Code
       }
    });
    
    // Slider Settings Form Validation
    $('.sliderSettingsForm').bootstrapValidator({
        message: 'This value is not valid',
         /*
        feedbackIcons: {
         
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
      */
        fields: {
                 
            slideMainImage: {
                message: 'The Slider main Image is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Slider main Image is required and cannot be empty'
                    }              
                }
            },
            
            slideTitle: {
                validators: {
                    notEmpty: {
                        message: 'The Slider Title is required'
                    }              
                }
            },
            
            slideDesc: {
                message: 'The Slider Description is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Slider Description is required and cannot be empty'
                    }
                }
            }       
            
        // End of Code
       }
    });
        
    // App Settings Form Validation
    $('.appSettingsForm').bootstrapValidator({
        message: 'This value is not valid',
         /*
        feedbackIcons: {
         
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
      */
        fields: {
                 
            companyName: {
                message: 'The Company Name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Company Name is required and cannot be empty'
                    }              
                }
            },
            
            companyPunchline: {
                validators: {
                    notEmpty: {
                        message: 'The Company Punch Line is required'
                    }              
                }
            },
            
            newsLimit: {
                validators: {
                    integer: {
                        message: 'The News Limits must contain digits'
                    }
                }
            },      
            
            productsLimit: {
                validators: {
                    integer: {
                        message: 'The Product Limits must contain digits'
                    }
                }
            },      
            
            mediaLimit: {
                validators: {
                    integer: {
                        message: 'The Media Limits must contain digits'
                    }
                }
            },      
            
            sliderImgLimit: {
                validators: {
                    integer: {
                        message: 'The Slider Image Limits must contain digits'
                    }
                }
            }            
            
        // End of Code
        }
    });
        
    // Company Profile Form Validation
    $('.companyProfileForm').bootstrapValidator({
        message: 'This value is not valid',
         /*
        feedbackIcons: {
         
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
      */
        fields: {
                 
            companyProfile: {
                message: 'The Company Profile is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Company Profile is required and cannot be empty'
                    }              
                }
            }
        // End of Code
        }
    });
        
    // Social Site Form Validation
    $('.socialSiteForm').bootstrapValidator({
        message: 'This value is not valid',
         /*
        feedbackIcons: {
         
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
      */
        fields: {                 
            SiteName: {
                message: 'The Social Site Name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Social Site Name is required and cannot be empty'
                    }              
                }
            },
                           
            idPageLink: {
                message: 'The Social Site Page Link is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Social Site Page Link is required and cannot be empty'
                    }              
                }
            },
                           
            siteIcon: {
                message: 'The Social Site Icon is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Social Site Icon is required and cannot be empty'
                    }              
                }
            }
        // End of Code
        }
    });
        
    // Social Site Form Validation
    $('.categoryForm').bootstrapValidator({
        message: 'This value is not valid',
         /*
        feedbackIcons: {
         
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
      */
        fields: {                 
            catName: {
                message: 'The Category Name is not valid',
                validators: {
                    notEmpty: {
                        message: 'The Category Name is required and cannot be empty'
                    }              
                }
            }    // End of Code
        }
    }); 
    
 
    
    //  Product Form Validation
    $('.productForm').bootstrapValidator({
        message: 'This value is not valid',
         /*
        feedbackIcons: {
         
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
      */
        fields: {               
            categoryId: {
                validators: {
                    notEmpty: {
                        message: 'The Product Catagory is required and cannot be empty'
                    }              
                }
            },
                             
            name: {
                validators: {
                    notEmpty: {
                        message: 'The Product Name is required and cannot be empty'
                    }              
                }
            },
                           
            imageFeatured: {
                validators: {
                    notEmpty: {
                        message: 'The Product Feature Image is required and cannot be empty'
                    }              
                }
            },
                           
            description: {
                validators: {
                    notEmpty: {
                        message: 'The Product Description is required and cannot be empty'
                    }              
                }
            },
                           
            minPrice: {
                validators: {
                    integer: {
                        message: 'The Minimum Price must contain digits'
                    }              
                }
            },
                           
            maxPrice: {
                validators: {
                    integer: {
                        message: 'The Maximum Price must contain digits'
                    }              
                }
            },
                           
            MRP: {
                validators: {
                    integer: {
                        message: 'The MRP must contain digits'
                    }              
                }
            },
                           
            discountPercentage: {
                validators: {
                    integer: {
                        message: 'The Discount % must contain digits'
                    }              
                }
            }
        // End of Code
        }
    });
    
        
    // Media Form Validation
    $('.mediaForm').bootstrapValidator({
        message: 'This value is not valid',
        /* 
        feedbackIcons: {
         
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
      */
        fields: {                 
            Caption: {
                validators: {
                    notEmpty: {
                        message: 'The Media Caption is required and cannot be empty'
                    }              
                }
            },
                           
            altText: {
                validators: {
                    notEmpty: {
                        message: 'The Media Alt text is required and cannot be empty'
                    }              
                }
            },
                           
            imgName: {
                validators: {
                   file: {
                      extension: 'jpeg,png,jpg,gif',
                      type: 'image/jpeg,image/png,image/jpg,image/gif',
                      maxSize: 1024 * 512,
                      message: 'The selected file is not valid. Image should be in jpeg,png,jpg,gif format or max Size is 1024 * 512.'
                    }             
                }
            }
        // End of Code
        }
    });
        
    // Testimonial Form Validation
    $('.testimonialForm').bootstrapValidator({
        message: 'This value is not valid',
         /*
        feedbackIcons: {
         
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
      */
        fields: {                 
            title: {
                validators: {
                    notEmpty: {
                        message: 'The Testimonial Title is required and cannot be empty'
                    }              
                }
            },
                           
            description: {
                validators: {
                    notEmpty: {
                        message: 'The Testimonial Description is required and cannot be empty'
                    }              
                }
            }
        // End of Code
        }
    });
        
        
    // Change Password Form Validation
    $('.changePasswordForm').bootstrapValidator({
        message: 'This value is not valid',
         /*
        feedbackIcons: {
         
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
      */
        fields: {                 
            oldPassword: {
                validators: {
                    notEmpty: {
                        message: 'The Old password is required and cannot be empty'
                    }              
                }
            },
                           
            newPassword: {
                validators: {
                    notEmpty: {
                        message: 'The New password is required and cannot be empty'
                    }              
                }
            },
                           
            password: {
                validators: {
                    notEmpty: {
                        message: 'The Confirm password is required and cannot be empty'
                    }              
                }
            }
        // End of Code
        }
    });
        
    // Users Form Validation
    $('.usersForm').bootstrapValidator({
        message: 'This value is not valid',
         /*
        feedbackIcons: {
          
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
      */
        fields: {                 
            empCode: {
                validators: {
                    notEmpty: {
                        message: 'The Employee Code is required and cannot be empty'
                    }              
                }
            },            
          
            userEmail: {
                validators: {
                    notEmpty: {
                        message: 'The email is required and cannot be empty'
                    },
                    emailAddress: {
                        message: 'The email is not a valid email address'
                    },
                    regexp: {
                        regexp: /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/,
                        message: 'The email is not a valid email address'
                    }    
                }
            },
                           
            name: {
                validators: {
                    notEmpty: {
                        message: 'The Users Name is required and cannot be empty'
                    }              
                }
            },
                           
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and cannot be empty'
                    }              
                }
            }
        // End of Code
        }
    });
    
    
    
});
</script>


  </body>
</html>