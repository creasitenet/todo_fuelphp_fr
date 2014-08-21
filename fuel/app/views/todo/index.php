<br />
    <!--  Formulaire d'ajout -->
    <?php echo Form::open(array("action" => 'todo/ajouter')); ?>
		<div class="form-group">
			<div class="controls">
	        <div class="input-group">
	            <input type="texte" class="form-control input-lg" name="texte" id="input_ajouter_todo" placeholder="AJOUTER UNE TÂCHE" />
	            <span class="input-group-btn">
	            <?php //echo Form::submit('submit', 'AJOUTER', array('type'=>'button', 'class'=>'btn btn-green btn-lg', 'onclick'=>"ajouter_element('todo/ajax_ajouter',texte.value,'#todos')")); ?>
	            <button type="button" class="btn btn-green btn-lg" onclick="ajouter_todo(texte.value)">AJOUTER</button>
	            </span>
	            <small class="text-danger"></small>
	        </div>
	        </div>
	    </div>
    <?php echo Form::close(); ?>

<br />
<?php //print_r($todos); ?>
<?php if (isset($todos)): ?>
    <?php include_once('_todos.php'); ?>
<?php endif; ?>
<br />

<?php if ($user) { ?>
<br />
<p class="center"><a href="deconnexion" class=""><i class="fa fa-power-off fa-3x deconnexion"></i></a></p>
<?php } ?>
<?php if (!$user) { ?>
<p class="centered">Pour gérer votre propre liste, <a href="inscription" class="">inscrivez vous</a></p>
<?php } ?>