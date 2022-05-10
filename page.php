<?php
	session_start(); 
	include "conectionDB.php";
    $query = "SELECT * FROM products WHERE id='$_GET[id]'";
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
                        <a href="#featured" class="nav__link">Рекомендуемые</a>
                    </li> 
                    <li class="nav__item">
                        <a href="https://goo.gl/maps/b2QZUzLWEzvPvvdX6" class="nav__link"><i class="ri-map-pin-line"></i>Наши салоны</a>
                    </li> 
                    <li class="nav__item">
                        <a href="user.html" class="nav__link"><i class="ri-user-line"></i>Мой EleCar</a>
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
                         <?php
                            $result = mysqli_query($link, $query) or die(mysqli_error($link));
                            for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
                            foreach ($data as $elem):
                            ?> 
           <section class="sell section">
            <h2 class="sell__title">
            <?=$elem['Mark']?> <?=$elem['Model'] ?>
            </h2>
            <p class="sell__subtitle">
                <i class="ri-flashlight-fill"></i> Электрическая машина
                <i class="ri-dashboard-3-line"></i> <?=$elem['overclocking'] ?>Сек 
                <i class="ri-funds-box-line"></i> <?=$elem['speed'] ?> Km/h 
            </p>
            <div class="sell__img container swiper">
                <div class="swiper-wrapper">
                    <article class="sell__img-сard swiper-slide">
                        <img src="<?=$elem['img'] ?>" alt="">
                    </article>
                    <article class="sell__img-сard swiper-slide">
                        <img src="<?=$elem['img'] ?>" alt="">
                    </article>
                    <article class="sell__img-сard swiper-slide">
                        <img src="<?=$elem['img'] ?>" alt="">
                    </article>
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <div class="sell__color container">
                <h4 class="sell__color-title">
                    Выберите свой цвет 
                </h4>
                <div class="sell__color-card">
                    <div class="sell__color-white">
                    
                    </div>
                    <div class="sell__color-gray">
                        
                    </div>
                    <div class="sell__color-red">
                        
                    </div>
                </div>
                
            </div>
            <div class="sell__description container">
                <div class="sell__description-card-1">
                    <p class="sell__description-text">
                        Это ещё один шаг в скрещивании технологий и внешней простоты после Porsche 911 восьмого поколения. При этом дизайнеры черпали вдохновение в первом Porsche 911 1963 года: посмотрите на лаконичную переднюю панель, протянувшуюся прямыми линиями от борта до борта, приглядитесь к вытянутой овальной приборке с округлыми краями. Она намеренно сделана шире руля, что соответствует стилю первого 911-го.
                    </p>
                    <img src="img/taycan/taycan-salon.png" alt="">
                </div>
                <div class="sell__description-card-2">
                    <img src="img/taycan/taycan-card-2.png" alt="">
                    <p class="sell__description-text">
                        новые возможности для тонкого управления тягой. Электромоторы отзывчивы и не инертны, поэтому распределение момента по осям на Тайкане можно менять в 5 раз быстрее, чем в классических автомобилях и даже обеспечивать разнотяг ― сочетание тормозного и тягового моментов на переднем и заднем двигателях. Противобуксовочная система работает на порядок быстрее.
                    </p>
                    
                </div>
                <div class="sell__description-card-1">
                    <p class="sell__description-text">
                        Это ещё один шаг в скрещивании технологий и внешней простоты после Porsche 911 восьмого поколения. При этом дизайнеры черпали вдохновение в первом Porsche 911 1963 года: посмотрите на лаконичную переднюю панель, протянувшуюся прямыми линиями от борта до борта, приглядитесь к вытянутой овальной приборке с округлыми краями. Она намеренно сделана шире руля, что соответствует стилю первого 911-го.
                    </p>
                    <img src="img/taycan/taycan-salon.png" alt="">
                </div>
                <div class="sell__description-card-2"> 
                    <img src="img/taycan/taycan-salon.png" alt="">
                    <p class="sell__description-text">
                        Это ещё один шаг в скрещивании технологий и внешней простоты после Porsche 911 восьмого поколения. При этом дизайнеры черпали вдохновение в первом Porsche 911 1963 года: посмотрите на лаконичную переднюю панель, протянувшуюся прямыми линиями от борта до борта, приглядитесь к вытянутой овальной приборке с округлыми краями. Она намеренно сделана шире руля, что соответствует стилю первого 911-го.
                    </p>
                   
                </div>
            </div>
             <div class="sell__button">
                 <button class="button">Купить</button>
             </div>
           </section>
           <?php endforeach; ?>
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