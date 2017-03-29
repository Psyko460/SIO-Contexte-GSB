 <h3>Suivi du paiement des fiches de frais</h3>

   <form method="POST" action="index.php?uc=suiviFrais&amp;action=fraisDetails">
       <h4>Choisir le visiteur :</h4>
       <select name="currentVisitor">
           <?php
               foreach ($lesVisiteurs as $visiteur)
               {
                   echo '<option value="' . $visiteur['id'].'">' . $visiteur['firstName'] . " " . $visiteur['name'] .'</option>';
               }
           ?>
       </select>
       <p>Mois : <input type="text" name="dateValid" value="<?php echo $mois ?>"></p>
       <input id="ok" type="submit" value="Valider" size="20" />
   </form>
