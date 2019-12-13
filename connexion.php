<?php

//Data source Name
$dsn='mysql:host=localhost;dbname=chocolaterie;charset=utf8';

//user Name
$username='root';

//Password
$password='';

//options
$options=[];

try{
	$bdd= new PDO($dsn,$username,$password,$options) ;
	
}
catch(Exeption $e){
	$e->getMessage();
}



?>