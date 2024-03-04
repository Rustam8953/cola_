<?php
include_once "./config/db.php";
include_once "./objects/product.php";
include_once "./objects/category.php";

$database = new Database();
$db = $database->getConnection();
$val = 0;

$product = new Product($db);
$category = new Category($db);
$stmt_prod = $product->readAll($val, 12);
$num = $stmt_prod->rowCount();

$page_title="Вкусно!";
require_once './component/header.php'; 


$stmt_cat = $category->read();
?>
    <link rel="stylesheet" href="../assets/libs/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="./assets/style/banner.css?<?php echo date('d:m:y:H:i:s'); ?>">
    <link rel="stylesheet" href="./assets/style/ymaps.css?<?php echo date('d:m:y:H:i:s'); ?>">
    <link rel="stylesheet" href="./assets/style/contact.css?<?php echo date('d:m:y:H:i:s'); ?>">
    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "Organization",
          "name": "ВКУСНО!",
          "url": "https://wkusno-nsk.ru",
          "logo": "/assets/img/logo/logo-ball.svg",
          "contactPoint": {
            "@type": "ContactPoint",
            "telephone": "",
            "contactType": "Консультация",
            "areaServed": "RU",
            "availableLanguage": "Russian"
          },
          "sameAs": "https://wkusno-nsk.ru"
        }
    </script>
    <main class="main">
        <div class="main-wrap">
            <section class="banner">
                <div class="banner-box box">
                    <div class="banner-content">
                        <div class="banner-text">Встречаем лето с</div>
                        <div class="banner-logo">ВКУСНО!</div>
                    </div>
                    <div class="banner-btn">
                        <button onclick="document.querySelector('.col-2').scrollIntoView({behavior: 'smooth', block: 'center'})">Оставить заявку</button>
                    </div>
                </div>
            </section>
            <div class="banner-btm">
                <div class="box">
                    <div class="banner-items">
                        <div class="banner-item">
                            <div class="banner-icon num">
                                1997
                            </div>
                            <div class="banner-name">Более 25 лет на рынке безалкогольных напитков</div>
                        </div>
                        <div class="banner-item">
                            <div class="banner-icon">
                                <img src="/assets/img/logo/certificate.svg" >
                            </div>
                            <div class="banner-name">Полное соответствие ГОСТ и декларации соответствия продукции</div>
                        </div>
                        <div class="banner-item">
                            <div class="banner-icon">
                                <img src="/assets/img/logo/route.svg" >
                            </div>
                            <div class="banner-name">Доставка по городу Новосибирск и регионам России</div>
                        </div>
                    </div>
                </div>
            </div>
            <!--<section class="col-3">-->
            <!--    <div class="col-3-box box">-->
            <!--        <div class="col-3-content">-->
            <!--            <h3 class="section-title">О компании</h3>-->
            <!--            <div class="col-3-wrap">-->
            <!--                <div class="col-3-l">-->
            <!--                    <div class="col-3-img">-->
            <!--                        <img src="" alt="">-->
            <!--                    </div>-->
            <!--                </div>-->
            <!--                <div class="col-3-r">-->
            <!--                    <p>-->
            <!--                        Мы имеем более 25 лет опыта работы на рынке безалкогольных напитков. Наша компания предлагает широкий ассортимент продукции, включающий в себя различные виды безалкогольных напитков.-->
            <!--                        </br>-->
            <!--                        </br>-->
            <!--                        Осуществляем доставку своей продукции не только по городу Новосибирск, но и по другим регионам России. Мы стремимся обеспечить удобство и доступность нашей продукции для всех наших клиентов, независимо от их местоположения. -->
            <!--                        </br>-->
            <!--                        </br>-->
            <!--                        Мы строго следим за качеством нашей продукции и соблюдаем все необходимые стандарты и требования ГОСТ и декларации соответствия на продукцию-->
            <!--                    </p>-->
                                <!--<p>Предприятие зарегестрировано в Государственной информационной системе мониторинга товаров "Честный знак" и является участником оборота товаров, подлежащик маркировке на территории РФ. С декабря 2023 на предприятии внедрена цифровая маркировка товаров, которя гарантирует подлинност товаров и качество</p>-->
            <!--                </div>-->
            <!--            </div>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</section>-->
            <section class="product">
                <div class="product-box box">
                    <div class="product-content">
                        <h2 class="section-title">Наша продукция</h2>
                        <div class="product-items">
                            <?php
                                if($num > 0) {
                                    while ($row = $stmt_cat->fetch(PDO::FETCH_ASSOC)) {
                                        extract($row);
                                        echo "<div class='product-item' id='{$id}'>";
                                            echo "<a href='/catalog/{$path_name}' class='product-img'>";
                                                echo "<img src='/assets/img/logo/none2.png' alt='' loading=lazy>";
                                            echo "</a>";
                                            echo "<div class='product-info'>";
                                                echo "<a href='/catalog/{$path_name}' class='product-name'>{$name}</a>";
                                                echo "<p>{$description}</p>";
                                            echo "</div>";
                                        echo "</div>";
                                    }
                                } else {
                                    echo "Not find $num";
                                }
                            ?>
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
                                            while ($row = $stmt_prod->fetch(PDO::FETCH_ASSOC)) {
                                                extract($row);
                                                if($image !== "") {
                                                    echo "<div class='col-1-item swiper-slide' id='{$id}'>";
                                                        echo "<a href='/product/?id={$id}' class='col-1-item__img'>";
                                                            echo "<img src='/static/{$image}' alt='' loading=lazy>";
                                                        echo "</a>";
                                                        echo "<a href='/product?id={$id}' class='col-1-item__name'>" . $name . "</a>";
                                                        // echo "<p class='col-1-item__description'>{$description}</p>";
                                                    echo "</div>";
                                                }
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
                        <div class="contact-l">
                            <div class="" id="map"></div>
                            <ul class="col-4-items">
                                <li>
                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <a href="https://yandex.ru/maps/-/CDFa5Z3W">Новосибирская область, р.п. Кольцово, АБК, корп. 4</a>
                                </li>
                                <li>
                                    <i class="fa fa-phone" aria-hidden="true"></i>
                                    <a href="tel:+7(913)006-00-37">+7(913)006-00-37</a>
                                </li>
                                <li>
                                    <i class="fa fa-envelope" aria-hidden="true"></i>
                                    <a href="mailto:wkusno_wf@mail.ru">wkusno_wf@mail.ru</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
            <?php include './form.php' ?>
            <?php include './component/btnTop.php' ?>
        </div>
    </main>
    <script src="./assets/libs/swiper/swiper-bundle.min.js"></script>
    <script src="https://api-maps.yandex.ru/2.0/?load=package.standard&amp;lang=ru-RU&amp;apikey=90aaac62-16fd-45a5-ad18-c9ff9afbc746" type="text/javascript"></script>
    <script src="./assets/script/ymaps.js?<?php echo date('d:m:y:H:i:s'); ?>"></script>
    <script>
        new Swiper('.col-1-items', {
            slidesPerView: 4,
            spaceBetween: 10,
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