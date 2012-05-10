<ul class="campaign_list" id="in_progress">
    <?php if empty($blasts){ ?>
    <p>Nothing to Display</p>
    <?php } else { foreach ($blasts as $blast){ ?>
        <li>
            <div class="entry">
                <div class="description">
                    <div class="name">
                        <a href = "/mobile/ajax/campaigns/preview/<?php echo($blast['blast_id']); ?>" data-rel = "dialog" ><?php echo($blast['name']); ?></a>
                    </div>
                    <div class="inline info">
                        <div class="list"><?php echo($blast['list']); ?></div>
                        <div class="float_right"><?php echo(@date('m/d/y h:i a',@strtotime($blast['schedule_time']))); ?></div>
                    </div>
                </div>
                <div class="buttons">
                    <a class="delete_button" onclick="campaigns_delete(<?php echo($blast['blast_id'] . ',');?>'<?php echo ($blast['name']); ?>',<?php echo ($page); ?>,'<?php echo ('in_progress');?>')" href="#" data-rel = "dialog">X</a>
                </div>
            </div>
        </li>
    <?php }} ?>
</ul>
<?php echo $this->element('campaign_pagination_in_progress'); ?>
