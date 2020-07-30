<?php 
$string='Jas170174@#';
echo hash('sha512', $string);
?>
<br/>

<?php 
$ctx = hash_init('sha512');
hash_update($ctx, $string);
$dato=hash_final($ctx);
echo $dato;
?>
<br/>
<?php 
	define('METHOD','AES-256-CBC');
	define('SECRET_KEY','Smartcbc2019');
	define('SECRET_IV','Admiservi');
//	class SED {
	//	public static function encryption($string){
			$output=FALSE;
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_encrypt($string, METHOD, $key, 0, $iv);
			$output=base64_encode($output);
			echo $output.'<br>';
		//}
		//public static function decryption($string){
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_decrypt(base64_decode($output), METHOD, $key, 0, $iv);
			echo $output.'<br>';
		//}
	//}
?>