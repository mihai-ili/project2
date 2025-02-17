<?php
    session_start();

    require_once('connect.php');

    if(isset($_POST['email_a']) && ($_POST['log']) && ($_POST['password_a'])){
        $fio=$_POST['fio'];
        $phone=$_POST['phone'];
        $email=$_POST['email_a'];
        $log =$_POST['log'];
        $password =$_POST['password_a'];

        $query= "INSERT INTO `users`(`fio`, `phone`, `email`, `login`, `password`) VALUES ('$fio','$phone','$email','$log','$password')";
        if($link ->query($query)===true){
            echo "<script>alert(\"Вы зарегистрированы"."\");</script>";
            echo "<script>window.location.href='../login.php'</script>";  
        }
        else{
            echo "<script>alert(\"Ошибка"."\");</script>";
            echo "<script>window.location.href='../index.php'</script>"; 
        }
       
        
    }

?>