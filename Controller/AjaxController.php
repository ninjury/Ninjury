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
    
    private $api_key = "8907ecf0f40ee82bc3e58c1df91ceba0";
    private $api_secret = '75cf7511cb55c4e0692d525ce55aaf5a';
    
    /**
    
    
 * Displays a view
 *
 * @param mixed What page to display
 */
	public function campaigns_sent() {

        $sailthruClient = new Sailthru_Client($api_key, $api_secret);    
        echo 'hello!';
        
        $options['status'] = 'sent';
        try{
            $response = $sailthruClient->getBlasts($options);
            if (!isset($response['error']) ) {
                $total_count = count($response['blasts']);
                $pages = ceil($total_count/RESULTS_PER_PAGE);  
               
                $page = isset($this->params['pass'][1]) ? $this->params['pass'][1] : 1;
                echo $this->params['pass'][1];
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
                                    '<td class="date">' . @date('m/d/y h:i a',@strtotime($blast['start_time'])) . '</td></tr>';
                }
                $html .= '</table>';

                for ($i = 1; $i<=$pages; $i++){
                                        if ($i != $sent_page){
                                            $html .= '<a href="#" onclick="campaigns_sent(' . $i .')">' . $i .'</a>';
                                        } else {
                                            $html .=  $i;
                                        }
                                }

                echo $html;

                //$this->set('sent_blasts',$results);
                //$this->set('sent_pages',$pages);
                //$this->set('sent_page',$page);
            } else {
                echo 'error';
            }
        } catch (Sailthru_Client_Exception $e) {
            echo 'exception';
        }      
    }
}