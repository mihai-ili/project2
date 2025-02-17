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
<!--header-->
<header class="header">
    <div class="container">
        <div class="header__inner d-flex align-items-center "> <!-- Добавлены d-flex, align-items-center, justify-content-between -->
            <div class="header__logo" data-href='intro'>
                <a class="navbar-brand black logo" href="index.php"><img src="" alt="" class="logo"></a>
            </div>

            <nav class="nav">
                <ul class="nav d-flex">  <!-- Добавлен класс d-flex для списка -->
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
                    <li class="nav-item">
                        <a class="btn btn-outline-success margin_r" aria-disabled="true" href="project/out.php">Выход</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link activ black" aria-disabled="true" href="contact.php">Контакты</a>
                    </li>
                </ul>
            </nav>

            <div class="d-flex">
                <?php
                session_start(); // Добавлено чтобы видеть переменную сессии
                if (isset($_SESSION['prava'])) {
                    if ($_SESSION['prava'] == "user") { ?>
                        <form class="d-flex" role="search" action="project/out.php">
                            <button class="btn btn-outline-success margin_r" type="submit">Выход</button>
                        </form>
                        <form class="d-flex" role="search" action="lk.php">
                            <button class="btn btn-outline-success margin_left" type="submit">Личный кабинет</button>
                        </form>
                    <?php }
                     } else { ?>
                       <form class="d-flex" role="search" action="login.php">
                          <button class="btn btn-outline-success margin_r" type="submit">Вход</button>
                        </form>
                        <form class="d-flex" role="search" action="reg.php">
                          <button class="btn btn-outline-success margin_left" type="submit">Регистрация</button>
                          <?php }
                  ?>
            </div>
        </div>
    </div>
</header>
<script>
const burgerBtn = document.getElementById('burger')
const menu = document.getElementById('menu')
// const nav = document.querySelector('.nav')
const burgerNav = document.querySelector('.burger__menu')
const header = document.querySelector('.header')
const introInner = document.querySelector('.intro__inner') 
// DOM

burgerBtn.addEventListener('click', function() {
   this.classList.toggle('active')
})

header.addEventListener('click',  event => {
    event.preventDefault()
    if(event.target.dataset.href){
        const href = event.target.dataset.href
        
        

        document.querySelector(`[data-section = '${href}']`).scrollIntoView({behavior: "smooth"})
       
    }
})

burgerNav.addEventListener('click', event => {
    event.preventDefault()
    if(event.target.dataset.href){
        const href = event.target.dataset.href
        document.querySelector(`[data-section = '${href}']`).scrollIntoView({behavior: "smooth"})
        burgerBtn.classList.remove('active')
    }
})
</script>