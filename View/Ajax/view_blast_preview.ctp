<div data-role="dialog" data-theme="a" id="preview dialog" onclick="$(this).dialog('close');">
	<div data-role="header" id="preview_dialog_header">
		<div class="close">
			<a id="close-dialog" href="#" data-rel="back"> X </a>
		</div>
		<center>
			<p style="font-size: 2em; margin: 0; margin-bottom: 10px;">Preview for <?php echo('"' . $name . '"'); ?></p>
		</center> 
	</div>
	<div data-role="content">
		<?php echo($view_blast_preview); ?>
	</div>
</div>
