<?php

/*----------------------------------------*\
    Un mouvement peut être un débit où un 
    crédit.

    Ses attributs :
    - une date opé ou le mouvement à été 
    fait;
    - un date compta, où le mouvement est 
    effectué sur le comtpe;
    - un montant, en centimes, positif ou 
    négatif;
    - Une provenance, compte exterieure ou 
    self;
    - Un destinataire, compte extérieure 
    ou self.
    - Une récurrence : unique, tous les 
    jours, toutes les semaines, tous les 
    mois, tous les ans.
    - Une catégorie;
    - Des tags
\*----------------------------------------*/

// TODO : Repenser la classe : problème entre la date du mouvement et lé récurre.
// Solution : Créer une classe Récurrence des mouvemlents ?