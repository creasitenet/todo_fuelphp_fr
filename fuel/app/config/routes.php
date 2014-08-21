<?php
return array(
	'_root_'  => 'todo/index',  // The default route
	'_404_'   => 'erreurs/404',    // The main 404 route
	
    // Acces
    'acces' => 'acces',
    'acces/(:any)' => 'acces/$1',
    'connexion' => 'acces/connexion',
    'identifiants_perdus' => 'acces/identifiants_perdus',
    'inscription' => 'acces/inscription',
    'deconnexion' => 'acces/deconnexion',

     // Email
    'email' => 'email',
    'email/(:any)' => 'email/$1',

);