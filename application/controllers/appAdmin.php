<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class appAdmin extends CI_Controller {
	
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
    $this->load->model('News_mod');//load the testimonial from models created for Testimonial
    $this->load->model('Contact_us_mod');//load the Contact Us from models created for Contact Us 
    $this->load->model('Send_enquiries_mod');//load the Send Enquiries from models created for Send Enquiries
    $this->load->model('Invoice_mod');//load the invoice from models created for invoice
		
		$this->load->helper('url'); //to access the base url from routesuserLoggedinData
    $this->load->helper('form');//to access the base url from routesuserLoggedinData
		$this->load->library('session'); // to access the session varible in all files
    $this->load->library('form_validation');//to access the Form Validation Rules
    
    $this->load->database();
    $this->is_logged_in(); //this function call checkes if the user is logged in of not.
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
    
    function is_logged_in(){
      $is_logged_in = $this->session->userdata('is_logged_in');
      
      if(!isset($is_logged_in) || $is_logged_in !=true){
        redirect(base_url().'appLogin/login?msg=3');
      }
    }
  
	public function index()
	{
		$data['loadLocations']['header'] = 1;
		$data['loadLocations']['sidebarLeft'] = 1;
		$data['loadLocations']['pageContents'] = 1;
		//$data['loadLocations']['sidebarRight'] = 1;
		$data['loadLocations']['footer'] = 1;
		
		$data['header']['search'] = $this->config->item('widget_path_Admin')."search";
		$data['header']['myAccount'] = $this->config->item('widget_path_Admin')."myAccount";
		$data['sidebarLeft']['menuSidebar'] = $this->config->item('widget_path_Admin')."menuSidebar";
		//$data['sidebarRight']['selectImg'] = $this->config->item('widget_path_Admin')."selectImg";
		
		$data['pageContents']['dashboard'] = $this->config->item('pageContents_path_Admin')."dashboard";
		
		$data['header']['title'] = "My Admin";
		$data['header']['myAccountDtl'] = $this->session->userdata('name');
		
		$this->load->view('layouts/appAdmin/index', $data);
	}

	public function logout()
	{
		$this->load->helper('url');
		
		$this->session->unset_userdata('$userLoggedinData');
		$this->session->unset_userdata('is_logged_in');
		redirect(base_url().'appLogin/login');
	}
   
  public function changePasssword()
  {
    $data['loadLocations']['header'] = 1;
    $data['loadLocations']['sidebarLeft'] = 1;
    $data['loadLocations']['pageContents'] = 1;
    //$data['loadLocations']['sidebarRight'] = 1;
    $data['loadLocations']['footer'] = 1;
    
    $data['header']['search'] = $this->config->item('widget_path_Admin')."search";
    $data['header']['myAccount'] = $this->config->item('widget_path_Admin')."myAccount";
    $data['sidebarLeft']['menuSidebar'] = $this->config->item('widget_path_Admin')."menuSidebar";
    //$data['sidebarRight']['selectImg'] = $this->config->item('widget_path_Admin')."selectImg";
    
    $data['pageContents']['changePasssword'] = $this->config->item('pageContents_path_Admin')."changePasssword";
    
    $data['header']['title'] = "My Admin";
    $data['header']['myAccountDtl'] = $this->session->userdata('name');
    
    $this->load->view('layouts/appAdmin/index', $data);
  }
  
  public function changePasswordUpdate()
  {
    $updDataArray  = array(
        'password' => $this->input->post('password')
        );
        
       $where     = array('name' => $this->session->userdata('name')); 
        //setting the validation rule for form field -title.
        $this->form_validation->set_rules('oldPassword',  'Old Password', 'required|callback_oldPasswordMatch');
        $this->form_validation->set_rules('newPassword',  'Password', 'required|matches[password]');
        $this->form_validation->set_rules('password',  'Password Confirmation', 'required');
        
        
        if ($this->form_validation->run() === FALSE)
        {
          $this->changePasssword();  
        }
        else
        {
        
          $this->Change_password_mod->update_changePassword($updDataArray, $where); 
          redirect(base_url()."appAdmin/changePasssword");
        }
  }
  
  // Set Validation rules for Old Password must match with Database table user field passsword
  public function oldPasswordMatch()
  {
    $name                     = $this->session->userdata('name');
    $oldPasswordtableField    = $this->Change_password_mod->getSingle_changePassword($name);
    
    $oldPassworddatabsefield  = $oldPasswordtableField[0]['password'];
    $oldPasswordFormField     = $this->input->post('oldPassword');
    
    if ($oldPasswordFormField != $oldPassworddatabsefield)
    {
      $this->form_validation->set_message('oldPasswordMatch', 'Old Password is not match with database password.');
      return FALSE;
    }
    else
    {
      return TRUE;
    }
  }
  
  public function sliderSettingsList()
  {
    $data['loadLocations']['header'] = 1;
    $data['loadLocations']['sidebarLeft'] = 1;
    $data['loadLocations']['pageContents'] = 1;
    //$data['loadLocations']['sidebarRight'] = 1;
    $data['loadLocations']['footer'] = 1;
    
    $data['header']['search'] = $this->config->item('widget_path_Admin')."search";
    $data['header']['myAccount'] = $this->config->item('widget_path_Admin')."myAccount";
    $data['sidebarLeft']['menuSidebar'] = $this->config->item('widget_path_Admin')."menuSidebar";
    //$data['sidebarRight']['selectImg'] = $this->config->item('widget_path_Admin')."selectImg";
    $data['pageContents']['sliderSettingsList'] = $this->config->item('pageContents_path_Admin')."sliderSettingsList";
    
    $data['header']['title'] = "My Admin";
    $data['header']['myAccountDtl'] = $this->session->userdata('name');
    
    $data['sliderSettingsListData'] =$this->Slider_settings_mod->get_sliderSetting();
    
    
    $appSettingLimit      = $this->Site_settings_mod->get_siteSettings();
    $appSettingTestLimit  = $appSettingLimit['0']['sliderImgLimit'];
    $sliderSettingNumRow  = $this->Slider_settings_mod->get_sliderSettingNumRows();
    
    if($sliderSettingNumRow >= $appSettingTestLimit){
      $data['addBtn'] = 'Limit Exceeds So Remove Some Entries.';
    }  
    
    $this->load->view('layouts/appAdmin/index', $data);      
  }
	
  public function sliderSettingsFrm()
  {
    $data['loadLocations']['header'] = 1;
    $data['loadLocations']['sidebarLeft'] = 1;
    $data['loadLocations']['pageContents'] = 1;
   // $data['loadLocations']['sidebarRight'] = 1;
    $data['loadLocations']['footer'] = 1;
    
    $data['header']['search'] = $this->config->item('widget_path_Admin')."search";
    $data['header']['myAccount'] = $this->config->item('widget_path_Admin')."myAccount";
    $data['sidebarLeft']['menuSidebar'] = $this->config->item('widget_path_Admin')."menuSidebar";
  //  $data['sidebarRight']['selectImg'] = $this->config->item('widget_path_Admin')."selectImg";    
    $data['mediaModalListData'] = $this->Media_mod->get_Media();
    
    $data['pageContents']['sliderSettingsFrm'] = $this->config->item('pageContents_path_Admin')."sliderSettingsFrm";
    
    $data['header']['title'] = "My Admin";
    $data['header']['myAccountDtl'] = $this->session->userdata('name');
      
    $updId = $this->input->post('Id');
    
    if($updId != ''){
      $data['updId']                    = $updId;
      $data['action']                   = "sliderSettingsUpdate";
      $data['pageTitle']                = "Edit Slider Setting";
      $data['SubmitValue']              = "Update";
      $getSingRecSliderSettings         = $this->Slider_settings_mod->getSingle_sliderSetting($updId);
      $data['sliderSettingSingleData']  = $getSingRecSliderSettings[0]; 
    }
    else {
      $data['updId']        = '';
      $data['action']       = "sliderSettingsInsert";
      $data['pageTitle']    = "Add Slider Setting";
      $data['SubmitValue']  = "Add";  
   
      $appSettingLimit      = $this->Site_settings_mod->get_siteSettings();
      $appSettingTestLimit  = $appSettingLimit['0']['sliderImgLimit'];
      $sliderSettingNumRow  = $this->Slider_settings_mod->get_sliderSettingNumRows();

      if($sliderSettingNumRow >= $appSettingTestLimit){
        $data['addBtn'] = 'Limit Exceeds So Remove Some Entries.';
        } 
      }    
    
    $this->load->view('layouts/appAdmin/index', $data);      
  }

  public function sliderSettingsInsert()
  {          
        //Array database table col name with value of form field for insert the form value into database
        $sliderSettingInsertDataArray  = array(
          'slideMainImage' => $this->input->post('slideMainImage'),
          'siideIconImage' => $this->input->post('siideIconImage'),
          'slideTitle' => $this->input->post('slideTitle'),
          'slideDesc' => $this->input->post('slideDesc'),
          'slideHyperlink' => $this->input->post('slideHyperlink')
        );
        
        
        //setting the validation rule for form field -title.
        $this->form_validation->set_rules('slideMainImage', 'Slider Main Image', 'required');  
        $this->form_validation->set_rules('siideIconImage', 'Slider icon Image', 'min_length[0]');
        $this->form_validation->set_rules('slideTitle', 'Slider Title', 'required');
        $this->form_validation->set_rules('slideDesc', 'Slider Description', 'required');
        $this->form_validation->set_rules('slideHyperlink', 'Slider Hyperlink', 'min_length[0]');
      
          
        if ($this->form_validation->run() === FALSE)
        {
          $this->sliderSettingsFrm();
        }
        else
        {          
            $this->Slider_settings_mod->insert_sliderSetting($sliderSettingInsertDataArray);
                 
           // redirect(base_url()."appAdmin/sliderSettingsFrm");
        }
     } 
  
  public function sliderSettingsUpdate()
  {
        //Array database table col name with value of form field for insert the form value into database
        $updDataArray  = array(
          'slideMainImage' => $this->input->post('slideMainImage'),
          'siideIconImage' => $this->input->post('siideIconImage'),
          'slideTitle' => $this->input->post('slideTitle'),
          'slideDesc' => $this->input->post('slideDesc'),
          'slideHyperlink' => $this->input->post('slideHyperlink')
        );
        
        
        //setting the validation rule for form field -title.
        $this->form_validation->set_rules('slideMainImage', 'Slider Main Image', 'required');  
        $this->form_validation->set_rules('siideIconImage', 'Slider icon Image', 'min_length[0]');
        $this->form_validation->set_rules('slideTitle', 'Slider Title', 'required');
        $this->form_validation->set_rules('slideDesc', 'Slider Description', 'required');
        $this->form_validation->set_rules('slideHyperlink', 'Slider Hyperlink', 'min_length[0]');
      
      
        if ($this->form_validation->run() === FALSE)
        {
          $this->sliderSettingsFrm();  
        }
        else
        {
        
          $this->Slider_settings_mod->update_sliderSetting($updDataArray); 
         redirect(base_url()."appAdmin/sliderSettingsList");
        }   
  }
  
  public function sliderSettingsDelete()
  {
    $id = $this->input->post('Id');
    $this->Slider_settings_mod->delete_sliderSetting($id); 
    redirect(base_url()."appAdmin/sliderSettingsList");     
  }
    
    public function sliderSettingsMultipleDelete() {
        $dat = $this->input->post('multipleDeleteSelect');
        for ($i = 0; $i < sizeof($dat); $i++) {
            print_r($dat[$i]);
            $this->Slider_settings_mod->multipleDelete_sliderSetting($dat[$i]);
        }
        redirect(base_url()."appAdmin/sliderSettingsList");   
     }
  
  
  
  // App Settings Coding.
	public function appSettingsList()
	{
		$data['loadLocations']['header'] = 1;
		$data['loadLocations']['sidebarLeft'] = 1;
		$data['loadLocations']['pageContents'] = 1;
		//$data['loadLocations']['sidebarRight'] = 1;
		$data['loadLocations']['footer'] = 1;
		
		$data['header']['search'] = $this->config->item('widget_path_Admin')."search";
		$data['header']['myAccount'] = $this->config->item('widget_path_Admin')."myAccount";
		$data['sidebarLeft']['menuSidebar'] = $this->config->item('widget_path_Admin')."menuSidebar";
		//$data['sidebarRight']['selectImg'] = $this->config->item('widget_path_Admin')."selectImg";
		$data['pageContents']['appSettingsList'] = $this->config->item('pageContents_path_Admin')."appSettingsList";
		
		$data['header']['title'] = "My Admin";
    $data['header']['myAccountDtl'] = $this->session->userdata('name');
    
    $data['siteSettingListData'] =$this->Site_settings_mod->get_siteSettings();
		
		$appSettingsNumRow = $this->Site_settings_mod->get_siteSettingsNumRos();
    if($appSettingsNumRow > 0){
      $data['addBtn'] = 'Only 1 Entry Can Add.';
    }  
		$this->load->view('layouts/appAdmin/index', $data);
	}

	public function appSettingsFrm()
	{
		$data['loadLocations']['header'] = 1;
		$data['loadLocations']['sidebarLeft'] = 1;
		$data['loadLocations']['pageContents'] = 1;
		$data['loadLocations']['sidebarRight'] = 1;
		$data['loadLocations']['footer'] = 1;
		
		$data['header']['search'] = $this->config->item('widget_path_Admin')."search";
		$data['header']['myAccount'] = $this->config->item('widget_path_Admin')."myAccount";
		$data['sidebarLeft']['menuSidebar'] = $this->config->item('widget_path_Admin')."menuSidebar";
		$data['sidebarRight']['selectImg'] = $this->config->item('widget_path_Admin')."selectImg";		
    $data['sidebarRight']['selectImgTitle'] = 'Logo';    
    $data['mediaModalListData'] = $this->Media_mod->get_Media();
    
		$data['pageContents']['appSettingsFrm'] = $this->config->item('pageContents_path_Admin')."appSettingsFrm";
		
		$data['header']['title'] = "My Admin";
    $data['header']['myAccountDtl'] = $this->session->userdata('name');
      
    $updId = $this->input->post('Id');
    
    if($updId != ''){
      $data['updId']                  = $updId;
  		$data['action']                 = "appSettingsUpdate";
      $data['pageTitle']              = "Edit App Setting";
      $data['SubmitValue']            = "Update";
      $getSingRecSiteSettings         = $this->Site_settings_mod->getSingle_siteSettings($updId);
      $data['siteSettingSingleData']  = $getSingRecSiteSettings[0]; 
    }
    else {
      $data['updId']        = '';
      $data['action']       = "appSettingsInsert";
      $data['pageTitle']    = "Add Setting";
      $data['SubmitValue']  = "Add";  
    }
    
    // Check if num rows is greater than 0
    $appSettingsNumRow = $this->Site_settings_mod->get_siteSettingsNumRos();
    if($appSettingsNumRow > 0){      
      $getRecSiteSettings             = $this->Site_settings_mod->get_siteSettings();      
      $data['updId']                  = $getRecSiteSettings['0']['Id'];
      $data['action']                 = "appSettingsUpdate";
      $data['pageTitle']              = "Edit Setting";
      $data['SubmitValue']            = "Update";
      $data['siteSettingSingleData']  = $getRecSiteSettings[0]; 
    }
    
		$this->load->view('layouts/appAdmin/index', $data);
	}
  	
	public function appSettingsInsert()
  {
        //Array database table col name with value of form field for insert the form value into database
        $siteSettingsInsertDataArray  = array(
          'companyName' => $this->input->post('companyName'),
          'companyPunchline' => $this->input->post('companyPunchline'),
          'companyLogo' => $this->input->post('companyLogo'),
          'mainKeywords' => $this->input->post('mainKeywords'),
          'metaDesc' => $this->input->post('metaDesc'),
          'newsLimit' => $this->input->post('newsLimit'),
          'productsLimit' => $this->input->post('productsLimit'),
          'mediaLimit' => $this->input->post('mediaLimit'),
          'sliderImgLimit' => $this->input->post('sliderImgLimit')
        );
        
        
        //setting the validation rule for form field -title.
        $this->form_validation->set_rules('companyName', 'Company Name', 'required');  
        $this->form_validation->set_rules('companyPunchline', 'Punch Line', 'required');
        $this->form_validation->set_rules('companyLogo', 'news Line', 'min_length[0]');
        $this->form_validation->set_rules('mainKeywords', 'news Line', 'min_length[0]');
        $this->form_validation->set_rules('metaDesc', 'news Line', 'min_length[0]');
        $this->form_validation->set_rules('newsLimit', 'news Line', 'min_length[0]');
        $this->form_validation->set_rules('productsLimit', 'news Line', 'min_length[0]');
        $this->form_validation->set_rules('mediaLimit', 'news Line', 'min_length[0]');
        $this->form_validation->set_rules('sliderImgLimit', 'news Line', 'min_length[0]');
      
          
        if ($this->form_validation->run() === FALSE)
        {
          $this->appSettingsFrm();
        }
        else
        {
        
          $this->Site_settings_mod->insert_siteSettings($siteSettingsInsertDataArray); 
          
          redirect(base_url()."appAdmin/appSettingsFrm");
        }
     }

 
 public function appSettingsUpdate()
  {
        //Array database table col name with value of form field for insert the form value into database
        $updDataArray  = array(
        'companyName' => $this->input->post('companyName'),
        'companyPunchline' => $this->input->post('companyPunchline'),
        'companyLogo' => $this->input->post('companyLogo'),
        'mainKeywords' => $this->input->post('mainKeywords'),
        'metaDesc' => $this->input->post('metaDesc'),
        'newsLimit' => $this->input->post('newsLimit'),
        'productsLimit' => $this->input->post('productsLimit'),
        'mediaLimit' => $this->input->post('mediaLimit'),
        'sliderImgLimit' => $this->input->post('sliderImgLimit')
        );
        
        
        //setting the validation rule for form field -title.
        $this->form_validation->set_rules('companyName', 'Company Name', 'required');  
        $this->form_validation->set_rules('companyPunchline', 'Punch Line', 'required'); 
      
      
        if ($this->form_validation->run() === FALSE)
        {
          $this->appSettingsFrm();  
        }
        else
        {
        
          $this->Site_settings_mod->update_siteSettings($updDataArray); 
          redirect(base_url()."appAdmin/appSettingsList");
        }
     }

  public function appSettingsDelete(){
    $id = $this->input->post('Id');
    $this->Site_settings_mod->delete_siteSettings($id); 
    redirect(base_url()."appAdmin/appSettingsList");   
  }

  // Company Profile Coding.
	public function companyProfileList()
	{
		$data['loadLocations']['header'] = 1;
		$data['loadLocations']['sidebarLeft'] = 1;
		$data['loadLocations']['pageContents'] = 1;
		//$data['loadLocations']['sidebarRight'] = 1;
		$data['loadLocations']['footer'] = 1;
		
		$data['header']['search'] = $this->config->item('widget_path_Admin')."search";
		$data['header']['myAccount'] = $this->config->item('widget_path_Admin')."myAccount";
		$data['sidebarLeft']['menuSidebar'] = $this->config->item('widget_path_Admin')."menuSidebar";
		//$data['sidebarRight']['selectImg'] = $this->config->item('widget_path_Admin')."selectImg";
		
		$data['pageContents']['companyProfileList'] = $this->config->item('pageContents_path_Admin')."companyProfileList";
		
		$data['header']['title'] = "My Admin";
    $data['header']['myAccountDtl'] = $this->session->userdata('name');
    
    $data['companyProfileListData'] = $this->Company_profile_mod->get_companyProfile();    
		$companyProfileNumRow = $this->Company_profile_mod->get_companyProfileNumRows();
    if($companyProfileNumRow > 0){
      $data['addBtn'] = 'Only 1 Entry Can Add.';
    }      
		$this->load->view('layouts/appAdmin/index', $data);
	}
	
	public function companyProfileFrm()
	{
		$data['loadLocations']['header'] = 1;
		$data['loadLocations']['sidebarLeft'] = 1;
		$data['loadLocations']['pageContents'] = 1;
		$data['loadLocations']['sidebarRight'] = 1;
		$data['loadLocations']['footer'] = 1;
		
		$data['header']['search'] = $this->config->item('widget_path_Admin')."search";
		$data['header']['myAccount'] = $this->config->item('widget_path_Admin')."myAccount";
		$data['sidebarLeft']['menuSidebar'] = $this->config->item('widget_path_Admin')."menuSidebar";
		$data['sidebarRight']['selectImg'] = $this->config->item('widget_path_Admin')."selectImg";
    $data['mediaModalListData'] = $this->Media_mod->get_Media();
		
		$data['pageContents']['companyProfileFrm'] = $this->config->item('pageContents_path_Admin')."companyProfileFrm";
		
		$data['header']['title'] = "My Admin";
    $data['header']['myAccountDtl'] = $this->session->userdata('name');
		
		$updId = $this->input->post('Id');
    
    if($updId != ''){
      $data['updId']                  = $updId;
      $data['action']                 = "companyProfileUpdate";
      $data['pageTitle']              = "Edit Company Profile";
      $data['SubmitValue']            = "Update";
      
      $getSingRecCompanyProfile       = $this->Company_profile_mod->getSingle_companyProfile($updId);
      $data['companyProfileSingleData']  = $getSingRecCompanyProfile[0]; 
    }
    else {
      $data['updId']        = '';
      $data['action']       = "companyProfileInsert";
      $data['pageTitle']    = "Add Company Profile";
      $data['SubmitValue']  = "Add";  
    }
    
    // Check if num rows is greater than 0
    $companyProfileNumRow = $this->Company_profile_mod->get_companyProfileNumRows();
    if($companyProfileNumRow > 0){      
      $getRecCompanyProfile             = $this->Company_profile_mod->get_companyProfile();      
      $data['updId']                    = $getRecCompanyProfile['0']['Id'];
      $data['action']                   = "companyProfileUpdate";
      $data['pageTitle']                = "Edit Company Profile";
      $data['SubmitValue']              = "Update";
      $data['companyProfileSingleData'] = $getRecCompanyProfile[0]; 
    }
    
		$this->load->view('layouts/appAdmin/index', $data);
	}
    
  public function companyProfileInsert()
  {
        //Array database table col name with value of form field for insert the form value into database
        $companyProfileInsertDataArray  = array(
          'companyProfile' => $this->input->post('companyProfile'),
          'Img' => $this->input->post('Img'),
          'Keywords' => $this->input->post('Keywords'),
          'metaDesc' => $this->input->post('metaDesc')
        );
        
        
        //setting the validation rule for form field -title.
        $this->form_validation->set_rules('companyProfile', 'Company Profile', 'required');  
        $this->form_validation->set_rules('Img', 'Imgage', 'min_length[0]');
        $this->form_validation->set_rules('Keywords', 'Keywords', 'min_length[0]');
        $this->form_validation->set_rules('metaDesc', 'Meta Description', 'min_length[0]');
      
        if ($this->form_validation->run() === FALSE)
        {
          $this->companyProfileFrm();
        }
        else
        {
        
          $this->Company_profile_mod->insert_companyProfile($companyProfileInsertDataArray); 
          
          redirect(base_url()."appAdmin/companyProfileFrm");
        }
     }

 
 public function companyProfileUpdate()
  {
        //Array database table col name with value of form field for insert the form value into database
        $updDataArray  = array(
        'companyProfile' => $this->input->post('companyProfile'),
        'Img' => $this->input->post('Img'),
        'Keywords' => $this->input->post('Keywords'),
        'metaDesc' => $this->input->post('metaDesc')
        );
        
        
        //setting the validation rule for form field -title.
        $this->form_validation->set_rules('companyProfile', 'Company Profile', 'required');
        
        
        if ($this->form_validation->run() === FALSE)
        {
          $this->companyProfileFrm();  
        }
        else
        {
        
          $this->Company_profile_mod->update_companyProfile($updDataArray); 
          redirect(base_url()."appAdmin/companyProfileList");
        }
     }

  public function companyProfileDelete(){
    $id = $this->input->post('Id');
    $this->Company_profile_mod->delete_companyProfile($id); 
    redirect(base_url()."appAdmin/companyProfileList");   
  }
  
  public function socialSiteList()
  {
    $data['loadLocations']['header'] = 1;
    $data['loadLocations']['sidebarLeft'] = 1;
    $data['loadLocations']['pageContents'] = 1;
  //  $data['loadLocations']['sidebarRight'] = 1;
    $data['loadLocations']['footer'] = 1;
    
    $data['header']['search'] = $this->config->item('widget_path_Admin')."search";
    $data['header']['myAccount'] = $this->config->item('widget_path_Admin')."myAccount";
    $data['sidebarLeft']['menuSidebar'] = $this->config->item('widget_path_Admin')."menuSidebar";
  //  $data['sidebarRight']['selectImg'] = $this->config->item('widget_path_Admin')."selectImg";
    
    $data['pageContents']['socialSiteList'] = $this->config->item('pageContents_path_Admin')."socialSiteList";
    
    $data['header']['title'] = "My Admin";
    $data['header']['myAccountDtl'] = $this->session->userdata('name');
    
    $data['socialSiteListData'] =$this->Social_site_mod->get_socialSite();
    
    $this->load->view('layouts/appAdmin/index', $data);
  }
  
  
  public function socialSiteFrm()
  {
    $data['loadLocations']['header'] = 1;
    $data['loadLocations']['sidebarLeft'] = 1;
    $data['loadLocations']['pageContents'] = 1;
    $data['loadLocations']['sidebarRight'] = 1;
    $data['loadLocations']['footer'] = 1;
    
    $data['header']['search'] = $this->config->item('widget_path_Admin')."search";
    $data['header']['myAccount'] = $this->config->item('widget_path_Admin')."myAccount";
    $data['sidebarLeft']['menuSidebar'] = $this->config->item('widget_path_Admin')."menuSidebar";
    $data['sidebarRight']['selectImg'] = $this->config->item('widget_path_Admin')."selectImg";    
    $data['sidebarRight']['selectImgTitle'] = 'Site Icon';    
    $data['mediaModalListData'] = $this->Media_mod->get_Media();
    
    $data['pageContents']['socialSiteFrm'] = $this->config->item('pageContents_path_Admin')."socialSiteFrm";
    
    $data['header']['title'] = "My Admin";
    $data['header']['myAccountDtl'] = $this->session->userdata('name');
    
    $updId = $this->input->post('Id');
    
    if($updId != ''){
      $data['updId']                  = $updId;
      $data['action']                 = "socialSiteUpdate";
      $data['pageTitle']              = "Edit Social Site";
      $data['SubmitValue']            = "Update";
      $getSingRecSocialSite           = $this->Social_site_mod->getSingle_socialSite($updId);
      $data['socialSiteSingleData']   = $getSingRecSocialSite[0]; 
    }
    else {
      $data['updId']        = '';
      $data['action']       = "socialSiteInsert";
      $data['pageTitle']    = "Add Social Site";
      $data['SubmitValue']  = "Add";  
    }
    
    $this->load->view('layouts/appAdmin/index', $data);
  }
  
  public function socialSiteInsert()
  {
        //Array database table col name with value of form field for insert the form value into database
        $socialSiteInsertDataArray  = array(
          'SiteName' => $this->input->post('SiteName'),
          'idPageLink' => $this->input->post('idPageLink'),
          'siteIcon' => $this->input->post('siteIcon'),
          'isVisible' => $this->input->post('isVisible')
        );
        
        
        //setting the validation rule for form field -title.
        $this->form_validation->set_rules('SiteName', 'Site Name', 'required');  
        $this->form_validation->set_rules('idPageLink', 'Your Id Page Link', 'required');
        $this->form_validation->set_rules('siteIcon', 'Site Icon ', 'required');
        $this->form_validation->set_rules('isVisible', 'Is Visible', 'min_length[]');
      
        if ($this->form_validation->run() === FALSE)
        {
          $this->socialSiteFrm();
        }
        else
        {
        
         $qu=  $this->Social_site_mod->insert_socialSite($socialSiteInsertDataArray); 
         redirect(base_url()."appAdmin/socialSiteFrm");
        }
     }

 
 public function socialSiteUpdate()
  {
        //Array database table col name with value of form field for insert the form value into database
        $updDataArray  = array(
        'SiteName' => $this->input->post('SiteName'),
        'idPageLink' => $this->input->post('idPageLink'),
        'siteIcon' => $this->input->post('siteIcon'),
        'isVisible' => $this->input->post('isVisible')
        );
        
        
        //setting the validation rule for form field -title.
        $this->form_validation->set_rules('SiteName', 'Site Name', 'required');  
        $this->form_validation->set_rules('idPageLink', 'Your Id Page Link', 'required');
        $this->form_validation->set_rules('siteIcon', 'Site Icon ', 'required');
      
      
        if ($this->form_validation->run() === FALSE)
        {
          $this->socialSiteFrm();  
        }
        else
        {
        
          $this->Social_site_mod->update_socialSite($updDataArray); 
          redirect(base_url()."appAdmin/socialSiteList");
        }
     }

  public function socialSiteDelete(){
    $id = $this->input->post('Id');
    $this->Social_site_mod->delete_socialSite($id); 
    redirect(base_url()."appAdmin/socialSiteList");   
  }
    
    public function socialSiteMultipleDelete() {
        $dat = $this->input->post('multipleDeleteSelect');
        for ($i = 0; $i < sizeof($dat); $i++) {
            print_r($dat[$i]);
            $this->Social_site_mod->multipleDelete_socialSite($dat[$i]);
        }
        redirect(base_url()."appAdmin/socialSiteList");   
     }
  
  
  
  
  public function categoryList()
  {
    $data['loadLocations']['header'] = 1;
    $data['loadLocations']['sidebarLeft'] = 1;
    $data['loadLocations']['pageContents'] = 1;
    //$data['loadLocations']['sidebarRight'] = 1;
    $data['loadLocations']['footer'] = 1;
    
    $data['header']['search'] = $this->config->item('widget_path_Admin')."search";
    $data['header']['myAccount'] = $this->config->item('widget_path_Admin')."myAccount";
    $data['sidebarLeft']['menuSidebar'] = $this->config->item('widget_path_Admin')."menuSidebar";
    //$data['sidebarRight']['selectImg'] = $this->config->item('widget_path_Admin')."selectImg";
    
    $data['pageContents']['categoryList'] = $this->config->item('pageContents_path_Admin')."categoryList";
    
    $data['header']['title'] = "My Admin";
    $data['header']['myAccountDtl'] = $this->session->userdata('name');
    
    $data['categoryListData'] =$this->Category_mod->get_category();
    
    $this->load->view('layouts/appAdmin/index', $data);
  }
  
  
  public function categoryFrm()
  {   
    $data['loadLocations']['header'] = 1;
    $data['loadLocations']['sidebarLeft'] = 1;
    $data['loadLocations']['pageContents'] = 1;
   // $data['loadLocations']['sidebarRight'] = 1;
    $data['loadLocations']['footer'] = 1;
    
    $data['header']['search'] = $this->config->item('widget_path_Admin')."search";
    $data['header']['myAccount'] = $this->config->item('widget_path_Admin')."myAccount";
    $data['sidebarLeft']['menuSidebar'] = $this->config->item('widget_path_Admin')."menuSidebar";
   // $data['sidebarRight']['selectImg'] = $this->config->item('widget_path_Admin')."selectImg";
    //$data['mediaModalListData'] = $this->Media_mod->get_Media();
    
    $data['pageContents']['categoryFrm'] = $this->config->item('pageContents_path_Admin')."categoryFrm";
    
    $data['header']['title'] = "My Admin";
    $data['header']['myAccountDtl'] = $this->session->userdata('name');
    
    $updId = $this->input->post('Id');
    
    if($updId != ''){
      $data['updId']                  = $updId;
      $data['action']                 = "categoryUpdate";
      $data['pageTitle']              = "Edit Category";
      $data['SubmitValue']            = "Update";
      $getSingRecCategory             = $this->Category_mod->getSingle_category($updId);
      $data['categorySingleData']     = $getSingRecCategory[0]; 
    }
    else {
      $data['updId']        = '';
      $data['action']       = "categoryInsert";
      $data['pageTitle']    = "Add Category";
      $data['SubmitValue']  = "Add";  
    }
    
    $data['categoryListData'] =$this->Category_mod->get_category();
    $this->load->view('layouts/appAdmin/index', $data);
  }
  
  public function categoryInsert()
  {
        //Array database table col name with value of form field for insert the form value into database
        $categoryInsertDataArray  = array(
          'catName' => $this->input->post('catName'),
          'catDetail' => $this->input->post('catDetail'),
          'parentCat' => $this->input->post('parentCat')
        );
        
        
        //setting the validation rule for form field -title.
        $this->form_validation->set_rules('catName', 'Category Name', 'required');  
        $this->form_validation->set_rules('catDetail', 'Category Detail', 'min_length[0]');
        if($this->session->userdata('role') == 1) {
          $this->form_validation->set_rules('parentCat', 'Parent Category', 'min_length[0]');
        }
        else {
        	$this->form_validation->set_rules('parentCat', 'Parent Category', 'required');
        }
        if ($this->form_validation->run() === FALSE)
        {
          $this->categoryFrm();
        }
        else
        {
        
          $this->Category_mod->insert_category($categoryInsertDataArray); 
          
          redirect(base_url()."appAdmin/categoryFrm");
        }
     }

 
 public function categoryUpdate()
  {
        //Array database table col name with value of form field for insert the form value into database
        $updDataArray  = array(
          'catName' => $this->input->post('catName'),
          'catDetail' => $this->input->post('catDetail'),
          'parentCat' => $this->input->post('parentCat')
        );
        
        
        //setting the validation rule for form field -title.
         $this->form_validation->set_rules('catName', 'Category Name', 'required');       
      
        if ($this->form_validation->run() === FALSE)
        {
          $this->categoryFrm();  
        }
        else
        {
        
          $this->Category_mod->update_category($updDataArray); 
          redirect(base_url()."appAdmin/categoryList");
        }
     }
  
  
  public function categoryDelete(){
    $id = $this->input->post('Id');
    $this->Category_mod->delete_category($id); 
    redirect(base_url()."appAdmin/categoryList");   
  }
    
    public function categoryMultipleDelete() {
        $dat = $this->input->post('multipleDeleteSelect');
        for ($i = 0; $i < sizeof($dat); $i++) {
            print_r($dat[$i]);
            $this->Category_mod->multipleDelete_category($dat[$i]);
        }
        redirect(base_url()."appAdmin/categoryList");   
     }
  
  

  
  
  public function productsList()
  {
    $data['loadLocations']['header'] = 1;
    $data['loadLocations']['sidebarLeft'] = 1;
    $data['loadLocations']['pageContents'] = 1;
    //$data['loadLocations']['sidebarRight'] = 1;
    $data['loadLocations']['footer'] = 1;
    
    $data['header']['search'] = $this->config->item('widget_path_Admin')."search";
    $data['header']['myAccount'] = $this->config->item('widget_path_Admin')."myAccount";
    $data['sidebarLeft']['menuSidebar'] = $this->config->item('widget_path_Admin')."menuSidebar";
    //$data['sidebarRight']['selectImg'] = $this->config->item('widget_path_Admin')."selectImg";
    
    $data['pageContents']['productsList'] = $this->config->item('pageContents_path_Admin')."productsList";
    
    $data['header']['title'] = "My Admin";
    $data['header']['myAccountDtl'] = $this->session->userdata('name');
    
    $wherePrdJoin = '';
    $data['productsListData'] =$this->Products_mod->get_ProductsJoin($wherePrdJoin);
    
    $appSettingLimit      = $this->Site_settings_mod->get_siteSettings();
    $appSettingTestLimit  =$appSettingLimit['0']['productsLimit'];
    $productsNumRow       = $this->Products_mod->get_ProductsNumRows();
    
    if($productsNumRow >= $appSettingTestLimit){
      $data['addBtn'] = 'Limit Exceeds So Remove Some Entries.';
    }  
    
    $this->load->view('layouts/appAdmin/index', $data);
  }
  
  
  public function productsFrm()
  {
    $data['loadLocations']['header'] = 1;
    $data['loadLocations']['sidebarLeft'] = 1;
    $data['loadLocations']['pageContents'] = 1;
    $data['loadLocations']['sidebarRight'] = 1;
    $data['loadLocations']['footer'] = 1;
    
    $data['header']['search'] = $this->config->item('widget_path_Admin')."search";
    $data['header']['myAccount'] = $this->config->item('widget_path_Admin')."myAccount";
    $data['sidebarLeft']['menuSidebar'] = $this->config->item('widget_path_Admin')."menuSidebar";
    $data['sidebarRight']['selectImg'] = $this->config->item('widget_path_Admin')."selectImg";
    $data['mediaModalListData'] = $this->Media_mod->get_Media();
    
    $data['pageContents']['productsFrm'] = $this->config->item('pageContents_path_Admin')."productsFrm";
    
    $data['header']['title'] = "My Admin";
    $data['header']['myAccountDtl'] = $this->session->userdata('name');
    
     $updId = $this->input->post('Id');
    
    if($updId != ''){
      $data['updId']                  = $updId;
      $data['action']                 = "productsUpdate";
      $data['pageTitle']              = "Edit Product";
      $data['SubmitValue']            = "Update";
      $getSingRecProduct              = $this->Products_mod->getSingle_Products($updId);
      $data['productSingleData']      = $getSingRecProduct[0]; 
    }
    else {
      $data['updId']        = '';
      $data['action']       = "productsInsert";
      $data['pageTitle']    = "Add Product";
      $data['SubmitValue']  = "Add";  
     
      $appSettingLimit      = $this->Site_settings_mod->get_siteSettings();
      $appSettingTestLimit  =$appSettingLimit['0']['productsLimit'];
      $productsNumRow       = $this->Products_mod->get_ProductsNumRows();
    
      if($productsNumRow >= $appSettingTestLimit){
        $data['addBtn'] = 'Limit Exceeds So Remove Some Entries.';
      }
    }
    
    $data['categoryListData'] =$this->Category_mod->get_category();
    
    
    
    $this->load->view('layouts/appAdmin/index', $data);
  }
  
  public function productsInsert()
  {
        $slug = url_title($this->input->post('name'), 'dash', TRUE);
        //Array database table col name with value of form field for insert the form value into database
        $ProductsInsertDataArray  = array(
          'name' => $this->input->post('name'),
          'imageFeatured' => $this->input->post('imageFeatured'),
          'description' => $this->input->post('description'),
          'isFetaure' => $this->input->post('isFetaure'),
          'inStock' => $this->input->post('inStock'),
          'supplyTAT' => $this->input->post('supplyTAT'),
          'minPrice' => $this->input->post('minPrice'),
          'maxPrice' => $this->input->post('maxPrice'),
          'MRP' => $this->input->post('MRP'),
          'discountPercentage' => $this->input->post('discountPercentage'),
          'updationDate' => $this->input->post('updationDate'),
          'Keywords' => $this->input->post('Keywords'),
          'metaDesc' => $this->input->post('metaDesc'),
          'categoryId' => $this->input->post('categoryId'),
          'slug' => $slug
        );
        
        
        //setting the validation rule for form field -title.
        $this->form_validation->set_rules('name', 'Product Name', 'required');  
        $this->form_validation->set_rules('imageFeatured', 'Product Feature Image', 'required');
        $this->form_validation->set_rules('description', 'Product Description', 'required');
        $this->form_validation->set_rules('isFetaure', 'Is Feature Product', 'min_length[]');
        $this->form_validation->set_rules('inStock', 'Is Stock Product', 'min_length[]');
        $this->form_validation->set_rules('supplyTAT', 'Supply TAT of Product', 'min_length[]');
        $this->form_validation->set_rules('minPrice', 'Minimum Price of Product', 'numeric');
        $this->form_validation->set_rules('maxPrice', 'Maxmium Price of Product', 'numeric');
        $this->form_validation->set_rules('MRP', 'MRP of Product', 'numeric');
        $this->form_validation->set_rules('discountPercentage', 'Discount in % of Product', 'numeric');
        $this->form_validation->set_rules('Keywords', 'Product Keyword', 'min_length[]');
        $this->form_validation->set_rules('metaDesc', 'Product Meta Description', 'min_length[]');
        $this->form_validation->set_rules('categoryId', 'Product Catagory', 'min_length[]');
      
        if ($this->form_validation->run() === FALSE)
        {
          $this->productsFrm();
        }
        else
        {
        
          $this->Products_mod->insert_Products($ProductsInsertDataArray); 
          
          redirect(base_url()."appAdmin/productsFrm");
        }
     }
  
  public function productsUpdate()
  {
        //Array database table col name with value of form field for insert the form value into database
        $updDataArray  = array(
          'name' => $this->input->post('name'),
          'imageFeatured' => $this->input->post('imageFeatured'),
          'description' => $this->input->post('description'),
          'isFetaure' => $this->input->post('isFetaure'),
          'inStock' => $this->input->post('inStock'),
          'supplyTAT' => $this->input->post('supplyTAT'),
          'minPrice' => $this->input->post('minPrice'),
          'maxPrice' => $this->input->post('maxPrice'),
          'MRP' => $this->input->post('MRP'),
          'discountPercentage' => $this->input->post('discountPercentage'),
          'updationDate' => $this->input->post('updationDate'),
          'Keywords' => $this->input->post('Keywords'),
          'metaDesc' => $this->input->post('metaDesc'),
          'categoryId' => $this->input->post('categoryId'),
          'slug' => $slug
        );
        
        
        //setting the validation rule for form field -title.
        $this->form_validation->set_rules('name', 'Product Name', 'required');  
        $this->form_validation->set_rules('imageFeatured', 'Product Feature Image', 'required');
        $this->form_validation->set_rules('description', 'Product Description', 'required');
        $this->form_validation->set_rules('minPrice', 'Minimum Price of Product', 'numeric');
        $this->form_validation->set_rules('maxPrice', 'Maxmium Price of Product', 'numeric');
        $this->form_validation->set_rules('MRP', 'MRP of Product', 'numeric');
        $this->form_validation->set_rules('discountPercentage', 'Discount in % of Product', 'numeric');
      
      
        if ($this->form_validation->run() === FALSE)
        {
          $this->productsFrm();  
        }
        else
        {
        
          $this->Products_mod->update_Products($updDataArray); 
          redirect(base_url()."appAdmin/productsList");
        }
     }  
  
  public function productsDelete()
  {
     $id = $this->input->post('Id');
     $this->Products_mod->delete_Products($id); 
     redirect(base_url()."appAdmin/productsList");       
  }
    
    public function productsMultipleDelete() {
        $dat = $this->input->post('multipleDeleteSelect');
        for ($i = 0; $i < sizeof($dat); $i++) {
            print_r($dat[$i]);
            $this->Products_mod->multipleDelete_Products($dat[$i]);
        }
        redirect(base_url()."appAdmin/productsList");   
     }
  
  public function popupMediaAdd($error = null)
  {
    //$data['loadLocations']['header'] = 1;
    //$data['loadLocations']['sidebarLeft'] = 1;
    $data['loadLocations']['pageContents'] = 1;
    //$data['loadLocations']['sidebarRight'] = 1;
    //$data['loadLocations']['footer'] = 1;
    
    //$data['header']['search'] = $this->config->item('widget_path_Admin')."search";
    //$data['header']['myAccount'] = $this->config->item('widget_path_Admin')."myAccount";
    //$data['sidebarLeft']['menuSidebar'] = $this->config->item('widget_path_Admin')."menuSidebar";
    //$data['sidebarRight']['selectImg'] = $this->config->item('widget_path_Admin')."selectImg";
    
    $data['pageContents']['popupMediaAdd'] = $this->config->item('pageContents_path_Admin')."popupMediaAdd";
    
    //$data['header']['title'] = "My Admin";
    //$data['header']['myAccountDtl'] = $this->session->userdata('name');
    
    $data['categoryListData'] =$this->Category_mod->get_category();  
    $this->load->view('layouts/appAdmin/index', $data);
  }
    
  public function popupMediaAddInsert()
  {       
        $config['upload_path']    = './images/blockImages';
        $config['allowed_types']  = 'gif|jpg|png';
        $config['max_size']       = '2000';
        $config['max_width']      = '1800';
        $config['max_height']     = '1200';
        $config['encrypt_name']   = TRUE;
        
        $this->load->library('upload', $config);
     
     if (!$this->upload->do_upload('imgName'))
    {
        //check for errors with the upload
                              
           $error = array('error' => $this->upload->display_errors());
          
          
         $this->load->view('layouts/appAdmin/index', $error);
         $this->popupMediaAdd($error);
          //var_dump($error); 
    }
    else
    {
        //upload the new image
        $upload_data = $this->upload->data();
        $image_name  = $upload_data['file_name'];
        
        //Array database table col name with value of form field for insert the form value into database
         
        $MediaInsertDataArray  = array(
          'Caption' => $this->input->post('Caption'),
          'imgName' => $image_name,//$this->input->post('ImgName'),
          'altText' => $this->input->post('altText'),
          'realetedCatagory' => $this->input->post('realetedCatagory')
        );  
        
        //setting the validation rule for form field -title.
        $this->form_validation->set_rules('Caption', 'Image Caption', 'required');  
        //$this->form_validation->set_rules('imgName', 'Imgage', 'required');
        $this->form_validation->set_rules('altText', 'Alt Text', 'required');
        $this->form_validation->set_rules('realetedCatagory', 'Related Catagory', 'min_length[]');
      
        if ($this->form_validation->run() === FALSE)
        { 
          $this->popupMediaAdd();
        }
        else
        {
          $ququ=$this->Media_mod->insert_Media($MediaInsertDataArray); 
        //  echo "<script> function SetImageValue () { self.close(); }</script>";
         redirect(base_url()."appAdmin/popupMediaAdd");
        }
     }
    
     }
/*
  public function mediaModalList()
  {
    $data['mediaModalListData'] = $this->Media_mod->get_Media();
    var_dump($mediaModalListData);
    $this->load->view($this->config->item('widget_path_Admin')."selectImg", $data);  
  }

*/
	public function mediaList()
	{
		$data['loadLocations']['header'] = 1;
		$data['loadLocations']['sidebarLeft'] = 1;
		$data['loadLocations']['pageContents'] = 1;
		//$data['loadLocations']['sidebarRight'] = 1;
		$data['loadLocations']['footer'] = 1;
		
		$data['header']['search'] = $this->config->item('widget_path_Admin')."search";
		$data['header']['myAccount'] = $this->config->item('widget_path_Admin')."myAccount";
		$data['sidebarLeft']['menuSidebar'] = $this->config->item('widget_path_Admin')."menuSidebar";
		//$data['sidebarRight']['selectImg'] = $this->config->item('widget_path_Admin')."selectImg";
		
		$data['pageContents']['mediaList'] = $this->config->item('pageContents_path_Admin')."mediaList";
		
		$data['header']['title'] = "My Admin";
    $data['header']['myAccountDtl'] = $this->session->userdata('name');
    
    $data['mediaListData'] = $this->Media_mod->get_Media();
		
		$appSettingLimit      = $this->Site_settings_mod->get_siteSettings();
    $appSettingTestLimit  =$appSettingLimit['0']['mediaLimit'];
    $mediaNumRow       = $this->Media_mod->get_MediaNumRows();
    
    if($mediaNumRow >= $appSettingTestLimit){
      $data['addBtn'] = 'Limit Exceeds So Remove Some Entries.';
    }
    
		$this->load->view('layouts/appAdmin/index', $data);
	}
	
	
	public function mediaFrm($error = null)
	{
		$data['loadLocations']['header'] = 1;
		$data['loadLocations']['sidebarLeft'] = 1;
		$data['loadLocations']['pageContents'] = 1;
		//$data['loadLocations']['sidebarRight'] = 1;
		$data['loadLocations']['footer'] = 1;
		
		$data['header']['search'] = $this->config->item('widget_path_Admin')."search";
		$data['header']['myAccount'] = $this->config->item('widget_path_Admin')."myAccount";
		$data['sidebarLeft']['menuSidebar'] = $this->config->item('widget_path_Admin')."menuSidebar";
		//$data['sidebarRight']['selectImg'] = $this->config->item('widget_path_Admin')."selectImg";
		
		$data['pageContents']['mediaFrm'] = $this->config->item('pageContents_path_Admin')."mediaFrm";
		
		$data['header']['title'] = "My Admin";
    $data['header']['myAccountDtl'] = $this->session->userdata('name');
		
    $updId = $this->input->post('Id');
    
    if($updId != ''){
      $data['updId']                  = $updId;
      $data['action']                 = "mediaUpdate";
      $data['pageTitle']              = "Edit Media";
      $data['SubmitValue']            = "Update";
      
      $getSingRecMedia                = $this->Media_mod->getSingle_Media($updId);
      $data['mediaSingleData']        = $getSingRecMedia[0]; 
    }
    else {
      $data['updId']        = '';
      $data['action']       = "mediaInsert";
      $data['pageTitle']    = "Add Media";
      $data['SubmitValue']  = "Add";  
      $appSettingLimit      = $this->Site_settings_mod->get_siteSettings();
      $appSettingTestLimit  =$appSettingLimit['0']['mediaLimit'];
      $mediaNumRow       = $this->Media_mod->get_MediaNumRows();
    
      if($mediaNumRow >= $appSettingTestLimit){
        $data['addBtn'] = 'Limit Exceeds So Remove Some Entries.';
      }    
    }
   // $data['error']          =  array('error' => ' ' ); 
    
    $data['categoryListData'] =$this->Category_mod->get_category();
    
        
 		$this->load->view('layouts/appAdmin/index', $data);
	}
    
  public function mediaInsert()
  {       
        $config['upload_path']    = './images/blockImages';
        $config['allowed_types']  = 'gif|jpg|png';
        $config['max_size']       = '2000';
        $config['max_width']      = '1800';
        $config['max_height']     = '1200';
        $config['encrypt_name']   = TRUE;
        
        $this->load->library('upload', $config);
     
     if (!$this->upload->do_upload('imgName'))
        {
            //check for errors with the upload
                              
           $error = array('error' => $this->upload->display_errors());
          
          
           $this->load->view('layouts/appAdmin/index', $error);
         
           $this->mediaFrm($error);
          //var_dump($error); 
        }
    else
        {
            //upload the new image
            $upload_data = $this->upload->data();
            $image_name  = $upload_data['file_name'];
            
            //Array database table col name with value of form field for insert the form value into database
             
            $MediaInsertDataArray  = array(
              'Caption' => $this->input->post('Caption'),
              'imgName' => $image_name,//$this->input->post('ImgName'),
              'altText' => $this->input->post('altText'),
              'realetedCatagory' => $this->input->post('realetedCatagory')
            );      
            
            //setting the validation rule for form field -title.
            $this->form_validation->set_rules('Caption', 'Image Caption', 'required');  
            //$this->form_validation->set_rules('imgName', 'Imgage', 'required');
            $this->form_validation->set_rules('altText', 'Alt Text', 'required');
            $this->form_validation->set_rules('realetedCatagory', 'Related Catagory', 'min_length[]');
          
            if ($this->form_validation->run() === FALSE)
            { 
              $this->mediaFrm();
            }
            else
            {
              $this->Media_mod->insert_Media($MediaInsertDataArray); 
              redirect(base_url()."appAdmin/mediaFrm");
            }
         }    
     }

 
 public function mediaUpdate()
  {
        
        // Image Updation
        if($_FILES['imgName']['name'] != ''){
          // Code for Unlink the image
          $updId  = $this->input->post('Id');
          $updDelImgData  = $this->Media_mod->getSingle_Media($updId);
          if($updDelImgData['0']['imgName'] != ''){
            $updDelImgPath = './images/blockImages/'.$updDelImgData['0']['imgName'];
            unlink($updDelImgPath);
          }
          $config['upload_path']    = './images/blockImages';
          $config['allowed_types']  = 'gif|jpg|png';
          $config['max_size']       = '2000';
          $config['max_width']      = '1800';
          $config['max_height']     = '1200';
          $config['encrypt_name']   = TRUE;
          
          $this->load->library('upload', $config);
     
           if (!$this->upload->do_upload('imgName'))
          {
              //check for errors with the upload
                                    
                           $error = array('error' => $this->upload->display_errors());
                          
                          var_dump($error); 
          }
          else
          {
            //upload the new image
            $upload_data = $this->upload->data();
            $image_name  = $upload_data['file_name'];
            
            $updDataArray  = array(
              'Caption' => $this->input->post('Caption'),
              'imgName' => $image_name,
              'altText' => $this->input->post('altText'),
              'realetedCatagory' => $this->input->post('realetedCatagory')
            ); 
          }
         }
        else {
           $updDataArray  = array(
            'Caption' => $this->input->post('Caption'),
            'altText' => $this->input->post('altText'),
            'realetedCatagory' => $this->input->post('realetedCatagory')
          );
        }
        //Array database table col name with value of form field for insert the form value into database
   
              
        //setting the validation rule for form field -title.
        $this->form_validation->set_rules('Caption', 'Image Caption', 'required');  
       // $this->form_validation->set_rules('imgName', 'Imgage', 'required');
        $this->form_validation->set_rules('altText', 'Alt Text', 'required');
        
        
        if ($this->form_validation->run() === FALSE)
        {
          $this->mediaFrm();  
        }
        else
        {
        
          $this->Media_mod->update_Media($updDataArray); 
          redirect(base_url()."appAdmin/mediaList");
        }
     }

      public function mediaDelete(){
        $id = $this->input->post('Id');
        $this->Media_mod->delete_Media($id); 
        redirect(base_url()."appAdmin/mediaList");   
      }
    
      public function mediaMultipleDelete() {
          $dat = $this->input->post('multipleDeleteSelect');
          for ($i = 0; $i < sizeof($dat); $i++) {
              print_r($dat[$i]);
              $this->Media_mod->multipleDelete_Media($dat[$i]);
          }
          redirect(base_url()."appAdmin/mediaList");   
       }
  
	
	public function testimonialList()
	{
		$data['loadLocations']['header'] = 1;
		$data['loadLocations']['sidebarLeft'] = 1;
		$data['loadLocations']['pageContents'] = 1;
		//$data['loadLocations']['sidebarRight'] = 1;
		$data['loadLocations']['footer'] = 1;
		
		$data['header']['search'] = $this->config->item('widget_path_Admin')."search";
		$data['header']['myAccount'] = $this->config->item('widget_path_Admin')."myAccount";
		$data['sidebarLeft']['menuSidebar'] = $this->config->item('widget_path_Admin')."menuSidebar";
		//$data['sidebarRight']['selectImg'] = $this->config->item('widget_path_Admin')."selectImg";
		
		$data['pageContents']['testimonialList'] = $this->config->item('pageContents_path_Admin')."testimonialList";
    
		$data['header']['title'] = "My Admin";
    $data['header']['myAccountDtl'] = $this->session->userdata('name');
    
    $data['testimonialListData'] =$this->Testimonial_mod->get_testimonial();
		
    $appSettingLimit      = $this->Site_settings_mod->get_siteSettings();
    $appSettingTestLimit  =$appSettingLimit['0']['newsLimit'];
		$testimonialNumRow  = $this->Testimonial_mod->get_testimonialNumRows();
    
    if($testimonialNumRow == $appSettingTestLimit){
      $data['addBtn'] = 'Limit Exceeds So Remove Some Entries.';
    }  
		$this->load->view('layouts/appAdmin/index', $data);
	}
	
	
	public function testimonialFrm()
	{		
		$data['loadLocations']['header'] = 1;
		$data['loadLocations']['sidebarLeft'] = 1;
		$data['loadLocations']['pageContents'] = 1;
		$data['loadLocations']['sidebarRight'] = 1;
		$data['loadLocations']['footer'] = 1;
		
		$data['header']['search'] = $this->config->item('widget_path_Admin')."search";
		$data['header']['myAccount'] = $this->config->item('widget_path_Admin')."myAccount";
		$data['sidebarLeft']['menuSidebar'] = $this->config->item('widget_path_Admin')."menuSidebar";
		$data['sidebarRight']['selectImg'] = $this->config->item('widget_path_Admin')."selectImg";
    $data['mediaModalListData'] = $this->Media_mod->get_Media();
		
		$data['pageContents']['testimonialFrm'] = $this->config->item('pageContents_path_Admin')."testimonialFrm";
		
		$data['header']['title'] = "My Admin";
    $data['header']['myAccountDtl'] = $this->session->userdata('name');
		
    $updId = $this->input->post('Id');
    
    if($updId != ''){
      $data['updId']                  = $updId;
      $data['action']                 = "testimonialUpdate";
      $data['pageTitle']              = "Edit Teastimonial";
      $data['SubmitValue']            = "Update";
      $getSingRecTestimonial          = $this->Testimonial_mod->getSingle_testimonial($updId);
      $data['testimonialSingleData']  = $getSingRecTestimonial[0]; 
    }
    else {
      $data['updId']        = '';
      $data['action']       = "testimonialInsert";
      $data['pageTitle']    = "Add Testimonial";
      $data['SubmitValue']  = "Add";  
    }
    
		$this->load->view('layouts/appAdmin/index', $data);
	}
	
	public function testimonialInsert()
  {
        //Array database table col name with value of form field for insert the form value into database
        $testimonialInsertDataArray  = array(
          'title' => $this->input->post('title'),
          'imageName' => $this->input->post('imageName'),
          'description' => $this->input->post('description')
        );
        
        
        //setting the validation rule for form field -title.
        $this->form_validation->set_rules('title', 'Testimonial Title', 'required');  
        $this->form_validation->set_rules('imageName', 'Image Name', 'min_length[0]');
        $this->form_validation->set_rules('description', 'Testimonial Description', 'required');
      
        if ($this->form_validation->run() === FALSE)
        {
          $this->testimonialFrm();
        }
        else
        {
        
          $this->Testimonial_mod->insert_testimonial($testimonialInsertDataArray); 
          
          redirect(base_url()."appAdmin/testimonialFrm");
        }
     }

 
 public function testimonialUpdate()
  {
        //Array database table col name with value of form field for insert the form value into database
        $updDataArray  = array(
        'title' => $this->input->post('title'),
        'imageName' => $this->input->post('imageName'),
        'description' => $this->input->post('description'),
        'date' => date('d-m-y h:m:s', mktime(date("h")+18,date("m")+10))
        );
        
        
        //setting the validation rule for form field -title.
        $this->form_validation->set_rules('title', 'Testimonial Title', 'required'); 
        $this->form_validation->set_rules('description', 'Testimonial Description', 'required');
      
      
        if ($this->form_validation->run() === FALSE)
        {
          $this->testimonialFrm();  
        }
        else
        {
        
          $this->Testimonial_mod->update_testimonial($updDataArray); 
          redirect(base_url()."appAdmin/testimonialList");
        }
     }
  
  
    public function testimonialDelete(){
      $id = $this->input->post('Id');
      $this->Testimonial_mod->delete_testimonial($id); 
      redirect(base_url()."appAdmin/testimonialList");   
    }
    
    public function testimonialMultipleDelete() {
        $dat = $this->input->post('multipleDeleteSelect');
        for ($i = 0; $i < sizeof($dat); $i++) {
            print_r($dat[$i]);
            $this->Testimonial_mod->multipleDelete_testimonial($dat[$i]);
        }
        redirect(base_url()."appAdmin/testimonialList");   
     }

	public function newsList()
	{
		$data['loadLocations']['header'] = 1;
		$data['loadLocations']['sidebarLeft'] = 1;
		$data['loadLocations']['pageContents'] = 1;
		//$data['loadLocations']['sidebarRight'] = 1;
		$data['loadLocations']['footer'] = 1;
		
		$data['header']['search'] = $this->config->item('widget_path_Admin')."search";
		$data['header']['myAccount'] = $this->config->item('widget_path_Admin')."myAccount";
		$data['sidebarLeft']['menuSidebar'] = $this->config->item('widget_path_Admin')."menuSidebar";
		//$data['sidebarRight']['selectImg'] = $this->config->item('widget_path_Admin')."selectImg";
		
		$data['pageContents']['testimonialList'] = $this->config->item('pageContents_path_Admin')."newsList";
    
		$data['header']['title'] = "My Admin";
	    $data['header']['myAccountDtl'] = $this->session->userdata('name');
	    
	    $data['newsListData'] = $this->News_mod->get_news();
			
	    $appSettingLimit      = $this->Site_settings_mod->get_siteSettings();
	    $appSettingTestLimit  = $appSettingLimit['0']['newsLimit'];
		$newsNumRow    		  = $this->News_mod->get_newsNumRows();
	    
	    if($newsNumRow == $appSettingTestLimit){
	      $data['addBtn'] = 'Limit Exceeds So Remove Some Entries.';
	    }  
			$this->load->view('layouts/appAdmin/index', $data);
	}
	
	
	public function newsFrm()
	{		
		$data['loadLocations']['header'] = 1;
		$data['loadLocations']['sidebarLeft'] = 1;
		$data['loadLocations']['pageContents'] = 1;
		$data['loadLocations']['sidebarRight'] = 1;
		$data['loadLocations']['footer'] = 1;
		
		$data['header']['search'] = $this->config->item('widget_path_Admin')."search";
		$data['header']['myAccount'] = $this->config->item('widget_path_Admin')."myAccount";
		$data['sidebarLeft']['menuSidebar'] = $this->config->item('widget_path_Admin')."menuSidebar";
		$data['sidebarRight']['selectImg'] = $this->config->item('widget_path_Admin')."selectImg";
   		$data['mediaModalListData'] = $this->Media_mod->get_Media();
		
		$data['pageContents']['testimonialFrm'] = $this->config->item('pageContents_path_Admin')."newsFrm";
		
		$data['header']['title'] = "My Admin";
    	$data['header']['myAccountDtl'] = $this->session->userdata('name');
		
    	$updId = $this->input->post('Id');
    
	    if($updId != ''){
	      $data['updId']                  = $updId;
	      $data['action']                 = "newsUpdate";
	      $data['pageTitle']              = "Edit News";
	      $data['SubmitValue']            = "Update";
	      $getSingRecTestimonial          = $this->News_mod->getSingle_news($updId);
	      $data['testimonialSingleData']  = $getSingRecTestimonial[0]; 
	    }
	    else {
	      $data['updId']        = '';
	      $data['action']       = "newsInsert";
	      $data['pageTitle']    = "Add News";
	      $data['SubmitValue']  = "Add";  
	    }
    
		$this->load->view('layouts/appAdmin/index', $data);
	}
	
	public function newsInsert()
  {
        //Array database table col name with value of form field for insert the form value into database
        $newsInsertDataArray  = array(
          'title' => $this->input->post('title'),
          'imageName' => $this->input->post('imageName'),
          'description' => $this->input->post('description')
        );
        
        
        //setting the validation rule for form field -title.
        $this->form_validation->set_rules('title', 'News Title', 'required');  
        $this->form_validation->set_rules('imageName', 'Image Name', 'min_length[0]');
        $this->form_validation->set_rules('description', 'News Description', 'required');
      
        if ($this->form_validation->run() === FALSE)
        {
          $this->newsFrm();
        }
        else
        {
        
          $this->News_mod->insert_news($newsInsertDataArray); 
          
          redirect(base_url()."appAdmin/newsFrm");
        }
     }

 
 public function newsUpdate()
  {
        //Array database table col name with value of form field for insert the form value into database
        $updDataArray  = array(
        'title' => $this->input->post('title'),
        'imageName' => $this->input->post('imageName'),
        'description' => $this->input->post('description'),
        'date' => date('d-m-y h:m:s', mktime(date("h")+18,date("m")+10))
        );
        
        
        //setting the validation rule for form field -title.
        $this->form_validation->set_rules('title', 'News Title', 'required');  
        $this->form_validation->set_rules('description', 'News Description', 'required');
      
      
        if ($this->form_validation->run() === FALSE)
        {
          $this->newsFrm();  
        }
        else
        {
        
          $this->News_mod->update_news($updDataArray); 
          redirect(base_url()."appAdmin/newsList");
        }
     }
  
  
    public function newsDelete(){
      $id = $this->input->post('Id');
      $this->News_mod->delete_news($id); 
      redirect(base_url()."appAdmin/newsList");   
    }
    
    public function newsMultipleDelete() {
        $dat = $this->input->post('multipleDeleteSelect');
        for ($i = 0; $i < sizeof($dat); $i++) {
            print_r($dat[$i]);
            $this->News_mod->multipleDelete_news($dat[$i]);
        }
        redirect(base_url()."appAdmin/newsList");   
     }
    
  
  public function contactUsList()
  {
    $data['loadLocations']['header'] = 1;
    $data['loadLocations']['sidebarLeft'] = 1;
    $data['loadLocations']['pageContents'] = 1;
    //$data['loadLocations']['sidebarRight'] = 1;
    $data['loadLocations']['footer'] = 1;
    
    $data['header']['search'] = $this->config->item('widget_path_Admin')."search";
    $data['header']['myAccount'] = $this->config->item('widget_path_Admin')."myAccount";
    $data['sidebarLeft']['menuSidebar'] = $this->config->item('widget_path_Admin')."menuSidebar";
    //$data['sidebarRight']['selectImg'] = $this->config->item('widget_path_Admin')."selectImg";
    
    $data['pageContents']['contactUsList'] = $this->config->item('pageContents_path_Admin')."contactUsList";
    
    $data['header']['title'] = "My Admin";
    $data['header']['myAccountDtl'] = $this->session->userdata('name');
    
    $data['contactUsListData'] = $this->Contact_us_mod->get_contactUs();
    
    $this->load->view('layouts/appAdmin/index', $data);
  }
  
  public function contactUsFrm()
  {
    $data['loadLocations']['header'] = 1;
    $data['loadLocations']['sidebarLeft'] = 1;
    $data['loadLocations']['pageContents'] = 1;
    //$data['loadLocations']['sidebarRight'] = 1;
    $data['loadLocations']['footer'] = 1;
    
    $data['header']['search'] = $this->config->item('widget_path_Admin')."search";
    $data['header']['myAccount'] = $this->config->item('widget_path_Admin')."myAccount";
    $data['sidebarLeft']['menuSidebar'] = $this->config->item('widget_path_Admin')."menuSidebar";
    //$data['sidebarRight']['selectImg'] = $this->config->item('widget_path_Admin')."selectOfficeType";
    $data['mediaModalListData'] = $this->Media_mod->get_Media();
    
    $data['pageContents']['contactUsFrm'] = $this->config->item('pageContents_path_Admin')."contactUsFrm";
    
    $data['header']['title'] = "My Admin";
    $data['header']['myAccountDtl'] = $this->session->userdata('name');
    $updId = $this->input->post('Id');
    
    if($updId != ''){
      $data['updId']                  = $updId;
      $data['action']                 = "contactUsUpdate";
      $data['pageTitle']              = "Edit Contact Us";
      $data['SubmitValue']            = "Update";
      
      $getSingRecContactUs            = $this->Contact_us_mod->getSingle_contactUs($updId);
      $data['contactUsSingleData']    = $getSingRecContactUs[0]; 
    }
    else {
      $data['updId']        = '';
      $data['action']       = "contactUsInsert";
      $data['pageTitle']    = "Add Contact Us";
      $data['SubmitValue']  = "Add";  
    }
    
    $this->load->view('layouts/appAdmin/index', $data);
  }
    
  public function contactUsInsert()
  {
        //Array database table col name with value of form field for insert the form value into database
        $contactUsInsertDataArray  = array(
          'ptcTitle' => $this->input->post('ptcTitle'),
          'ptcName' => $this->input->post('ptcName'),
          'ptcImg' => $this->input->post('ptcImg'),
          'STD' => $this->input->post('STD'),
          'phNumber' => $this->input->post('phNumber'),
          'faxNumber' => $this->input->post('faxNumber'),
          'mobileNumber' => $this->input->post('mobileNumber'),
          'contLocation' => $this->input->post('contLocation'),
          'contArea' => $this->input->post('contArea'),
          'contCity' => $this->input->post('contCity'),
          'contState' => $this->input->post('contState'),
          'contCountry' => $this->input->post('contCountry'),
          'contPincode' => $this->input->post('contPincode'),
          'contEmail' => $this->input->post('contEmail'),
          'officeImg' => $this->input->post('officeImg'),
          'officeTypeId' => $this->input->post('officeTypeId'),
          'tMetaDesc' => $this->input->post('tMetaDesc'),
          'gMapLatitute' => $this->input->post('gMapLatitute'),
          'gMapLangitute' => $this->input->post('gMapLangitute')
        );
        
        
        //setting the validation rule for form field -title.
        $this->form_validation->set_rules('ptcTitle', 'PTC Title', 'required');  
        $this->form_validation->set_rules('ptcName', 'PTC Name', 'required');
        $this->form_validation->set_rules('ptcImg', 'PTC Image', 'min_length[0]');
        $this->form_validation->set_rules('STD', 'STD Code', 'min_length[0]');
        $this->form_validation->set_rules('phNumber', 'Phone No', 'min_length[0]');
        $this->form_validation->set_rules('faxNumber', 'Fax No', 'min_length[0]');
        $this->form_validation->set_rules('mobileNumber', 'Mobile No', 'exact_length[11]');
        $this->form_validation->set_rules('contLocation', 'Location', 'min_length[0]');
        $this->form_validation->set_rules('contArea', 'Area', 'required');
        $this->form_validation->set_rules('contCity', 'City', 'required');
        $this->form_validation->set_rules('contState', 'State', 'required');
        $this->form_validation->set_rules('contCountry', 'Country', 'required');
        $this->form_validation->set_rules('contPincode', 'Pincode', 'required|numeric');
        $this->form_validation->set_rules('contEmail', 'Email ID', 'min_length[0]|valid_email');
        $this->form_validation->set_rules('officeImg', 'Other Image', 'min_length[0]');
        $this->form_validation->set_rules('officeTypeId', 'Office Type', 'min_length[0]');
        $this->form_validation->set_rules('tMetaDesc', 'Meta Description', 'min_length[0]');
        $this->form_validation->set_rules('gMapLatitute', 'Google Map Lantitute', 'decimal');
        $this->form_validation->set_rules('gMapLangitute', 'Google Map Langitute', 'decimal');
      
        if ($this->form_validation->run() === FALSE)
        {
          $this->contactUsFrm();
        }
        else
        {
        
          $this->Contact_us_mod->insert_contactUs($contactUsInsertDataArray); 
          
          redirect(base_url()."appAdmin/contactUsFrm");
        }
     }

 
 public function contactUsUpdate()
  {
        //Array database table col name with value of form field for insert the form value into database
        $updDataArray  = array(
          'ptcTitle' => $this->input->post('ptcTitle'),
          'ptcName' => $this->input->post('ptcName'),
          'ptcImg' => $this->input->post('ptcImg'),
          'STD' => $this->input->post('STD'),
          'phNumber' => $this->input->post('phNumber'),
          'faxNumber' => $this->input->post('faxNumber'),
          'mobileNumber' => $this->input->post('mobileNumber'),
          'contLocation' => $this->input->post('contLocation'),
          'contArea' => $this->input->post('contArea'),
          'contCity' => $this->input->post('contCity'),
          'contState' => $this->input->post('contState'),
          'contCountry' => $this->input->post('contCountry'),
          'contPincode' => $this->input->post('contPincode'),
          'contEmail' => $this->input->post('contEmail'),
          'officeImg' => $this->input->post('officeImg'),
          'officeTypeId' => $this->input->post('officeTypeId'),
          'tMetaDesc' => $this->input->post('tMetaDesc'),
          'gMapLatitute' => $this->input->post('gMapLatitute'),
          'gMapLangitute' => $this->input->post('gMapLangitute')
        );
        
        
        //setting the validation rule for form field -title.
        $this->form_validation->set_rules('ptcTitle', 'PTC Title', 'required');  
        $this->form_validation->set_rules('ptcName', 'PTC Name', 'required');
        $this->form_validation->set_rules('ptcImg', 'PTC Image', 'min_length[0]');
        $this->form_validation->set_rules('STD', 'STD Code', 'min_length[0]');
        $this->form_validation->set_rules('phNumber', 'Phone No', 'min_length[0]');
        $this->form_validation->set_rules('faxNumber', 'Fax No', 'min_length[0]');
        $this->form_validation->set_rules('mobileNumber', 'Mobile No', 'exact_length[11]|numeric');
        $this->form_validation->set_rules('contLocation', 'Location', 'min_length[0]');
        $this->form_validation->set_rules('contArea', 'Area', 'required');
        $this->form_validation->set_rules('contCity', 'City', 'required');
        $this->form_validation->set_rules('contState', 'State', 'required');
        $this->form_validation->set_rules('contCountry', 'Country', 'required');
        $this->form_validation->set_rules('contPincode', 'Pincode', 'required|numeric');
        $this->form_validation->set_rules('contEmail', 'Email ID', 'min_length[0]|valid_email');
        $this->form_validation->set_rules('officeImg', 'Other Image', 'min_length[0]');
        $this->form_validation->set_rules('officeTypeId', 'Office Type', 'min_length[0]');
        $this->form_validation->set_rules('tMetaDesc', 'Meta Description', 'min_length[0]');
        $this->form_validation->set_rules('gMapLatitute', 'Google Map Lantitute', 'decimal');
        $this->form_validation->set_rules('gMapLangitute', 'Google Map Langitute', 'decimal');
        
        
        if ($this->form_validation->run() === FALSE)
        {
          $this->contactUsFrm();  
        }
        else
        {
        
          $this->Contact_us_mod->update_contactUs($updDataArray); 
          redirect(base_url()."appAdmin/contactUsList");
        }
     }

  public function contactUsDelete()
  {
    $id = $this->input->post('Id');
    $this->Contact_us_mod->delete_contactUs($id); 
    redirect(base_url()."appAdmin/contactUsList");    
  }
  
  public function contactUsMultipleDelete() {
      $dat = $this->input->post('multipleDeleteSelect');
      for ($i = 0; $i < sizeof($dat); $i++) {
          print_r($dat[$i]);
          $this->Contact_us_mod->multipleDelete_contactUs($dat[$i]);
      }
      redirect(base_url()."appAdmin/contactUsList");   
   }

  public function sendEnquiriesList()
  {
    $data['loadLocations']['header'] = 1;
    $data['loadLocations']['sidebarLeft'] = 1;
    $data['loadLocations']['pageContents'] = 1;
    //$data['loadLocations']['sidebarRight'] = 1;
    $data['loadLocations']['footer'] = 1;
    
    $data['header']['search'] = $this->config->item('widget_path_Admin')."search";
    $data['header']['myAccount'] = $this->config->item('widget_path_Admin')."myAccount";
    $data['sidebarLeft']['menuSidebar'] = $this->config->item('widget_path_Admin')."menuSidebar";
    //$data['sidebarRight']['selectImg'] = $this->config->item('widget_path_Admin')."selectImg";
    
    $data['pageContents']['sendEnquiriesList'] = $this->config->item('pageContents_path_Admin')."sendEnquiriesList";
    
    $data['header']['title'] = "My Admin";
    $data['header']['myAccountDtl'] = $this->session->userdata('name');
    
    $defaultOption  = '';
    $readOption     = '';
    $trashOption    = '';
    
   $defaultOption  = $this->input->post('default');
   $readOption     = $this->input->post('read');
   $trashOption    = $this->input->post('trash');
   $allEntOption   = $this->input->post('allEntries');
  
    if(($defaultOption == '') && ($readOption == '') && ($trashOption == '')){
      $where  = 'where readStatus = "Unread"';
    }
    
    if(($defaultOption != '')  || ($readOption != '')  || ($trashOption != '')){
      $where  = 'where readStatus = "'. $defaultOption. '" or readStatus = "'.$readOption. '" or readStatus = "'.$trashOption. '"';
    }
    
    if($allEntOption != ''){
      $where  = '';
    }
    
    $data['sendEnquiriesListData'] =$this->Send_enquiries_mod->get_sendEnquiriesByOption($where);
    
    $this->load->view('layouts/appAdmin/index', $data);
  }
  
  
  public function sendEnquiriesView()
  {
      $updDataArray  = array(
        'readStatus' => 'Read'
        );        
       
      $this->Send_enquiries_mod->update_sendEnquiries($updDataArray);  
      
      $data['loadLocations']['header'] = 1;
      $data['loadLocations']['sidebarLeft'] = 1;
      $data['loadLocations']['pageContents'] = 1;
      //$data['loadLocations']['sidebarRight'] = 1;
      $data['loadLocations']['footer'] = 1;
      
      $data['header']['search'] = $this->config->item('widget_path_Admin')."search";
      $data['header']['myAccount'] = $this->config->item('widget_path_Admin')."myAccount";
      $data['sidebarLeft']['menuSidebar'] = $this->config->item('widget_path_Admin')."menuSidebar";
      //$data['sidebarRight']['selectImg'] = $this->config->item('widget_path_Admin')."selectImg";
      
      $data['pageContents']['sendEnquiryView'] = $this->config->item('pageContents_path_Admin')."sendEnquiryView";
      
      $data['header']['title'] = "My Admin";
      $data['header']['myAccountDtl'] = $this->session->userdata('name');
      
      $Id                              = $this->input->post('Id');
      $getSingRecSendEnquiry           = $this->Send_enquiries_mod->getSingle_sendEnquiries($Id);
      $data['sendEnquirySingleData']   = $getSingRecSendEnquiry[0];
             
      $this->load->view('layouts/appAdmin/index', $data);      
  }
  
  public function sendEnquiriesDelete()
  {
     $id = $this->input->post('Id');
     $this->Send_enquiries_mod->delete_sendEnquiries($id); 
     redirect(base_url()."appAdmin/sendEnquiriesList");      
  }
  
  public function sendEnquiriesTrash()
  {
    $updDataArray  = array(
        'readStatus' => 'Trash'
        );        
       
      $this->Send_enquiries_mod->update_sendEnquiries($updDataArray);
     redirect(base_url()."appAdmin/sendEnquiriesList");    
  }
  
  public function sendEnquiriesMultipleDelete() {
      $dat = $this->input->post('multipleDeleteSelect');
      for ($i = 0; $i < sizeof($dat); $i++) {
          print_r($dat[$i]);
          $this->Send_enquiries_mod->multipleDelete_sendEnquiries($dat[$i]);
      }
      redirect(base_url()."appAdmin/sendEnquiriesList");   
   }

    
  public function usersList()
  {   
    $data['loadLocations']['header'] = 1;
    $data['loadLocations']['sidebarLeft'] = 1;
    $data['loadLocations']['pageContents'] = 1;
    //$data['loadLocations']['sidebarRight'] = 1;
    $data['loadLocations']['footer'] = 1;
    
    $data['header']['search'] = $this->config->item('widget_path_Admin')."search";
    $data['header']['myAccount'] = $this->config->item('widget_path_Admin')."myAccount";
    $data['sidebarLeft']['menuSidebar'] = $this->config->item('widget_path_Admin')."menuSidebar";
    //$data['sidebarRight']['selectImg'] = $this->config->item('widget_path_Admin')."selectImg";
    
    $data['pageContents']['usersList'] = $this->config->item('pageContents_path_Admin')."usersList";
    
    $data['header']['title'] = "My Admin";
    $data['header']['myAccountDtl'] = $this->session->userdata('name');
    
  if($this->session->userdata('role') == 1)
  {   
  $where=' where role >0';
  }
  
  if($this->session->userdata('role') == 2)
  {   
  $where='  where role >2';
  
  }
  
  if($this->session->userdata('role') == 3)  
  {   
  $where='  where role >3';
  }
  
  if($this->session->userdata('role') == 4)  
  {   
  $where=' where role >4';
  }

    $data['usersListData'] =$this->Users_mod->get_UserAllData($where);
    
    $this->load->view('layouts/appAdmin/index', $data);
  }
 
	
	
	public function usersFrm()
	{		
		$data['loadLocations']['header'] = 1;
		$data['loadLocations']['sidebarLeft'] = 1;
		$data['loadLocations']['pageContents'] = 1;
		//$data['loadLocations']['sidebarRight'] = 1;
		$data['loadLocations']['footer'] = 1;
		
		$data['header']['search'] = $this->config->item('widget_path_Admin')."search";
		$data['header']['myAccount'] = $this->config->item('widget_path_Admin')."myAccount";
		$data['sidebarLeft']['menuSidebar'] = $this->config->item('widget_path_Admin')."menuSidebar";
		//$data['sidebarRight']['selectImg'] = $this->config->item('widget_path_Admin')."selectImg";
		
		$data['pageContents']['usersFrm'] = $this->config->item('pageContents_path_Admin')."usersFrm";
		
		$data['header']['title'] = "My Admin";
    $data['header']['myAccountDtl'] = $this->session->userdata('name');
		
    $updId = $this->input->post('Id');
    
    if($updId != ''){
      $data['updId']                  = $updId;
      $data['action']                 = "usersUpdate";
      $data['pageTitle']              = "Edit Users";
      $data['SubmitValue']            = "Update";
      $getSingRecUsers                = $this->Users_mod->getSingle_users($updId);
      $data['usersSingleData']        = $getSingRecUsers[0]; 
    }
    else {
      $data['updId']                  = '';
      $data['action']                 = "usersInsert";
      $data['pageTitle']              = "Add Users";
      $data['SubmitValue']            = "Add";  
    }
    
		$this->load->view('layouts/appAdmin/index', $data);
	}
  
  public function usersInsert()
  {
        //Array database table col name with value of form field for insert the form value into database
        $usersInsertDataArray  = array(
          'empCode' => $this->input->post('empCode'),
          'role' => $this->input->post('role'),
          'userEmail' => $this->input->post('userEmail'),
          'name' => $this->input->post('name'),
          'password' => $this->input->post('password'),
          'reportingLocation' => $this->input->post('reportingLocation'),
          'isActive' => $this->input->post('isActive')
        );
        
        
        //setting the validation rule for form field -title.
        $this->form_validation->set_rules('empCode', 'Employee Code', 'required|is_unique[users.empCode]');  
        $this->form_validation->set_rules('role', 'Employee Role', 'required'); 
        $this->form_validation->set_rules('userEmail', 'User Email', 'required|is_unique[users.userEmail]|valid_email'); 
        $this->form_validation->set_rules('name', 'User name', 'required'); 
        $this->form_validation->set_rules('password', 'Password', 'required'); 
        $this->form_validation->set_rules('reportingLocation', 'Reporting Location', 'min_length[0]');
        $this->form_validation->set_rules('isActive', 'Is Active', 'min_length[0]');
      
        if ($this->form_validation->run() === FALSE)
        {
          $this->usersFrm();
        }
        else
        {
        
          $this->Users_mod->insert_users($usersInsertDataArray); 
          
          redirect(base_url()."appAdmin/usersFrm");
        }
     }

 
 public function usersUpdate()
  {
        //Array database table col name with value of form field for insert the form value into database
        $updDataArray  = array(
          'empCode' => $this->input->post('empCode'),
          'role' => $this->input->post('role'),
          'userEmail' => $this->input->post('userEmail'),
          'name' => $this->input->post('name'),
          'password' => $this->input->post('password'),
          'reportingLocation' => $this->input->post('reportingLocation'),
          'isActive' => $this->input->post('isActive')
        );
        
        
        //setting the validation rule for form field -title.
        $this->form_validation->set_rules('empCode', 'Employee Code', 'required');  
        $this->form_validation->set_rules('role', 'Employee Role', 'required'); 
        $this->form_validation->set_rules('userEmail', 'User Email', 'required|valid_email'); 
        $this->form_validation->set_rules('name', 'User name', 'required'); 
        $this->form_validation->set_rules('password', 'Password', 'required'); 
        $this->form_validation->set_rules('reportingLocation', 'Reporting Location', 'min_length[0]');
        $this->form_validation->set_rules('isActive', 'Is Active', 'min_length[0]');
      
      
        if ($this->form_validation->run() === FALSE)
        {
          $this->usersFrm();  
        }
        else
        {
        
          $this->Users_mod->update_users($updDataArray); 
          redirect(base_url()."appAdmin/usersList");
        }
     }

  
  public function usersDelete()
  {
    $id = $this->input->post('Id');
    $this->Users_mod->delete_users($id); 
    redirect(base_url()."appAdmin/usersList");    
  }
  
  public function usersMultipleDelete() {
      $dat = $this->input->post('multipleDeleteSelect');
      for ($i = 0; $i < sizeof($dat); $i++) {
          print_r($dat[$i]);
          $this->Users_mod->multipleDelete_users($dat[$i]);
      }
      redirect(base_url()."appAdmin/usersList");   
   }
  
	
	public function InvoiceList()
	{
		$data['loadLocations']['header'] = 1;
		$data['loadLocations']['sidebarLeft'] = 1;
		$data['loadLocations']['pageContents'] = 1;
		//$data['loadLocations']['sidebarRight'] = 1;
		$data['loadLocations']['footer'] = 1;
		
		$data['header']['search'] = $this->config->item('widget_path_Admin')."search";
		$data['header']['myAccount'] = $this->config->item('widget_path_Admin')."myAccount";
		$data['sidebarLeft']['menuSidebar'] = $this->config->item('widget_path_Admin')."menuSidebar";
		//$data['sidebarRight']['selectImg'] = $this->config->item('widget_path_Admin')."selectImg";
		
		$data['pageContents']['InvoiceList'] = $this->config->item('pageContents_path_Admin')."InvoiceList";
    
		$data['header']['title'] = "My Admin";
    	$data['header']['myAccountDtl'] = $this->session->userdata('name');
    
   		$data['invoiceListData'] =$this->Invoice_mod->get_invoice();
		
		$this->load->view('layouts/appAdmin/index', $data);
	}
	
	
	public function invoiceFrm()
	{		
		$data['loadLocations']['header'] 		= 1;
		$data['loadLocations']['sidebarLeft'] 	= 1;
		$data['loadLocations']['pageContents'] 	= 1;
		//$data['loadLocations']['sidebarRight'] 	= 1;
		$data['loadLocations']['footer'] 		= 1;
		
		$data['header']['search'] 				= $this->config->item('widget_path_Admin')."search";
		$data['header']['myAccount'] 			= $this->config->item('widget_path_Admin')."myAccount";
		$data['sidebarLeft']['menuSidebar'] 	= $this->config->item('widget_path_Admin')."menuSidebar";
		//$data['sidebarRight']['selectImg'] 		= $this->config->item('widget_path_Admin')."selectImg";
    	//$data['mediaModalListData'] 			= $this->Media_mod->get_Media();
		
		$data['pageContents']['invoiceFrm'] 	= $this->config->item('pageContents_path_Admin')."invoiceFrm";
		
		$data['header']['title'] 				= "My Admin";
    	$data['header']['myAccountDtl'] 		= $this->session->userdata('name');
		
	    $updId = $this->input->post('Id');
	    
	    if($updId != ''){
	      $data['updId']                  = $updId;
	      $data['action']                 = "invoiceUpdate";
	      $data['pageTitle']              = "Edit Invoice";
	      $data['SubmitValue']            = "Update";
	      $getSingRecinvoice          	  = $this->Invoice_mod->getSingle_invoice($updId);
	      $data['invoiceSingleData']  	  = $getSingRecinvoice[0]; 
	    }
	    else {
	      $data['updId']        		  = '';
	      $data['action']       		  = "invoiceInsert";
	      $data['pageTitle']    		  = "Add Invoice";
	      $data['SubmitValue']  		  = "Add";  
	    }
    
		$this->load->view('layouts/appAdmin/index', $data);
	}
	
	public function invoiceInsert()
  {
        //Array database table col name with value of form field for insert the form value into database
        $invoiceInsertDataArray  = array(
          'companyName' => $this->input->post('companyName'),
          'ptcName' => $this->input->post('ptcName'),
          'productName' => $this->input->post('productName'),
          'productCode' => $this->input->post('productCode'),
          'priceTaken' => $this->input->post('priceTaken'),
          'paymentMode' => $this->input->post('paymentMode'),
          'chqNumber' => $this->input->post('chqNumber'),
          'chqAmount' => $this->input->post('chqAmount'),
          'chqDate' => $this->input->post('chqDate'),
          'bankName' => $this->input->post('bankName')
        );
        
        
        //setting the validation rule for form field -title.
        $this->form_validation->set_rules('companyName', 'Company Name', 'required');  
        $this->form_validation->set_rules('ptcName', 'PTC Name', 'required'); 
        $this->form_validation->set_rules('productName', 'Product Name', 'required'); 
        $this->form_validation->set_rules('productCode', 'Product Code', 'required'); 
        $this->form_validation->set_rules('priceTaken', 'Price Taken', 'required'); 
        $this->form_validation->set_rules('paymentMode', 'Payment Mode', 'required'); 
        $this->form_validation->set_rules('chqNumber', 'Chq Number', 'min_length[0]|numeric'); 
        $this->form_validation->set_rules('chqAmount', 'Chq Amount', 'min_length[0]'); 
        $this->form_validation->set_rules('chqDate', 'Chq Date', 'min_length[0]'); 
        $this->form_validation->set_rules('bankName', 'Bank Name', 'required');
      
        if ($this->form_validation->run() === FALSE)
        {
          $this->invoiceFrm();
        }
        else
        {
        
          $this->Invoice_mod->insert_invoice($invoiceInsertDataArray); 
          
          redirect(base_url()."appAdmin/invoiceFrm");
        }
     }

 
 public function invoiceUpdate()
  {
        //Array database table col name with value of form field for insert the form value into database
        $updDataArray  = array(
          'companyName' => $this->input->post('companyName'),
          'ptcName' => $this->input->post('ptcName'),
          'productName' => $this->input->post('productName'),
          'productCode' => $this->input->post('productCode'),
          'priceTaken' => $this->input->post('priceTaken'),
          'paymentMode' => $this->input->post('paymentMode'),
          'chqNumber' => $this->input->post('chqNumber'),
          'chqAmount' => $this->input->post('chqAmount'),
          'chqDate' => $this->input->post('chqDate'),
          'bankName' => $this->input->post('bankName')
        );
        
        
        //setting the validation rule for form field -title.
        $this->form_validation->set_rules('companyName', 'Company Name', 'required');  
        $this->form_validation->set_rules('ptcName', 'PTC Name', 'required'); 
        $this->form_validation->set_rules('productName', 'Product Name', 'required'); 
        $this->form_validation->set_rules('productCode', 'Product Code', 'required'); 
        $this->form_validation->set_rules('priceTaken', 'Price Taken', 'required'); 
        $this->form_validation->set_rules('paymentMode', 'Payment Mode', 'required'); 
        $this->form_validation->set_rules('chqNumber', 'Chq Number', 'min_length[0]|numeric'); 
        $this->form_validation->set_rules('chqAmount', 'Chq Amount', 'min_length[0]'); 
        $this->form_validation->set_rules('chqDate', 'Chq Date', 'min_length[0]'); 
        $this->form_validation->set_rules('bankName', 'Bank Name', 'min_length[0]');
      
      
      
        if ($this->form_validation->run() === FALSE)
        {
          $this->invoiceFrm();  
        }
        else
        {
        
          $this->Invoice_mod->update_invoice($updDataArray); 
          redirect(base_url()."appAdmin/InvoiceList");
        }
     }
  
  
    public function invoiceDelete(){
      $id = $this->input->post('Id');
      $this->Invoice_mod->delete_invoice($id); 
      redirect(base_url()."appAdmin/invoiceList");   
    }
    
    public function invoiceMultipleDelete() {
        $dat = $this->input->post('multipleDeleteSelect');
        for ($i = 0; $i < sizeof($dat); $i++) {
            //print_r($dat[$i]);
            $this->Invoice_mod->multipleDelete_invoice($dat[$i]);
        }
        	redirect(base_url()."appAdmin/invoiceList");   
     }
	public function useBarcode()
	{
    	$this->load->library('barcode'); // Load library 		
	}
    
  public function printPDF()
  {/* FPDF Class
    // Generate PDF by saying hello to the world
    $this->load->library('pdf'); // Load library  
	//define('FPDF_FONTPATH',$this->config->item('fonts_path'));
   	//$this->pdf->fontpath = 'font/'; // Specify font folder
  	define('FPDF_FONTPATH',$this->config->item('fonts_path'));
	$this->pdf->AliasNbPages();
	$this->pdf->AddPage();
	$this->pdf->SetFont('Times','',12);
	for($i=1;$i<=40;$i++)
	    $this->pdf->Cell(0,10,'Printing line number '.$i,0,1);
	  //  $this->pdf->Cell(0,10,$this->useBarcode(),0,1);
	$this->pdf->Output();
	  
		//$this->load->view('layouts/appAdmin/pageContents/printPDF');
   * */
   
   
   
   // TCPDF Class   
    $this->load->library('tcpdf'); // Load library
    $this->load->library('mypdf'); // Load library
   // $this->load->library('eng'); // Load library
    // create new PDF document
//$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
 
// set document information
$this->mypdf->SetCreator(PDF_CREATOR);
$this->mypdf->SetAuthor('Nicola Asuni');
$this->mypdf->SetTitle('TCPDF Example 001');
$this->mypdf->SetSubject('TCPDF Tutorial');
$this->mypdf->SetKeywords('TCPDF, PDF, example, test, guide');
 
// set default header data
$this->mypdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
 
// set header and footer fonts
$this->mypdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$this->mypdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
 
// set default monospaced font
$this->mypdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
 
//set margins
$this->mypdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$this->mypdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$this->mypdf->SetFooterMargin(PDF_MARGIN_FOOTER);
 
//set auto page breaks
$this->mypdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
 
//set image scale factor
$this->mypdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
 
//set some language-dependent strings
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

 
// ---------------------------------------------------------
 
// set default font subsetting mode
$this->mypdf->setFontSubsetting(true);
 
// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$this->mypdf->SetFont('dejavusans', '', 14, '', true);
 
// Add a page
// This method has several options, check the source code documentation for more information.
$this->mypdf->AddPage();
 //  
// Set some content to print
/*
$html = <<<EOD
<h1>Welcome to <a href="http://www.tcpdf.org" style="text-decoration:none;background-color:#CC0000;color:black;">&nbsp;<span style="color:black;">TC</span><span style="color:white;">PDF</span>&nbsp;</a>!</h1>
<i>This is the first example of TCPDF library.</i>
<p>This text is printed using the <i>writeHTMLCell()</i> method but you can also use: <i>Multicell(), writeHTML(), Write(), Cell() and Text()</i>.</p>
<p>Please check the source code documentation and other examples for further information.</p>
<p style="color:#CC0000;">TO IMPROVE AND EXPAND TCPDF I NEED YOUR SUPPORT, PLEASE <a href="http://sourceforge.net/donate/index.php?group_id=128076">MAKE A DONATION!</a></p>
<img src="http://localhost/assets/app/images/aside.png" />
EOD;
 * */
 
 //for fetching the data in PDF 
	    $updId							= $this->input->post('Id');
	    $getSingRecinvoice          	= $this->Invoice_mod->getSingle_invoice($updId);
	    $invoiceSingleData			  	= $getSingRecinvoice[0]; 
	    //var_dump($invoiceSingleData); exit;
	    
	    
$invoiceId		= $invoiceSingleData['Id'];
$ptcName		= $invoiceSingleData['ptcName'];
$productCode	= $invoiceSingleData['productCode'];
$productName	= $invoiceSingleData['productName'];
$priceTaken		= $invoiceSingleData['priceTaken'];
$chqNumber		= $invoiceSingleData['chqNumber'];
$chqAmount		= $invoiceSingleData['chqAmount'];
$chqDate		= $invoiceSingleData['chqDate'];
$bankName		= $invoiceSingleData['bankName'];

		
$border_style = array('all' => array('width' => 2, 'cap' => 'square', 'join' => 'miter', 'dash' => 0, 'phase' => 0));
$html = <<<EOF
<style>
.sealContainer{
}
.CompanySeal{
	width: 50px;
	height: 50px;
	
}
</style>
<div><b>Product Code : </b> <span>$productCode; </span> </div>
<div><b>Product Name : </b> <span>$productName; </span> </div>
<div><b>Price : </b> <span>$priceTaken; </span> </div>
<div><b> Chq No  &nbsp; &nbsp; &nbsp; &nbsp;</b>
	<b> Chq Amount &nbsp;&nbsp;&nbsp;&nbsp; </b>
	<b> Chq Date  &nbsp;&nbsp;&nbsp;&nbsp; </b>
	<b> Bank Name </b> </div>
<div><span> $chqNumber; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span> 
	<span> $chqAmount; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; </span> 
	<span> $chqDate; &nbsp; &nbsp; </span> 
	<span> $bankName; </span> 
</div> <br /> <br />
	<table border="1">
		<tr height="20">
			<td align="left" style="height:20px;">
				<img src="http://localhost/assets/app/images/logo.png" height="30" width="45" />.................... 
			</td>
			<td align="left" style="height:20px;">$ptcName .....................  </td> 
		</tr>
	</table>
EOF;
 
		
// Print text using writeHTMLCell()
$this->mypdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=1, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);

$this->mypdf->setXY(155,0);
		$this->mypdf->write1DBarcode($invoiceId, 'S25', '', '7', 90, 5, 0.4, '', 'N');
// ---------------------------------------------------------
 
// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$this->mypdf->Output('example.pdf', 'I');
        
   
  }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */