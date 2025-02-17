<!-- подключение к бд -->
<?php
$host = "localhost";
$bd = "ilup25";
$user = "root";
$password = "";
$link = mysqli_connect($host,$user,$password,$bd);
$query = "set names utf8";
$link->query($query);
?>