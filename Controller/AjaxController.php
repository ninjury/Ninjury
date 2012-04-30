<?php

include("/home/cake/mobile/scripts/sailthru-api/sailthru/Sailthru_Client_Exception.php");
include("/home/cake/mobile/scripts/sailthru-api/sailthru/Sailthru_Client.php");
include("/home/cake/mobile/scripts/sailthru-api/sailthru/Sailthru_Util.php");

class AjaxController extends AppController {

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
    
    $api_key = "8907ecf0f40ee82bc3e58c1df91ceba0";
    $api_secret = '75cf7511cb55c4e0692d525ce55aaf5a';
    $sailthruClient = new Sailthru_Client($api_key, $api_secret);    
    
    /**
    
    
 * Displays a view
 *
 * @param mixed What page to display
 */
	public function campaigns_sent($page) {

        echo 'hello!';
        
        $options['status'] = 'sent';
        try{
            $response = $sailthruClient->getBlasts($options);
            if (!isset($response['error']) ) {
                $total_count = count($response['blasts']);
                $pages = ceil($total_count/RESULTS_PER_PAGE);  
               
                //$page = isset($this->params['pass'][3]) ? $this->params['pass'][3] : 1;
                //echo $this->params['pass'][1];
                $start = ($page - 1 )*RESULTS_PER_PAGE;
                $end = $page*RESULTS_PER_PAGE;
                
                
                $results = array();
                for ($i = $start; $i < $end; $i++){
                    if(array_key_exists($i, $response['blasts'])){
                        $results[$i] = $response['blasts'][$i];
                    }
                }
            
                $this->set('sent_blasts',$results);
                $this->set('sent_pages',$pages);
                $this->set('sent_page',$page);
            } else {
                echo 'error';
            }
        } catch (Sailthru_Client_Exception $e) {
            echo 'exception';
        }      
    }