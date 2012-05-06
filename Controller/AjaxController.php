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
    *  Sent Campaigns - This function is used to make an AJAX request for a 
    *  specific page of sent campaigns on the Campaigns page of the mobile site.
    *
    *  @param 
    *      page - The page of sent campaigns to be returned.
    *  @return
    *      Returns a table of the sent campaigns of the current page in html format.
    */
	public function campaigns_sent() {

        $sailthruClient = new Sailthru_Client(API_KEY, API_SECRET);    
        
        // Create of array of options and specify that sent campaigns are being requested.
        $options['status'] = 'sent';
        try{

            // API call to obtain information on blasts, passing in the options array.
            $response = $sailthruClient->getBlasts($options);

            /*  If the response from the API contains no value for blasts, there is nothing to display.
                Send a message to the front end and return. */
            if (count($response['blasts']) == 0){
                echo "Nothing to display.";
                $this->autoLayout = $this->autoRender = false; 
                return;
            }


            if (!isset($response['error']) ) {

                // Calculate the number pages by dividing the total blasts by the results per page constant.
                $total_count = count($response['blasts']);
                $pages = ceil($total_count/RESULTS_PER_PAGE);  
               
                // Get the page requested from the URL of this request.
                $page = isset($this->params['pass'][0]) ? $this->params['pass'][0] : 1;
                $start = ($page - 1 )*RESULTS_PER_PAGE;
                $end = $page*RESULTS_PER_PAGE;
                
                
                $results = array();
                for ($i = $start; $i < $end; $i++){
                    if(array_key_exists($i, $response['blasts'])){
                        $results[$i] = $response['blasts'][$i];
                    }
                }

                // Set variables so they can be accessed by the View, then render the View.
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
    *  Scheduled Campaigns - This function is used to make an AJAX request for a 
    *  specific page of scheduled campaigns on the Campaigns page of the mobile site.
    *
    *  @param 
    *      page - The page of sent campaigns to be returned.
    *  @return
    *      Returns a table of the scheduled campaigns of the current page in html format.
    */
    public function campaigns_scheduled() {

        $sailthruClient = new Sailthru_Client(API_KEY, API_SECRET);    
        
        // Create of array of options and specify that scheduled campaigns are being requested.
        $options['status'] = 'scheduled';
        try{

            // API call to obtain information on blasts, passing in the options array.
            $response = $sailthruClient->getBlasts($options);

            /*  If the response from the API contains no value for blasts, there is nothing to display.
                Send a message to the front end and return. */
            if (count($response['blasts']) == 0){
                echo "Nothing to display.";
                $this->autoLayout = $this->autoRender = false; 
                return;
            }

            if (!isset($response['error']) ) {

                // Calculate the number pages by dividing the total blasts by the results per page constant.
                $total_count = count($response['blasts']);
                $pages = ceil($total_count/RESULTS_PER_PAGE);  
               
                // Get the page requested from the URL of this request.
                $page = isset($this->params['pass'][0]) ? $this->params['pass'][0] : 1;
                $start = ($page - 1 )*RESULTS_PER_PAGE;
                $end = $page*RESULTS_PER_PAGE;
                
                
                $results = array();
                for ($i = $start; $i < $end; $i++){
                    if(array_key_exists($i, $response['blasts'])){
                        $results[$i] = $response['blasts'][$i];
                    }
                }

                // Set variables so they can be accessed by the View, then render the View.
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
    *  In Progress Campaigns - This function is used to make an AJAX request for a 
    *  specific page of in progress campaigns on the Campaigns page of the mobile site.
    *
    *  @param 
    *      page - The page of sent campaigns to be returned. ()
    *  @return
    *      Returns a table of the in progress campaigns of the current page in html format.
    */
    public function campaigns_in_progress() {

        $sailthruClient = new Sailthru_Client(API_KEY, API_SECRET);    
        
        // Create of array of options and specify that in progress campaigns are being requested.
        $options['status'] = 'sending';
        try{

            // API call to obtain information on blasts, passing in the options array.
            $response = $sailthruClient->getBlasts($options);

            /*  If the response from the API contains no value for blasts, there is nothing to display.
                Send a message to the front end and return. */
            if (count($response['blasts']) == 0){
                echo "Nothing to display.";
                $this->autoLayout = $this->autoRender = false; 
                return;
            }

            if (!isset($response['error']) ) {

                // Calculate the number pages by dividing the total blasts by the results per page constant.
                $total_count = count($response['blasts']);
                $pages = ceil($total_count/RESULTS_PER_PAGE);  
               
                // Get the page requested from the URL of this request.
                $page = isset($this->params['pass'][0]) ? $this->params['pass'][0] : 1;
                $start = ($page - 1 )*RESULTS_PER_PAGE;
                $end = $page*RESULTS_PER_PAGE;
                
                
                $results = array();
                for ($i = $start; $i < $end; $i++){
                    if(array_key_exists($i, $response['blasts'])){
                        $results[$i] = $response['blasts'][$i];
                    }
                }

                // Set variables so they can be accessed by the View, then render the View.
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
                    	$revenue_in_cents = 'n/a';
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

    /**    
    *  Delete Campaign - This function is used to delete a campaign.
    *
    *  @param 
    *      blast_id - The page of sent campaigns to be returned.
    *  @return
    *      Returns a string indicating whether or not the campaign was deleted succesfully.
    */
    public function campaigns_delete() {

        $sailthruClient = new Sailthru_Client(API_KEY, API_SECRET);  

            // Get the id of the blast to be deleted from the the URL of this request.
            if (isset($this->params['pass'][0])){
                $blast_id = $this->params['pass'][0];
            } 
            else {
                //Exit if no blast id was specified.
                exit;
            }

            // Make the API call to delete the blast.  Return an appropriate response string.
            try{
                $response = $sailthruClient->deleteBlast($blast_id);
                if (!isset($response['error']) ) {
                    if ($response['ok'] == 1){
                echo 'Campaign was deleted successfully.';
                } else {
                    echo 'Campaign could not be deleted.';
                }
            $this->autoLayout = $this->autoRender = false; 

            } else {
                echo 'error';
            }
        } catch (Sailthru_Client_Exception $e) {
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

    /**    
    *  Recent Campaigns - This function is used for AJAX requests to obtain information on 
    *  recent campaigns, or a set of campaigns filtered by date and/or list.
    *
    *  @param 
    *      start_date (optional) - The start date of the campaign information.
    *                              Defaults to 7 days before end date, or 7 days before current date if end date not set.
    *      end_date (optional) - The end date of the campaign information. 
    *                            Defaults to 7 days after the start date, or the current date if start date not set.
    *      list (optional) - The list used to filter campaigns by.  Defaults to all lists.
    *      stat_1 - The first statistic queried for the set of campaigns (e.g. open %, click %, bounce % ).
    *      stat_2 - The second statistic queried for the set of campaigns (e.g. open %, click %, bounce % ).
    *  @return
    *      Returns a table of the information requested in html form.
    */
    public function reports_recent_campaigns(){
        $sailthruClient = new Sailthru_Client(API_KEY, API_SECRET);  

        echo (var_dump($this->params['pass']));
        return;
        $start_date = isset($this->params['pass'][0]) ? $this->params['pass'][0] : date("m/d/y");
        $end_date = isset($this->params['pass'][1]) ? $this->params['pass']1] : date("m/d/y");

        $options['start_date'] = $start_date;
        $options['end_date'] = $end_date;
        $options['status'] = 'sent';

        // If list is specified, add it to the options array.
        if (isset($this->params['pass'][2])){
            $options['list'] = $this->params['pass'][2]);
        }

        try{
            $response = $sailthruClient->getBlasts($options);

            if (!isset($response['error']) ) {



               
            } else {
                echo 'error';
            }
        } catch (Sailthru_Client_Exception $e) {
            echo 'exception';
        }     
    }
        
}