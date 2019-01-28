<?php

/*----------------------------------------*\
    Website Infos
\*----------------------------------------*/

define ('SITE_LANG', 'fr');
define ('SITE_STYLES', array(   '<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">',
                                '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css" type="text/css">',
                                '<link rel="stylesheet" href="https://unpkg.com/sakura.css/css/sakura-dark.css" type="text/css">',
                                '<link rel="stylesheet" href="vue/css/style.css" type="text/css">'));

/*----------------------------------------*\
    Pages Infos
\*----------------------------------------*/

define ('HOMEPAGE_TITLE', 'Site cochon');

/*----------------------------------------*\
    DB infos
\*----------------------------------------*/

// Informations de connexion
define ('DB_TYPE', 'mysql');
define ('DB_HOST', 'localhost');
define ('DB_NAME', 'comptaperso.local');
define ('DB_CHAR', 'UTF8');
define ('DB_USER', 'root');
define ('DB_PASS', 'cool1705');

// Messages d'erreur
define ('DB_CONNECTION_ERROR_MESSAGE',  'Erreur de connexion : ');
define ('DB_PREPARATION_ERROR_MESSAGE', 'Erreur dans la préparation de la requête SQL');
define ('DB_EXECUTION_ERROR_MESSAGE',   'Erreur dans l\'éxécution de la requête SQL');