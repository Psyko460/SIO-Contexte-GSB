<form class="col s12" method="POST" action="index.php?uc=gererMedicaments&action=addNewMedicine">
    <h4>Nouveau type de médicament</h4>
    <div class="row">
        <div class="input-field col s3">
            <input type="text" id="txtLibelleMed" name="libelle">
            <label for="txtLibelleMed">Libellé</label>
        </div>
        <div class="input-field col s3">
            <input type="text" id="txtCompositionMed" name="composition">
            <label for="txtCompositionMed">Composition</label>
        </div>
        <div class="input-field col s3">
            <input type="text" id="txtEffetsMed" name="effets">
            <label for="txtEffetsMed">Effets</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s3">
            <input type="text" id="txtPosologieMed" name="posologie">
            <label for="txtPosologieMed">Posologie</label>
        </div>
        <div class="input-field col s3">
            <input type="text" id="txtPrixMed" name="prix">
            <label for="txtPrixMed">Prix</label>
        </div>
        <div class="input-field col s3">
            <input type="text" id="txtTauxMed" name="taux">
            <label for="txtTauxMed">Taux</label>
        </div>
    </div>

   <button class="btn waves-effect waves-light" type="submit" name="action_button" value="Créer nouveau médicament">Créer nouveau médicament
      <i class="material-icons right">send</i>
    </button>
</form><br>