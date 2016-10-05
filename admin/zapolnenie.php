<?php
	/*	
	-провер¤ем даные на коректность ввода
	1)провер¤ем есть ли у нас такой автор если нет то заносим в таблицу авторов
	2) запоминаем id автора
	3)провер¤ем есть ли у нас такой жанр если нет то заносим в таблицу
	4) запоминаем id жанра
	5)заносим книгу в таблицу и смотрим ее id
	6) —в¤зываем книгу с авторами и жанрами
	7)конец
	-помещаем ссылку ввозврата
	*/
	$cena=$_GET["cena"];
	$name_book=$_GET["name_book"];
	$ganr=$_GET["ganr"];
	$opisanie=$_GET["opisanie"];
	$autor=$_GET["autor"];
	$add =$_GET["add"];
	
	settype($cena,integer);
	
	#print "!!!!!!!!";

	print_r ($_GET);
		
	if(!empty($name_book) && !empty($ganr) && !empty($opisanie) && !empty($autor) && $cena>0){
	    include("..//mlib.php");

	#print "start";
		$mBook=new  Book();
	#print "end";	
		$mBook->add_book($name_book,$ganr,$opisanie,$autor,$cena);
		
		$mBook->_destruct();
		echo "данные внесены  коректно!";
	}
	elseif(!empty($add)){
		echo "ƒанные внесены не коректно!";
	}
	else {
			
		echo "таблица дл¤ заполнени¤  каталога";
	}
	?>
