<HTML>
<HEAD>
<TITLE>Подробная информация о книге</TITLE>
</HEAD>
<BODY>
	<table width="800" height=100% border="1" align="center" cellspacing="0" cellpadding="0">
	<tr> <td  colspan="2" height=5% bgcolor="#6666FF" align="center">Подробная информация о книге</td> </tr>
	<tr>
	<td width="115" bgcolor="#9999CC" valign="top" >
		<a href="index.php">Главная </a><br />
		
		
	</td>
	
	<td   bgcolor="#9999CC" valign="top">
		<?php 
		include("mlib.php");
		$id_book=$_GET["id_book"];
		$mBook=new  Book();
		$mBook->zaprosid($id_book);
		echo"<table align='center'>";
		if($mBook->NextZna4enija()){
	
				
				echo "<tr><td>Номер:</td><td> $mBook->BookId</td></tr>";
				echo "<tr><td>Имя:</td><td> $mBook->BookName</td></tr>";
				echo "<tr><td>Автор:</td><td> $mBook->BookAvtora</td></tr>";
				echo "<tr><td>Жанр:</td><td> $mBook->BookGanr</td></tr>";
				echo "<tr><td>Описание:</td><td> $mBook->BookOpisanie</td></tr>";
				echo "<tr><td>Цена:</td><td> $mBook->BookCena</td></tr>";
				echo "</tr>";
			}
		
		echo"</table>";
		
		echo"
		
			<h2 align='center'>Форма для заказа книги</h2>
			<hr />
		<FORM ACTION='otpravit.php' align='center'>
		<table align='center'>
			<tr><td>Ваше имя:</td><td><INPUT type='text'  name='name' ></td></tr>
			<tr><td>Номер телефона:  </td><td><INPUT type='text'  name='telefon'></td></tr>
			<tr><td>Город:</td><td><INPUT type='text'  name='Gorod' ></td></tr>
			<tr><td>Улица:</td><td><INPUT type='text'  name='ylica' ></td></tr>
			<tr><td>Дом:</td><td><INPUT type='text'  name='dom' ></td></tr>
			<tr><td>Количество книг:</td><td><INPUT type='text'  name='kol' ></td></tr>
		 </table>
			<hr />
		<INPUT type='hidden' name='id_book' value='$mBook->BookId'>
		 <INPUT type='submit' value='Отправить'>
		";
		$mBook->_destruct();
		?>
			
		</td>
	</tr>
	
	</table>
	
	

</BODY>
</HTML>
