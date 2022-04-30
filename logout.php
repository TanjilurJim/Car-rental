<?php
include ("connection.php");
include ("header.php");
if (isset($_SESSION['login'])) {
    session_unset();
    session_destroy();
}
header("Location: http://localhost/carrental");
