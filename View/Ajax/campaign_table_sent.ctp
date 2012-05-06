<ul class="campaign_list" id="sent">
    <?php foreach ($blasts as $blast){ ?>
        <li>
            <div class="entry">
                <div class="description">
                    <div class="name">
                        <a href = "ajax/campaigns/preview/<?php echo($blast['blast_id']); ?>" data-rel = "dialog" ><?php echo($blast['name']); ?></a>
                    </div>
                    <div class="inline info">
                        <div class="list"><?php echo($blast['list']); ?></div>
                        <div class="float_right"><?php echo(@date('m/d/y h:i a',@strtotime($blast['schedule_time']))); ?></div>
                    </div>
                </div>
                <div class="buttons">
                    <a class="delete_button" href="ajax/campaigns/stats/<?php echo($blast['blast_id']);?>" data-rel = "dialog">I</a>
                </div>
            </div>
        </li>
    <?php } ?>
</ul>
<p>
	<?php echo $this->element('campaign_pagination_scheduled', array('pages' => $pages)); ?>
</p>
