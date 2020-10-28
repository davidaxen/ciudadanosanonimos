<?php

$file =$_REQUEST['file'];

$total = "pdfs/".$file;


header('Content-type: application/pdf'); 
  
header('Content-Disposition: inline; filename="' . $total . '"'); 
  
header('Content-Transfer-Encoding: binary'); 
  
header('Accept-Ranges: bytes'); 

@readfile($total);
?>