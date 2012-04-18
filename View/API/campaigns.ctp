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
                            1 <a href="#">2</a> <a href="#">3</a> <a href="#">4</a>
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
                            1 <a href="#">2</a> <a href="#">3</a> <a href="#">4</a>
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
                            <td class="name"><a href="#">Blast5</a></td>
                            <td class="list"><a href="#">Group Members</a></td>
                            <td class="date">3/20/12 12:00</td>
                            </tr>
                            </table>
                        </p>
                        <div class="page_numbers">
                            <p>
                            <?php echo $send_pages; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo $this->element('footer'); ?>
        </div>
