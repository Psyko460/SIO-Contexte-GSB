<?php
    include("vues/v_sommaireComptable.php");
    $mois = getMois(date("d-m-Y"));
    $action = $_REQUEST['action'];

    switch($action)
    {
        case 'selectFicheFrais':
        {
            $lesVisiteurs = $pdo->getLesVisiteurs();
            include("vues/v_listeFichesFrais.php");
            break;
        }
        case 'fraisDetails':
        {
            $idVisiteur = $_REQUEST['currentVisitor'];
            setSelectedVisitor($idVisiteur);
            $lesVisiteurs = $pdo->getLesVisiteurs();
            include("vues/v_listeFichesFrais.php");

            if (!$pdo->hasValidatedOrInPaymentCard($idVisiteur, $mois))
            {
                $infos = $pdo->getLesInfosfichefrais($idVisiteur, $mois);
                $lesFraisForfait= $pdo->getLesFraisForfait($idVisiteur, $mois);
                $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $mois);
                include("vues/v_detailsFicheVisiteur.php");
            }
            else
            {
                ajouterErreur("Pas de fiche de frais validée au minimum pour ce visiteur durant ce mois.");
                include("vues/v_erreurs.php");
            }
            break;
        }
        case 'updateFicheStatus':
        {
            $actionButton = $_POST['action_button'];

            if ($actionButton == 'Mettre en paiement')
            {
                $etat = 'PA';
            }
            else if ($actionButton == 'Rembourser')
            {
                $etat = 'RB';
            }

            $idVisiteur = $_SESSION['currentVisitor'];
            $pdo->majEtatfichefrais($idVisiteur, $mois, $etat);

            $lesVisiteurs = $pdo->getLesVisiteurs();
            include("vues/v_listeFichesFrais.php");
            $infos = $pdo->getLesInfosfichefrais($idVisiteur, $mois);
            $lesFraisForfait= $pdo->getLesFraisForfait($idVisiteur, $mois);
            $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $mois);
            include("vues/v_detailsFicheVisiteur.php");
            break;
        }
    }
?>
