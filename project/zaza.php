<?php
    session_start();
    require_once('connect.php');
    if(isset($_POST['date']) && ($_POST['time'])&& isset($_POST['point1'])){ // проверка заполненности полей
        // получение переменых из формы и запись данных в переменые локальные
        $fio=$_SESSION['fio'];
        $id=$_SESSION['id'];
        $date=$_POST['date'];
        $time =$_POST['time'];
        $point1 =$_POST['point1'];
        $point2 =$_POST['point2'];
        $id_usl=$_GET['id'];
        // запрос на добавление
        $query= "INSERT INTO `zakaz`(`id_user`, `id_usl`, `date`, `time`, `point1`, `point2`) VALUES ('$id','$id_usl','$date','$time','$point1','$point2')";
        if($link ->query($query)===true){
            echo "<script>alert(\"$fio ваша заявка отправленна, ожидайте подтверждения"."\");</script>";
            echo "<script>window.location.href='../lk.php'</script>";  
        }
        else{
            echo "<script>alert(\"Ошибка"."\");</script>";
            echo "<script>window.location.href='../grzv.php'</script>"; 
        }
    }
?>