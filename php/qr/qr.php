<?php    
 $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
$PNG_WEB_DIR = 'temp/';

    include "phpqrcode.php";    
    if (!file_exists($PNG_TEMP_DIR))
        mkdir($PNG_TEMP_DIR);
    $filename = $PNG_TEMP_DIR.'test.png';
    
    $errorCorrectionLevel = 'L';
    if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L','M','Q','H')))
        $errorCorrectionLevel = $_REQUEST['level'];    

    $matrixPointSize = 4;
    if (isset($_REQUEST['size']))
        $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);
if (isset($_REQUEST['data'])) { 
     if (trim($_REQUEST['data']) == '')
            die('data cannot be empty! <a href="?">back</a>');
        $filename = $PNG_TEMP_DIR.'test'.md5($_REQUEST['data'].'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
        QRcode::png($_REQUEST['data'], $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
    } else {    
   QRcode::png('PHP QR gatho :)', $filename, $errorCorrectionLevel, $matrixPointSize, 2);   //Aqui esta el show 
     }    
    //echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" />';  
    

    