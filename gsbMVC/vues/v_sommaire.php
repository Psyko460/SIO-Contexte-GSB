<nav class="visitor_part">
   <div class="nav-wrapper">
      <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
      <ul class="left hide-on-med-and-down">
         <li><a href="index.php?uc=gererFrais&action=saisirFrais">Saisie fiche de frais</a></li>
         <li><a href="index.php?uc=etatFrais&action=selectionnerMois">Mes fiches de frais</a></li>
         <li><a href="index.php?uc=gererCompte&action=checkAccount">Gestion du compte</a></li>
         <li><a href="index.php?uc=connexion&action=deconnexion">Se déconnecter</a></li>
      </ul>
      <ul class="right hide-on-med-and-down">
         <li><i class="material-icons right">perm_identity</i>Bienvenue <?php echo $_SESSION['prenom']."  ".$_SESSION['nom'] ?></li>
      </ul>
      <ul class="side-nav" id="mobile-demo">
         <li><a href="index.php?uc=gererFrais&action=saisirFrais">Saisie fiche de frais</a></li>
         <li><a href="index.php?uc=etatFrais&action=selectionnerMois">Mes fiches de frais</a></li>
         <li><a href="index.php?uc=gererCompte&action=checkAccount">Gestion du compte</a></li>
         <li><a href="index.php?uc=connexion&action=deconnexion">Se déconnecter</a></li>
      </ul>
   </div>
</nav>
