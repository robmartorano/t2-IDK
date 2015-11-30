<?php
session_start();
$_SESSION['price']=$_POST['price']; 
$_SESSION['additional']=$_POST['additional'];

$isbn = $_POST["ISBN"];
$url="https://www.googleapis.com/books/v1/volumes?q=isbn:".$isbn;
$content = file_get_contents($url);
$json = json_decode($content,true);
if($json['totalItems']!=1){
	$_SESSION['results']=false;
	header("Location: dashboard.php");
	exit();
}else{
$authors="";
$_SESSION['results']=true;
foreach($json['items'][0]['volumeInfo']['authors'] as $k => $v) {
	$authors=$authors." ".$v.",";
    

   
}
$authors=rtrim($authors, ",");
$_SESSION['author']= $authors;


$booktitle= $json['items'][0]['volumeInfo']['title'];
$_SESSION['booktitle']= $booktitle;
$_SESSION['isbn10']= $json['items'][0]['volumeInfo']['industryIdentifiers'][0]['identifier'];

$_SESSION['isbn13']= $json['items'][0]['volumeInfo']['industryIdentifiers'][1]['identifier'];

/* foreach($json['items'][0]['volumeInfo']['industryIdentifiers'] as $k => $v) {
    echo $v['type'].":".$v['identifier']."<br>";
	
   
} */


$img= $json['items'][0]['volumeInfo']['imageLinks']['thumbnail'];
$_SESSION['imglink']=$img;
header("Location: dashboard.php");
exit();
}
?>