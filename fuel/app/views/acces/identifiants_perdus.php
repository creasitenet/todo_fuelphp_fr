<div class="row">  

    <div class="col-sm-8 col-sm-offset-2">

        <h2>Identifiants perdus</h2>
        
        <div class="alert alert-info alert-bold-border fade in alert-dismissable">
            Un email avec un nouveau mot de passe vous sera envoyé.
        </div>


        <?php echo Form::open(array("action"=>"identifiants-perdus")); ?>
 
                    <div class="form-group  margin-bottom-20 <?php echo ($val->error('username')) ? 'has-error' : ''; ?>">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <?php echo Form::input('username', Input::post('username'), array('class'=>'form-control input-lg', 'placeholder'=>'Identifiant ou email')); ?>
    					</div>	  
                        <span class="help-block">
                            <?php if ($val->error('username')): ?>
    							<?php echo $val->error('username')->get_message(); ?>
    						<?php endif; ?>
                        </span>
                    </div>                  

                    <div class="row">
                        <div class="col-md-6">   
                        </div>
                        <div class="col-md-6">
                            <?php echo Form::submit('submit', 'RECUPERER', array('class' => 'btn btn-primary btn-lg pull-right')); ?>
                        </div>
                    </div>

        <?php echo Form::close(); ?>  

        <hr />
        <h4>Souvenu ?</h4>
        <p><b><a href="connexion">Se connecter</a></b></p>
        <br />

    </div>

</div>
