<div class="row">  

    <div class="col-sm-8 col-sm-offset-2">

        <h2>Connectez vous</h2>
        <?php echo render('_alertes'); ?>

        <?php echo Form::open(array("action"=>"connexion","class"=>"form","autocomplete"=>"off")); ?>

            <?php if (isset($_GET['destination'])): ?>
                <?php echo Form::hidden('destination',$_GET['destination']); ?>
                <?php echo $_GET['destination']; ?>
            <?php endif; ?>
                    
                    <div class="form-group  margin-bottom-20 <?php echo ($val->error('username')) ? 'has-error' : ''; ?>">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <?php echo Form::input('username', Input::post('username'), array(
                            'placeholder'=>'Identifiant ou adresse email',  
                            'class'=>'form-control input-lg', 
                            'required'));
                            ?>
                        </div>
                        <span class="help-block">
                        <?php if ($val->error('username')): ?>
                            <?php echo $val->error('username')->get_message(); ?>
                        <?php endif; ?>
                        </span>
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
                        <span class="help-block">
                            <?php if ($val->error('password')): ?>
                                <?php echo $val->error('password')->get_message(); ?>
                            <?php endif; ?>
                        </span>
                    </div>                    

                    <div class="row">
                        <div class="col-md-6">                     
                        </div>
                        <div class="col-md-6">
                            <?php echo Form::submit('submit', 'CONNEXION', array('class' => 'btn btn-primary btn-lg pull-right')); ?>                     
                        </div>
                    </div>

        <?php echo Form::close(); ?>     

        <hr />
        <h4>Identifiants perdu ?</h4>
        <p><b><a href="identifiants-perdus">Identifiants perdus</a></b></p>
        <br />      
    
    </div>

</div>