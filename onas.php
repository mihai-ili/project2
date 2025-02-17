<!-- шапка -->
<?php include('header.php');?>
<!-- тело страницы "о нас" -->
  <!-- секция с картой -->
    <div class="container centr">
      <div class="d-flex">
        <h2 class="color margin-top">Присутствие по всей России и ближнему зарубежью это - активное участие и взаимодействие с различными странами и регионами, которые находятся в непосредственной близости от Российской Федерации. </h2>
        <img src="img/russia.png" alt="">
      </div>
    </div>
  <!-- секция с текстом  -->
    <section class="fon main">
      <h1 class="color d-flex centr margin-top">О нас</h1>
      <p class="opis">В ЯсенПуть мы не просто перевозим грузы — мы строим долгосрочные партнерские отношения, основанные на доверии, прозрачности и взаимной выгоде. Наша миссия — предоставить клиентам полный комплекс логистических услуг, гарантируя оперативность, безопасность и индивидуальный подход. Мы стремимся быть не просто перевозчиком, а надежным партнером, который помогает вашему бизнесу расти и развиваться. <br><br>

        Что нас отличает:
        <br><br>
        Индивидуальный подход к каждому клиенту: Мы разрабатываем оптимальные логистические решения, учитывая специфику вашего бизнеса и особенности груза
        Прозрачность на каждом этапе: Вы всегда в курсе, где находится ваш груз, благодаря современной системе отслеживания.
        Ответственность и надежность: Мы берем на себя полную ответственность за сохранность груза и соблюдение сроков доставки.
        Мы ценим ваше время и ресурсы, поэтому стремимся к оптимизации каждого этапа транспортировки, чтобы вы могли сосредоточиться на развитии своего бизнеса. <br><br>ЯсенПуть — это больше, чем просто грузоперевозки, это уверенность в каждом километре пути.
      </p>
    </section>
  <!-- секция с анимацией -->
    <section class="sec">
      <h2 class="color d-flex centr margin-top main">Едет картинка, а могла ехать машина с вашим грузом</h2>
      <div class="road">
        <div class="car">
          <img src="img/truck-time.svg" alt="Машинка">
        </div>
      </div>
    </section>
  <!-- секция с формой для отзывов -->
    <section>
      <div class="container">
        <?php if(isset($_SESSION['id'])){?>
        <h1 class="color d-flex centr margin-top">Уже воспользовались нашими услугами?</h1>
        <form action="project/otzv.php" method="post" class="">
          <select class="form-select" aria-label="Пример выбора по умолчанию" name="usl">
            <?php

            $queryCategory = "SELECT * FROM `usl`";

            $result = mysqli_query($link, $queryCategory) or die(mysqli_error($link));
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {

                echo '<option value="' . $row['id_u'] . '">' . $row['usl_name'] . '</option>';
              }
            }

            ?>
          </select>
          <textarea  id="" class="form-control margin-top" name="text"></textarea>
          <button class="btn margin-top" type="submit">Отправить отзыв</button>
        </form>
        <?php }?>
      </div>

    </section>
<!-- подвал -->
<?php include('footer.php'); ?>