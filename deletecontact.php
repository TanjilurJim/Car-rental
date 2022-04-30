<?php
        require 'connection.php';

        if (!isset($_SESSION['level']) || $_SESSION['level'] != 1) {
            header("Location: http://localhost/carrental/");
        }

        $id = $_POST['id'];

        $sql = "DELETE FROM contact WHERE id='$id'";
        $result = $conn->query($sql);
        if ($result) {
            header("Location: http://localhost/carrental/allcontacts.php");
        } else {
            header("Location: http://localhost/carrental/");
        }
        