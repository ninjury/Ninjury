<ul class="campaign_list" id="scheduled">
    <?php foreach ($blasts as $blast){ ?>
        <li>
            <div class="entry">
                <div class="description">
                    <div>
                        <a class="name" href = "ajax/campaigns/preview/<?php echo($blast['blast_id']); ?>" data-rel = "dialog" ><?php echo($blast['name']); ?></a>
                    </div>
                    <div class="inline">
                        <div class="list"><?php echo($blast['list']); ?></div>
                        <div class="float_right"><?php echo(@date('m/d/y h:i a',@strtotime($blast['schedule_time']))); ?></div>
                    </div>
                </div>
                <div class="buttons">
                    <a class="delete_button" onclick="campaigns_delete(<?php echo($blast['blast_id'] . ',');?>'<?php echo ($blast['name']); ?>',<?php echo ($page); ?>,'<?php echo ('scheduled');?>')" href="#" data-rel = "dialog">X</a>
                </div>
            </div>
        </li>
    <?php } ?>
<!-- d.width(d.parent().width()-d.next().width()-6); -->
</ul>
<table class="table" id="scheduled">
    <tr><th class="name" >Name</th><th class="list" >List</th><th class="date">Scheduled</th></tr>
    <?php foreach ($blasts as $blast){ ?>
        <tr>
        <td class="name"><a href = "ajax/campaigns/preview/<?php echo($blast['blast_id']); ?>" data-rel = "dialog" ><?php echo($blast['name']); ?></a></td>
        <td class="list"><?php echo($blast['list']); ?></td>
        <td class="date"><?php echo(@date('m/d/y h:i a',@strtotime($blast['schedule_time']))); ?></td>
        <td class="buttons">
            <a href="#" onclick="campaigns_delete(<?php echo($blast['blast_id'] . ',');?>'<?php echo ($blast['name']); ?>',<?php echo ($page); ?>,'<?php echo ('scheduled');?>')" data-rel = "dialog">X</a>
        </td>
        </tr>
    <?php } ?>
</table>
<p>
	<?php echo $this->element('campaign_pagination_scheduled', array('pages' => $pages)); ?>
</p>
