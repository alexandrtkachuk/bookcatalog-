<?php
	#You must change it 
	define("m_hostname",  "localhost");
	define("m_username",  "ihelp");
	define("m_password",  "tihelp");
	define("tmpfname",  "letters.txt");//имя файла для хранения писем 
	
	
class Book{
		//public:
		var $zapros;
		var $idbook;
		var $idavtor;
		var $idganr;
		var $BookId;
		var $BookName;//imaja knigi;
		var $BookCena;//Cena knigi
		var $BookAvtora;//stroka s avorom(avtorami)
		var $BookGanr;//ganru knigi
		var $BookOpisanie;//opisanie knigi
		public $linkDB;	
		
		function __construct()
		{
			
				
	
			$this->linkDB = mysqli_connect(m_hostname, m_username, m_password, "db_ihelp");
			#mysqli_select_db("db_ihelp");

			#print "good";
			if (!$this->linkDB) 
			{
			    echo "Ошибка: Невозможно установить соединение с MySQL." . PHP_EOL;
			    echo "Код ошибки errno: " . mysqli_connect_errno() . PHP_EOL;
			    echo "Текст ошибки error: " . mysqli_connect_error() . PHP_EOL;
			    exit;
			}
			
		}
		
		function zapros(){
				//zapros vseh knig
				$this->zapros=mysqli_query($this->linkDB,"select * from sbook");
				
		}
		
		function zaprosid($id){
				//zapros vseh knig
				$this->zapros=mysqli_query($this->linkDB, "select * from sbook where id=$id");
				
		}
		
		function zapros_ganr($ganr){
				//zapros vseh knig
				$this->zapros=mysqli_query($this->linkDB, "select sbook.id, sbook.name, sbook.opisanie,sbook.cena from sbook,ganr ,book_ganr where ganr.name='$ganr' and ganr.id=book_ganr.idganr and book_ganr.idbook=sbook.id");
			
		}
	
		function zapros_avtor($avtor){
				$this->zapros=mysqli_query($this->linkDB, "select sbook.id, sbook.name, sbook.opisanie,sbook.cena from sbook,avtor ,book_avtor where avtor.name='$avtor' and avtor.id=book_avtor.idavtor and book_avtor.idbook=sbook.id");
			
		}
		
		function NextZna4enija(){
			$res=mysqli_fetch_array($this->zapros);
			if($res){
				$this->BookAvtora="";
				$this->BookGanr="";
				$this->BookId=$res['id'];
				$this->BookName=$res['name'];
				$this->BookOpisanie=$res['opisanie'];
				$this->BookCena=$res['cena'];
				//dobavlenie avtorov
				$rezults_avt=mysqli_query($this->linkDB, "select avtor.name  from avtor,sbook,book_avtor WHERE avtor.id=book_avtor.idavtor AND sbook.id=book_avtor.idbook AND sbook.id=$res[0]");
		while($res_av=mysqli_fetch_array($rezults_avt)){
				if(strlen($this->BookAvtora)>0){
						$this->BookAvtora=str_pad($this->BookAvtora,strlen($this->BookAvtora)+1,",");
				}
				$this->BookAvtora=str_pad($this->BookAvtora,strlen($this->BookAvtora)+strlen($res_av['name']),$res_av['name']);
			}
				
			//dobavlenie ganrov
			$rezults_gnr=mysqli_query($this->linkDB, "select ganr.name  from ganr,sbook,book_ganr WHERE ganr.id=book_ganr.idganr AND sbook.id=book_ganr.idbook AND sbook.id=$res[0]");
			while($res_gn=mysqli_fetch_array($rezults_gnr)){
					
				if(strlen($this->BookGanr)>0){
						$this->BookGanr=str_pad($this->BookGanr,strlen($this->BookGanr)+1,",");
				}
				$this->BookGanr=str_pad($this->BookGanr,strlen($this->BookGanr)+strlen($res_gn['name']),$res_gn['name']);
			
			}
				return true;
			}
			else{
				return false;
			}

		}
		
		//
		function del_book(){
				mysqli_query($this->linkDB, "delete from sbook where id='$this->BookId'");
				mysqli_query($this->linkDB, "delete from book_ganr where idbook ='$this->BookId'");
				
			
		}
		
		function add_book($name_book,$ganr,$opisanie,$autor,$cena){
			/***
				1)проверяем есть ли у нас такой автор если нет то заносим в таблицу авторов
				2) запоминаем id автора
				3)проверяем есть ли у нас такой жанр если нет то заносим в таблицу
				4) запоминаем id жанра
				5)заносим книгу в таблицу и смотрим ее id
				6) Связываем книгу с авторами и жанрами
				7)конец
			**/
				$mganr=explode(",",$ganr);
				
				
				$mavtor=explode(",",$autor); 
				
				
				mysqli_query($this->linkDB, "INSERT INTO sbook VALUES(0,'$name_book','$opisanie',$cena)");
				$zapros1=mysqli_query($this->linkDB, "select id from sbook where name='$name_book' and opisanie='$opisanie' and cena='$cena' ");
				$rez=mysqli_fetch_array($zapros1);
				global $idbook;
				$idbook=$rez['id'];
				settype($idbook,integer);
				foreach($mganr as $k=>$i)
				{
				    ##add ganr
				    $rezz=mysqli_query($this->linkDB, "select id from ganr where name='$i'");
				    if($rez=mysqli_fetch_array($rezz)){
					//est takoj ganr svjazuvaem v tablice
					$idganr=$rez['id'];
					settype($idganr,integer);
					mysqli_query($this->linkDB, "INSERT INTO book_ganr VALUES(0,$idbook,$idganr)");
					
				    }
				    else{
					//net takogo ganra
					mysqli_query($this->linkDB, "INSERT INTO ganr VALUES(0,'$i')");
					$zapros2=mysqli_query($this->linkDB, "select id from ganr where name='$i'");
					$rez=mysqli_fetch_array($zapros2);

					print_r($rez);
					$idganr=$rez['id'];
					settype($idganr,integer);
					
					mysqli_query($this->linkDB, "INSERT INTO book_ganr VALUES(0,$idbook,$idganr)");

					
				    }
				}
			
			
				foreach($mavtor as $k=>$i){
					$rezz=mysqli_query($this->linkDB, "select id from avtor where name='$i'");
					if($rez=mysqli_fetch_array($rezz)){
							//est takoj ganr svjazuvaem v tablice
						$idavtor=$rez['id'];
						//echo "$idavtor<br />";
						settype($idavtor,integer);
						mysqli_query($this->linkDB, "INSERT INTO book_avtor VALUES(0,$idbook,$idavtor)");
					}
					else{
						//net takogo ganra
						mysqli_query($this->linkDB, "INSERT INTO avtor VALUES(0,'$i')");
						$zapros2=mysqli_query($this->linkDB, "select id from avtor where name='$i'");
						$rez=mysqli_fetch_array($zapros2);
						$idavtor=$rez['id'];
						settype($idavtor,integer);
						mysqli_query($this->linkDB, "INSERT INTO book_avtor VALUES(0,$idbook,$idavtor)");
						
					
					}
			}
			
		}
		
		
		function _destruct(){
				mysqli_close($this->linkDB);
			
		}
		
}


$mBook=new  Book();
	
?>
