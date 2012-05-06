<!-- <div id="cell-top">
    <div class="ui-block-a cell"><h4>Total</h4></div>
    <div class="ui-block-b cell"><h4>25%</h4></div>
    <div class="ui-block-c cell"><h4>124</h4></div>
</div> -->
<?php foreach ($results as $blast){ ?>
    <div class="ui-block-a cell"><h4><a href="/mobile/ajax/campaigns/preview/<?php echo($blast['blast_id']); ?>"><?php echo ($blast['name']); ?></a></h4></div>
    <div class="ui-block-b cell"><h4><?php echo ($blast['stat_1']); ?></h4></div>
    <div class="ui-block-c cell"><h4><?php echo ($blast['stat_2']); ?></h4></div>    
<?php } ?>
<?php echo $this->element('reports_pagination_recent_campaigns'); ?>