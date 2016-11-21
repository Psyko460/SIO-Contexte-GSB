<?php
   include("vues/v_sommaire.php");
   $idVisiteur = $_SESSION['idVisiteur'];
	$mois = getMois(date("d/m/Y"));
   $action = $_REQUEST['action'];

   switch($action)
	{
		case 'validFrais':
		{
			include("vues/v_validationFrais.php");
			break;
		}
		case 'confirmerValidationFrais':
		{

			break;
		}
	}

	$lesVisiteurs = $pdo->getLesVisiteurs();
	$leMoisCourant= $pdo->;
?>
