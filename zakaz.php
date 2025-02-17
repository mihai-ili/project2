<!-- шапка -->
<?php include('header.php');
// тело страницы заказ
        if(isset($_SESSION['id'])){
        $id=$_GET['id'];
        $sql = "SELECT * FROM  usl WHERE id_u = $id";
            $result = mysqli_query($link, $sql) or die(mysqli_error($link));
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    ?>
                    <div class="page-container">
                        <div class="content-wrap">  
                            <section>
                                <h1 class="color d-flex centr margin-top">Заявка на заказ доставки</h1>
                                <h1 class="color d-flex centr margin-top">Услуга: <?php echo $row['usl_name'];?></h1>
                                <form action="project/zaza.php?id=<?php echo $id;?>" method="POST" class="form1">
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Выберите дату</label>
                                        <input type="date" class="form-control" id="exampleInputPassword1" name="date" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputPassword1" class="form-label">Выберите время</label>
                                        <input type="time" class="form-control" id="exampleInputPassword1" name="time" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Укажите адрес погрузки</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="point1" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">Укажите адрес доставки</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="point2" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary knopka btnt" name="submit">Отправить заявку</button>
                                </form>
                            </section> 
                        </div>
                    <?php
            }
        }
        }else{
            echo "<script>alert(\"Вы не авторизованны! Войдите или зарегистрируйтесь"."\");</script>";
            echo "<script>window.location.href='index.php'</script>";
        }
// подвал
 include('footer.php');?>
            </div>