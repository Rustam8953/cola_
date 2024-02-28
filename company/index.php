<?php
    $url = $_SERVER['REQUEST_URI'];
    if($url == '/company/' || $url == '/company/about/') {
        $page_title = 'О компании';
    } elseif($url == '/company/history/') {
        $page_title = 'История';
    } elseif($url == '/company/docs/') {
        $page_title = 'Реквизиты и Документы';
    }
    include_once dirname(__DIR__) . '/component/header.php';
?>
<link rel="stylesheet" href="/assets/style/page.css">
<link rel="stylesheet" href="/assets/style/company.css">
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
                <div class="page-content">
                    <?php
                        if($url == '/company/about/' || $url == '/company/') {
                            $page_title = 'История';
                            ?>
                            <div class="about">
                                <div class="about-img">
                                    <img src="/assets/img/banner/about.jpg" alt="">
                                </div>
                                <br>
                                <p>Производственное объединение «Запсибкола» было основано в мае 1997 года в Новосибирске. За два десятилетия мы прошли путь от небольшой торгово-производственной компании до крупного завода с развитой региональной сетью продаж. Сегодня продукцию «Запсибколы» можно найти практически в каждом магазине Сибири: торговые сети, независимые розничные магазины, придомовые торговые ряды, киоски. Мы сотрудничаем с такими ведущими организациями сетевого ритейла, как «Ашан», «Холидей», «Лента», «Горожанка», «Мария-Ра» и другими.</p>
                                <br>
                                <p>Популярность ООО "ВКУСНО!" обусловлена широким ассортиментом продукции, разнообразием вкусов и привлекательной ценой.</p>
                                <ul></ul>
                                <br>
                                <p>Ассортимент, выпускаемый компанией «Запсибкола», включает более 100 наименований. Это позволяет нашим партнерам наполнять торговые полки разнообразной по вкусу, цене, составу безалкогольной продукцией для покупателей разных возрастных групп с любым достатком. Широкий выбор форматов выпускаемой продукции (0,5л; 0,6л; 1,5л; 2л; 6л) дает возможность с комфортом употреблять напитки дома, на даче, на прогулке, одному или в большой компании. Мы ориентируемся как на классические рецепты (лимонад, тархун, дюшес, квас), так и на современные продукты, завоевавшие множество поклонников (ароматизированная вода, мохито).</p>
                                <br>
                                <p>В настоящее время, как и 20 лет назад, мы уделяем особое внимание качеству и доступности нашей продукции. Весь ассортимент полностью соответствует стандартам ГОСТ. Наши напитки производятся на основе воды, прошедшей тщательную подготовку и очистку на современном оборудовании, с добавлением сахарного сиропа, натуральных ароматизаторов и других ингредиентов в соответствии с рецептурой.</p>
                            </div>
                            <?php
                        } else if($url == '/company/history/') {
                            ?>
                            <div class="history">
                                <div class="history-content">
                                    <ul class="history-list">
                                        <li>
                                            <div class="history-date"><p>2011</p></div>
                                            <div class="history-value">Дан старт выпуску второй линейки квасных напитков, созданных по традиционным рецептам – «Добродей».</div>
                                        </li>
                                        <li>
                                            <div class="history-date"><p>2011</p></div>
                                            <div class="history-value">Дан старт выпуску второй линейки квасных напитков, созданных по традиционным рецептам – «Добродей».</div>
                                        </li>
                                        <li>
                                            <div class="history-date"><p>2011</p></div>
                                            <div class="history-value">Дан старт выпуску второй линейки квасных напитков, созданных по традиционным рецептам – «Добродей».</div>
                                        </li>
                                        <li>
                                            <div class="history-date"><p>2011</p></div>
                                            <div class="history-value">Дан старт выпуску второй линейки квасных напитков, созданных по традиционным рецептам – «Добродей».</div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <?php
                        } else if($url == '/company/docs/') {
                            ?>
                            <div class="docs">
                                <ul class="docs-list">
                                    <li>
                                        <p class="docs-title">Полное наименование:</p>
                                        <p class="docs-value">Общество с ограниченной ответственностью «ВКУСНО»</p>
                                    </li>
                                    <li>
                                        <p class="docs-title">Сокращенное наименование:</p>
                                        <p class="docs-value">ООО ««ВКУСНО»»</p>
                                    </li>
                                    <li>
                                        <p class="docs-title">Электронная почта:</p>
                                        <p class="docs-value">wkysno_wf@mail.ru</p>
                                    </li>
                                    <li>
                                        <p class="docs-title">Телефон:</p>
                                        <p class="docs-value">+7-913-006-00-37</p>
                                    </li>
                                    <li>
                                        <p class="docs-title">Сайт:</p>
                                        <p class="docs-value">https://wkusno-nsk.ru</p>
                                    </li>
                                    <li>
                                        <p class="docs-title">ИНН:</p>
                                        <p class="docs-value">5433966121</p>
                                    </li>
                                    <li>
                                        <p class="docs-title">ОГРН:</p>
                                        <p class="docs-value">1185476016989</p>
                                    </li>
                                    <li>
                                        <p class="docs-title">КПП:</p>
                                        <p class="docs-value">543301001</p>
                                    </li>
                                    <li>
                                        <p class="docs-title">Фактический адрес:</p>
                                        <p class="docs-value">630559, Новосибирская область, р.п. Кольцово АБК корпус 4</p>
                                    </li>
                                    <li>
                                        <p class="docs-title">Юридический адрес:</p>
                                        <p class="docs-value">630559, Новосибирская область, р.п. Кольцово АБК корпус 4</p>
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