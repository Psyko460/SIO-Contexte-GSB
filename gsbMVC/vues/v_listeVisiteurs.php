<h3>Validation des frais par visiteur</h3>

<form class="col s12" method="POST" action="index.php?uc=validationFrais&amp;action=checkFrais">
   <h4>Choisir le visiteur : </h4>
   <select name="currentVisitor">
   <?php
    foreach ($lesVisiteurs as $visiteur)
    {
        echo '<option value="' . $visiteur['id'].'">' . $visiteur['firstName'] . " " . $visiteur['name'] .'</option>';
    }
   ?>
   </select>
   <label>Visiteur</label>

   <div class="row">
		<div class="input-field col s12">
         <input type="text" name="dateValid" value="<?php echo $mois ?>">
         <label for="dateValid">Mois</label>
      </div>
   </div>

   <button class="btn waves-effect waves-light" type="submit" name="valider">Choisir ce visiteur pour ce mois
		<i class="material-icons right">info_outline</i>
	</button>
</form>
