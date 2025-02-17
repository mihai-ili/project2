
<?php
    session_start();

    require_once('connect.php');
        // получение переменых из формы и запись данных в переменые локальные
        $id=$_SESSION['id'];
        $pole1=$_POST['fio'];
        $pole2=$_POST['email'];
        $pole3=$_POST['phone'];
        // запрос на обновление
        $query= "UPDATE `users` SET `fio`='$pole1',`email`='$pole2',`phone`='$pole3' WHERE id=$id";
        if($link ->query($query)===true){
            echo "<script>alert(\"Данные обновлены"."\");</script>";
            echo "<script>window.location.href='../lk.php'</script>";  
        }
        else{
            echo "<script>alert(\"Ошибка"."\");</script>";
            echo "<script>window.location.href='../lk.php'</script>"; 
        }
       
        


?>