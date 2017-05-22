<?php 
$clientId="22ee61a0df75f823280ebc103e3e1a3a";
$clientSecret="a3876c803af19919fabd68e2ad04189c";
$callback="soundcloud/callback.php";
 
require_once 'soundcloud/soundcloud.php';
$soundcloud = new Services_Soundcloud($clientId, $clientSecret, $callback);
?>