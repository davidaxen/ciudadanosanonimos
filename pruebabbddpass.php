<?php 
include('bbdd.php');

	define('METHOD','AES-256-CBC');
	define('SECRET_KEY','Smartcbc2019');
	define('SECRET_IV','Admiservi');

$sql="select * from usuarios order by id asc";
$result=mysqli_query($conn,$sql);
$row=mysqli_num_rows($result);
echo $row."<br/>";

//$row=20;
for ($i=0;$i<$row;$i++){
mysqli_data_seek($result, $i);
$resultados=mysqli_fetch_array($result);
	$idi=$resultados['id'];
	$pass=$resultados['password'];
			$output=FALSE;
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_encrypt($pass, METHOD, $key, 0, $iv);
			$output1=base64_encode($output);
			//echo $output.'<br>';






echo $idi." ".$pass." ".$output." ".$output1."<br/>";

$sql0="update usuarios set ";
$sql1="where id='".$idi."'";
$sqla="password='".$output1."' ";
$sqlg=$sql0.$sqla.$sql1;
$resultd=mysqli_query ($conn,$sqlg);

//$sql55 = "INSERT INTO visitas (usuario,dia,hora,ip) VALUES ('$user','$dt','$tm','$ip')";
//$result55=mysqli_query ($conn, $sql55) or die ("Invalid result user");


}
?>

<!--
<?php 

//	class SED {
	//	public static function encryption($string){

		//}
		//public static function decryption($string){
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_decrypt(base64_decode($output), METHOD, $key, 0, $iv);
			echo $output.'<br>';
		//}
	//}
?>
-->