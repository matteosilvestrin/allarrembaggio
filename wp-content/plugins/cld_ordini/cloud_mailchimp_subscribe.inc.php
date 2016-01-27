<?php
/*
questo file esegue un'iscrizione istantanea (ajax) ad una lista MAILCHIMP.
*/


$mail 			= $mail;
$merge_vars = array(
		'MERGE1'	=> $nominativo_b,
		'MERGE2'	=> $data_nascita_b,
		'MERGE3'	=> $telefono,
		'MERGE4'	=> $nominativo
		);//merge_vars


$apiKey 	= '7c40b7edc2fe788f932a8849af277bf9-us6'; //(mailchimp: Marketing>Account settings>extra>API Keys)
$ultime3cifreApiKey = "us6";
$listId 	= 'ee09aeba9d'; //(mailchimp: lists>settings>List name & default > list ID)









//______GESTIONE DEL SALVATAGGIO__________________________________________
$double_optin=false;
$send_welcome=false;
$email_type = 'html';
//replace us2 with your actual datacenter
$submit_url = "http://".$ultime3cifreApiKey.".api.mailchimp.com/1.3/?method=listSubscribe";
$data = array(
    'email_address'=>$mail,
    'merge_vars'=>$merge_vars,
    'apikey'=>$apiKey,
    'id' => $listId,
    'double_optin' => $double_optin,
    'send_welcome' => $send_welcome,
    'email_type' => $email_type
);
$payload = json_encode($data);
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $submit_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, urlencode($payload));
 
$result = curl_exec($ch);
curl_close ($ch);
$data = json_decode($result);
if ($data->error){
    //echo $data->error;
} else {
    //echo "E-mail correttamente registrata alla mailinglist.";
}