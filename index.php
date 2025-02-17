<!-- шапка -->
<?php include('header.php');?>
<!-- тело страницы "Главная" -->
<main>
  <!-- секция со слайдером -->
    <section class="main">
      <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/main.jpg" class="d-block w-100 imgs" alt="..." >
            <div class="carousel-caption d-none d-md-block">
              <h5>"Ваш груз — наш приоритет!"</h5>
              <p>компания ставит интересы клиентов на первое место, обеспечивая надежную и безопасную транспортировку грузов.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="img/main2.jpg" class="d-block w-100 imgs" alt="..." >
            <div class="carousel-caption d-none d-md-block">
              <h5>"Доставка без границ, надежность без компромиссов!"</h5>
              <p>широкий спектр услуг и географии доставок, а также  высокие стандарты надежности и качества обслуживания.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="img/original.jpg" class="d-block w-100 imgs" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>"С Ясенпуть — Ваш груз в надежных руках!"</h5>
              <p>груз будет в безопасности и доставлен в срок, благодаря профессионализму и опыту команды компании.</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Предыдущий</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Следующий</span>
        </button>
      </div>
    </section>
  <!-- секция с последней новостью  -->
    <section class="margin-top main">
      <h1 class="color d-flex centr margin-top">Новости</h1>
      <?php $sql = "SELECT * FROM news
      ORDER BY id_n DESC
      LIMIT 1"; 
      $result = $link->query($sql);
      while ($row = $result->fetch_assoc()): ?>
        <a href="news.php">
          <div class="card mb-3" style="max-width: 1500px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="<?php echo $row['foto'];?>" class="img-fluid rounded-start" alt="...">
              </div>
              <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title black"><?php echo $row['zag'];?></h5>
                <p class="card-text black"><?php echo $row['podzag'];?></p>
                <form class="d-flex margin-top" role="search" action="news.php">
                  <button class="btn btn-outline-success margin_r" type="submit">Подробнее</button>
                </form>
                  </div>
                </div>
              </div>
            </div>
        </a>
      <?php endwhile; ?>  
    </section>
  <!-- секция с анимацией -->
    <section class="sec">
      <h1 class="color d-flex centr margin-top main">Доставка вашего груза - наша главная цель</h1>
      <div class="road">
        <div class="car">
          <img src="img/truck-time.svg" alt="Машинка">
        </div>
      </div>
    </section>
  <!-- секция с услугами -->
    <section class="main">
      <h1 class="color d-flex centr margin-top main">Услуги</h1>
      <?php
      if(isset($_SESSION['prava'])){ //ЗАПРЕТ ДОСТУПА НЕАВТОРИЗОВАННОМУ ПОЛЬЗОВАТЕЛЮ;
        if($_SESSION['prava']!="user"){ //ЗАПРЕТ ДОСТУПА USERУ;?>
          <h1 class="card-title">Создание услуги</h1>
          <form action="project/new_usl.php" method="POST" enctype="multipart/form-data">
          <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Название</label>
              <input type="text" class="form-control" id="exampleInputPassword1" name="zag" required>
          </div>
          <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Описание</label>
              <textarea type="text" class="form-control" id="exampleInputPassword1" name="opis" required></textarea>
          </div>
          <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Цена</label>
              <input type="text" class="form-control" id="exampleInputPassword1" name="cena" required>
          </div>
          <button type="submit" class="btn btn-primary knopka" name="submit">Добавить услугу</button>
      </form>
        <?php }
          } ?>
      <div class="container">
        <div class="row">
            <?php
            $sql = "SELECT * FROM usl"; 
            $result = $link->query($sql);
            while ($row = $result->fetch_assoc()): 
              ?>
                <div class="col-md-6 margin-top">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['usl_name'];?></h5>
                            <p class="card-text"><?php echo $row['opis'];?></p>
                            <h1><?php echo $row['cena'];?>₽</h1>
                            <form class="d-flex" role="search" method="post" action="zakaz.php?id=<?php echo $row['id_u'];?>">
                                <button class="btn btn-outline-success margin_r" type="submit">Заказать</button>
                            </form>
                            <?php
                              if(isset($_SESSION['prava'])){ //ЗАПРЕТ ДОСТУПА НЕАВТОРИЗОВАННОМУ ПОЛЬЗОВАТЕЛЮ;
                                if($_SESSION['prava']!="user"){ //ЗАПРЕТ ДОСТУПА USERУ; ?>
                                  <div class="card-footer margin-top">  
                                    <h1 class="card-title">Редактирование данных</h1>
                                    <form action="project/red_usl.php?id=<?php echo $row['id_u']; ?>" method="POST">
                                      <input type="text" class="form-control" name="pole1" value="<?php echo $row['usl_name']; ?>" placeholder="Заголовок">
                                      <textarea type="text" class="form-control margin-top" name="pole2" value="" placeholder="Описание"><?php echo $row['opis']; ?></textarea>
                                      <input type="text" class="form-control margin-top" name="pole3" value="<?php echo $row['cena']; ?>" placeholder="Цена">
                                      <button class="btn btn-primary margin-top centr" type="submit">Сохранить изменения</button>
                                    </form>
                                  </div>  
                                <?php }
                              } ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
      </div>
    </section>
  <!-- Секция с описаниями  -->
    <section class="sec2">
      <h1 class="color d-flex centr margin-top main ">Мы готовы предоставить</h1>
      <div class="d-flex centr margin-top otstup">
        <div class="ta-centr">
          <img src="img/truck-time.svg" alt="" class="size">
          <h5 class="color d-flex margin-top ">Самую <br> быструю доставку</h5>
        </div>
        <div class="ta-centr">
          <img src="img/document-text.svg" alt="" class="size">
          <h5 class="color d-flex margin-top ">Оформление всех <br>сопроводительных документов</h5>
        </div>
        <div class="ta-centr">
          <img src="img/arrow-square.svg" alt="" class="size">
          <h5 class="color d-flex margin-top ">Возможность <br> построить маршрут</h5>
        </div>
      </div>
    </section>
  <!-- секция с отзывами -->
    <section class="margin-top">
      <h1 class="color d-flex centr margin-top main">Отзывы</h1>  
      <div class="container">
        <div class="row try">
          <?php
            $sql = "SELECT * FROM otzv
            INNER JOIN users ON otzv.id_user=users.id
            INNER JOIN usl ON usl.id_u=otzv.usl
            ORDER BY otzv.id_o DESC
            LIMIT 3"; 
            $result = $link->query($sql);
            while ($row = $result->fetch_assoc()): ?>
              <div class="card dr" style="width: 25rem;">
                <div class="card-body">
                  <h5 class="card-title"></h5>
                  <h6 class="card-subtitle mb-2 text-body-secondary"><?php echo $row['fio'];?></h6>
                  <p class="card-text">Оказанная услуга: <?php echo $row['usl_name'];?></p>
                  <p>Отзыв: <?php echo $row['text'];?></p>
                </div>
              </div>
            <?php endwhile; ?>
        </div>
      </div>
     </section>
</main>
<!-- подвал -->
<?php include('footer.php');?>