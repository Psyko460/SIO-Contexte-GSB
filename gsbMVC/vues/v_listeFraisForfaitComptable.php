<form class="col s12" method="POST" action="index.php?uc=validationFrais&amp;action=updateFicheFrais">
    <h4>Frais au forfait</h4>
    <div class="row">
       <?php
           $totalFraisForfait = 0;
           foreach($lesFraisForfait as $unFraisForfait)
           {
              $idFrais = $unFraisForfait['idfrais'];
              $libelle = $unFraisForfait['libelle'];
              $montant = $unFraisForfait['montant'];
              $quantite = $unFraisForfait['quantite'];
              $total = $unFraisForfait['total'];
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

       <p class="right-align">Total des frais forfaitisés : <?php echo $totalFraisForfait ?> Euros</p>

       <button class="btn waves-effect waves-light" type="submit" name="valider">Mettre à jour
          <i class="material-icons right">send</i>
       </button>
    </form>
 </div>
