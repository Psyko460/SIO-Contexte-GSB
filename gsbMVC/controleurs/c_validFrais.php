<?php
    include("vues/v_sommaire.php");
    $mois = getMois(date("d:m:Y"));
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
            $pdo->supprimerFraisHorsForfait($idLigneHorsForfait);

            // Manque partie 8 du cas d'utilisation "Valider fiche de frais"

            $idVisiteur = $_SESSION['currentVisitor'];
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
            $pdo->majEtatfichefrais($idVisiteur, $mois, $etat);

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
