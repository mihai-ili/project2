<!-- шапка -->
<?php include('header.php');?>
<!-- тело страницы админ -->
    <div class="main"> <?php
    if(isset($_SESSION['prava'])){ //ЗАПРЕТ ДОСТУПА НЕАВТОРИЗОВАННОМУ ПОЛЬЗОВАТЕЛЮ;
        if($_SESSION['prava']!="user"){ //ЗАПРЕТ ДОСТУПА USERУ;
            ?> 
<!-- заявки на предоставлению грузовика -->
            <h1 class="color d-flex centr margin-top">Заявки на предоставление грузовика</h1><?php
                if (isset($_SESSION['id'])) {
                    $id = $_SESSION['id'];
                    $sql = "SELECT * FROM  grzv
                    INNER JOIN users ON id=id_user";
                    $result = mysqli_query($link, $sql) or die(mysqli_error($link));
                    if ($result->num_rows > 0) {?>
                        <table class="table fon2">
                            <thead>
                                <tr>
                                <th scope="col">Фио заказчика</th>
                                <th scope="col">Грузовик</th>
                                <th scope="col">Грузоподъемность</th>
                                <th scope="col">Дата</th>
                                <th scope="col">Время</th>
                                <th scope="col">Расстояние</th>
                                <th scope="col">Статус</th>
                                <th scope="col">Изменение</th>
                                </tr>
                            </thead>
                    <?php    while ($row = $result->fetch_assoc()) {
                            ?>
                            <tbody>
                                <tr>
                                <td><a href="lk.php?id_u=<?php echo $row['id_user']?>"><?php echo $row['fio'];?></a></th>
                                <td><?php echo $row['car'];?></th>
                                <td><?php echo $row['massa'];?></th>
                                <td><?php echo $row['date'];?></th>
                                <td><?php echo $row['time'];?></td>
                                <td><?php echo $row['km'];?></td>
                                <td><?php echo $row['status'];?></td>
                                <?php 
                                if ($row['status'] === "новый" || $row['status'] === "В обработке") { 
                                ?>

                                <td scope="col"><form method="post" action="project/status.php?id_z1=<?php echo $row['id_z1'] ?>" class="d-flex">
                                    <select id="status" name="status" class="margin_r">
                                        <option value="В обработке">В обработке</option>
                                        <option value="ОДОБРЕННО">ОДОБРЕННО</option>
                                        <option value="ОТКЛОНЕНО">ОТКЛОНЕНО</option>
                                    </select><br>
                                    <button type="submit" class="btn">Обновить статус</button>
                                </form></th>
                                <?php }else{?>
                                    <td>Статус изменен</td>
                            <?php }?>
                                </tr>
                            </tbody>
                            <?php
                        }
                        ?></table><?php
                        }
                        }
                        ?>
<!-- заявки на заказ доставки -->
                    <h1 class="color d-flex centr margin-top">Заявки на заказ доставки</h1><?php
                        if (isset($_SESSION['id'])) {
                            $id = $_SESSION['id'];
                            $sql = "SELECT * FROM  zakaz 
                            INNER JOIN usl ON zakaz.id_usl=usl.id_u
                            INNER JOIN users ON users.id=zakaz.id_user";
                            $result = mysqli_query($link, $sql) or die(mysqli_error($link));
                            if ($result->num_rows > 0) {?>
                                <table class="table fon2">
                                    <thead>
                                        <tr>
                                        <th scope="col">Фио заказчика</th>
                                        <th scope="col">Вид доставки</th>
                                        <th scope="col">Дата</th>
                                        <th scope="col">Время</th>
                                        <th scope="col">Адрес погрузки</th>
                                        <th scope="col">Адрес доставки</th>
                                        <th scope="col">Статус</th>
                                        
                                        <th scope="col">Изменение</th>
                                        </tr>
                                    </thead>
                            <?php    while ($row = $result->fetch_assoc()) {
                                    ?>
                                    <tbody>
                                        <tr>
                                        <td><a href="lk.php?id_u=<?php echo $row['id_user']?>"><?php echo $row['fio'];?></a></th>
                                        <td><?php echo $row['usl_name'];?></td>
                                        <td scope="row"><?php echo $row['date'];?></th>
                                        <td><?php echo $row['time'];?></td>
                                        <td><?php echo $row['point1'];?></td>
                                        <td><?php echo $row['point2'];?></td>
                                        <td><?php echo $row['status'];?></td>
                                        <?php 
                                        if ($row['status'] === "новый" || $row['status'] === "В обработке") { 
                                        ?>

                                        <td scope="col"><form method="post" action="project/status.php?id_z=<?php echo $row['id_z'] ?>" class="d-flex">
                                            <select id="status" name="status" class="margin_r">
                                                <option value="В обработке">В обработке</option>
                                                <option value="ОДОБРЕННО">ОДОБРЕННО</option>
                                                <option value="ОТКЛОНЕНО">ОТКЛОНЕНО</option>
                                            </select><br>
                                            <button type="submit" class="btn">Обновить статус</button>
                                        </form></th>
                                        <?php }else{?>
                                            <td>Статус изменен</td>
                                    <?php }?>
                                        </tr>
                                    </tbody>
                                    <?php
                                }
                                ?></table><?php
                                }
                                }
                            }else{
                                echo "<script>alert(\"ДОСТУП ЗАПРЕЩЕН!"."\");</script>";
                                echo "<script>window.location.href='index.php'</script>";
                            }
                        }else{
                            echo "<script>alert(\"ДОСТУП ЗАПРЕЩЕН!"."\");</script>";
                            echo "<script>window.location.href='index.php'</script>";
                        }
                                ?>
    </div>
<!--подвал  -->
<?php include('footer.php');?>
