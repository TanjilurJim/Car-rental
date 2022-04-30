<?php
        require 'connection.php';

        if (!isset($_SESSION['level'])) {
            header("Location: http://localhost/carrental/");
        }

        $carid = $_POST['carid'];
        $rent = $_POST['price'];
        $approximatereturndate = $_POST['approximatereturndate'];
        $actualreturndate = $_POST['actualreturndate'];
        
        $filename = $_FILES["picture"]["name"];
        $tempname = $_FILES["picture"]["tmp_name"];    
        $folder = "images/".$filename;

        $sql = "SELECT userid FROM rent WHERE carid='$carid'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $userid = $row['userid'];

        $sql = "INSERT INTO confirm (carid,userid,rent,picture,approximatereturndate,actualreturndate) VALUES('$carid','$userid','$rent','$filename','$approximatereturndate','$actualreturndate')";
        $result = $conn->query($sql);
        move_uploaded_file($tempname, $folder);

        $sql = "UPDATE cars SET status='3' WHERE id='$carid'";
        $result = $conn->query($sql);

        $sql = "DELETE FROM rent WHERE carid='$carid'";
        $result2 = $conn->query($sql);

        header("Location: http://localhost/carrental/rentedcars.php");
        