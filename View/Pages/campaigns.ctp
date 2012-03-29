        <div data-role="page" data-theme="a" id="#campaigns">
            <div data-theme="a" data-role="header" id="page1">              
                <div id="header_panel">
                    <a href="#"><?php echo $this->Html->image('sailthru_logo.png', array('id' => 'header_logo')); ?></a>
                    <div id="header_logout_panel">
                        <a href="#">Logout</a>
                    </div>
                </div>
            </div>
           <div data-role="navbar">
                <ul>
                    <li>
                        <a href="reports" id="reports" data-icon="custom" data-iconpos="top">
                            REPORTS
                        </a>
                    </li>
                    <li>
                        <a href="#" id="campaigns"data-icon="custom" data-iconpos="top" class="ui-btn-active">
                            CAMPAIGNS
                        </a>
                    </li>
                    <li>
                        <a href="#page1" id="contact"data-icon="custom" data-iconpos="top" data-transition="slide">
                            CONTACT
                        </a>
                    </li>
                </ul>
            </div>
            <div data-role="content" >
                <div data-role="collapsible-set" cdata-theme="a" data-content-theme="a">
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
            <!-- <div data-role="footer" data-theme="a">
                <p>
                2012 Sailthru, Inc. All Rights Reserved.
                </p>
                <p>
                770 Broadway, New York, NY 10003 Tel: 877-812-8689
                </p> -->
            </div>
        </div>
        <script>
            //App custom javascript
        </script>
