<form class="col s12" method="POST" action="index.php?uc=suiviCompte&amp;action=updateAccountInfos">
    <h4>Informations relatives au compte</h4>
    
    <table class="striped bordered">
        <tr>
            <th>Rôle</th>
            <?php echo '<td>'.$accountInfos[0].'</td>'; ?>
        </tr>
        <tr>
            <th>Nom</th>
            <?php echo '<td>'.$accountInfos[1].'</td>'; ?>
        </tr>
        <tr>
            <th>Prénom</th>
            <?php echo '<td>'.$accountInfos[2].'</td>'; ?>
        </tr>
        <tr>
            <th>Login</th>
            <?php echo '<td>'.$accountInfos[3].'</td>'; ?>
        </tr>
        <tr>
            <th>Adresse</th>
            <?php echo '<td>'.$accountInfos[4].'</td>'; ?>
        </tr>
        <tr>
            <th>Code postal</th>
            <?php echo '<td>'.$accountInfos[5].'</td>'; ?>
        </tr>
        <tr>
            <th>Ville</th>
            <?php echo '<td>'.$accountInfos[6].'</td>'; ?>
        </tr>
        <tr>
            <th>Date de l'embauche</th>
            <?php echo '<td>'.$accountInfos[7].'</td>'; ?>
        </tr>
    </table><br>

    <button class="btn waves-effect waves-light" type="submit" name="action_button" value="Mettre en paiement">Mettre à jour les informations
      <i class="material-icons right">send</i>
    </button>
</form>
