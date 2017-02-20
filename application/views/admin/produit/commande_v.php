<?php
/**
 * Created by PhpStorm.
 * User: Aymane
 * Date: 07/12/2015
 * Time: 07:35
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="row">
    <table>
        <caption>Recapitulatifs des Commandes</caption>
        <thead> <tr><th>Numéro de commande</th><th>date</th><th>prix</th><th>etat de la commande</th>
        </tr> </thead>
        <tbody>
        <?php if( $commande != NULL): ?>
            <?php foreach ($commande as $value): ?>
                <tr><td>
                        <?=$value->id_commande; ?>
                    </td><td>
                        <?= $value->date_achat; ?>
                    </td><td>
                        <?= $value->prix;?> €
                    </td><td>
                        <?= $value->libelle; ?>
                    </td>
                    <td>
                        <a href="<?php echo site_url("Commande_c/anullerCommande/".$value->id_commande)?>">Anuller</a>
                        <a href="<?php echo site_url("Commande_c/validerCommande/".$value->id_commande)?>">Valider</a>
                    </td>

                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        <tbody>
    </table>


</div>
