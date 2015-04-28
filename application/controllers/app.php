<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app extends CI_Controller {
  
  public function __construct(){
    
    parent::__construct();
    $this->load->model('Users_mod');//load the users from models created for users
    $this->load->model('Slider_settings_mod');//load the Slider Settings from models created for Slider Settings
    $this->load->model('Change_password_mod');//load the changePassword from models created for Change Password
    $this->load->model('Site_settings_mod');//load the siteSetting from models created for Site Settings
    $this->load->model('Company_profile_mod');//load the Company Profile from models created for Company Profile
    $this->load->model('Social_site_mod');//load the Social Site from models created for Social Site  
    $this->load->model('Category_mod');//load the Category from models created for Category 
    $this->load->model('Products_mod');//load the Product from models created for Product  
    $this->load->model('Media_mod');//load the Media from models created for Media 
    $this->load->model('Testimonial_mod');//load the testimonial from models created for Testimonial
    $this->load->model('News_mod');//load the news from models created for news
    $this->load->model('Contact_us_mod');//load the Contact Us from models created for Contact Us
    $this->load->model('Send_enquiries_mod');//load the Send Enquiries from models created for Send Enquiries
    
    $this->load->helper('url'); //to access the base url from routesuserLoggedinData
    $this->load->helper('form');//to access the base url from routesuserLoggedinData
    $this->load->library('form_validation');//to access the Form Validation Rules
    
    $this->load->database();
   
  }

  /**
   * Index Page for this controller.
   *
   * Maps to the following URL
   *    http://example.com/index.php/welcome
   *  - or -  
   *    http://example.com/index.php/welcome/index
   *  - or -
   * Since this controller is set as the default controller in 
   * config/routes.php, it's displayed at http://example.com/
   *
   * So any other public methods not prefixed with an underscore will
   * map to /index.php/welcome/<method_name>
   * @see http://codeigniter.com/user_guide/general/urls.html
   */
  public function index()
  {
    $data['loadLocations']['header']          = 1;
    $data['loadLocations']['topWidgets']      = 1;
    $data['loadLocations']['footerWidgets']   = 1;
    $data['loadLocations']['pageContents']    = 1;
    $data['loadLocations']['footer']          = 1;
    
    $data['topWidgets']['topGalleryHome']           = $this->config->item('widget_path_App')."galleryHome";
    $data['topWidgets']['navbarMenu']               = $this->config->item('widget_path_App')."navbarMenu";
    $data['footerWidgets']['footerPanelMenu']  		= $this->config->item('widget_path_App')."footerPanelMenu";
    $data['footerWidgets']['footerSocialSite']      = $this->config->item('widget_path_App')."footerSocialSite";
    $data['pageContents']['home']                   = $this->config->item('pageContents_path_App')."home";
        
    //for Header Category
    $whereCat  = "where parentCat = '0'";
    $data['headerMenuList']           = $this->Category_mod->get_category($whereCat);
    
    
    //for Header Detail
    $getSingRecSiteSettings           = $this->Site_settings_mod->get_siteSettings();
    $data['siteSettingSingleData']    = $getSingRecSiteSettings[0];
    
    //For Footer social site icon
    $where  = 'isVisible = 1';
    $data['socialSiteListData']       = $this->Social_site_mod->get_socialSiteSelected($where);
    
    // for Home Page Projects
    $whereProtfolioJoin = 'where catName = "Services" ';
    $data['projectsListData']         = $this->Products_mod->get_ProductsJoin($whereProtfolioJoin);
	
    // for Home Page about Us
    $data['companyProfileListData']   = $this->Company_profile_mod->get_companyProfile();
	
    // for Home Page Products 
    $wherePrdJoin = ' ' ;
    $data['productsListData']         = $this->Products_mod->get_ProductsJoin($wherePrdJoin);
	
    // for Home Page Testimonial 
    $data['testimonialListData']      = $this->Testimonial_mod->get_testimonial();
	   
    $this->load->view('layouts/app/index', $data);
  }
 
 public function aboutUs()
  {
    $data['loadLocations']['header']          = 1;
    $data['loadLocations']['topWidgets']      = 1;
    $data['loadLocations']['footerWidgets']   = 1;
    $data['loadLocations']['pageContents']    = 1;
    $data['loadLocations']['footer']          = 1;
    
    $data['topWidgets']['topGallery']               = $this->config->item('widget_path_App')."gallery";
    $data['header']['pageTitle']         			= "About Us";
    $data['topWidgets']['navbarMenu']               = $this->config->item('widget_path_App')."navbarMenu";
    $data['footerWidgets']['footerPanelMenu']  		= $this->config->item('widget_path_App')."footerPanelMenu";
    $data['footerWidgets']['footerSocialSite']      = $this->config->item('widget_path_App')."footerSocialSite";
    $data['pageContents']['aboutUs']                = $this->config->item('pageContents_path_App')."aboutUs";
    
    //for Header Category
    $whereCat  = "where parentCat = '0'";
    $data['headerMenuList']           = $this->Category_mod->get_category($whereCat);
    
    
    //for Header Detail
    $getSingRecSiteSettings           = $this->Site_settings_mod->get_siteSettings();
    $data['siteSettingSingleData']    = $getSingRecSiteSettings[0];
    
    //For Footer social site icon
    $where  = 'isVisible = 1';
    $data['socialSiteListData']       = $this->Social_site_mod->get_socialSiteSelected($where);  
    
    
    // for Page Contents and footer widgets
    $data['companyProfileListData'] = $this->Company_profile_mod->get_companyProfile();
	
    // for Page Contents 
    $data['newsListData'] 			= $this->News_mod->get_news();
    
    $this->load->view('layouts/app/index', $data);
  }  
 
 public function testimonial()
  {
    $data['loadLocations']['header']          = 1;
    $data['loadLocations']['topWidgets']      = 1;
    $data['loadLocations']['footerWidgets']   = 1;
    $data['loadLocations']['pageContents']    = 1;
    $data['loadLocations']['footer']          = 1;
    
    $data['topWidgets']['topGallery']               = $this->config->item('widget_path_App')."gallery";
    $data['header']['pageTitle']         			= "Testimonial";
    $data['topWidgets']['navbarMenu']               = $this->config->item('widget_path_App')."navbarMenu";
    $data['footerWidgets']['footerPanelMenu']  		= $this->config->item('widget_path_App')."footerPanelMenu";
    $data['footerWidgets']['footerSocialSite']      = $this->config->item('widget_path_App')."footerSocialSite";
    $data['pageContents']['testimonial']            = $this->config->item('pageContents_path_App')."testimonial";
    
    //for Header Category
    $whereCat  = "where parentCat = '0'";
    $data['headerMenuList']           = $this->Category_mod->get_category($whereCat);
    
    // for side Sub Portale Link
    $whereProtfolioJoin = 'where catName = "Portfolio" ';
    $data['portfolioListData']         = $this->Products_mod->get_ProductsJoin($whereProtfolioJoin);
    
    //for Header Detail
    $getSingRecSiteSettings           = $this->Site_settings_mod->get_siteSettings();
    $data['siteSettingSingleData']    = $getSingRecSiteSettings[0];
    
    //For Footer social site icon
    $where  = 'isVisible = 1';
    $data['socialSiteListData']       = $this->Social_site_mod->get_socialSiteSelected($where);
    
    // for footerr widgets
    $data['companyProfileListData']   = $this->Company_profile_mod->get_companyProfile();    
    $data['testimonialListData']      = $this->Testimonial_mod->get_testimonial();    
    
    
    // for Page Contents 
    $data['testimonialListData']      = $this->Testimonial_mod->get_testimonial();
    
    $this->load->view('layouts/app/index', $data);
  }
  
    
 
 public function contactUs()
  {
    $data['loadLocations']['header']          = 1;
    $data['loadLocations']['topWidgets']      = 1;
    $data['loadLocations']['footerWidgets']   = 1;
    $data['loadLocations']['pageContents']    = 1;
    $data['loadLocations']['footer']          = 1;
    
    $data['topWidgets']['topGallery']               = $this->config->item('widget_path_App')."gallery";
    $data['header']['pageTitle']         			= "Contact Us";
    $data['topWidgets']['navbarMenu']               = $this->config->item('widget_path_App')."navbarMenu";
    $data['footerWidgets']['footerPanelMenu']  		= $this->config->item('widget_path_App')."footerPanelMenu";
    $data['footerWidgets']['footerSocialSite']      = $this->config->item('widget_path_App')."footerSocialSite";
    $data['pageContents']['contactUs']              = $this->config->item('pageContents_path_App')."contactUs";
    
    //for Header Category
    $whereCat  = "where parentCat = '0'";
    $data['headerMenuList']           = $this->Category_mod->get_category($whereCat);
    
    // for side Sub Portale Link
    $whereProtfolioJoin = 'where catName = "Portfolio" ';
    $data['portfolioListData']         = $this->Products_mod->get_ProductsJoin($whereProtfolioJoin);
    
    //for Header Detail
    $getSingRecSiteSettings           = $this->Site_settings_mod->get_siteSettings();
    $data['siteSettingSingleData']    = $getSingRecSiteSettings[0];
    
    //For Footer social site icon
    $where  = 'isVisible = 1';
    $data['socialSiteListData']       = $this->Social_site_mod->get_socialSiteSelected($where);
    
    // for footerr widgets
    $data['companyProfileListData']   = $this->Company_profile_mod->get_companyProfile();    
    $data['testimonialListData']      = $this->Testimonial_mod->get_testimonial();    
   
    
    // for Page Contents 
    $data['contactUsListData']        = $this->Contact_us_mod->get_contactUs();
    
    $this->load->view('layouts/app/index', $data);
  }

  public function sendEnquiryInsert()
  {
        //Array database table col name with value of form field for insert the form value into database
        $sendEnquiriesInsertDataArray  = array(
          'subject' => $this->input->post('subject'),
          'gender' => $this->input->post('gender'),
          'ptcName' => $this->input->post('ptcName'),
          'senderCompanyName' => $this->input->post('senderCompanyName'),
          'country' => $this->input->post('country'),
          'state' => $this->input->post('state'),
          'city' => $this->input->post('city'),
          'email' => $this->input->post('email'),
          'ISD' => $this->input->post('ISD'),
          'STD' => $this->input->post('STD'),
          'phNumber' => $this->input->post('phNumber'),
          'mobileNumber' => $this->input->post('mobileNumber'),
          'enqDate' => date('d-m-y h:m:s', mktime(date("h")+18,date("m")+10)),
          'readStatus' => "Unread"
        );
        
        
        //setting the validation rule for form field -title.
        $this->form_validation->set_rules('subject', 'Subject', 'required');  
        $this->form_validation->set_rules('gender', 'Gender', 'required');
        $this->form_validation->set_rules('ptcName', 'PTC Name', 'required');
        $this->form_validation->set_rules('senderCompanyName', 'Sender Company Name', 'required');
        $this->form_validation->set_rules('country', 'Country', 'required');
        $this->form_validation->set_rules('state', 'State', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('email', 'Email Id', 'required|valid_email');
        $this->form_validation->set_rules('ISD', 'ISD Code', 'min_length[2]|max_length[4]');
        $this->form_validation->set_rules('STD', 'STD Code', 'min_length[2]|max_length[5]');
        $this->form_validation->set_rules('phNumber', 'Phone No', 'min_length[6]|max_length[8]');
        $this->form_validation->set_rules('mobileNumber', 'Mobile No', 'required|exact_length[11]|numeric');
        $this->form_validation->set_rules('massage', 'Massage', 'required');
      
        if ($this->form_validation->run() === FALSE)
        {
          $this->contactUs();
        }
        else
        {
        
          $this->Send_enquiries_mod->insert_sendEnquiries($sendEnquiriesInsertDataArray); 
          
         redirect(base_url()."app/contactUs");
        }      
  }

  public function deliveriables()
  {
    $data['loadLocations']['header']          = 1;
    $data['loadLocations']['topWidgets']      = 1;
    $data['loadLocations']['footerWidgets']   = 1;
    $data['loadLocations']['pageContents']    = 1;
    $data['loadLocations']['footer']          = 1;
    
    $data['topWidgets']['topGallery']               = $this->config->item('widget_path_App')."gallery";
    $data['topWidgets']['navbarMenu']               = $this->config->item('widget_path_App')."navbarMenu";
    $data['footerWidgets']['footerPanelMenu']  		= $this->config->item('widget_path_App')."footerPanelMenu";
    $data['footerWidgets']['footerSocialSite']      = $this->config->item('widget_path_App')."footerSocialSite";
    $data['pageContents']['deliveriablesMenu']      = $this->config->item('pageContents_path_App')."deliveriablesMenu";
        
    //for Header Category
    $whereCat  = "where parentCat = '0'";
    $data['headerMenuList']           = $this->Category_mod->get_category($whereCat);
    
    //for Header Detail
    $getSingRecSiteSettings           = $this->Site_settings_mod->get_siteSettings();
    $data['siteSettingSingleData']    = $getSingRecSiteSettings[0];
    
	// for side Sub Portale Link
    $whereProtfolioJoin = 'where catName = "Portfolio" ';
    $data['portfolioListData']         = $this->Products_mod->get_ProductsJoin($whereProtfolioJoin);
    
    //For Footer social site icon
    $where  = 'isVisible = 1';
    $data['socialSiteListData']       = $this->Social_site_mod->get_socialSiteSelected($where);
    
    // for footerr widgets and for Left Product Menu
    $data['companyProfileListData']   = $this->Company_profile_mod->get_companyProfile();    
    $data['testimonialListData']      = $this->Testimonial_mod->get_testimonial();    
    $wherePrdJoin = 'where catName = "Services" ';
    $data['productsListData']         = $this->Products_mod->get_ProductsJoin($wherePrdJoin);
    
    // for Page Conents        
    if(isset($_GET['catId'])){          
    $wherePrdJoin = 'where categoryId = "'. $_GET['catId'] .'" ';
    $productsRightListData       	  = $this->Products_mod->get_ProductsJoin($wherePrdJoin);
	$data['productsRightListData']	  = $productsRightListData;
	//var_dump($productsRightListData);
    $data['header']['pageTitle']       = $productsRightListData[0]['catName'];
	
	if(isset($_GET['proId'])){		
      $proId = $_GET['proId'];
      $getSingRecProduct              = $this->Products_mod->getSingle_Products($proId);
      //var_dump($getSingRecProduct);
      $data['productSingleData']	  = $getSingRecProduct[0];
	}
   }
    
     
    
    $this->load->view('layouts/app/index', $data);    
   }

	public function process_productAjax()
	{ 
      $proId = $_POST['Id'];
      $getSingRecProduct              = $this->Products_mod->getSingle_Products($proId);
      //var_dump($getSingRecProduct);
      $productSingleDataAjax	      = $getSingRecProduct[0];
	  
	  $return_arr = array();
	    $return_arr["name"]  = $productSingleDataAjax['name'];
	    $return_arr["image"] = $productSingleDataAjax['imageFeatured'];
	    $return_arr["descp"] = $productSingleDataAjax['description'];	 
		
		echo json_encode($return_arr);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */