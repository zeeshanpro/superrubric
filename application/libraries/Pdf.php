<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter PDF Library
 *
 * @package			CodeIgniter
 * @subpackage		Libraries
 * @category		Libraries
 * @author			Muhanz
 * @license			MIT License
 * @link			https://github.com/hanzzame/ci3-pdf-generator-library
 *
 */

require_once(dirname(__FILE__) . '/dompdf/autoload.inc.php');
use Dompdf\Dompdf;
use Dompdf\Options;
class Pdf
{
	public function create($html,$filename)
    {
		$options = new Options();
		$options->setIsRemoteEnabled(true);
	    $dompdf = new Dompdf($options);
	    $dompdf->loadHtml($html);
	    $dompdf->setPaper('A4', 'portrait');
	    $dompdf->render();
	    ob_end_clean();
	    //$dompdf->stream($filename,array("Attachment"=>false));
	    
	    $dompdf->stream($filename);
  }
  
	public function Create_Download($html,$filename,$download)
	{
		$options = new Options();
		$options->setIsRemoteEnabled(true);
		$dompdf = new Dompdf($options);
		$dompdf->loadHtml($html);
		$dompdf->setPaper('A4', 'portrait');  //landscape
		$dompdf->render();
		//ob_end_clean();
		if($download)
            $dompdf->stream($filename.'.pdf', array('Attachment' => 1));
        else
            $dompdf->stream($filename.'.pdf', array('Attachment' => 0));
	}
}
