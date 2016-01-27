<style>
h5{		border-bottom:1px dotted #000000; margin-top:30px; padding-bottom:10px;	}
.note{	font-size:12px; color:#666; text-align:justify; xxmargin-top:-12px;	}
label.error{		background-color:#cc0000; color:#ffffff !important; text-transform:uppercase; padding-left:10px;	}
.box_dati{	display:none;	}
</style>

<?= do_shortcode('[stampa_msg_azione]'); ?>


<form class="cloud_form form-horizontal" id="modulo_ordine" action="" method="POST" enctype="application/x-www-form-urlencoded">
<input type="hidden" name="azione" id="azione" value="ordine-insert" />
<input type="hidden" name="modified" value="<?= date("Y-m-d h:i:s") ?>" />
<input type="hidden" name="landing_page" id="landing_page" value="<?= get_permalink(10) ?>" />




<div class="row box_admin" style="display:none">
	<div class="small-12 column">
    Stato:
        <select name="stato" id="stato">
            <option value="0"><?= cloud_nome_stato(0) ?></option>
            <option value="1"><?= cloud_nome_stato(1) ?></option>
            <option value="2"><?= cloud_nome_stato(2) ?></option>
        </select>
    </div>
	<div class="small-12 column">
    Area: <input type="text" placeholder="area" name='area' id='area' /></label>
    </div>
</div>




<div class="row"><div class="small-16 column"><h5>Servizio richiesto:</h5></div></div>
<div class="row"><div class="small-1 column"><input type="radio" name="servizio" value="1" id="servizio1"></div><div class="small-11 column"><label for="servizio1"><b><?= cloud_nome_servizio(1) ?></b> - su prenotazione;</label></div></div>
<div class="row"><div class="small-1 column"><input type="radio" name="servizio" value="2" id="servizio2"></div><div class="small-11 column"><label for="servizio2"><b><?= cloud_nome_servizio(2) ?></b> - dal LUNEDI' al VENERDI' su prenotazione;</label></div></div>
<div class="row"><div class="small-1 column"><input type="radio" name="servizio" value="3" id="servizio3"></div><div class="small-11 column"><label for="servizio3"><b><?= cloud_nome_servizio(3) ?></b> - il Venerdì, Sabato e Domenica dalle ore 20.00 alle ore 23.00 su prenotazione;</label></div></div>
<div class="row"><div class="small-1 column"><input type="radio" name="servizio" value="4" id="servizio4"></div><div class="small-11 column"><label for="servizio4"><b><?= cloud_nome_servizio(4) ?></b></label></div></div>

<!-- div class=""><div class="small-12 columns text-center"><a href="javascript:step_successivo(2)" class="button">AVANTI &#8250;</a></div></div --><!-- /row -->


<div class="row step_2 box_dati box_spazio_b box_party">
    <div class="small-12 column box_dati box_spazio_b"><h5>Dati bambino:</h5></div>
    <div class="small-12 column box_dati box_party"><h5>Dati festeggiato:</h5></div>
    <div class="small-12 column">
      <label>Nominativo:</label><input type="text" placeholder="Nominativo" name='nominativo_b' id='nominativo_b' />
    </div>
    <div class="small-12 column">
      <label>Data di nascita:<input type="hidden" name='data_nascita_b' id='data_nascita_b' class='data' /></label>
    </div>
    <div class="small-4 column"><select class="data_nascita_b data_nascita_b_gg"><?= opzioni_giorno() ?></select></div>
    <div class="small-4 column"><select class="data_nascita_b data_nascita_b_mm"><?= opzioni_mese() ?></select></div>
    <div class="small-4 column"><select class="data_nascita_b data_nascita_b_aa"><?= opzioni_anno() ?></select></div>

    <!-- div class="small-6 column">
      <label>Data di nascita:</label>
    </div-->
    <div class="small-5 column">
      <label>Indirizzo:<input type="text" placeholder="Indirizzo" name='indirizzo_b' id='indirizzo_b' /></label>
    </div>
    <div class="small-5 column">
      <label>Località:<input type="text" placeholder="Località" name='localita_b' id='localita_b' /></label>
    </div>
    <div class="small-2 column">
      <label>Provincia:<input type="text" placeholder="Provincia" name='provincia_b' id='provincia_b' /></label>
    </div>


    <div class="small-12 column box_dati box_party"><h5>Eventuali Fratelli/Sorelle:</h5></div>
    <div class="small-6 column">
      <label>Nominativo 1 (fratello/sorella):<input type="text" placeholder="Nome" name='fratelli_sorelle_1' id='fratelli_sorelle_1' /></label>
    </div>
    <div class="small-6 column">
      <label>Data di nascita 1 (fratello/sorella):<input type="text" placeholder="gg/mm/aaaa" name='fratelli_sorelle_2' id='fratelli_sorelle_2' /></label>
    </div>
    <div class="small-6 column">
      <label>Nominativo 2 (fratello/sorella):<input type="text" placeholder="Nome" name='fratelli_sorelle_3' id='fratelli_sorelle_3' /></label>
    </div>
    <div class="small-6 column">
      <label>Data di nascita 2 (fratello/sorella):<input type="text" placeholder="gg/mm/aaaa" name='fratelli_sorelle_4' id='fratelli_sorelle_4' /></label>
    </div>
	<input type="hidden" name='fratelli_sorelle' id='fratelli_sorelle' />




</div><!-- /row -->




<div class="row box_dati box_party">
    <div class="small-12 column"><h5>Dettagli evento:</h5></div>
    <div class="small-12 column">
      <label>Data e ora evento:</label><input type="hidden" name='data_evento' id='data_evento' class='dataora' />
    </div>
    <div class="small-3 column"><select class="data_evento data_evento_gg"><?= opzioni_giorno() ?></select></div>
    <div class="small-3 column"><select class="data_evento data_evento_mm"><?= opzioni_mese() ?></select></div>
    <div class="small-3 column"><select class="data_evento data_evento_aa"><?= opzioni_anno() ?></select></div>
    <div class="small-3 column"><select class="data_evento data_evento_hh"><?= opzioni_orario() ?></select></div>

    <div class="small-6 column">
      <label>N. bambini:<input type="text" placeholder="Nominativo" name='n_bambini' id='n_bambini' /></label>
    </div>
    <div class="small-6 column">
      <label>N. adulti:<input type="text" placeholder="n_adulti" name='n_adulti' id='n_adulti' /></label>
    </div>
    <div class="small-6 column">
      <label>Esclusiva:<select type="text" placeholder="esclusiva" name='esclusiva' id='esclusiva'><option value='no'>NO</option><option value='si'>SI</option></select>
      <div class='note'>Senza altre feste in contemporanea, da concordare con la Direzione (EXTRA da concordare)</div>
      </label>
    </div>
    <div class="small-6 column">
      <label>Catering:<select type="text" placeholder="catering" name='catering' id='catering'><option value='Baby'>Baby</option><option value='Normale'>Normale</option><option value='No' selected>No</option></select>
      <div class='note'>Minimo 20 porzioni</div>
      </label>
    </div>
	<div class="small-12 columns"><br><label>Servizi aggiuntivi:</label></div>
</div>
<div class="row box_dati box_party">
    <div class="small-1 columns"><input class='servizi_aggiuntivi' id='servizi_aggiuntivi1' onChange="javascript:imposta_checkbox('servizi_aggiuntivi')" type="checkbox" value="Nessun servizio aggiuntivo"></div>
    <div class="small-5 columns"><label for="servizi_aggiuntivi1">Nessun servizio aggiuntivo</label></div>
    <div class="small-1 columns"><input class='servizi_aggiuntivi' id='servizi_aggiuntivi2' onChange="javascript:imposta_checkbox('servizi_aggiuntivi')" type="checkbox" value="Magia"></div>
    <div class="small-5 columns"><label for="servizi_aggiuntivi2">Magia</label></div>
</div>
<div class="row box_dati box_party">
    <div class="small-1 columns"><input class='servizi_aggiuntivi' id='servizi_aggiuntivi3' onChange="javascript:imposta_checkbox('servizi_aggiuntivi')" type="checkbox" value="Palloncini"></div>
    <div class="small-5 columns"><label for="servizi_aggiuntivi3">Palloncini</label></div>
    <div class="small-1 columns"><input class='servizi_aggiuntivi' id='servizi_aggiuntivi4' onChange="javascript:imposta_checkbox('servizi_aggiuntivi')" type="checkbox" value="Zucchero Filato"></div>
    <div class="small-5 columns"><label for="servizi_aggiuntivi4">Zucchero Filato</label></div>
</div>
<div class="row box_dati box_party">
    <div class="small-1 columns"><input class='servizi_aggiuntivi' id='servizi_aggiuntivi5' onChange="javascript:imposta_checkbox('servizi_aggiuntivi')" type="checkbox" value="Animazione"></div>
    <div class="small-5 columns"><label for="servizi_aggiuntivi5">Animazione</label></div>
    <div class="small-6 columns">&nbsp;</div>
</div>
<div class="row box_dati box_party">
	<div class='note'>Da pagare il 50% al momento della prenotazione.</div>
	<input type='hidden' placeholder="servizi_aggiuntivi" name="servizi_aggiuntivi" id="servizi_aggiuntivi" />
</div>









<div class="row box_dati box_party box_spazio_b">
    <div class="small-12 column  box_dati box_party"><h5>Genitori o Responsabili della Festa:</h5></div>
    <div class="small-12 column  box_dati  box_spazio_b"><h5>Genitori o Responsabile del bambino:</h5></div>
    <div class="small-12 column">
      <label>Nominativo:<input type="text" placeholder="Nominativo" name='nominativo' id='nominativo' /></label>
    </div>
    <div class="small-6 column">
      <label>Telefono :<input type="text" placeholder="telefono" name='telefono' id='telefono' /></label>
    </div>
    <div class="small-6 column">
      <label>E-Mail:<input type="text" placeholder="E-Mail" name='mail' id='mail' /></label>
    </div>
    <!-- div class="small-5 column">
      <label>Indirizzo:<input type="text" placeholder="Indirizzo" name='indirizzo' id='indirizzo' /></label>
    </div>
    <div class="small-5 column">
      <label>Località:<input type="text" placeholder="Località" name='localita' id='localita' /></label>
    </div>
    <div class="small-2 column">
      <label>Provincia:<input type="text" placeholder="Provincia" name='provincia' id='provincia' /></label>
    </div -->
    <div class="small-12 column box_spazio_b">
      <label>Cod. fiscale:<input type="text" placeholder="Cod. Fiscale" name='cod_fiscale' id='cod_fiscale' /></label>
    </div>
</div><!-- /row -->







<div class="row box_dati box_spazio_b">
    <div class="small-12 column"><h5>Dettagli del servizio:</h5></div>
	 <div class="small-3 column">
		 	<select type="text" placeholder="dettaglio_servizio" name='dettaglio_servizio' id='dettaglio_servizio' onchange="mostra_nascondi_campi()">
			<option value=''></option>
			<option value='Ingresso ridotto'>Ingresso ridotto</option>
			<option value='Ingresso normale'>Ingresso normale</option>
			<option value='Spazio bambini'>Spazio bambini</option>
			</select></div>
    <div class="small-9 column"><label>Selezionare nel dettaglio il servizio scelto</label></div>
	 <div class="clearfix"></div>
    <div class="small-3 column field_allergie"><select type="text" placeholder="allergie" name='allergie' id='allergie'><option value='no'>NO</option><option value='si'>SI</option></select></div>
    <div class="small-9 column field_allergie"><label>Eventuali allergie, intolleranze, patologie o situazioni di handicap fisico.</label></div>
    <div class="small-12 column field_allergie">
      <div class='note'>Indicare se il Bambino è soggetto ad allergia o intolleranze, patologie o situazioni di handicap fisico</div>
    </div>
</div><!-- /row -->



<div class="row box_dati box_spazio_b box_orari_e_giorni">
    <div class="small-12 column"><h5>Orari e giorni:</h5></div>
	<div class="small-6 column">
      <label>Iscrizione che inizia il giorno:<input type="text" placeholder="gg/mm/aaaa" name='data_inizio' id='data_inizio' class="data" /></label>
    </div>
	<div class="small-6 column"><label>Iscrizione che termina il giorno:<input type="text" placeholder="gg/mm/aaaa" name='data_fine' id='data_fine'  class="data" /></label></div>
</div>
<div class="row box_dati box_spazio_b field_orario"><div class="small-12 column"><label>TEMPO NORMALE (Lun-Ven 08.00-13.00) - Eventuale Anticipo/Posticipo:</label></div></div>
<div class="row box_dati box_spazio_b field_orario"><div class="small-1 column"><input class='orario' id='orario1' onChange="javascript:imposta_checkbox('orario')" type="checkbox" value="NON RICHIEDO anticipo o posticipo"></div><div class="small-11 column"><label for="orario1">NON RICHIEDO anticipo o posticipo</label></div></div>
<div class="row box_dati box_spazio_b field_orario"><div class="small-1 column"><input class='orario' id='orario2' onChange="javascript:imposta_checkbox('orario')" type="checkbox" value="Anticipo alle 7.30"></div><div class="small-11 column"><label for="orario2">Richiedo l'anticipo alle ore 7.30</label></div></div>
<div class="row box_dati box_spazio_b field_orario"><div class="small-1 column"><input class='orario' id='orario3' onChange="javascript:imposta_checkbox('orario')" type="checkbox" value="Posticipo alle 13.30"></div><div class="small-11 column"><label for="orario3">Richiedo il posticipo alle ore 13.30</label></div></div>
<div class="small-12 column field_orario">
	<input type='hidden' placeholder="orario" name="orario" id="orario" />
<!-- div class="small-12 column">
  <div class='note'>Inserire le informazioni relative al bambino che sarà iscritto allo Spazio Bimbi presso la nostra Ludoteca</div>
</div -->
</div><!-- /row -->





<div class="row box_dati box_spazio_b box_delega_ritiro">
    <div class="small-12 column"><h5>Delega al ritiro:</h5></div>
    <div class="small-6 column">
      <label>Nominativo delegato 1:<input type="text" placeholder="Nome e cognome" name='delegato1' id='delegato1' /></label>
    </div>
    <div class="small-6 column">
      <label>Telefono delegato 1:<input type="text" placeholder="telefono" name='delegato1_tel' id='delegato1_tel' /></label>
    </div>
    <div class="small-6 column">
      <label>Nominativo delegato 2:<input type="text" placeholder="Nome e cognome" name='delegato2' id='delegato2' /></label>
    </div>
    <div class="small-6 column">
      <label>Telefono delegato 2:<input type="text" placeholder="telefono" name='delegato2_tel' id='delegato2_tel' /></label>
    </div>
</div><!-- /row -->





<div class="row box_dati box_party box_spazio_b box_acconto">
    <div class="small-12 column"><h5>Acconto:</h5></div>
    <div class="small-12 column">
      	<label>Acconto:<input type="text" placeholder="Acconto (€)" name='acconto' id='acconto' /></label>
		<div class="note">Acconto minimo €50,00 - Il nostro IBAN è: IT 34 C 08843 62680 000000509156</div>
    </div>

</div><!-- /row -->





<div class="row">
    <div class="small-12 column"><h5>Privacy:</h5></div>
    <div class="small-12 column">
		<b>Tutela dei dati personali (DLGS n.196/2003)</b>
      	<p class='note' style="margin:0px;"><i>I dati acquisiti dalla presente domanda saranno trattati e conservati da Happy Day Park Sas nel pieno rispetto della L.196/2003 e per il periodo necessario allo sviluppo dell'attività relativa ed attività correlata. I dati riportati nella domanda relativa sono acquisiti e trattati in base alle vigenti disposizioni legislative e regolamentari in materia di servizi socio-educativi, per lo sviluppo dei procedimenti amministrativi connessi.</i></p>
    </div>
    <div class="small-12 column text-center">
        <input  id="privacy" name="privacy" value="on" type="checkbox"><label for="privacy">Autorizzo al trattamento dei dati secondo il DLGS n.196/2003</label>
    </div>
</div><!-- /row -->



<div class="row box_dati box_party box_spazio_b">
	<div class="small-12 columns text-center">
    <a href="javascript:invia_form(0)" class="button" id="">INVIA RICHIESTA</a>
    </div>
</div><!-- /row -->


</form><!-- /modulo_registrazione_utente -->


<script type="text/javascript">
jQuery(function(){

	//----- validazione form -----
	jQuery("#modulo_ordine").validate({
		rules:{
			servizio:		"required",
			nominativo:		"required",
			telefono:		"required",
			privacy:		"required"
			},//rules
		messages:{
			servizio:	"Campo obbligatorio!",
			nominativo:	"Campo obbligatorio!",
			telefono:	"Campo obbligatorio!",
			privacy:	"Campo obbligatorio!"
			}//messages
	});//validate

	mostra_nascondi_campi();
});//ready



function imposta_data_ingesso(){
	var today = new Date();
	var gg = today.getDate();
	var mm = today.getMonth()+1; //January is 0!
	var aa = today.getFullYear();
	var hh = "16:00";

	jQuery(".data_evento_gg").val(gg);
	jQuery(".data_evento_mm").val(mm);
	jQuery(".data_evento_aa").val(aa);
	jQuery(".data_evento_hh").val(hh);

	jQuery('#data_evento').val(aa+'-'+mm+'-'+gg+' '+hh);
	console.log("imposta_data_ingesso "+aa+'-'+mm+'-'+gg+' '+hh);
}//imposta_data_ingesso


//--imposto la data di nascita
jQuery('.data_nascita_b').change(function(){
		var gg = jQuery('.data_nascita_b_gg').val();
		var mm = jQuery('.data_nascita_b_mm').val();
		var aa = jQuery('.data_nascita_b_aa').val();

		jQuery('#data_nascita_b').val(aa+'-'+mm+'-'+gg);
		});//



//--imposto la data di nascita
jQuery('.data_nascita_b').change(function(){
		var gg = jQuery('.data_nascita_b_gg').val();
		var mm = jQuery('.data_nascita_b_mm').val();
		var aa = jQuery('.data_nascita_b_aa').val();

		jQuery('#data_nascita_b').val(aa+'-'+mm+'-'+gg);
		});//



//--imposto la data di evento
jQuery('.data_evento').change(function(){
		var gg = jQuery('.data_evento_gg').val();
		var mm = jQuery('.data_evento_mm').val();
		var aa = jQuery('.data_evento_aa').val();
		var hh = jQuery('.data_evento_hh').val();

		jQuery('#data_evento').val(aa+'-'+mm+'-'+gg+' '+hh);
		});//



//--imposto la fratelli sorelle
jQuery('#fratelli_sorelle_1, #fratelli_sorelle_2, #fratelli_sorelle_3, #fratelli_sorelle_4').change(function(){
		var valore1 = jQuery('#fratelli_sorelle_1').val();
		var valore2 = jQuery('#fratelli_sorelle_2').val();
		var valore3 = jQuery('#fratelli_sorelle_3').val();
		var valore4 = jQuery('#fratelli_sorelle_4').val();

		jQuery('#fratelli_sorelle').val(valore1+'#'+valore2+'#'+valore3+'#'+valore4);
		});//



jQuery('#servizio1, #servizio2, #servizio3, #servizio4').change(function(){
		jQuery('.box_dati').hide();
		var serv = jQuery(this).val();

		if(serv==4){
				jQuery('.box_spazio_b').show();
				jQuery('#dettaglio_servizio').val('Ingresso ridotto');//--preimposto dettaglio_servizio
				imposta_data_ingesso();//--imposto la data di oggi
				jQuery('#stato').val(1);//--in caso di ingresso lo stato è automaticamente CONFERMATO
				}

		if((serv==1)||(serv==2)||(serv==3)){
				jQuery('.box_party').show();
				jQuery('#dettaglio_servizio').val('');//--preimposto dettaglio_servizio
				}

		mostra_nascondi_campi();
		});//



function invia_form(){
        var ctrl = jQuery('#modulo_ordine').valid();//validate
        if(ctrl){  jQuery('#modulo_ordine').submit();     }
	}


function mostra_nascondi_campi(){
				var dettaglio_servizio = jQuery('#dettaglio_servizio').val();
				console.log("mostra_nascondi_campi: "+dettaglio_servizio);

				if(dettaglio_servizio=="Spazio bambini"){
										jQuery(".field_allergie").show();
										jQuery(".box_orari_e_giorni").show();
										jQuery(".box_delega_ritiro").show();
										jQuery(".box_acconto").show();
										jQuery(".field_orario").show();
										}else{
										jQuery(".field_allergie").hide();
										jQuery(".box_orari_e_giorni").hide();
										jQuery(".box_delega_ritiro").hide();
										jQuery(".box_acconto").hide();
										jQuery(".field_orario").hide();
										}

				}//mostra_nascondi_campi


function imposta_checkbox(campo){
	 var valore = "";
	 jQuery("."+campo).each(function(){
				if(jQuery(this).is(':checked')){
				valore += jQuery(this).val()+"#";
				}//checked
				});//each
	 jQuery("#"+campo).val(valore);
	}
/*-
function step_successivo(n){
	jQuery('.step_'+n).submit();
	}
-*/
</script>
