<?php
session_start();
$_SESSION['username']="user1";
header("Location: index.php");