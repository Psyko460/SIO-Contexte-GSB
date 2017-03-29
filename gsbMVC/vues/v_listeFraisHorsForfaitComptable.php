 <h3>Frais hors forfait</h3>

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
         foreach($lesFraisHorsForfait as $unFraisHorsForfait)
         {
            echo '<tr><td>'.$unFraisHorsForfait['date'].'</td>';
            echo '<td>'.$unFraisHorsForfait['libelle'].'</td>';
            echo '<td>'.$unFraisHorsForfait['montant'].'</td>';
            echo '<td><a href="index.php?uc=validationFrais&amp;action=deleteFicheHorsForfait&amp;ficheIDToDelete='.$unFraisHorsForfait['id'].'">Supprimer la ligne</a></td>';
         }
      ?>
    </tbody>
 </table>

<form class="col s12" method="POST" action="index.php?uc=validationFrais&amp;action=finalValidateFiche">
   <br><br>
   <button class="btn waves-effect waves-light" type="submit" name="valider">Valider la fiche
      <i class="material-icons right">done</i>
   </button>
</form>
