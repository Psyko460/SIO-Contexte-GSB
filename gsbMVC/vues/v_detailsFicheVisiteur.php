<form class="col s12" method="POST" action="index.php?uc=suiviFrais&amp;action=updateFicheStatus">
    <p>Etat : <?php echo $infos['libEtat'] ?> depuis le <?php echo $infos['dateModif'] ?></p>
    <h4>Frais au forfait</h4>

    <table class="striped">
       <thead>
          <tr>
             <th>Forfait étape</th>
             <th>Frais kilométrique</th>
             <th>Nuitée hôtel</th>
             <th>Repas restaurant</th>
          </tr>
       </thead>

       <tbody>
          <tr>
              <?php
                  foreach($lesFraisForfait as $unFraisForfait)
                  {
                      echo '<td>'.$unFraisForfait['quantite'].'</td>';
                  }
              ?>
          </tr>
       </tbody>
    </table>

    <h4>Frais hors forfait</h4>

    <table class="striped">
       <thead>
          <tr>
             <th>Date</th>
             <th>Libellé</th>
             <th>Montant</th>
             <th>Action</th>
          </tr>
       </thead>

       <tbody>
          <?php
              foreach($lesFraisHorsForfait as $unFraisHorsForfait)
              {
                  echo '<tr><td>'.$unFraisHorsForfait['date'].'</td>';
                  echo '<td>'.$unFraisHorsForfait['libelle'].'</td>';
                  echo '<td>'.$unFraisHorsForfait['montant'].'</td>';
                  echo '<td><a href="index.php?uc=validationFrais&amp;action=deleteFicheHorsForfait&amp;ficheIDToDelete='.$unFraisHorsForfait['id'].'">Supprimer la ligne</a></td>';
              }
          ?>
       </tbody>
    </table>
    <br><br>

    <button class="btn waves-effect waves-light" type="submit" name="action_button" value="Mettre en paiement">Mettre en paiement
      <i class="material-icons right">send</i>
    </button>

    <button class="btn waves-effect waves-light" type="submit" name="action_button" value="Rembourser">Rembourser
      <i class="material-icons right">send</i>
    </button>
</form>
