<?php
    if(!isset($_REQUEST['action']))
    {
        $_REQUEST['action'] = 'demandeConnexion';
    }
    $action = $_REQUEST['action'];

    switch($action)
    {
        case 'demandeConnexion':
        {
            include("./vues/v_connexion.php");
            break;
        }
        case 'valideConnexion':
        {
            $login = $_REQUEST['login'];
            $mdp = $_REQUEST['mdp'];
            $user = $pdo->getInfosVisiteur($login,$mdp);
            if(!is_array( $user))
            {
                ajouterErreur("Login ou mot de passe incorrect");
                include("vues/v_erreurs.php");
                include("vues/v_connexion.php");
            }
            else
            {
                $id = $user['id'];
                $nom =  $user['nom'];
                $prenom = $user['prenom'];
                connecter($id,$nom,$prenom);

                if ($pdo->getUserType($login, $mdp) == "Visiteur")
                {
                   include("vues/v_sommaire.php");
                }
                else
                {
                   include("vues/v_sommaireComptable.php");
                }

                include('vues/v_accueil.php');
            }
            include("vues/v_pied.php");
            break;
        }
        default :
        {
            include("vues/v_connexion.php");
            break;
        }
    }
?>

  
