<div class="col s12">
    <h4>Commandes passées</h4>
    
    <table class="striped bordered">
        <thead>
            <tr>
                <th>Comptable</th>
                <th>Médicament</th>
                <th>Fournisseur</th>
                <th>Quantité</th>
                <th>Montant</th>
                <th>Date</th>
            </tr>
        </thead>

        <tbody>
            <?php
                foreach($orders as $order)
                {
                    echo '<tr><td>'.$order['prenom'].' '.$order['nom'].'</td>';
                    echo '<td>'.$order['libelle'].'</td>';
                    echo '<td>'.$order['nomFournisseur'].'</td>';
                    echo '<td>'.$order['quantite'].'</td>';
                    echo '<td>'.$order['montant'].'</td>';
                    echo '<td>'.$order['date'].'</td></tr>';
                }
            ?>
        </tbody>
    </table><br>
</div>
