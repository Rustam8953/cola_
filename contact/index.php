<?php
    $page_title = "Контакты";
    include_once dirname(__DIR__) . '/component/header.php';
?>
<link rel="stylesheet" href="/assets/style/ymaps.css?<?php echo date('d:m:y:H:i:s'); ?>">
<link rel="stylesheet" href="/assets/style/contact.css?<?php echo date('d:m:y:H:i:s'); ?>">
<link rel="stylesheet" href="/assets/style/banner.css?<?php echo date('d:m:y:H:i:s'); ?>">
<main class="main">
    <div class="contact">
        <div class="contact-box box">
            <div class="page-nav">
                <a href="/">Главная</a>
                <a href="/contact">Контакты</a>
            </div>
            <div class="contact-wrap">
                <h1 class="contact-title">Контакты</h1>
                <div class="contact-l">
                    <div class="" id="map"></div>
                    <ul class="col-4-items">
                        <li>
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <a href="https://yandex.ru/maps/-/CDFYED3G">Новосибирская область, р.п. Кольцово, АБК, корп. 4</a>
                        </li>
                        <li>
                            <i class="fa fa-phone" aria-hidden="true"></i>
                            <a href="mailto: ">+7(913)006-00-37</a>
                        </li>
                        <li>
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <a href="mailto: ">wkusno_wf@mail.ru</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <?php include_once dirname(__DIR__) . '/form.php' ?>
        <?php include_once dirname(__DIR__) . '/component/btnTop.php' ?>
    </div>
</main>
<script src="https://api-maps.yandex.ru/2.0/?load=package.standard&amp;lang=ru-RU&amp;apikey=90aaac62-16fd-45a5-ad18-c9ff9afbc746" type="text/javascript"></script>
<script src="/assets/script/ymaps.js?<?php echo date('d:m:y:H:i:s'); ?>"></script>

<?php
    include_once dirname(__DIR__) . '/component/footer.php';
?>