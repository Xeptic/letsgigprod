<?php
include_once '../config.php';
require_once 'soundcloud.php';

try {
   $accessToken = $soundcloud->accessToken($_GET['code']);
} catch (Services_Soundcloud_Invalid_Http_Response_Code_Exception $e) {
    exit($e->getMessage());
}
try {
    $me = json_decode($soundcloud->get('me'), true);
} catch (Services_Soundcloud_Invalid_Http_Response_Code_Exception $e) {
    exit($e->getMessage());
}
 
$user_data = array(
                'access_token' => $accessToken['access_token'],
                'id' => $me['id'],
                'username' => $me['username'],
                'name' => $me['full_name'],
                'avatar' => $me['avatar_url']
            );
 
         echo 'Welcome'.$user_data['name'];
?>