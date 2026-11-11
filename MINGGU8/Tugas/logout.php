<?php
session_start();
session_unset();
session_destroy();

if (isset($_GET['pesan']) && $_GET['pesan'] == "expired") {
    header("Location: login.php?pesan=expired");
} else {
    header("Location: login.php?pesan=logout");
}
exit;