<div class="widget widget_categories filtri_profili">
<h2>Specializzazione</h2>
<span class="arrow"></span>
        <ul style="padding-left:0px;">        
        <? $term = get_term(11, 'specializzazioni'); //--carico i dettagli della categorie  ?>                
        <li class="cat-parent" id="cat-parent-<?= $term->term_id ?>" data-term_id="<?= $term->term_id ?>"><?= __($term->name) ?><span class="floatright glyphicon glyphicon-chevron-up"></span></li>
        <li class="cat-child" id="cat-child-<?= $term->term_id ?>"><? stampa_checkbox_specializzazioni($term,'') ?></li>
        
        <? $term = get_term(44, 'specializzazioni'); //--carico i dettagli della categorie  ?>                
        <li class="cat-parent" id="cat-parent-<?= $term->term_id ?>" data-term_id="<?= $term->term_id ?>"><?= __($term->name) ?><span class="floatright glyphicon glyphicon-chevron-up"></span></li>
        <li class="cat-child" id="cat-child-<?= $term->term_id ?>"><? stampa_checkbox_specializzazioni($term,'') ?></li>
        
        <? $term = get_term(50, 'specializzazioni'); //--carico i dettagli della categorie  ?>                
        <li class="cat-parent" id="cat-parent-<?= $term->term_id ?>" data-term_id="<?= $term->term_id ?>"><?= __($term->name) ?><span class="floatright glyphicon glyphicon-chevron-up"></span></li>
        <li class="cat-child" id="cat-child-<?= $term->term_id ?>"><? stampa_checkbox_specializzazioni($term,'') ?></li>
        
        <? $term = get_term(55, 'specializzazioni'); //--carico i dettagli della categorie  ?>                
        <li class="cat-parent" id="cat-parent-<?= $term->term_id ?>" data-term_id="<?= $term->term_id ?>"><?= __($term->name) ?><span class="floatright glyphicon glyphicon-chevron-up"></span></li>
        <li class="cat-child" id="cat-child-<?= $term->term_id ?>"><? stampa_checkbox_specializzazioni($term,'') ?></li>
        </ul>
</div><!-- /filtri_profili -->

<script type='text/javascript'>
jQuery(function(){
		jQuery('.filtri_profili .col-sm-4').removeClass('col-sm-4');
		jQuery('.checkbox-specializzazione').change(function(){ 		imposta_chiamata_ajax()		 });//change
		jQuery('.cat-parent').click(function(){ 						apri_chiudi_cat(jQuery(this).data('term_id'));		 });//click

		jQuery('.cat-parent').each(function(){ 						jQuery(this).trigger('click'); 							 });//click
		});//ready


function apri_chiudi_cat(term_id){
	console.log(jQuery('#cat-child-'+term_id).is(":visible"));
	
	if(jQuery('#cat-child-'+term_id).is(":visible")){
		jQuery('#cat-child-'+term_id).slideUp();
		jQuery('#cat-parent-'+term_id).find('span').removeClass('glyphicon-chevron-up');
		jQuery('#cat-parent-'+term_id).find('span').addClass('glyphicon-chevron-down');
		}else{
		jQuery('#cat-child-'+term_id).slideDown();
		jQuery('#cat-parent-'+term_id).find('span').removeClass('glyphicon-chevron-down');
		jQuery('#cat-parent-'+term_id).find('span').addClass('glyphicon-chevron-up');
		}
	}//apri_chiudi_cat


function imposta_chiamata_ajax(){
	 var specializzazioni 	= "";
	 jQuery(".checkbox-specializzazione").each(function(){
						if(jQuery(this).is(':checked')){
								specializzazioni += jQuery(this).val()+"#";
								}//checked
								});//each
	
	carica_lista_profili(specializzazioni); /*lista_trainers.shortcode.php*/
	}//riempi_lista_impieghi

</script>