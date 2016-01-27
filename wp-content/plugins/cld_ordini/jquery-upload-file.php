<?php
/*- sorgente file:
https://github.com/hayageek/jquery-upload-file -*/

require_once("../../../wp-config.php"); //http://www.garyc40.com/2010/03/5-tips-for-using-ajax-in-wordpress/
$output_dir = "../../uploads/profiles/";//--esco dalla cartella del template
if(isset($_GET['output_dir'])){		$output_dir = "../../uploads/profiles/".$_GET['output_dir']."/";		} //--se mi arriva una cartella specifica lo carico li

$nome_campo = $_GET['nome_campo'];

if(isset($_FILES[$nome_campo])){
    //Filter the file types , if you want.
    if ($_FILES[$nome_campo]["error"] > 0){
      echo "Error: ".$output_dir . $_FILES["file"]["error"] . "<br>";
    }else{
		//move the uploaded file to uploads folder;
		$file_name 			= $_FILES[$nome_campo]["name"];
		$search 			= array(" ","/","ó","É","è","ì","ù","à","é","#");
		$file_name			= str_replace($search, "_", $file_name);
		$file_name			= strtolower($file_name);
		$file_new_name 		= date("YmdHis")."_".$file_name;

		
		//--carico l'originale
		if(!is_dir($output_dir)){	mkdir($output_dir);		}	//--cloud: se non c'è creo la cartella
		move_uploaded_file($_FILES[$nome_campo]["tmp_name"],$output_dir.$file_new_name);


		//--se è un'immagine ridimensiono e sovrascrivo l'originale
		$w = 350;
		$h = 350;
		$image = wp_get_image_editor($output_dir.$file_new_name); //--funzione di WP
		if(!is_wp_error($image)){
			$image->resize($w,$h,true);
			$image->save($output_dir.$file_new_name);
			}

		
		echo $file_new_name;
		//$output->result 	= "Upload correttamente eseguito, <b>salva</b> la pagina per confermare. ".explode(" - ",$_POST);
    }
}

?>