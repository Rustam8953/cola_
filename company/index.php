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
                                <p>Производственное объединение «Запсибкола» основано в мае 1997 г. в Новосибирске. За 20 лет мы прошли путь от маленькой торгово-производственной компании компании до крупного завода с развитой региональной сетью продаж. Сегодня продукцию «Запсибколы» можно приобрести практически в каждой торговой точке Сибири: торговые сети, независимые розничные магазины, придомовые торговые ряды, киоски. Нашими партнерами являются «Ашан», «Холидей», «Лента», «Горожанка», «Мария-Ра» и другие ведущие организации сетевого ритейла.</p>
                                <br>
                                <p>Такая популярность стала возможной благодаря широкой ассортиментной матрице, разнообразию вкусов и выгодной цене. Продукция ООО «ПО Запсибкола» представлена в товарных категориях:</p>
                                <ul></ul>
                                <br>
                                <p>Ассортимент, выпускаемый компанией «Запсибкола», включает более 100 наименований. Это позволяет нашим партнерам наполнять торговые полки разнообразной по вкусу, цене, составу безалкогольной продукцией для покупателей разных возрастных групп с любым достатком. Широкий выбор форматов выпускаемой продукции (0,5л; 0,6л; 1,5л; 2л; 6л) дает возможность с комфортом употреблять напитки дома, на даче, на прогулке, одному или в большой компании. Мы ориентируемся как на классические рецепты (лимонад, тархун, дюшес, квас), так и на современные продукты, завоевавшие множество поклонников (ароматизированная вода, мохито).</p>
                                <br>
                                <p>Сегодня, как и 20 лет назад, нашими приоритетами являются качество и доступность выпускаемой продукции. Весь ассортимент полностью соответствует ГОСТ. Напитки выпускаются на основе воды, подготовленной и очищенной на современном немецком оборудовании, с добавлением сахарного сиропа, натуральных ароматизаторов и других компонентов в зависимости от рецепта. Для контроля качества и улучшения вкусов на заводе проводятся закрытые дегустации.</p>
                            
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
                                        <p class="docs-value">Общество с ограниченной ответственностью «ПО Запсибкола»</p>
                                    </li>
                                    <li>
                                        <p class="docs-title">Сокращенное наименование:</p>
                                        <p class="docs-value">ООО «ПО Запсибкола»</p>
                                    </li>
                                    <li>
                                        <p class="docs-title">Электронная почта:</p>
                                        <p class="docs-value">orunbaev@gmail.com</p>
                                    </li>
                                    <li>
                                        <p class="docs-title">Телефон:</p>
                                        <p class="docs-value">+7 (953) 784 58 40</p>
                                    </li>
                                    <li>
                                        <p class="docs-title">Сайт:</p>
                                        <p class="docs-value">https://vkusno.ru</p>
                                    </li>
                                    <li>
                                        <p class="docs-title">ИНН:</p>
                                        <p class="docs-value">45345345345</p>
                                    </li>
                                    <li>
                                        <p class="docs-title">ОГРН:</p>
                                        <p class="docs-value">42342342352352</p>
                                    </li>
                                    <li>
                                        <p class="docs-title">Фактический адрес:</p>
                                        <p class="docs-value">630096, г. Новосибирск, ул. Сибсельмашевская, 26а ,корпус 1</p>
                                    </li>
                                    <li>
                                        <p class="docs-title">Юридический адрес:</p>
                                        <p class="docs-value">630096, г. Новосибирск, ул. Сибсельмашевская, 26а ,корпус 1</p>
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