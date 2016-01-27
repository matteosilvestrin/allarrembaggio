<?	ob_start();
	include(dirname(__FILE__).'/template_pdf.php');
    $content = ob_get_clean();

	$id = $_REQUEST['id'];

    require_once(dirname(__FILE__).'/html2pdf_v4.03/html2pdf.class.php');
    $html2pdf = new HTML2PDF('P','A4','it');
    $html2pdf->WriteHTML($content);
    $html2pdf->Output('ordine_'.$id.'.pdf');
?>