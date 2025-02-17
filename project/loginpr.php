<?php
    session_start();
    require_once('connect.php');

    if(isset($_POST['email']) && isset($_POST['password'])){
        // получение переменых из формы и запись данных в переменые локальные
        $email = $_POST['email'];
        $password = $_POST['password'];
        // берем данные из базы
        $query = "SELECT * FROM `users` WHERE `email`='{$email}' AND `password`='{$password}' LIMIT 1";
        // запускаеи выполненипе запроса и результат в переменые
        $sql = mysqli_query($link, $query) or die(mysqli_error());
        if(mysqli_num_rows($sql)==1){
            // формируем массив
            $row = mysqli_fetch_assoc($sql);
            $_SESSION['fio'] = $row['fio'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['id']= $row['id'];
            $_SESSION['phone']= $row['phone'];
            $_SESSION['prava']= $row['role'];
            echo "<script>alert(\"Вы авторизованы"."\");</script>";
            echo "<script>window.location.href='../index.php'</script>";
        }else{
            echo "<script>alert(\"Неправильный логин или пароль попробуйте снова"."\");</script>";
            echo "<script>window.location.href='../index.php'</script>";
        }
    }
?>