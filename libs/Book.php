<?php 

class Book 
{
    public function __construct()
    {
	$a=new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME .  ';',
	    DB_UNAME, DB_PASS);

	$b= $a->prepare('SELECT id ,  FROM sbook');
	$b->execute();
	
	while ($row = $b->fetch()) 
	{
	    print_r($row);
	}	
    }

}
