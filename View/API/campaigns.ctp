 	<div data-role="page" id="campaigns_page" data-theme="a">
            <?php echo $this->element('header', array('page' => 'campaigns')); ?>
            <div id="page_content" data-role="content">
                <div data-role="collapsible-set" data-theme="a" data-content-theme="a">
                    <div data-role="collapsible">
                        <h3 id="collapsible__scheduled" onclick="campaigns_scheduled()">
                            Scheduled
                        </h3>
                        <p>
                            <div id="campaigns_scheduled">
                            </div> 
                        </p>
                    </div>
                </div>
                <div data-role="collapsible-set" data-theme="a" data-content-theme="a">
                    <div data-role="collapsible" data-collapsed="true">
                        <h3 id="collapsible_in_progress" onclick="campaigns_in_progress()">
                            In Progress
                        </h3>
                        <p>
                            <div id="campaigns_in_progress">
                            </div>    
                        </p>
                    </div>
                </div>
                <div data-role="collapsible-set" data-theme="a" data-content-theme="a">
                    <div data-role="collapsible" data-collapsed="true">
                        <h3>
                            <div id="collapsible_sent" onclick="campaigns_sent()">
                            Sent
                            </div>
                        </h3>
                        <p>
                            <div id="campaigns_sent">
                            </div>
                        </p> 
                    </div>
                </div>
            </div>
            <?php echo $this->element('footer'); ?>
        </div>
