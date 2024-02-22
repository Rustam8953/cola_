<?php

echo "<ul class='pagination'>";

// подсчёт общего количества страниц
$total_pages = ceil($total_rows / $records_per_page);

// диапазон ссылок для отображения
$range = 4;

// отображать ссылки на «диапазон страниц» вокруг «текущей страницы»
$initial_num = $page - $range;
$condition_limit_num = ($page + $range) + 1;

for ($x = $initial_num; $x < $condition_limit_num; $x++) {

    // убедимся, что "$x больше 0" и "меньше или равно $total_pages"
    if (($x > 0) && ($x <= $total_pages)) {

        // текущая страница
        if ($x == $page) {
            echo "<li class='active'><a href='#'>$x</a></li>";
        }

        // НЕ текущая страница
        else {
            echo "<li><a href='{$page_url}page=$x'>$x</a></li>";
        }
    }
}

echo "</ul>";
?>