<?php
 // Get cURL resource
$curl = curl_init();
// Set some options - we are passing in a useragent too here
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'http://isbndb.com/api/v2/xml/63XF8F4Y/books?q=1429215216',
    CURLOPT_USERAGENT => 'Codular Sample cURL Request'
));
// Send the request & save response to $resp
$resp = curl_exec($curl);
// Close request to clear up some resources
curl_close($curl);
$xml=simplexml_load_string($resp) or die("Error: Cannot create object");
print_r($xml);


?>