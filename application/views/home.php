<div id="feed" class="event">
	<ul>
		<?php foreach($eventsList as $event): ?>
		<li>
	        <h4 class="fontface"><a href="<?php echo Kohana::$base_url; ?>evenement/<?php echo $event['id_event']; ?>"><?php echo $event['description']; ?></a></h4>
	        <p><?php echo $event['date']; ?></p>
	    </li>
	<?php endforeach; ?>
	</ul>
</div>
