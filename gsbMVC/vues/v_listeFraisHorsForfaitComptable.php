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

            <form method="POST" action="index.php?uc=validationFrais&amp;action=finalValidateFiche">
                <div class="piedForm">
                    <p>
                        <input type="submit" value="Valider la fiche" size="20" />
                    </p>
                </div>
            </div>
            </form>
