<style>
.dataTables_filter{		text-align:right;	}
.dataTables_paginate{	text-align:center;	}
.dataTables_paginate a{		margin:5px;	}
</style>

<h1>Lista ordini</h1>



<? $rows = cloud_lista_ordini(); ?>

<table id='tbl_lista_ordini' class="wp-list-table widefat fixed posts">
	<thead>
        <tr>
            <th>id</th>
            <th>servizio</th>
            <th>nominativo</th>
            <th>bambino</th>
            <th>telefono</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    <? foreach($rows as $row){ ?>
    	<tr>
        <td><?= $row->id ?></td>
        <td><?= cloud_nome_servizio($row->servizio) ?></td>
        <td><?= $row->nominativo ?></td>
        <td><?= $row->nominativo_b ?></td>
        <td><?= $row->telefono ?></td>
		<td><a href=''>[modifica]</a></td>
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