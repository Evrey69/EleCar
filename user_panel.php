<?php 
	session_start();
	include "conectionDB.php";
	$query = "SELECT * FROM users WHERE id='$_SESSION[id]'";
	$result = mysqli_query($link, $query) or die(mysqli_error($link));
	$user = mysqli_fetch_assoc($result);
	$_SESSION['status']=$user['status'];
	$prof_id=$_SESSION['id'];
	

 ?>
 <?php 
	if ($user['status']=='admin'){	
		header('Location: admin.php');

	}

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
            <?php
                  $query = "SELECT * FROM users JOIN cars ON users.Car_id=cars.id WHERE users.id=$prof_id;";
                            $result = mysqli_query($link, $query) or die(mysqli_error($link));
                            for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
                            foreach ($data as $elem):
                            if (!empty($elem['Car_id'])) {?>
            <section class="home section" id="home">
                <div class="shape shape__big">

                </div>
                <div class="shape shape__small">
                    
                </div>
                <div class="home__container container grid">
                   <div class="home__data">
                       <h1 class="home__title">
                        Ваш
                       </h1>
                       <h2 class="home__subtitle">
                       <?=$elem['Mark']?> <?=$elem['Model'] ?>
                       </h2>
                       <h3 class="home__elec">
                        <i class="ri-flashlight-fill"></i> Электрическая машина
                       </h3>
                   </div> 
                   <img src="<?=$elem['IMG']?>" alt="" class="home__img">
                   <div class="home__car">
                    <div class="home__car-data">
                     <div class="home__car-icon">
                          <i class="ri-dashboard-3-line"></i>
                     </div>
                     <h2 class="home__car-number">
                     <?=$elem['Mileage']?>км
                     </h2>
                     <h3 class="home__car-name">
                         Пробег
                     </h3>
                 </div>

                 <div class="home__car-data">
                     <div class="home__car-icon">
                         <i class="ri-flashlight-fill"></i>
                     </div>
                     <h2 class="home__car-number">
                     <?=$elem['Battery']?>%
                     </h2>
                     <h3 class="home__car-name">
                         Состояние баттареи
                     </h3>
                 </div>
                </div>
                   <div class="home__car-info"> 
                           <h3>Дата покупки: <span><?=$elem['DateSale']?></span> </h3>
                           <h3>VIN номер: <span><?=$elem['VIN']?></span> </h3>
                           <h3>Дата последнего ТО: <span><?=$elem['DateLastTO']?></span> </h3>
                           <h3>Дата следующего ТО: <span><?=$elem['DateNextTO']?></span> </h3>
                   </div>
                </div>
            </section>
            <?php
                     }else{
                        header('Location: index.php');
                    }
             endforeach; ?>
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