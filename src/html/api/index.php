<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json; charset=UTF-8");
require 'connect.php';
require 'functions.php';

$q = $_GET['q'];
$params = explode('/', $q);

$type = $params[0];
if(isset($params[1])){
    $id = $params[1];
}

$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
    case 'GET':
        if ($type === 'orders'){
            if(isset($id)){
                getPost($connect, $id);
            }
            else{
                getPosts($connect);
            }
        }
        break;
    case 'POST':
        if ($type === 'orders'){
            addOrder($connect, $_POST);
        }
        break;
    case 'PATCH':
        if ($type === 'orders'){
            if(isset($id)){
                $data = json_decode(file_get_contents("php://input"), true);
                updateOrder($connect, $id, $data);
            }
        }
        break;
    case 'DELETE':
        if ($type === 'orders'){
            if(isset($id)){
                deleteOrder($connect, $id);
            }
        } else if ($type === 'files'){
            if(isset($id)){
                deleteFile($connect, $id);
            }
        }
        break;
}

