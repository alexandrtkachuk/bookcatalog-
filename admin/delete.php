	<?php
		$idbook=$_GET["idbook"];
		if(!empty($idbook)){
			
			
		include("..//mlib.php");
		$mBook=new  Book();
		$mBook->zaprosid($idbook);	
		
		if($mBook->NextZna4enija()){
			$mBook->del_book();
			echo "Книга успешно удаленна!";
		}
		else{
			echo "Такой книги нет!";
			
		}
		
		$mBook->_destruct();
	}
		
	?>
