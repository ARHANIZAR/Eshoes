<?php
/**
 * Created by PhpStorm.
 * User: Aymane
 * Date: 23/11/2015
 * Time: 15:32
 */

defined('BASEPATH') OR exit('No direct script access allowed');
?>
<ul class="rslides" id="slider1">

    <li><img src="<?php echo base_url();?>assets/img/slide3.jpg" alt=""></li>
    <li><img src="<?php echo base_url();?>assets/img/slide2.jpg" alt=""></li>
    <li><img src="<?php echo base_url();?>assets/img/slide1.jpg" alt=""></li>

</ul>


<hr>
<div class="row column text-center">
    <h2>Nos Produits</h2>
    <hr>
</div>
<div class="row small-up-2 medium-up-3 large-up-6">
    <?php if( $produit != NULL): ?>
        <?php foreach ($produit as $value): ?>
    <div class="column">
        <img class="thumbnail" style="width:150px; height:150px;"  src="<?php echo base_url();?>assets/img/<?= $value->photo; ?>">
        <h5> <?= $value->nom; ?></h5>
        <p>  <?= $value->prix; ?> €</p>
        <?php if($this->session->userdata('droit')==1): ?>

            <a href="<?php echo site_url("Panier_c/ajoutpanier/".$value->id."/".$value->prix); ?>" class="button small expanded hollow">Ajouter au panier</a>
        <?php endif;?>

    </div>
        <?php endforeach; ?>
    <?php endif; ?>

</div>

<div class="callout large secondary">
    <div class="row">
        <div class="large-4 columns">
            <h5>Vivamus Hendrerit Arcu Sed Erat Molestie</h5>
            <p>Curabitur vulputate, ligula lacinia scelerisque tempor, lacus lacus ornare ante, ac egestas est urna sit amet arcu. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Sed molestie augue sit.</p>
            </h4>
        </div>
        <div class="large-3 large-offset-2 columns">
            <ul class="menu vertical">
                <li><a href="#">One</a></li>
                <li><a href="#">Two</a></li>
                <li><a href="#">Three</a></li>
                <li><a href="#">Four</a></li>
            </ul>
        </div>
        <div class="large-3 columns">
            <ul class="menu vertical">
                <li><a href="#">One</a></li>
                <li><a href="#">Two</a></li>
                <li><a href="#">Three</a></li>
                <li><a href="#">Four</a></li>
            </ul>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
    <script src="http://dhbhdrzi4tiry.cloudfront.net/cdn/sites/foundation.js"></script>
    <script>
        $(document).foundation();
    </script>