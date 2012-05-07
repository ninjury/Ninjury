<!-- <div class="ui-grid-b" id="recent-campaigns-grid"> -->
<table>
<?php foreach ($results as $blast){ ?>
    <tr>
        <td class="name"><a href="/mobile/ajax/campaigns/preview/<?php echo($blast['blast_id']); ?>"><?php echo ($blast['name']); ?></a></td>
        <td class="stat_1"><?php echo ($blast['stat_1']); ?></td>
        <td class="stat_2"><?php echo ($blast['stat_2']); ?></td>
    </tr>
        <!-- <div class="ui-block-a cell"><a href="/mobile/ajax/campaigns/preview/<?php echo($blast['blast_id']); ?>"><?php echo ($blast['name']); ?></a></div>
        <div class="ui-block-b cell"><?php echo ($blast['stat_1']); ?></div>
        <div class="ui-block-c cell"><?php echo ($blast['stat_2']); ?></div> -->
<?php } ?>
</table>
<!-- </div> -->
<?php echo $this->element('reports_pagination_recent_campaigns'); ?>