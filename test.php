<?php 
$curl = curl_init();
// Set some options - we are passing in a useragent too here
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'http://isbndb.com/api/v2/xml/63XF8F4Y/books/9781936221349',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
));
// Send the request & save response to $resp
$resp = curl_exec($curl);
$xml=simplexml_load_string($resp) or die("Error: Cannot create object");
echo 'hi';
echo $xml;
// Close request to clear up some resources
curl_close($curl);

?>