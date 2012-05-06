<?php

include(ROOT . DS . APP_DIR . "/scripts/sailthru-api/sailthru/Sailthru_Client_Exception.php");
include(ROOT . DS . APP_DIR . "/scripts/sailthru-api/sailthru/Sailthru_Client.php");
include(ROOT . DS . APP_DIR . "/scripts/sailthru-api/sailthru/Sailthru_Util.php");

define('API_KEY', "8907ecf0f40ee82bc3e58c1df91ceba0");
define('API_SECRET', '75cf7511cb55c4e0692d525ce55aaf5a');
define('RESULTS_PER_PAGE', 5);

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
      

 /**    
 *  Sent Campaigns
 *
 */
	public function campaigns_sent() {

        $sailthruClient = new Sailthru_Client(API_KEY, API_SECRET);    
        
        $options['status'] = 'sent';
        try{
            $response = $sailthruClient->getBlasts($options);

            if (count($response['blasts']) == 0){
                echo "Nothing to display.";
                $this->autoLayout = $this->autoRender = false; 
                return;
            }


            if (!isset($response['error']) ) {
                $total_count = count($response['blasts']);
                $pages = ceil($total_count/RESULTS_PER_PAGE);  
               
                $page = isset($this->params['pass'][0]) ? $this->params['pass'][0] : 1;
                $start = ($page - 1 )*RESULTS_PER_PAGE;
                $end = $page*RESULTS_PER_PAGE;
                
                
                $results = array();
                for ($i = $start; $i < $end; $i++){
                    if(array_key_exists($i, $response['blasts'])){
                        $results[$i] = $response['blasts'][$i];
                    }
                }

                $blast_type = 'sent';
                $this->set('blasts',$results);
                $this->set('blast_type',$blast_type);
                $this->set('page',$page);
                $this->set('pages',$pages);
                $this->layout = 'campaign_table';
                $this->render('campaign_table_sent');
            } else {
                echo 'error';
            }
        } catch (Sailthru_Client_Exception $e) {
            echo 'exception';
        }      
    }

    /**
    *   Scheduled Campaigns
    */
    public function campaigns_scheduled() {

        $sailthruClient = new Sailthru_Client(API_KEY, API_SECRET);    
        
        $options['status'] = 'scheduled';
        try{
            $response = $sailthruClient->getBlasts($options);

             if (count($response['blasts']) == 0){
                echo "Nothing to display.";
                $this->autoLayout = $this->autoRender = false; 
                return;
            }

            if (!isset($response['error']) ) {
                $total_count = count($response['blasts']);
                $pages = ceil($total_count/RESULTS_PER_PAGE);  
               
                $page = isset($this->params['pass'][0]) ? $this->params['pass'][0] : 1;
                $start = ($page - 1 )*RESULTS_PER_PAGE;
                $end = $page*RESULTS_PER_PAGE;
                
                
                $results = array();
                for ($i = $start; $i < $end; $i++){
                    if(array_key_exists($i, $response['blasts'])){
                        $results[$i] = $response['blasts'][$i];
                    }
                }

                $blast_type = 'scheduled';
                $this->set('blast_type',$blast_type);
                $this->set('blasts',$results);
                $this->set('page',$page);
                $this->set('pages',$pages);
                $this->layout = 'campaign_table';
                $this->render('campaign_table_scheduled');
            } else {
                echo 'error';
            }
        } catch (Sailthru_Client_Exception $e) {
            echo 'exception';
        }      
    }

    /**
    *   In Progress Campaigns
    */
    public function campaigns_in_progress() {

        $sailthruClient = new Sailthru_Client(API_KEY, API_SECRET);    
        
        $options['status'] = 'sending';
        try{
            $response = $sailthruClient->getBlasts($options);

             if (count($response['blasts']) == 0){
                echo "Nothing to display.";
                $this->autoLayout = $this->autoRender = false; 
                return;
            }

            if (!isset($response['error']) ) {
                $total_count = count($response['blasts']);
                $pages = ceil($total_count/RESULTS_PER_PAGE);  
               
                $page = isset($this->params['pass'][0]) ? $this->params['pass'][0] : 1;
                $start = ($page - 1 )*RESULTS_PER_PAGE;
                $end = $page*RESULTS_PER_PAGE;
                
                
                $results = array();
                for ($i = $start; $i < $end; $i++){
                    if(array_key_exists($i, $response['blasts'])){
                        $results[$i] = $response['blasts'][$i];
                    }
                }

                $blast_type = 'in_progress';
                $this->set('blast_type',$blast_type);
                $this->set('blasts',$results);
                $this->set('page',$page);
                $this->set('pages',$pages);
                $this->layout = 'campaign_table';
                $this->render('campaign_table_in_progress');
            } else {
                echo 'error';
            }
        } catch (Sailthru_Client_Exception $e) {
            echo 'exception';
        }      
    }

    public function view_blast_preview() {

        $sailthruClient = new Sailthru_Client(API_KEY, API_SECRET);  
        			
			try{
				if (!isset($response['error']) ) {
	
					if (isset($this->params['pass'][0])){
						$blast_id = $this->params['pass'][0];
					} 
					else {
						exit;
					}
                    $response = $sailthruClient->getBlast($blast_id);
					$html = $response['content_html'];
					$name = $response['name'];
					$this->set('name', $name);
					$this->set('view_blast_preview', $html);
			
					$this->layout = 'popup_template';
					$this->render('view_blast_preview');
				} 
				else {
					echo 'error';
				}
			} 
			catch (Sailthru_Client_Exception $e) {
				echo 'exception';
			} 
        
    }
    
    public function view_campaigns_stats() {
        $sailthruClient = new Sailthru_Client(API_KEY, API_SECRET);  
        
        
            try{
                if (!isset($response['error']) ) {
                    if (isset($this->params['pass'][0])){
                        $blast_id = $this->params['pass'][0];
                    } 
                    else {
                        exit;
                    }

                    $options['beacon_times'] = 1;
                    $options['click_times'] = 1;
                    $options['clickmap'] = 1;
                    $options['engagement'] = 1;
                    $options['signup'] = 1;
                    $options['subject'] = 1;
                    $options['urls'] = 1;
                    
                    
                	$response = $sailthruClient->stats_blast($blast_id, $options); //associative array with everything i need
                	$responseName = $sailthruClient->getBlast($blast_id);
                	$name = $responseName['name'];
                	
                	if(isset($response['count'])){
                		$num_users = $response['count'];
                	}
                	else{
                		$num_users = 0;
                	}
                	if(isset($response['estopens'])){
                		$est_open_rate = $response['estopens'];
                	}
                	else{
                		$est_open_rate = 0;
                	}
                    if(isset($reponse['click_total'])){
                    	$click_total = $reponse['click_total'];
                    }
                    else{
                    	$click_total = 0;
                    }
                    if(isset($response['rev'])){
                    	$revenue_in_cents = $response['rev'];
                    }
                    else{
                    	$revenue_in_cents = 'unknown';
    				}
    				if(isset($response['optout'])){
    					$optout = $response['optout'];
    				}
    				else{
    					$optout = 0;
    				}
    				if(isset($response['spam'])){
    					$spam = $response['spam'];
    				}
    				else{
    					$spam = 0;
    				}
    				$this->set('name', $name);
    				$this->set('num_users', $num_users);
    				$this->set('est_open_rate', $est_open_rate);
    				$this->set('click_total', $click_total);
    				$this->set('revenue_in_cents', $revenue_in_cents);
    				$this->set('optout', $optout);
    				$this->set('spam', $spam);
    				
    				$this->layout = 'popup_template';

    				$html = $response['content_html'];
					$this->set('view_blast_preview', $html);
			
					$this->layout = 'popup_template';
					$this->render('view_campaign_stats');
                } 
                else {
                    echo 'error';
                }
            } 
            catch (Sailthru_Client_Exception $e) {
                echo 'exception';
            } 
        
    }

    public function aggregate_trends() {
        $sailthruClient = new Sailthru_Client(API_KEY, API_SECRET); 
        
        try {
            if(!isset($response['error'])) {
                // get post params
                $start_date = $this->request->data('start_date');
                $end_date = $this->request->data('start_date');
                $start_date = ($start_date == NULL ? 'default_start' : $start_date);
                $end_date = ($end_date = NULL ? 'default_end' : $end_date);

                $key1 = $this->request->data('select1name');
                $key2 = $this->request->data('select2name');
                $key3 = $this->request->data('select3name');
                $key4 = $this->request->data('select4name');
                $key1 = ($key1 == NULL ? 'default1' : $key1);
                $key2 = ($key2 == NULL ? 'default2' : $key2);
                $key3 = ($key3 == NULL ? 'default3' : $key3);
                $key4 = ($key4 == NULL ? 'default4' : $key4);

                $key1_values = array();
                $key2_values = array();
                $key3_values = array();
                $key4_values = array();

                $options['beacon_times'] = 1;
                $options['click_times'] = 1;
                $options['clickmap'] = 1;
                $options['engagement'] = 1;
                $options['signup'] = 1;
                $options['subject'] = 1;
                $options['urls'] = 1;
                
                $current_datetime = @strtotime($start_date);
                $last_datetime = @strtotime($end_date);
                do {
                    $current_date = @date('Y-m-d', $current_datetime);
                    $response = $sailthruClient->stats_blast($current_date, $current_date, $options);
                    if(isset($response[$key1])) {
                	    array_push($key1_values, $response[$key1]);
                    } else {
                	    array_push($key1_values, 0);
                    }
                    if(isset($reponse[$key2])) {
                  	    array_push($key2_values, $reponse[$key2]);
                    } else{
                   	    array_push($key2_values, 0);
                    }
                    if(isset($response[$key3])) {
                        array_push($key3_values, $response[$key3]);
                    } else {
                        array_push($key3_values, 0);
                    }
                    if(isset($response[$key4])) {
                        array_push($key4_values, $response[$key4]);
                    } else {
                        array_push($key4_values, 0);
                    }
                    $current_datetime = @strtotime('+1 day', $current_datetime);
                } while($current_datetime < $last_datetime);
    		    
                $seriesData = array(
                                array(
                                    'name' => $key1,
                                    'data' => $key1_values
                                ),
                                array(
                                    'name' => $key2,
                                    'data' => $key2_values
                                ),
                                array(
                                    'name' => $key3,
                                    'data' => $key3_values
                                ),
                                array(
                                    'name' => $key4,
                                    'data' => $key4_values
                                )
                              );
                $this->set('seriesData', $seriesData);
    			$this->layout = 'popup_template';
		        $this->render('view_campaign_stats');
            } else {
                echo 'error';
            }
        } catch (Sailthru_Client_Exception $e) {
            echo 'exception';
        }
    }


    public function campaigns_delete() {

        $sailthruClient = new Sailthru_Client(API_KEY, API_SECRET);  
                
        try{
            if (!isset($response['error']) ) {

                if (isset($this->params['pass'][0])){
                    $blast_id = $this->params['pass'][0];
                } 
                else {
                    exit;
                }
                $response = $sailthruClient->deleteBlast($blast_id);
                if ($response['ok'] == 1){
                    echo 'Campaign was deleted successfully.';
                } else {
                    echo 'Campaign could not be deleted.';
                }
                $this->autoLayout = $this->autoRender = false; 
            } 
            else {
                echo 'error';
            }
        } 
        catch (Sailthru_Client_Exception $e) {
            echo 'exception';
        }            
    }

    public function reports_stats() {

        $sailthruClient = new Sailthru_Client(API_KEY, API_SECRET);  
                
        try{
            if (!isset($response['error']) ) {

                if (isset($this->params['pass'][0])){
                    $blast_id = $this->params['pass'][0];
                } 
                else {
                    exit;
                }
                $response = $sailthruClient->deleteBlast($blast_id);
                if ($response['ok'] == 1){
                    echo 'Campaign was deleted successfully.';
                } else {
                    echo 'Campaign could not be deleted.';
                }
                $this->autoLayout = $this->autoRender = false; 
            } 
            else {
                echo 'error';
            }
        } 
        catch (Sailthru_Client_Exception $e) {
            echo 'exception';
        }            
    }
        
}
