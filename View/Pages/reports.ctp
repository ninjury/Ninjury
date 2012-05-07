<div data-role="collapsible-set" data-theme="a" data-content-theme="a">
    <div data-role="collapsible" data-collapsed="false">
        <h3>
            Visualizer
        </h3>
        
		<form id="trends_form" action="ajax/reports/trends" method="POST" onsubmit="aggregate_trends(this); return false;" data-ajax="false">
        <div data-role="fieldcontain" id="graph-dates">
            <fieldset data-role="controlgroup">
                <input id="start_date" name="start_date" placeholder="Start" value="" type="date" data-role="datebox" data-options='{"mode": "calbox"}'/>
            </fieldset>
            <fieldset data-role="controlgroup">
                <input id="end_date" name="end_date" placeholder="End" value="" type="date" data-role="datebox" data-options='{"mode": "calbox"}'/>
            </fieldset>
        </div>
        <div id="highchartcontainer" style="width: 100%; height: 90%">
        </div>
        <div data-role="fieldcontain" class="graph-options" data-theme="a" data-content-theme="a" id="graph_options_container">
        	<div id="graph_options_container_left">
				<div id="graph-options1">
					<select name="selectmenu3" id="selectmenu3">
								<option value = "count">users</option>
								<option value="click_total">clicks</option>
								<option value="spam">spam</option>
								<option value="optout">optouts</option>
								<option value="hardbounce">hardbounces</option>
								<option value = "softbounce">softbounces</option>
								<option value = "rev">revenue</option>
								<option value = "estopens">est. opens</option>
								<option value="pv">pageviews</option>
					</select>
				</div>
				<div id="graph-options2">
					<select name="selectmenu4" id="selectmenu4">
								<option value="click_total">clicks</option>
								<option value = "count">users</option>
								<option value="spam">spam</option>
								<option value="optout">optouts</option>
								<option value="hardbounce">hardbounces</option>
								<option value = "softbounce">softbounces</option>
								<option value = "rev">revenue</option>
								<option value = "estopens">est. opens</option>
								<option value="pv">pageviews</option>
					</select>
				</div>
			</div>
			<div id="graph_options_container_right">
				<div id="graph-options3">
					<select name="selectmenu5" id="selectmenu5">
								<option value = "estopens">est. opens</option>
								<option value="click_total">clicks</option>
								<option value = "count">users</option>
								<option value="spam">spam</option>
								<option value="optout">optouts</option>
								<option value="hardbounce">hardbounces</option>
								<option value = "softbounce">softbounces</option>
								<option value = "rev">revenue</option>
								<option value="pv">pageviews</option>
					</select>
				</div>
				<div id="graph-options4">
					<select name="selectmenu6" id="selectmenu6">
								<option value="pv">pageviews</option>
								<option value = "estopens">est. opens</option>
								<option value="click_total">clicks</option>
								<option value = "count">users</option>
								<option value="spam">spam</option>
								<option value="optout">optouts</option>
								<option value="hardbounce">hardbounces</option>
								<option value = "softbounce">softbounces</option>
								<option value = "rev">revenue</option>
					</select>
				</div>
			</div>
        </div>
        <div id="reset_graph_button" >
			<input type='submit' value='Refresh Graph' data-role = "button">
        </div>
		</form>
    </div>
    <div id="collapsible_recent_campaigns" data-role="collapsible" data-collapsed="true" class="recent-campaigns">
        <h3>
            Recent Campaigns
        </h3>
        <form id = "recent_campaigns_form" onsubmit = "recent_campaigns(1); return false;" data-ajax="false">
        <div data-role="fieldcontain" class="list-template">
            <div id="recent-campaigns-list">
				<select name="selectmenu0" id="selectmenu0">
					<option value="null">All Lists</option>
					<option value="group members">group members</option>
					<option value="Sample List">Sample List</option>
				</select>
            </div>
        </div>
        <div data-role="fieldcontain" id="graph-dates">
            <fieldset data-role="controlgroup">
                <input id="start_date_2" placeholder="Start" value="" type="date" data-role="datebox" data-options='{"mode": "calbox"}'/>
            </fieldset>
            <fieldset data-role="controlgroup">
                <input id="end_date_2" placeholder="End" value="" type="date" data-role="datebox" data-options='{"mode": "calbox"}'/>
            </fieldset>
        </div>
        <div class="ui-grid-b" id="recent-campaigns-header">
        	<div id="grid-top">
				<div class="ui-block-a cell">
					<div id="recent-campaigns-grid-campaigns">Campaigns</div>
				</div>
					<div data-role="fieldcontain" class="ui-field-contain ui-block-b" id="recent-campaigns-grid-open" >
						<select name="selectmenu1" id="selectmenu1">
							<option value="count">Count</option>
							<option value="estopens">Est. Opens</option>
							<option value="click">Clicks</option>
							<option value="pv">Pageviews</option>
							<option value="rev">Revenue</option>
							<option value="softbounce">Softbounce</option>
							<option value="hardbounce">Hardbounce</option>
						</select>
					</div>
					<div data-role="fieldcontain" class="ui-block-c" id="recent-campaigns-grid-clicks" >
						<select name="selectmenu2" id="selectmenu2">
							<option value="count">Count</option>
							<option value="estopens">Est. Opens</option>
							<option value="click">Clicks</option>
							<option value="pv">Pageviews</option>
							<option value="rev">Revenue</option>
							<option value="softbounce">Softbounce</option>
							<option value="hardbounce">Hardbounce</option>
						</select>
					</div>
				</div>
			</div> 
			<div id="recent_campaigns">
			</div>
        <input type='submit' class="reports-refresh-button" value='Refresh' data-role="button">   
        </form>
    </div>
</div>
