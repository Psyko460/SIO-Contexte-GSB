<?php
    include("vues/v_sommaireComptable.php");
    $mois = getMois(date("d-m-Y"));
    $action = $_REQUEST['action'];

    switch($action)
    {
        case 'selectVisitor':
        {
            $lesVisiteurs = $pdo->getLesVisiteurs();
            include("vues/v_listeVisiteurs.php");
            break;
        }
        case 'checkFrais':
        {
            $idVisiteur = $_REQUEST['currentVisitor'];
            setSelectedVisitor($idVisiteur);
            $lesVisiteurs = $pdo->getLesVisiteurs();
            include("vues/v_listeVisiteurs.php");

            if (!$pdo->estPremierFraisMois($idVisiteur, $mois))
            {
                $lesFraisForfait= $pdo->getLesFraisForfait($idVisiteur, $mois);
                $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $mois);
                include("vues/v_listeFraisForfaitComptable.php");
                include("vues/v_listeFraisHorsForfaitComptable.php");
            }
            else
            {
                ajouterErreur("Pas de fiche de frais pour ce visiteur durant ce mois.");
                include("vues/v_erreurs.php");
            }
            break;
        }
        case 'updateFicheFrais':
        {
            $lesFrais = $_REQUEST['lesFrais'];
            $idVisiteur = $_SESSION['currentVisitor'];

            $pdo->majFraisForfait($idVisiteur, $mois, $lesFrais);

            $lesVisiteurs = $pdo->getLesVisiteurs();
            include("vues/v_listeVisiteurs.php");
            $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $mois);
            $lesFraisForfait= $pdo->getLesFraisForfait($idVisiteur, $mois);
            include("vues/v_listeFraisForfaitComptable.php");
            include("vues/v_listeFraisHorsForfaitComptable.php");
            break;
        }
        case 'deleteFicheHorsForfait':
        {
            $idLigneHorsForfait = $_GET['ficheIDToDelete'];
            $idVisiteur = $_SESSION['currentVisitor'];
            $nextMonth = getMois(date('d-m-Y', strtotime('+1 month')));

            if ($pdo->estPremierFraisMois($idVisiteur, $nextMonth))
            {
                $pdo->creeNouvellesLignesFrais($idVisiteur, $nextMonth);
            }
            $pdo->majLibelleLigneFraisHorsForfait($idLigneHorsForfait, $nextMonth);

            $lesVisiteurs = $pdo->getLesVisiteurs();
            include("vues/v_listeVisiteurs.php");
            $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $mois);
            $lesFraisForfait= $pdo->getLesFraisForfait($idVisiteur, $mois);
            include("vues/v_listeFraisForfaitComptable.php");
            include("vues/v_listeFraisHorsForfaitComptable.php");
            break;
        }
        case 'finalValidateFiche':
        {
            $idVisiteur = $_SESSION['currentVisitor'];
            $etat = 'VA';
            $montantValide = $_REQUEST['montantValide'];
            $pdo->majEtatfichefrais($idVisiteur, $mois, $etat, $montantValide);

            $lesVisiteurs = $pdo->getLesVisiteurs();
            include("vues/v_listeVisiteurs.php");
            $lesFraisHorsForfait = $pdo->getLesFraisHorsForfait($idVisiteur, $mois);
            $lesFraisForfait= $pdo->getLesFraisForfait($idVisiteur, $mois);
            include("vues/v_listeFraisForfaitComptable.php");
            include("vues/v_listeFraisHorsForfaitComptable.php");
            break;
        }
    }
?>
