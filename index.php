<?php
	session_start(); 
	include "conectionDB.php";
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
                          <a href="#home" class="nav__link active-link">Главная страница</a>
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
                    <?php if (!empty($_SESSION['auth'])){ ?>
                        <a href="user_panel.php?id=<?=$_SESSION['id']; ?>" class="nav__link"><i class="ri-user-line"></i>Мой EleCar</a>
                        <a href="logout.php" class="nav__link"><i class="ri-close-fill"></i>Выйти</a>
                        <?php }else{ ?>
                            <a href="user.php" class="nav__link"><i class="ri-user-line"></i>Мой EleCar</a>
                        <?php } ?>
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
            <section class="home section" id="home">
                <div class="shape shape__big">

                </div>
                <div class="shape shape__small">
                    
                </div>
                <div class="home__container container grid">
                   <div class="home__data">
                       <h1 class="home__title">
                        Выбери свою машину
                       </h1>
                       <h2 class="home__subtitle">
                        Porsche Mission E
                       </h2>
                       <h3 class="home__elec">
                        <i class="ri-flashlight-fill"></i> Электрическая машина
                       </h3>
                   </div> 
                   <img src="img/home.png" alt="" class="home__img">
                   <div class="home__car">
                       <div class="home__car-data">
                           <div class="home__car-icon">
                                <i class="ri-temp-cold-line"></i>
                           </div>
                           <h2 class="home__car-number">
                            24°
                           </h2>
                           <h3 class="home__car-name">
                            Температура
                           </h3>
                       </div>

                       <div class="home__car-data">
                        <div class="home__car-icon">
                             <i class="ri-dashboard-3-line"></i>
                        </div>
                        <h2 class="home__car-number">
                            1500
                        </h2>
                        <h3 class="home__car-name">
                            Километраж
                        </h3>
                    </div>

                    <div class="home__car-data">
                        <div class="home__car-icon">
                            <i class="ri-flashlight-fill"></i>
                        </div>
                        <h2 class="home__car-number">
                            94%
                        </h2>
                        <h3 class="home__car-name">
                            Баттарея
                        </h3>
                    </div>
                   </div>
                   <a href="" class="home__button">Start</a>
                </div>
            </section>

            <!--==================== ABOUT ====================-->
            <section class="about section" id="about">
                <div class="about__container container grid">
                    <div class="about__group">
                        <img src="img/about.png" alt="" class="about__img">

                        <div class="about__card">
                            <h3 class="about__card-title">100.000+</h3>
                            <p class="about__card-description">
                                Довольных клиентов
                            </p>

                        </div>
                    </div>
                    <div class="about__data">
                        <h2 class="section__title about__title">
                            Машины С <br> Технологиями будущего
                        </h2>
                        <p class="about__description">
                            Смотрите в будущее с помощью высокопроизводительных электромобилей
                            известных брендов. Они отличаются футуристическими сборками и дизайном с
                            новыми и инновационными платформами, которые прослужат долго.
                        </p>

                        <a href="" class="button">Узнать больше</a>
                    </div>
                </div>
                
            </section>

            <!--==================== POPULAR ====================-->
            <section class="popular section" id="popular">
                <h2 class="section__title">
                    Выберите Свой Электромобиль <br> Марки Porsche
                </h2>
                <div class="popular__container container swiper">
                <?php  $query = "SELECT * FROM products";?>
                    <div class="swiper-wrapper">
                            <?php
                            $result = mysqli_query($link, $query) or die(mysqli_error($link));
                            for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
                            foreach ($data as $elem):
                            ?> 
                    <article class="popular__card swiper-slide">
                        <div class="shape shape__smaller">
                        
                        </div>
                        <h1 class="popular__title">
                            <?=$elem['Mark'] ?>
                        </h1>
                        <h3 class="popular__subtitle">
                                <?=$elem['Model'] ?>
                        </h3>
                        <img src="<?=$elem['img'] ?>" alt="" class="popular__img">
                        <div class="popular__data">
                            <div class="popular__data-group">
                                <i class="ri-dashboard-3-line"></i> <?=$elem['overclocking'] ?>Сек
                            </div>
                            <div class="popular__data-group">
                                <i class="ri-funds-box-line"></i> <?=$elem['speed'] ?> Km/h
                            </div>
                            <div class="popular__data-group">
                                <i class="ri-charging-pile-2-line"></i> <?=$elem['Type'] ?>
                            </div>
                        </div>
                        <h3 class="popular__price">
                            $<?=$elem['Price'] ?>
                        </h3>
                        <button class="button popular__button">
                            <a href="page.php?id=<?=$elem['id']?>"><i class="ri-shopping-bag-2-line"></i></a>
                        </button>
                    </article>
                    <?php endforeach; ?>
                    </div> 
                    
                    <div class="swiper-pagination"></div>
                </div>
            </section>
            <!--==================== FEATURED ====================-->
            <section class="featured section" id="featured">
                <h2 class="section__title">
                    Мы предлагаем Роскошные Автомобили
                </h2>

                <div class="featured__container container">
                    <ul class="featured__filters">
                        <li>
                            <button class="featured__item active-featured" data-filter="all">
                                <span>ALL</span>
                            </button>
                        </li>
                        <li>
                            <button class="featured__item" data-filter=".tesla">
                                <img src="img/logo3.png" alt="">
                            </button>
                        </li>
                        <li>
                            <button class="featured__item" data-filter=".audi">
                                <img src="img/logo2.png" alt="">
                            </button>
                        </li>
                        <li>
                            <button class="featured__item" data-filter=".porsche">
                                <img src="img/logo1.png" alt="">
                            </button>
                        </li>
                    </ul>
                    <?php  $query = "SELECT * FROM products";?>
                    <div class="featured__content grid">
                            <?php
                            $result = mysqli_query($link, $query) or die(mysqli_error($link));
                            for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
                            foreach ($data as $elem):
                            ?> 
                        <article class="featured__card mix <?= strtolower($elem['Mark']) ?>">
                            <div class="shape shape__smaller"></div>

                            <h1 class="featured__title"><?=$elem['Mark'] ?></h1>
                            <h3 class="featured__subtitle"><?=$elem['Model'] ?></h3>
                            <img src="<?=$elem['img'] ?>" alt="" class="featured__img">

                            <h3 class="featured__price">$<?=$elem['Price'] ?></h3>
                            <button class="button featured__button">
                                <a href="page.php?id=<?=$elem['id']?>"><i class="ri-shopping-bag-2-line"></i></a>
                            </button>
                        </article>
                        <?php endforeach; ?>

                    </div>
                </div>
                
            </section>

            <!--==================== OFFER ====================-->
            <section class="offer section">
                <div class="offer__container container grid">
                    <img src="img/offer-bg.png" alt="" class="offer__bg">
                    <div class="offer__data">
                        <h2 class="section__tittle offer__title">
                            Вы Хотите Получать <br> Специальные предложения?
                        </h2>
                        <p class="offer__description">
                            Будьте первыми, кто получит всю информацию о нашем 
                            товары и новые автомобили по электронной почте, подписавшись на наш 
                            список рассылки.
                        </p>
                        <a href="" class="button button__offer">Подпишитесь Сейчас</a>
                    </div>

                    <img src="img/offer.png" alt="" class="offer__img">
                </div>
                
            </section>

            <!--==================== LOGOS ====================-->
            <section class="logos section">
                <div class="logos__container container grid">
                    <div class="logos__content">
                        <img src="img/logo1.png" alt="" class="logos__img">
                    </div>
                    <div class="logos__content">
                        <img src="img/logo2.png" alt="" class="logos__img">
                    </div>
                    <div class="logos__content">
                        <img src="img/logo3.png" alt="" class="logos__img">
                    </div>
                    <div class="logos__content">
                        <img src="img/logo5.png" alt="" class="logos__img">
                    </div>

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