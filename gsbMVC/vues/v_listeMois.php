<h3>Mes fiches de frais</h3>
<h4>Mois à sélectionner : </h4>

<form class="col s12" method="POST" action="index.php?uc=etatFrais&action=voirEtatFrais">
   <div class="input-field col s12">
      <select id="lstMois" name="lstMois">
         <?php
            foreach ($lesMois as $unMois)
            {
               $mois = $unMois['mois'];
               $numAnnee =  $unMois['numAnnee'];
               $numMois =  $unMois['numMois'];
               if($mois == $moisASelectionner)
               {
                  ?>
                  <option selected value="<?php echo $mois ?>"><?php echo  $numMois."/".$numAnnee ?> </option>
                  <?php
               }
               else
               {
                  ?>
                  <option value="<?php echo $mois ?>"><?php echo  $numMois."/".$numAnnee ?> </option>
                  <?php
               }
            }
         ?>
      </select>
   </div>

   <button class="btn waves-effect waves-light" type="submit" name="valider">Sélectionner ce mois
		<i class="material-icons right">info_outline</i>
	</button>
</form>
