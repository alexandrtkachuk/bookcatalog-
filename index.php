<HTML>
<HEAD>
<TITLE>Главная</TITLE>
</HEAD>
<BODY>
	<table width="800" height=100% border="1" align="center" cellspacing="0" cellpadding="0">
	<tr> <td  colspan="2" height=5% bgcolor="#6666FF" align="center"> Главная</td> </tr>
	<tr>
	<td width="115" bgcolor="#9999CC" valign="top" >
		<a href="index.php">Главная </a><br />
		<h3>Поиск</h3>
		<form action='index.php'>
		<SELECT name="poisk">
          <OPTION value=ganr>по жанру</OPTION>
          <OPTION value=avtor>по автору</OPTION>
		</SELECT>
		<INPUT type='text' name="poisk_name">
		<INPUT type='submit' value='Поиск'>
		
		</form>
		
		
	</td>
	
	<td   bgcolor="#9999CC" valign="top">
		<?php include("mlib.php");
		$mBook=new  Book();
		
		$poisk=$_GET["poisk"];
		$poisk_name=$_GET["poisk_name"];
		if($poisk=='ganr'){
			$mBook->zapros_ganr($poisk_name);
		}
		elseif($poisk=='avtor'){
			$mBook->zapros_avtor($poisk_name);
		}
		else{
			$mBook->zapros();
		}
		echo"<table width=100% border='1' align='center' cellspacing='0' cellpadding='0'>";
		echo"<tr><td>Имя книги</td><td>Автор</td><td>Жанр</td><td>Цена</td><td></td></tr>";
			
			while($mBook->NextZna4enija()){
				echo "<tr>";
				echo "<td> $mBook->BookName</td>";
				echo "<td> $mBook->BookAvtora</td>";
				echo "<td> $mBook->BookGanr</td>";
				echo "<td> $mBook->BookCena</td>";
				echo "<td> <form action='podrobno.php'> <INPUT type='submit' value='подробно'>
									<INPUT type='hidden' name='id_book' value='$mBook->BookId'>
				</form></td>";
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
