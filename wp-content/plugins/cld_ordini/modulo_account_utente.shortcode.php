<style>
#foto_list div,
#gallery_list div{
	margin:5px;
	float:left;
	text-align:center;
	}
#foto_list div img,
#gallery_list div img{
	xxbackground-color:#ccc;
	border:1px solid #fff;
	-webkit-box-shadow: 0px 0px 5px 0px rgba(50, 50, 50, 0.75);
	-moz-box-shadow:    0px 0px 5px 0px rgba(50, 50, 50, 0.75);
	box-shadow:         0px 0px 5px 0px rgba(50, 50, 50, 0.75);
	-webkit-border-radius: 10%;
	-moz-border-radius:    10%;
	border-radius:         10%;
	width:150px;
	}

</style>



<form class="cloud_form form-horizontal" id="modulo_registrazione_utente" action="" method="POST" enctype="application/x-www-form-urlencoded">
<input type="hidden" name="azione" value="utente-update" />
<input type="hidden" name="user_id" value="<?= $current_user->user_id ?>" />
<input type="hidden" name="stato" id="stato" value="<?= $current_user->stato ?>" />



<!-- ______________________ dati utente ______________________ -->
	<fieldset><legend>Dati utente:</legend>
			<? $label="Nome";	$var = "nome"; ?>
            <? if($current_user->tipo_profilo!='azienda'){ ?>
            <div class="form-group">
                <label for="<?= $var ?>" class='col-sm-3 control-label'><?= __($label) ?>:</label>
                <div class='col-sm-9'><input type="text" name="<?= $var ?>" id="<?= $var ?>" value="<?= $current_user->$var ?>" class="form-control"></div>
            </div>
            <? }//tipo_profilo ?>

            <? $label="Cognome";	$var = "cognome"; ?>
            <? if($current_user->tipo_profilo!='azienda'){ ?>
            <div class="form-group">
                <label for="<?= $var ?>" class='col-sm-3 control-label'><?= __($label) ?>:</label>
                <div class='col-sm-9'><input type="text" name="<?= $var ?>" id="<?= $var ?>" value="<?= $current_user->$var ?>" class="form-control"></div>
            </div>
            <? }//tipo_profilo ?>

            <? $label="Ragione sociale";	$var = "ragione_sociale"; ?>
            <? if($current_user->tipo_profilo=='azienda'){ ?>
            <div class="form-group">
                <label for="<?= $var ?>" class='col-sm-3 control-label'><?= __($label) ?>:</label>
                <div class='col-sm-9'><input type="text" name="<?= $var ?>" id="<?= $var ?>" value="<?= $current_user->$var ?>" class="form-control"></div>
            </div>
            <? }//tipo_profilo ?>

            <? $label="Descrizione";	$var = "descrizione"; ?>
            <div class="form-group">
                <label for="<?= $var ?>" class='col-sm-3 control-label'><?= __($label) ?>:</label>
                <div class='col-sm-9'><textarea name="<?= $var ?>" id="<?= $var ?>" class="form-control"><?= $current_user->$var ?></textarea></div>
            </div>

            <? $label="Sesso";	$var = "sesso"; ?>
            <? if($current_user->tipo_profilo!='azienda'){ ?>
            <div class="form-group">
                    <label class='col-sm-3 control-label'><?= __($label) ?>:</label>
                    <div class='col-sm-9'>
                    <label class="radio-inline"><input type="radio" name="<?= $var ?>" id="<?= $var ?>_M" value="M" <? if($current_user->$var=="M"){ echo "checked"; } ?> > Maschio</label>
                    <label class="radio-inline"><input type="radio" name="<?= $var ?>" id="<?= $var ?>_F" value="F" <? if($current_user->$var=="F"){ echo "checked"; } ?>> Femmina</label>
                    </div>
            </div>
            <? }//tipo_profilo ?>

            <? $label="Data di nascita";	$var = "data_nascita_gg"; ?>
            <? if($current_user->tipo_profilo!='azienda'){ ?>
            <div class="form-group">
                    <label class='col-sm-3 control-label'><?= __($label) ?>:</label>
                    <div class='col-sm-3'><?= stampa_select_giorni($current_user->data_nascita_gg); ?></div>
                    <div class='col-sm-3'><?= stampa_select_mesi($current_user->data_nascita_mm); ?></div>
                    <div class='col-sm-3'><?= stampa_select_anni($current_user->data_nascita_aaaa); ?></div>
            </div>
            <? }//tipo_profilo ?>

			<? $label="Titolo di studio/Specializzazione";	$var = "titolo_studio"; ?>
            <? if($current_user->tipo_profilo!='azienda'){ ?>
            <div class="form-group">
                <label for="<?= $var ?>" class='col-sm-3 control-label'><?= __($label) ?>:</label>
                <div class='col-sm-9'><input type="text" name="<?= $var ?>" id="<?= $var ?>" value="<?= $current_user->$var ?>" class="form-control"></div>
            </div>
            <? }//tipo_profilo ?>

            <? $label="Provincia";	$var = "provincia"; ?>
            <div class="form-group">
                    <label class='col-sm-3 control-label'><?= __($label) ?>:</label>
                    <div class='col-sm-9'><?= stampa_select_provincie($current_user->$var); ?></div>
            </div>

            <? $label="Città";	$var = "citta"; ?>
            <div class="form-group">
                    <label class='col-sm-3 control-label'><?= __($label) ?>:</label>
                    <div class='col-sm-9'><input type="text" name="<?= $var ?>" id="<?= $var ?>" value="<?= $current_user->$var ?>" class="form-control"></div>
            </div>

            <? $label="CAP";	$var = "cap"; ?>
            <div class="form-group">
                    <label class='col-sm-3 control-label'><?= __($label) ?>:</label>
                    <div class='col-sm-9'><input type="text" name="<?= $var ?>" id="<?= $var ?>" value="<?= $current_user->$var ?>" class="form-control"></div>
            </div>

			<? $label="Disponibile a spostarsi";	$var = "disponibile_spostarsi"; ?>
            <? if($current_user->tipo_profilo!='azienda'){ ?>
            <div class="form-group">
                    <label class='col-sm-3 control-label'><?= __($label) ?>:</label>
                    <div class='col-sm-9'>
                    <label class="radio-inline"><input type="radio" name="<?= $var ?>" id="<?= $var ?>_SI" value="SI" <? if($current_user->$var=="SI"){ echo "checked"; } ?> > SI</label>
                    <label class="radio-inline"><input type="radio" name="<?= $var ?>" id="<?= $var ?>_NO" value="NO" <? if($current_user->$var=="NO"){ echo "checked"; } ?>> NO</label>
                    </div>
            </div>
            <? }//tipo_profilo ?>

			<? $label="P.IVA";	$var = "piva"; ?>
            <div class="form-group">
                <label for="<?= $var ?>" class='col-sm-3 control-label'><?= __($label) ?>:</label>
                <div class='col-sm-9'><input type="text" name="<?= $var ?>" id="<?= $var ?>" value="<?= $current_user->$var ?>" class="form-control"></div>
            </div>
	</fieldset>



<!-- ______________________ allegati ______________________ -->
	<fieldset><legend>Allegati:</legend>
       	<? $label="Foto/Logo";	$var = "foto"; ?>
        <div class="form-group">
            <label for="<?= $var ?>" class='col-sm-3 control-label'><?= __($label) ?>:</label>
            <div class='col-sm-9'>
                        <!-- ##################### FOTO ####################### -->
                        <div id='foto_list'>
                        <? 	$img = $current_user->$var;
                            if($img!=''){
									$upload_dir = wp_upload_dir();
									$img_url = $upload_dir[baseurl].'/profiles/'.$current_user->ID.'/'.$img;
									echo '<div>';
									echo '<img style="width:150px" src="'.$img_url.'" />';
									echo '<br>[<a id="'.$img.'" href="javascript:void(0)" class="link_cancella_foto">Cancella</a>]';
									echo '</div>';
									}//vuoto
                        ?>
                        </div><!-- /foto_list -->
                        <div style="clear:both"></div>
                        <? if($current_user->$var==''){ ?><div id="fotofileuploader" class='ignore'>Carica foto/logo</div><? }//current_user ?>
                        <input type='hidden' class="ignore" name="<?= $var ?>" id="<?= $var ?>" value="<?= $current_user->$var ?>"  >
            </div>
        </div>


       	<? $label="Gallery";	$var = "gallery"; ?>
            <? if($current_user->tipo_profilo!='azienda'){ ?>
        <div class="form-group">
            <label for="<?= $var ?>" class='col-sm-3 control-label'><?= __($label) ?>:</label>
            <div class='col-sm-9'>
                        <!-- ##################### GALLERY ####################### -->
                        <div id='gallery_list'>
                        <?  $images = explode(";",$current_user->$var);
                        foreach($images as $img){
                            if($img!=''){
							$upload_dir = wp_upload_dir();
                            $img_url = $upload_dir[baseurl].'/profiles/'.$current_user->ID.'/'.$img;

                            echo '<div>';
                            echo '<img style="width:150px" src="'.$img_url.'" />';
                            //echo do_shortcode('[phpThumb img_url="'.$img_url.'" w=100 h=100]');
                            echo '<br>[<a id="'.$img.'" href="javascript:void(0)" class="link_cancella_gallery">Cancella</a>]';
                            echo '</div>';
                            }//vuoto
                            }//foreach
                        ?>
                        </div><!-- /gallery_list -->
                        <div style="clear:both"></div>
                        <? if(count($current_user->$var)<6){ ?><div id="mulitplefileuploader" class='ignore'>Carica le foto</div><? }//count ?>
                        <input type='hidden' class="ignore" name="<?= $var ?>" id="<?= $var ?>" value="<?= $current_user->$var ?>"  >
            </div>
        </div>
        <? }//tipo_profilo ?>


       	<? $label="Curriculum";	$var = "allegato"; ?>
            <? if($current_user->tipo_profilo!='azienda'){ ?>
        <div class="form-group">
            <label for="<?= $var ?>" class='col-sm-3 control-label'><?= __($label) ?>:</label>
            <div class='col-sm-9'>
                        <!-- ##################### allegato ####################### -->
                        <div id='allegato_list'>
                        <? 	$allegato = $current_user->$var;
                            if($allegato!=''){
									$upload_dir = wp_upload_dir();
									$allegato_url = $upload_dir[baseurl].'/profiles/'.$current_user->ID.'/'.$allegato;
									echo '<div>';
									echo '<a href="'.$allegato_url.'" target="_blank"><img style="width:32px" src="'.plugin_dir_url(__FILE__).'ico_attachments/pdf.png">'.$allegato.'</a>';
									echo '&nbsp;&nbsp;&nbsp;[<a id="'.$allegato.'" href="javascript:void(0)" class="link_cancella_allegato">Cancella</a>]';
									echo '</div>';
									}//vuoto
                        ?>
                        </div><!-- /foto_list -->
                        <div style="clear:both"></div>
                        <? if($current_user->$var==''){ ?><div id="allegatofileuploader" class='ignore'>Carica Curriculum</div><? }//current_user ?>
                        <input type='hidden' class="ignore" name="<?= $var ?>" id="<?= $var ?>" value="<?= $current_user->$var ?>"  >

            </div><!-- col-sm-9 -->
        </div>
        <? }//tipo_profilo ?>
	</fieldset>


<!-- ______________________ Specializzazioni ______________________ -->
	<? if($current_user->tipo_profilo!='azienda'){ ?>
	<fieldset><legend><?= __("Mi propongo come") ?>:</legend>
	        <div class="form-group" style="padding:10px 0px; border-bottom:1px dotted #FFD302;">
			<? $term = get_term(11, 'specializzazioni'); //--carico i dettagli della categorie  ?>
			<label for="<?= $term->slug ?>" class='col-sm-3 control-label'><?= __($term->name) ?>:</label>
                    <div class='col-sm-9'>
					<? stampa_checkbox_specializzazioni($term, $current_user->specializzazioni) ?>
       				</div><!-- /col-sm-9 -->
					</div>

	        <div class="form-group" style="padding:10px 0px; border-bottom:1px dotted #FFD302;">
			<? $term = get_term(44, 'specializzazioni'); //--carico i dettagli della categorie  ?>
			<label for="<?= $term->slug ?>" class='col-sm-3 control-label'><?= __($term->name) ?>:</label>
                    <div class='col-sm-9'>
					<? stampa_checkbox_specializzazioni($term, $current_user->specializzazioni) ?>
       				</div><!-- /col-sm-9 -->
					</div>

	        <div class="form-group" style="padding:10px 0px; border-bottom:1px dotted #FFD302;">
			<? $term = get_term(50, 'specializzazioni'); //--carico i dettagli della categorie  ?>
            <label for="<?= $term->slug ?>" class='col-sm-3 control-label'><?= __($term->name) ?>:</label>
                    <div class='col-sm-9'>
					<? stampa_checkbox_specializzazioni($term, $current_user->specializzazioni) ?>
       				</div><!-- /col-sm-9 -->
                    </div>

	        <div class="form-group" style="padding:10px 0px; border-bottom:1px dotted #FFD302;">
			<? $term = get_term(55, 'specializzazioni'); //--carico i dettagli della categorie  ?>
            <label for="<?= $term->slug ?>" class='col-sm-3 control-label'><?= __($term->name) ?>:</label>
                    <div class='col-sm-9'>
					<? stampa_checkbox_specializzazioni($term, $current_user->specializzazioni) ?>
                   	</div><!-- /col-sm-9 -->
                    </div>

    <input type='hidden' class="ignore" name="specializzazioni" id="specializzazioni" value="<?= $current_user->specializzazioni ?>"  >
	</fieldset>
    <? }//azienda ?>


<!-- ______________________ Settore ______________________ -->
	<? if($current_user->tipo_profilo=='azienda'){ ?>
	<fieldset><legend><?= __("Settore") ?>:</legend>
                    <div class='col-sm-offset-3 col-sm-9'>
					<? stampa_checkbox_specializzazioni($term, $current_user->specializzazioni) ?>
       				</div><!-- /col-sm-9 -->
				    <input type='hidden' class="ignore" name="specializzazioni" id="specializzazioni" value="<?= $current_user->specializzazioni ?>"  >
	</fieldset>
    <? }//azienda ?>







<!-- ______________________ Contatti ______________________ -->
	<fieldset><legend>Contatti:</legend>
			<? $label="Telefono";	$var = "tel"; ?>
            <div class="form-group">
                <label for="<?= $var ?>" class='col-sm-3 control-label'><?= __($label) ?>:</label>
                <div class='col-sm-9'><input type="text" name="<?= $var ?>" id="<?= $var ?>" value="<?= $current_user->$var ?>" class="form-control"></div>
            </div>

			<? $label="E-mail di notifica";	$var = "mail"; ?>
            <div class="form-group">
                <label for="<?= $var ?>" class='col-sm-3 control-label'><?= __($label) ?>:</label>
                <div class='col-sm-9'><input type="text" name="<?= $var ?>" id="<?= $var ?>" value="<?= $current_user->$var ?>" class="form-control"></div>
            </div>

			<? $label="<i class='entypo-facebook'></i> Facebook";	$var = "social1"; ?>
            <div class="form-group">
                <label for="<?= $var ?>" class='col-sm-3 control-label'><?= __($label) ?>:</label>
                <div class='col-sm-9'><input type="text" name="<?= $var ?>" id="<?= $var ?>" value="<?= $current_user->$var ?>" class="form-control"></div>
            </div>

			<? $label="<i class='entypo-gplus'></i> Google plus";	$var = "social2"; ?>
            <div class="form-group">
                <label for="<?= $var ?>" class='col-sm-3 control-label'><?= __($label) ?>:</label>
                <div class='col-sm-9'><input type="text" name="<?= $var ?>" id="<?= $var ?>" value="<?= $current_user->$var ?>" class="form-control"></div>
            </div>

			<? $label="<i class='entypo-linkedin'></i> Linkedin";	$var = "social3"; ?>
            <div class="form-group">
                <label for="<?= $var ?>" class='col-sm-3 control-label'><?= __($label) ?>:</label>
                <div class='col-sm-9'><input type="text" name="<?= $var ?>" id="<?= $var ?>" value="<?= $current_user->$var ?>" class="form-control"></div>
            </div>

			<? $label="<i class='entypo-twitter'></i> Twitter";	$var = "social4"; ?>
            <div class="form-group">
                <label for="<?= $var ?>" class='col-sm-3 control-label'><?= __($label) ?>:</label>
                <div class='col-sm-9'><input type="text" name="<?= $var ?>" id="<?= $var ?>" value="<?= $current_user->$var ?>" class="form-control"></div>
            </div>

			<? $label="Social 5";	$var = "social5"; ?>
            <!-- div class="form-group">
                <label for="<?= $var ?>" class='col-sm-3 control-label'><?= __($label) ?>:</label>
                <div class='col-sm-9'><input type="text" name="<?= $var ?>" id="<?= $var ?>" value="<?= $current_user->$var ?>" class="form-control"></div>
            </div -->
	</fieldset>


<!-- ______________________ Submit ______________________ -->
	<div class="form-group" style="text-align:center;">
		<button type="submit" class="btn btn-default">Salva</button>
	</div><!-- /form-group -->

</form><!-- /modulo_registrazione_utente -->


<div style="text-align:right">
<a href="<?php echo wp_logout_url(home_url()); ?>" title="Logout">logout</a>
</div><!-- end:clear -->






<link href="<?= plugin_dir_url(__FILE__); ?>css/uploadfile.css" rel="stylesheet">
<script src="<?= plugin_dir_url(__FILE__); ?>js/jquery.uploadfile.min.js"></script>

<script type="text/javascript">
jQuery(function(){

	//----- foto form -----
	jQuery("#fotofileuploader").uploadFile({
			url: 			"<?= plugin_dir_url(__FILE__); ?>jquery-upload-file.php?nome_campo=foto&output_dir=<?= $current_user->ID ?>",
			allowedTypes:	"jpg,png",
			maxFileSize:	200000000,
			fileName: 		"foto",
			multiple: 		false,
			method: 		"POST",
			onSuccess:function(files,data,xhr){			jQuery('#foto').val(jQuery('#foto').val()+data); 	},
			onError: function(files,status,errMsg){     alert("Upload Failed");		},
			afterUploadAll:function(){					jQuery('.ajax-file-upload-statusbar').fadeOut(); jQuery('#foto_list').html('<div class="ajax-file-upload-green">Caricamento foto eseguito, <b>Salva la pagina</b> per confermare.</div>'); 	}
			});


	//----- uploadFile form -----
	jQuery("#mulitplefileuploader").uploadFile({
			url: 			"<?= plugin_dir_url(__FILE__); ?>jquery-upload-file.ajax.php?nome_campo=gallery&output_dir=<?= $current_user->ID ?>",
			allowedTypes:	"jpg,png",
			maxFileSize:	200000000,
			fileName: 		"gallery",
			multiple: 		true,
			method: 		"POST",
			autoSubmit		:true,
			maxFileCount	:6,
			onSuccess:function(files,data,xhr){			jQuery('#gallery').val(jQuery('#gallery').val()+";"+data); 	},
			onError: function(files,status,errMsg){     alert("Upload Failed");		},
			afterUploadAll:function(){					jQuery('.ajax-file-upload-statusbar').fadeOut(); jQuery('#gallery_list').html('<div class="ajax-file-upload-green">Caricamento dati eseguito, <b>Salva la pagina</b> per confermare.</div>'); 	}
			});




	//----- allegato form -----
	jQuery("#allegatofileuploader").uploadFile({
			url: 			"<?= plugin_dir_url(__FILE__); ?>jquery-upload-file.php?nome_campo=allegato&output_dir=<?= $current_user->ID ?>",
			allowedTypes:	"pdf,doc,zip",
			maxFileSize:	200000000,
			fileName: 		"allegato",
			multiple: 		false,
			method: 		"POST",
			onSuccess:function(files,data,xhr){			jQuery('#allegato').val(jQuery('#allegato').val()+data); 	},
			onError: function(files,status,errMsg){     alert("Upload Failed");		},
			afterUploadAll:function(){					jQuery('.ajax-file-upload-statusbar').fadeOut(); jQuery('#allegato_list').html('<div class="ajax-file-upload-green">Caricamento allegato eseguito, <b>Salva la pagina</b> per confermare.</div>'); 	}
			});



	//----- validazione form -----
	jQuery("#cloud_form").validate({
		rules:{
			user_login:		{required:true, email:true},
			user_pass:		"required",
		    user_pass2: 	{equalTo:"#user_pass"},
			ragione_sociale:"required",
			piva:			"required",
			tel:			"required",
			provincia:		"required",
			privacy:		"required"
			},//rules
		messages:{
			user_login:		"Inserire un indirizzo e-mail valido",
			user_pass:		"Campo obbligatorio!",
			user_pass2:		"Le password non coincidono!",
			ragione_sociale:"Campo obbligatorio!",
			piva:			"Campo obbligatorio!",
			tel:			"Campo obbligatorio!",
			provincia:		"Campo obbligatorio!",
			privacy:		"Campo obbligatorio!"
			}//messages
	});//validate



	jQuery('.link_cancella_gallery').click(function(){
		jQuery(this).parent().css('opacity','0.4');	//--opacizzo la foto
		jQuery(this).html('<?= __("Salva per confermare") ?>'); //--cambio il testo del link

		var imgs_gallery	= jQuery('#gallery').val();
		var img_2_remove 	= jQuery(this).attr('id');
		imgs_gallery 		= imgs_gallery.replace(';'+img_2_remove,'');  //--tolgo la foto dal campo da salvare
		jQuery('#gallery').val(imgs_gallery);
		console.log(img_2_remove+" - "+imgs_gallery);
		});//click



	jQuery('.link_cancella_foto').click(function(){
		jQuery(this).parent().css('opacity','0.4');	//--opacizzo la foto
		jQuery(this).html('<?= __("Salva per confermare") ?>'); //--cambio il testo del link

		var imgs_gallery	= jQuery('#foto').val();
		var img_2_remove 	= jQuery(this).attr('id');
		imgs_gallery 		= imgs_gallery.replace(img_2_remove,'');  //--tolgo la foto dal campo da salvare
		jQuery('#foto').val(imgs_gallery);
		});//click


	jQuery('.link_cancella_allegato').click(function(){
		jQuery(this).parent().css('opacity','0.4');	//--opacizzo la foto
		jQuery(this).html('<?= __("Salva per confermare") ?>'); //--cambio il testo del link

		var imgs_gallery	= jQuery('#allegato').val();
		var img_2_remove 	= jQuery(this).attr('id');
		imgs_gallery 		= imgs_gallery.replace(img_2_remove,'');  //--tolgo la foto dal campo da salvare
		jQuery('#allegato').val(imgs_gallery);
		});//click


		jQuery('.checkbox-specializzazione').change(function(){ 		riempi_lista_specializzazioni() });//change
});//ready


function riempi_lista_specializzazioni(){
	 var val2save 	= "";
	 var counter 	= 0
	 jQuery(".checkbox-specializzazione").each(function(){
						if(jQuery(this).is(':checked')){

								counter++;
								console.log(counter);
								if(counter>5){
									jQuery(this).attr('checked',false);
									alert("<?= __("Selezionare al massimo 5 specializzazioni!") ?>");
									return false;
									}

								val2save += jQuery(this).val()+"#";
								}//checked
								});//each


	 jQuery("#specializzazioni").val(val2save);
	 }//riempi_lista_impieghi


</script>