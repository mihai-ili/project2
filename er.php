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
<body class="main">
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
              <a class="navbar-brand black logo" href="index.php"><img src="img/logo.svg" alt="" class="logo"></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
                <?php
                if(isset($_SESSION['prava'])){
                 if ($_SESSION['prava'] == "user") {?>
                 <form class="d-flex" role="search" action="project/out.php">
                    <button class="btn btn-outline-success margin_r" type="submit">Выход</button>
                </form>
                <form class="d-flex" role="search" action="lk.php">
                  <button class="btn btn-outline-success margin_left" type="submit">Личный кабинет</button>
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
                  <button type="button" class="btn btnt btn-outline-success margin_left margin_r" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
                              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                              <div id="emailHelp" class="form-text">Мы не сообщвем вашу почту стороним лицам.</div>
                          </div>
                          <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Пароль</label>
                              <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                          </div>
                          <button type="submit" class="btn btn-primary knopka">Войти</button>
                        </form>
                        </div>
                      </div>
                    </div>
                  </div>
                                  <!-- Кнопка-триггер модального окна регистрации-->
                  <button type="button" class="btn btnt btn-outline-success margin_left margin_r" data-bs-toggle="modal" data-bs-target="#exampleModal1">
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
          </nav>
    </header>
    <hr>
   
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap.bundle.js"></script>