<?php
$username = addslashes($_POST['username']);
$password = md5($_POST['password']);

include 'koneksi.php';

$user = mysqli_query($conn, "select * from admin where username='$username' and password='$password'");
$check = mysqli_num_rows($user);
if ($check > 0) {
    session_start();
    $row = mysqli_fetch_array($user);
    $_SESSION['username'] = $row['username'];

    $_SESSION['password'] = $row['password'];
    header("location: index.php");

} else {
    header("location: login.php?login=unsuccessfull");

}
