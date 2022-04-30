<?php
        require 'connection.php';

        if (!isset($_SESSION['level'])) {
            header("Location: http://localhost/carrental/");
        }

        var_dump($_POST);
        $id = $_POST['id'];
        $sql = "SELECT carid FROM confirm WHERE id='$id'";
        $result = $conn->query($sql);
        var_dump($result);
        $row = $result->fetch_assoc();
        $carid = $row['carid'];

        $sql = "UPDATE cars SET status='1' WHERE id='$carid'";
        $conn->query($sql);

        $sql = "DELETE FROM confirm WHERE carid='$carid'";
        $conn->query($sql);

        header("Location: http://localhost/carrental/awaitingcomfirmation.php");