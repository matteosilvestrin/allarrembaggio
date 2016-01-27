<?
//-- $tipo_profilo viene passato dalla chiamata del chortcode
ob_start(); ?>

<div id="trainers">
<div class="grid">
<div class="grid magic-grid">
		<div id="output">
        </div><!-- /output -->
</div><!-- /magic-grid -->
</div><!-- /grid -->
</div><!-- /trainers -->



<script type='text/javascript'>
function carica_lista_profili(where){			
			where = JSON.stringify(where);
			jQuery.ajax({ 
					type: 		"POST",
					url:		"<?= site_url() ?>/wp-admin/admin-ajax.php",
					data: 		{'action':'carica-lista-profili','tipo_profilo':'<?= $tipo_profilo ?>','where':where},
					beforeSend: function(){										jQuery('#output').html('<div class="loading-ajax"><strong><?= __("Ricerca profili...") ?></strong><br><img src="<?= get_stylesheet_directory_uri(); ?>/img/loading.gif" alt="<? get_bloginfo('name','display') ?>" /><br><i><?= __("Caricamento risultati...") ?></i></div>');			},
					success: 	function(output){								jQuery('#output').html(output);	},	
					error: 		function(xhrRequest,status,errorMessage){		jQuery('#output').html('<div class="loading-ajax"><?= __("Errori nella ricerca eseguita!") ?></div>');		}
					});//ajax
	}//carica_lista_profili

jQuery(function(){		carica_lista_profili('');		});//ready
</script>


<? 	$output = ob_get_clean();
	echo $output;
?>