<!DOCTYPE html>
<!-- Creasitenet -->
<!-- Edouard Boissel -->
<!-- Réalisation de sites internet -->

<!-- 
/***********************************/
Auteur du site : Creasitenet 
URL : http://www.creasitenet.com
Contact: creasitenet@creasitenet.com
/***********************************/
-->

<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <title>Todo</title>
    <link rel="icon" type="image/ico" href="<?php Uri::base(); ?>assets/img/favicon.ico" />
    <link rel="shortcut icon" type="image/ico" href="<?php Uri::base(); ?>assets/img/favicon.ico" />
    <base href="<?php echo Uri::base(); ?>" />

    <!-- CSS -->        
        <!-- Bootstrap // Variante slate --> 
        <?php echo Asset::css('bootstrap/css/bootstrap.css'); ?>

        <!-- Google Font -->
        <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
       
        <!-- Plugins css  -->
        <?php echo Asset::css('font-awesome/css/font-awesome.min.css'); ?>
        <?php echo Asset::css('growl/jquery.growl.css'); ?>

        <!-- Customs  -->
        <?php echo Asset::css('main.css'); ?>
        <?php echo Asset::css('switch.css'); ?>

        <!-- Js -->
        <?php echo Asset::js('jquery/jquery-2.1.1.min.js'); ?>
     
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

</head>
<body>

    <!-- CONTAINER -->
    <div id="container">
        <?php echo render('_header'); ?>
        <!-- Container -->
        <div class="container">  
            <?php echo $content; ?>
        </div>
        <!-- // Container -->
        <?php echo render('_footer'); ?>
    </div>
    <!-- // CONTAINER -->
      
    <!-- Preloader -->
    <div class="preloader"> 
        <?php echo Asset::img('preloader.gif'); ?>
    </div>
    
    <!-- Js --> 
    <!-- Bootstrap -->   
    <?php echo Asset::js('bootstrap/js/bootstrap.min.js'); ?>
    <!-- Plugins -->
    <?php echo Asset::js('growl/jquery.growl.js'); ?>
    <!-- Customs --> 
    <?php echo Asset::js('main.js'); ?>

</body> 
</html>
