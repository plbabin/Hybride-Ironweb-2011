<div id="feed" class="ride">
	<h3 class="fontface">Offres des conducteurs</h3>
	<ul>
		<?php foreach($trackList as $track): ?>
	    <li rel="<?php echo $track['id']; ?>">
			<h4>Ville, nom de la rue</h4>
			<p>Description de la ride.</p>
			<p class="name">Pierre-Luc Babin</p>
			
			<a href="#" class="button embarque <?php if($track['status']!='O' ){echo ' disabled';} ?>">J'embarque</a>
			<?php if($track['status']=='O' ): ?>
			<div class="formContainer">
				<h3 class="fontface">Contacter le conducteur <a href="#" class="close">x</a></h3>
				<form action="" method="post" class="form">
					<div class="grid-12-12">
						<label class="form-lbl">Votre courriel</label>
						<input type="text" name="courriel" value="" class="form-txt" />
					</div>

					<div class="grid-12-12">
						<label class="form-lbl">Votre message</label>
						<textarea name="message" class="form-txt"></textarea>
					</div>
					
					<a href="#" class="button send">Envoyer</a>
				</form>
			</div>
			<?php endif; ?>
		</li>
		<?php endforeach; ?>
	</ul>
</div>
