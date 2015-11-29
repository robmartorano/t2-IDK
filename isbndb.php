<?php
session_start();
 // Get cURL resource
//$curl = curl_init();
//$isbn = $_POST["ISBN"];
//$url = 'http://isbndb.com/api/v2/xml/63XF8F4Y/books?q=' .$isbn;
//curl_setopt_array($curl, array(
//    CURLOPT_RETURNTRANSFER => 1,
//    CURLOPT_URL => $url,
//    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
//));
// Send the request & save response to $resp
//$resp = curl_exec($curl);
// Close request to clear up some resources
//curl_close($curl);
//$response = new SimpleXMLElement($resp);

//$xml=simplexml_load_string($resp) or die("Error: Cannot create object");
//if($xml->result_count==0){
//	echo 'no results';
//}else{
//echo'is this the book you you want to list?';
//echo  $xml->data->author_data->name;
//echo  $xml->data->title;	
//echo  $xml->data->isbn13;
//}
//print_r($xml);
$isbn = $_POST["ISBN"];
$url="https://www.googleapis.com/books/v1/volumes?q=isbn:".$isbn;
$content = file_get_contents($url);
$json = json_decode($content,true);
if($json['totalItems']!=1){
	echo 'no results or multiple results';
	echo "<br>";
}else{
foreach($json['items'][0]['volumeInfo']['authors'] as $k => $v) {
    echo $v."  "." ";

   
}
echo"<br>";
echo $json['items'][0]['volumeInfo']['title']."<br>";
foreach($json['items'][0]['volumeInfo']['industryIdentifiers'] as $k => $v) {
    echo $v['type'].":".$v['identifier']."<br>";
	
   
}


$img= $json['items'][0]['volumeInfo']['imageLinks']['thumbnail'];
echo "<img src=".$img. "alt='book image not found'>";
}
?>