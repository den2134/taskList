<?php

require_once 'db.php';

$data = [];

$status = 'Success';

$db = new DB();
$res = $db->select();

$data = array(
    'message' => $res,
    'status' => $status
);

echo json_encode($data);

