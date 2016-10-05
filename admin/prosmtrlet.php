<HTML>
<HEAD>
<TITLE>Отправка письма</TITLE>
</HEAD>
<BODY>
	<table width="800" height=100% border="1" align="center" cellspacing="0" cellpadding="0">
	<tr> <td  colspan="2" height=5% bgcolor="#6666FF" align="center">Просмотр писем</td> </tr>
	<tr>
	<td width="115" bgcolor="#9999CC" valign="top" >
		<a href="main.php">Главная </a><br />
		<a href="tab_zap.php">Добавить книгу</a><br />
		<a href="delbook.php">Удалить книгу</a>
		<a href="prosmtrlet.php">Просмотр писем</a>
	</td>
	
	<td   bgcolor="#9999CC" valign="top">
		<?php 
			include("..//letters.txt");
		?>	
		</td>
	</tr>
	
	</table>
	
	

</BODY>
</HTML>
