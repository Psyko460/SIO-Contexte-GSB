            <div class="encadre">
            <form method="POST" action="index.php?uc=suiviFrais&amp;action=updateFicheStatus">
                <p>Etat : <?php echo $infos['libEtat'] ?> depuis le <?php echo $infos['dateModif'] ?></p>
                <table class="listeLegere">
                <caption>Frais au forfait</caption>
                <tr>
                    <th class="etape">Forfait étape</th>
                    <th class="kilometre">Frais kilométrique</th>
                    <th class="nuitee">Nuitée hôtel</th>
                    <th class="repas_midi">Repas restaurant</th>
                </tr>
                <tr>
                    <?php
                        foreach($lesFraisForfait as $unFraisForfait)
                        {
                            echo '<td>'.$unFraisForfait['quantite'].'</td>';
                        }
                    ?>
                </tr>
                </table>

                <table class="listeLegere">
                <caption>Frais hors forfait</caption>
                <tr>
                    <th class="date">Date</th>
                    <th class="libelle">Libellé</th>
                    <th class="montant">Montant</th>
                    <th class="action_comptable">Action</th>
                </tr>
                    <?php
                        foreach($lesFraisHorsForfait as $unFraisHorsForfait)
                        {
                            echo '<tr><td>'.$unFraisHorsForfait['date'].'</td>';
                            echo '<td>'.$unFraisHorsForfait['libelle'].'</td>';
                            echo '<td>'.$unFraisHorsForfait['montant'].'</td>';
                            echo '<td><a href="index.php?uc=validationFrais&amp;action=deleteFicheHorsForfait&amp;ficheIDToDelete='.$unFraisHorsForfait['id'].'">Supprimer la ligne</a></td>';
                        }
                    ?>
                </table>
            </div>

                <div class="piedForm">
                    <p>
                        <input name="action_button" type="submit" value="Mettre en paiement" size="20" />
                        <input name="action_button" type="submit" value="Rembourser" size="20" />
                    </p>
                </div>
            </form>
