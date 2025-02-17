<!-- шапка -->
<?php include('header.php');?>
<!-- тело страницы контакты -->
    <div class="page-container">
        <div class="content-wrap"> 
            <section class="margin-top main">
                <h1 class="color d-flex centr margin-top">Контакты сервиса</h1>
                <div class="fon1 d-flex centr">
                    <h5 class="margin_r"><span class="green">Адрес: </span>г Воронеж, ул Хользунова, д 122, офис 6</h5>
                    <h5 class="margin_r"><span class="green">Телефон: </span>+7 (473) 205-00-00</h5>
                    <h5><span class="green">Резервный номер: </span>+7 (800) 333-67-47, доб. 4732</h5>
                </div>
                <div class="container">
                    <div class="row">
                        <?php
                        $sql = "SELECT * FROM contact"; 
                        $result = $link->query($sql);
                        while ($row = $result->fetch_assoc()): ?>
                            <div class="col-md-6 margin-top">
                                <div class="card">
                                    <div class="card-body">
                                        <h1 class="card-title"><?php echo $row['pole1'];?></h1>
                                        <h5><span class="green">Почта: </span><?php echo $row['pole2'];?></h5>
                                        <h5><span class="green">Телефон: </span><?php echo $row['pole3'];?></h5>
                                        <?php if(isset($_SESSION['prava'])){ //ЗАПРЕТ ДОСТУПА НЕАВТОРИЗОВАННОМУ ПОЛЬЗОВАТЕЛЮ;
                                                if($_SESSION['prava']=="admin"){ //ЗАПРЕТ ДОСТУПА USERУ;?>
                                            <div class="card-footer">    
                                            <h1 class="card-title">Редактирование данных</h1>
                                            <form action="project/red_contact.php?id=<?php echo $row['id_c'];?>" method="POST">
                                                <input type="text" class="form-control " name="pole1" value="<?php echo $row['pole1']; ?>" placeholder="Название">
                                                <input type="text" class="form-control margin-top" name="pole2" value="<?php echo $row['pole2']; ?>" placeholder="Почта">
                                                <input type="text" class="form-control margin-top" name="pole3" value="<?php echo $row['pole3']; ?>" placeholder="Телефон">
                                                <button class="btn margin-top" type="submit">Сохранить изменения</button>
                                            </form>
                                            </div>
                                        <?php } 
                                    }?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </section>
        </div>
<!-- подвал -->
<?php include('footer.php');?>
    </div>