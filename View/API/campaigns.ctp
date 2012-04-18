 <div data-role="page" id="campaigns_page" data-theme="a">
            <?php echo $this->element('header', array('page' => 'campaigns')); ?>
            <div data-role="content">
                <div data-role="collapsible-set" data-theme="a" data-content-theme="a">
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
                            <td class="name"><?php echo $blast['name']; ?></td>
                            <td class="list">
                            <?php echo $blast['list']; ?>
                            </td class="date">
                            <td><?php echo $blast['schedule_time']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                            </table>
                        </p>
                        <div class="page_numbers">
                            <p>
                            <?php 
                                for ($i = 1; $i<=$scheduled_pages; $i++){
                                        if ($i != $scheduled_page){
                                            $url = '/campaigns/' . $i . '/' . $in_progress_page . '/' . $sent_page;
                                            echo $this->Html->link($i,$url,array('data-ajax' => 'false'));
                                        } else {
                                            echo $i;
                                        }
                                }
                            ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div data-role="collapsible-set" data-theme="a" data-content-theme="a">
                    <div data-role="collapsible" data-collapsed="true">
                        <h3>
                            In Progress
                        </h3>
                        <p>
                           <table class="table" id="in_progress" >
                            <tr>
                              <th class="name" >Name</th>
                              <th class="list" >List</th>
                              <th class="date">Sent</th>
                            </tr>
                            <?php foreach ($in_progress_blasts as $blast): ?>
                            <tr>
                            <td class="name"><?php echo $blast['name']; ?></td>
                            <td class="list">
                            <?php echo $blast['list']; ?>
                            </td class="date">
                            <td><?php echo $blast['schedule_time']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                            </table>
                        </p>
                        <div class="page_numbers">
                            <p>
                            <?php 
                                for ($i = 1; $i<=$in_progress_pages; $i++){
                                        if ($i != $in_progress_page){
                                            $url = '/campaigns/' . $scheduled_page . '/'. $i .'/' . $sent_page;
                                            echo $this->Html->link($i,$url,array('data-ajax' => 'false'));
                                        } else {
                                            echo $i;
                                        }
                                }
                            ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div data-role="collapsible-set" data-theme="a" data-content-theme="a">
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
                            <td class="name"><?php echo $blast['name']; ?></td>
                            <td class="list">
                            <?php echo $blast['list']; ?>
                            </td class="date">
                            <td><?php echo $blast['start_time']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                            </table>
                        </p>
                        <div class="page_numbers">
                            <p>
                            <?php 
                                for ($i = 1; $i<=$sent_pages; $i++){
                                        if ($i != $sent_page){
                                            $url = '/campaigns/' . $scheduled_page . '/' . $in_progress_page .'/' . $i;
                                            echo $this->Html->link($i,$url,array('data-ajax' => 'false'));
                                        } else {
                                            echo $i;
                                        }
                                }
                            ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo $this->element('footer'); ?>
        </div>
