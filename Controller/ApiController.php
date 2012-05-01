<?php

include(ROOT . DS . APP_DIR . "/scripts/sailthru-api/sailthru/Sailthru_Client_Exception.php");
include(ROOT . DS . APP_DIR . "/scripts/sailthru-api/sailthru/Sailthru_Client.php");
include(ROOT . DS . APP_DIR . "/scripts/sailthru-api/sailthru/Sailthru_Util.php");
define("RESULTS_PER_PAGE", 5);

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

        
	    $api_key = "8907ecf0f40ee82bc3e58c1df91ceba0";
	    $api_secret = '75cf7511cb55c4e0692d525ce55aaf5a';
	    $sailthruClient = new Sailthru_Client($api_key, $api_secret);
        
         /* Scheduled Tab */
        $options = array();
        $options['status'] = 'scheduled';
        try{
            $response = $sailthruClient->getBlasts($options);
            if (!isset($response['error']) ) {
                $total_count = count($response['blasts']);
                $pages = ceil($total_count/RESULTS_PER_PAGE);   
               
                $page = isset($this->params['pass'][1]) ? $this->params['pass'][1] : 1;
                $start = ($page - 1 )*RESULTS_PER_PAGE;
                $end = $page*RESULTS_PER_PAGE;
                
                $results = array();
                for ($i = $start; $i < $end; $i++){
                    if(array_key_exists($i, $response['blasts'])){
                        $results[$i] = $response['blasts'][$i];
                    }
                }
                
                $this->set('scheduled_blasts',$results);
                $this->set('scheduled_pages',$pages);
                $this->set('scheduled_page',$page);
            } else {
                echo 'error';
            }
        } catch (Sailthru_Client_Exception $e) {
            echo $e->getMessage();
        }    
        
        /* In Progress Tab */
        $options = array();
        $options['status'] = 'sending';
        try{
            $response = $sailthruClient->getBlasts($options);
            if (!isset($response['error']) ) {
                $total_count = count($response['blasts']);
                $pages = ceil($total_count/RESULTS_PER_PAGE);   
               
                $page = isset($this->params['pass'][2]) ? $this->params['pass'][2] : 1;
                $start = ($page - 1 )*RESULTS_PER_PAGE;
                $end = $page*RESULTS_PER_PAGE;
                
                $results = array();
                for ($i = $start; $i < $end; $i++){
                    if(array_key_exists($i, $response['blasts'])){
                        $results[$i] = $response['blasts'][$i];
                    }
                }
            
                $this->set('in_progress_blasts',$results);
                $this->set('in_progress_pages',$pages);
                $this->set('in_progress_page',$page);
            } else {
                echo 'error';
            }
        } catch (Sailthru_Client_Exception $e) {
            echo $e->getMessage();
        }  
         /* Sent Tab */
        $options['status'] = 'sent';
        try{
            $response = $sailthruClient->getBlasts($options);
            if (!isset($response['error']) ) {
                $total_count = count($response['blasts']);
                $pages = ceil($total_count/RESULTS_PER_PAGE);  
               
                $page = isset($this->params['pass'][3]) ? $this->params['pass'][3] : 1;
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
            echo $e->getMessage();
        }            
        $this->render('campaigns');
    }
}
