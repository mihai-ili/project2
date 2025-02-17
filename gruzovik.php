<!-- шапка -->
<?php include('header.php'); 
// тело страницы "Предоставить грузовик
    if(isset($_SESSION['id'])){?>
    <div class="page-container">
        <div class="content-wrap">  
            <section >
                <h1 class="color d-flex centr margin-top">Заявка на предоставление грузовика</h1>
                <p class="color ta-centr">Если у вас есть грузовик, то вы можете в удобное для вас время предоставить его для перевозки на то расстояние на которое готовы</p>
                <form action="project/grzv.php" method="POST" class="form1">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Укажите марку вашего грузовика</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="car" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Укажите его грузоподъемность(в тоннах)</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" name="massa" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Выберите дату</label>
                        <input type="date" class="form-control" id="exampleInputPassword1" name="date" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Выберите время</label>
                        <input type="time" class="form-control" id="exampleInputPassword1" name="time" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Укажите максимальное расстояние доставки в км</label>
                        <input type="maxrast" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="km" required>
                    </div>
                    <button type="submit" class="btn btn-primary knopka btnt" name="submit">Отправить заявку</button>
                </form>
            </section> 
        </div>
    <?php 
    }else{
        echo "<script>alert(\"Вы не авторизованны! Войдите или зарегистрируйтесь"."\");</script>";
        echo "<script>window.location.href='index.php'</script>";
    }
// подвал
include('footer.php');?>
    </div>  
