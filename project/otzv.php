<?php
session_start();
require_once('connect.php');

if (isset($_POST['usl']) && isset($_POST['text'])) { // проверка заполненности полей
    // получение переменых из формы и запись данных в переменые локальные
    $id=$_SESSION['id'];
    $usl=$_POST['usl'];
    $text=$_POST['text'];

   
        // Запрос для вставки данных в базу данных
        $query = "INSERT INTO `otzv`(`id_user`, `usl`, `text`) VALUES ('$id','$usl','$text')";
        
        if ($link->query($query) === true) {
            echo "<script>alert('Отзыв добавлен');</script>";
            echo "<script>window.location.href='../onas.php'</script>";
        } else {
            echo "<script>alert('Ошибка: " . $link->error . "');</script>";
            echo "<script>window.location.href='../onas.php'</script>";
        }
    
}else {
    echo "<script>alert('Введите данные');</script>";
    echo "<script>window.location.href='../onas.php'</script>";
}
?>