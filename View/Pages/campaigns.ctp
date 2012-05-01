 <div data-role="page" id="campaigns_page" data-theme="a">
            <?php echo $this->element('header', array('page' => 'campaigns')); ?>
            <div data-role="content">
                <div id="collapsible__scheduled" onclick="campaigns_scheduled()" data-role="collapsible-set" data-theme="a" data-content-theme="a">
                    <div data-role="collapsible">
                        <h3>
                            Scheduled
                        </h3>
                        <p>
                            <div id="campaigns_scheduled">
                            </div> 
                        </p>
                        </div>
                    </div>
                </div>
                <div id="collapsible_in_progress" onclick="campaigns_in_progress()" data-role="collapsible-set" data-theme="a" data-content-theme="a">
                    <div data-role="collapsible" data-collapsed="true">
                        <h3>
                            In Progress
                        </h3>
                        <p>
                            <div id="campaigns_in_progress">
                            </div>    
                        </p>
                        </div>
                    </div>
                </div>
                <div id="collapsible_sent" onclick="campaigns_sent()" data-role="collapsible-set" data-theme="a" data-content-theme="a">
                    <div data-role="collapsible" data-collapsed="true">
                        <h3>
                            Sent
                        </h3>
                        <p>
                            <div id="campaigns_sent">
                            </div>
                        </p> 
                        <!-- 
                        <div class="page_numbers">
                            <p>
                            </p>
                        </div>
                        -->
                    </div>
                </div>
            </div>
            <?php echo $this->element('footer'); ?>
        </div>
