<?php

require_once 'db.php';

$data = [];

$status = 'Success';

$db = new DB();
$res = $db->select(1);

$data = array(
    'message' => $res,
    'status' => $status
);

echo json_encode($data);
