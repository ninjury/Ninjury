        <div data-role="page" id="campaigns_page" data-theme="a">
            <?php echo $this->element('header', array('page' => 'campaigns')); ?>
            <div id="page_content" data-role="content">
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
                            <tr>
                            <td class="name"><a href="#">Blast1</a></td>
                            <td class="list"><a href="#">Group Members</a></td>
                            <td class="date">3/20/12 12:00</td>
                            <td class="buttons"><a href="#">X</a></td>
                            </tr>
                            <tr class="alt">
                            <td class="name"><a href="#">Blast2</a></td>
                            <td class="list"><a href="#">Group Members</a></td>
                            <td class="date">3/20/12 12:00</td>
                            <td class="buttons"><a href="#">X</a></td>
                            </tr>
                            <tr>
                            <td class="name"><a href="#">Blast3</a></td>
                            <td class="list"><a href="#">Group Members</a></td>
                            <td class="date">3/20/12 12:00</td>
                            <td class="buttons"><a href="#">X</a></td>
                            </tr>
                            <tr class="alt">
                            <td class="name"><a href="#">Blast4</a></td>
                            <td class="list"><a href="#">Group Members</a></td>
                            <td class="date">3/20/12 12:00</td>
                            <td class="buttons"><a href="#">X</a></td>
                            </tr>
                            <tr>
                            <td class="name"><a href="#">Blast5</a></td>
                            <td class="list"><a href="#">Group Members</a></td>
                            <td class="date">3/20/12 12:00</td>
                            <td class="buttons"><a href="#">X</a></td>
                            </tr>
                            </tr>
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
                            <tr>
                            <td class="name"><a href="#">Blast1</a></td>
                            <td class="list"><a href="#">Group Members</a></td>
                            <td class="date">3/20/12 12:00</td>
                            <td class="buttons"><a href="#">X</a></td>
                            </tr>
                            <tr class="alt">
                           <td class="name"><a href="#">Blast2</a></td>
                            <td class="list"><a href="#">Group Members</a></td>
                            <td class="date">3/20/12 12:00</td>
                            <td class="buttons"><a href="#">X</a></td>
                            </tr>
                            <tr>
                            <td class="name"><a href="#">Blast3</a></td>
                            <td class="list"><a href="#">Group Members</a></td>
                            <td class="date">3/20/12 12:00</td>
                            <td class="buttons"><a href="#">X</a></td>
                            </tr>
                            <tr class="alt">
                            <td class="name"><a href="#">Blast4</a></td>
                            <td class="list"><a href="#">Group Members</a></td>
                            <td class="date">3/20/12 12:00</td>
                            <td class="buttons"><a href="#">X</a></td>
                            </tr>
                            <tr>
                           <td class="name"><a href="#">Blast5</a></td>
                            <td class="list"><a href="#">Group Members</a></td>
                            <td class="date">3/20/12 12:00</td>
                            <td class="buttons"><a href="#">X</a></td>
                            </tr>
                            </tr>
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
                            Unscheduled
                        </h3>
                        <p>
                            <table class="table" id="sent">
                            <tr>
                              <th class="name" >Name</th>
                              <th class="list" >List</th>
                              <th class="date">Sent</th>
                            </tr>
                            <tr>
                            <td class="name"><a href="#">Blast1</a></td>
                            <td class="list"><a href="#">Group Members</a></td>
                            <td class="date">3/20/12 12:00</td>
                            </tr>
                            <tr class="alt">
                            <td class="name"><a href="#">Blast2</a></td>
                            <td class="list"><a href="#">Group Members</a></td>
                            <td class="date">3/20/12 12:00</td>
                            </tr>
                            <tr>
                            <td class="name"><a href="#">Blast3</a></td>
                            <td class="list"><a href="#">Group Members</a></td>
                            <td class="date">3/20/12 12:00</td>
                            </tr>
                            <tr class="alt">
                           <td class="name"><a href="#">Blast4</a></td>
                            <td class="list"><a href="#">Group Members</a></td>
                            <td class="date">3/20/12 12:00</td>
                            </tr>
                            <tr>
                            <td class="name"><a href="#">Blast5</a></td>
                            <td class="list"><a href="#">Group Members</a></td>
                            <td class="date">3/20/12 12:00</td>
                            </tr>
                            </tr>
                            </table>
                        </p>
                        <div class="page_numbers">
                            <p>
                            1 <a href="#">2</a> <a href="#">3</a> <a href="#">4</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <?php echo $this->element('footer'); ?>
        </div>
