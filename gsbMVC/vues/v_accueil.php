<p>Le laboratoire Galaxy Swiss Bourdin (GSB) est issu de la fusion entre le géant américain Galaxy (spécialisé dans le secteur des maladies virales dont le SIDA et les hépatites) et le conglomérat européen Swiss Bourdin (travaillant sur des médicaments plus conventionnels), lui même déjà union de trois petits laboratoires .
En 2009, les deux géants pharmaceutiques ont uni leurs forces pour créer un leader de ce secteur industriel. L’entité Galaxy Swiss Bourdin Europe a établi son siège administratif à Paris.</p>

<p>Le siège social de la multinationale est situé à Philadelphie, Pennsylvanie, aux Etats-Unis.</p>

<div class="card">
   <div class="card-content">
      <h4>Tableau de bord</h4>
   </div>
   <div class="card-tabs">
      <ul class="tabs tabs-fixed-width">
         <li class="tab"><a class="active" href="#all">Toutes les fiches</a></li>
         <li class="tab"><a href="#inPayment">En paiement</a></li>
         <li class="tab"><a href="#refunded">Remboursées</a></li>
         <li class="tab"><a href="#validated">Validées</a></li>
      </ul>
   </div>
   <div id="all" class="card-content">
      <table class="striped">
         <thead>
            <tr>
               <th>Nombre justificatifs</th>
               <th>Montant</th>
               <th>Date modification</th>
               <th>Etat</th>
            </tr>
         </thead>

         <tbody>
         <?php
            foreach($allFichesFrais as $uneFiche)
            {
               $nbJustificatifs = $uneFiche['nbJustificatifs'];
               $montant = $uneFiche['montantValide'];
               $dateModif = $uneFiche['dateModif'];
               $etat = $uneFiche['libelle'];
               ?>

               <tr>
                  <td> <?php echo $nbJustificatifs ?></td>
                  <td><?php echo $montant ?></td>
                  <td><?php echo $dateModif ?></td>
                  <td><?php echo $etat ?></td>
               </tr>
               <?php
            }
         ?>
         </tbody>
      </table>
   </div>
   <div id="inPayment" class="card-content">
      <table class="striped">
         <thead>
            <tr>
               <th>Nombre justificatifs</th>
               <th>Montant</th>
               <th>Date modification</th>
               <th>Etat</th>
            </tr>
         </thead>

         <tbody>
         <?php
            foreach($inPaymentFichesFrais as $uneFiche)
            {
               $nbJustificatifs = $uneFiche['nbJustificatifs'];
               $montant = $uneFiche['montantValide'];
               $dateModif = $uneFiche['dateModif'];
               $etat = $uneFiche['libelle'];
               ?>

               <tr>
                  <td> <?php echo $nbJustificatifs ?></td>
                  <td><?php echo $montant ?></td>
                  <td><?php echo $dateModif ?></td>
                  <td><?php echo $etat ?></td>
               </tr>
               <?php
            }
         ?>
         </tbody>
      </table>
   </div>
   <div id="refunded" class="card-content">
      <table class="striped">
         <thead>
            <tr>
               <th>Nombre justificatifs</th>
               <th>Montant</th>
               <th>Date modification</th>
               <th>Etat</th>
            </tr>
         </thead>

         <tbody>
         <?php
            foreach($refundedFichesFrais as $uneFiche)
            {
               $nbJustificatifs = $uneFiche['nbJustificatifs'];
               $montant = $uneFiche['montantValide'];
               $dateModif = $uneFiche['dateModif'];
               $etat = $uneFiche['libelle'];
               ?>

               <tr>
                  <td> <?php echo $nbJustificatifs ?></td>
                  <td><?php echo $montant ?></td>
                  <td><?php echo $dateModif ?></td>
                  <td><?php echo $etat ?></td>
               </tr>
               <?php
            }
         ?>
         </tbody>
      </table>
   </div>
   <div id="validated" class="card-content">
      <table class="striped">
         <thead>
            <tr>
               <th>Nombre justificatifs</th>
               <th>Montant</th>
               <th>Date modification</th>
               <th>Etat</th>
            </tr>
         </thead>

         <tbody>
         <?php
            foreach($validatedFichesFrais as $uneFiche)
            {
               $nbJustificatifs = $uneFiche['nbJustificatifs'];
               $montant = $uneFiche['montantValide'];
               $dateModif = $uneFiche['dateModif'];
               $etat = $uneFiche['libelle'];
               ?>

               <tr>
                  <td> <?php echo $nbJustificatifs ?></td>
                  <td><?php echo $montant ?></td>
                  <td><?php echo $dateModif ?></td>
                  <td><?php echo $etat ?></td>
               </tr>
               <?php
            }
         ?>
         </tbody>
      </table>
   </div>
</div>
