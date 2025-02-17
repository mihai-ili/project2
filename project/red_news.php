<?php
    session_start();

    require_once('connect.php');
        // получение переменых из формы и запись данных в переменые локальные
        $id=$_GET['id'];
        $zag=$_POST['pole1'];
        $opis=$_POST['pole2'];
       // запрос на обновление
        $query= "UPDATE `news` SET `zag`='$zag',`opis`='$opis' WHERE id_n=$id";
        if($link ->query($query)===true){
            echo "<script>alert(\"Данные обновлены"."\");</script>";
            echo "<script>window.location.href='../news.php'</script>";  
        }
        else{
            echo "<script>alert(\"Ошибка"."\");</script>";
            echo "<script>window.location.href='../news.php'</script>"; 
        }
       
        


?>