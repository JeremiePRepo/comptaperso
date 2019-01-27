<?php

/*----------------------------------------*\
    Un compte regroupe l'ensemble des 
    opérations liés àa ce compte.

    Ses attributes :
    - un sole initial, en centime, positif 
    ou négatif;
    - Un solde positif où négatif, en 
    centimes, qui est la somme de tous ses 
    mouvements;
    - un user, le compte utilisateru lié;
    - Nom (ex: "Compte principal", "Livret")
\*----------------------------------------*/

class Account
{
    
    /*\
     | -------------------------------------
     | Attributs
     | -------------------------------------
    \*/

    private $initialBalance;    //int
    private $actualBalance;     //int
    private $userId;            //int
}
