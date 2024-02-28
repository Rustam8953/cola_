<?php
    $url = $_SERVER['REQUEST_URI'];
    if($url == '/partner/' || $url == '/partner/new/') {
        $page_title = 'Стать партнером';
    } elseif($url == '/partner/geo/') {
        $page_title = 'Регионы присутствия';
    } elseif($url == '/partner/rule/') {
        $page_title = 'Условия сотрудничества';
    } elseif($url == '/partner/docs/') {
        $page_title = 'Документы';
    } elseif($url == '/partner/quest/') {
        $page_title = 'Вопрос-ответ';
    }
    include_once dirname(__DIR__) . '/component/header.php';
?>
<link rel="stylesheet" href="/assets/style/page.css">
<link rel="stylesheet" href="/assets/style/partner.css">
<main class="main">
    <div class="page">
        <div class="page-box box">
            <div class="page-nav">
                <a href="/">Главная</a>
                <a href="<?php echo $url ?>"><?php echo $page_title ?></a>
            </div>
            <h1 class="page-title"><?php echo $page_title; ?></h1>
            <div class="page-wrap">
                <div class="page-menu">
                    <?php include_once dirname(__FILE__) . '/list.php' ?>
                </div>
                <div class="page-content partner">
                    <?php
                        if($url == '/partner/' || $url == '/partner/new/') {
                            $page_title = 'Стать партнером';
                            ?>
                                <div class="partner-new">
                                    <h3>Уважаемые партнеры! Мы приветствуем вас и готовы начать сотрудничество!</h3>
                                    <p>Напитки компании «ВКУСНО!» пользуются стабильно высоким спросом в регионах Сибири, а также успешно конкурируют на рынке в других федеральных округах и даже странах ближнего зарубежья. За счет нашей продуманной ассортиментной матрицы и ценовой политики, начиная сотрудничество, вы получаете востребованную продукцию сразу в нескольких сегментах рынка безалкогольных напитков: газированная вода, сокосодержащие напитки, квасные напитки, питьевая вода.</p>
                                    <br>
                                    <p class="m-btm">Мы работаем с ритейлом всех форматов: торговые сети, независимая розница, придомовые магазины, киоски по продаже прохладительных напитков.</p>
                                    <h3>Преимущества работы с нами</h3>
                                    <ul class="m-btm">
                                        <li>разнообразие ассортимента;</li>
                                        <li>популярная продукция, высокий коэффициент сменяемости на торговых полках и прилавках;</li>
                                        <li>гибкие условия оплаты.</li>
                                    </ul>
                                    <h3>Контакты для связи с нашими представителями:</h3>
                                    <p>т.+7-913-006-00-37, email: <a href="mailto:">wkysno_wf@mail.ru</a></p>
                                </div>
                            <?php
                        } elseif($url == '/partner/geo/') {
                        ?>
                            <div class="geo">
                                <p>Продукция компании «Запсибкола» представлена в торговых сетях и независимых розничных магазинах России и стран ближайшего зарубежья. Общее количество торговых точек, в которых можно приобрести наши газированные напитки, сокосодержащие напитки, квас или чистую воду, составляет более 5000.</p>
                                <br>
                                <h3 class="geo-title">Мы представлены в следующих регионах:</h3>
                                <br>
                                <ul>
                                    <li>Сибирский федеральный округ (Новосибирская, Омская, Томская, Кемеровская, Иркутская области, Красноярский край, Алтайский край, Республика Алтай);</li>
                                    <li>Уральский федеральный округ (Свердловская, Челябинская, Курганская, Тюменская области);</li>
                                    <li>Республика Казахстан (Алма-Ата, Актобе, Астана, Павлодар).</li>
                                </ul>
                            </div>
                        <?php
                        } elseif($url == '/partner/rule/') {
                            $page_title = 'Условия сотрудничества';
                            ?>
                                <div class="rule">
                                    <p>Компания "Вкусно" производит продукцию, которая пользуется популярностью во многих регионах России. В настоящее время существуют различные схемы поставок.</p>
                                    <ul>
                                        <li>
                                            <div class="rule-item__title">1. В торговые точки НСК:</div>
                                            <div class="rule-item__val">Поставка собственным автотранспортом осуществляется на сумму от 1000 руб. Рассрочка платежа до 14 календарных дней.</div>
                                        </li>
                                        <li>
                                            <div class="rule-item__title">2. В близлежащие регионы Сибири:</div>
                                            <div class="rule-item__val">Поставка собственным автотранспортом осуществляется на сумму от 1000 руб. Рассрочка платежа до 14 календарных дней.</div>
                                        </li>
                                        <li>
                                            <div class="rule-item__title">3. В регионы других федеральных округов России:</div>
                                            <div class="rule-item__val">Поставка собственным автотранспортом осуществляется на сумму от 1000 руб. Рассрочка платежа до 14 календарных дней.</div>
                                        </li>
                                    </ul>
                                </div>
                            <?php
                        } elseif($url == '/partner/docs/') {
                            $page_title = 'Документы';
                            ?>
                                <div class="d">
                                    <div class="d-box">
                                        <div class="d-item">
                                            <a href="/assets/file/Декаларация_на_воду_с_печатью_и_подписью.pdf" download>
                                                <img src="/assets/img/logo/file.png" alt="">
                                            </a>
                                            <p class="d-item__text">Декларация о соответствии</p>
                                        </div>
                                        <div class="d-item">
                                            <a href="/assets/file/Декларация_о_соотвтетсвии_от_22_04_2021.pdf" download>
                                                <img src="/assets/img/logo/file.png" alt="">
                                            </a>
                                            <p class="d-item__text">Декларация на воду</p>
                                        </div>
                                        <div class="d-item">
                                            <a href="/assets/file/Уведомление.pdf" download>
                                                <img src="/assets/img/logo/file.png" alt="">
                                            </a>
                                            <p class="d-item__text">Уведомление</p>
                                        </div>
                                    </div>
                                </div>
                            <?php
                        } elseif($url == '/partner/quest/') {
                            $page_title = 'Вопрос-ответ';
                            ?>
                                <div class="partner-quest">
                                    <ul>
                                        <li>
                                            <div class="partner-quest__title">Заголовок</div>
                                            <div class="partner-quest__value">Текст</div>
                                        </li>
                                    </ul>
                                </div>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
    include_once dirname(__DIR__) . '/component/btnTop.php';
    include_once dirname(__DIR__) . '/component/footer.php';
?>