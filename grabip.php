<?php

$html	=	getHTML("http://www.whatismyip.com",60);

preg_match("/the-ip\">(.*)div/i", $html, $match);

$data	=	$match[1];

$enc_ip	=	strip_tags($data);
$ip1 = str_replace(";","",$enc_ip);
$ip2 = explode("&#",$ip1);
$new_ip="";
foreach ($ip2 as $char){
  $new_ip.= chr($char);
}

echo trim($new_ip);

function getHTML($url,$timeout)
{
       $HTTP_USER_AGENT = "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2228.0 Safari/537.36";

       $ch = curl_init($url); // initialize curl with given url
       curl_setopt($ch, CURLOPT_USERAGENT, $HTTP_USER_AGENT); // set  useragent
       curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // write the response to a variable
       curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // follow redirects if any
       curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout); // max. seconds to execute
       curl_setopt($ch, CURLOPT_FAILONERROR, 1); // stop when it encounters an error
       return @curl_exec($ch);
}

?>
