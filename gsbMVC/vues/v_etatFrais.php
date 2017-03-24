<h3>Fiche de frais du mois <?php echo $numMois."-".$numAnnee?> :</h3>
    <div class="encadre">
      <p>
         Etat : <?php echo $libEtat ?> depuis le <?php echo $dateModif?> <br> Montant validé : <?php echo $montantValide ?>
      </p>

    	<table class="listeLegere">
    	  <caption>Eléments forfaitisés</caption>
        <tr>

         <th class="etape">Frais forfaitaires</th>
         <th class="kilometre">Quantité</th>
         <th class="nuitee">Montant unitaire</th>
         <th class="repas_midi">Total</th>

  		  </tr>
        <tr>

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

  		  </tr>
      </table>

      <p>
         Total frais forfaitisés : <?php echo $totalFraisForfait ?> Euros.
      </p>

    	<table class="listeLegere">
    	  <caption>Descriptif des éléments hors forfait -<?php echo $nbJustificatifs ?> justificatifs reçus -</caption>
        <tr>
          <th class="date">Date</th>
          <th class="libelle">Libellé</th>
          <th class='montant'>Montant</th>
        </tr>
        <?php
         $totalFraisHorsForfait = 0;
          foreach ($lesFraisHorsForfait as $unFraisHorsForfait)
  		    {
             echo '<td>'.$unFraisHorsForfait['date'].'</td>';
             echo '<td>'.$unFraisHorsForfait['libelle'].'</td>';
             echo '<td>'.$unFraisHorsForfait['montant'].'</td></tr>';
             $totalFraisHorsForfait += $unFraisHorsForfait['montant'];
          }
  		  ?>
      </table>

      <p>
         Total frais hors forfait : <?php echo $totalFraisHorsForfait ?> Euros.
      </p>

      <div class="piedForm">
         <p>
            Total du mois <?php echo $numMois."-".$numAnnee?> : <?php echo ($totalFraisForfait + $totalFraisHorsForfait) ?> Euros.
         </p>
      </div>
    </div>
  </div>
