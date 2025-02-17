<!-- шапка для include -->
<?php require_once('project/connect.php');
session_start();
 ?>
<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <title>ЯсенПуть</title>
</head>
<body class="">
    <header class="header main">
        <div class="container">
            <div class="header-inner">
<!-- логотип -->
                <a href="index.php" class="logo"><img src="img/logo.svg" alt=""></a>
<!-- ссылки -->
                <nav class="nav">
                    <ul class="nav-list">
                    <li class="nav-item">
                    <a class="nav-link active black" aria-current="page" href="index.php">Главная</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active black" href="onas.php">О нас</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active black" href="news.php">Новости</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link activ black" aria-disabled="true" href="gruzovik.php">Предоставить грузовик</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link activ black" aria-disabled="true" href="contact.php">Контакты</a>
                  </li>
                    </ul>
                </nav>
<!-- кнопки -->
                <div class="header-buttons">
                <?php
                if(isset($_SESSION['prava'])){
                 if ($_SESSION['prava'] == "user") {?>
                 <form class="d-flex" role="search" action="project/out.php">
                    <button class="btn btn-outline-success margin_r" type="submit">Выход</button>
                </form>
                <form class="d-flex" role="search" action="lk.php">
                  <button class="btn btn-outline-success margin_left" type="submit">Профиль</button>
                </form>
                <?php
              }elseif($_SESSION['prava']=="admin") {?>
              <form class="d-flex" role="search" action="project/out.php">
                    <button class="btn btn-outline-success margin_r" type="submit">Выход</button>
                </form>
                <form class="d-flex" role="search" action="admin.php">
                  <button class="btn btn-outline-success margin_left" type="submit">АДМИН</button>
                  </form>
                <?php }else{
                ?>
              <form class="d-flex" role="search" action="project/out.php">
                    <button class="btn btn-outline-success margin_r" type="submit">Выход</button>
                </form>
                <form class="d-flex" role="search" action="admin.php">
                  <button class="btn btn-outline-success margin_left" type="submit">Модератор</button>
                  </form>
                <?php
              }
              }else{   ?>
                  <!-- Кнопка-триггер модального окна апвторизации-->
                  <button type="button" class="btn btnt btn-outline-success margin_left margin_r " data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Вход
                  </button>
                  <!-- Модальное окно автоизации -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Авторизация</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                        </div>
                        <div class="modal-body">
                        <form action="project/loginpr.php" method="POST" >
                          <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Email</label>
                              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
                              <div id="emailHelp" class="form-text">Мы не сообщвем вашу почту стороним лицам.</div>
                          </div>
                          <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Пароль</label>
                              <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
                          </div>
                          <button type="submit" class="btn btn-primary knopka">Войти</button>
                        </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Кнопка-триггер модального окна регистрации-->
                  <button type="button" class="btn btnt btn-outline-success margin_left margin_r " data-bs-toggle="modal" data-bs-target="#exampleModal1">
                    Регистрация
                  </button>
                  <!-- Модальное окно аврегистрации -->
                  <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Регистрация</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
                        </div>
                        <div class="modal-body">
                        <form action="project/regpr.php" method="POST" >
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">ФИО</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="fio" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Телефон</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="phone" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" required>
                                <div id="emailHelp" class="form-text">Мы не сообщвем вашу почту стороним лицам.</div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Пароль</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary knopka" name="submit">Зарегистрироваться</button>
                            </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php 
                   } ?>
                    </div>
                  </div>
                </div>

                <div class="burger-menu">
                    <div class="burger-line"></div>
                    <div class="burger-line"></div>
                    <div class="burger-line"></div>
                        </div>
                    </div>
                </div>
    </header>
<!-- скрипты -->
    <script src="js/bootstrap.js"></script>
    <script src="js/bootstrap.bundle.js"></script>
    <script>
        const burgerMenu = document.querySelector('.burger-menu');
        const navList = document.querySelector('.nav-list');

        burgerMenu.addEventListener('click', () => {
            burgerMenu.classList.toggle('active');
            navList.classList.toggle('active');
        });
    </script>
