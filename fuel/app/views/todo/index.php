
	<!--  Formulaire d'ajout -->
	<br />
	<?php echo Form::open(array("class" => "form")); ?>
		<div class="form-group">
			<div class="controls">
		        <div class="input-group">
		            <input type="texte" class="form-control input-lg" name="texte" id="input_ajouter_todo" placeholder="AJOUTER UNE TÂCHE" />
		            <span class="input-group-btn">
		            	<button type="button" class="btn btn-primary btn-border-radius-right btn-lg" onclick="ajouter_todo(texte.value)">
		            	AJOUTER
		            	</button>
		            </span>
		            <small class="text-danger"></small>
		        </div>
		    </div>
		</div>
	<?php echo Form::close(); ?>

	<!--  Todos -->
	<?php if (isset($todos)): ?>
	    <?php include_once('_todos.php'); ?>
	<?php endif; ?>

	<!--  Infos -->
	<br />
		<?php if(!$user): ?>
			<p>
			Pour gérer votre propre liste, <a href="inscription">inscrivez vous</a><br />
			C'est gratuit.
			</p>
		<?php endif; ?>
		<?php if($user): ?>
			<p>
			Ceci est votre propre liste.<br />
			Seul vous y avez accés.
			</p>
		<?php endif; ?>
	<br />