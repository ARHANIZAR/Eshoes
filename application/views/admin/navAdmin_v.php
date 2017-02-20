



<nav class="top-bar" data-topbar role="navigation">
    <ul class="title-area">
        <li class="name">
            <h1><a href="<?php echo site_url('users_c/index');?>">Espace administration</a> </h1>
        </li>
        <li class="toggle-topbar menu-icon">
            <a href="#"><span>Menu</span></a></li>
    </ul>

    <section class="top-bar-section">
        <ul class="left">
            <li><a  href="<?php echo site_url('Commande_c/AfficherCommande');?>" > consulter et préparer les commandes</a></li>
            <li><a  href="<?php echo site_url('Produit_c');?>" >afficher/editer/supprimer les produits</a></li>
            <li><a  href="<?php echo site_url('Produit_c/creerProduit');?>" > créer un client</a></li>

        </ul>

        <ul class="right">
            <li>Bonjour <?= $this->session->userdata('login')?><li>
            <li><a href="<?php echo site_url('users_c/deconnexion');?>">se deconnecter</a></li>
        </ul>
    </section>
</nav>