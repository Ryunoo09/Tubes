<?php
include "config.php";
$db = new Database();
$username = $_POST['username'];
$password = $_POST['password'];

foreach ($db->login($username, $password) as $x) {
    session_start();
    $_SESSION["username"] = $username;
    $_SESSION["password"] = $x['password'];
    $akses_id = $x['akses_id'];
    $pass = $x['password'];

    // Memeriksa user login sebagai admin atau peminjam
    if (($akses_id == '1') && ($password == $pass)) {
        header('Location: ../material-dashboard-master/pages/dashboard.html');
    } elseif (($akses_id == '2') && ($password == $pass)) {
        header('Location: ../material-dashboard-master/pages/menu_pengunjung.html');
    } else {
        header('Location: ../material-dashboard-master/pages/login.html');
    }
}
?>
