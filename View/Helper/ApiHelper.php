<?php
/**
 * Sailthru API Helper
 */
App::uses('Helper', 'View');

/**
 * Requires Sailthru PHP 5 API
 */
include("../../sailthru-api/sailthru/Sailthru_Client_Exception.php");
include("../../sailthru-api/sailthru/Sailthru_Client.php");
include("../../sailthru-api/sailthru/Sailthru_Util.php");

/**
 * API helper
 */
class ApiHelper extends AppHelper {

	var $sailthru;

	public function init() {
		$sailthru = new Sailthru_Client([YOUR SAILTHRU API KEY], [YOUR SAILTHRU SECRET]);
	}

	public function getBlastStats() {
		$this->init();
		return $sailthru->apiGet('stats', array_merge($this->api_options, array('stat' => 'blast')));
	}
}
