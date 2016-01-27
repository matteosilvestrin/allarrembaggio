<h1>Modifica ordine</h1>

<?= cloud_modulo_richiesta_ordine() ?>


<script type="text/javascript">
jQuery(function(){
	<? if(isset($row->id)){ ?>
	jQuery('.box_admin').css("display","inline");
	jQuery('#azione').val("ordine-update");

	jQuery('#stato').val("<?= $row->stato ?>");
	jQuery('#area	').val("<?= $row->area ?>");

	jQuery('#landing_page').val("<?= "http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]; ?>");

	jQuery('#servizio<?= $row->servizio ?>').attr('checked',true);
	jQuery("#servizio<?= $row->servizio ?>" ).trigger("change");

	jQuery("#nominativo_b" ).val("<?= $row->nominativo_b ?>");

	<?
	$data_nascita_b = $row->data_nascita_b;
	$data_nascita 	= explode("-", $data_nascita_b);
	?>
	jQuery("#data_nascita_b" ).val("<?= $row->data_nascita_b ?>");
	jQuery(".data_nascita_b_gg" ).val("<?= $data_nascita[2]*1 ?>");
	jQuery(".data_nascita_b_mm" ).val("<?= $data_nascita[1] ?>");
	jQuery(".data_nascita_b_aa" ).val("<?= $data_nascita[0] ?>");

	jQuery("#indirizzo_b" ).val("<?= $row->indirizzo_b ?>");
	jQuery("#localita_b" ).val("<?= $row->localita_b ?>");
	jQuery("#provincia_b" ).val("<?= $row->provincia_b ?>");
	jQuery("#fratelli_sorelle" ).val("<?= $row->fratelli_sorelle ?>");

	<?
	$data_evento 	= $row->data_evento;
	$data_evento1 	= explode("-", $data_evento);
	$data_evento2 	= explode(" ", $data_evento1[2]);
	?>
	jQuery("#data_evento" ).val("<?= $row->data_evento ?>");
	jQuery(".data_evento_gg" ).val("<?= $data_evento2[0]*1 ?>");
	jQuery(".data_evento_mm" ).val("<?= $data_evento1[1] ?>");
	jQuery(".data_evento_aa" ).val("<?= $data_evento1[0] ?>");
	jQuery(".data_evento_hh" ).val("<?= substr($data_evento2[1], 0, 5) ?>");



	jQuery("#n_bambini" ).val("<?= $row->n_bambini ?>");
	jQuery("#n_adulti" ).val("<?= $row->n_adulti ?>");
	jQuery("#esclusiva" ).val("<?= $row->esclusiva ?>");
	jQuery("#catering" ).val("<?= $row->catering ?>");
	jQuery("#servizi_aggiuntivi" ).val("<?= $row->servizi_aggiuntivi ?>");

	jQuery("#nominativo" ).val("<?= $row->nominativo ?>");
	jQuery("#telefono" ).val("<?= $row->telefono ?>");
	jQuery("#mail" ).val("<?= $row->mail ?>");
	jQuery("#indirizzo" ).val("<?= $row->indirizzo ?>");
	jQuery("#localita" ).val("<?= $row->localita ?>");
	jQuery("#provincia" ).val("<?= $row->provincia ?>");
	jQuery("#cod_fiscale" ).val("<?= $row->cod_fiscale ?>");

	jQuery("#dettaglio_servizio").val("<?= $row->dettaglio_servizio ?>");
	jQuery("#allergie" ).val("<?= $row->allergie ?>");
	jQuery("#data_inizio" ).val("<?= $row->data_inizio ?>");
	jQuery("#data_fine" ).val("<?= $row->data_fine ?>");
	jQuery("#orario" ).val("<?= $row->orario ?>");


	jQuery("#delegato1" ).val("<?= $row->delegato1 ?>");
	jQuery("#delegato1_tel" ).val("<?= $row->delegato1_tel ?>");
	jQuery("#delegato2" ).val("<?= $row->delegato2 ?>");
	jQuery("#delegato2_tel" ).val("<?= $row->delegato2_tel ?>");


	var orario = "<?= $row->orario ?>";
	jQuery("#orario" ).val(orario);
	jQuery(".orario").each(function(){
							var valore = jQuery(this).val();
							if(orario.indexOf(valore) > -1){		jQuery(this).attr('checked',true);		}
							});//each


	var servizi_aggiuntivi = "<?= $row->servizi_aggiuntivi ?>";
	jQuery("#servizi_aggiuntivi" ).val(servizi_aggiuntivi);
	jQuery(".servizi_aggiuntivi").each(function(){
							var valore = jQuery(this).val();
							if(servizi_aggiuntivi.indexOf(valore) > -1){		jQuery(this).attr('checked',true);		}
							});//each


	//--imposto la fratelli sorelle
	jQuery('#fratelli_sorelle').val("<?= $row->fratelli_sorelle ?>");
	fratelli_sorelle = jQuery('#fratelli_sorelle').val();
	fratelli_sorelle = fratelli_sorelle.split('#');

	jQuery('#fratelli_sorelle_1').val(fratelli_sorelle[0]);
	jQuery('#fratelli_sorelle_2').val(fratelli_sorelle[1]);
	jQuery('#fratelli_sorelle_3').val(fratelli_sorelle[2]);
	jQuery('#fratelli_sorelle_4').val(fratelli_sorelle[3]);

	jQuery("#acconto" ).val("<?= $row->acconto ?>");
	jQuery("#privacy" ).prop('checked', true);

	jQuery(".button" ).html('SALVA');

	<? } ?>
	});
</script>
