<!-- <div id="cell-top">
    <div class="ui-block-a cell"><h4>Total</h4></div>
    <div class="ui-block-b cell"><h4>25%</h4></div>
    <div class="ui-block-c cell"><h4>124</h4></div>
</div> -->
<table>
<?php foreach ($results as $blast){ ?>
    <tr>
        <td class="name"><a href="/mobile/ajax/campaigns/preview/<?php echo($blast['blast_id']); ?>"><?php echo ($blast['name']); ?></a></td>
        <td class="stat_1"><?php echo ($blast['stat_1']); ?></td>
        <td class="stat_2"><?php echo ($blast['stat_2']); ?></td>
    </tr>    
<?php } ?>
</table>
<?php echo $this->element('reports_pagination_recent_campaigns'); ?>