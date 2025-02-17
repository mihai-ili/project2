<?php
session_start();
require_once('connect.php');

if (isset($_POST['name']) && isset($_FILES['foto']) && isset($_FILES['foto1']) && isset($_FILES['foto2'])) {
    $name = $_POST['name'];
    $discription = $_POST['discription'];
    $cost = $_POST['cost'];
    $target_dir = "imgbd/";
    $foto = $target_dir . basename($_FILES["foto"]["name"]);
    $foto1 = $target_dir . basename($_FILES["foto1"]["name"]);
    $foto2 = $target_dir . basename($_FILES["foto2"]["name"]);

    // Проверка на ошибки при загрузке файлов
    $errors = [];
    if (!move_uploaded_file($_FILES["foto"]["tmp_name"], $foto)) {
        $errors[] = "Ошибка при загрузке файла " . $_FILES["foto"]["name"];
    }
    if (!move_uploaded_file($_FILES["foto1"]["tmp_name"], $foto1)) {
        $errors[] = "Ошибка при загрузке файла " . $_FILES["foto1"]["name"];
    }
    if (!move_uploaded_file($_FILES["foto2"]["tmp_name"], $foto2)) {
        $errors[] = "Ошибка при загрузке файла " . $_FILES["foto2"]["name"];
    }

    if (empty($errors)) {
        // Запрос для вставки данных в базу данных
        $query = "INSERT INTO service(name, discription, cost, foto, foto1, foto2)
                  VALUES ('$name', '$discription', '$cost', '$foto', '$foto1', '$foto2')";
        
        if ($link->query($query) === true) {
            echo "<script>alert('Услуга добавлена');</script>";
            echo "<script>window.location.href='../login.php'</script>";
        } else {
            echo "<script>alert('Ошибка: " . $link->error . "');</script>";
            echo "<script>window.location.href='../index.php'</script>";
        }
    } else {
        foreach ($errors as $error) {
            echo "<script>alert('$error');</script>";
        }
        echo "<script>window.location.href='../index.php'</script>";
    }
}
?>