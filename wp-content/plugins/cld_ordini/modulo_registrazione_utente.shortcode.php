
<form class="cloud_form form-horizontal" id="modulo_registrazione_utente" action="" method="POST" enctype="application/x-www-form-urlencoded">
<input type="hidden" name="azione" value="utente-insert" />
<input type="hidden" name="landing_page" id="landing_page" value="<?=  $_SERVER['SERVER_NAME'] ?>" />
<input type="hidden" name="stato" id="stato" value="0" />

	<fieldset><legend>Dati di login:</legend>
        <div class="form-group">
            <label for="user_login" class='col-sm-3 control-label'><?= __("E-mail di login") ?> (*):</label>
            <div class='col-sm-9'><input type="email" name="user_login" id="user_login" class="form-control"  required>
			<div class="help-block"><?= __("Questo campo non potrà più essere modificato") ?></div></div>
        </div>
        <div class="form-group">
            <label for="user_pass" class='col-sm-3 control-label'><?= __("Password") ?> (*):</label>
            <div class='col-sm-9'><input type="password" class='form-control' name="user_pass" id="user_pass" value="" required /></div>
        </div>
        <div class="form-group">
            <label for="user_pass_2" class='col-sm-3 control-label'><?= __("Ripeti password") ?> (*):</label>
            <div class='col-sm-9'><input type="password" class='form-control' name="user_pass_2" id="user_pass_2" value="" required />
			<div class="help-block"><?= __("Digitare nuovamente la password") ?></div></div>
        </div>
	</fieldset>


	<fieldset><legend>Dati utente:</legend>
        <div class="form-group">
            <label for="nome" class='col-sm-3 control-label'><?= __("Nome") ?>:</label>
            <div class='col-sm-9'><input type="text" name="nome" id="nome" class="form-control"></div>
        </div>
        
        <div class="form-group">
            <label for="cognome" class='col-sm-3 control-label'><?= __("Cognome") ?>:</label>
             <div class='col-sm-9'><input type="text" name="cognome" id="cognome" class="form-control"></div>
        </div>
        
        <div class="form-group">
            <label for="ragione_sociale" class='col-sm-3 control-label'><?= __("Ragione sociale") ?>:</label>
             <div class='col-sm-9'><input type="text" name="ragione_sociale" id="ragione_sociale" class="form-control"></div>
        </div>

        <div class="form-group">
            <label for="tipologia" class='col-sm-3 control-label'><?= __("Tipo profilo") ?> (*):</label>
             <div class='col-sm-9'>
              <label class="radio-inline"><input type="radio" name="tipo_profilo" id="tipo_profilo" value="professionista"> Professionista/Istruttore</label>
              <label class="radio-inline"><input type="radio" name="tipo_profilo" id="tipo_profilo" value="azienda"> Azienda</label>
             </div>
        </div>
	</fieldset>


	<div class="form-group" style="text-align:center">
    <div class="col-sm-12">
        <label><input type="checkbox" id="privacy" type="checkbox" name="privacy" value="on"> <?= __("Conosco e accetto") ?> <a target="_blank" href="<?= get_stylesheet_directory_uri(); ?>/legge_privacy.php"> <?= __("l'informativa sul trattamento dei dati personali") ?></a></label>
      </div>

	<br>
	<button type="submit" class="btn btn-default">Registrati &#8250;</button>
	</div><!-- /form-group -->

</form><!-- /modulo_registrazione_utente -->

<div id='wp_login_options' style="text-align:right;">
<a href="<?= get_permalink(ID_PAG_UTENTE_LOGIN) ?>" title="<?= get_the_title(ID_PAG_UTENTE_LOGIN) ?>"><?= __("Pagina di login") ?></a>
</div><!-- end:clear -->

<script type="text/javascript">
jQuery(function(){

	//----- validazione form -----
	jQuery("#modulo_registrazione_utente").validate({
		rules:{
			user_login:		{required:true, email:true},
			user_pass:		"required",
		    user_pass_2: 	{equalTo:"#user_pass"},
			tipo_profilo:	"required",
			privacy:		"required"
			},//rules
		messages:{
			user_login:		"Inserire un indirizzo e-mail valido",
			user_pass:		"Campo obbligatorio!",
			user_pass_2:	"Le password non coincidono!",
			tipo_profilo:	"Campo obbligatorio!",
			privacy:		"Campo obbligatorio!"
			}//messages
	});//validate
});//ready
</script>