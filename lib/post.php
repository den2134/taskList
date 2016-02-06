<?php
require_once 'db.php';

$status = 'Success';

$db = new DB();
$db->insert();

echo $status;