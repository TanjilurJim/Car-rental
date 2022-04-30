<?php
        require 'connection.php';

        if (!isset($_SESSION['level']) || $_SESSION['level'] != 1) {
            header("Location: http://localhost/carrental/");
        }

        $id2 = $_POST['id'];

        $sql = "DELETE FROM cars WHERE id=$id2;";
        $result = $conn->query($sql);
        if ($result) {
            header("Location: http://localhost/carrental/allcars.php");
        } else {
            header("Location: http://localhost/carrental/");
        }
        