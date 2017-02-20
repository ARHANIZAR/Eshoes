<?php
/**
 * Created by PhpStorm.
 * User: Aymane
 * Date: 09/11/15
 * Time: 09:34
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="row">
    <table>
        <caption>Recapitulatifs des produits</caption>
        <thead> <tr><th>id</th><th>type</th><th>nom</th><th>prix</th><th>photo</th> <th>opération</th>
        </tr> </thead>
        <tbody>
        <?php if( $produit != NULL): ?>
            <?php foreach ($produit as $value): ?>
                <tr><td>
                        <?php echo $value->id; ?>
                    </td><td>
                        <?= $value->libelle; ?>
                    </td><td>
                        <?= $value->nom; ?>
                    </td><td>
                        <?= $value->prix; ?>€
                    </td><td>
                        <img style="width:40px;height:40px" src="<?php echo base_url();?>assets/img/<?= $value->photo; ?>" alt="image de <?= $value->libelle; ?>" >
                    </td>
                    <?php if($this->session->userdata('droit')==1): ?>
                        <td>
                            <a href="<?php echo site_url("Client_c/ajoutpanier/".$value->id."/".$value->prix); ?>">Ajouter au panier</a>
                        </td>
                    <?php endif;?>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        <tbody>
    </table>


</div>
