<?php
    if((isset($loadLocations['sidebarLeft']) || isset($sidebarLeft)) && (isset($loadLocations['sidebarRight']) || isset($sidebarRight))){
    	$contentColWidth = "col-md-8"; 
   	}
	elseif(isset($loadLocations['sidebarLeft']) || isset($sidebarLeft) || isset($loadLocations['sidebarRight']) || isset($sidebarRight)){
		$contentColWidth = "col-md-10"; 
    }
	elseif((!isset($loadLocations['sidebarLeft']) || !isset($sidebarLeft)) && (!isset($loadLocations['sidebarRight']) || !isset($sidebarRight))){
		$contentColWidth = "col-md-12";
    }
?>
	
	<div class="<?php echo $contentColWidth;?>">
		<?php //var_dump($pageContents);exit;
			if(isset($pageContents['login'])){
				$this->load->view($pageContents['login']);
			} 
      
			if(isset($pageContents['passwordRecovery'])){
        $this->load->view($pageContents['passwordRecovery']);
      } 
       
      if(isset($pageContents['dashboard'])){
        $this->load->view($pageContents['dashboard']);
      } 
      
			if(isset($pageContents['sliderSettingsList'])){
				$this->load->view($pageContents['sliderSettingsList']);
			}
      
      if(isset($pageContents['sliderSettingsFrm'])){
        $this->load->view($pageContents['sliderSettingsFrm']);
      }
			
			if(isset($pageContents['appSettingsList'])){
				$this->load->view($pageContents['appSettingsList']);
			} 
			
			if(isset($pageContents['appSettingsFrm'])){
				$this->load->view($pageContents['appSettingsFrm']);
			} 
			
			if(isset($pageContents['companyProfileList'])){
				$this->load->view($pageContents['companyProfileList']);
			}
			
			if(isset($pageContents['companyProfileFrm'])){
				$this->load->view($pageContents['companyProfileFrm']);
			}  
			
			if(isset($pageContents['changePasssword'])){
				$this->load->view($pageContents['changePasssword']);
			} 
			
			if(isset($pageContents['contactUsList'])){
				$this->load->view($pageContents['contactUsList']);
			} 
			
			if(isset($pageContents['contactUsFrm'])){
				$this->load->view($pageContents['contactUsFrm']);
			}       
      
      if(isset($pageContents['categoryList'])){
        $this->load->view($pageContents['categoryList']);
      }      
      
      if(isset($pageContents['categoryFrm'])){
        $this->load->view($pageContents['categoryFrm']);
      }         
      
      if(isset($pageContents['popupMediaAdd'])){
        $this->load->view($pageContents['popupMediaAdd']);
      } 
			
			if(isset($pageContents['mediaList'])){
				$this->load->view($pageContents['mediaList']);
			} 
			
			if(isset($pageContents['mediaFrm'])){
				$this->load->view($pageContents['mediaFrm']);
			} 
			
			if(isset($pageContents['productsList'])){
				$this->load->view($pageContents['productsList']);
			} 
			
			if(isset($pageContents['productsFrm'])){
				$this->load->view($pageContents['productsFrm']);
			} 
			
			if(isset($pageContents['sendEnquiriesList'])){
				$this->load->view($pageContents['sendEnquiriesList']);
			} 
			
			if(isset($pageContents['socialSiteList'])){
				$this->load->view($pageContents['socialSiteList']);
			}  
      
      if(isset($pageContents['sendEnquiryView'])){
        $this->load->view($pageContents['sendEnquiryView']);
      } 
			
			if(isset($pageContents['socialSiteFrm'])){
				$this->load->view($pageContents['socialSiteFrm']);
			} 
			
			if(isset($pageContents['testimonialList'])){
				$this->load->view($pageContents['testimonialList']);
			}
			
			if(isset($pageContents['testimonialFrm'])){
				$this->load->view($pageContents['testimonialFrm']);
			} 
			
			if(isset($pageContents['usersList'])){
				$this->load->view($pageContents['usersList']);
			}
			
			if(isset($pageContents['usersFrm'])){
				$this->load->view($pageContents['usersFrm']);
			}

			if(isset($pageContents['InvoiceList'])){
				$this->load->view($pageContents['InvoiceList']);
			}

			if(isset($pageContents['invoiceFrm'])){
				$this->load->view($pageContents['invoiceFrm']);
			}


			if(isset($pageContents['printPDF'])){
				$this->load->view($pageContents['printPDF']);
			}
			
		?>
	   	
</div>