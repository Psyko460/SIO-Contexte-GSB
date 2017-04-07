<h4>Descriptif des éléments hors forfait</h4>

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
         $totalFraisHorsForfait = 0;
         foreach($lesFraisHorsForfait as $unFraisHorsForfait)
         {
            $libelle = $unFraisHorsForfait['libelle'];
            $date = $unFraisHorsForfait['date'];
            $montant = $unFraisHorsForfait['montant'];
            $id = $unFraisHorsForfait['id'];
            ?>

            <tr>
               <td> <?php echo $date ?></td>
               <td><?php echo $libelle ?></td>
               <td><?php echo $montant ?></td>

            <?php
               if (!strstr($libelle, 'REFUSE'))
               {
                  $totalFraisHorsForfait += $montant;
                  echo
                     '<td><a href="index.php?uc=gererFrais&action=supprimerFrais&idFrais=<?php echo $id ?>"onclick="return confirm("Voulez-vous vraiment supprimer ce frais?");">Supprimer ce frais</a></td>
                  </tr>';
               }
               else
               {
                  echo '<td>/</td>
                  </tr>';
               }
         }
      ?>
   </tbody>
</table>

<p class="right-align">Total des frais hors forfait : <?php echo $totalFraisHorsForfait ?> Euros</p>

<div class="row">
	<form class="col s12" method="POST" action="index.php?uc=gererFrais&action=validerCreationFrais">
		<h4>Nouvel élément hors forfait</h4>
		<div class="row">
			<div class="input-field col s3">
				<input type="date" class="datepicker" id="txtDateHF" name="dateFrais">
			</div>
      <div class="input-field col s3">
         <input type="text" id="txtLibelleHF" name="libelle">
         <label for="txtLibelleHF">Libellé</label>
			</div>
      <div class="input-field col s3">
         <input type="text" id="txtMontantHF" name="montant">
         <label for="txtMontantHF">Montant</label>
			</div>
		</div>

		<button class="btn waves-effect waves-light" type="submit" name="valider">Créer un nouvel élément hors forfait
			<i class="material-icons right">send</i>
		</button>
	</form>
</div>
