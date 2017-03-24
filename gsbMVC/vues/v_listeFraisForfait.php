<div id="contenu">
   <h2>Renseigner ma fiche de frais du mois <?php echo $numMois."-".$numAnnee ?></h2>

   <form method="POST"  action="index.php?uc=gererFrais&action=validerMajFraisForfait">

      <div class="corpsForm">
         <fieldset>
            <legend>Eléments forfaitisés</legend>
		      <?php
               $totalFraisForfait = 0;
      			foreach ($lesFraisForfait as $unFrais)
      			{
      				$idFrais = $unFrais['idfrais'];
      				$libelle = $unFrais['libelle'];
                  $montant = $unFrais['montant'];
      				$quantite = $unFrais['quantite'];
                  $total = $unFrais['total'];
                  $totalFraisForfait += $total;
      		?>
				<p>
					<label for="idFrais"><?php echo $libelle ?> (<?php echo $montant ?> Euros) : </label>
					<input type="text" id="idFrais" name="lesFrais[<?php echo $idFrais?>]" size="10" maxlength="5" value="<?php echo $quantite ?>" > soit un total de <?php echo $total ?> Euros.
				</p>
      		<?php
      			}
      		?>
         </fieldset>
      </div>
      
      <div class="piedForm">
      <p>
         Total frais forfaitisés : <?php echo $totalFraisForfait ?> Euros.
        <input id="ok" type="submit" value="Valider" size="20" />
        <input id="annuler" type="reset" value="Effacer" size="20" />
      </p>
      </div>
   </form>
