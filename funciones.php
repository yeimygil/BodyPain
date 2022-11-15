<?php
$link=null;
	function conectar()
	{
    global $link;
		if(!($link= mysqli_connect("127.0.0.1","root","","bodypain")))
			echo "error conectando al servidor";
    mysqli_set_charset($link,"utf8mb4");
		return $link;
	}	
?>