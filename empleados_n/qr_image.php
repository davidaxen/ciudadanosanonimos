<?php 
require_once '../../../php/Image/QRCode.php';

$qrcode = new Image_QRCode();
$qrcode->makeCode($dato, array(
    'image_type' => 'png',
    'output_type'=>'display',
    'error_correct' => 'H', 
));
?>