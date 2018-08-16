<?php

class ApplicationModel extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->database();
        $this->load->helper('html');
        $this->load->helper('url');
        $this->load->library('email');
    }

	public function getOffer($offerID){
		$resultSet = "";
		$today = time();
		                
        $query = $this->db->get_where('fosa_voucher_offers', array('id' => $offerID));
        if ($query->num_rows() > 0) {
			$tempResultSet = $query->row();
			$expiringDate = strtotime($tempResultSet->expiring_date);
			
			if($expiringDate <= $today){				
				// offer has expired
				$resultSet = "";	
			}else{
				//offer still valid
				$resultSet = $query->row();
			}
        }

        return $resultSet;
	}
	
	public function useVoucher($voucherCode,$recipientID,$offerID){
		$returnValue = false;
		                
        $query = $this->db->get_where('fosa_voucher', array('voucher' => $voucherCode,'status' => 'UNUSED','recipient' => $recipientID, 'offer' => $offerID));
        if ($query->num_rows() > 0) {
			$resultSet = $query->row();
			
			$currentTime = time();
			$databaseTimeStamp = strftime("%Y-%m-%d %H:%M:%S",$currentTime);
			$updateData = array(
               'status' => 'USED',
               'time_used' => $databaseTimeStamp
            );
			$this->db->where('voucher', $voucherCode);
			$this->db->update('fosa_voucher', $updateData); 
			$returnValue = true;
        }

        return $returnValue; // return voucher resultSet
	}
	
	public function checkServiceKey($key){
		$resultSet = "";
		                
        $query = $this->db->get_where('fosa_voucher_service_key', array('key' => $key,'status' => 'ACTIVE'));
        if ($query->num_rows() > 0) {
			$resultSet = $query->row();
        }else{
			// with 301 redirect
			redirect("service/invalidServiceKey/{$key}", 'location', 301);
		}

        return $resultSet;
	}
	
	public function getRecipientCount(){
		$returnVal;
		                
        $query = $this->db->get('fosa_voucher_recipient');
        $str = $this->db->last_query();
		$returnVal = $query->num_rows();

        return $returnVal;
	}
	
	public function getOfferCount(){
		$returnVal;
		                
        $query = $this->db->get('fosa_voucher_offers');
        $str = $this->db->last_query();
		$returnVal = $query->num_rows();

        return $returnVal;
	}
	
	public function getVoucherCount(){
		$returnVal;
		                
        $query = $this->db->get('fosa_voucher');
        $str = $this->db->last_query();
		$returnVal = $query->num_rows();

        return $returnVal;
	}
		
	public function getServiceKeyCount(){
		$returnVal;
		                
        $query = $this->db->get('fosa_voucher_service_key');
        $str = $this->db->last_query();
		$returnVal = $query->num_rows();

        return $returnVal;
	}
	
	public function getMostRecentUsedVouchers(){
		$resultSet = "";
		                
		$this->db->limit(10);
        $query = $this->db->get_where('fosa_voucher', array('status' => 'USED'));
        $str = $this->db->last_query();

        if ($query->num_rows() > 0) {
			$resultSet = $query->result();
        }

        return $resultSet;
	}
	
	public function getMostRecentUnusedVouchers(){
		$resultSet = "";
		                
		$this->db->limit(10);
        $query = $this->db->get_where('fosa_voucher', array('status' => 'UNUSED'));
        $str = $this->db->last_query();

        if ($query->num_rows() > 0) {
			$resultSet = $query->result();
        }

        return $resultSet;
	}
	
	public function getRecipient($recipientID){
		$resultSet = "";
		                
        $query = $this->db->get_where('fosa_voucher_recipient', array('id' => $recipientID,'status' => 'ACTIVE'));
        if ($query->num_rows() > 0) {
			$resultSet = $query->row();
        }

        return $resultSet;
	}
	
	public function checkVoucher($voucherCode){
		$resultSet = "";
		                
        $query = $this->db->get_where('fosa_voucher', array('voucher' => $voucherCode,'status' => 'UNUSED'));
        if ($query->num_rows() > 0) {
			$resultSet = $query->row();
        }

        return $resultSet; // return voucher resultSet
	}
	
	public function hasUsedVoucherOffer($recipientID,$offerID){
		// false means the recipient already has an unused voucher for that offer
		$resultValue = true;
		                
        $query = $this->db->get_where('fosa_voucher', array('recipient' => $recipientID,'offer' => $offerID,'status' => 'UNUSED'));
        if ($query->num_rows() > 0) {
			$resultValue = false;
        }

        return $resultValue;
	}

	public function createVoucherCode($recipientID,$offerID,$offerDiscount){
		$voucherCode = "";
		
		$recipientResultSet = $this->getRecipient($recipientID);
		$offerResultSet = $this->getOffer($offerID);
		
		if(!empty($offerResultSet) && !empty($recipientResultSet)){
			$discount = $offerResultSet->discount_without_percentage_sign;
			$recipientPrefix = strtoupper(substr($recipientResultSet->full_name,0,3));
			
			//extra security 
			if($offerDiscount === $offerResultSet->discount_without_percentage_sign){
				$voucherCode =  $discount . $recipientPrefix . time();	
				
				try{
					//check if recipient alread has an used voucher wigth the same offer
					$i = $this->hasUsedVoucherOffer($recipientID,$offerID);
					if($i){
						//insert voucher info into voucher table
						$insertData = array(
						   'status' => 'UNUSED' ,
						   'offer' =>  $offerResultSet->id,
						   'recipient' => $recipientResultSet->id,
						   'voucher' => $voucherCode
						);
						$this->db->insert('fosa_voucher', $insertData); 
					}
				}catch(Exception $exception ){
					// do noting
				}

			}else{
				$voucherCode = "";
			}
		}
		
		return $voucherCode;
	}

    public function getDefaultMetaTags() {
        $meta = array(
            array(
                'name' => 'robots',
                'content' => 'no-cache'
            ),
            array(
                'name' => 'description',
                'content' => 'VOUCHER PHP challenge from VANHACK. '
            ),
            array(
                'name' => 'keywords',
                'content' => 'vanhack php challenge club, php, voucher applicaiton'
            ),
            array(
                'name' => 'author',
                'content' => 'greenDevNG'
            ),
            array(
                'name' => 'Content-type',
                'content' => 'text/html; charset=utf-8', 'type' => 'equiv'
            ), array(
                'name' => 'viewport',
                'content' => 'width=device-width, initial-scale=1'
            )
        );

        return $meta;
    }

    public function getAppConfig() {
        $data = array();
        $data['assetsFolder'] = base_url() . $this->config->item('public_application_assets_folder');
        $data['dashboardAssetsFolder'] = base_url() . $this->config->item('public_application_office_assets_folder');

        $data['pageTitle'] = $this->config->item('application_project_name');
        $data['appName'] = $this->config->item('application_project_name');
        $data['address'] = $this->config->item('application_project_address');
        $data['tel1'] = $this->config->item('application_project_telephone');
        $data['tel2'] = $this->config->item('application_project_telephone2');
        $data['tel3'] = $this->config->item('application_project_telephone3');
        $data['email2'] = $this->config->item('email2');
        $data['pledgeExpiringDate'] = $this->config->item('pledgeExpiringDate');

        return $data;
    }

    public function copyright() {
        $copyright = "&copy; " . $this->config->item('application_project_name') . " ";
        $startYear = $this->config->item('application_start_year');
        $currentYear = Date('Y');
        if ($startYear == Date('Y')) {
            $copyright .= " $startYear" . ". All Rights Reserved";
        } else {
            $copyright .= "$startYear " . "-" . " $currentYear" . ". All Rights Reserved";
        }
        return $copyright;
    }

    public function hashHash($password) {
        return hash('sha512', $password);
    }

    public function getEmailHostLink($email) {
        $emailLink = strstr($email, '@');
        $emailLink = substr($emailLink, 1, strlen($emailLink));

        return $emailLink;
    }

}
