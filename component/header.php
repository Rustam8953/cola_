<?php


header('Content-Type: text/html; charset=utf8');

include_once dirname(__DIR__) . '/config/db.php';
include_once dirname(__DIR__) . '/objects/category.php';

$database = new Database();
$db = $database->getConnection();

$category = new Category($db);
$categoryList = $category->read();

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <title><?php echo $page_title ?></title>
    <link rel="stylesheet" href="/assets/style/style.css?<?php echo date('d:m:y:H:i:s'); ?>">
</head>
<body>
    <header class="header">
        <div class="header-box box">
            <div class="header-content">
                <div class="header-top">
                    <div class="header-logo">
                        <a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>" class="logo">ВКУСНО!</a>
                        <p class="header-logo__text">Встречаем лето Вкусно</p>
                    </div>
                    <div class="header-contact">
                        <div class="header-contact__l">
                            <a href="tel:+7-913-006-00-37" class="header-contact__tel">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                                    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
                                </svg>
                                <p>+7-913-006-00-37</p>
                            </a>
                            <a href="mailto:wkysno_wf@mail.ru">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                                </svg>
                            </a>
                        </div>
                        <div class="header-contact__r">
                            <button class="v-1" modal>консультация</button>
                        </div>
                    </div>
                </div>
                <nav class="nav">
                    <div class="nav-box">
                        <ul class="nav-list">
                            <li class="dropdown nav-item">
                                <div class="nav-item__title">
                                    <p>о нас</p>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/>
                                    </svg>
                                </div>
                                <ul class="dropdown-list">
                                    <li><a href="/company/about" path>О компании</a></li>
                                    <li><a href="/company/history" path>История</a></li>
                                    <li><a href="/company/docs" path>Реквизиты</a></li>
                                </ul>
                            </li>
                            <li class="dropdown nav-item">
                                <div class="nav-item__title">
                                    <p>каталог</p>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/>
                                    </svg>
                                </div>
                                <ul class="dropdown-list">
                                    <?php
                                        while ($new_row_category = $categoryList->fetch(PDO::FETCH_ASSOC)) {
                                            extract($new_row_category);
                                            echo "<li><a class='product-cat' path id={$id} href='/catalog/{$path_name}'>{$name}</a></li>";
                                        }
                                    ?>
                                </ul>
                            </li>
                            <li class="dropdown nav-item">
                                <div class="nav-item__title">
                                    <p>партнерам</p>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708"/>
                                    </svg>
                                </div>
                                <ul class="dropdown-list">
                                    <li><a href="/partner/new" path>Стать партнером</a></li>
                                    <!-- <li><a href="/partner/geo" path>Регионы присутствия</a></li> -->
                                    <li><a href="/partner/rule" path>Условия сотрудничества</a></li>
                                    <li><a href="/partner/docs" path>Документы</a></li>
                                    <!-- <li><a href="/partner/quest" path>Вопрос-ответ</a></li> -->
                                </ul>
                            </li>
                            <li class="dropdown nav-item">
                                <a href="/contact" class="nav-item__title" path><p>Контакты</p></a>
                            </li>
                        </ul>
                        <form class="nav-input" onsubmit="return false" name="form-search" id="form-search" method="post" >
                            <div class="nav-input__box">
                                <div class="nav-search">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="bi bi-search" viewBox="0 0 16 16">
                                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                                    </svg>
                                </div>
                                <div class="nav-input__item">
                                    <input type="text" placeholder="Введите название товара" name="dataName" id="search-input">
                                </div>
                            </div>
                            <ul class="nav-input__value active"></ul>
                        </form>
                    </div>
                </nav>
            </div>
            <div class="header-mobile">
                <a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>" class="logo">ВКУСНО!</a>
                <div class="header-right">
                    <div class="header-contact__l">
                        <a href="tel:+7-913-006-00-37">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
                                <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
                            </svg>
                        </a>
                        <a href="mailto:wkysno_wf@mail.ru">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                            </svg>
                        </a>
                    </div>
                    <div class="header-burger" menu>
                        <div class="header-line"></div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="modal">
        <form class="modal-box" name="form-modal" id="form-modal" onsubmit="return false;">
            <div class="modal-head">
                <p>Оставьте заявку на консультяцию</p>
                <div class="modal-close" modal-close></div>
            </div>
            <div class="modal-body">
                <div class="form-item">
                    <input type="text" name="username-modal" id="username-modal" autocomplete="none" placeholder=" ">
                    <span>Имя*</span>
                </div>
                <div class="form-item">
                    <input type="text" name="tel-modal" id="tel-modal" autocomplete="none" placeholder=" ">
                    <span>Телефон*</span>
                </div>
            </div>
            <div class="modal-foot">
                <button type="submit">Отправить</button>
            </div>
        </form>
    </div>