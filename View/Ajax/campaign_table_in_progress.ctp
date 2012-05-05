<table class="table" id="in_progress">
    <tr><th class="name" >Name</th><th class="list" >List</th><th class="date">In Progress</th></tr>
    <?php foreach ($blasts as $blast) ?>
        <tr>
        <td class="name"><a href = "ajax/campaigns/preview/<?php echo($blast['blast_id']); ?>" data-rel = "dialog" ><?php echo($blast['name']); ?></a></td>
        <td class="list"><?php echo($blast['list']); ?></td>
        <td class="date"><?php echo(@date('m/d/y h:i a',@strtotime($blast['schedule_time']))); ?></td>
        <td class="buttons"><a href="#" data-rel = "dialog">X</a></td>
        </tr>
    <?php end foreach ?>
</table>
<p>
	<?php echo $this->element('campaign_pagination_in_progress', array('pages' => $pages)); ?>
</p>