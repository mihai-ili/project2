<?php
    session_start();

    require_once('connect.php');
        // получение переменых из формы и запись данных в переменые локальные
        $id=$_GET['id'];
        $zag=$_POST['pole1'];
        $opis=$_POST['pole2'];
        $cena=$_POST['pole3'];
        // запрос на обновление
        $query= "UPDATE `usl` SET `usl_name`='$zag',`opis`='$opis',`cena`='$cena' WHERE id_u=$id";
        if($link ->query($query)===true){
            echo "<script>alert(\"Данные обновлены"."\");</script>";
            echo "<script>window.location.href='../index.php'</script>";  
        }
        else{
            echo "<script>alert(\"Ошибка"."\");</script>";
            echo "<script>window.location.href='../index.php'</script>"; 
        }
       
        


?>