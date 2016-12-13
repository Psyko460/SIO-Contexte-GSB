<?php
    include("vues/v_sommaire.php");
    $mois = getMois(date("d:m:Y"));
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

            break;
        }
        case 'updateFicheStatus':
        {
            break;
        }
    }
?>
