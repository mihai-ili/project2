<?php
session_start(); //старт сессии
require_once('connect.php'); //подключение к бд
if (isset($_POST['date']) && ($_POST['time']) && isset($_POST['km'])) { // проверка заполненности полей
    // получение полей из формы
    $fio = $_SESSION['fio'];
    $id = $_SESSION['id'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $km = $_POST['km'];
    $massa = $_POST['massa'];
    $car = $_POST['car'];
    // запрос на добавление
    $query = "INSERT INTO `grzv`(`id_user`, `car`, `date`, `time`, `km`, `massa`) VALUES ('$id','$car','$date','$time','$km','$massa')";
    if ($link->query($query) === true) {
        echo "<script>alert(\"$fio ваша заявка отправленна, ожидайте подтверждения" . "\");</script>";
        echo "<script>window.location.href='../lk.php'</script>";
    } else {
        echo "<script>alert(\"Ошибка" . "\");</script>";
        echo "<script>window.location.href='../grzv.php'</script>";
    }
}
