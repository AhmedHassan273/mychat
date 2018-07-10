<?php    
    require('database/Connection.php');
    require('database/QueryBuilder.php');
    
    $pdo = Connection::make();
    $query = new QueryBuilder($pdo);
    $id = $_POST['ID'];
    $name = $_POST['USERNAME'];
    $msg = $_POST['message'];
    $date = date('D h:i a');
    $currentMessage = $query->fetch("SELECT MESSAGE FROM CHAT WHERE ID = '$id';");
    if($currentMessage == '') {
        $query->query("UPDATE CHAT SET MESSAGE = '$msg' WHERE ID = '$id';");
    } else {
        $query->query("INSERT INTO CHAT (ID, USERNAME, DATE, MESSAGE) VALUES (NULL, '$name', '$date', '$msg')");    
    }
    $data = $query->selectAll('chat');
    header("Location: chatbox.php");
    
