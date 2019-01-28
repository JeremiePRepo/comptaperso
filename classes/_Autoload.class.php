<?php

/*----------------------------------------*\
    Cette classe se charge d'inclure tous
    les fichiers du dossier 'classes'.

    Conventions de nommage des fichiers
    pour être chargés automatiquement :
    - se terminer par '.class.php'
    - ne pas commencer par un '_'
    - ne pas commencer par un '.'

    La classe utilise le patron de
    conception singleton.

    Utiliser l'autoload :
    require_once 
    'classes/_Autoload.class.php';
    Autoload::loadClasses();
\*----------------------------------------*/

class Autoload
{

    /*\
     | -------------------------------------
     | Attributs
     | -------------------------------------
    \*/

    const CLASSES_NAMING_RULES = '/^[A-Z]+[A-Za-z]*\.class\.php$/'; // [Une ou plusieurs lettre majuscule][0 ou + lettres].class.php
    private static $autoloadInstance = null;                        // Object Autoload

    /*\
     | -------------------------------------
     | Méthodes
     | -------------------------------------
    \*/

    private function __construct()                      // En private car singleton
    {
        $this->fileNames = scandir(dirname(__FILE__));  // On scan les noms des fichiers dans le dossier courrant

        foreach ($this->fileNames as $this->filename)   // On parcours les noms de fichiers
        {
            if (filter_var($this->filename,
                FILTER_VALIDATE_REGEXP,
                array('options' => array('regexp' => self::CLASSES_NAMING_RULES)))) // On vérifie que les noms respectent la nomenclature
            {
                require_once dirname(__FILE__) . '/' . $this->filename;             // On charge les fichiers trouvés
            }
        }
    }

    public static function loadClasses() : Autoload
    {
        if (!self::$autoloadInstance)               // Si Il n'existe pas déjà de connexion
        {
            self::$autoloadInstance = new Autoload; // On instancie par la méthode __construct
        }
        return self::$autoloadInstance;
    }
}
