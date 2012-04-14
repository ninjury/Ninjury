<?php

class APIController extends AppController {

include("../scripts/sailthru-api/Sailthru_Client_Exception.php");
include("../scripts/sailthru-api/Sailthru_Client.php");
include("../scripts/sailthru-api/Sailthru_Util.php");

$api_key = "8907ecf0f40ee82bc3e58c1df91ceba0";
$api_secret = '75cf7511cb55c4e0692d525ce55aaf5a';
$sailthruClient = new Sailthru_Client($api_key, $api_secret);

/**
 * Default helper
 *
 * @var array
 */
	public $helpers = array('Html');

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $uses = array();
    
/**
 * Displays a view
 *
 * @param mixed What page to display
 */
	public function display() {
        try {
            $options = array();
            //$options['start_date'] = 'Jan 1 2012';
            //$options['end_date'] = 'Apr 10 2012';
            $options['status'] = 'sent';
            //$options['domain'] = 1;
            $response = $sailthruClient->getBlasts($options);
            if ( !isset($response['error']) ) {
                // everything OK
                // do something here
                //echo print_r($response);
            } else {
                //echo 'error';
            }
        } catch (Sailthru_Client_Exception $e) {
            // deal with exceptions
            echo 'exception';
        }
        
        $this->set('sent_blasts',$response['blasts']);
        $this->render('API/campaigns');
    }


}