<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
        $this->load->helper('html');
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->library('email');
        $this->load->library('pagination');
        
        $this->load->model('ApplicationModel');
		$this->load->library('grocery_CRUD');
    }


    public function index() {
        $data = $this->ApplicationModel->getAppConfig();

        $data['recentlyUsedVouchers'] = $this->ApplicationModel->getMostRecentUsedVouchers();
        $data['recentlyUnusedVouchers'] = $this->ApplicationModel->getMostRecentUnusedVouchers();
        
        $data['totalRecipients'] = $this->ApplicationModel->getRecipientCount();
        $data['totalOffers'] = $this->ApplicationModel->getOfferCount();
        $data['totalVouchers'] = $this->ApplicationModel->getVoucherCount();
        $data['totalServiceKeys'] = $this->ApplicationModel->getServiceKeyCount();
        
        $data['copyright'] = $this->ApplicationModel->copyright();
        $data['pageTitle'] = "Dashboard";
        $data['appName'] = ucfirst($this->config->item('application_project_name'));
        $data['meta'] = $this->ApplicationModel->getDefaultMetaTags();

        $this->load->view("headers/header", $data);
        $this->load->view("navs/side_bar_nav", $data);
        $this->load->view("navs/top_bar_nav", $data);
        $this->load->view("welcome_views/dashboard_message", $data);
        $this->load->view("footers/footer", $data);
    }
    
    public function manageRecipients(){
		$data = $this->ApplicationModel->getAppConfig();
        $data['meta'] = $this->ApplicationModel->getDefaultMetaTags();
        $data['copyright'] = $this->ApplicationModel->copyright();
        $data['pageTitle'] = "Manage Recipient";
        $data['appName'] = ucfirst($this->config->item('application_project_name'));
        $data['meta'] = $this->ApplicationModel->getDefaultMetaTags();
		
		$crud = new grocery_CRUD(); // GROCERY CRUD LIB 
		//$crud->set_model('Custom_query_model');
		$crud->set_table('fosa_voucher_recipient');
		//$crud->basic_model->set_query_str("SELECT * FROM fosa_voucher WHERE status = 'USED'"); //Query text here

		$crud->columns('id','status','full_name','email');
		$crud->display_as('full_name','full name');
		$crud->set_subject('Voucher Recipient');
		$crud->required_fields('status','full_name','email');
		$crud->unset_delete(); // disabled delete function
		$output = $crud->render();
		$data['css_files'] = $output->css_files;
        $data['js_files'] = $output->js_files;
		
		$this->load->view("headers/header_crud", $data);
		$this->load->view("navs/side_bar_nav", $data);
        $this->load->view("navs/top_bar_nav", $data);
        $this->load->view("welcome_views/manage_recipients_message", $output);
        $this->load->view("footers/footer_crud", $data);
	}
	
	public function manageServiceKey(){
		$data = $this->ApplicationModel->getAppConfig();
        $data['meta'] = $this->ApplicationModel->getDefaultMetaTags();
        $data['copyright'] = $this->ApplicationModel->copyright();
        $data['pageTitle'] = "Service Key";
        $data['appName'] = ucfirst($this->config->item('application_project_name'));
        $data['meta'] = $this->ApplicationModel->getDefaultMetaTags();
		
		$crud = new grocery_CRUD(); // GROCERY CRUD LIB 

		$crud->set_table('fosa_voucher_service_key');
		$crud->columns('status','name','email','key');
		$crud->display_as('full_name','full name');
		$crud->set_subject('Service Keys');
		$crud->required_fields('status','name','email','key');
		$crud->unset_delete(); // disabled delete function
		$crud->unset_edit(); // disabled edit function
		$output = $crud->render();
		$data['css_files'] = $output->css_files;
        $data['js_files'] = $output->js_files;
		
		$this->load->view("headers/header_crud", $data);
		$this->load->view("navs/side_bar_nav", $data);
        $this->load->view("navs/top_bar_nav", $data);
        $this->load->view("welcome_views/manage_service_message", $output);
        $this->load->view("footers/footer_crud", $data);
	}
	
	public function manageOffers(){
		$data = $this->ApplicationModel->getAppConfig();
        $data['meta'] = $this->ApplicationModel->getDefaultMetaTags();
        $data['copyright'] = $this->ApplicationModel->copyright();
        $data['pageTitle'] = "Manage Special Offers";
        $data['appName'] = ucfirst($this->config->item('application_project_name'));
        $data['meta'] = $this->ApplicationModel->getDefaultMetaTags();
		
		$crud = new grocery_CRUD(); // GROCERY CRUD LIB 

		$crud->set_table('fosa_voucher_offers');
		$crud->columns('id','offer_name','discount_without_percentage_sign','expiring_date');
		$crud->set_subject('Special Offers');
		$crud->required_fields('offer_name','discount_without_percentage_sign','expiring_date');
		$crud->display_as('offer_name','Offer name');
		$crud->display_as('discount_without_percentage_sign','Discount without per sign');
		$crud->unset_delete(); // disabled delete function
		$output = $crud->render();
		$data['css_files'] = $output->css_files;
        $data['js_files'] = $output->js_files;
		
		$this->load->view("headers/header_crud", $data);
		$this->load->view("navs/side_bar_nav", $data);
        $this->load->view("navs/top_bar_nav", $data);
        $this->load->view("welcome_views/manage_offers_message", $output);
        $this->load->view("footers/footer_crud", $data);
	}
	
	public function manageVoucher(){
		$data = $this->ApplicationModel->getAppConfig();
        $data['meta'] = $this->ApplicationModel->getDefaultMetaTags();
        $data['copyright'] = $this->ApplicationModel->copyright();
        $data['pageTitle'] = "Manage Voucher";
        $data['appName'] = ucfirst($this->config->item('application_project_name'));
        $data['meta'] = $this->ApplicationModel->getDefaultMetaTags();
		
		$crud = new grocery_CRUD(); // GROCERY CRUD LIB 

		$crud->set_table('fosa_voucher');
		$crud->columns('status','offer','recipient','voucher','time_used');
		$crud->set_subject('Voucher');
		$crud->required_fields('status','offer','recipient');
		$crud->display_as('offer','Offer name');
		$crud->display_as('recipient','Recipient email');
		
        //The name of the field that we have the relation in the basic table 
        //The relation table 
        //The 'title' field that we want to use to recognize the relation 
        $crud->set_relation('offer', 'fosa_voucher_offers', 'offer_name');
        $crud->set_relation('recipient', 'fosa_voucher_recipient', 'email');

		$crud->unset_edit(); // disabled edit function
		$crud->unset_delete(); // disabled delete function
		$crud->unset_add(); // disabled insert function
		
		$output = $crud->render();
		$data['css_files'] = $output->css_files;
        $data['js_files'] = $output->js_files;
		
		$this->load->view("headers/header_crud", $data);
		$this->load->view("navs/side_bar_nav", $data);
        $this->load->view("navs/top_bar_nav", $data);
        $this->load->view("welcome_views/manage_voucher_message", $output);
        $this->load->view("footers/footer_crud", $data);
	}
    
	public function help() {
        $data = $this->ApplicationModel->getAppConfig();

        //$data['notification'] = $this->ApplicationModel->getNotification($data['user']->id);

        $data['copyright'] = $this->ApplicationModel->copyright();
        $data['pageTitle'] = "Help";
        $data['appName'] = ucfirst($this->config->item('application_project_name'));
        $data['meta'] = $this->ApplicationModel->getDefaultMetaTags();
        $data['copyright'] = $this->ApplicationModel->copyright();
        $data['pageTitle'] = "Help";
        $data['appName'] = ucfirst($this->config->item('application_project_name'));
        $data['meta'] = $this->ApplicationModel->getDefaultMetaTags();

        $this->load->view("headers/header", $data);
		$this->load->view("navs/side_bar_nav", $data);
        $this->load->view("navs/top_bar_nav", $data);
        $this->load->view("welcome_views/help_message", $data);
        $this->load->view("footers/footer", $data);
    }
    
}
