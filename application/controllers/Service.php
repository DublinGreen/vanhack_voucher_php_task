<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {

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
    }

	public function createVoucher($serviceKey,$recipientID,$offerID,$offerDiscount){
		$serviceKeyResultSet = $this->ApplicationModel->checkServiceKey($serviceKey);
		if(!empty($serviceKeyResultSet)){
			//using offerDiscount to extra security
			$voucherCode = $this->ApplicationModel->createVoucherCode($recipientID,$offerID,$offerDiscount);
			echo($voucherCode);//voucher created	
		}
	}
	
	public function checkVoucher($serviceKey,$voucherCode){
		$serviceKeyResultSet = $this->ApplicationModel->checkServiceKey($serviceKey);
		if(!empty($serviceKeyResultSet)){
			$voucherResultSet = $this->ApplicationModel->checkVoucher($voucherCode);
			if(!empty($voucherResultSet)){
				print_r($voucherResultSet);
			}else{
				echo("invalid voucher");
			}
			return $voucherResultSet;
		}	
	}
	
	public function useVoucher($serviceKey,$voucherCode,$recipientID,$offerID){
		$serviceKeyResultSet = $this->ApplicationModel->checkServiceKey($serviceKey);
		if(!empty($serviceKeyResultSet)){
			$i = $this->ApplicationModel->useVoucher($voucherCode,$recipientID,$offerID);
			if($i){
				echo("VOUCHER HAS SUCCESSFULLY USED");
			}else{
				echo("UNABLE TO USE VOUCHER");
			}
		}
	}
	
	public function createServiceKey($phrase){
		$key = md5($phrase);
		echo($key);
		return $key;
	}
	
    public function index() {
		echo("INVALID METHOD CALL");
    }
    
    public function invalidServiceKey($serviceKey){
		echo("INVALID SERVICE KEY : " . $serviceKey);
	}
    
}
