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
                  $totalFraisForfait = 0;
                  foreach($lesFraisForfait as $unFraisForfait)
                  {
                      $totalFraisForfait += $unFraisForfait['total'];
                      echo '<td>'.$unFraisForfait['quantite'].'</td>';
                  }
              ?>
          </tr>
       </tbody>
    </table>

    <p class="right-align">Total des frais forfaitisés : <?php echo $totalFraisForfait ?> Euros</p>

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
          <tr>
             <?php
                 $totalFraisHorsForfait = 0;
                 foreach($lesFraisHorsForfait as $unFraisHorsForfait)
                 {
                     echo '<tr><td>'.$unFraisHorsForfait['date'].'</td>';
                     echo '<td>'.$unFraisHorsForfait['libelle'].'</td>';
                     echo '<td>'.$unFraisHorsForfait['montant'].'</td>';

                     if (!strstr($unFraisHorsForfait['libelle'], 'REFUSE'))
                     {
                        $totalFraisHorsForfait += $unFraisHorsForfait['montant'];
                        echo '<td><a href="index.php?uc=validationFrais&amp;action=deleteFicheHorsForfait&amp;ficheIDToDelete='.$unFraisHorsForfait['id'].'">Supprimer la ligne</a></td>';
                     }
                     else
                     {
                        echo '<td>/</td>';
                     }
                 }
             ?>
         </tr>
       </tbody>
    </table>

    <p class="right-align">Total des frais hors forfait : <?php echo $totalFraisHorsForfait ?> Euros</p>
    <p class="right-align">Total : <?php echo ($totalFraisForfait + $totalFraisHorsForfait) ?> Euros</p>
    <br><br>

    <button class="btn waves-effect waves-light" type="submit" name="action_button" value="Mettre en paiement">Mettre en paiement
      <i class="material-icons right">credit_card</i>
    </button>

    <button class="btn waves-effect waves-light" type="submit" name="action_button" value="Rembourser">Rembourser
      <i class="material-icons right">call_missed</i>
    </button>
</form>
