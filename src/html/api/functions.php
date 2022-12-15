<?php

function getPosts($connection){
    $orders = $connection->query("SELECT * FROM orders");
    $ordersList = [];
    while ($order = mysqli_fetch_assoc($orders)){
        $ordersList[] = $order;
    }
    echo json_encode($ordersList);  
}

function getPost($connection, $id){
    $order = $connection->query("SELECT * FROM orders WHERE orderID = $id");
    if (mysqli_num_rows($order) === 0){
        http_response_code(404);
        $res = [
            "status" => false,
            "message" => 'Order not found'
        ];
        echo json_encode($res);
    }
    else{
        $order = mysqli_fetch_assoc($order);
        echo json_encode($order);    
    }
}

function addOrder($connection, $data){
    if(empty($data['name']) || empty($data['order'])){
        http_response_code(400);
        $res = [
            "status" => false,
            "message" => 'Some data is not filled'
        ];

        echo json_encode($res);
        return;
    }
    else{
        $name = $data['name'];
        $order = $data['order'];
        $order = $connection->query("INSERT INTO orders VALUE (NULL, '$name', '$order')");

        http_response_code(201);
        $res = [
            "status" => true,
            "orderID" => mysqli_insert_id($connection)
        ];

        echo json_encode($res);
    }
    
}

function updateOrder($connection, $id, $data){
    if(empty($data['name']) || empty($data['order'])){
        http_response_code(400);
        $res = [
            "status" => false,
            "message" => 'Some data is not filled'
        ];
    
        echo json_encode($res);
        return;
    }

    $name = $data['name'];
    $order = $data['order'];
    $connection->query("UPDATE `orders` SET `name` = '$name', `order` = '$order' WHERE `orderID` = '$id'");

    http_response_code(200);
    $res = [
        "status" => true,
        "message" => 'Order is updated'
    ];

    echo json_encode($res);
}

function deleteOrder($connection, $id){
    $id = intval($id);
    $connection->query("DELETE FROM `orders` WHERE `orders`.`orderID` = '$id'");
    http_response_code(200);
    $res = [
        "status" => true,
        "message" => 'Order is deleted',
        "orderID" => $id
    ];

    echo json_encode($res);
}

function deleteFile($connection, $id){
    $id = intval($id);
    $result = $connection->query("SELECT name FROM `uploaded_files` WHERE `uploaded_files`.`id` = '$id'");
    $result = mysqli_fetch_assoc($result);
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/download/' . $result['name'])){
        unlink($_SERVER['DOCUMENT_ROOT'] . '/download/' . $result['name']);
    };
    $connection->query("DELETE FROM `uploaded_files` WHERE `uploaded_files`.`id` = '$id'");
    http_response_code(200);
    $res = [
        "status" => true,
        "message" => 'File is deleted',
        "fileID" => $id
    ];
    echo json_encode($res);
}