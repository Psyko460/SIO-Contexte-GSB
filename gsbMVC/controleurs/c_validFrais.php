<?php
    include("vues/v_sommaire.php");
    $mois = getMois(date("d:m:Y"));
    $action = $_REQUEST['action'];
    
    switch($action)
    {
        case 'selectVisitor':
        {
            $lesVisiteurs = $pdo->getLesVisiteurs();
            //$etatFicheFrais = $pdo->getEtatFicheFrais($idVisiteur, $leMois);
            include("vues/v_listeVisiteurs.php");
            break;
        }
        case 'checkFrais':
        {
            $idVisiteur = $_REQUEST['currentVisitor'];
            $lesVisiteurs = $pdo->getLesVisiteurs();
            include("vues/v_listeVisiteurs.php");
            $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur,$mois);
            $lesFraisForfait= $pdo->getLesFraisForfait($idVisiteur,$mois);
            $lesFichesFrais = $pdo->getLesInfosfichefrais($idVisiteur, $mois);
            include("vues/v_validationFrais.php");
            break;
        }
        case 'confirmerValidationFrais':
        {
            break;
        }
    }
?>
