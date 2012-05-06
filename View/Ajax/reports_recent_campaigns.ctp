<?php foreach ($results as $blast){ ?>
    <div class="ui-grid-b" id="recent-campaigns-grid">
        <div class="ui-block-a cell"><h4>Total</h4></div>
        <div class="ui-block-b cell"><h4>25%</h4></div>
        <div class="ui-block-c cell"><h4>124</h4></div>
    </div>
<?php } ?>
<?php echo $this->element('reports_pagination_recent_campaigns'); ?>