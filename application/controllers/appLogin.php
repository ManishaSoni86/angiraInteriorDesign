<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class appLogin extends CI_Controller {
	
	public function __construct(){
		
		parent::__construct();
    	$this->load->model('Users_mod');//load the --XYZ-- from models created for news
		$this->load->helper('url'); //to access the base url from routesuserLoggedinData
		$this->load->library('session');
        $this->load->database();
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
	public function login()
	{
		$data['loadLocations']['pageContents'] = 1;
		
		$data['header']['title'] = "My Admin";
    
    $data['msg'] = "";
    if (isset($_GET['msg'])) {
      switch ($_GET['msg']) {
          case '1':
              $data['msg'] = "Error in login. Wrong Email ID/Passsword.";
              break;
          case '2':
              $data['msg'] = "New password sent successfuly to your email ID.";
              break;
          case '3':
              $data['msg'] = "Please login before to access this page.";
              break;
          default:
              $data['msg'] = "";
              break;
      }
    }
    				
		$data['pageContents']['login'] = "layouts/appAdmin/pageContents/login";
		//var_dump($data['pageContents']['login']);exit;
		$this->load->view('layouts/appAdmin/index', $data );
	}
	
	// User Table Insert event 
	 public function doLogin()
    {
    	$userEmail	=	'';
    	$passowrd	=	'';
    	if(isset($_POST['userEmail']))	$userEmail 	= $_POST['userEmail']; 
    	if(isset($_POST['password']))	$passowrd 	= $_POST['password'];
		
        $checkUser = $this->Users_mod->getUserLogin($userEmail, $passowrd);
        //var_dump($checkUser);exit;
        
  		if(count($checkUser) == 1){
  			$userLoggedinData = $checkUser['0'];
  			$this->session->set_userdata($userLoggedinData);
        $this->session->set_userdata('is_logged_in', TRUE);
  			
  			//var_dump($this->session->userdata('is_logged_in'));exit;
  			
  			redirect(base_url().'appAdmin/index', 'refresh');
  		}
      else{
    		redirect(base_url().'appLogin/login?msg=1');
    	}                    
    }
    
	 public function forgotPassword()
    {
       
    $data['loadLocations']['pageContents'] = 1;
    
    $data['header']['title'] = "My Admin";
               
    $data['pageContents']['login'] = "layouts/appAdmin/pageContents/passwordRecovery";
    $this->load->view('layouts/appAdmin/index', $data );
    }
  
   public function sendPasswordEmail()
    {
      $userEmail  = '';
      if(isset($_POST['yourEmail']))  $userEmail  = $_POST['yourEmail'];
      
      $newPass      = rand(1, 10000);
      $newPassArray = array('password' => $newPass);
      $this->Users_mod->updatePassword($userEmail, $newPassArray);
      
      $this->load->library('email');
      $config['protocol'] = 'sendmail';
        $config['mailpath'] = '/usr/sbin/sendmail';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['mailtype'] = 'html';

        $this->email->initialize($config);
        /*
       $config = Array(
  'protocol' => 'smtp',
  'smtp_host' => 'ssl://smtp.googlemail.com',
  'smtp_port' => 465,
  'smtp_user' => 'xxx@gmail.com', // change it to yours
  'smtp_pass' => 'xxx', // change it to yours
  'mailtype' => 'html',
  'charset' => 'iso-8859-1',
  'wordwrap' => TRUE
); 
         * */

      $this->email->from('awebdeveloper@in.com', 'A Web Developer');
      $this->email->to($userEmail); 
      //$this->email->cc('another@another-example.com'); 
      //$this->email->bcc('them@their-example.com'); 
        
      $this->email->subject('Your Admin Account passsword changed');
      $this->email->message('Your Admin Account for the website of --- password is changed <br /> new Password is-'.$newPass);  
        
      $this->email->send();
        
      echo $this->email->print_debugger();
      
      //redirect(base_url().'appLogin/login?msg=2', 'refresh');
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */