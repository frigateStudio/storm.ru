<footer>
    <menu>
        <ul>
            <li><a href="/" class="ulMenu-1">ГЛАВНАЯ</a></li>
            <li><a href="/service" class="ulMenu-2">УСЛУГИ</a></li>
            <li><a href="/stock/page-1" class="ulMenu-3">АКЦИИ</a></li>
            <li><a href="/albums" class="ulMenu-4">ГАЛЕРЕЯ</a></li>
            <li><a href="/review/page-1" class="ulMenu-5">ОТЗЫВЫ</a></li>
            <li><a href="/contacts" class="ulMenu-6">КОНТАКТЫ</a></li>
            <li><a href="/admin" class="ulMenu-7">ВХОД</a></li>

        </ul>
    </menu>
</footer>

<!--Добавление класса active для активного пункта меню-->
<script>
    $(document).ready(function() {
        $('.ulMenu-<?php echo $idActiveMenu?>').addClass('active');
    });
</script>

