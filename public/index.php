<?php
require_once "../app/models/User.php";

$afficheData = new User();
$data = $afficheData->getAll();
echo "<pre>";
print_r($data);

?>