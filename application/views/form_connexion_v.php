</br>
</br>
</br>
</br>
</br>
</br>
<h1 style="text-align:center ;"> Connexion </h1>
</br>
</br>
</br>


<?php echo form_open('Users_c/form_valid_connexion'); ?>
<div class="large-3 large-centered columns">
    <div class="login-box">
        <div class="row">
            <div class="large-12 columns">
                <form>
                    <div class="row">
                        <div class="large-12 columns">
                            <input type="text" name="login" placeholder="Username" value="<?php echo set_value('login');?>" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-12 columns">
                            <input type="password" name="pass" value="<?= set_value('pass');?>" placeholder="Password" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-12 large-centered columns">
                            <input type="submit" class="button expand" value="Connexion"/>
                            <?php if(isset($erreur))echo '<span class="error">'.$erreur."</span>";?>
                            <?php echo form_close(); ?>
                            <a href="inscription" class="button round">Inscription</a>
                            <a href="mdp_oublie" class="button round">Mot de passe oublié</a>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>