<table class="table" id="sent">
    <tr><th class="name" >Name</th><th class="list" >List</th><th class="date">Sent</th></tr>
    <?php foreach $blasts as $blast ?>
        <tr>
        <td class="name"><a href = "ajax/campaigns/preview/<?php echo($blast['blast_id']); ?>" data-rel = "dialog" ><?php echo($blast['name']); ?></a></td>
        <td class="list"><?php echo($blast['list']); ?></td>
        <td class="date"><?php echo(@date('m/d/y h:i a',@strtotime($blast['start_time']))); ?></td>
        <td class="buttons"><a href="ajax/campaigns/stats/<?php echo($blast['blast_id']);?>" data-rel = "dialog">I</a></td>
        </tr>
    <?php end foreach ?>
</table>
<p>
	<?php echo $this->element('campaign_pagination_sent', array('pages' => $pages)); ?>
</p>