<link rel="stylesheet" href="../css/bootstrap.css">
<link rel="stylesheet" href="../css/style.css">
<?php
require_once('connect.php');
session_start();
// отмена полльзователем
if(isset($_GET['o'])){
    if(isset($_GET['id_z1'])){
        $id1 = $_GET['id_z1'];
        // запрос на обновление
        $sql = "UPDATE grzv SET status='Отменен пользователем' WHERE id_z1='$id1'";
        $result = mysqli_query($link, $sql) or die("Ошибка запроса: " . mysqli_error($link));
        if ($result) {
            echo "<script>alert(\"Заявка отменена!"."\");</script>";
            echo "<script>window.location.href='../lk.php'</script>"; 
        } else {
            echo "<script>alert(\"ОШИБКА"."\");</script>";
            echo "<script>window.location.href='../lk.php'</script>";
        }
    }elseif(isset($_GET['id_z'])){
        $id2 = $_GET['id_z'];
       // запрос на обновление
        $sql = "UPDATE zakaz SET status='Отменен пользователем' WHERE id_z='$id2'";
        $result = mysqli_query($link, $sql) or die("Ошибка запроса: " . mysqli_error($link));
        if ($result) {
            echo "<script>alert(\"Заявка отменена!"."\");</script>";
            echo "<script>window.location.href='../lk.php'</script>"; 
        } else {
            echo "<script>alert(\"ОШИБКА"."\");</script>";
            echo "<script>window.location.href='../lk.php'</script>";
        }
    }   
}
?>
<!-- ФОРМА ДЛЯ ВЫБОРА СТАТУСА -->
<!-- <form method="post" action="">
    <label for="status">Новый статус:</label>
    <select id="status" name="status">
        <option value="В обработке">В обработке</option>
        <option value="ОДОБРЕННО">ОДОБРЕННО</option>
        <option value="ОТКЛОНЕНО">ОТКЛОНЕНО</option>
    </select><br>
    <button type="submit">Обновить статус</button>
    <a href="../admin.php">Вернуться к заявкам</a>
</form> -->
<!-- ОБРАБОТЧИК ИЗМЕНЕНИЯ СТАТУСА -->
<?php
if($_SESSION['prava']!="user"){
    if(isset($_POST['status'])){
        $status = $_POST['status'];
        if(isset($_GET['id_z1'])){
            $id1 = $_GET['id_z1'];
            $sql = "UPDATE grzv SET status='$status' WHERE id_z1='$id1'";
            $result = mysqli_query($link, $sql) or die("Ошибка запроса: " . mysqli_error($link));
            if ($result) {
                echo "<script>alert(\"СТАТУС ОБНОВЛЕН!"."\");</script>";
                echo "<script>window.location.href='../admin.php'</script>"; 
            } else {
                echo "<script>alert(\"ОШИБКА"."\");</script>";
                echo "<script>window.location.href='../admin.php'</script>";
            }
        }elseif(isset($_GET['id_z'])){
            $id2 = $_GET['id_z'];
            $sql = "UPDATE zakaz SET status='$status' WHERE id_z='$id2'";
            $result = mysqli_query($link, $sql) or die("Ошибка запроса: " . mysqli_error($link));
            if ($result) {
                echo "<script>alert(\"СТАТУС ОБНОВЛЕН!"."\");</script>";
                echo "<script>window.location.href='../admin.php'</script>"; 
            } else {
                echo "<script>alert(\"ОШИБКА"."\");</script>";
                echo "<script>window.location.href='../admin.php'</script>";
            }
        }   
    }
}
?>
