<?php
	include("mlib.php");
	$name=$_GET["name"];
	$telefon=$_GET["telefon"];
	$Gorod=$_GET["Gorod"];
	$ylica=$_GET["ylica"];
	$dom=$_GET["dom"];
	$kol=$_GET["kol"];
	$id_book=$_GET["id_book"];
	
	if(empty($name)||empty($telefon)||empty($Gorod)||empty($ylica)||empty($dom)||empty($kol) ){
			echo"Вы пропустили поле!";
	}
	else{
		
		$handle = fopen(tmpfname, "a+");
		fwrite($handle, "Имя:$name<br />");
		fwrite($handle, "Телефон:$telefon <br />");
		fwrite($handle, "Город:$Gorod <br />");
		fwrite($handle, "Улица:$ylica <br />");
		fwrite($handle, "дом:$dom <br />");
		fwrite($handle, "количество книг:$kol <br />");
		fwrite($handle, "Номер книги:$id_book <br /><hr />");
		fclose($handle);
		echo "Письмо отправлено!";
	}

?>
