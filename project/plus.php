<?php
include('../header.php');
require_once('connect.php'); // Подключаем файл для соединения с базой данных

if (isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];

    // Проверка, была ли отправлена форма
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id_service"])) {
        $id_service = $_POST["id_service"];
        
        // Получаем текущее количество товара
        $sql = "SELECT kol FROM zakaz WHERE id_user = '$id_user' AND id_service = '$id_service'";
        $result = mysqli_query($link, $sql) or die("Ошибка запроса: " . mysqli_error($link));
        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $kol = $row['kol'] + 1;

            // Обновляем количество товара
            $query = "UPDATE zakaz SET kol = '$kol' WHERE id_service = '$id_service' AND id_user = '$id_user'";
            mysqli_query($link, $query) or die("Ошибка обновления: " . mysqli_error($link));
        }
    }
    echo "<script>window.location.href='../basket.php';</script>";}
?>
