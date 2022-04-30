<?php
        require 'connection.php';

        if (!isset($_SESSION['level']) || empty($_POST)) {
            header("Location: http://localhost/carrental/");
        }

        $id = $_POST['id'];

        $sql = "UPDATE cars SET status='2' WHERE id='$id'";
        $result = $conn->query($sql);

        $sql = "SELECT id FROM cars WHERE id='$id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $carid = $row['id'];

        $name = $_SESSION['username'];
        $sql = "SELECT id FROM users WHERE name='$name'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $userid = $row['id'];

        $returndate = date("Y-m-d");

        $date = date("Y-m-d");
        $date = strtotime($date);
        $date = strtotime("+7 day", $date);
        $returndate = date("Y-m-d", $date);
        
        $sql = "INSERT into rent (carid,userid,returndate) VALUES ('$carid','$userid','$returndate')";
        $result = $conn->query($sql);

        if ($result) {
            header("Location: http://localhost/carrental/fleet.php");
        } else {
            header("Location: http://localhost/carrental/");
        }
        