<?php
    session_start();

    require_once('connect.php');

    if(isset($_POST['cars']) && isset($_POST['discription']) && isset($_POST['date']) && isset($_POST['time1'])){
        $cars = $_POST['cars'];
        $discription = $_POST['discription'];
        $date = $_POST['date'];
        $time = $_POST['time1'];
        $id_user = $_SESSION['id_user'];
        $status = $_SESSION['status'];
        $query = "INSERT INTO booking (`id_user`, `cars`, `discription`, `date`, `time`) VALUES ('$id_user','$cars','$discription','$date','$time')";
        echo "nnnnn";

        if($link ->query($query)===true){
            echo "<script>alert(\"Вы создали заявку, отслеживайте статус в личном кабинете"."\");</script>";
            echo "<script>window.location.href='../lk.php'</script>";  
        }
        else{
            echo "<script>alert(\"Ошибка"."\");</script>";
            echo "<script>window.location.href='../index.php'</script>"; 
        }
       
        
    }

?>