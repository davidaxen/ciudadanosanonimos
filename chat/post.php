<?php

$text = $_POST['text'];
$fp = fopen("log.html", 'a');
fwrite($fp, "<div class='msgln'>(".date("g:i A").") <b> Tú </b>: ".stripslashes(htmlspecialchars($text))."<br></div>");
fclose($fp);

?>