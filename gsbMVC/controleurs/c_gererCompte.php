<?php
    include("vues/v_sommaire.php");
    $action = $_REQUEST['action'];
    $idVisiteur = $_SESSION['userID'];

    switch($action)
    {
        case 'checkAccount':
        {
            $accountInfos = $pdo->getAccountInformations($idVisiteur);
            include("vues/v_detailsCompte.php");
            break;
        }
        case 'updateAccountInfos':
        {
            
        }
    }
?>
