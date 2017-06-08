<form class="col s12" method="POST" action="index.php?uc=gererMedicaments&action=orderMedicines">
    <h4>Passer une commande</h4>
    <div class="row">
        <div class="input-field col s6">
            <select name="currentMedicine">
            <?php
                foreach ($medicines as $medicine)
                {
                    echo '<option value="' . $medicine['id'].'">' . $medicine['libelle'] .'</option>';
                }
            ?>
            </select>
        </div>
        <div class="input-field col s3">
            <select name="currentFournisseur">
            <?php
                foreach ($fournisseurs as $fournisseur)
                {
                    echo '<option value="' . $fournisseur['id'].'">' . $fournisseur['nom'] .'</option>';
                }
            ?>
            </select>
        </div>
        <div class="input-field col s3">
            <input type="text" id="txtQuantiteCommande" name="quantite">
            <label for="txtQuantiteCommande">Quantité</label>
        </div>
    </div>

   <button class="btn waves-effect waves-light" type="submit" name="action_button" value="Créer nouveau médicament">Commander
      <i class="material-icons right">send</i>
    </button>
</form><br>