<?php
    $page_title = "Контакты";
    include_once dirname(__DIR__) . '/component/header.php';
?>
<link rel="stylesheet" href="/assets/style/ymaps.css">
<link rel="stylesheet" href="/assets/style/contact.css">
<link rel="stylesheet" href="/assets/style/banner.css">
<main class="main">
    <div class="contact">
        <div class="contact-box box">
            <div class="contact-wrap">
                <h1 class="contact-title">Контакты</h1>
                <div class="contact-l">
                    <div class="" id="map"></div>
                </div>
            </div>
        </div>
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
    </div>
</main>
<script src="https://api-maps.yandex.ru/2.0/?load=package.standard&amp;lang=ru-RU&amp;apikey=<ваш API-ключ>" type="text/javascript"></script>
<script src="/assets/script/ymaps.js"></script>

<?php
    include_once dirname(__DIR__) . '/component/footer.php';
?>