

<? if((is_user_logged_in()) && ($current_user->stato==1)){ ?>


			<!-- ______________ in caso di utente già loggato.... ______________ -->
            <div>
            Gentile <b><?= $current_user->nome ?></b> benvenuto in <?= get_bloginfo('name') ?>
            &nbsp; <a href="<?= get_permalink(ID_PAG_UTENTE_ACCOUNT) ?>" title="<?= get_the_title(ID_PAG_UTENTE_ACCOUNT) ?>"><?= __("i tuoi dati") ?></a>
            | <a href="<?php echo wp_logout_url(home_url()); ?>" title="Logout">logout</a>&nbsp;&nbsp;
            </div><!-- end:clear -->



<? }else{ ?>


        <!-- ______________________  form login ______________________________________ -->
        <form class="cloud_form form-horizontal" id="modulo_login_utente" action="" method="post">
            <input type="hidden" name="azione" value="login-utente" />
            <input type="hidden" name="landing_pag" value="<?= get_permalink(ID_PAG_UTENTE_ACCOUNT) ?>" />
            <input type="hidden" name="remember" value="true" />

                <div class="form-group">
                    <label for="user_login" class='col-sm-6 control-label'><?= __("E-mail di login") ?> (*):</label>
                    <div class='col-sm-10'><input type="email" name="user_login" id="user_login" class="form-control" required /></div>
                </div>
                <div class="form-group">
                    <label for="user_password" class='col-sm-6 control-label'><?= __("Password") ?> (*):</label>
                     <div class='col-sm-10'><input type="password" class='form-control' name="user_password" id="user_password" value="" required /></div>
                </div>
                <div class="form-group" style="text-align:center">
                    <button type="submit" class="btn btn-default">Login &#8250;</button>
                </div><!-- /form-group -->
        </form>




        <!-- ______________________  form password dimenticata ______________________________________ -->
        <form class="cloud_form" id="wp_request_form" action="" method="post" style="display:none">
            <input type="hidden" name="azione" value="richiesta-password">
            <input type="text" class="form-control" name="log" placeholder="<?= __("E-mail di login") ?>">
            <button type="submit" class="btn btn-default"><?= __("Invia password") ?> &#8250;</button>
            <div style="clear:both;"></div>
        </form>



        <div id='wp_login_options' style="text-align:right;">
        <a href="javascript:void(0)" class='link_password_dimenticata'><?= __("Password dimenticata?") ?></a>
        | <a href="<?= get_permalink(ID_PAG_UTENTE_REGISTRAZIONE) ?>" title="<?= get_the_title(ID_PAG_UTENTE_REGISTRAZIONE) ?>"><?= __("Registrati") ?></a>
        </div><!-- end:clear -->


        <script>
        jQuery('.link_password_dimenticata').click(function(){
            jQuery('#wp_login_form').slideToggle();
            jQuery('#wp_request_form').slideToggle();
            }); //click
        </script>

<? }//is_user_logged_in ?>
