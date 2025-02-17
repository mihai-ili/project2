<!-- шапка -->
<?php include('header.php');?>
<!-- тело страницы "Новости"     -->
    <section class="margin-top main">
    <h1 class="color d-flex centr margin-top">Новости</h1>
    <!-- создание новости -->
      <?php
      if(isset($_SESSION['prava'])){ //ЗАПРЕТ ДОСТУПА НЕАВТОРИЗОВАННОМУ ПОЛЬЗОВАТЕЛЮ;
        if($_SESSION['prava']!="user"){ //ЗАПРЕТ ДОСТУПА USERУ;?>
          <h1 class="card-title">Создание новости</h1>
          <form action="project/new_news.php" method="POST" enctype="multipart/form-data">
          <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Название</label>
              <input type="text" class="form-control" id="exampleInputPassword1" name="zag" required>
          </div>
          <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Короткое описание</label>
              <textarea type="text" class="form-control" id="exampleInputPassword1" name="podzag" required></textarea>
          </div>
          <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Полная новость</label>
              <textarea type="text" class="form-control" id="exampleInputPassword1" name="opis" required></textarea>
          </div>
          <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Фото</label>
              <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="foto" required>
          </div>
          
          <button type="submit" class="btn btn-primary knopka" name="submit">Добавить новость</button>
      </form>
    <!-- запрос и вывод новостей -->
        <?php }}
      $sql = "SELECT * FROM news ORDER BY id_n DESC";
      $result = $link->query($sql);
      while ($row = $result->fetch_assoc()) {
      ?>
        <div class="card mb-3 margin-top" style="max-width: 1500px;">
            <div class="row g-0">
              <div class="col-md-4">
                <img src="<?php echo $row['foto']; ?>" class="img-fluid rounded-start" alt="" class="kartimg">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title black"><?php echo $row['zag']; ?></h5>
                  <p class="card-text black"><?php echo $row['opis']; ?></p>
                </div>
              </div>
            </div>
    <!-- редактирование новостей -->
        <?php
        if(isset($_SESSION['prava'])){ //ЗАПРЕТ ДОСТУПА НЕАВТОРИЗОВАННОМУ ПОЛЬЗОВАТЕЛЮ;
          if($_SESSION['prava']!="user"){ //ЗАПРЕТ ДОСТУПА USERУ; ?>
            <div class="card-footer">  
              <h1 class="card-title">Редактирование данных</h1>
              <form action="project/red_news.php?id=<?php echo $row['id_n']; ?>" method="POST">
                <input type="text" class="form-control" name="pole1" value="<?php echo $row['zag']; ?>" placeholder="Заголовок">
                <textarea type="text" class="form-control margin-top" name="pole2" value="" placeholder="ТЕКСТ НОВОСТИ"><?php echo $row['opis']; ?></textarea>
                <button class="btn btn-primary margin-top" type="submit">Сохранить изменения</button>
              </form>
            </div>  
          <?php }
        } ?>
      </div>
      <?php
      }
      ?>
      </section>
    
     
<!-- подвал -->
<?php include('footer.php');?>