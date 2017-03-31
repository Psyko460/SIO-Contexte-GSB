   <h3>Renseigner ma fiche de frais du mois <?php echo $numMois."-".$numAnnee ?></h3>
   	<form class="col s12" method="POST" action="index.php?uc=gererFrais&action=validerMajFraisForfait">
   		<h4>Eléments forfaitisés</h4>

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
               <div class="input-field col s3">
                  <label for="idFrais"><?php echo $libelle ?> (<?php echo $montant ?> Euros) : </label>
                  <input type="text" id="idFrais" name="lesFrais[<?php echo $idFrais?>]" size="10" maxlength="5" value="<?php echo $quantite ?>" > soit un total de <?php echo $total ?> Euros.
                  <br/><br/>
               </div>
               <?php
            }
         ?>

   		<button class="btn waves-effect waves-light" type="submit" name="valider">Mettre à jour les éléments forfaitisés
   			<i class="material-icons right">send</i>
   		</button>
   	</form>

   <p class="right-align">Total des frais forfaitisés : <?php echo $totalFraisForfait ?> Euros</p>
