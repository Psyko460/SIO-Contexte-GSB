 <h3>Suivi du paiement des fiches de frais</h3>

   <form class="col s12" method="POST" action="index.php?uc=suiviFrais&amp;action=fraisDetails">
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
       <button class="btn waves-effect waves-light" type="submit" name="action_button">Valider
         <i class="material-icons right">done</i>
       </button>
   </form>
