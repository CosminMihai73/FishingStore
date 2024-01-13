<?php
$documentRoot = __DIR__;
$requestedFile = $_SERVER["REQUEST_URI"];
$file = $documentRoot . $requestedFile;

if (is_file($file)) {
    return false;
}

include_once($documentRoot . '/HomePage.php');
?>
