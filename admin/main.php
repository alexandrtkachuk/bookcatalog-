<HTML>
<HEAD>
<TITLE>Главная</TITLE>
</HEAD>
<BODY>
	<table width="800" height=100% border="1" align="center" cellspacing="0" cellpadding="0">
	<tr> <td  colspan="2" height=5% bgcolor="#6666FF" align="center"> Главная</td> </tr>
	<tr>
	<td width="115" bgcolor="#9999CC" valign="top" >
		<a href="main.php">Главная </a><br />
		<a href="tab_zap.php">Добавить книгу</a><br />
		<a href="delbook.php">Удалить книгу</a>
		<a href="prosmtrlet.php">Просмотр писем</a>
	</td>
	
	<td   bgcolor="#9999CC" valign="top">
		<?php include("..//mlib.php");
		$mBook=new  Book();
		//echo "$m_hostname!!";
		$mBook->zapros();
		echo"<table width=100% border='1' align='center' cellspacing='0' cellpadding='0'>";
		echo"<tr><td>id</td><td>Имя книги</td><td>Автор</td><td>Жанр</td><td>Описание</td><td>Цена</td></tr>";
			
			while($mBook->NextZna4enija()){
				echo "<tr>";
				echo "<td> $mBook->BookId</td>";
				echo "<td> $mBook->BookName</td>";
				echo "<td> $mBook->BookAvtora</td>";
				echo "<td> $mBook->BookGanr</td>";
				echo "<td> $mBook->BookOpisanie</td>";
				echo "<td> $mBook->BookCena</td>";
				echo "</tr>";
			}
			
		echo "</table>";
			$mBook->_destruct();
		?>
		
		</td>
	</tr>
	
	</table>
	
	

</BODY>
</HTML>
