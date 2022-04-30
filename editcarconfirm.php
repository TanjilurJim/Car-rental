<?php

    require 'connection.php';

    if (!isset($_SESSION['level']) || $_SESSION['level'] != 1) {
        header("Location: http://localhost/carrental/");
    }

        $id = $_POST["id"];
        $name = $_POST["name"];
        $price = $_POST["price"];
        $description = $_POST["description"];

        $sql = "UPDATE cars SET name = '$name', description = '$description', price = '$price' WHERE id = '$id'";
        $result = $conn->query($sql);

        var_dump($_POST);
        
        header("Location: http://localhost/carrental/allcars.php");
        
    