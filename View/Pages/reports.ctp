<div data-role="collapsible-set" data-theme="a" data-content-theme="a">
    <div data-role="collapsible" data-collapsed="false">
        <h3>
            Visualizer
        </h3>
        <div data-role="fieldcontain" id="graph-dates">
            <fieldset data-role="controlgroup">
                <input id="textinput5" placeholder="Start" value="" type="date" data-role="datebox" data-options='{"mode": "calbox"}'/>
            </fieldset>
            <fieldset data-role="controlgroup">
                <input id="textinput6" placeholder="End" value="" type="date" data-role="datebox" data-options='{"mode": "calbox"}'/>
            </fieldset>
        </div>
        <div id="highchartcontainer" style="width: 100%; height: 90%">
        </div>
        <div data-role="fieldcontain" class="graph-options" data-theme="a" data-content-theme="a">
			
            <div id="graph-options1">
			<form action="#" method="GET">
				<select name="selectmenu3" id="selectmenu3">
					<option value="option1">
						Open %
					</option>
					<option value="">
						Option
					</option>
				</select>
			</form>
	    </div>
            <div id="graph-options2">
				<select name="selectmenu4" id="selectmenu4">
					<option value="option1">
						PV/M %
					</option>
				</select>
			</div>
            <div id="graph-options3">
				<select name="selectmenu5" id="selectmenu5">
					<option value="option1">
						Clicks
					</option>
				</select>
			</div>
            <div id="graph-options4">
				<select name="selectmenu6" id="selectmenu6">
					<option value="option1">
						Bounce %
					</option>
				</select>
			</div>
        </div>
    </div>
    <div data-role="collapsible" data-collapsed="true" class="recent-campaigns">
        <h3>
            Recent Campaigns
        </h3>
        <div data-role="fieldcontain" class="list-template">
            <div id="recent-campaigns-list">
				<select name="selectmenu1" id="selectmenu1">
					<option value="list1">
						List
					</option>
					<option value="list2">
						List1
					</option>
					<option value="list3">
						List3
					</option>
				</select>
            </div>
            <div id="recent-campaigns-templates">
				<select name="selectmenu2" id="selectmenu2">
					<option value="template1">
						Template
					</option>
					<option value="template2">
						Template1
					</option>
					<option value="template3">
						Template2
					</option>
				</select>
			</div>
        </div>
        <div data-role="fieldcontain" id="graph-dates">
            <fieldset data-role="controlgroup">
                <input id="textinput7" placeholder="Start" value="" type="date" data-role="datebox" data-options='{"mode": "calbox"}'/>
            </fieldset>
            <fieldset data-role="controlgroup">
                <input id="textinput8" placeholder="End" value="" type="date" data-role="datebox" data-options='{"mode": "calbox"}'/>
            </fieldset>
        </div>
        <div class="ui-grid-b" id="recent-campaigns-grid">
        	<div id="grid-top" >
				<div class="ui-block-a cell" id="recent-campaigns-grid-campaigns">
					<h5>
						Campaigns
					</h5>
				</div>
				<form action = "#" method = "post" >

					<div data-role="fieldcontain" class="ui-field-contain ui-block-b" id="recent-campaigns-grid-open" >
						<select name="selectmenu1" >
							<option value="option1">
								Open%
							</option>
							<option value="list2">
								Clicks
							</option>
							<option value="list3">
								PV/M
							</option>
						</select>
					</div>
					<div data-role="fieldcontain" class="ui-block-c" id="recent-campaigns-grid-clicks" >
						<select name="selectmenu1" >
							<option value="option1">
								Clicks
							</option>
							<option value="list2">
								PV/M
							</option>
							<option value="list3">
								Bounce %
							</option>
						</select>
					</div>
				</form>
			</div>
            <div id="cell-top">
				<div class="ui-block-a cell" >
					<h4>
						Total
					</h4>
				</div>
				<div class="ui-block-b cell" >
					<h4>
						25%
					</h4>
				</div>
				<div class="ui-block-c cell">
					<h4>
						124
					</h4>
				</div>
			</div>
            <div class="ui-block-a cell">
                    <a href="#" data-transition="fade">
                        JuneNew..
                    </a>
            </div>
            <div class="ui-block-b cell" >
                <h4>
                    11%
                </h4>
            </div>
            <div class="ui-block-c cell" >
                <h4>
                    32
                </h4>
            </div>
            <div class="ui-block-a cell">
                    <a href="#" data-transition="fade">
                        Special pro..
                    </a>
            </div>
            <div class="ui-block-b cell" >
                <h4>
                    05%
                </h4>
            </div>
            <div class="ui-block-c cell">
                <h4>
                    11
                </h4>
            </div>
            <div class="ui-block-a cell" >
                    <a href="#" data-transition="fade" >
                        New Cust..
                    </a>
            </div>
            <div class="ui-block-b cell" >
                <h4>
                    03%
                </h4>
            </div>
            <div class="ui-block-c cell" >
                <h4>
                    17
                </h4>
            </div>
        </div>
        <script type="text/javascript">

        	function test(){
	        	var loadUrl = "/mobile/ajax/reports/recent_campaigns/";
				$.get(loadUrl, function(result){
	   				alert(result);
	  			});
			}
        </script>
        <a data-role="button" data-transition="fade" href="#page1" onclick="test()">
            See More
        </a>
    </div>
</div>
