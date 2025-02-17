<?php
session_start();
require_once('connect.php');

if (isset($_POST['zag']) && isset($_FILES['foto']) && isset($_POST['opis']) && isset($_POST['podzag'])) { // проверка заполненности полей
    // получение переменых из формы и запись данных в переменые локальные
    $zag = $_POST['zag'];
    $podzag = $_POST['podzag'];
    $opis = $_POST['opis'];
    $target_dir = "img/";
    $foto = $target_dir . basename($_FILES["foto"]["name"]);

   
        // Запрос для вставки данных в базу данных
        $query = "INSERT INTO `news`(`zag`, `podzag`, `opis`, `foto`) VALUES ('$zag','$podzag','$opis','$foto')";
        
        if ($link->query($query) === true) {
            echo "<script>alert('Новость добавлена');</script>";
            echo "<script>window.location.href='../news.php'</script>";
        } else {
            echo "<script>alert('Ошибка: " . $link->error . "');</script>";
            echo "<script>window.location.href='../news.php'</script>";
        }
    
}else {
    echo "<script>alert('Введите данные');</script>";
    echo "<script>window.location.href='../news.php'</script>";
}
?>