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
<link rel="stylesheet" href="/assets/style/page.css?<?php echo date('d:m:y:H:i:s'); ?>">
<link rel="stylesheet" href="/assets/style/company.css?<?php echo date('d:m:y:H:i:s'); ?>">
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
                                <p>
                                    Мы имеем более 25 лет опыта работы на рынке безалкогольных напитков. Наша компания предлагает широкий ассортимент продукции, включающий в себя различные виды безалкогольных напитков.
                                    </br>
                                    </br>
                                    Осуществляем доставку своей продукции не только по городу Новосибирск, но и по другим регионам России. Мы стремимся обеспечить удобство и доступность нашей продукции для всех наших клиентов, независимо от их местоположения. 
                                    </br>
                                    </br>
                                    Мы строго следим за качеством нашей продукции и соблюдаем все необходимые стандарты и требования ГОСТ и декларации соответствия на продукцию
                                </p>
                                <br>
                                <p>Предприятие зарегестрировано в Государственной информационной системе мониторинга товаров "Честный знак" и является участником оборота товаров, подлежащик маркировке на территории РФ. С декабря 2023 на предприятии внедрена цифровая маркировка товаров, которя гарантирует подлинност товаров и качество</p>
                            </div>
                            <?php
                        } else if($url == '/company/history/') {
                            ?>
                            <div class="history">
                                <div class="history-content">
                                    <ul class="history-list">
                                        <li>
                                            <div class="history-date"><p>1999</p></div>
                                            <div class="history-value">Основание компании</div>
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