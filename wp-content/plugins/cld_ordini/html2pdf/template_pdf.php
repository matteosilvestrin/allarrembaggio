<?
require_once("../../../../wp-config.php");

global $wpdb;
$id = $_REQUEST['id'];
$ord = cloud_dettaglio_ordine($id);

$pag_bg 	= dirname(__FILE__)."/bg_ordine.png";
$servizio 	= cloud_nome_servizio($ord->servizio);


$servizi_aggiuntivi = $ord->servizi_aggiuntivi;
$servizi_aggiuntivi = str_replace('#',';  ',$servizi_aggiuntivi);
?>


<style type="text/css">
<!--
	page{ font-size: 11px; margin:0px; padding:0px;  }
	page div{ margin:5px 0px; margin-right:30px; }
    .align-center{ text-align: center; }
    .align-right{ text-align: right; }
    .titolo{ 	text-align: center; }
	.titolo2{	border-bottom:1px solid #ccc; width:98%; margin-top:10px;  margin-bottom:5px; padding-bottom:5px; font-weight:bold; 	}
	.page_footer{	text-align:center; color:#666; font-size:10px;	}
	.label{		color:#666; text-align:right;	}
	.valore{ 	font-weight:bold;	}
	.firma{		margin-top:25px; font-style:italic;	}
-->
</style>


<page backimg='<?= $pag_bg ?>' backtop='0mm' backbottom='-10mm' >
<div class='bg_page'>
    <page_header>
    </page_header>
    <page_footer>
     <div class='page_footer'>Happy Day Park sas di Di Tos Elide & C.  P.I. 04425450287
     <br>Sede legale: Due Carrare  35020 - Via San Pelagio 43 - Tel. 049 9125135, Fax 049 9129728
     <br>Sede operativa: Maserà di Padova 35020 - Via A. Volta 4 - Tel. 049 8863010, Cel 346 3461213
     <br><i>MO IscrCompl 06 - Pag: [[page_cu]]/[[page_nb]]</i></div>
    </page_footer>

	<!-- CONTENUTO PAGNA -->
	<div class='titolo'><h1>Richiesta ordine</h1></div>


    <p class="align-center"><span class="label">Num. ordine:</span> <span class="valore"><?= $ord->id ?></span></p>
    <p class="align-center">
    		<span class="label">Servizio:</span>	<span class="valore"><?= $servizio ?></span>
    		&nbsp;&nbsp;&nbsp;&nbsp;<span class="label">Data:</span>		<span class="valore"><?= $ord->data_evento ?></span>
    		&nbsp;&nbsp;&nbsp;&nbsp;<span class="label">Area:</span>	<span class="valore"><?= $ord->area ?></span>
    </p>



    <div class='titolo2'>Dati del festeggiato</div>
	<div>
	<table>
    	<tr>
        	<td style="width:180px" class='label'>Nominativo:</td>
        	<td style="width:180px" class='valore'><?= $ord->nominativo_b ?></td>
        	<td style="width:180px" class='label'>Data di nascita:</td>
        	<td style="width:180px" class='valore'><?= $ord->data_nascita_b ?></td>
        </tr>
		<tr>
        	<td class='label'>Nome genitore:</td>
        	<td class='valore'><?= $ord->nominativo ?></td>
        	<td class='label'>CF/PI:</td>
        	<td class='valore'><?= $ord->cod_fiscale ?></td>
		</tr>
    	<tr>
        	<td class='label'>Indirizzo:</td>
        	<td class='valore'><?= $ord->indirizzo_b ?></td>
        	<td class='label'>Località:</td>
        	<td class='valore'><?= $ord->localita_b ?> (<?= $ord->provincia_b ?>)</td>
        </tr>
    	<tr>
        	<td class='label'>Cell:</td>
        	<td class='valore'><?= $ord->telefono ?></td>
        	<td class='label'>E-mail:</td>
        	<td class='valore'><?= $ord->mail ?></td>
        </tr>
    </table>
    </div>



    <? if($ord->catering=='no'){ ?>
    <div class='titolo2'>Dichiarazione di responsabilità</div>
    <div>Esonero e sollevamento da responsabilità e manleva per somministrazione alimentare: I genitori dichiarano di esonerare, sollevare e manlevare la Ludoteca, nonché tutto il personale addetto, da ogni e qualsiasi responsabilità derivante dalla somministrazione e/o  dall’assunzione dei prodotti che desiderano portare all'interno della struttura, durante le feste.</div>
		<? }//catering ?>



    <div class='titolo2'>Dettagli servizio</div>
	<div>
	<table>
    	<tr>
        	<td style="width:180px" class='label'>Num. bambini:</td>
        	<td style="width:180px" class='valore'><?= $ord->n_bambini ?></td>
        	<td style="width:180px" class='label'>Num. adulti:</td>
        	<td style="width:180px" class='valore'><?= $ord->n_adulti ?></td>
        </tr>
    	<tr>
        	<td class='label'>Esclusiva:</td>
        	<td class='valore'><?= strtoupper($ord->esclusiva); ?></td>
        	<td class='label'>Catering:</td>
        	<td class='valore'><?= strtoupper($ord->catering); ?></td>
        </tr>
    	<tr>
        	<td class='label'>Servizi aggiuntivi:</td>
        	<td class='valore' colspan="3"><?= $servizi_aggiuntivi ?></td>
        </tr>
    </table>
    </div>




    <div class='titolo2'>Pagamenti</div>
	<div>
	<table>
    	<tr>
        	<td style="width:100px" class='label'>Acconto:</td>
       	<td style="width:100px" class='valore'>_ _ _ _ _ _ _ _ _ _ </td>
        	<td style="width:100px" class='label'>Data:</td>
        	<td style="width:100px" class='valore'>_ _ _ _ _ _ _ _ _ _ </td>
        	<td style="width:100px">Contante|Bonifico</td>
        	<td style="width:100px" class='label'>Ric. num.:</td>
        	<td style="width:100px" class='valore'>_ _ _ _ _ _ _ _ _ _ </td>
        </tr>
    	<tr>
        	<td class='label'>Saldo:</td>
       	<td style="width:100px" class='valore'>_ _ _ _ _ _ _ _ _ _ </td>
        	<td class='label'>Data:</td>
        	<td class='valore'>_ _ _ _ _ _ _ _ _ _ </td>
        	<td >Contante|Bonifico</td>
        	<td class='label'>Ric. num.:</td>
        	<td class='valore'>_ _ _ _ _ _ _ _ _ _ </td>
        </tr>
    </table>
    </div>
    <div><i>Coordinate bancarie per  versamento dell’acconto: 	<strong>IT 34 C 08843 62680 000000509156</strong></i></div>


    <div class='titolo2'>Accettazione regolamento interno</div>
	<div>Si accettano  le clausole accessorie, in caso di rinuncia e/o modifica delle condizioni approvate nel presente modello e si prende visione del regolamento interno della ludoteca.</div>
	<div class="align-right firma">Firma per accettazione e consenso: _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _</div><!-- / -->
	<div>IN CASO DI RINUNCIA COMUNICATA LO STESSO GIORNO DELLA FESTA E’ PREVISTO IL PAGAMENTO DEL 50 % DELL’ACCONTO. E' POSSIBILE RINVIARE AD ALTRA DATA ENTRO IL MESE SUCCESSIVO, SE COMUNICATO ENTRO IL GIORNO PRECEDENTE. SE VIENE RICHIESTA L’ANIMAZIONE, IN CASO DI RINUNCIA E’ PREVISTO ANCHE IL PAGAMENTO DEL 50% DEL SERVIZIO ACCESSORIO.</div>




    <div class='titolo2'>Tutela dei dati personali (DLGS  n. 196/2003) </div>
	<div>I dati acquisiti dalla presente domanda saranno trattati e conservati da Happy Day Park Sas nel pieno rispetto della L. 196/2003 e per il periodo necessario per lo sviluppo dell’attività relativa ed attività correlate. I dati riportati nella domanda relativa all’ iscrizione sono acquisiti e trattati in base alle vigenti disposizioni legislative e regolamentari in materia di servizi socio-educativi, per lo sviluppo dei procedimenti amministrativi connessi. Dichiaro di aver ricevuto le informazioni previste dal DLGS 196/2003 e successive modifiche in relazione al trattamento dei dati riportati.</div>
	<div class="align-right firma">Firma per accettazione e consenso: _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _</div><!-- / -->


    <div class='titolo2'>Clausole generali assicurative (DLGS  n. 196/2003)</div>
	<div><i>Si conferma la presa visione delle clausole generali assicurative per la responsabilita' civile del parco giochi, secondo la normativa vigente e l'impegno a informare i partecipanti alla festa.</i></div>
	<div class="align-right firma">Firma per accettazione e consenso: _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _</div><!-- / -->

<!-- FINE CONTENUTO PAGNA -->
</div>
</page>
