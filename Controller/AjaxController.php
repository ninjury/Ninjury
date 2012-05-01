<?php

include("/home/cake/mobile/scripts/sailthru-api/sailthru/Sailthru_Client_Exception.php");
include("/home/cake/mobile/scripts/sailthru-api/sailthru/Sailthru_Client.php");
include("/home/cake/mobile/scripts/sailthru-api/sailthru/Sailthru_Util.php");

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
                    $html .= '<tr><td class="name">' . $blast['name'] . '</td>' .
                                '<td class="list">' . $blast['list'] . '</td>' .
                                    '<td class="date">' . @date('m/d/y h:i a',@strtotime($blast['start_time'])) .'</td>' .
                                        '<td class="buttons" href="#" >I</td></tr>';
                }
                $html .= '</table>';

                for ($i = 1; $i<=$pages; $i++){
                                        if ($i != $page){
                                            $html .= '<a href="#" onclick="campaigns_sent(' . $i .')" class="ui-link" >' . $i .'</a>';
                                        } else {
                                            $html .=  $i;
                                        }
                                }

                echo $html;
                $this->autoLayout = $this->autoRender = false; 
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
                            <th class="list" >List</th><th class="date">Scheduled</th></tr>';

                foreach ($results as $blast){
                    $html .= '<tr><td class="name">' . $blast['name'] . '</td>' .
                                '<td class="list">' . $blast['list'] . '</td>' .
                                    '<td class="date">' . @date('m/d/y h:i a',@strtotime($blast['schedule_time'])) . '</td>' .
                                        '<td class="buttons" href="#" >X</td></tr>';
                }
                $html .= '</table>';

                for ($i = 1; $i<=$pages; $i++){
                                        if ($i != $page){
                                            $html .= '<a href="#" onclick="campaigns_scheduled(' . $i .')" class="ui-link" >' . $i .'</a>';
                                        } else {
                                            $html .=  $i;
                                        }
                                }

                echo $html;
                $this->autoLayout = $this->autoRender = false; 
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
                            <th class="list" >List</th><th class="date">Scheduled</th></tr>';

                foreach ($results as $blast){
                    $html .= '<tr><td class="name">' . $blast['name'] . '</td>' .
                                '<td class="list">' . $blast['list'] . '</td>' .
                                    '<td class="date">' . @date('m/d/y h:i a',@strtotime($blast['schedule_time'])) . '</td>' .
                                        '<td class="buttons" href="#" >X</td></tr>';
                }
                $html .= '</table>';

                for ($i = 1; $i<=$pages; $i++){
                                        if ($i != $page){
                                            $html .= '<a href="#" onclick="campaigns_in_progress(' . $i .')" class="ui-link" >' . $i .'</a>';
                                        } else {
                                            $html .=  $i;
                                        }
                                }

                echo $html;
                $this->autoLayout = $this->autoRender = false; 
            } else {
                echo 'error';
            }
        } catch (Sailthru_Client_Exception $e) {
            echo 'exception';
        }      
    }
}