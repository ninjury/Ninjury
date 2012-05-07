<p>
    <div class="page_numbers">
        <?php for($i = 1; $i<=$pages; $i++){ ?>
        <?php if ($i != $page){ ?>
            <a href="#" onclick="recent_campaigns(<?php echo($i);?>)" class="ui-link" ><?php echo($i);?></a>
        <?php } else { echo($i); }}?>
    </div>
</p>