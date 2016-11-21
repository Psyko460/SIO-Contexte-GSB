<div id="contenu">
   <h2>Validation des frais par visiteur</h2>

   <form method="POST" action="index.php?uc=validFrais&amp;action=confirmerValidationFrais">
      <div class="corpsForm">
         <p>Choisir le visiteur :</p>
            <select name="lstVisiteur">
               <?php
                  foreach ($lesVisiteurs as $visiteur)
                  {
                     echo "<option value="$visiteur['id']">$visiteur['prenom'] $visiteur['nom']</option>";
                  }
               ?>
            </select>
         <p>Mois : <input type="text" name="dateValid" value="<?php echo $mois ?>"></p>
      </div>

      <div class="piedForm">
         <p>
           <input id="ok" type="submit" value="Valider" size="20" />
           <input id="annuler" type="reset" value="Effacer" size="20" />
         </p>
      </div>
   </form>
