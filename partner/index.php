<?php
    $url = $_SERVER['REQUEST_URI'];
    if($url == '/partner/' || $url == '/partner/new/') {
        $page_title = 'Стать партнером';
    } elseif($url == '/partner/geo/') {
        $page_title = 'Регионы присутствия';
    } elseif($url == '/partner/rule/') {
        $page_title = 'Условия сотрудничества';
    } elseif($url == '/partner/sertificate/') {
        $page_title = 'Сертификаты';
    }
    include_once dirname(__DIR__) . '/component/header.php';
?>
<link rel="stylesheet" href="/assets/style/page.css">
<link rel="stylesheet" href="/assets/style/partner.css">
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
                        if($url == '/partner/' || $url == '/partner/new/') {
                            $page_title = 'Стать партнером';
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
                        } elseif($url == '/partner/sertificate/') {
                            $page_title = 'Сертификаты';
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