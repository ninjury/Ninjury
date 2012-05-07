<div class="ui-grid-b" id="recent-campaigns-grid">
<?php foreach ($results as $blast){ ?>
        <div class="ui-block-a cell"><div <a href="/mobile/ajax/campaigns/preview/<?php echo($blast['blast_id']); ?>"><?php echo ($blast['name']); ?></a></div>
        <div class="ui-block-b cell"><?php echo ($blast['stat_1']); ?></div>
        <div class="ui-block-c cell"><?php echo ($blast['stat_2']); ?></div>
<?php } ?>
</div>
<?php echo $this->element('reports_pagination_recent_campaigns'); ?>