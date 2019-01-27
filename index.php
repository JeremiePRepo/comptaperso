<?php

require_once 'classes/DataBase.class.php';

$objetBDD = DataBase::connection();




$resultat = $objetBDD->faireUneRequetePrepare();

foreach ($resultat as $value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
}