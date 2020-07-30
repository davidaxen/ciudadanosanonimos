<?php 
require_once '../../php/Image/QRCode.php';
$dato='1;23;46;jorge angel solano';
$qrcode = new Image_QRCode();
$qrcode->makeCode($dato, array(
    'image_type' => 'jpeg',
    'error_correct' => 'H', 
));
?>