<?php 
	session_start(); 
	include "conectionDB.php";
    ini_set('display_errors', 'Off'); 
?> 
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!--=============== FAVICON ===============-->
        <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">

        <!--=============== REMIX ICONS ===============-->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

        <!--=============== SWIPER CSS ===============-->
        <link rel="stylesheet" href="css/swiper-bundle.min.css">

        <!--=============== CSS ===============-->
        <link rel="stylesheet" href="css/styles.css">

        <title>EleCar</title>
    </head>
    <body>
        <!--==================== HEADER ====================-->
        <header class="header" id="header">
            <nav class="nav container">
                <a href="index.php" class="nav__logo">
                    <i class="ri-steering-line"></i>
                    EleCar
                </a>
                <div class="nav__menu" id="nav-menu">
                    <ul class="nav__list">
                      <li class="nav__item">
                          <a href="index.php" class="nav__link active-link">Главная страница</a>
                      </li>  
                      <li class="nav__item">
                        <a href="#about" class="nav__link">О нас</a>
                    </li>  
                    <li class="nav__item">
                        <a href="#popular" class="nav__link">Популярное</a>
                    </li>  
                    <li class="nav__item">
                        <a href="#featured" class="nav__link">Марки</a>
                    </li> 
                    <li class="nav__item">
                        <a href="https://goo.gl/maps/b2QZUzLWEzvPvvdX6" class="nav__link"><i class="ri-map-pin-line"></i>Наши салоны</a>
                    </li> 
                    <li class="nav__item">
                        <a href="logout.php" class="nav__link"><i class="ri-user-line"></i>Выйти</a>
                    </li>   
                    </ul>
                    <div class="nav__close" id="nav-close">
                        <i class="ri-close-line"></i>
                    </div>
                </div>
                <div class="nav__toggle" id="nav-toggle">
                    <i class="ri-menu-fill"></i>
                </div>
            </nav>
        </header>

        <!--==================== MAIN ====================-->
        <main class="main">
            <!--==================== HOME ====================-->
            <section class="admin section" id="admin">
                <div class="search_admin">
                    <h2>Найти пользователя</h2>
                    <form action="" method="POST">
                        <div class="admin__input">
                            <label>
                                <b>Введите имя</b>
                            </label>
                            <input type="text" name="name" value="">
                           
                        </div>
                        <div class="admin__input">
                            <label>
                                <b>Введите фамилия</b>
                            </label>
                            <input type="text" name="surname" value="">
                        
                        </div>
                        <div class="admin__input">
                            <label>
                                <b>Введите отчество</b>
                            </label>
                            <input type="text" name="patronymic" value="">
                            
                        </div>
                        <input type="submit"  class="button_admin button" value="Найти" >
                        <?php
                            if($_POST['name'] && $_POST['surname'] && $_POST['patronymic'] ){
                              $surname=$_POST['surname'];
                              $name=$_POST['name'];
                              $patronymic=$_POST['patronymic'];
                            }
                        ?>
                    </form>
                </div>
                <div class="wanted_admin">
                    <form action="" method="POST">
                    <table> 
                        <?php   $query = "SELECT * FROM users JOIN cars ON users.Car_id=cars.id  AND users.Name=\"$name\" AND users.Surname=\"$surname\" AND users.patronymic=\"$patronymic\"";?>
                        <tr>
                            <td>Имя</td>
                            <td>Фамилия</td>
                            <td>Отчество</td>
                            <td>Марка</td>
                            <td>Модель</td>
                            <td>Дата покупки</td>
                            <td>VIN</td>
                            <td>Дата последнего ТО</td>
                            <td>Дата следующего ТО</td>
                        </tr>
                        <?php
                        $result = mysqli_query($link, $query) or die(mysqli_error($link));
                        for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
                            foreach ($data as $elem):?> 	 
                        <tr>
                            <td><input type="text" name="<?=$elem['Name'] ?>" value="<?=$elem['Name'] ?>"></td>
                            <td><input type="text" name="<?=$elem['Surname'] ?>" value="<?=$elem['Surname'] ?>"></td>
                            <td><input type="text" name="<?=$elem['patronymic'] ?>" value="<?=$elem['patronymic'] ?>"></td>
                            <td><input type="text" name="<?=$elem['Mark'] ?>" value="<?=$elem['Mark'] ?>"></td>
                            <td><input type="text" name="<?=$elem['Model'] ?>" value="<?=$elem['Model'] ?>"></td>
                            <td><input type="text" name="<?=$elem['DateSale'] ?>" value="<?=$elem['DateSale'] ?>"></td>
                            <td><input type="text" name="<?=$elem['VIN'] ?>" value="<?=$elem['VIN'] ?>"></td>
                            <td><input type="text" name="<?=$elem['DateLastTO'] ?>" value="<?=$elem['DateLastTO'] ?>"></td>
                            <td><input type="text" name="<?=$elem['DateNextTO'] ?>" value="<?=$elem['DateNextTO'] ?>"></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                        <input type="submit"  class="button_wanted button" value="Изменить" >
                    </form>
                </div>
            </section>
        </main>


        <!--==================== FOOTER ====================-->
        <footer class="footer section">
            <div class="shape shape__big"></div>
            <div class="shape shape__small"></div>
            <div class="footer__container container grid">
                <div class="footer__content">
                    <a href="" class="footer__logo">
                        <i class="ri-steering-fill"></i>EleCar
                    </a>
                    <p class="footer__description">
                        Мы предлагаем лучшие электромобили из <br> 
                        самых узнаваемых брендов в <br> 
                        мире
                    </p>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Компания</h3>
                    <ul class="footer__links">
                        <li>
                            <a href="" class="footer__link">О нас</a>
                        </li>
                        <li>
                            <a href="" class="footer__link">Машины</a>
                        </li>
                        <li>
                            <a href="" class="footer__link">История</a>
                        </li>
                        <li>
                            <a href="" class="footer__link">Магазин</a>
                        </li>
                    </ul>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Информация</h3>
                    <ul class="footer__links">
                        <li>
                            <a href="" class="footer__link">Запросите ценовое предложение</a>
                        </li>
                        <li>
                            <a href="" class="footer__link">Найдите дилера</a>
                        </li>
                        <li>
                            <a href="" class="footer__link">Связаться с нами</a>
                        </li>
                        <li>
                            <a href="" class="footer__link">Услуги</a>
                        </li>
                    </ul>
                </div>

                <div class="footer__content">
                    <h3 class="footer__title">Наши социальные сети</h3>
                        <ul class="footer__social">
                            <a href="https://www.facebook.com/" target="_blank" class="footer__social-link">
                                <i class="ri-facebook-fill"></i>
                            </a>
                            <a href="https://www.instagram.com/" target="_blank" class="footer__social-link">
                                <i class="ri-instagram-line"></i>
                            </a>
                            <a href="https://twitter.com/" target="_blank" class="footer__social-link">
                                <i class="ri-twitter-line"></i>
                            </a>
                        </ul>
                </div>
            </div>
            <span class="footer__copy">
                &#169; Barantsev. All rigths reserved
            </span>
        </footer>


        <!--========== SCROLL UP ==========-->
        <a href="" class="scrollup" id="scroll-up">
            <i class="ri-arrow-up-line"></i>
        </a>

        <!--=============== SCROLL REVEAL ===============-->
        <script src="js/scrollreveal.min.js"></script>

        <!--=============== SWIPER JS ===============-->
        <script src="js/swiper-bundle.min.js"></script>

        <!--=============== MIXITUP JS ===============-->
        <script src="js/mixitup.min.js"></script>

        <!--=============== MAIN JS ===============-->
        <script src="js/main.js"></script>
    </body>
</html>