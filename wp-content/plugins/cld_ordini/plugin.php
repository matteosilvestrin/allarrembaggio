<?php
/*
Plugin Name: cloud ordini
Plugin URI: http://www.cloudgroup.it
Description: plug-in per la gestione ordini
Version: 1.0
Author: CloudGroup
Author URI: http://www.cloudgroup.it
*/



/*-________________ variabii globali _____________-*/
$mail_company 			= "info@allarrembaggio.com";
$mail_webmaster		= "info@allarrembaggio.com";
$mail_bcc				= "matteo.silvestrin@gmail.com";

define('NOME_TBL', 				$wpdb->prefix."cld_ordini");
define('ID_PAG_UTENTE_REGISTRAZIONE', 	12);
define('ID_PAG_UTENTE_LOGIN', 			33);
define('ID_PAG_UTENTE_ACCOUNT', 		35);


include('cld_utenti_funzioni_varie.php');




//--______ attacco i css/js a questo plug in ________________
function cloud_stili_e_script(){
    //wp_register_style('cf_css', plugins_url('cf_css.css', __FILE__) );
   	//wp_enqueue_style('jquery-ui-css', 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css');
	//wp_enqueue_script( 'jquery-ui' , 'https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js' );

	wp_enqueue_style('fontawesome', 	plugins_url('/css/font-awesome.min.css', __FILE__));

	wp_enqueue_style('datetimepicker', 	plugins_url('/datetimepicker-master/jquery.datetimepicker.css', __FILE__));
	wp_enqueue_script('datetimepicker', plugins_url('/datetimepicker-master/jquery.datetimepicker.js', __FILE__), array('jquery'));

    wp_register_script('jquery.validate', plugins_url('/js/jquery.validate.min.js', __FILE__), array('jquery'));
    wp_enqueue_script('jquery.validate');
    }//ccp_plugin_admin_init


function cloud_stili_e_script_admin(){
	wp_enqueue_style('fontawesome', 	plugins_url('/css/font-awesome.min.css', __FILE__));

	wp_enqueue_style('datetimepicker', 	plugins_url('/datetimepicker-master/jquery.datetimepicker.css', __FILE__));
	wp_enqueue_script('datetimepicker', plugins_url('/datetimepicker-master/jquery.datetimepicker.js', __FILE__), array('jquery'));

    wp_register_script('jquery.validate', plugins_url('/js/jquery.validate.min.js', __FILE__), array('jquery'));
    wp_enqueue_script('jquery.validate');
    wp_register_script('jquery.dataTables', plugins_url('/js/jquery.dataTables.min.js', __FILE__), array('jquery'));
    wp_enqueue_script('jquery.dataTables');
    }//ccp_plugin_admin_init




function inizializza_plugin(){
	add_menu_page('Lista ordini', 'Lista ordini', 'read', 'admin_lista_ordini', 'admin_lista_ordini');
	add_submenu_page('admin_lista_ordini', 'Modifica ordine', 'Modifica ordine', 'read', 'admin_modifica_ordine', 'admin_modifica_ordine');
	add_submenu_page('admin_lista_ordini', 'Esporta contatti', 'Esporta contatti', 'read', 'admin_export_contatti', 'admin_export_contatti');
	}//cai_inizializza_plugin


function admin_lista_ordini(){
	include_once("admin_lista_ordini.php");
	}//cai_auto_import_pag


function admin_modifica_ordine(){
	global $wpdb;

	$id 	= $_REQUEST[id];
	$row 	= cloud_dettaglio_ordine($id);

	include_once("admin_modifica_ordine.php");
	}//cai_auto_import_pag


function admin_export_contatti(){
	include_once("admin_export_contatti.php");
	}//cai_auto_import_pag








function cloud_export_skebby(){
	global $wpdb;

	$rows		= cloud_lista_ordini();
	$separator 	= ";";
	$end_line	= "\r\n";

	$export 	= "";
	$export 	.= "nome".$separator;
	$export 	.= "cognome".$separator;
	$export 	.= "soprannome".$separator;
	$export 	.= "email".$separator;
	$export 	.= "sesso".$separator;
	$export 	.= "compleanno".$separator;
	$export 	.= "indirizzo".$separator;
	$export 	.= "citta".$separator;
	$export 	.= "stato".$separator;
	$export 	.= "cap".$separator;
	$export 	.= "note".$separator;
	$export 	.= "var1".$separator;
	$export 	.= "var2".$separator;
	$export 	.= "var3".$separator;
	$export 	.= "numero".$separator;
	$export 	.= "gruppi".$separator;
	$export 	.= "altro numero".$end_line;

	if(!empty($rows)){
	foreach($rows as $row){
				$export .= $row->nominativo.$separator;
				$export .= $separator;
				$export .= $separator;
				$export .= $row->mail.$separator;
				$export .= $separator;
				$export .= $row->data_nascita_b.$separator;
				$export .= $row->indirizzo.$separator;
				$export .= $row->localita.' - '.$row->provincia.$separator;
				$export .= $separator;
				$export .= $separator;
				$export .= $separator;
				$export .= $separator;
				$export .= $separator;
				$export .= $row->mail.$separator;
				$export .= $row->telefono.$separator;
				$export .= $separator;
				$export .= $separator;
				$export .= $end_line;
	}//foreach
	}//empty

	header("Content-type: application/csv;charset=UTF-8");
	header("Content-Disposition: inline; filename=lista_contatti_skebby.csv");

	echo $export;
	exit;
	}










//funzione che converte in array appetibili
function cloud_converti_dati_post($dati){
		extract($dati);
		$row2save = array();

		if(!empty($id)){					$row2save['id']					= trim($id);			}
		if(!empty($servizio)){				$row2save['servizio']			= trim($servizio);			}
		if(!empty($nominativo)){			$row2save['nominativo'] 		= trim($nominativo);		} 		//--imposto la password in tbl cld_utenti
		if(!empty($indirizzo)){				$row2save['indirizzo']			= trim($indirizzo);			}
		if(!empty($localita)){				$row2save['localita']			= trim($localita);		}
		if(!empty($provincia)){				$row2save['provincia'] 			= $provincia;		}
		if(!empty($telefono)){				$row2save['telefono'] 			= trim($telefono);	}
		if(!empty($mail)){					$row2save['mail'] 				= trim($mail);	}
		if(!empty($cod_fiscale)){			$row2save['cod_fiscale'] 		= trim($cod_fiscale);			}
		if(!empty($nominativo_b)){			$row2save['nominativo_b'] 		= $nominativo_b;		}
		if(!empty($data_nascita_b)){		$row2save['data_nascita_b'] 	= $data_nascita_b;		}
		if(!empty($indirizzo_b)){			$row2save['indirizzo_b'] 		= $indirizzo_b;	}
		if(!empty($localita_b)){			$row2save['localita_b'] 		= trim($localita_b);			}
		if(!empty($provincia_b)){			$row2save['provincia_b'] 		= $provincia_b;			}
		if(!empty($fratelli_sorelle)){		$row2save['fratelli_sorelle'] 	= $fratelli_sorelle;					}
		if(!empty($n_bambini)){					$row2save['n_bambini'] 			= trim($n_bambini);			}
		if(!empty($n_adulti)){					$row2save['n_adulti'] 			= trim($n_adulti);			}
		if(!empty($esclusiva)){					$row2save['esclusiva'] 			= trim($esclusiva);			}
		if(!empty($catering)){					$row2save['catering'] 			= trim($catering);			}
		if(!empty($data_evento)){				$row2save['data_evento'] 		= trim($data_evento);			}
		if(!empty($servizi_aggiuntivi)){		$row2save['servizi_aggiuntivi'] = trim($servizi_aggiuntivi);			}
		if(!empty($dettaglio_servizio)){		$row2save['dettaglio_servizio'] 		= trim($dettaglio_servizio);			}
		if(!empty($allergie)){					$row2save['allergie'] 			= trim($allergie);			}
		if(!empty($data_inizio)){				$row2save['data_inizio'] 		= trim($data_inizio);			}
		if(!empty($data_fine)){					$row2save['data_fine'] 			= trim($data_fine);			}
		if(!empty($orario)){				$row2save['orario'] 			= trim($orario);			}
		if(!empty($delegato1)){				$row2save['delegato1'] 			= trim($delegato1);			}
		if(!empty($delegato1_tel)){			$row2save['delegato1_tel'] 		= trim($delegato1_tel);			}
		if(!empty($delegato2)){				$row2save['delegato2'] 			= trim($delegato2);			}
		if(!empty($delegato2_tel)){			$row2save['delegato2_tel'] 		= trim($delegato2_tel);			}
		if(!empty($area)){					$row2save['area'] 				= trim($area);			}
		if(!empty($stato)){					$row2save['stato'] 				= trim($stato);			}
		if(!empty($acconto)){				$row2save['acconto'] 			= trim($acconto);			}
											$row2save['modified'] 			= trim($modified);

		return $row2save;
	}//cloud_converti_dati_post




function cloud_nome_servizio($n_servizio){
		$servizio = "";

		switch($n_servizio){
			case 1:
					$servizio = "COMPLEANNO (week-end)";
					break;
			case 2:
					$servizio = "COMPLEANNO (settimanale)";
					break;
			case 3:
					$servizio = "PARTY ALL'ARREMBAGGIO (week-end)";
					break;
			case 4:
					$servizio = "INGRESSO / SPAZIO BAMBINI";
					break;
			}//cloud_nome_servizio

	return $servizio;
	}//cloud_nome_servizio




function cloud_nome_stato($n_stato){
		$stato = "";

		switch($n_stato){
			case 0:
					$stato = "In sospeso";
					break;
			case 1:
					$stato = "Confermato";
					break;
			case 2:
					$stato = "Annullato";
					break;
			}//stato

	return $stato;
	}//cloud_nome_stato







function cloud_colore_stato($n_stato){
		$stato = '<i class="fa fa-circle"></i>';

		switch($n_stato){
			case 0:
					$stato = '<i class="fa fa-circle" style="color:#cccccc"></i>';
					break;
			case 1:
					$stato = '<i class="fa fa-circle" style="color:#00aa00"></i>';
					break;
			case 2:
					$stato = '<i class="fa fa-circle" style="color:#ff0000"></i>';
					break;
			}//stato

	return $stato;
	}//cloud_nome_stato









/*- ___________________ salvo i dati personalizzati nella tabella cld_utenti ________________________________________ -*/
function cloud_ordine_salva(){
	global $wpdb;
	global $msg_azione;
	global $table_name_no_prefix;

	extract($_REQUEST); 	//--prendo tutti i parametri in arrivo dal post e li converte in singole variabili($id, $nome, $descrizione...)  - belllaaaaaaaaaaaa sta funzione

	switch($azione){
		case 'ordine-insert':
						$row2save = array();
						$row2save 			= cloud_converti_dati_post($_POST);
						$ctrl 				= $wpdb->insert(NOME_TBL,$row2save); //--query insert entry

						if($ctrl){
							$order_id 	= $wpdb->insert_id;
							$msg_azione = 'ordine correttamente <strong>registrato</strong>';

							include("cloud_mailchimp_subscribe.inc.php");
							cloud_invia_mail_conferma_ordine($order_id);
							break;
						}else{
							$msg_azione = '<strong>errori</strong> nella creazione dell\'ordine'.'<br>'.$wpdb->last_query;
						}//$ctrl
						break;
		case 'ordine-update':
						$row2save 	= array();
						$row2save 	= cloud_converti_dati_post($_POST);
						$where 		= array('id' => $id);
						$ctrl 		= $wpdb->update(NOME_TBL,$row2save,$where); //--query update entry

						include("cloud_mailchimp_subscribe.inc.php");
						//cloud_invia_mail_conferma_ordine($id);
						cloud_scrivi_evento_in_calendar($id);
						if($ctrl==true){  	$msg_azione .= ' utente correttamente <strong>salvato</strong> ';
						}else{ 				$msg_azione .= ' <strong>errori</strong> di modifica utente '.'<br>'.$wpdb->last_query;  }
						break;
		case 'utente-activate':
						$row2save = array();
						$row2save['user_id'] 	= $user_id;
						$row2save['stato'] 		= $stato;

						$where 	= array('user_id' => $user_id);
						$ctrl 	= $wpdb->update(NOME_TBL,$row2save,$where); //--query update entry

						if($ctrl==true){
							$msg_azione='utente correttamente <strong>attivato</strong> ';
							cu_invia_mail_conferma_attivazione($user_id);
						}else{	$msg_azione='<strong>errori</strong> di attivazione utente ';	}
						break;
		}//switch-acione
	}//cloud_ordine_salva





/*-____ integra tutti i dati del della tabella cloud in una variabile globale $current_user _______ -*/
function cloud_dettaglio_ordine($id=null){
	global $wpdb;
	global $msg_azione;

	$sql 			= " SELECT * FROM ".NOME_TBL." WHERE id=".$id ;
	$row 			= $wpdb->get_row($sql);

	return $row;
	}//cgu_login_utente




/*- verifico che l'attuale curruser->ID esista e sia loggato -*/
function cu_check_permessi_utente($user_id){
			$output = '';
            $output .= '<div class="callout callout-danger"><center>';
            $output .= '<h4>Accesso Negato!</h4>';
            $output .= __("Non hai i permessi per accedere a questa pagina.<br>Verifica di essere correttamente loggato.");
            $output .= '<br><br><a href="'. get_permalink(33) .'" class="btn btn-default" role="button">'. get_the_title(33) .'</a>';
            $output .= '<br>oppure <a href="'. get_permalink(12) .'">'. get_the_title(12) .'</a>';
            $output .= '</center></div>';

			if(!empty($user_id)){		$output = 'ok';		}

			return $output;
			}//cu_check_permessi_utente




/*-____ tipo "cu_dettaglio_utente" però carica i dati su una variabile NON globale _______ -*/
function cu_caica_dettaglio_profilo($user_id=null){
	global $wpdb;
	if($user_id!=null){
						$prof = get_userdata($user_id);

						$myquery 		= " SELECT * FROM ".NOME_TBL." WHERE user_id=".$prof->ID ;
						$rows 			= $wpdb->get_row($myquery);

						if(count($rows)>0){
						foreach($rows as $key=>$value){
							$prof->$key = $value;
							}//foreach
						$prof->test = "test";
						}//cu_dettaglio_utente
	return $prof->data;
	}//user_id
	}//cu_caica_dettaglio_profilo








/*- ____________________ PRENDO I DATI PASSATI DAL FORM DI LOGIN E LOGGO L'UTENTE ___________________________ -*/
function cu_utenti_login(){
	if($_POST){
	global $msg_azione;
	global $mail_company;
	global $current_user;

	extract($_POST); 	//--prendo tutti i parametri in arrivo dal post e li converte in singole variabili($id, $nome, $descrizione...)  - belllaaaaaaaaaaaa sta funzione
	switch($azione){
		case "login-utente":
					$creds = array();
					$creds['user_login'] 	= $user_login;
					$creds['user_password'] = $user_password;
					$creds['remember'] 		= true;
					$ok = true;

					$user = wp_signon($creds, false);//--tento il login
					if(is_wp_error($user)){
						$msg_azione	= "Errori di login - username o password errati."; //--login errato
						$ok = false;
						} //--parametri di accesso

					/*-________ controllo lo stato _____-*/
					$current_user = cu_dettaglio_utente($user->data->ID); //--login ok, check attivazione
					$stato = $current_user->stato;
					if((is_user_logged_in()) && ($stato!=1)){
						$msg_azione	= "Il suo account non risulta ancora attivo.<br />Riprovi più tardi."; //--login errato
						wp_logout();
						unset($current_user);
						$ok = false;
						}//--stato utente

					if($ok){ 	header('Location: '.$landing_pag);		}//--ricarico la pagina
					//if(is_user_logged_in()){	header('Location: '.$landing_pag);		}//--ricarico la pagina
				break;
		case "richiesta-password":
				$user = get_user_by('email', $_POST['log']);
				 if(empty($user)){
 					$msg_azione	.= "<center>Questo indirizzo e-mail non risulta registrato!</center>";
				 }else{
					$user 	= cld_utenti_dettaglio_obj($user->id);

					$mittente			=	$mail_company;
					$destinatario		=	$user->user_email;
					$company_name		= 	get_bloginfo('name');
					$oggetto			= 	"Dati di accesso in ".get_bloginfo('name');
					$template_mail 		= 	WP_PLUGIN_DIR."/cld_utenti/tpl_mail_password.html";

					$body = file_get_contents($template_mail);
					$find_replace = array(
					'%nominativo%' 			=> $user->nome." ".$user->cognome,
					'%ragione_sociale%' 	=> $user->ragione_sociale,
					'%login%' 				=> $user->user_login,
					'%password%' 			=> $user->user_pass
					);
					$body = str_replace(array_keys($find_replace), array_values($find_replace), $body);
					$body = eregi_replace("[\]",'',$body);

					$header = "";
					$header .= "MIME-Version: 1.0\n";
					$header .= "Content-type: text/html; charset=utf-8 \n";
					$header .= "Organization: $company_name \n";
					$header .= "To: $destinatario \n";
					$header .= "From: $company_name <$mittente> \n";
					$header .= "Bcc: $destinatarioBCC \n";

					$ctrl = wp_mail($destinatario, $oggetto, $body, $header);
					if($ctrl){	$msg_azione	.= "<center>Gentile utente abbiamo appena inviato i sui dati all'indirizzo: ".$user->user_email."</center>";
					}else{		$msg_azione	.= "<center>ERRORI NELL'INVIO MAIL</center>"; 		}//ctrl

				}//user
				break;
		}//switch
	}//post
	}//cu_utenti_login






function cloud_invia_mail_conferma_ordine($id){
		$ordine = cloud_dettaglio_ordine($id);
		global $msg_azione;
		global $mail_company;
		global $mail_webmaster;
		global $mail_bcc;

		$ok					= 	false;

		$mail_webmaster		=	$mail_webmaster;
		$company_mail		= 	$mail_company;
		$company_name		= 	get_bloginfo('name');
		$destinatarioBCC	=	$mail_bcc;

		$oggetto 			= $ordine->nominativo_b." - ".formatta_data($ordine->data_evento)." - ".get_bloginfo('name');
		$template_mail 		= 	plugin_dir_url( __FILE__ )."tpl_mail_richiesta.html";
		$link_pdf 			= 	plugin_dir_url( __FILE__ )."html2pdf/generate_pdf.php?id=".$id;

		$body = '';
		$body .= '	<p>Mail inviata automaticamente dal sito www.allarrembaggio.com ';
		$body .= '	<p>Un nuovo ordine è appena stato eseguito.<br />Di seguito il riepilogo di tutti i suoi dati:<ul> ';
		$body .= '	<li>nominativo: '.$ordine->nominativo_b.'</li> ';
		$body .= '	<li>servizio: '.cloud_nome_servizio($ordine->servizio).'</li> ';
		$body .= '	<li>data evento: '.formatta_data($ordine->data_evento).'</li> ';
		$body .= '	<li>telefono: '.$ordine->telefono.'</li> ';
		$body .= '	<li>Scarica il PDF: <a href="'.$link_pdf.'">clicca qui</a><br>('.$link_pdf.')</li>';
		$body .= '	</ul></p><hr /><i><a href="http://www.allarrembaggio.com">allarrembaggio.com</a></i> ';

		$header = "";
		$header .= "Content-type: text/html; charset=utf-8\r\n";
		$header .= "Reply-To: $company_name <$destinatario> \r\n";
		$header .= "Bcc: $destinatarioBCC \r\n";

		$ok 	= wp_mail($mail_webmaster, $oggetto, $body, $header);


		if($ok){		$msg_azione .= "<br>Gentile Utente il suo ordine è stato <strong>correttamente inviato</strong>.<br />Sarà nostra premura ricontattarla quanto prima.<br>";
		}else{  		$msg_azione .= "<br>errori nell'invio dell'e-mail di riepilogo"; }
	}//cloud_invia_mail_conferma_ordine




function cu_invia_mail_conferma_attivazione($user_id){
		$current_user = cu_dettaglio_utente($user_id);
		global $msg_azione;
		global $mail_company;
		global $mail_webmaster;
		global $mail_bcc;

		$ok					= 	false;
		$destinatario		=	$current_user->user_login;
		$company_mail		= 	$mail_company;
		$company_name		= 	get_bloginfo('name');
		$destinatarioBCC	=	$mail_bcc;

		$oggetto			= 	"Benvenuto in ".get_bloginfo('name');
		$template_mail 		= 	WP_PLUGIN_DIR."/cld_utenti/tpl_mail_attivazione.html";

		$body = file_get_contents($template_mail);
		$find_replace = array(
		'%nominativo%' 			=> $current_user->nome." ".$current_user->cognome." ".$current_user->ragione_sociale,
		'%login%' 				=> $current_user->user_login,
		'%password%' 			=> $current_user->password
		);
		$body = str_replace(array_keys($find_replace), array_values($find_replace), $body);
		$body = eregi_replace("[\]",'',$body);

		$header = "";
		$header .= "Content-type: text/html; charset=utf-8\r\n";
		$header .= "From: $company_name <$company_mail> \r\n";
		$header .= "Reply-To: $company_name <$destinatario> \r\n";
		$header .= "Bcc: $destinatarioBCC \r\n";
		$ok = mail($destinatario, $oggetto, $body, $header);

		if($ok){ $msg_azione .= "<br>e-mail di attivazione inviata correttamente all'indirizzo: $destinatario<br>";
		}else{  $msg_azione .= "<br>errori nell'invio dell'e-mail di attivazione"; }
	}//invia_mail_conferma_registrazione







function cloud_dettaglio_profilo($atts, $content=null){
	global $msg_azione;
	global $current_user;
	ob_start();
	include("dettaglio_profilo.shortcode.php");
    $output = ob_get_clean();
    return $output;
	}//dettaglio_profilo



function cloud_filtri_profili($atts, $content=null){
	extract(shortcode_atts(array(
			'tipo_profilo' => 'azienda', //--valori di default
			),$atts));
	global $msg_azione;
	ob_start();
	include("filtri_profili.shortcode.php");
    $output = ob_get_clean();
    return $output;
	}//filtri_profili



function cloud_modulo_richiesta_ordine($atts=null, $content=null){
	global $msg_azione;
	ob_start();
	include("modulo_richiesta_ordine.shortcode.php");
    $output = ob_get_clean();
    return $output;
	}//cloud_modulo_richiesta_ordine




function cloud_modulo_login_utente($atts, $content=null){
	global $msg_azione;
	global $current_user;
	ob_start();
	include("modulo_login_utente.shortcode.php");
    $output = ob_get_clean();
    return $output;
	}//modulo_login_utente






function cloud_stampa_msg_azione($atts, $content=null){
	global $msg_azione;
	global $current_user;
	ob_start();
	include("stampa_msg_azione.shortcode.php");
    $output = ob_get_clean();
    return $output;
	}//cloud_stampa_msg_azione






function cloud_modulo_account_utente($atts, $content=null){
	global $current_user;
	global $msg_azione;
	ob_start();
	include("modulo_account_utente.shortcode.php");
    $output = ob_get_clean();
    return $output;
	}//modulo_account_utente







function cloud_lista_ordini($servizio=1, $annullati=0){
	global $wpdb;

			$sql = '';
			$sql .= ' SELECT * FROM '.NOME_TBL;
			if($annullati==0){	$sql.=' WHERE stato!=2 ';		}
			$sql .= ' ORDER BY modified DESC ';
			$rows   = $wpdb->get_results($sql);

    return $rows;
	}//cloud_lista_profili




function formatta_data($datetime){
	$output = new DateTime($datetime);
	$output =  $output->format('d/m/Y');
	return $output;
	}



function cloud_carica_lista_profili(){
	global $wpdb;

	$tipo_profilo 			= $_REQUEST['tipo_profilo'];

	$where 					= $_REQUEST['where'];
	$where 					= stripcslashes($where);
	$where					= json_decode($where);


	if(!empty($where->specializzazioni)){
		$where_spec = '';
		$specs = explode("#",$where->specializzazioni);
		foreach($specs as $spec){
				if(!empty($spec)){		$where_spec .= ' specializzazioni like "%'. $spec .'%" OR ';  }
				}//foreach
		$where_spec = substr($where_spec, 0, -3); //tolgo l'ultimo AND
		}//specializzazioni

	if(!empty($where->provincia)){
		$where_prov = ' provincia like "%'. $where->provincia .'%" ';
		}//provincia

	if(!empty($where->sesso)){
		$where_sesso = ' sesso like "%'. $where->sesso .'%" ';
		}//sesso


	$sql = '';
	$sql .= ' 	SELECT * from fjob_wp_users		';
	$sql .= ' 	INNER JOIN fjob_wp_cld_utenti on fjob_wp_cld_utenti.user_id = fjob_wp_users.id		';
	$sql .= ' 	WHERE tipo_profilo = "'. $tipo_profilo .'" ';
	if(!empty($where->specializzazioni)){		$sql .= ' AND ('.$where_spec.') ';	}
	if(!empty($where->provincia)){				$sql .= ' AND ('.$where_prov.') ';	}
	if(!empty($where->sesso)){					$sql .= ' AND ('.$where_sesso.') ';	}
	$sql .= ' 	ORDER BY nome	';
	//$sql .= ' 	stato = 1	';

	$rows   = $wpdb->get_results($sql);
	if(count($rows)>0){
			ob_start(); ?>
							<? foreach($rows as $row){
									if($tipo_profilo=='azienda'){
											$link_url = get_permalink(903).$row->user_id; //dettaglio-azienda
											}else{
											$link_url = get_permalink(867).$row->user_id; //pag-profilo
											}//tipo_profilo
											?>

											<div class="element isotope-item">
											<a href="<?= $link_url ?>"><img class='img-responsive' alt="//" src="<?= carica_foto_profilo($row->user_id) ?>"></a>
											<? if($tipo_profilo=='azienda'){ ?>
												<div class='element_info'><a href="<?= $link_url ?>"><?= $row->ragione_sociale ?></a></div><!-- /.element_info -->
											<? }else{ ?>
													<a href="<?= $link_url ?>">
													<div class="background">
													<div class="text">
													<div class="info">
															<p><i class="icon-user">&nbsp;</i><?= $row->nome ?> <?= $row->cognome ?></p>
															<span><i class="icon-doc-text"></i></span>
													</div>
													</div><!-- /text -->
													</div><!-- /background -->
													</a>
											<? } ?>
											</div><!-- /element -->
											<? }//foreach ?>
			<? }else{ ?>
							<div class="loading-ajax">Nessun risultato per la ricerca eseguta...</div>
			<? }//count ?>

	<div style="clear:both"></div><!-- / -->

	<!-- DEBUG -->
	<pre><?= $sql ?></pre>

	<? $output = ob_get_clean();
	echo $output;
	exit;
	}//cloud_tagliando-carica-lista-modelli





function cloud_scrivi_evento_in_calendar($id){
	global $wpdb;
	global $msg_azione;
	$ordine = cloud_dettaglio_ordine($id);

	$titolo_evento	= cloud_nome_servizio($ordine->servizio).' - '.$ordine->nominativo_b;
	$data 			= $ordine->data_evento;
	$stato 			= $ordine->stato;

	//--salvo in GCalendar solo se CONFERMATO
	if($stato==1){
		$ok 			= cloud_scrivi_calendar($titolo_evento, $data, '+2 hours', '', $ordine->id_gcalendar);//--scrivo l'evento in G-Calendar
		if($ok){
			$row2save 					= array();
			$row2save['id_gcalendar'] 	= $ok;
			$where 						= array('id' => $id);
			$ctrl 						= $wpdb->update(NOME_TBL,$row2save,$where); //--salvo l'id_gcalendar nel DB
			}

		if($ctrl){		$msg_azione .= " Evento <strong>correttamente salvato</strong> in Google Calendar (<i>".$ok."</i>)<br>";
		}else{  		$msg_azione .= " Errori nel salvataggio in Google Calendar<br> "; }
	}//stato
	}//cloud_scrivi_evento_in_calendar


/* QUESTA FUNZIONE CREIVE L'EVENTO IN GOOGLECALENDAR (http://blog.iangsy.com/2013/10/writing-events-to-calendar-with-php.html) */
function cloud_scrivi_calendar($evento_descr, $evento_start, $evento_durata='+2 hours', $evento_location='', $event_id=null){
					$evento_descr 		= $evento_descr;
					$evento_start1		= strtotime($evento_start);
					$evento_end1		= strtotime($evento_start.$evento_durata);
					$evento_location 	= $evento_location;

					/*************** DA QUI IN GIU NON TOCCHEREI PIU NULLA...  ******************/
					$app_name		= 'allarrembaggio';
					$client_id 		= '1034795448812-gghclbbghnvnmotg6as7524fraeojfnh.apps.googleusercontent.com';
					$email_address 	= '1034795448812-gghclbbghnvnmotg6as7524fraeojfnh@developer.gserviceaccount.com';
					$key_file 		= plugin_dir_path(__FILE__).'google-api-php-client/allarrembaggio-85318f0a4e9d.p12';
					$calendar_id 	= 'a664qplgbcimdaipce20cvtapc@group.calendar.google.com';

					$evento_start 	= gmdate('Y-m-d\TH:i:s', $evento_start1);
					$evento_end 	= gmdate('Y-m-d\TH:i:s', $evento_end1);

					require_once "google-api-php-client/src/Google_Client.php";
					require_once "google-api-php-client/src/contrib/Google_CalendarService.php";

					$client = new Google_Client();
					$client->setUseObjects(true);
					$client->setApplicationName($app_name);
					$client->setClientId($client_id);
					$client->setAssertionCredentials(
							new Google_AssertionCredentials(
											$email_address,
											array("https://www.googleapis.com/auth/calendar"),
											file_get_contents($key_file)
											)
										);//setAssertionCredentials

					$service 	= new Google_CalendarService($client);
					$event 		= new Google_Event();
					$event->setSummary($evento_descr);
					$event->setLocation($evento_location);
					$start = new Google_EventDateTime();
								$start->setDateTime($evento_start);
								$start->setTimeZone('Europe/Rome');
								$event->setStart($start);
					$end = new Google_EventDateTime();
								$end->setDateTime($evento_end);
								$end->setTimeZone('Europe/Rome');
								$event->setEnd($end);

					//--prima di crearlo, elimino eventuali eventi
					if($event_id!=null){		$service->events->delete($calendar_id, $event_id);			}

					//--creo l'evento
					$new_event = null;
					try{
						$new_event = $service->events->insert($calendar_id, $event);
						$new_event_id= $new_event->getId();
					}catch(Google_ServiceException $e) {
						syslog(LOG_ERR, $e->getMessage());
					}

					$output = null;
					$output = $service->events->get($calendar_id, $new_event->getId());
					$output = $output->getId();
					return $output;
	}//cloud_scrivi_calendar






function opzioni_giorno(){
	echo '<option value="">[giorno]</option>';
	for($i=1; $i<=31; $i++){
					echo '<option value="'.$i.'" '.$selected.'>'.$i.'</option>';
					}//for
	}//opzioni_giorno


function opzioni_mese(){
	echo '<option value="">[mese]</option>';
	echo '<option value="01">Gennaio</option>';
	echo '<option value="02">Febbraio</option>';
	echo '<option value="03">Marzo</option>';
	echo '<option value="04">Aprile</option>';
	echo '<option value="05">Maggio</option>';
	echo '<option value="06">Giugno</option>';
	echo '<option value="07">Luglio</option>';
	echo '<option value="08">Agosto</option>';
	echo '<option value="09">Settembre</option>';
	echo '<option value="10">Ottobre</option>';
	echo '<option value="11">Novembre</option>';
	echo '<option value="12">Dicembre</option>';
	}//opzioni_mese


function opzioni_anno(){
	$start 	= date("Y")+1;
	$end 	= $start-50;

	echo '<option value="">[anno]</option>';
	for($i=$start; $i>=$end; $i--){
		echo '<option value="'.$i.'">'.$i.'</option>';
		}//for
	}//opzioni_anno


function opzioni_orario(){
	echo '<option value="">[hh:mm]</option>';
	echo '<option value="07:30">07:30</option>';
	echo '<option value="08:00">08:00</option>';
	echo '<option value="08:30">08:30</option>';
	echo '<option value="09:00">09:00</option>';
	echo '<option value="09:30">09:30</option>';
	echo '<option value="10:00">10:00</option>';
	echo '<option value="10:30">10:30</option>';
	echo '<option value="11:00">11:00</option>';
	echo '<option value="11:30">11:30</option>';
	echo '<option value="12:00">12:00</option>';
	echo '<option value="12:30">12:30</option>';
	echo '<option value="13:00">13:00</option>';
	echo '<option value="13:30">13:30</option>';
	echo '<option value="14:00">14:00</option>';
	echo '<option value="14:30">14:30</option>';
	echo '<option value="15:00">15:00</option>';
	echo '<option value="15:30">15:30</option>';
	echo '<option value="16:00">16:00</option>';
	echo '<option value="16:30">16:30</option>';
	echo '<option value="17:00">17:00</option>';
	echo '<option value="17:30">17:30</option>';
	echo '<option value="18:00">18:00</option>';
	echo '<option value="18:30">18:30</option>';
	echo '<option value="19:00">19:00</option>';
	echo '<option value="19:30">19:30</option>';
	echo '<option value="20:00">20:00</option>';
	echo '<option value="20:30">20:30</option>';
	echo '<option value="21:00">21:00</option>';
	echo '<option value="21:30">21:30</option>';
	}//opzioni_mese




/* _________ HOOOKs _____________ */
add_action('wp_enqueue_scripts', 			'cloud_stili_e_script');
add_action( 'admin_enqueue_scripts', 		'cloud_stili_e_script_admin' );
add_shortcode('modulo_richiesta_ordine', 	'cloud_modulo_richiesta_ordine');
add_action('get_header', 					'cloud_ordine_salva');
add_action('admin_head', 					'cloud_ordine_salva');//--get_header admin
add_shortcode('stampa_msg_azione', 			'cloud_stampa_msg_azione');
add_action('admin_menu', 					'inizializza_plugin');
if(!empty($_REQUEST['cloud_export_skebby'])){		cloud_export_skebby();		}//export


add_action('edit_user_profile_update', 'cu_utenti_salva');
//add_action('get_header','cu_dettaglio_utente');
//add_action('wp_head',	'cu_dettaglio_utente');
//add_action('get_header','cu_dettaglio_utente');
//add_action('wp_head',	'cu_dettaglio_utente');
add_shortcode('modulo_login_utente', 'cloud_modulo_login_utente');
//add_action('get_header', 'cu_utenti_login');
add_shortcode('modulo_account_utente', 'cloud_modulo_account_utente');
add_shortcode('dettaglio_profilo', 'cloud_dettaglio_profilo');
add_action('wp_ajax_carica-lista-profili', 			'cloud_carica_lista_profili');
add_action('wp_ajax_nopriv_carica-lista-profili', 	'cloud_carica_lista_profili');
?>
