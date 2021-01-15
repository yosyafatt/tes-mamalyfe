<?php
error_reporting(E_ALL & ~E_NOTICE);
if (!session_id()) session_start();
require_once '../app/init.php';

$app = new App;
