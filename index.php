<?php

// On charge toutes les classes
require_once 'classes/_Autoload.class.php';
Autoload::loadClasses();

session_start();

// On traite les formulaires
$formProcesser = FormProcess::process();
$formProcesser->processLogIn();
$formProcesser->processSignUp();

// On affiche la page
WebPage::display();
