<?php
	session_start(); 
	include "conectionDB.php";
?>
<?php
    $message=" ";
	if (!empty($_POST['password']) and !empty($_POST['login'])) 
	{
		$login = $_POST['login'];
		
		$query = "SELECT * FROM users WHERE login='$login'";	 
		$result = mysqli_query($link, $query);
		$user = mysqli_fetch_assoc($result);
		
		if (!empty($user)) 
		{
			$_SESSION['flash'] = 'Прошел автоизацию';
			$_SESSION['login'] = $login;
			$_SESSION['auth'] = true;
			$_SESSION['id'] = $user['id'];
			$hash = $user['password'];
					if (password_verify($_POST['password'], $hash))
					 		{
								 header('Location: user_panel.php');
							}
					else 
							{
								$message="Пароль не правильный.";

								
    								
							 }
			
		} 
		 else 
		{
			$message="Логина не существует.";
		
			
			$_SESSION['auth'] = null;
		}
	}else{
		
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
                        <a href="index.html/#about" class="nav__link">О нас</a>
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
                        <a href="user.php" class="nav__link"><i class="ri-user-line"></i>Мой EleCar</a>
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
            <div class="user__login">
                <div class="shape shape__big"></div>
                <div class="shape shape__small"></div>
                <div class="user__login-from container">
            
                    <div class="login">
                        <span class="error"><?php echo $message; ?></span>
                        <h2>Продолжайте вместе с нами</h2>
                        <form action="" method="POST">
                            <div class="login__input">
                                <label>
                                    <b>Введите логин</b>
                                </label>
                                <input type="text" name="login">
                            </div>
            
                            <div class="login__input">
                                <label>
                                    <b>Введите пароль</b>
                                </label>
                                <input type="password" name="password">
                            </div>
                            <p>Нет учетной запси, <a href="registration.php">зарегестрируйтесь.</a></p>
                            <button class="login_button button">Войти</button>
                        </form>
            
                    </div>
            
                </div>
            </div>
        </main>
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