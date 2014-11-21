<?php
return array(
	'_root_'  => 'todo/index',  // The default route
	'_404_'   => 'erreurs/404',    // The main 404 route
	
    // Acces
    'acces' => 'acces',
    'acces/(:any)' => 'acces/$1',
    'connexion' => 'acces/connexion',
    'identifiants-perdus' => 'acces/identifiants_perdus',
    'inscription' => 'acces/inscription',
    'deconnexion' => 'acces/deconnexion',

    // Admin
    'admin' => 'admin',
    'admin/(:segment)/(:num)' => 'admin/$1/index/$2', // Pagination de l'admin
    'admin/(:any)' => 'admin/$1',
    
     // Email
    'email' => 'email',
    'email/(:any)' => 'email/$1',

);