    <!-- header -->
    <div class="row header">
            
        <div class="col-sm-6">
            <h1><a href="<?php echo Uri::Base(); ?>">todo</a></h1>
        </div>

        <div class="col-sm-6">
            <div class="header_acces padding">
                <?php if(!$user): ?>
                    <a href="connexion" class="btn btn-success btn-sm">SE CONNECTER</a>
                    <a href="inscription" class="btn btn-danger btn-sm">S'INSCRIRE</a>
                <?php endif; ?>
                <?php if($user): ?>
                    <span class="username"><?php echo $user->username; ?>
                    <a href="deconnexion" class="deconnexion"><i class="fa fa-power-off fa-3x deconnexion"></i></a>
                    </span>
                <?php endif; ?> 
            </div>         
        </div>

    </div>
    <!-- /header -->
