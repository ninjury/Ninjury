 <div data-role="page" id="campaigns_page" data-theme="a">
            <?php echo $this->element('header', array('page' => 'campaigns')); ?>
            <div data-role="content">
                <div id="collapsible__scheduled" onclick="campaigns_scheduled()" data-role="collapsible-set" data-theme="a" data-content-theme="a">
                    <div data-role="collapsible">
                        <h3>
                            Scheduled
                        </h3>
                        <p>
                            <table class="table" id="scheduled">
                            <tr>
                              <th class="name" >Name</th>
                              <th class="list" >List</th>
                              <th class="date">Scheduled</th>
                            </tr>
                            <?php foreach ($scheduled_blasts as $blast): ?>
                            <tr>
                            <td class="name" id = <?php echo($blast['blast_id']); ?>><a href="#"><?php echo $blast['name']; ?></a></td>
                            <td class="list">
                            <?php echo $blast['list']; ?>
                            </td>
                            <td class="date"><?php echo @date('m/d/y h:i a',@strtotime($blast['schedule_time'])); ?></td>
                            <td class="buttons"><a href="#">X</a></td>
                            </tr>
                            <?php endforeach; ?>
                            </table>
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
<<<<<<< HEAD
                            <?php if($in_progress_pages != 0){ ?>
                                <table class="table" id="in_progress" >
                                <tr>
                                  <th class="name" >Name</th>
                                  <th class="list" >List</th>
                                  <th class="date">Sent</th>
                                </tr>
                                <?php foreach ($in_progress_blasts as $blast): ?>
                                <tr>
                                <td class="name" class="blast_name_link"><a href="#"><?php echo $blast['name']; ?></a></td>
                           <td class="list">
                                <?php echo $blast['list']; ?>
                                </td>
                                <td class="date"><?php echo @date('m/d/y h:i a',@strtotime($blast['schedule_time'])); ?></td>
                                <td class="buttons"><a href="#">X</a></td>
                                </tr>
                                <?php endforeach; ?>
                                </table>
                            <?php } else { ?>
                                <p>Nothing to Display.</p>    
                            <?php } ?>
                            
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
                            <table class="table" id="sent">
                            <tr>
                              <th class="name" >Name</th>
                              <th class="list" >List</th>
                              <th class="date">Sent</th>
                            </tr>
                            <?php foreach ($sent_blasts as $blast): ?>
                            <tr>
                            <td class="name" class="blast_name_link"><a href="#"><?php echo $blast['name']; ?></a></td>
                           <td class="list">
                            <?php echo $blast['list']; ?>
                            </td>
                            <td class="date"><?php echo @date('m/d/y h:i a',@strtotime($blast['start_time'])); ?></td>
                            </tr>
                            <?php endforeach; ?>
                            </table>
                        </p>
                            <div id="campaigns_sent">
                            </div>
                        </p> 
                        <div class="page_numbers">
                            <p>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo $this->element('footer'); ?>
        </div>
