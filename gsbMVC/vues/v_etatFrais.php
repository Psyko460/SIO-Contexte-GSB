<h3>Fiche de frais du mois <?php echo $numMois."-".$numAnnee?> :</h3>
   Etat : <?php echo $libEtat ?> depuis le <?php echo $dateModif?> <br> Montant validé : <?php echo $montantValide ?>

   <h4>Eléments forfaitisés</h4>
   <table class="striped bordered">
      <thead>
         <tr>
            <th>Frais forfaitaires</th>
            <th>Quantité</th>
            <th>Montant unitaire</th>
            <th>Total</th>
         </tr>
      </thead>

      <tbody>
         <?php
            $totalFraisForfait = 0;
            foreach($lesFraisForfait as $unFraisForfait)
            {
               echo '<td>'.$unFraisForfait['libelle'].'</td>';
               echo '<td>'.$unFraisForfait['quantite'].'</td>';
               echo '<td>'.$unFraisForfait['montant'].'</td>';
               echo '<td>'.$unFraisForfait['total'].'</td></tr>';
               $totalFraisForfait += $unFraisForfait['total'];
            }
         ?>
      </tbody>
   </table>
   <p class="right-align">Total des frais forfaitisés : <?php echo $totalFraisForfait ?> Euros</p>

  <h4>Descriptif des éléments hors forfait - <?php echo $nbJustificatifs ?> justificatifs reçus -</h4>
  <table class="striped bordered">
     <thead>
        <tr>
           <th>Date</th>
           <th>Libellé</th>
           <th>Montant</th>
        </tr>
     </thead>

     <tbody>
         <?php
            $totalFraisHorsForfait = 0;
            foreach ($lesFraisHorsForfait as $unFraisHorsForfait)
            {
               echo '<td>'.$unFraisHorsForfait['date'].'</td>';
               echo '<td>'.$unFraisHorsForfait['libelle'].'</td>';
               echo '<td>'.$unFraisHorsForfait['montant'].'</td></tr>';

               if (!strstr($unFraisHorsForfait['libelle'], 'REFUSE'))
               {
                  $totalFraisHorsForfait += $unFraisHorsForfait['montant'];
               }
            }
         ?>
     </tbody>
  </table>
  <p class="right-align">Total des frais hors forfait : <?php echo $totalFraisHorsForfait ?> Euros</p>
  <p class="right-align">Total du mois <?php echo $numMois."-".$numAnnee?> : <?php echo ($totalFraisForfait + $totalFraisHorsForfait) ?> Euros</p>

  <button class="btn waves-effect waves-light" name="createPdf">Générer le PDF
     <i class="material-icons right">play_for_work</i>
  </button><br><br>
