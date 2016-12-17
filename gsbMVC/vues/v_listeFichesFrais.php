<div id="contenu">
    <h2>Suivi du paiement des fiches de frais</h2>

        <div class="corpsForm">
            <form method="POST" action="index.php?uc=suiviFrais&amp;action=fraisDetails">
                <h3>Choisir le visiteur :</h3>
                <select name="currentVisitor">
                    <?php
                        foreach ($lesVisiteurs as $visiteur)
                        {
                            echo '<option value="' . $visiteur['id'].'">' . $visiteur['firstName'] . " " . $visiteur['name'] .'</option>';
                        }
                    ?>
                </select>
                <p>Mois : <input type="text" name="dateValid" value="<?php echo $mois ?>"></p>
                <input id="ok" type="submit" value="Valider" size="20" />
            </form>
