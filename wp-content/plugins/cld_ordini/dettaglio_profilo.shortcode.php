<? //--controllo i permessi per accedere all apagina
$ok = cu_check_permessi_utente($current_user->ID);
if($ok!='ok'){		echo $ok; 	return;		}?>




<? 	$prof_id 	= recupera_url_var(); //--function.php
	$prof		= cu_caica_dettaglio_profilo($prof_id);	?>
<div class="row pag_profilo">



        <!-- --------- GALLERY ------------ -->
        <div class="col-md-4">
        <div id="img-trainer" class="carousel slide">
				<div class="carousel-inner">
						<?
                        $alt = $prof->nome." ".$prof->cognome;
		                $upload_dir = wp_upload_dir();
                        $upload_dir = $upload_dir['baseurl'].'/profiles/'.$prof->ID.'/';

                        /*- foto -*/
                        echo '<div class="item active">';
                        echo '<img xxclass="img-responsive" src="'. carica_foto_profilo($prof->ID) .'" alt="'. $alt .'">';
                        echo '</div>';

                        /*- gallery -*/
                        $gallery 	= explode(";",$prof->gallery);
                        foreach($gallery as $gal){
                                if($gal!=''){
                                echo '<div class="item">';
                                echo '<img xxclass="img-responsive" src="'. $upload_dir.$gal .'" alt="'. $alt .'">';
                                echo '</div>';
                                }//gal
                                }//foreach
                        ?>
						</div>

                <? if(count($gallery)>1){ ?>
                <div class='freccine'>
				<a class="carousel-control prev" href="#img-trainer" data-slide="prev"><span style='position:static;' class="glyphicon glyphicon-chevron-left"></span></a>
				<a class="carousel-control next" href="#img-trainer" data-slide="next"><span style='position:static;' class="glyphicon glyphicon-chevron-right"></span></a>
				</div><!-- /freccine -->
                <? } ?>
            </div>
        </div><!-- /md-4 -->







        <!-- --------- DATI ------------ -->
        <div class="col-md-8">
        	<h2 style="margin-top:0px;"><?= $prof->nome ?> <?= $prof->cognome ?></h2>


            <!-- --------- SPECIALIZZAZIONI ------------- -->
            <div class='specializzazioni'>
			<strong><?= cu_esplodi_lista_specializzazioni($prof->specializzazioni); ?></strong>
            </div>

            <!-- --------- DESCRIZIONE ------------- -->
            <? if(!empty($prof->descrizione)){ ?><hr><?= $prof->descrizione ?><?  }//empty  ?>


            <!-- --------- ALLEGATO ------------- -->
            <? if(!empty($prof->allegato)){
				$upload_dir = wp_upload_dir();
				$allegato_url = $upload_dir[baseurl].'/profiles/'.$prof->ID.'/'.$prof->allegato;
				?>
				<br><br><center><a href="<?= $allegato_url ?>" target="_blank"><img style="width:32px" src="<?= get_stylesheet_directory_uri(); ?>/img/ico_attachments/pdf.png"> Curriculum vitae</a></center>
			<?  }//empty  ?>


            <!-- --------- DATI ------------- -->
            <hr>
            <? if(!empty($prof->sesso)){ ?>					<div class='col-md-8'><span style="color:#FFD302;font-size:10px;" class="glyphicon glyphicon-chevron-right"></span> <span class='label'>Sesso:</span> <?= $prof->sesso; ?></div><? } ?>
            <? if(!empty($prof->data_nascita_aaaa)){ ?>		<div class='col-md-8'><span style="color:#FFD302;font-size:10px;" class="glyphicon glyphicon-chevron-right"></span> <span class='label'>Età:</span> <?= stampa_eta($prof->data_nascita_gg,$prof->data_nascita_mm,$prof->data_nascita_aaaa); ?></div><? } ?>
            <? if(!empty($prof->piva)){ ?>					<div class='col-md-8'><span style="color:#FFD302;font-size:10px;" class="glyphicon glyphicon-chevron-right"></span> <span class='label'>P.IVA:</span> SI</div><? } ?>
            <? if(!empty($prof->disponibile_spostarsi)){ ?><div class='col-md-8'><span style="color:#FFD302;font-size:10px;" class="glyphicon glyphicon-chevron-right"></span> <span class='label'>Disponibile a spostarsi:</span> <?= $prof->disponibile_spostarsi ?></div><? } ?>
            <? if(!empty($prof->titolo_studio)){ ?>			<div class='col-md-16'><span style="color:#FFD302;font-size:10px;" class="glyphicon glyphicon-chevron-right"></span> <span class='label'>Titolo di studio / Specializzazione:</span> <?= $prof->titolo_studio ?></div><? } ?>
            <div style="clear:both"></div><!-- / -->


            <!-- --------- COMNTATTI ------------- -->
            <hr>
            <div class="contatti_profilo">
			<? if(!empty($prof->provincia)){ ?>	<span class="glyphicon glyphicon-home"></span>&nbsp; <?= $prof->citta ?> (<?= strtoupper($prof->provincia) ?>) <? } ?>
            <? if(!empty($prof->mail)){ ?>		<br><span class="glyphicon glyphicon-envelope"></span>&nbsp; <a href="<?= $prof->mail ?>"><?= $prof->mail ?></a> <? } ?>
			<? if(!empty($prof->tel)){ ?>		<br><span class="glyphicon glyphicon-earphone"></span>&nbsp; <?= $prof->tel ?> <? } ?>
            </div><!-- / -->

            <!-- --------- SOCIAL ------------- -->
			<ul class='social'>
			<? if(!empty($prof->social1)){ ?>		<li><a class="facebook" href="<?= $prof->social1 ?>" target="_blank"><i class="entypo-facebook"></i></a><? } ?>
            <? if(!empty($prof->social2)){ ?>		<li><a class="gplus" href="<?= $prof->social2 ?>" target="_blank"><i class="entypo-gplus"></i></a><? } ?>
            <? if(!empty($prof->social3)){ ?>		<li><a class="linkedin" href="<?= $prof->social3 ?>" target="_blank"><i class="entypo-linkedin"></i></a><? } ?>
            <? if(!empty($prof->social4)){ ?>		<li><a class="twitter" href="<?= $prof->social4 ?>" target="_blank"><i class="entypo-twitter"></i></a><? } ?>
            </ul>

        </div><!-- /md-8 -->

</div><!-- /row -->
