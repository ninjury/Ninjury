<?php

include("/home/cake/mobile/scripts/sailthru-api/sailthru/Sailthru_Client_Exception.php");
include("/home/cake/mobile/scripts/sailthru-api/sailthru/Sailthru_Client.php");
include("/home/cake/mobile/scripts/sailthru-api/sailthru/Sailthru_Util.php");

class APIController extends AppController {

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
	public function campaigns() {
        try {

	    $api_key = "8907ecf0f40ee82bc3e58c1df91ceba0";
	    $api_secret = '75cf7511cb55c4e0692d525ce55aaf5a';
	    $sailthruClient = new Sailthru_Client($api_key, $api_secret);

        campaigns_sent($sailthruClient);
        campaigns_scheduled($sailthruClient);
        campaigns_in_progress($sailthruClient);
        //$options['start_date'] = 'Jan 1 2012';
        //$options['end_date'] = 'Apr 10 2012';
        $this->render('campaigns');
    }

    public function campaigns_sent($client) {
            $options = array();
            $options['status'] = 'sent';
            $response = $sailthruClient->getBlasts($options);
            if ( isset($response['error']) ) {
                $this->set('sent_blasts',$response['blasts']);
            } else {
                echo 'error';
            }
        } catch (Sailthru_Client_Exception $e) {
            echo 'exception';
        }    
    }
    
    public function campaigns_scheduled($client) {
            $options = array();
            $options['status'] = 'scheduled';
            $response = $sailthruClient->getBlasts($options);
            if ( isset($response['error']) ) {
                $this->set('scheduled_blasts',$response['blasts']);
            } else {
                echo 'error';
            }
        } catch (Sailthru_Client_Exception $e) {
            echo 'exception';
        }    
    }
    
    public function campaigns_in_progress($client) {
            $options = array();
            $options['status'] = 'sending';
            $response = $sailthruClient->getBlasts($options);
            if ( isset($response['error']) ) {
                $this->set('in_progress_blasts',$response['blasts']);
            } else {
                echo 'error';
            }
        } catch (Sailthru_Client_Exception $e) {
            echo 'exception';
        }    
    }
}