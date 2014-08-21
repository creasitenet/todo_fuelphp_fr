
 <!--=== Content Part ===-->
    <div class="container content">   
      <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">

                 <?php echo Form::open(); ?>

                    <div class="reg-header">            
                        <h2>Connectez vous</h2>
                    </div>
                    
                    <?php echo render('_alertes'); ?>

                    <div class="form-group  margin-bottom-20 <?php echo ($val->error('username')) ? 'has-error' : ''; ?>">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <?php echo Form::input('username', Input::post('username'), array(
                            'placeholder'=>'Identifiant ou adresse email',  
                            'class'=>'form-control input-lg', 
                            'required'));
                            ?>
                        </div>
                        <?php if ($val->error('username')): ?>
                        <span class="help-block"><?php echo $val->error('username')->get_message(); ?></span>
                        <?php endif; ?>
                    </div>       
                                 
                    <div class="form-group  margin-bottom-20 <?php echo ($val->error('password')) ? 'has-error' : ''; ?>">
                        <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <?php echo Form::password('password', null, array(
                        'placeholder'=>'Mot de passe', 
                        'class'=>'form-control input-lg', 
                        'required'));
                        ?>
                        </div>
                        <?php if ($val->error('password')): ?>
                        <span class="help-block"><?php echo $val->error('password')->get_message(); ?></span>
                        <?php endif; ?>
                    </div>                    

                    <div class="row">
                        <div class="col-md-6">                     
                        </div>
                        <div class="col-md-6">
                            <?php echo Form::submit('submit', 'CONNEXION', array('class' => 'btn btn-green btn-lg btn-bold radius pull-right')); ?>                     
                        </div>
                    </div>

                    <hr>

                    <h4>Identifiants perdu ?</h4>
                    <p><a class="color-green" href="identifiants_perdus">Identifiants perdus</a></p>

                <?php echo Form::close(); ?>           
            </div>
        </div><!--/row-->
    </div><!--/container-->   
    <!--=== End Content Part ===-->
