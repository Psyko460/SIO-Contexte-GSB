<div id="contenu">
    <h2>Validation des frais par visiteur</h2>

        <div class="corpsForm">
            <form method="POST" action="index.php?uc=validationFrais&amp;action=checkFrais">
                <p>Choisir le visiteur :</p>
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