
    <!-- Menu -->
    <nav class="menu" id="theMenu">
        <div class="menu-wrap">
            <h1 class="logo"><a href="<?php echo Uri::Base(); ?>">to do</a></h1>
            <i class="fa fa-arrow-right menu-close"></i>
            <a href="<?php echo Uri::Base(); ?>">Accueil</a>       
            <?php if (!$user): ?>
            <a href="inscription">S'inscrire</a>
            <a href="connexion">Se connecter</a>
            <?php endif; ?>
            <?php if ($user): ?>
            <a href="deconnexion">Se déconnecter</a>
            <?php endif; ?>
            <a href="https://creasitenet.com/" target="_blank">Creasitenet.com</a>      

            <a href="http://facebook.com/creasitenet" target="_blank"><i class="fa fa-facebook"></i></a>
            <a href="http://twitter.com/creasitenet" target="_blank"><i class="fa fa-twitter"></i></a>
            <a href="http://plus.google.com/+creasitenet" target="_blank"><i class="fa fa-google-plus"></i></a>
            <a href="http://pinterest.com/creasitenet" target="_blank"><i class="fa fa-pinterest"></i></a>
            <a href="https://github.com/creasitenet" target="_blank"><i class="fa fa-github"></i></a>
        </div>
        
        <!-- Menu button -->
        <div id="menuToggle"><i class="fa fa-bars"></i></div>
    </nav>
    
    <!-- MAIN IMAGE SECTION -->
    <div id="headerwrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <h1>to do</h1>
                    <h2>
                    <?php if ($user) { ?>
                        <?php echo $user->username; ?>
                    <?php } else { ?>
                        d'urgence
                    <?php } ?>
                    </h2>
                    <div class="spacer"></div>
                    <i class="fa fa-angle-down"></i>
                </div>
            </div><!-- row -->
        </div><!-- /container -->
    </div><!-- /headerwrap -->