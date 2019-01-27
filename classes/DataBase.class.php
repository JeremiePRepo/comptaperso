<?php

/*----------------------------------------*\
    Tout ce qui concerne le dialogue avec 
    la base de données

    La classe est en singleton, il faut 
    utiliser la méthode de classe 
    connexion pour instancier un 
    unique objet DataBase
\*----------------------------------------*/


/*\
 | Global Constants Includes
\*/

include_once '../inc/params.inc.php';


class DataBase
{

    /*\
     | Attributs
    \*/

    const DB_ADDRESSE = 'mysql:host=localhost;dbname=comptaperso.local;charset=UTF8';
    
    private static $dataBaseInstance = null;    // Object DataBase
    private $connection;                        // Object PDO
    private $requete = 'SELECT * FROM user';    // String


    /*\
     | Méthodes
    \*/

    public static function connection() : DataBase
    {
        if(!self::$dataBaseInstance)                // Si Il n'existe pas déjà de connexion
        {
            self::$dataBaseInstance = new DataBase; // On se connecte par la méthode __construct
        }
        return self::$dataBaseInstance; 
    }

    private function __construct()
    {
        try 
        {
            $this->connection = new PDO(self::DB_ADDRESSE, 'root', 'cool1705');
            echo 'Je suis connecté à la BDD<br>';
        }
        catch (PDOException $uneErreur)
        {
            echo 'Erreur de connexion : ' . $uneErreur;
        }
    }

    public function faireUneRequetePrepare()
    {
        $this->SQLPrepare = $this->connection->prepare($this->requete);
        if($this->SQLPrepare)
        {
            if($this->SQLPrepare->execute())
            {
                $this->result = $this->SQLPrepare->fetchAll();
                return $this->result;
            }
            else
            {
                // Erreur d'execution
            }
        }
        else
        {
            // Erreur de préparation
        }
    }
}