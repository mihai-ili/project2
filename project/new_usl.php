<?php
session_start();
require_once('connect.php');

if (isset($_POST['zag'])  && isset($_POST['opis']) && isset($_POST['cena'])) { // проверка заполненности полей
    // получение переменых из формы и запись данных в переменые локальные
    $zag = $_POST['zag'];
    $cena = $_POST['cena'];
    $opis = $_POST['opis'];
  
        // Запрос для вставки данных в базу данных
        $query = "INSERT INTO `usl`(`usl_name`, `opis`, `cena`) VALUES ('$zag','$opis','$cena')";
        
        if ($link->query($query) === true) {
            echo "<script>alert('Услуга добавлена');</script>";
            echo "<script>window.location.href='../index.php'</script>";
        } else {
            echo "<script>alert('Ошибка: " . $link->error . "');</script>";
            echo "<script>window.location.href='../index.php'</script>";
        }
    
}else {
    echo "<script>alert('Введите данные');</script>";
    echo "<script>window.location.href='../news.php'</script>";
}
?>