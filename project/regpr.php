<?php
    session_start();
    require_once('connect.php');

    if(isset($_POST['email']) && ($_POST['password'])){ // проверка заполненности полей
        // получение переменых из формы и запись данных в переменые локальные
        $fio=$_POST['fio'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];
        $password =$_POST['password'];

        $query= "INSERT INTO `users`(`fio`, `phone`, `email`, `password`) VALUES ('$fio','$phone','$email','$password')";
        if($link ->query($query)===true){
            echo "<script>alert(\"Вы зарегистрированы"."\");</script>";
            echo "<script>window.location.href='../index.php'</script>";  
        }
        else{
            echo "<script>alert(\"Ошибка"."\");</script>";
            echo "<script>window.location.href='../index.php'</script>"; 
        }
       
        
    }

?>