<div id="contenu">
    <h2>Validation des frais par visiteur</h2>

    <form method="POST" action="index.php?uc=validFrais&amp;action=confirmerValidationFrais">
        <div class="corpsForm">
            <p>Choisir le visiteur :</p>
            <select name="lstVisiteur">
                <?php
                    foreach ($lesVisiteurs as $visiteur)
                    {
                        echo '<option value="' . $visiteur['id'].'">' . $visiteur['firstName'] . " " . $visiteur['name'] .'</option>';
                    }
                ?>
            </select>
            <p>Mois : <input type="text" name="dateValid" value="<?php echo $mois ?>"></p>
            <input id="ok" type="submit" value="Valider" size="20" />
            
            
            <table class="listeLegere">
            <caption>Frais au forfait</caption>
            <tr>
                <th class="repas_midi">Repas midi</th>
                <th class="nuitee">Nuitée</th>
                <th class="etape">Etape</th>
                <th class="kilometre">Km</th>
                <th class="situation">Situation</th>
            </tr>
                <?php
                    foreach($lesFraisHorsForfait as $unFraisHorsForfait)
                    {
                        $libelle = $unFraisHorsForfait['libelle'];
                        $date = $unFraisHorsForfait['date'];
                        $montant=$unFraisHorsForfait['montant'];
                        $id = $unFraisHorsForfait['id'];
                ?>

            <tr>
                <td> <?php echo $date ?></td>
                <td><?php echo $libelle ?></td>
                <td><?php echo $montant ?></td>
            </tr>
                <?php
                    }
                ?>

            </table>
            
            <table class="listeLegere">
            <caption>Frais hors forfait</caption>
            <tr>
                <th class="date">Date</th>
                <th class="libelle">Libellé</th>
                <th class="montant">Montant</th>
                <th class="situation">Situation</th>
            </tr>
                <?php
                    foreach($lesFraisHorsForfait as $unFraisHorsForfait)
                    {
                        $libelle = $unFraisHorsForfait['libelle'];
                        $date = $unFraisHorsForfait['date'];
                        $montant=$unFraisHorsForfait['montant'];
                        $id = $unFraisHorsForfait['id'];
                ?>

            <tr>
                <td> <?php echo $date ?></td>
                <td><?php echo $libelle ?></td>
                <td><?php echo $montant ?></td>
            </tr>
                <?php
                    }
                ?>

            </table>
            
            <table class="listeLegere">
            <caption>Hors classification</caption>
            <tr>
                <th class="nb_justificatifs">Nb justificatifs</th>
                <th class="montant">Montant</th>
                <th class="situation">Situation</th>
            </tr>
                <?php
                    $nbJustificatifs = $lesFichesFrais['nbJustificatifs'];
                    $montant = $lesFichesFrais['montantValide'];
                    $situation = $etatFicheFrais;
                ?>

            <tr>
                <td> <?php echo $date ?></td>
                <td><?php echo $libelle ?></td>
                <td><?php echo $montant ?></td>
            </tr>

            </table>
        </div>

        <div class="piedForm">
            <p>
                <input id="ok" type="submit" value="Valider" size="20" />
                <input id="annuler" type="reset" value="Effacer" size="20" />
            </p>
        </div>
    </form>
</div>
