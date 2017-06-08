<?php
    include("vues/v_sommaireComptable.php");
    $action = $_REQUEST['action'];
    $idComptable = $_SESSION['userID'];

    switch($action)
    {
        case 'checkMedicines':
        {
            $medicines = $pdo->getAllMedicines();
            $fournisseurs = $pdo->getAllFournisseurs();
            $orders = $pdo->getAllOrders();
            include("vues/v_listeMedicaments.php");
            include("vues/v_ajoutMedicament.php");
            include("vues/v_listeCommandes.php");
            include("vues/v_passageCommande.php");
            break;
        }
        case 'addNewMedicine':
        {
            $libelle = $_REQUEST['libelle'];
            $composition = $_REQUEST['composition'];
            $effets = $_REQUEST['effets'];
            $posologie = $_REQUEST['posologie'];
            $prix = $_REQUEST['prix'];
            $tauxRemboursement = $_REQUEST['taux'];

            $pdo->addNewMedicine($libelle, $composition, $effets, $posologie, $prix, $tauxRemboursement);
            $medicines = $pdo->getAllMedicines();
            $fournisseurs = $pdo->getAllFournisseurs();
            $orders = $pdo->getAllOrders();
            include("vues/v_listeMedicaments.php");
            include("vues/v_ajoutMedicament.php");
            include("vues/v_listeCommandes.php");
            include("vues/v_passageCommande.php");
            break;
        }
        case 'orderMedicines':
        {
            $idMedicine = $_REQUEST['currentMedicine'];
            $idFournisseur = $_REQUEST['currentFournisseur'];
            $amount = $_REQUEST['quantite'];

            $price = $pdo->getMedicinePrice($idMedicine);
            $total = ($price * $amount);
            $pdo->addNewOrder($idComptable, $idMedicine, $idFournisseur, $amount, $total);
            $medicines = $pdo->getAllMedicines();
            $fournisseurs = $pdo->getAllFournisseurs();
            $orders = $pdo->getAllOrders();
            include("vues/v_listeMedicaments.php");
            include("vues/v_ajoutMedicament.php");
            include("vues/v_listeCommandes.php");
            include("vues/v_passageCommande.php");
            break;
        }
    }
?>
