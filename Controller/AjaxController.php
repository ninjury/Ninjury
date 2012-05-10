<?php

include(ROOT . DS . APP_DIR . "/scripts/sailthru-api/sailthru/Sailthru_Client_Exception.php");
include(ROOT . DS . APP_DIR . "/scripts/sailthru-api/sailthru/Sailthru_Client.php");
include(ROOT . DS . APP_DIR . "/scripts/sailthru-api/sailthru/Sailthru_Util.php");

define('API_KEY', "8907ecf0f40ee82bc3e58c1df91ceba0");
define('API_SECRET', '75cf7511cb55c4e0692d525ce55aaf5a');
define('RESULTS_PER_PAGE', 5);
define('DEFAULT_DAYS',7);

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

        // Only display Sent campaigns from the past number of days defined by the DEFAULT_DAYS constant.
        $temp = time();
        $end_date = date("m/d/y",$temp);
        $temp = strtotime($end_date) - DEFAULT_DAYS*86400; 
        $start_date = date("m/d/y",$temp);

        $options['start_date'] = $start_date;
        $options['end_date'] = $end_date;

        try{


             // API call to obtain information on blasts, passing in the options array.
            $response = $sailthruClient->getBlasts($options);

            /*  If the response from the API contains no value for blasts, there is nothing to display.
                Send a message to the front end and return. */
            if (count($response['blasts']) == 0){
                echo 'Nothing to Display';
                $results = array();
                $this->set('blasts',$results);
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
                
                //Create an array of blast results to be accessed by the View.
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

        // Only display Scheduled campaigns from the following number of days defined by the DEFAULT_DAYS constant.
        $temp = time();
        $start_date = date("m/d/y",$temp);
        $temp = strtotime($start_date) + DEFAULT_DAYS*86400; 
        $end_date = date("m/d/y",$temp);

        $options['start_date'] = $start_date;
        $options['end_date'] = $end_date;
        try{

            // API call to obtain information on blasts, passing in the options array.
            $response = $sailthruClient->getBlasts($options);

            /*  If the response from the API contains no value for blasts, there is nothing to display.
                Send a message to the front end and return. */
            if (count($response['blasts']) == 0){
                $results = array();
                echo 'Nothing to Display';
                $this->set('blasts',$results);
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
                
                //Create an array of blast results to be accessed by the View.
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
                //echo '<ul class="campaign_list" id="in_progress"><li><div class="entry"><div id="nothing-to-display">Nothing to Display</div></div></li></ul>';
                echo 'Nothing to Display';
                $results = array();
                $this->set('blasts',$results);
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
                
                //Create an array of blast results to be accessed by the View.
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
        $this->layout='campaign_table';
        $sailthruClient = new Sailthru_Client(API_KEY, API_SECRET); 
        
        // get post params
        $start_date = $this->request->data('start_date');
        $end_date = $this->request->data('end_date');
        $start_date = ($start_date == NULL ? @date('Y-m-d') : $start_date);
        $end_date = ($end_date == NULL ? @date('Y-m-d') : $end_date);

        $key1 = $this->request->data('selectmenu3');
        $key2 = $this->request->data('selectmenu4');
        $key3 = $this->request->data('selectmenu5');
        $key4 = $this->request->data('selectmenu6');
        $key1 = ($key1 == NULL ? 'count' : $key1);
        $key2 = ($key2 == NULL ? 'click_total' : $key2);
        $key3 = ($key3 == NULL ? 'estopens' : $key3);
        $key4 = ($key4 == NULL ? 'pv' : $key4);

        $key1_values = array();
        $key2_values = array();
        $key3_values = array();
        $key4_values = array();

        $dates_array = array();

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
            array_push($dates_array, "$current_date");
                try {
                    $response = $sailthruClient->stats_blast(null, $current_date, $current_date, $options);
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
                } catch(Sailthru_Client_Exception $e) {
                    array_push($key1_values, 0);
                    array_push($key2_values, 0);
                    array_push($key3_values, 0);
                    array_push($key4_values, 0);
                }
            $current_datetime = @strtotime('+1 day', $current_datetime);
        } while($current_datetime < $last_datetime);

        $seriesData = array(
                        array(
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
                        ),
                        array(
                            $dates_array
                        )
                      );
        $this->set('seriesData', $seriesData);
        $this->render('trends_graph');
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
    *      page - the page to request information for.
    *  @return
    *      Returns a table of the information requested in html form.
    */
    public function reports_recent_campaigns(){
        $sailthruClient = new Sailthru_Client(API_KEY, API_SECRET);  
        
        // If both start and end date are not set, set to default values.
        if ($this->params['pass'][0] == 'null' && $this->params['pass'][1] == 'null'){
            $end_date = date("m/d/y");
            $temp = strtotime($end_date) - DEFAULT_DAYS*86400; // 86400 = seconds in a day
            $start_date = date("m/d/y",$temp);

        // If start is not set, default it to 7 days prior to end date.
        } else if ($this->params['pass'][0] == 'null'){
            $temp = strtotime($this->params['pass'][1]);
            $end_date = date("m/d/y",$temp);

            $temp = strtotime($end_date) - DEFAULT_DAYS*86400;
            $start_date = date("m/d/y",$temp);

        // If end date is not set, default it to 7 days after the start date.
        } else if ($this->params['pass'][1] == 'null'){
            $temp = strtotime($this->params['pass'][0]);
            $start_date = date("m/d/y",$temp);

            $temp = strtotime($start_date) + DEFAULT_DAYS*86400; 
            $end_date = date("m/d/y",$temp);
        // Else, both days are set.  Format them for the API call.
        } else {
            $temp = strtotime($this->params['pass'][0]);
            $start_date = date("m/d/y",$temp);

            $temp = strtotime($this->params['pass'][1]);
            $end_date = date("m/d/y",$temp);
        }

        //str_replace("-","/",$end_date);
        //str_replace("-","/",$start_date);

        // Check if parameters for the first statistics is set.  Default to "Clicks".
        if($this->params['pass'][3] == 'null'){
            $stat_1 = 'click';
        } else {
            $stat_1 = $this->params['pass'][3];
        }

        // Check if parameters for the second statistics is set.  Default to "Est. Opens".
        if($this->params['pass'][4] == 'null'){
            $stat_2 = 'estopens';
        } else {
            $stat_2 = $this->params['pass'][4];
        }

        // If the set start date is not before the end date chronologically, return with an error message.
        if(strtotime($start_date) > strtotime($end_date)){
            echo 'Invalid date range.';
            $this->autoLayout = $this->autoRender = false; 
            return;
        }

        //Prepare array of options to be passed into the API call.
        $options['start_date'] = $start_date;
        $options['end_date'] = $end_date;
        $options['status'] = 'sent';

        // If list is specified, add it to the options array. 
        if ($this->params['pass'][2] != 'null'){
            $options['list'] = $this->params['pass'][2];
        }
        
        try{
            //Retrieve the blast id via API call.
            $response = $sailthruClient->getBlasts($options);
            $results = $response['blasts'];

            // Calculate the number pages by dividing the total blasts by the results per page constant.
            $total_count = count($results);
            $pages = ceil($total_count/RESULTS_PER_PAGE);  
           
            // Get the page requested from the URL of this request.
            if ($this->params['pass'][5] == 'null'){
                $page = 1;
            } else {
                $page = $this->params['pass'][5];
            }
            $start = ($page - 1 )*RESULTS_PER_PAGE;
            $end = $page*RESULTS_PER_PAGE;

            if (!isset($response['error']) ) {

                // Prepare option array for secondary API call.
                $data['beacon_times'] = 1;
                $data['click_times'] = 1;
                $data['engagement'] = 1;

                $toReturn = array();

                // For each of the blasts on the current page
                for ($i = $start; $i < $end; $i++){
                    if(array_key_exists($i, $results)){


                        $toReturn[$i]['name'] = $results[$i]['name'];
                        $toReturn[$i]['blast_id'] = $results[$i]['blast_id'];
                        $toReturn[$i]['list'] = $results[$i]['list'];

                        //Make the secondary API call to retrieve the stats specified by the $stats_1 and $stats_2 parameters 
                        $blast_stats = $sailthruClient->stats_blast($results[$i]['blast_id'],null,null,$data);
                        $toReturn[$i]['stat_1'] = isset($blast_stats[$stat_1]) ? $blast_stats[$stat_1] : 0;
                        $toReturn[$i]['stat_2'] = isset($blast_stats[$stat_2]) ? $blast_stats[$stat_2] : 0;
                    }
                }

                if(count($toReturn) == 0){
                    echo "Nothing to Display.";
                }

               //set variables and render view.
                $test = ($start_date);
                $test2 = ($end_date);
                $this->set('test',$test);
                $this->set('test2',$test2);
                $this->set('page',$page);
                $this->set('pages',$pages);
                $this->set('results',array_reverse($toReturn));
                $this->layout = 'campaign_table';               //this layout simply echos the content of the View.
                $this->render('reports_recent_campaigns');
            } else {
                echo 'error';
            }
        } catch (Sailthru_Client_Exception $e) {
            echo $e->getMessage();
        }   
    }
        
}
