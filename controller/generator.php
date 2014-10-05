<?php
// error_reporting(-1);
// ini_set('display_errors', 'On');

function getPassword(){	
	if(isset($_GET["number_of_words"])==false)//set default number of words
		$_GET["number_of_words"]=4;
	
	//check max word limit
	if(isset($_GET["number_of_words"])==true && $_GET["number_of_words"]>9)
		return "password word limit cannot be > 9";
	
	$filename="controller/wordlist.txt";	
	$words=file($filename);
	shuffle($words);
	$password=trim($words[0]);//."-".$words[1]; //start the first word
	for($i=1; $i<$_GET["number_of_words"]; $i++)
	{
		$password.="-".trim($words[$i]);
	}

	$symbols=array("@", "#", "%", "!", "*");
	shuffle($symbols);

	if(isset($_GET["add_number"]) && $_GET["add_number"]=="on")
		$password.=rand(0,9);
	if(isset($_GET["add_symbol"]) && $_GET["add_symbol"]=="on")
		$password.=$symbols[0];
	if(isset($_GET["capitalize_letter"]) && $_GET["capitalize_letter"]=="on")
		$password=ucfirst($password);

	return $password;

}
	// if(isset($_GET["add_number"]) && $_GET["add_number"]=="on")
	// 	echo "add_number is ".$_GET["add_number"]."<br>";
	// else
	// 	echo "add_number is off";

	// echo "<br>".$_GET["number_of_words"]."<br>";
	//echo "<br><br><br><br><br><br><br><br><br><br>".getPassword();//password;
?>