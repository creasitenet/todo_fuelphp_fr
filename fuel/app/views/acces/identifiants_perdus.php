    <div class="container content">   
      <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">

                <?php echo Form::open(); ?>

                    <div class="reg-header">            
                        <h2>Identifiants perdus</h2>
                    </div>
 
                    <div class="alert alert-info alert-bold-border fade in alert-dismissable">
                      Un email avec un nouveau mot de passe vous sera envoyé.
                    </div>

					<?php echo render('_alertes'); ?>

                    <div class="form-group  margin-bottom-20 <?php echo ($val->error('username')) ? 'has-error' : ''; ?>">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <?php echo Form::input('username', Input::post('username'), array('class'=>'form-control input-lg', 'placeholder'=>'Identifiant ou email')); ?>
    					</div>	  
                        <?php if ($val->error('username')): ?>
							<span class="help-block"><?php echo $val->error('username')->get_message(); ?></span>
						 <?php endif; ?>
                    </div>                  

                    <div class="row">
                        <div class="col-md-6">
                                                    
                        </div>
                        <div class="col-md-6">
                            <?php echo Form::submit('submit', 'RECUPERER', array('class' => 'btn btn-green btn-lg btn-bold radius pull-right')); ?>
                        </div>
                    </div>

                    <hr>

                    <h4>Souvenu ?</h4>
                    <p><a class="color-green" href="connexion">Se connecter</a></p>

                <?php echo Form::close(); ?>           
            </div>
        </div><!--/row-->
    </div><!--/container-->   