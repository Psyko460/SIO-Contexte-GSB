<div class="col s12">
    <h4>Médicaments en stock</h4>
    
    <table class="striped bordered">
        <thead>
            <tr>
                <th>Libellé</th>
                <th>Composition</th>
                <th>Effets</th>
                <th>Posologie</th>
                <th>Prix</th>
                <th>Taux remboursement</th>
            </tr>
        </thead>

        <tbody>
            <?php
                foreach($medicines as $medicine)
                {
                    echo '<tr><td>'.$medicine['libelle'].'</td>';
                    echo '<td>'.$medicine['composition'].'</td>';
                    echo '<td>'.$medicine['effets'].'</td>';
                    echo '<td>'.$medicine['posologie'].'</td>';
                    echo '<td>'.$medicine['prix'].'</td>';
                    echo '<td>'.$medicine['tauxRemboursement'].'</td></tr>';
                }
            ?>
        </tbody>
    </table><br>
</div>
