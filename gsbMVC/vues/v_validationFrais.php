            <form method="POST" action="index.php?uc=validFrais&amp;action=confirmerValidationFrais">   
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
                        foreach($lesFraisForfait as $unFraisForfait)
                        {
                            $libelle = $unFraisForfait['libelle'];
                            $date = $unFraisForfait['date'];
                            $montant=$unFraisForfait['montant'];
                            $id = $unFraisForfait['id'];
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
                        $situation = $lesFichesFrais['idEtat'];
                    ?>

                <tr>
                    <td> <?php echo $nbJustificatifs ?></td>
                    <td><?php echo $montant ?></td>
                    <td><?php echo $situation ?></td>
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
