<?php
if (isset($_POST['remove'])) {
                $id_service = $_POST['remove'];
                $sql = "DELETE FROM zakaz WHERE id_service = '$id_service' AND id_user = '$id_user'";
                mysqli_query($link, $sql) or die("Ошибка удаления: " . mysqli_error($link));
                echo "<script>window.location.href='../lkk.php'</script>";  // Перезагрузка страницы после удаления
            }?>