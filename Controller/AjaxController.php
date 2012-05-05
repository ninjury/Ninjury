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

                $html = '<table class="table" id="sent"><tr><th class="name" >Name</th>
                            <th class="list" >List</th><th class="date">Sent</th></tr>';

                foreach ($results as $blast){
                    $html .= '<tr><td class="name"><a href = "ajax/campaigns/preview/' . $blast['blast_id'] . '" data-rel = "dialog" >' . $blast['name'] . '</a></td>' .
                                '<td class="list">' . $blast['list'] . '</td>' .
                                    '<td class="date">' . @date('m/d/y h:i a',@strtotime($blast['start_time'])) .'</td>' .
                                        '<td class="buttons"><a href="ajax/campaigns/stats/' . $blast['blast_id'] . '" data-rel = "dialog">I</a></td>';
                }
                $html .= '</table><p><div class="page_numbers">';

                for ($i = 1; $i<=$pages; $i++){
                    if ($i != $page){
                        $html .= '<a href="#" onclick="campaigns_sent(' . $i .')" class="ui-link" >' . $i .'</a>';
                    } else {
                        $html .=  $i;
                    }
                }

                $html .= '</div></p>';

                //echo $html;
                $blast_type = 'sent';
                $this->set('blast_type',$blast_type);
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

                $html = '<table class="table" id="scheduled"><tr><th class="name" >Name</th>
                            <th class="list" >List</th><th class="date">Scheduled</th></tr>';

                foreach ($results as $blast){
                    $html .= '<tr><td class="name"><a href = "ajax/campaigns/preview/' . $blast['blast_id'] . '" data-rel = "dialog" >' . $blast['name'] . '</a></td>' .
                                '<td class="list">' . $blast['list'] . '</td>' .
                                    '<td class="date">' . @date('m/d/y h:i a',@strtotime($blast['schedule_time'])) . '</td>' .
                                        '<td class="buttons"><a href="#">X</a></td>';
                }
                $html .= '</table><p><div class="page_numbers">';

                for ($i = 1; $i<=$pages; $i++){
                                        if ($i != $page){
                                            $html .= '<a href="#" onclick="campaigns_scheduled(' . $i .')" class="ui-link" >' . $i .'</a>';
                                        } else {
                                            $html .=  $i;
                                        }
                                }

                $html .= '</div></p>';
                //echo $html;
                $blast_type = 'scheduled';
                $this->set('blast_type',$blast_type);
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

                $html = '<table class="table" id="in_progress"><tr><th class="name" >Name</th>
                            <th class="list" >List</th><th class="date">In Progress</th></tr>';

                foreach ($results as $blast){
                    $html .= '<tr><td class="name" ><a href = "ajax/campaigns/preview/' . $blast['blast_id'] . '" data-rel = "dialog" >' . $blast['name'] . '</a></td>' .
                                '<td class="list">' . $blast['list'] . '</td>' .
                                    '<td class="date">' . @date('m/d/y h:i a',@strtotime($blast['schedule_time'])) . '</td>' .
                                        '<td class="buttons"><a href="view_campaign.ctp">X</a></td>';
                }
                $html .= '</table><p><div class="page_numbers">';

                for ($i = 1; $i<=$pages; $i++){
                    if ($i != $page){
                        $html .= '<a href="#" onclick="campaigns_in_progress(' . $i .')" class="ui-link" >' . $i .'</a>';
                    } else {
                        $html .=  $i;
                    }
                }
                $html .= '</div></p>';
                //echo $html;
                $blast_type = 'in_progress';
                $this->set('blast_type',$blast_type);
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
                	$response = $sailthruClient->stats_blast($blast_id); //associative array with everything i need
                	if(isset($response['count'])){
                		$num_users = $response['count'];
                	}
                	else{
                		$num_users = 'unknown';
                	}
                	if(isset($response['estopens'])){
                		$est_open_rate = $response['estopens'];
                	}
                	else{
                		$est_open_rate = 'unknown';
                	}
                    if(isset($reponse['click'])){
                    	$click = $reponse['click'];
                    }
                    else{
                    	$click = 'unknown';
                    }
                    if(isset($response['rev'])){
                    	$revenue_in_cents = $response['rev'];
                    }
                    else{
                    	$revenue_in_cents = 'unknown';
    				}
    				
    				$this->set('num_users', $num_users);
    				$this->set('est_open_rate', $est_open_rate);
    				$this->set('click', $click);
    				$this->set('revenue_in_cents', $revenue_in_cents);
    				
    				$this->layout = 'popup_template';

    				$html = $response['content_html'];
					$this->set('view_blast_preview', $html);
			
					$this->layout = 'preview_blast_template';
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
        
}