<?php

/*----------------------------------------*\
    Dernière classe instanciée, le patron 
    de conception sera le singleton.

    L'affichage sera généré dans le 
    destructeur.

    Pour instancier l'onbjet, et afficher 
    automatiquement la page Web :
    WebPage::display();
\*----------------------------------------*/

class WebPage
{

    /*\
     | -------------------------------------
     | Attributs
     | -------------------------------------
    \*/

    private static $webPageInstance = null;         // Object WebPage
    
    /*\
     | -------------------------------------
     | Méthodes
     | -------------------------------------
    \*/

    private function __construct()                  // En private car singleton
    {
    }

    public static function display() : WebPage
    {
        if(!self::$webPageInstance)                 // Si Il n'existe pas déjà de connexion
        {
            self::$webPageInstance = new WebPage;   // On instancie par la méthode __construct
        }
        return self::$webPageInstance; 
    }

    public function __destruct()
    {
        echo 'Au revoir';
    }
}