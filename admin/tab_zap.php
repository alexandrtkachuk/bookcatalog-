<HTML>
<HEAD>
<TITLE>таблица дл¤ заполнени¤ Ѕƒ каталога</TITLE>
</HEAD>
<BODY>
	<table width="800" height=100% border="1" align="center" cellspacing="0" cellpadding="0">
	<tr> <td  colspan="2" height=5% bgcolor="#6666FF" align="center"> <?php include("zapolnenie.php"); ?></td> </tr>
	<tr>
	<td width="115" bgcolor="#9999CC" valign="top" >
		<a href="main.php">√лавна¤ </a><br />
		<a href="tab_zap.php">ƒобавить книгу</a><br />
		<a href="delbook.php">”далить книгу</a>
		<a href="prosmtrlet.php">ѕросмотр писем</a>
	</td>
	
	<td   bgcolor="#9999CC" valign="top" align="center" >
		<FORM ACTION="tab_zap.php">
		<table>
			<tr><td>Ќазвание книги:</td><td><INPUT type=ФtextФ  name="name_book" maxlength=Ф35Ф size=Ф35Ф></td></tr>
			<tr><td>ќписание:  </td><td><INPUT type=ФtextФ  name="opisanie" ></td></tr>
			<tr><td>јвтор:</td><td><INPUT type=ФtextФ  name="autor" maxlength=Ф35Ф size=Ф35Ф ></td></tr>
			<tr><td>∆анр:</td><td><INPUT type=ФtextФ  name="ganr" maxlength=Ф35Ф size=Ф35Ф ></td></tr>
			<tr><td>÷ена:</td><td><INPUT type=ФtextФ  name="cena" maxlength=Ф35Ф size=Ф35Ф ></td></tr>
		 </table>
		 <INPUT type="submit" value="ƒобавить">
		 <INPUT type="hidden" name="add" value="yes">

		</FORM>
		
		
		</td>
	</tr>
	
	</table>
	
	

</BODY>
</HTML>