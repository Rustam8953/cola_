<?php

include_once "./config/db.php";
include_once "./objects/product.php";

$database = new Database();
$db = $database->getConnection();
$val = 0;

$product = new Product($db);
$stmt = $product->readAll($val, 12);
$num = $stmt->rowCount();

$page_title="Вкусно!";
require_once './component/header.php'; 
?>
    <link rel="stylesheet" href="../assets/libs/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="./assets/style/banner.css">
    <link rel="stylesheet" href="./assets/style/ymaps.css">
    <main class="main">
        <div class="main-wrap">
            <section class="banner">
                <div class="banner-box">
                    <div class="banner-content">

                    </div>
                </div>
            </section>
            <section class="col-3">
                <div class="col-3-box box">
                    <div class="col-3-content">
                        <h3 class="section-title">О компании</h3>
                        <div class="col-3-wrap">
                            <div class="col-3-l">
                                <div class="col-3-img">
                                    <img src="" alt="">
                                </div>
                            </div>
                            <div class="col-3-r">
                                <p>Производственное объединение «Запсибкола» основано в мае 1997 г. в Новосибирске. За 20 лет мы прошли путь от небольшой торгово-производственной компании компании до крупного завода с развитой региональной сетью продаж.</p>
                                <p>Сегодня продукцию «Запсибколы» можно приобрести практически в каждой торговой точке Сибири: торговые сети, независимые розничные магазины, придомовые торговые ряды, киоски. Нашими партнерами являются «Ашан», «Холидей», «Лента», «Горожанка», «Мария-Ра» и другие ведущие организации сетевого ритейла.</p>    
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="product">
                <div class="product-box box">
                    <div class="product-content">
                        <h2 class="section-title">Наша продукция</h2>
                        <div class="product-items">
                            <div class="product-item">
                                <a href="/" class="product-img">
                                    <img src="./assets/img/logo/860af24458c5571e42da41e157eadf59.png" alt="">
                                </a>
                                <div class="product-info">
                                    <a href="/" class="product-name">Газированные напитки «Фрутто»</a>
                                    <p>
                                        Выпускаются на протяжении 20 лет. Эти лимонады завоевали популярность благодаря яркому, бодрящему вкусу и привлекательной цене.
                                    </p>
                                </div>
                            </div>
                            <div class="product-item">
                                <a href="/" class="product-img">
                                    <img src="./assets/img/logo/860af24458c5571e42da41e157eadf59.png" alt="">
                                </a>
                                <div class="product-info">
                                    <a href="/" class="product-name">Газированные напитки «Фрутто»</a>
                                    <p>
                                        Выпускаются на протяжении 20 лет. Эти лимонады завоевали популярность благодаря яркому, бодрящему вкусу и привлекательной цене.
                                    </p>
                                </div>
                            </div>
                            <div class="product-item">
                                <a href="/" class="product-img">
                                    <img src="./assets/img/logo/860af24458c5571e42da41e157eadf59.png" alt="">
                                </a>
                                <div class="product-info">
                                    <a href="/" class="product-name">Газированные напитки «Фрутто»</a>
                                    <p>
                                        Выпускаются на протяжении 20 лет. Эти лимонады завоевали популярность благодаря яркому, бодрящему вкусу и привлекательной цене.
                                    </p>
                                </div>
                            </div>
                            <div class="product-item">
                                <a href="/" class="product-img">
                                    <img src="./assets/img/logo/860af24458c5571e42da41e157eadf59.png" alt="">
                                </a>
                                <div class="product-info">
                                    <a href="/" class="product-name">Газированные напитки «Фрутто»</a>
                                    <p>
                                        Выпускаются на протяжении 20 лет. Эти лимонады завоевали популярность благодаря яркому, бодрящему вкусу и привлекательной цене.
                                    </p>
                                </div>
                            </div>
                            <div class="product-item">
                                <a href="/" class="product-img">
                                    <img src="./assets/img/logo/860af24458c5571e42da41e157eadf59.png" alt="">
                                </a>
                                <div class="product-info">
                                    <a href="/" class="product-name">Газированные напитки «Фрутто»</a>
                                    <p>
                                        Выпускаются на протяжении 20 лет. Эти лимонады завоевали популярность благодаря яркому, бодрящему вкусу и привлекательной цене.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="col-1">
                <div class="col-1-box__box box">
                    <div class="col-1-content">
                        <h3 class="section-title">Наши товары</h3>
                        <div class="col-1-box">
                            <div class="col-1-items swiper">
                                <div class="col-1-wrapper swiper-wrapper">
                                    <?php
                                        if($num > 0) {
                                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                                extract($row);
                                                echo "<div class='col-1-item swiper-slide' id='{$id}'>";
                                                    echo '<a href="" class="col-1-item__img">';
                                                    echo "<img src='../assets/img/product/dc73063978e68480333f7fd85f3c445d.png' alt=''>";
                                                    echo "</a>";
                                                    echo "<a href='/product?id={$id}' class='col-1-item__name'>{$name}</a>";
                                                    echo "<p class='col-1-item__description'>{$description}</p>";
                                                echo "</div>";
                                            }
                                        } else {
                                            echo "Not find $num";
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="col-1-next swiper-button-next"></div>
                            <div class="col-1-prev swiper-button-prev"></div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="col-4">
                <div class="col-4-box box">
                    <div class="col-4-content">
                        <h3 class="section-title">Контакты</h3>
                        <div class="col-4-wrap">
                            <div id="map"></div>
                            <ul class="col-4-items">
                                <li>
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <a href="mailto: ">vkusno@mail.ru</a>
                                </li>
                                <li>
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <a href="mailto: ">vkusno@mail.ru</a>
                                </li>
                                <li>
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <a href="mailto: ">vkusno@mail.ru</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <section class="col-2">
                <div class="col-2-box box">
                    <div class="col-2-content">
                        <div class="col-2-l">
                            <p class="col-2-title">Консультация по подбору товаров</p>
                            <p class="col-2-text">Получите индивидуальное коммерческое предложение, оставиви заявку на консультацию</p>
                        </div>
                        <form onsubmit="return false;" class="form">
                            <div class="form-box">
                                <div class="form-item">
                                    <input type="text" name="username" id="username" autocomplete="none" placeholder=" ">
                                    <span>Имя</span>
                                </div>
                                <div class="form-item">
                                    <input type="text" name="tel" id="tel" autocomplete="none" placeholder=" ">
                                    <span>Телефон</span>
                                </div>
                                <div class="form-item">
                                    <input type="text" name="mail" id="mail" autocomplete="none" placeholder=" ">
                                    <span>Email</span>
                                </div>
                            </div>
                            <div class="form-wrap">
                                <div class="form-item">
                                    <textarea type="text" name="description" id="description" placeholder=" "></textarea>
                                    <span>Сообщение</span>
                                </div>
                            </div>
                            <button type="submit" mes-form>задать вопрос</button>
                        </form>
                    </div>
                </div>
            </section>
            <?php include './component/btnTop.php' ?>
        </div>
    </main>
    <script src="./assets/libs/swiper/swiper-bundle.min.js"></script>
    <script src="https://api-maps.yandex.ru/2.0/?load=package.standard&amp;lang=ru-RU&amp;apikey=<ваш API-ключ>" type="text/javascript"></script>
    <script src="./assets/script/ymaps.js"></script>
    <script>
        new Swiper('.col-1-items', {
            slidesPerView: 4,
            spaceBetween: 4,
            navigation: {
                nextEl: '.col-1-next',
                prevEl: '.col-1-prev'
            },
            breakpoints: {
                850: {
                    slidesPerView: 4
                },
                600: {
                    slidesPerView: 3
                },
                400: {
                    slidesPerView: 2
                },
                0: {
                    slidesPerView: 1,
                    spaceBetween: 0
                }
            }
        })
    </script>
    <?php require_once './component/footer.php' ?>
</html>