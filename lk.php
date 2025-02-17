<!-- шапка -->
<?php include('header.php'); ?>
<!-- тело страницы "Личный кабинет" -->
    <div class="main"> 
        <div class="page-container">
            <div class="content-wrap"> 
    <!--запрос и вывод личных данных пользователя  -->
                <?php
                if (isset($_SESSION['id'])) {
                if($_SESSION['prava']=='user'){
                $id = $_SESSION['id'];
                }else{
                $id=$_GET['id_u'];
                }
                $sql = "SELECT * FROM  users WHERE id = $id";
                $result = mysqli_query($link, $sql) or die(mysqli_error($link));
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Личные данные пользователя</h5>
                                <p class="card-text"><strong>ФИО:</strong> <?php echo $row['fio'];?></p>
                                <p class="card-text"><strong>Email:</strong> <?php echo $row['email'];?></p>
                                <p class="card-text"><strong>Телефон:</strong> <?php echo $row['phone'];?></p>
                        <?php if($_SESSION['prava']=='user'){ ?><button type="button" class="btn btnt btn-outline-success margin_left margin_r" data-bs-toggle="modal" data-bs-target="#exampleModal4">Редактировать</button>
                        <?php }?>        
                            </div>
                        </div>
                        <?php
                    }
                    }
                    }
     // запрос и вывод заявок на предоставление грузовика
                            if (isset($_SESSION['id'])) {
                                $id = $_SESSION['id'];
                                $sql = "SELECT * FROM  grzv WHERE id_user = $id";
                                $result = mysqli_query($link, $sql) or die(mysqli_error($link));
                                if ($result->num_rows > 0) {?>
                                <h1 class="color d-flex centr margin-top">Заявки на предоставление грузовика</h1>
                                    <table class="table fon2">
                                        <thead>
                                            <tr>
                                            <th scope="col">Грузовик</th>
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
                                            <th scope="row"><?php echo $row['car'];?></th>
                                            <th scope="row"><?php echo $row['date'];?></th>
                                            <td><?php echo $row['time'];?></td>
                                            <td><?php echo $row['km'];?></td>
                                            <td><?php echo $row['status'];?></td>
                                            <?php if ($row['status'] === "новый") {
                                                ?>
                                                <td><a href="project/status.php?id_z1=<?php echo $row['id_z1']; ?>&o=0" class="btn">Отменить</a></td>
                                                <?php
                                            } else{
                                                ?> <td>Отмена невозможна</td><?php
                                            }?>
                                            </tr>
                                        </tbody>
                                        <?php
                                    }
                                    ?></table><?php
                                    }
                                    }
                                    ?>
    <!-- запрос и вывод заявок на заках доставки -->
               <?php
        if (isset($_SESSION['id'])) {
            $id = $_SESSION['id'];
            $sql = "SELECT * FROM  zakaz 
            INNER JOIN usl ON zakaz.id_usl=usl.id_u
            WHERE id_user = $id";
            $result = mysqli_query($link, $sql) or die(mysqli_error($link));
            if ($result->num_rows > 0) {?>
             <h1 class="color d-flex centr margin-top">Заявки на заказ доставки</h1>
                <table class="table fon2">
                    <thead>
                        <tr>
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
                        <?php $status = $row['status'];?>
                        <td><?php echo $row['usl_name'];?></td>
                        <th scope="row"><?php echo $row['date'];?></th>
                        <td><?php echo $row['time'];?></td>
                        <td><?php echo $row['point1'];?></td>
                        <td><?php echo $row['point2'];?></td>
                        <td><?php echo $row['status'];?></td> 
                        <?php if ($row['status'] === "новый") {
                            ?>
                            <td><a href="project/status.php?id_z=<?php echo $row['id_z']; ?>&o=0" class="btn">Отменить</a></td>
                            <?php
                        } else{
                            ?> <td>Отмена невозможна</td><?php
                        }
                          
                            ?>
                        </tr>
                    </tbody>
                    <?php
                }
                ?></table><?php
                }
                }
                ?>
    <!-- Модальное окно редактирования данных-->
        <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Изменение</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                </div>
                <div class="modal-body">
                <form action="project/red_data.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">ФИО</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="fio" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Email</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Телефон</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="phone" required>
                    </div>
                    <button type="submit" class="btn btn-primary knopka" name="submit">Обновить данные</button>
                </form>
                </div>
                </div>
            </div>
            </div>
        </div>

<!-- подвал -->
<?php include('footer.php');?>
