<div class="row">  

    <div class="col-sm-8 col-sm-offset-2">
         
        <h2>Inscrivez vous</h2>
        <?php echo render('_alertes'); ?>

        <?php echo Form::open(array("action"=>"inscription","class"=>"form","autocomplete"=>"off")); ?>

                    <div id="FieldUsername" class="form-group  margin-bottom-20 <?php echo ($val->error('username')) ? 'has-error' : ''; ?>">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <?php echo Form::input('username', Input::post('username'), array(
                            'placeholder'=>'Identifiant',  
                            'class'=>'form-control input-lg', 
                            'required'));
                            ?>
                        </div>
                        <span class="help-block" id="ResUsername">
                        <?php if ($val->error('username')): ?>
                            <?php echo $val->error('username')->get_message(); ?>
                        <?php endif; ?>
                        </span>
                    </div>       
                                 
                    <div id="FieldPassword" class="form-group  margin-bottom-20 <?php echo ($val->error('password')) ? 'has-error' : ''; ?>">
                        <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <?php echo Form::password('password', null, array(
                        'placeholder'=>'Mot de passe', 
                        'class'=>'form-control input-lg', 
                        'required'));
                        ?>
                        </div>
                        <span class="help-block" id="ResPassword">
                            <?php if ($val->error('password')): ?>
                                <?php echo $val->error('password')->get_message(); ?>
                            <?php endif; ?>
                        </span>
                    </div>                    
    
                    <div id="FieldEmail" class="form-group  margin-bottom-20 <?php echo ($val->error('email')) ? 'has-error' : ''; ?>">
                        <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                        <?php echo Form::input('email', null, array(
                        'placeholder'=>'Adresse email valide', 
                        'class'=>'form-control input-lg', 
                        'required'));
                        ?>
                        </div>                         
                        <span class="help-block" id="ResEmail">
                        <?php if ($val->error('email')): ?>
                            <?php echo $val->error('email')->get_message(); ?>
                        <?php endif; ?>
                        </span>
                    </div>                    

                    <div class="row">
                        <div class="col-md-6">                     
                        </div>
                        <div class="col-md-6">
                            <?php echo Form::submit('submit', 'INSCRIPTION', array('class' => 'btn btn-primary btn-lg pull-right')); ?>                     
                        </div>
                    </div>

        <?php echo Form::close(); ?> 

        <hr />
        <h4>Déjà membre ?</h4>
        <p><b><a href="connexion">Se connecter</a></b></p>
        <br />

    </div>

</div>