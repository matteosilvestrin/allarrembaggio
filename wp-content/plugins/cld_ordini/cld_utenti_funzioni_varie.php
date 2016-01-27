<?


/*-pulisco eventuali stringhe da passare all'url-*/
function clearURLstr($mystr){
	$mystr 		= strtolower($mystr);
	$search 	= array(" ", "'", "_", "/", "Œ", "ì", "ù", "à", "è", "ó");
	$mystr 		= str_replace($search, "-", $mystr);
	return $mystr;
	}//printpatch





function stampa_select_giorni($val=''){
	ob_start();	?>
	<select name="data_nascita_gg" id="data_nascita_gg" class="form-control">
    <option value="">Giorno</option>
    	<? for($i=1; $i<=31; $i++){ ?>
        <option value="<?= $i ?>" <? if($val==$i){ echo "selected"; } ?>><?= $i ?></option>
        <? }//for ?>
	</select>
    <? $output = ob_get_clean();
    echo $output;	
	}//stampa_select_giorni


function stampa_select_mesi($val=''){
	ob_start();	?>
	<select name="data_nascita_mm" id="data_nascita_mm" class="form-control">
    <option value="">Mese</option>
    <option value="1" 	<? if($val==1){ echo "selected"; } ?>><?= __("Gennaio") ?></option>
    <option value=2"" 	<? if($val==2){ echo "selected"; } ?>><?= __("Febbraio") ?></option>
    <option value="3" 	<? if($val==3){ echo "selected"; } ?>><?= __("Marzo") ?></option>
    <option value="4" 	<? if($val==4){ echo "selected"; } ?>><?= __("Aprile") ?></option>
    <option value="5" 	<? if($val==5){ echo "selected"; } ?>><?= __("Maggio") ?></option>
    <option value="6" 	<? if($val==6){ echo "selected"; } ?>><?= __("Giugno") ?></option>
    <option value="7" 	<? if($val==7){ echo "selected"; } ?>><?= __("Luglio") ?></option>
    <option value="8" 	<? if($val==8){ echo "selected"; } ?>><?= __("Agosto") ?></option>
    <option value="9" 	<? if($val==9){ echo "selected"; } ?>><?= __("Settembre") ?></option>
    <option value="10" 	<? if($val==10){ echo "selected"; } ?>><?= __("Ottobre") ?></option>
    <option value="11" 	<? if($val==11){ echo "selected"; } ?>><?= __("Novembre") ?></option>
    <option value="12" 	<? if($val==12){ echo "selected"; } ?>><?= __("Dicembre") ?></option>
	</select>
    <? $output = ob_get_clean();
    echo $output;	
	}//stampa_select_giorni



function stampa_select_anni($val=''){
	ob_start();	?>
	<select name="data_nascita_aaaa" id="data_nascita_aaaa" class="form-control">
    <option value="">Anno</option>
    	<? for($i=date("Y"); $i>=(date("Y")-70); $i--){ ?>
        <option value="<?= $i ?>" <? if($val==$i){ echo "selected"; } ?>><?= $i ?></option>
        <? }//for ?>
	</select>
    <? $output = ob_get_clean();
    echo $output;	
	}//stampa_select_giorni
	
	
	
function stampa_eta($gg,$mm,$aaaa){
	$age 	= (date("md", date("U", mktime(0, 0, 0, $mmm, $gg, $aaaa))) > date("md")
				? ((date("Y") - $aaaa) - 1)
				: (date("Y") - $aaaa));
  	return $age;
	}
	
	
function stampa_select_provincie($val=''){
	ob_start();	?>
	<select name="provincia" id="provincia" class="form-control">
    <option value="" style="font-style:italic">[<?= __("nessuna preferenza") ?>]</option>
	<option value="Agrigento"	    <? if($val=="Agrigento"){ 	echo "selected"; } ?>	>Agrigento</option>
    <option value="Alessandria"	  	<? if($val=="Alessandria"){ echo "selected"; } ?>	>Alessandria</option>
    <option value="Ancona"			<? if($val=="Ancona"){ 		echo "selected"; } ?>	>Ancona</option>
    <option value="Aosta"			<? if($val=="Aosta"){ 		echo "selected"; } ?>	>Aosta</option>
    <option value="Arezzo"			<? if($val=="Arezzo"){ echo "selected"; } ?>	>Arezzo</option>
    <option value="Ascoli Piceno"	<? if($val=="Ascoli Piceno"){ echo "selected"; } ?>	>Ascoli Piceno</option>
    <option value="Asti"			<? if($val=="Asti"){ echo "selected"; } ?>	>Asti</option>
    <option value="Avellino"		<? if($val=="Avellino"){ echo "selected"; } ?>	>Avellino</option>
    <option value="Bari"			<? if($val=="Bari"){ echo "selected"; } ?>	>Bari</option>
    <option value="Barletta-Andria-Trani"	<? if($val=="Barletta-Andria-Trani"){ echo "selected"; } ?>	>Barletta-Andria-Trani</option>
    <option value="Belluno"			<? if($val=="Belluno"){ echo "selected"; } ?>	>Belluno</option>
    <option value="Benevento"		<? if($val=="Benevento"){ echo "selected"; } ?>	>Benevento</option>
    <option value="Bergamo"			<? if($val=="Bergamo"){ echo "selected"; } ?>	>Bergamo</option>
    <option value="Biella"			<? if($val=="Biella"){ echo "selected"; } ?>	>Biella</option>
    <option value="Bologna"			<? if($val=="Bologna"){ echo "selected"; } ?>	>Bologna</option>
    <option value="Bolzano"			<? if($val=="Bolzano"){ echo "selected"; } ?>	>Bolzano</option>
    <option value="Brescia"			<? if($val=="Brescia"){ echo "selected"; } ?>	>Brescia</option>
    <option value="Brindisi"		<? if($val=="Brindisi"){ echo "selected"; } ?>	>Brindisi</option>
    <option value="Cagliari"		<? if($val=="Cagliari"){ echo "selected"; } ?>	>Cagliari</option>
    <option value="Caltanissetta"	<? if($val=="Caltanissetta"){ echo "selected"; } ?>	>Caltanissetta</option>
    <option value="Campobasso"		<? if($val=="Campobasso"){ echo "selected"; } ?>	>Campobasso</option>
    <option value="Carbonia-iglesias"	<? if($val=="Carbonia-iglesias"){ echo "selected"; } ?>	>Carbonia-iglesias</option>
    <option value="Caserta"			<? if($val=="Caserta"){ echo "selected"; } ?>	>Caserta</option>
    <option value="Catania"			<? if($val=="Catania"){ echo "selected"; } ?>	>Catania</option>
    <option value="Catanzaro"		<? if($val=="Catanzaro"){ echo "selected"; } ?>	>Catanzaro</option>
    <option value="Chieti"			<? if($val=="Chieti"){ echo "selected"; } ?>	>Chieti</option>
    <option value="Como"			<? if($val=="Como"){ echo "selected"; } ?>	>Como</option>
    <option value="Cosenza"			<? if($val=="Cosenza"){ echo "selected"; } ?>	>Cosenza</option>
    <option value="Cremona"			<? if($val=="Cremona"){ echo "selected"; } ?>	>Cremona</option>
    <option value="Crotone"			<? if($val=="Crotone"){ echo "selected"; } ?>	>Crotone</option>
    <option value="Cuneo"			<? if($val=="Cuneo"){ echo "selected"; } ?>	>Cuneo</option>
    <option value="Enna"			<? if($val=="Enna"){ echo "selected"; } ?>	>Enna</option>
    <option value="Fermo"			<? if($val=="Fermo"){ echo "selected"; } ?>	>Fermo</option>
    <option value="Ferrara"			<? if($val=="Ferrara"){ echo "selected"; } ?>	>Ferrara</option>
    <option value="Firenze"			<? if($val=="Firenze"){ echo "selected"; } ?>	>Firenze</option>
    <option value="Foggia"			<? if($val=="Foggia"){ echo "selected"; } ?>	>Foggia</option>
    <option value="Forl&igrave;-Cesena"	<? if($val=="Forl&igrave;-Cesena"){ echo "selected"; } ?>	>Forl&igrave;-Cesena</option>
    <option value="Frosinone"		<? if($val=="Frosinone "){ echo "selected"; } ?>	>Frosinone</option>
    <option value="Genova"			<? if($val=="Genova"){ echo "selected"; } ?>	>Genova</option>
    <option value="Gorizia"			<? if($val=="Gorizia"){ echo "selected"; } ?>	>Gorizia</option>
    <option value="Grosseto"		<? if($val=="Grosseto"){ echo "selected"; } ?>	>Grosseto</option>
    <option value="Imperia"			<? if($val=="Imperia"){ echo "selected"; } ?>	>Imperia</option>
    <option value="Isernia"			<? if($val=="Isernia"){ echo "selected"; } ?>	>Isernia</option>
    <option value="La spezia"		<? if($val=="La spezia"){ echo "selected"; } ?>	>La spezia</option>
    <option value="L'aquila"		<? if($val=="L'aquila"){ echo "selected"; } ?>	>L'aquila</option>
    <option value="Latina"			<? if($val=="Latina"){ echo "selected"; } ?>	>Latina</option>
    <option value="Lecce"			<? if($val=="Lecce"){ echo "selected"; } ?>	>Lecce</option>
    <option value="Lecco"			<? if($val=="Lecco"){ echo "selected"; } ?>	>Lecco</option>
    <option value="Livorno"			<? if($val=="Livorno"){ echo "selected"; } ?>	>Livorno</option>
    <option value="Lodi"			<? if($val=="Lodi"){ echo "selected"; } ?>	>Lodi</option>
    <option value="Lucca"			<? if($val=="Lucca"){ echo "selected"; } ?>	>Lucca</option>
    <option value="Macerata"		<? if($val=="Macerata"){ echo "selected"; } ?>	>Macerata</option>
    <option value="Mantova"			<? if($val=="Mantova"){ echo "selected"; } ?>	>Mantova</option>
    <option value="Massa-Carrara"	<? if($val=="Massa-Carrara"){ echo "selected"; } ?>	>Massa-Carrara</option>
    <option value="Matera"			<? if($val=="Matera"){ echo "selected"; } ?>	>Matera</option>
    <option value="Medio Campidano"	<? if($val=="Medio Campidano"){ echo "selected"; } ?>	>Medio Campidano</option>
    <option value="Messina"			<? if($val=="Messina"){ echo "selected"; } ?>	>Messina</option>
    <option value="Milano"			<? if($val=="Milano"){ echo "selected"; } ?>	>Milano</option>
    <option value="Modena"			<? if($val=="Modena"){ echo "selected"; } ?>	>Modena</option>
    <option value="Monza e della Brianza"	<? if($val=="Monza e della Brianza"){ echo "selected"; } ?>	>Monza e della Brianza</option>
    <option value="Napoli"			<? if($val=="Napoli"){ echo "selected"; } ?>	>Napoli</option>
    <option value="Novara"			<? if($val=="Novara"){ echo "selected"; } ?>	>Novara</option>
    <option value="Nuoro"			<? if($val=="Nuoro"){ echo "selected"; } ?>	>Nuoro</option>
    <option value="Ogliastra"		<? if($val=="Ogliastra"){ echo "selected"; } ?>	>Ogliastra</option>
    <option value="Olbia-Tempio"	<? if($val=="Olbia-Tempio"){ echo "selected"; } ?>	>Olbia-Tempio</option>
    <option value="Oristano"		<? if($val=="Oristano"){ echo "selected"; } ?>	>Oristano</option>
    <option value="Padova"			<? if($val=="Padova"){ echo "selected"; } ?> 	>Padova</option>
    <option value="Palermo"			<? if($val=="Palerm "){ echo "selected"; } ?>	>Palermo</option>
    <option value="Parma"			<? if($val=="Parma"){ echo "selected"; } ?>	>Parma</option>
    <option value="Pavia"			<? if($val=="Pavia"){ echo "selected"; } ?>	>Pavia</option>
    <option value="Perugia"			<? if($val=="Perugia"){ echo "selected"; } ?>	>Perugia</option>
    <option value="Pesaro e Urbino"	<? if($val=="Pesaro e Urbino"){ echo "selected"; } ?>	>Pesaro e Urbino</option>
    <option value="Pescara"			<? if($val=="Pescara"){ echo "selected"; } ?>	>Pescara</option>
    <option value="Piacenza"		<? if($val=="Piacenza"){ echo "selected"; } ?>	>Piacenza</option>
    <option value="Pisa"			<? if($val=="Pisa"){ echo "selected"; } ?>	>Pisa</option>
    <option value="Pistoia"			<? if($val=="Pistoia"){ echo "selected"; } ?>	>Pistoia</option>
    <option value="Pordenone"	<? if($val=="Pordenone"){ echo "selected"; } ?>	>Pordenone</option>
    <option value="Potenza"	<? if($val=="Potenza"){ echo "selected"; } ?>	>Potenza</option>
    <option value="Prato"	<? if($val=="Prato"){ echo "selected"; } ?>	>Prato</option>
    <option value="Ragusa"	<? if($val=="Ragusa"){ echo "selected"; } ?>	>Ragusa</option>
    <option value="Ravenna"	<? if($val=="Ravenna"){ echo "selected"; } ?>	>Ravenna</option>
    <option value="Reggio di Calabria"	<? if($val=="Reggio di Calabria"){ echo "selected"; } ?>	>Reggio di Calabria</option>
    <option value="Reggio nell'Emilia"	<? if($val=="Reggio nell'Emilia"){ echo "selected"; } ?>	>Reggio nell'Emilia</option>
    <option value="Rieti"	<? if($val=="Rieti"){ echo "selected"; } ?>	>Rieti</option>
    <option value="Rimini"	<? if($val=="Rimini"){ echo "selected"; } ?>	>Rimini</option>
    <option value="Roma"	<? if($val=="Roma"){ echo "selected"; } ?>	>Roma</option>
    <option value="Rovigo"	<? if($val=="Rovigo"){ echo "selected"; } ?>	>Rovigo</option>
    <option value="Salerno"	<? if($val=="Salerno"){ echo "selected"; } ?>	>Salerno</option>
    <option value="Sassari"	<? if($val=="Sassari"){ echo "selected"; } ?>	>Sassari</option>
    <option value="Savona"	<? if($val=="Savona"){ echo "selected"; } ?>	>Savona</option>
    <option value="Siena"	<? if($val=="Siena"){ echo "selected"; } ?>	>Siena</option>
    <option value="Siracusa"	<? if($val=="Siracusa"){ echo "selected"; } ?>	>Siracusa</option>
    <option value="Sondrio"	<? if($val=="Sondrio"){ echo "selected"; } ?>	>Sondrio</option>
    <option value="Taranto"	<? if($val=="Taranto"){ echo "selected"; } ?>	>Taranto</option>
    <option value="Teramo"	<? if($val=="Teramo"){ echo "selected"; } ?>	>Teramo</option>
    <option value="Terni"	<? if($val=="Terni"){ echo "selected"; } ?>	>Terni</option>
    <option value="Torino"	<? if($val=="Torino"){ echo "selected"; } ?>	>Torino</option>
    <option value="Trapani"	<? if($val=="Trapani"){ echo "selected"; } ?>	>Trapani</option>
    <option value="Trento"	<? if($val=="Trento"){ echo "selected"; } ?>	>Trento</option>
    <option value="Treviso"	<? if($val=="Treviso"){ echo "selected"; } ?>	>Treviso</option>
    <option value="Trieste"	<? if($val=="Trieste"){ echo "selected"; } ?>	>Trieste</option>
    <option value="Udine"	<? if($val=="Udine"){ echo "selected"; } ?>	>Udine</option>
    <option value="Varese"	<? if($val=="Varese"){ echo "selected"; } ?>	>Varese</option>
    <option value="Venezia"	<? if($val=="Venezia"){ echo "selected"; } ?>	>Venezia</option>
    <option value="Verbano-Cusio-Ossola"	<? if($val=="Verbano-Cusio-Ossola"){ echo "selected"; } ?>	>Verbano-Cusio-Ossola</option>
    <option value="Vercelli"	<? if($val=="Vercelli"){ echo "selected"; } ?>	>Vercelli</option>
    <option value="Verona"	<? if($val=="Verona"){ echo "selected"; } ?>	>Verona</option>
    <option value="Vibo valentia"	<? if($val=="Vibo valentia"){ echo "selected"; } ?>	>Vibo valentia</option>
    <option value="Vicenza"	<? if($val=="Vicenza"){ echo "selected"; } ?>	>Vicenza</option>
    <option value="Viterbo"	<? if($val=="Viterbo"){ echo "selected"; } ?>	>Viterbo</option>
	</select>                       
    <? $output = ob_get_clean();
    echo $output;	
	}//stampa_select_giorni
	
	
	
	
	
	
function stampa_select_sesso($val=''){
	ob_start();	?>
	<select name="sesso" id="sesso" class="form-control">
    <option value="" style="font-style:italic">[<?= __("nessuna preferenza") ?>]</option>
	<option value="M"	<? if($val=="M"){ echo "selected"; } ?>	><?= __("Maschio") ?></option>
    <option value="F"	<? if($val=="F"){ echo "selected"; } ?>	><?= __("Femmina") ?></option>
	</select>                       
    <? $output = ob_get_clean();
    echo $output;	
	}//stampa_select_giorni
	
	
	
	
	
	
function carica_foto_profilo($user_id){
	global $wpdb;
	
	$sql 	= '';
	$sql 	.= ' 	SELECT foto FROM fjob_wp_cld_utenti 	';
	$sql 	.= ' 	WHERE user_id = '.$user_id;

	$rows   = $wpdb->get_row($sql);
	$foto 	= $rows->foto;
	
	if(!empty($foto)){
		$upload_dir = wp_upload_dir();
		$img_url 	= $upload_dir[baseurl].'/profiles/'.$user_id.'/'.$foto;
		}else{
		$upload_dir = wp_upload_dir();
		$img_url 	= $upload_dir[baseurl]."/2014/10/no_foto_fji.png";
		}
	
	
	return $img_url;
	}//carica_foto_profilo
	
	
	
	
/* stampa tutte le sottocategorie di uno specifica  specializzazione */
function stampa_checkbox_specializzazioni($term=null, $val){

	if($term==null){	$radice = 0;
	}else{				$radice = '';		}	

	$args 			= array(
						'child_of' 		=> $term->term_id,
						'parent' 		=> $radice,
						'hide_empty' 	=> false
						);
	$termchildren 	= get_terms( 'specializzazioni', $args);
	foreach ($termchildren as $child){
			$child 		= get_term_by('id', $child->term_id, 'specializzazioni');
			$label 		= $child->name;
			$var 		= $child->term_id;
			
			$checked	= "";
			if(strpos($val,$var.'#') !== false){		$checked=' checked="true" ';	}

			echo '<div class="col-sm-4"><label class="checkbox-inline"><input '. $checked .' class="checkbox-specializzazione" type="checkbox" id="'. $var .'" value="'. $var .'"> '. $label .' <!-- ('. $var .') --></label></div>';
			}//foreach
			echo '<div style="clear:both"></div>';
	}//stampa_lista_specializzazioni



//--stampa la lista delle specializzaioni
function cu_esplodi_lista_specializzazioni($specializzazioni, $separatore='; '){
            $specs 	= explode("#",$specializzazioni);	
			foreach($specs as $spec){						 
						$spec 		= get_term_by('id', $spec, 'specializzazioni');
						$labels[] 	= $spec->name;
						}//foreach			
			
			$labels = array_unique($labels); // tolgo eventuali doppioni...
            foreach($labels as $label){
						if($label!=''){
								echo $label . $separatore;
						}//spec
						}//foreach			
		}//stampa_lista_specializzazioni

?>