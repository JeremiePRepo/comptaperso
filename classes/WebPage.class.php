<?php

/*----------------------------------------*\
    Dernière classe instanciée, le patron 
    de conception sera le singleton.

    L'affichage sera généré dans le 
    destructeur.

    Pour instancier l'onbjet, et afficher 
    automatiquement la page Web :
    WebPage::display();

    Liste des pages :
    /(connection -> page principale)
    /subscribe (-> mon compte)
\*----------------------------------------*/

/*\
 | -------------------------------------
 | Global Constants Includes
 | -------------------------------------
\*/

include_once './inc/params.inc.php';

class WebPage
{

    /*\
     | -------------------------------------
     | Attributs
     | -------------------------------------
    \*/

    private static $webPageInstance = null; // Object WebPage
    private $HTMLStyles = '';               // String
    private $actualPage = 'login';          // String
    
    /*\
     | -------------------------------------
     | Méthodes
     | -------------------------------------
    \*/

    private function __construct()              // En private car singleton
    {
        foreach (SITE_STYLES as $this->style)   // On transforme les scripts et styles en chaine de caractères
        {
            $this->HTMLStyles .= $this->style;
        }
        
        $this->findActualPage();                // Le routeur va déterminer quelle page afficher
    }

    /*-------------------------------------*/

    public static function display() : WebPage
    {
        if(!self::$webPageInstance)                 // Si Il n'existe pas déjà de connexion
        {
            self::$webPageInstance = new WebPage;   // On instancie par la méthode __construct
        }
        return self::$webPageInstance; 
    }

    /*-------------------------------------*/

    private function findActualPage()
    {
        if ($_SESSION['IS_CONNECTED'])              // L'utilisateur est-il connecté ?
        {
        }
        else
        {
            if (filter_has_var(INPUT_GET , 'page')) // Une page est-elle demandée ?
            {
                switch ($_GET['page']) {
                    case 'signup':
                        $this->actualPage = 'signup';
                        break;
                    default:                        // On garde la page par défaut : Login
                        break;
                }
            }
        }
    }

    /*-------------------------------------*/
    
    private function returnContent() : string
    {
        switch ($this->actualPage) 
        {
            case '/':
                return 'Accueil';
            case 'signup':
                return '<form method="post">
                            <fieldset>
                                <legend>Inscription</legend>
                                <input type="text" name="signup-name" placeholder="Nom" required>
                                <input type="email" name="signup-email" placeholder="E-mail" required>
                                <input type="password" name="signup-password-1" placeholder="Mot de passe" required>
                                <input type="password" name="signup-password-2" placeholder="Retapez votre Mot de passe" required>
                                <button type="submit">Valider</button>
                            </fieldset>
                        </form>
                        <a href="./">< Page de connexion</a>';
            default: // Login
                return '<form method="post">
                            <fieldset>
                                <legend>Se connecter</legend>
                                <input type="text" name="email" placeholder="E-mail" required="required" />
                                <input type="password" name="password" placeholder="Mot de passe" required="required" />
                                <div class="form-remember">
                                    <input type="checkbox" name="remember" value="1">
                                    <label for="remember">Se souvenir de moi ?</label>
                                </div>
                                <button type="submit">Se connecter</button>
                            </fieldset>
                        </form>
                        <a href="?page=signup">> Nouvelle inscription</a>';
        }
    }

    /*-------------------------------------*/
    
    public function __destruct()
    {
        // On affiche la page
        echo '  <!DOCTYPE html>
                <html lang="' . SITE_LANG . '">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <meta http-equiv="X-UA-Compatible" content="ie=edge">
                    ' . $this->HTMLStyles . '
                    <title>' . HOMEPAGE_TITLE . ' - ' . ucfirst($this->actualPage) . '</title>
                </head>
                <body>
                    <h1>' . HOMEPAGE_TITLE . '</h1>
                    ' . $this->returnContent() . '
                </body>
                </html>';
    }
}