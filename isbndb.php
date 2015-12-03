<?php
session_start();
$_SESSION['price']=$_POST['price']; 
$_SESSION['additional']=$_POST['additional'];
$_SESSION['class']=$_POST['class'];

$isbn = $_POST["ISBN"];
$url="https://www.googleapis.com/books/v1/volumes?q=isbn:".$isbn;
$content = file_get_contents($url);
$json = json_decode($content,true);
if($json['totalItems']!=1){
	$_SESSION['results']=false;
	
	header("Location: dashboard.php");
	exit();
}else{
$newurl=$json['items'][0]['selfLink'];
$newcontent = file_get_contents($newurl);
$json = json_decode($newcontent,true);
$authors="";
$_SESSION['results']=true;
foreach($json['volumeInfo']['authors'] as $k => $v) {
	$authors=$authors." ".$v.",";
    

   
}
$authors=rtrim($authors, ",");
$_SESSION['author']= $authors;


$booktitle= $json['volumeInfo']['title'];
$_SESSION['booktitle']= $booktitle;
$_SESSION['isbn10']= $json['volumeInfo']['industryIdentifiers'][0]['identifier'];

$_SESSION['isbn13']= $json['volumeInfo']['industryIdentifiers'][1]['identifier'];

foreach($json['volumeInfo']['industryIdentifiers'] as $k => $v) {
    
	
   
} 


$img= $json['volumeInfo']['imageLinks']['thumbnail'];
$_SESSION['imglink']=$img;
header("Location: dashboard.php");
exit();
}
?>