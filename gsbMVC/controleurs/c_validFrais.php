<?php
    include("vues/v_sommaire.php");
    $mois = getMois(date("d/m/Y"));
    $action = $_REQUEST['action'];

    switch($action)
    {
        case 'validFrais':
        {
            $lesVisiteurs = $pdo->getLesVisiteurs();
            
            $idVisiteur = $_POST['lstVisiteur'];
            $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur,$leMois);
            $lesFraisForfait= $pdo->getLesFraisForfait($idVisiteur,$leMois);
            $lesFichesFrais = $pdo->getLesInfosfichefrais($idVisiteur, $leMois);
            //$etatFicheFrais = $pdo->getEtatFicheFrais($idVisiteur, $leMois);
            include("vues/v_validationFrais.php");
            break;
        }
        case 'confirmerValidationFrais':
        {
            break;
        }
    }

?>
