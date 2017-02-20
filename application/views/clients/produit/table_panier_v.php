<?php
/**
 * Created by PhpStorm.
 * User: Aymane
 * Date: 23/11/2015
 * Time: 07:05
 */
defined('BASEPATH') OR exit('No direct script access allowed');
$total=0;
?>




    <div class="row" style="margin-top:10px;">
        <div class="large-12">

            <p><h3>Panier</h3></p>

               <?php $total = 0;?>
            <table>
                <tr>

                <th>Nom</th>
                <th>Quantité</th>
                <th>Prix</th>
                </tr>
                <?php if( $panier != NULL): ?>
                <?php foreach ($panier as $value): ?>
                <?php
                            $cost = $value->prix*$value->quantite; //work out the line cost
                            $total = $total + $cost;
                            $quantite = $value->quantite;
?>
                            <tr>
                            <td><?=$value->nom;?></td>
                                <?php if($quantite !=0 ){
                                        $price1=$cost+($cost/$quantite);
                                        $price2=$cost-($cost/$quantite);}
                                    else{
                                        $price1 = 0;
                                        $price2 = $cost;}
                                ?>

                            <td><?=$quantite;?>&nbsp;<a class="button [secondary success alert]" style="padding:5px;" href="<?php echo site_url('Panier_c/incrementeQuantite/'.$value->id."/".$price1); ?>">+</a>&nbsp;<a class="button alert" style="padding:5px;" href="<?php echo site_url('Panier_c/decrementeQuantite/'.$value->id.'/'.$price2); ?>">-</a></td>
                            <td><?=$cost;?></td>
                            </tr>





                    <?php endforeach; ?>

                <?php endif; ?>
<tr>
<td colspan="3" align="right">Total</td>
<td><?=$total;?></td>
</tr>

<tr>
<td colspan="4" align="right"><a href="<?php echo site_url('Panier_c/suppPanier/'); ?>" class="button alert">Vider panier</a>&nbsp;<a href="<?php echo site_url('Client_c/index/'); ?>" class="button [secondary success alert]">Continuer vos achats</a>

                    <a href="<?php echo site_url('Commande_c/ajoutCommande/'.$total); ?>"><button style="float:right;">Passer la commande</button></a>



</td>

</tr>
</table>







</div>
</div>

