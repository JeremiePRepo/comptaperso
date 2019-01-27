<?php

/*----------------------------------------*\
    Tout ce qui concerne le dialogue avec 
    la base de données

    La classe est en singleton, il faut 
    utiliser la méthode de classe 
    connexion pour instancier un 
    unique objet DataBase

    Pour faire une requête : 
    $resultat = 
    DataBase::connect()->request();

    Pour instancier un objet, puis faire 
    une requête :
    $objetBDD = DataBase::connect();
    $resultat = $objetBDD->request();
\*----------------------------------------*/

/*\
 | -------------------------------------
 | Global Constants Includes
 | -------------------------------------
\*/

include_once './inc/params.inc.php';

class DataBase
{

    /*\
     | -------------------------------------
     | Attributs
     | -------------------------------------
    \*/

    private static $dataBaseInstance = null;    // Object DataBase
    private $connection;                        // Object PDO

    /*\
     | -------------------------------------
     | Méthodes
     | -------------------------------------
    \*/

    private function __construct()  // En private car singleton
    {
        try 
        {
            $this->connection = new PDO(DB_TYPE     . 
                                        ':host='    . DB_HOST . 
                                        ';dbname='  . DB_NAME . 
                                        ';charset=' . DB_CHAR, 
                                        DB_USER, 
                                        DB_PASS);
        }
        catch (PDOException $error)
        {
            echo DB_ERROR_MESSAGE . $error;
        }
    }

    public static function connect() : DataBase
    {
        if(!self::$dataBaseInstance)                // Si Il n'existe pas déjà de connexion
        {
            self::$dataBaseInstance = new DataBase; // On se connecte par la méthode __construct
        }
        return self::$dataBaseInstance; 
    }

    public function request() : array
    {
        $this->SQLPrepare = $this->connection->prepare('SELECT * FROM user');
        if($this->SQLPrepare)
        {
            if($this->SQLPrepare->execute())
            {
                return $this->SQLPrepare->fetchAll();
            }
            else
            {
                // Erreur d'execution
                // TODO : renvoyer une erreur sous forme d'array
            }
        }
        else
        {
            // Erreur de préparation
            // TODO : renvoyer une erreur sous forme d'array
        }
    }
}