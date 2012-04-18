<?php

include("/home/cake/mobile/scripts/sailthru-api/sailthru/Sailthru_Client_Exception.php");
include("/home/cake/mobile/scripts/sailthru-api/sailthru/Sailthru_Client.php");
include("/home/cake/mobile/scripts/sailthru-api/sailthru/Sailthru_Util.php");
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

    public function campaigns_sent($sailthruClient) {
        $options = array();
        $options['status'] = 'sent';
        try{
            $response = $sailthruClient->getBlasts($options);
                if ( isset($response['error']) ) {
                $total_count = count($response['blasts']);
                $pages = ceil($total_count/RESULTS_PER_PAGE);   
               
                $page = 1; //$this->request->data('sent_page');
                $start = ($page - 1 )*RESULTS_PER_PAGE;
                $end = $page*RESULTS_PER_PAGE;
                
                echo 'start: ' . $start . ' end: ' . $end;
                $results = array();
                for ($i = $start; $i < $end; $i++){
                    if(array_key_exists($i)){
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
    
    public function campaigns_scheduled($sailthruClient) {
        $options = array();
        $options['status'] = 'scheduled';
        try{
            $response = $sailthruClient->getBlasts($options);
            if ( isset($response['error']) ) {
                $total_count = count($response['blasts']);
                $pages = ceil($total_count/RESULTS_PER_PAGE);   
               
                $page = 1; //$this->request->data('scheduled_page');
                $start = ($page - 1 )*RESULTS_PER_PAGE;
                $end = $page*RESULTS_PER_PAGE;
                
                $results = array();
                for ($i = $start; $i < $end; $i++){
                    if(array_key_exists($i)){
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
            echo 'exception';
        }    
    }
    
    public function campaigns_in_progress($sailthruClient) {
        $options = array();
        $options['status'] = 'sending';
        try{
            $response = $sailthruClient->getBlasts($options);
            if ( isset($response['error']) ) {
                $total_count = count($response['blasts']);
                $pages = ceil($total_count/RESULTS_PER_PAGE);   
               
                $page = 1; //$this->request->data('in_progress_page');
                $start = ($page - 1 )*RESULTS_PER_PAGE;
                $end = $page*RESULTS_PER_PAGE;
                
                $results = array();
                for ($i = $start; $i < $end; $i++){
                    if(array_key_exists($i)){
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
            echo 'exception';
        }    
    }
    
    /**
 * Displays a view
 *
 * @param mixed What page to display
 */
	public function campaigns() {

	    $api_key = "8907ecf0f40ee82bc3e58c1df91ceba0";
	    $api_secret = '75cf7511cb55c4e0692d525ce55aaf5a';
	    $sailthruClient = new Sailthru_Client($api_key, $api_secret);

        //$this->campaigns_sent($sailthruClient);
        //$this->campaigns_scheduled($sailthruClient);
        //$this->campaigns_in_progress($sailthruClient);
        
         /* Scheduled Tab */
        $options = array();
        $options['status'] = 'scheduled';
        try{
            $response = $sailthruClient->getBlasts($options);
            if (!isset($response['error']) ) {
                $total_count = count($response['blasts']);
                $pages = ceil($total_count/RESULTS_PER_PAGE);   
               
                $page = issset($this->params['pass'][0]) ? $this->params['pass'][0] : 1;
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
            echo 'exception';
        }    
        
        /* In Progress Tab */
        $options = array();
        $options['status'] = 'sending';
        try{
            $response = $sailthruClient->getBlasts($options);
            if (!isset($response['error']) ) {
                $total_count = count($response['blasts']);
                $pages = ceil($total_count/RESULTS_PER_PAGE);   
               
                $page = issset($this->params['pass'][2]) ? $this->params['pass'][2] : 1;
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
            echo 'exception';
        }  
         /* Sent Tab */
        $options['status'] = 'sent';
        try{
            $response = $sailthruClient->getBlasts($options);
            if (!isset($response['error']) ) {
                $total_count = count($response['blasts']);
                $pages = ceil($total_count/RESULTS_PER_PAGE);  
               
                $page = isset($this->params['pass'][3]) ? $this->params['pass'][3] : 1;
                echo $this->params['pass'][1];
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
        
        //$options['start_date'] = 'Jan 1 2012';
        //$options['end_date'] = 'Apr 10 2012';
        
        $this->render('campaigns');
    }
}