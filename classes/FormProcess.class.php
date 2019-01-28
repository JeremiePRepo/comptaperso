<?php

/*----------------------------------------*\
    Cette classe sert à vérifier si un 
    formulaire à été rempli, et à le 
    traiter.

    Traiter un formulaire à l'extérieur de 
    la classe :
    $formProcesser=FormProcess::process();
    $formProcesser->processLogIn();
\*----------------------------------------*/

class FormProcess
{

    /*\
     | -------------------------------------
     | Attributs
     | -------------------------------------
    \*/

    private static $formProcessInstance = null; // Object FormProcess
    
    /*\
     | -------------------------------------
     | Méthodes
     | -------------------------------------
    \*/

    private function construct()
    {

    }

    /*-------------------------------------*/

    public function process() : FormProcess
    {
        if(!self::$formProcessInstance)                     // Si Il n'existe pas déjà d'instance
        {
            self::$formProcessInstance = new FormProcess;   // On instancie par la méthode __construct
        }
        return self::$formProcessInstance;
    }

    /*-------------------------------------*/

    public function processLogIn() //: bool
    {
        if (filter_has_var(INPUT_POST , 'email') AND 
            filter_has_var(INPUT_POST , 'password'))   // Le formulaire a-t-il été remplis ?
        {
            $this->user = DataBase::connect()->fetchUserByEmail($_POST['email'], $_POST['password']);

            echo '<pre>';
            var_dump($this->user);
            echo '</pre>';
        }
        else
        {
            return false;
        }
    }

    /*-------------------------------------*/

    public function processSignUp() //: bool
    {
        if (filter_has_var(INPUT_POST , 'signup-name') AND 
            filter_has_var(INPUT_POST , 'signup-email') AND
            filter_has_var(INPUT_POST , 'signup-password-1') AND
            filter_has_var(INPUT_POST , 'signup-password-2'))   // Le formulaire a-t-il été remplis ?
        {
            // Vérifier l'intégrité du mail

            // vérifier la correspondance des MDP

            // Envoyer les données en BDD
        }
        else
        {
            return false;
        }
    }

}