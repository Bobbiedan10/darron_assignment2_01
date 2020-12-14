<?php
require 'autoloader.php';
require 'config.php';

$auth = new AuthenticateController();
$auth->logOutUser();
?>