<style>
.dataTables_filter{		text-align:right;	}
.dataTables_paginate{	text-align:center;	}
.dataTables_paginate a{		margin:5px;	}
.wp-list-table tr:hover{	background-color:#eeeeee;	}
</style>

<h1>Lista ordini</h1>



<? $rows = cloud_lista_ordini(); ?>

<table id='tbl_lista_ordini' class="wp-list-table widefat fixed posts">
	<thead>
        <tr>
            <th>Stato</th>
            <th>Servizio</th>
				<th>Dettaglio serv.</th>
            <th>Data</th>
            <th>Bambino</th>
            <!-- th>Genitore</th>
            <th>Telefono</th -->
				<th>Catering</th>
				<th>Servizi</th>
				<th>Ultima modifica</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <? foreach($rows as $row){ ?>
    	<tr>
        <td><?= cloud_colore_stato($row->stato) ?> <?= cloud_nome_stato($row->stato) ?></td>
        <td><?= cloud_nome_servizio($row->servizio) ?></td>
		  <td><?= $row->dettaglio_servizio ?></td>
        <td><?= formatta_data($row->data_evento) ?></td>
        <td><?= $row->nominativo_b ?></td>
		  <!-- td><?= $row->nominativo ?></td>
        <td><?= $row->telefono ?></td -->
		  <td><?= $row->catering ?></td>
        <td><?
		  $servizi_aggiuntivi = str_replace("Nessun servizio aggiuntivo#", "", $row->servizi_aggiuntivi);
		  $servizi_aggiuntivi = str_replace("#", " | ", $servizi_aggiuntivi);
		  echo $servizi_aggiuntivi; ?>
		  </td>
		  <td><?= formatta_data($row->modified) ?></td>
			<td>
        	<a href='?page=admin_modifica_ordine&id=<?= $row->id ?>'>[modifica]</a>
        	<a href='<?= plugin_dir_url( __FILE__ ).'html2pdf/generate_pdf.php' ?>?id=<?= $row->id ?>' target="_blank">[scarica]</a></td>
        </tr>
	<? } ?>
    </tbody>
</table>


<script>
jQuery(document).ready(function(){
    jQuery('#tbl_lista_ordini').DataTable({
            "bJQueryUI": 	false,
				"bPaginate": 	true,
				"bStateSave": 	false,
            "bPaginate": 	true,
            "bStateSave": 	false,
            "iDisplayLength": 50,
            "bInfo": 		false,
				"oLanguage": { "sUrl": "<?= site_url() ?>/wp-content/plugins/cld_ordini/js/dataTables.it.txt" },
				"sPaginationType": "full_numbers",
				"aaSorting": 	[], //--tolgo il sorting all'onload
				"fnDrawCallback":function(oSettings){ $('a.colorbox').colorbox() } //--serve ad aprire colorbon nelle pag successive
				});//DataTable
});
</script>
