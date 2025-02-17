<?php
    session_start();
    require_once('connect.php');
    // получение переменых из формы и запись данных в переменые локальные
        $id=$_GET['id'];
        $pole1=$_POST['pole1'];
        $pole2=$_POST['pole2'];
        $pole3=$_POST['pole3'];
        // запрос на обновление
        $query= "UPDATE `contact` SET `pole1`='$pole1',`pole2`='$pole2',`pole3`='$pole3' WHERE id_c=$id";
        if($link ->query($query)===true){
            echo "<script>alert(\"Данные обновлены"."\");</script>";
            echo "<script>window.location.href='../contact.php'</script>";  
        }
        else{
            echo "<script>alert(\"Ошибка"."\");</script>";
            echo "<script>window.location.href='../contact.php'</script>"; 
        }
       
        


?>